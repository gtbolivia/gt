$(document).ready(function () {
    $('ul.tree').hide();
    $('label.tree-toggler').click(function () {
        $(this).parent().children('ul.tree').toggle(300);
    });
});