ms2Gallery.utils.formatDate = function (string) {
    if (string && string != '0000-00-00 00:00:00' && string != 0) {
        var date = /^[0-9]+$/.test(string)
            ? new Date(string * 1000)
            : new Date(string.replace(/(\d+)-(\d+)-(\d+)/, '$2/$3/$1'));

        return date.strftime(MODx.config.ms2gallery_date_format);
    }
    else {
        return '&nbsp;';
    }
};

ms2Gallery.utils.userLink = function (val, cell, row) {
    if (!val) {
        return '';
    }
    var action = MODx.action ? MODx.action['security/user/update'] : 'security/user/update';
    var url = 'index.php?a=' + action + '&id=' + row.data['user_id'];

    return '<a href="' + url + '" target="_blank" class="ms2gallery-link">' + val + '</a>'
};

ms2Gallery.utils.formatSize = function (size) {
    if (size >= 1048576) {
        size = Math.round(size / 1048576).toFixed(2) + ' Mb';
    }
    else if (size >= 1024) {
        size = Math.round(size / 1024) + ' Kb';
    }
    else {
        size += ' B';
    }

    return size;
};

ms2Gallery.utils.getMenu = function (actions, grid, selected) {
    var menu = [];
    var cls, icon, title, action = '';

    var has_delete = false;
    for (var i in actions) {
        if (!actions.hasOwnProperty(i)) {
            continue;
        }

        var a = actions[i];
        if (!a['menu']) {
            if (a == '-') {
                menu.push('-');
            }
            continue;
        }
        else if (menu.length > 0 && !has_delete && (/^remove/i.test(a['action']) || /^delete/i.test(a['action']))) {
            menu.push('-');
            has_delete = true;
        }

        if (selected.length > 1) {
            if (!a['multiple']) {
                continue;
            }
            else if (typeof(a['multiple']) == 'string') {
                a['title'] = a['multiple'];
            }
        }

        icon = a['icon'] ? a['icon'] : '';
        if (typeof(a['cls']) == 'object') {
            if (typeof(a['cls']['menu']) != 'undefined') {
                icon += ' ' + a['cls']['menu'];
            }
        }
        else {
            cls = a['cls'] ? a['cls'] : '';
        }
        title = a['title'] ? a['title'] : a['title'];
        action = a['action'] ? grid[a['action']] : '';

        menu.push({
            handler: action,
            text: String.format(
                '<span class="{0}"><i class="x-menu-item-icon {1}"></i>{2}</span>',
                cls, icon, title
            ),
            scope: grid
        });
    }

    return menu;
};