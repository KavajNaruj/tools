$(function() {
    var init = function () {
        $('textarea[data-aceeditor]').each(function() {
            var textarea = $(this);
            var mode = textarea.data('aceeditor');
            var editDiv = $('<div>', {
                position: 'absolute',
                width: textarea.width(),
                height: textarea.height(),
                'class': textarea.attr('class')
            }).insertBefore(textarea);
            textarea.css('visibility', 'hidden');
            var editor = ace.edit(editDiv[0]);
            editor.getSession().setValue(textarea.val());
            editor.getSession().setMode("ace/mode/" + mode);
            editor.setAutoScrollEditorIntoView(true);
            editor.setOption("minLines", 10);
            editor.setOption("maxLines", 30);
            textarea.addClass('hide');

            // copy back to textarea on form submit...
            textarea.closest('form').submit(function() {
                textarea.val(editor.getSession().getValue());
            })
        });

        var clipboard = new Clipboard('.btn');
        clipboard.on('success', function(e) {
            e.clearSelection();
        });
    };

    init();

    _context.invoke(function(di) {
        di.getService('page').on('update', function(evt) {
            init();
        });
    });
});
