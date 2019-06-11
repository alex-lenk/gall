<?php
switch ($modx->event->name) {

    case "OnDocFormRender" :
        /** @var modResource $resource */
        if ($mode == 'new') {
            return;
        }
        $modx23 = !empty($modx->version) && version_compare($modx->version['full_version'], '2.3.0', '>=');
        $modx->controller->addHtml('<script type="text/javascript">
			Ext.onReady(function() {
				MODx.modx23 = '.(int)$modx23.';
			});
		</script>');

        $seeToo = $modx->getService('seetoo','seetoo', $modx->getOption('seetoo_core_path', null, MODX_CORE_PATH . 'components/seetoo/') . 'model/seetoo/');
        $modx->controller->addLexiconTopic('SeeToo:default');
        $url = $seeToo->config['assetsUrl'];

        $modx->controller->addJavascript($url . 'js/mgr/seetoo.js');
        $modx->controller->addLastJavascript($url . 'js/mgr/misc/utils.js');
        $modx->controller->addLastJavascript($url . 'js/mgr/widgets/resource.windows.js');
        $modx->controller->addLastJavascript($url . 'js/mgr/widgets/resource.grid.js');
        $modx->controller->addLastJavascript($url . 'js/mgr/widgets/resource.panel.js');
        $modx->controller->addCss($url . 'css/mgr/main.css');
        if (!$modx23) {
            $modx->controller->addCss($url . 'css/mgr/font-awesome.min.css');
        }

        if ($modx->getCount('modPlugin', array('name' => 'AjaxManager', 'disabled' => false))) {
            $modx->controller->addHtml('
			<script type="text/javascript">
				SeeToo.config = ' . $modx->toJSON($seeToo->config) . ';
				Ext.onReady(function() {
					window.setTimeout(function() {
						var tabs = Ext.getCmp("modx-resource-tabs");
						if (tabs) {
							tabs.add({
								xtype: "seetoo-page",
								id: "seetoo-page",
								title: _("seetoo")
							});
						}
					}, 10);
				});
			</script>');
        }
        else {
            $modx->controller->addHtml('
			<script type="text/javascript">
				SeeToo.config = ' . $modx->toJSON($seeToo->config) . ';
				// console.log(SeeToo.config);
				Ext.ComponentMgr.onAvailable("modx-resource-tabs", function() {
					this.on("beforerender", function() {
						this.add({
							xtype: "seetoo-page",
							id: "seetoo-page",
							title: _("seetoo")
						});
					});
					Ext.apply(this, {
							stateful: true,
							stateId: "modx-resource-tabs-state",
							stateEvents: ["tabchange"],
							getState: function() {return {activeTab:this.items.indexOf(this.getActiveTab())};
						}
					});
				});
			</script>');
        }
        break;
}