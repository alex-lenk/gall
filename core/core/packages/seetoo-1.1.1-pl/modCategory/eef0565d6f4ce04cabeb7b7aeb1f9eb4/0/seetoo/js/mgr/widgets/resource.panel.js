SeeToo.panel.Tab = function(config) {
	config = config || {};
	Ext.apply(config,{
		id: 'seetoo-page',
		baseCls: 'x-panel',
		items: [{
			border: false,
			baseCls: 'panel-desc',
			html: '<p>' + _('seetoo_introtext') + '</p>'
		},{
			border: false,
			style: {padding: '5px', overflow: 'hidden'},
			layout: 'anchor',
			items: [{
				border: false,
				xtype: 'seetoo-grid-resources',
				id: 'seetoo-grid-resources',
				record: config.record,
				gridHeight: 150,
				pageSize: config.pageSize || 50
			}]
			//,{
			//	border: false,
			//	xtype: 'seetoo-images-panel',
			//	id: 'seetoo-images-panel',
			//	cls: 'modx-pb-view-ct',
			//	resource_id: config.record.id,
			//	pageSize: config.pageSize || 50
			//}]
		}]
	});
	SeeToo.panel.Tab.superclass.constructor.call(this,config);
};
Ext.extend(SeeToo.panel.Tab,MODx.Panel);
Ext.reg('seetoo-page',SeeToo.panel.Tab);