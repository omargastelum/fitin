$(document).ready(function() {
    $('.edit').click(function() {
        $(this).addClass('editMode');
    });

    $('.edit').focusout(function() {
        $(this).removeClass('editMode');
    });
});