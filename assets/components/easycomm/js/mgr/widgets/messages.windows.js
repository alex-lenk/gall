easyComm.window.getMessageWindowFields = function (config, record, isCreate) {
    var recordId = record.object ? record.object.id : 0;
    var availableFields = {
        user_name: { xtype: 'textfield', anchor: '99%', allowBlank: true },
        user_email: { xtype: 'textfield', anchor: '99%', allowBlank: true },
        date: { xtype: 'xdatetime', anchor: '99%', allowBlank: false, dateFormat: MODx.config.manager_date_format, timeFormat: MODx.config.manager_time_format, startDay: parseInt(MODx.config.manager_week_start) },
        user_contacts: { xtype: 'textfield', anchor: '99%', allowBlank: true },
        subject: { xtype: 'textfield', anchor: '99%', allowBlank: true },
        rating: { xtype: 'numberfield', anchor: '99%', allowBlank: false, allowNegative: false, allowDecimals: false },
        text: { xtype: 'textarea', anchor: '99%', allowBlank: true, height: 120 },
        published: { xtype: 'xcheckbox', anchor: '99%', allowBlank: true },
        reply_author: { xtype: 'textfield', anchor: '99%', allowBlank: true },
        reply_text: { xtype: 'textarea', anchor: '99%', allowBlank: true, height: 200 },
        notify: { xtype: 'xcheckbox', anchor: '99%', allowBlank: true },
        notify_date: { xtype: 'displayfield', anchor: '99%' },
        thread: { xtype: 'ec-combo-thread', anchor: '99%', allowBlank: false },
        ip: { xtype: 'displayfield', anchor: '99%' },
        extended: { xtype: 'textarea', anchor: '99%', allowBlank: true }
    };

    var availableHistoryFields = {
        createdon: { xtype: 'displayfield', anchor: '99%'},
        createdby: { xtype: 'displayfield', anchor: '99%', hrAfter: true },
        editedon: { xtype: 'displayfield', anchor: '99%' },
        editedby: { xtype: 'displayfield', anchor: '99%', hrAfter: true },
        publishedon: { xtype: 'displayfield', anchor: '99%' },
        publishedby: { xtype: 'displayfield', anchor: '99%', hrAfter: true },
        deletedon: { xtype: 'displayfield', anchor: '99%' },
        deletedby: { xtype: 'displayfield', anchor: '99%' }
    };

    var replyTemplateField = {
        xtype: 'ec-combo-reply-template',
        fieldLabel: _('ec_message_reply_template'),
        name: 'reply_template',
        id: config.id + '-reply_template',
        anchor: '99%',
        allowBlank: true,
        messageId: recordId
    };

    for (i in easyComm.plugin) {
        if (typeof(easyComm.plugin[i]['getFields']) == 'function') {
            var pluginFields = easyComm.plugin[i].getFields();
            Ext.apply(availableFields, pluginFields);
        }
    }

    var tabs = [];
    for (var tab_layout in easyComm.config.message_window_layout) {
        if (easyComm.config.message_window_layout.hasOwnProperty(tab_layout)) {
            var fields = [];
            var tab_layout = easyComm.config.message_window_layout[tab_layout];
            for (var tab_layout_prop in tab_layout) {
                if (tab_layout.hasOwnProperty(tab_layout_prop)) {
                    switch (tab_layout_prop) {
                        case 'fields':
                            for(var i = 0; i < tab_layout.fields.length; i++){
                                var f = tab_layout.fields[i];
                                if (availableFields[f]) {
                                    if(easyComm.config.use_reply_templates && f == 'reply_text') {
                                        Ext.applyIf(replyTemplateField, {
                                            listeners: {
                                                select: function(ele, rec, idx) {
                                                    var text = rec.get("text");
                                                    var replyTextElementId = ele.getId().replace('reply_template', 'reply_text');
                                                    Ext.getCmp(replyTextElementId).setValue(text);
                                                }
                                            }
                                        });
                                        fields.push(replyTemplateField);

                                    }
                                    Ext.applyIf(availableFields[f], {
                                        fieldLabel: _('ec_message_' + f),
                                        name: f,
                                        id: config.id + '-' + f
                                    });
                                    fields.push(availableFields[f]);
                                }
                            }
                            break;
                        case 'columns':
                            var cols = [];
                            for (var column in tab_layout.columns) {
                                if (tab_layout.columns.hasOwnProperty(column)) {
                                    var c = tab_layout.columns[column];
                                    var colFields = [];
                                    for(var i = 0; i < c.length; i++){
                                        var f = c[i];
                                        if (availableFields[f]) {
                                            Ext.applyIf(availableFields[f], {
                                                fieldLabel: _('ec_message_' + f),
                                                name: f,
                                                id: config.id + '-' + f
                                            });
                                            colFields.push(availableFields[f]);
                                        }
                                    }
                                    cols.push({
                                        columnWidth: .5,
                                        border: false,
                                        layout: 'form',
                                        items: [colFields]
                                    });
                                }
                            }
                            if(cols.length > 0){
                                fields.push({
                                    layout: 'column',
                                    border: false,
                                    items: [cols]
                                });
                            }
                            break;
                    }
                }
            }
            tabs.push({
                title: _('ec_message_tab_' + tab_layout.name),
                layout: 'anchor',
                items: [{
                    layout: 'form',
                    cls: 'modx-panel',
                    items: [fields]
                }]
            });
        }
    }

    var result = [];
    if(!isCreate) {
        result.push({ xtype: 'hidden', name: 'id', id: config.id + '-id' });
    }

    // history tab
    if(!isCreate) {
        var historyFields = [];
        for (var historyField in availableHistoryFields){
            if (availableHistoryFields.hasOwnProperty(historyField)) {
                Ext.applyIf(availableHistoryFields[historyField], {
                    fieldLabel: _('ec_message_' + historyField),
                    name: historyField + '_visual',
                    id: config.id + '-' + historyField
                });
                historyFields.push(availableHistoryFields[historyField]);

                if(availableHistoryFields[historyField].hasOwnProperty('hrAfter') && availableHistoryFields[historyField].hrAfter) {
                    historyFields.push({
                        xtype: 'box',
                        autoEl: {tag: 'hr'}
                    });
                }
            }
        }

        tabs.push({
            title: _('ec_message_tab_history'),
            layout: 'anchor',
            items: [{
                layout: 'form',
                cls: 'modx-panel',
                items: [{
                    layout: 'column',
                    border: false,
                    items: [{
                        columnWidth: .5,
                        border: false,
                        layout: 'form',
                        items: [
                            availableHistoryFields.createdon,
                            { xtype: 'box', autoEl: {tag: 'hr'} },
                            availableHistoryFields.editedon,
                            { xtype: 'box', autoEl: {tag: 'hr'} },
                            availableHistoryFields.publishedon,
                            { xtype: 'box', autoEl: {tag: 'hr'} },
                            availableHistoryFields.deletedon
                        ]
                    },{
                        columnWidth: .5,
                        border: false,
                        layout: 'form',
                        items: [
                            availableHistoryFields.createdby,
                            { xtype: 'box', autoEl: {tag: 'hr'} },
                            availableHistoryFields.editedby,
                            { xtype: 'box', autoEl: {tag: 'hr'} },
                            availableHistoryFields.publishedby,
                            { xtype: 'box', autoEl: {tag: 'hr'} },
                            availableHistoryFields.deletedby
                        ]
                    }]
                }]
            }]
        });
    }

    result.push({
        xtype: 'modx-tabs',
        defaults: {border: false, autoHeight: true},
        deferredRender: false,
        border: true,
        hideMode: 'offsets',
        items: [tabs]
    });
    return result;
}

easyComm.window.CreateMessage = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ec-message-window-create';
    }
    Ext.applyIf(config, {
        title: _('ec_message_create'),
        width: 550,
        autoHeight: true,
        url: easyComm.config.connector_url,
        action: 'mgr/message/create',
        fields: easyComm.window.getMessageWindowFields(config, {}, true),
        keys: [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit()
            }, scope: this
        }]
    });
    easyComm.window.CreateMessage.superclass.constructor.call(this, config);
};
Ext.extend(easyComm.window.CreateMessage, MODx.Window, {});
Ext.reg('ec-message-window-create', easyComm.window.CreateMessage);


easyComm.window.UpdateMessage = function (config) {
    config = config || {};
    record = config.record || {};
    if (!config.id) {
        config.id = 'ec-message-window-update';
    }
    Ext.applyIf(config, {
        title: _('ec_message_update'),
        width: 700,
        autoHeight: true,
        url: easyComm.config.connector_url,
        action: 'mgr/message/update',
        //fields: this.getFields(config),
        fields: easyComm.window.getMessageWindowFields(config, record, false),
        keys: [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit()
            }, scope: this
        }]
    });
    easyComm.window.UpdateMessage.superclass.constructor.call(this, config);

    if(easyComm.config.use_rte){
        this.on('activate',function(w, e) {
            easyComm.loadRTEs([ config.id + '-reply_text' ])
        },this);
        this.on('deactivate',function(w, e) {
            easyComm.destroyRTEs([ config.id + '-reply_text' ])
        },this);
    }

};
Ext.extend(easyComm.window.UpdateMessage, MODx.Window, {});
Ext.reg('ec-message-window-update', easyComm.window.UpdateMessage);