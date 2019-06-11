SeeToo.page.Home = function (config) {
	config = config || {};
	Ext.applyIf(config, {
		components: [{
			xtype: 'seetoo-page', renderTo: 'seetoo-panel-home-div'
		}]
	});
	SeeToo.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(SeeToo.page.Home, MODx.Component);
Ext.reg('seetoo-page-home', SeeToo.page.Home);