jQuery(document).ready(function ($) {

    jQuery('.widget').on('click', '.remove_image_id', function () {
        container = jQuery(this).parent();
        container.find('.upload_image_id').val('');
        container.find('.upload_image').attr('src', '');
        return false;
    });

    jQuery(document).ajaxSuccess(function (e, xhr, settings) {
        var widget_id_base = 'ef_calltoaction';
        if (settings.data.search('action=save-widget') != -1 && settings.data.search('id_base=' + widget_id_base) != -1) {
            vertoh_widget_calltoaction_refresh();
        }
    });

    vertoh_widget_calltoaction_refresh();
});

function vertoh_widget_calltoaction_refresh() {
    item1 = jQuery('#homepage [id*=calltoactiontextcolor_picker]');
    item2 = jQuery('#homepage [id*=calltoactionbuttonhovercolor_picker]');

    if (item1.length)
        jQuery(item1).farbtastic('#homepage input[id*=calltoactiontextcolor_text]');
    if (item2.length)
        jQuery(item2).farbtastic('#homepage input[id*=calltoactionbuttonhovercolor_text]');
}