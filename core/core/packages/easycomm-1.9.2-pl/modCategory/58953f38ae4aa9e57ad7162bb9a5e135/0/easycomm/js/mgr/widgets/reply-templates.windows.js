easyComm.window.getReplyTemplateWindowFields = function (config, isCreate) {
    var fields = [];
    if(!isCreate){
        fields.push({ xtype: 'hidden', name: 'id', id: config.id + '-id' });
    }
    fields.push({ xtype: 'textarea', fieldLabel: _('ec_reply_template_text'), name: 'text', id: config.id + '-text', anchor: '99%', allowBlank: true, height: 200});
    fields.push({ xtype: 'textfield', fieldLabel: _('ec_reply_template_preview'), name: 'preview', id: config.id + '-preview', anchor: '99%', allowBlank: true, readOnly: true, disabled: true});

    return fields;
}

easyComm.window.CreateReplyTemplate = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ec-reply-template-window-create';
    }
    Ext.applyIf(config, {
        title: _('ec_reply_template_create'),
        width: 550,
        autoHeight: true,
        url: easyComm.config.connector_url,
        action: 'mgr/reply-template/create',
        fields: easyComm.window.getReplyTemplateWindowFields(config, true),
        keys: [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit()
            }, scope: this
        }]
    });
    easyComm.window.CreateReplyTemplate.superclass.constructor.call(this, config);
};
Ext.extend(easyComm.window.CreateReplyTemplate, MODx.Window, {});
Ext.reg('ec-reply-template-window-create', easyComm.window.CreateReplyTemplate);


easyComm.window.UpdateReplyTemplate = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ec-reply-template-window-update';
    }
    Ext.applyIf(config, {
        title: _('ec_reply_template_update'),
        width: 550,
        autoHeight: true,
        url: easyComm.config.connector_url,
        action: 'mgr/reply-template/update',
        fields: easyComm.window.getReplyTemplateWindowFields(config, false),
        keys: [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit()
            }, scope: this
        }]
    });
    easyComm.window.UpdateReplyTemplate.superclass.constructor.call(this, config);
};
Ext.extend(easyComm.window.UpdateReplyTemplate, MODx.Window, {});
Ext.reg('ec-reply-template-window-update', easyComm.window.UpdateReplyTemplate);