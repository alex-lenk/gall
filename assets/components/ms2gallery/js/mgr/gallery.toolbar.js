ms2Gallery.panel.Toolbar = function (config) {
    config = config || {};

    Ext.apply(config, {
        id: 'ms2gallery-page-toolbar',
        items: [{
            xtype: 'button',
            id: 'ms2gallery-resource-upload-btn',
            text: '<i class="icon icon-upload"></i> ' + _('ms2gallery_button_load'),
        }, '->', {
            xtype: 'displayfield',
            html: '<b>' + _('ms2gallery_source') + '</b>:&nbsp;&nbsp;'
        }, '-', {
            xtype: 'ms2gallery-combo-source',
            id: 'ms2gallery-resource-source',
            description: '<b>[[+source]]</b><br />' + _('ms2gallery_source_help'),
            value: config.record.source,
            name: 'media_source',
            hiddenName: 'media_source',
            listeners: {select: {fn: this.sourceWarning, scope: this}}
        }]
    });
    ms2Gallery.panel.Toolbar.superclass.constructor.call(this, config);
    this.config = config;
};
Ext.extend(ms2Gallery.panel.Toolbar, Ext.Toolbar, {

    sourceWarning: function (combo) {
        var source_id = this.config.record.source;
        var sel_id = combo.getValue();
        if (source_id != sel_id) {
            Ext.Msg.confirm(_('warning'), _('ms2gallery_change_source_confirm'), function (e) {
                if (e == 'yes') {
                    combo.setValue(sel_id);
                    MODx.activePage.submitForm({
                        success: {
                            fn: function (r) {
                                var page = MODx.action ? MODx.action['resource/update'] : 'resource/update';
                                MODx.loadPage(page, 'id=' + r.result.object.id);
                            }, scope: this
                        }
                    });
                }
                else {
                    combo.setValue(source_id);
                }
            }, this);
        }
    },

});
Ext.reg('ms2gallery-page-toolbar', ms2Gallery.panel.Toolbar);