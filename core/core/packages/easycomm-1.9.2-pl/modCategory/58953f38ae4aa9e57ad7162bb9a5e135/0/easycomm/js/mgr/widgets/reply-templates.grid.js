easyComm.grid.ReplyTemplates = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'ec-grid-reply-templates';
    }
    Ext.applyIf(config, {
        url: easyComm.config.connector_url,
        fields: this.getFields(config),
        columns: this.getColumns(config),
        tbar: this.getTopBar(config),
        sm: new Ext.grid.CheckboxSelectionModel(),
        baseParams: {
            action: 'mgr/reply-template/getlist'
        },
        listeners: {
            rowDblClick: function (grid, rowIndex, e) {
                var row = grid.store.getAt(rowIndex);
                this.updateReplyTemplate(grid, e, row);
            }
        },
        viewConfig: {
            forceFit: true,
            enableRowBody: true,
            autoFill: true,
            showPreview: true,
            scrollOffset: 0,
            getRowClass: function (rec, ri, p) {
                var result = [];
                return  result.join(' ');
            }
        },
        paging: true,
        remoteSort: true,
        autoHeight: true
    });
    easyComm.grid.ReplyTemplates.superclass.constructor.call(this, config);

    // Clear selection on grid refresh
    this.store.on('load', function () {
        if (this._getSelectedIds().length) {
            this.getSelectionModel().clearSelections();
        }
    }, this);
};
Ext.extend(easyComm.grid.ReplyTemplates, MODx.grid.Grid, {
    windows: {},

    getMenu: function (grid, rowIndex) {
        var ids = this._getSelectedIds();

        var row = grid.getStore().getAt(rowIndex);
        var m = [];
        if (ids.length > 1) {
            m.push({text: '<i class="x-menu-item-icon icon icon-remove"></i>'+_('ec_reply_templates_remove'),handler: this.removeReplyTemplate});
        } else {
            m.push({text: '<i class="x-menu-item-icon icon icon-edit"></i>'+_('ec_reply_template_update'),handler: this.updateReplyTemplate});
            m.push('-');
            m.push({text: '<i class="x-menu-item-icon icon icon-remove"></i>'+_('ec_reply_template_remove'),handler: this.removeReplyTemplate});
        }

        this.addContextMenuItem(m);
    },

    createReplyTemplate: function (btn, e) {
        var w = MODx.load({
            xtype: 'ec-reply-template-window-create',
            id: Ext.id(),
            listeners: {
                success: {
                    fn: function () {
                        this.refresh();
                    }, scope: this
                }
            }
        });
        var defaultValues = { };
        w.reset();
        w.setValues(defaultValues);
        w.show(e.target);
    },

    updateReplyTemplate: function (btn, e, row) {
        if (typeof(row) != 'undefined') {
            this.menu.record = row.data;
        }
        else if (!this.menu.record) {
            return false;
        }
        var id = this.menu.record.id;

        MODx.Ajax.request({
            url: this.config.url,
            params: {
                action: 'mgr/reply-template/get',
                id: id
            },
            listeners: {
                success: {
                    fn: function (r) {
                        var w = MODx.load({
                            xtype: 'ec-reply-template-window-update',
                            id: Ext.id(),
                            record: r,
                            listeners: {
                                success: {
                                    fn: function () {
                                        this.refresh();
                                    }, scope: this
                                }
                            }
                        });
                        w.reset();
                        w.setValues(r.object);
                        w.show(e.target);
                    }, scope: this
                }
            }
        });
    },

    removeReplyTemplate: function (act, btn, e) {
        var ids = this._getSelectedIds();
        if (!ids.length) {
            return false;
        }
        MODx.msg.confirm({
            title: ids.length > 1
                ? _('ec_reply_templates_remove')
                : _('ec_reply_template_remove'),
            text: ids.length > 1
                ? _('ec_reply_templates_remove_confirm')
                : _('ec_reply_template_remove_confirm'),
            url: this.config.url,
            params: {
                action: 'mgr/reply-template/multiple',
                actionMethod: 'remove',
                ids: Ext.util.JSON.encode(ids)
            },
            listeners: {
                success: {
                    fn: function (r) {
                        this.refresh();
                    }, scope: this
                }
            }
        });
        return true;
    },

    getFields: function (config) {
        return ['id', 'text', 'preview'];
    },

    getColumns: function (config) {
        return [{
         header: _('ec_reply_template_id'),
         dataIndex: 'id',
         sortable: true,
         width: 50
         }/*, {
            header: _('ec_reply_template_text'),
            dataIndex: 'text',
            sortable: true,
            width: 150
        }*/, {
            header: _('ec_reply_template_text'),
            dataIndex: 'preview',
            sortable: true,
            width: 250
        }/*, {
            header: _('ec_grid_actions'),
            dataIndex: 'actions',
            //renderer: easyComm.utils.renderActions,
            sortable: false,
            width: 80,
            id: 'actions'
        }*/];
    },

    getTopBar: function (config) {
        return [{
            text: '<i class="icon icon-plus"></i>&nbsp;' + _('ec_reply_template_create'),
            handler: this.createReplyTemplate,
            scope: this
        },
            '->',
            {
                xtype: 'textfield',
                name: 'query',
                width: 200,
                id: config.id + '-search-field',
                emptyText: _('ec_grid_search'),
                listeners: {
                    render: {
                        fn: function (tf) {
                            tf.getEl().addKeyListener(Ext.EventObject.ENTER, function () {
                                this._doSearch(tf);
                            }, this);
                        }, scope: this
                    }
                }
            }, {
                xtype: 'button',
                id: config.id + '-search-clear',
                text: '<i class="icon icon-times"></i>',
                listeners: {
                    click: {fn: this._clearSearch, scope: this}
                }
            }];
    },

    /*onClick: function (e) {
        var elem = e.getTarget();
        if (elem.nodeName == 'BUTTON') {
            var row = this.getSelectionModel().getSelected();
            if (typeof(row) != 'undefined') {
                var action = elem.getAttribute('action');
                if (action == 'showMenu') {
                    var ri = this.getStore().find('id', row.id);
                    return this._showMenu(this, ri, e);
                }
                else if (typeof this[action] === 'function') {
                    this.menu.record = row.data;
                    return this[action](this, e);
                }
            }
        }
        return this.processEvent('click', e);
    },*/

    _getSelectedIds: function () {
        var ids = [];
        var selected = this.getSelectionModel().getSelections();

        for (var i in selected) {
            if (!selected.hasOwnProperty(i)) {
                continue;
            }
            ids.push(selected[i]['id']);
        }

        return ids;
    },

    _doSearch: function (tf, nv, ov) {
        this.getStore().baseParams.query = tf.getValue();
        this.getBottomToolbar().changePage(1);
        this.refresh();
    },

    _clearSearch: function (btn, e) {
        this.getStore().baseParams.query = '';
        Ext.getCmp(this.config.id + '-search-field').setValue('');
        this.getBottomToolbar().changePage(1);
        this.refresh();
    }
});
Ext.reg('ec-grid-reply-templates', easyComm.grid.ReplyTemplates);