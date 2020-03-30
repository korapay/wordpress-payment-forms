'use strict';

(function () {
    tinymce.create('tinymce.plugins.kp_plugin', {
        init: function (editor, url) {
            var assetsUrl = url.replace('/js', '/');
            editor.addCommand('kp_insert_shortcode', function () {

                var selected = tinymce.activeEditor.selection.getContent();
                var content = (selected) ? '[kp-pay-button]' + selected + '[/kp-pay-button]' : '[kp-pay-button]';
                tinymce.execCommand('mceInsertContent', false, content);

            });

            editor.addButton('kp_button', {
                title: 'Insert Korapay payment shortcode',
                cmd: 'kp_insert_shortcode',
                image: assetsUrl + 'images/edited.png',
            });
        },
    });

    tinymce.PluginManager.add('kp_button', tinymce.plugins.kp_plugin);

})();
