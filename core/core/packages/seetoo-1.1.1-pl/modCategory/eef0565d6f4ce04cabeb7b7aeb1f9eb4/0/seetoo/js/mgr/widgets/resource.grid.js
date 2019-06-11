SeeToo.grid.Resources = function (config) {
	config = config || {};
	if (!config.id) {
		config.id = 'seetoo-grid-resources';
	}
	Ext.applyIf(config, {
		id: 'seetoo-grid-resources',
		url: SeeToo.config.connectorUrl,
		fields: this.getFields(config),
		columns: this.getColumns(config),
		tbar: this.getTopBar(config),
		sm: new Ext.grid.CheckboxSelectionModel(),
		baseParams: {
			action: 'mgr/resource/getlist'
			,resource: MODx.request.id
		},
		listeners: {
			rowDblClick: function (grid, rowIndex, e) {
				var row = grid.store.getAt(rowIndex);
				this.updateItem(grid, e, row);
			}
		},
		viewConfig: {
			forceFit: true,
			enableRowBody: true,
			autoFill: true,
			showPreview: true,
			scrollOffset: 0,
			//getRowClass: function (rec, ri, p) {
			//	return !rec.data.active
			//		? 'SeeToo-grid-row-disabled'
			//		: '';
			//}
		},
		paging: true,
		remoteSort: true,
		autoHeight: true,
	});
	SeeToo.grid.Resources.superclass.constructor.call(this, config);

	// Clear selection on grid refresh
	this.store.on('load', function () {
		if (this._getSelectedIds().length) {
			this.getSelectionModel().clearSelections();
		}
	}, this);
};
Ext.extend(SeeToo.grid.Resources, MODx.grid.Grid, {
	windows: {},

	getMenu: function (grid, rowIndex) {
		var ids = this._getSelectedIds();

		var row = grid.getStore().getAt(rowIndex);
		var menu = SeeToo.utils.getMenu(row.data['actions'], this, ids);

		this.addContextMenuItem(menu);
	},

	createItem: function (btn, e) {
		var w = MODx.load({
			xtype: 'seetoo-item-window-create',
			id: Ext.id(),
			listeners: {
				success: {
					fn: function () {
						this.refresh();
					}, scope: this
				}
			}
		});
		w.reset();
		w.setValues({resource_from: MODx.request.id, active: true});
		w.show(e.target);
	},

	updateItem: function (btn, e, row) {
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
				action: 'mgr/resource/get',
				id: id
			},
			listeners: {
				success: {
					fn: function (r) {
						var w = MODx.load({
							xtype: 'seetoo-item-window-update',
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

	removeItem: function (act, btn, e) {
		var ids = this._getSelectedIds();
		if (!ids.length) {
			return false;
		}
		MODx.msg.confirm({
			title: ids.length > 1
				? _('seetoo_resources_remove')
				: _('seetoo_resource_remove'),
			text: ids.length > 1
				? _('seetoo_resources_remove_confirm')
				: _('seetoo_resources_remove_confirm'),
			url: this.config.url,
			params: {
				action: 'mgr/resource/remove',
				ids: Ext.util.JSON.encode(ids),
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
	disableItem: function (act, btn, e) {
		var ids = this._getSelectedIds();
		if (!ids.length) {
			return false;
		}
		MODx.Ajax.request({
			url: this.config.url,
			params: {
				action: 'mgr/resource/disable',
				ids: Ext.util.JSON.encode(ids),
			},
			listeners: {
				success: {
					fn: function () {
						this.refresh();
					}, scope: this
				}
			}
		})
	},

	enableItem: function (act, btn, e) {
		var ids = this._getSelectedIds();
		if (!ids.length) {
			return false;
		}
		MODx.Ajax.request({
			url: this.config.url,
			params: {
				action: 'mgr/resource/enable',
				ids: Ext.util.JSON.encode(ids),
			},
			listeners: {
				success: {
					fn: function () {
						this.refresh();
					}, scope: this
				}
			}
		})
	},

	getFields: function (config) {
		return ['id', 'resource_to', 'pagetitle', 'view', 'active', 'actions'];
	},

	getColumns: function (config) {
		return [{
			header: _('seetoo_resource_id'),
			dataIndex: 'id',
			sortable: true,
			width: 70
		//}, {
		//	header: _('seetoo_resource_from'),
		//	dataIndex: 'resource_from',
		//	sortable: true,
		//	width: 200,
		//	hidden: true
		//}, {
		//	header: _('seetoo_resource_to'),
		//	dataIndex: 'resource_to',
		//	sortable: true,
		//	width: 250,
		}, {
			header: _('seetoo_pagetitle'),
			dataIndex: 'pagetitle',
			sortable: true,
			width: 450,
		}, {
			header: _('seetoo_resource_view'),
			dataIndex: 'view',
			sortable: true,
			width: 70,
		}, {
			header: _('seetoo_grid_actions'),
			dataIndex: 'actions',
			renderer: SeeToo.utils.renderActions,
			sortable: false,
			width: 70,
			id: 'actions'
		}];
	},

	getTopBar: function (config) {
		return [{
			text: '<i class="icon icon-plus"></i>&nbsp;' + _('seetoo_resource_create'),
			handler: this.createItem,
			scope: this
		}, '->'
		//	, {
		//	xtype: 'textfield',
		//	name: 'query',
		//	width: 200,
		//	id: config.id + '-search-field',
		//	emptyText: _('seetoo_grid_search'),
		//	listeners: {
		//		render: {
		//			fn: function (tf) {
		//				tf.getEl().addKeyListener(Ext.EventObject.ENTER, function () {
		//					this._doSearch(tf);
		//				}, this);
		//			}, scope: this
		//		}
		//	}
		//}
		];
	},

	onClick: function (e) {
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
	},

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
	}
});
Ext.reg('seetoo-grid-resources', SeeToo.grid.Resources);
