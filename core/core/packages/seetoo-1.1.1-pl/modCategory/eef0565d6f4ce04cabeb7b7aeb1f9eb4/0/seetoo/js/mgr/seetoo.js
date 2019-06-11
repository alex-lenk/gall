var SeeToo = function (config) {
	config = config || {};
	SeeToo.superclass.constructor.call(this, config);
};
Ext.extend(SeeToo, Ext.Component, {
	page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});

Ext.reg('SeeToo', SeeToo);
SeeToo = new SeeToo();