SeeToo.window.CreateItem = function (config) {
	config = config || {};
	if (!config.id) {
		config.id = 'seetoo-item-window-create';
	}
	Ext.applyIf(config, {
		title: _('seetoo_item_create'),
		width: 350,
		autoHeight: true,
		url: SeeToo.config.connectorUrl,
		action: 'mgr/resource/create',
		fields: this.getFields(config),
		keys: [{
			key: Ext.EventObject.ENTER, shift: true, fn: function () {
				this.submit()
			}, scope: this
		}]
	});
	SeeToo.window.CreateItem.superclass.constructor.call(this, config);
};
Ext.extend(SeeToo.window.CreateItem, MODx.Window, {

	getFields: function (config) {
		return [{
			//xtype: 'numberfield',
			xtype: 'hidden',
			//fieldLabel: _('seetoo_resource_from'),
			name: 'resource_from',
			id: config.id + '-resource_from',
			//anchor: '99%',
			//allowBlank: false,
		}, {
			xtype: 'seetoo-combo-resource',
			name: 'resource_to',
			id: config.id + '-resource_to',
			fieldLabel: _('seetoo_resource_to'),
			allowBlank: false,
			anchor: '99%'
		}, {
			xtype: 'numberfield',
			fieldLabel: _('seetoo_resource_view'),
			name: 'view',
			id: config.id + '-view',
			default : 1,
			anchor: '99%'
		}];
	},

	loadDropZones: function() {
	}

});
Ext.reg('seetoo-item-window-create', SeeToo.window.CreateItem);


SeeToo.window.UpdateItem = function (config) {
	config = config || {};
	if (!config.id) {
		config.id = 'seetoo-item-window-update';
	}
	Ext.applyIf(config, {
		title: _('seetoo_resource_update'),
		width: 350,
		autoHeight: true,
		url: SeeToo.config.connectorUrl,
		action: 'mgr/resource/update',
		fields: this.getFields(config),
		keys: [{
			key: Ext.EventObject.ENTER, shift: true, fn: function () {
				this.submit()
			}, scope: this
		}]
	});
	SeeToo.window.UpdateItem.superclass.constructor.call(this, config);
};
Ext.extend(SeeToo.window.UpdateItem, MODx.Window, {

	getFields: function (config) {
		return [{
			xtype: 'hidden',
			name: 'id',
			id: config.id + '-id',
		//},{
		//	//xtype: 'numberfield',
		//	xtype: 'hidden',
		//	fieldLabel: _('seetoo_resource_from'),
		//	name: 'resource_from',
		//	id: config.id + '-resource_from',
		//	anchor: '99%',
		//	allowBlank: false,
		//}, {
		//	xtype: 'numberfield',
		//	fieldLabel: _('seetoo_resource_to'),
		//	name: 'resource_to',
		//	id: config.id + '-resource_to',
		//	allowBlank: false,
		//	anchor: '99%'
		}, {
			xtype: 'seetoo-combo-resource',
			name: 'resource_to',
			id: config.id + '-resource_to',
			fieldLabel: _('seetoo_resource_to'),
			allowBlank: false,
			anchor: '99%'
		}, {
			xtype: 'numberfield',
			fieldLabel: _('seetoo_resource_view'),
			name: 'view',
			id: config.id + '-view',
			default : 1,
			anchor: '99%'
		}];
	},

	loadDropZones: function() {
	}

});
Ext.reg('seetoo-item-window-update', SeeToo.window.UpdateItem);