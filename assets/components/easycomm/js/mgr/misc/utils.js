easyComm.combo.ThreadResource = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        fields: ['id','title']
        ,valueField: 'id'
        ,displayField: 'title'
        ,hiddenName: 'resource'
        ,allowBlank: false
        ,url: easyComm.config.connector_url
        ,baseParams: {
            action: 'mgr/system/element/resource/getlist'
            ,combo: 1
            ,id: config.value
        }
        ,pageSize: 20
        ,width: 300
        ,editable: true
    });
    easyComm.combo.ThreadResource.superclass.constructor.call(this,config);
};
Ext.extend(easyComm.combo.ThreadResource,MODx.combo.ComboBox);
Ext.reg('ec-combo-resource',easyComm.combo.ThreadResource);


easyComm.combo.MessageThread = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        fields: ['id','title']
        ,valueField: 'id'
        ,displayField: 'title'
        ,hiddenName: 'thread'
        ,allowBlank: false
        ,url: easyComm.config.connector_url
        ,baseParams: {
            action: 'mgr/thread/getcombolist'
            ,combo: 1
            ,id: config.value
        }
        ,pageSize: 20
        ,width: 300
        ,editable: true
    });
    easyComm.combo.MessageThread.superclass.constructor.call(this,config);
};
Ext.extend(easyComm.combo.MessageThread, MODx.combo.ComboBox);
Ext.reg('ec-combo-thread',easyComm.combo.MessageThread);


easyComm.combo.ReplyTemplate = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        fields: ['id', 'text', 'preview']
        ,valueField: 'id'
        ,displayField: 'preview'
        ,hiddenName: 'reply-template'
        ,allowBlank: true
        ,url: easyComm.config.connector_url
        ,baseParams: {
            action: 'mgr/reply-template/getcombolist'
            ,combo: 1
            ,id: config.value
            ,message: config.messageId
        }
        ,pageSize: 20
        ,width: 300
        ,editable: true
    });
    easyComm.combo.ReplyTemplate.superclass.constructor.call(this,config);
};
Ext.extend(easyComm.combo.ReplyTemplate, MODx.combo.ComboBox);
Ext.reg('ec-combo-reply-template',easyComm.combo.ReplyTemplate);


MODx.panel.easyCommImageField = function(config) {
    config = config || {};
    config.filemanager_url = MODx.config.filemanager_url;
    Ext.applyIf(config,{
        layout: 'form'
        ,autoHeight: true
        ,border: false
        ,hideLabels: true
        ,defaults: {
            autoHeight: true
            ,border: false
        }
        ,items: [{
            xtype: 'modx-combo-browser'
            ,browserEl: config.id + '-browser'
            //,name: 'browser'+config.id
            ,name: config.name
            ,id: config.id + '-browser'
            //,id: 'browser'+config.id
            ,triggerClass: 'x-form-image-trigger'
            ,anchor:'100%'
            //,value: config.relativeValue
            ,hideFiles: true
            ,allowedFileTypes: config.allowedFileTypes || 'jpg,jpeg,png,gif'
            ,source: config.source || MODx.config.default_media_source
            ,openTo: config.openTo || ''
            ,hideSourceCombo: true
            ,listeners: {
                'select': {fn:function(data) {
                    //Ext.getCmp(this.config.id + '-browser').setValue(data.relativeUrl);
                    this.updatePreview(this.config.id, config.source, data.url);
                    this.fireEvent('select',data);
                },scope:this}
                ,'change': {fn:function(cb,nv) {
                    this.updatePreview(this.config.id, config.source, nv);
                    this.fireEvent('select',{
                        relativeUrl: nv
                        ,url: nv
                    });
                },scope:this}
            }
        },{
            id: config.id + '-preview',
            style: {margin: '10px 0'}
            ,listeners: {
                'afterrender': {fn:function(comp) {
                    this.updatePreview(config.id, config.source, Ext.getCmp(config.id + '-browser').getValue());
                    this.fireEvent('render',comp);
                },scope:this}
            }
        }]
    });
    MODx.panel.easyCommImageField.superclass.constructor.call(this,config);
    this.addEvents({select: true});
};
Ext.extend(MODx.panel.easyCommImageField, MODx.Panel, {
    updatePreview: function(id, source, url) {
        var previewPanel = Ext.get(id + '-preview');
        if (Ext.isEmpty(url)) {
            previewPanel.update('');
        } else {
            previewPanel.update('<a target="_blank" href="' + MODx.config.base_url + url + '"><img src="'+MODx.config.connectors_url+'system/phpthumb.php?h=150&w=150&src='+url+'&source=' + source + '" /></a>');
        }
    }
});
Ext.reg('ec-image-field',MODx.panel.easyCommImageField);

easyComm.utils.renderBoolean = function (val, cell, row) {
	return val
		? String.format('<span class="green">{0}</span>', _('yes'))
		: String.format('<span class="red">{0}</span>', _('no'));
};

easyComm.utils.renderImage = function(val, cell, row) {
    var source = this.source || MODx.config.default_media_source;
    return val ?
        '<a target="_blank" href="' + MODx.config.base_url + val + '"><img src="'+MODx.config.connectors_url+'system/phpthumb.php?h=50&w=150&far=0&src='+val+'&source=' + source + '" /></a>'
        :
        '';
}

easyComm.utils.renderRating = function(val, props, row) {
    if(easyComm.config.rating_visual_editor) {
        var result = [];
        for(var i = 1; i <= 5; i++) {
            if(val >= i){
                result.push('<i class="icon icon-star"></i>');
            }
            else if(val > i - 1 && val < i){
                result.push('<i class="icon icon-star-half-o"></i>');
            }
            else {
                result.push('<i class="icon icon-star-o"></i>');
            }
        }
        result.push('');
        return '<span title="' + val + '" class="ec-grid-rating-stars">' + result.join('') + '</span>';
    }
    return val;
}

easyComm.utils.Hash = {
    get: function () {
        var vars = {}, hash, splitter, hashes;

        var pos = window.location.href.indexOf('?');
        hashes = (pos != -1) ? decodeURIComponent(window.location.href.substr(pos + 1)) : '';
        splitter = '&';

        if (hashes.length == 0) {
            return vars;
        }
        else {
            hashes = hashes.split(splitter);
        }

        for (var i in hashes) {
            if (hashes.hasOwnProperty(i)) {
                hash = hashes[i].split('=');
                if (typeof hash[1] == 'undefined') {
                    vars['anchor'] = hash[0];
                }
                else {
                    vars[hash[0]] = hash[1];
                }
            }
        }
        return vars;
    },

    set: function (vars) {
        var hash = '';
        for (var i in vars) {
            if (vars.hasOwnProperty(i)) {
                hash += '&' + i + '=' + vars[i];
            }
        }

        if (hash.length != 0) {
            hash = '?' + hash.substr(1);
        }
        window.history.pushState(hash, '', document.location.pathname + hash);
    },

    add: function (key, val) {
        var hash = this.get();
        hash[key] = val;
        this.set(hash);
    },

    remove: function (key) {
        var hash = this.get();
        delete hash[key];
        this.set(hash);
    },

    clear: function () {
        this.set({});
    }
};