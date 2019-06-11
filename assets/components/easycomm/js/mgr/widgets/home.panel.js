easyComm.panel.Home = function (config) {
    config = config || {};

    var tabs = [{
        title: _('ec_messages'),
        layout: 'anchor',
        items: [{
            html: _('ec_messages_intro_msg'),
            cls: 'panel-desc'
        }, {
            xtype: 'ec-grid-messages',
            cls: 'main-wrapper'
        }]
    }, {
        title: _('ec_threads'),
        layout: 'anchor',
        items: [{
            html: _('ec_threads_intro_msg'),
            cls: 'panel-desc'
        }, {
            xtype: 'ec-grid-threads',
            cls: 'main-wrapper'
        }]
    }];
    if(easyComm.config.use_reply_templates) {
        tabs.push({
            title: _('ec_reply_templates'),
                layout: 'anchor',
            items: [{
            html: _('ec_reply_templates_intro_msg'),
            cls: 'panel-desc'
        }, {
            xtype: 'ec-grid-reply-templates',
            cls: 'main-wrapper'
        }]
        });
    }

    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',

        hideMode: 'offsets',
        items: [{
            html: '<h2>' + _('ec') + '</h2>',
            cls: '',
            style: {margin: '15px 0'}
        }, {
            xtype: 'modx-tabs',
            id: 'ec-home-tabs',
            defaults: {border: false, autoHeight: true},
            border: true,
            hideMode: 'offsets',
            items: [ tabs ]
        }]
    });
    easyComm.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(easyComm.panel.Home, MODx.Panel);
Ext.reg('ec-panel-home', easyComm.panel.Home);