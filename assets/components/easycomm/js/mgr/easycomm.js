var easyComm = function (config) {
	config = config || {};
	easyComm.superclass.constructor.call(this, config);
};
Ext.extend(easyComm, Ext.Component, {
	page: {},
    window: {},
    grid: {},
    tree: {},
    panel: {},
    combo: {},
    config: {},
    view: {},
    utils: {},
    plugin: {},
    pluginThread: {},

    loadRTEs: function(rtes) {
        if(MODx.loadRTE){
            for (var i = 0; i < rtes.length; i++) {
                var rte = rtes[i];
                MODx.loadRTE(rte);
            }
        }
    },
    destroyRTEs: function(rtes) {
        for (var i = 0; i < rtes.length; i++) {
            var rte = rtes[i];
            if (window.tinymce
                && window.tinymce.editors
                && window.tinymce.editors[rte])
            {
                window.tinymce.editors[rte].remove();
            }
            else if (window.CKEDITOR
                && window.CKEDITOR.instances
                && window.CKEDITOR.instances[rte]
                ) {
                CKEDITOR.instances[rte].destroy()
            }
            else if (window.$red) {
                var editor = $red('#' + rte);
                if (editor && editor.redactor) {
                    editor.redactor('core.destroy');
                }
            }
        }
    }
});
Ext.reg('easyComm', easyComm);

easyComm = new easyComm();