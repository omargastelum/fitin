$(document).ready(function() {
    var initialValue = '';
    $('.edit').click(function() {
        $(this).addClass('editMode');
    });

    $('.edit').focus(function() {
        initialValue = $(this).text();
    });

    $('.edit').focusout(function() {
        $(this).removeClass('editMode');
        var value = $(this).text();
        var field = $(this).attr('id').split('-')[0];
        var id = $(this).attr('id').split('-')[1];

        if (value != '') {

            $.ajax({
                url: 'index.php?user/edit',
                type: 'POST',
                data: {
                    id: id,
                    field: field,
                    value: value
                }
            });

        } else {
            $(this).text(initialValue);
        }
    });

    $('.deleteBtn').click(function() {
        var id = $(this).attr('id').split('-')[1];
        var row = $(this).parent().parent();
    
        $.ajax({
            url: 'index.php?user/delete',
            type: 'POST',
            data: {
                id: id
            },
            success: function(data, textStatus, jqXHR) {
                row.remove();
            }
        });
    });
});