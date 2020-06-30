jQuery(function() {
    jQuery(document).ajaxSuccess(function(e, xhr, settings) {
        var widget_id_base = 'ef_exhibitors';
        if (settings.data.search('action=save-widget') != -1 && settings.data.search('id_base=' + widget_id_base) != -1) {
            vertoh_widget_exhibitors_refresh_sortable();
        }
    });

    vertoh_widget_exhibitors_refresh_sortable();
});

function vertoh_widget_exhibitors_refresh_sortable() {
    jQuery('#homepage #sortable_exhibitors_1, #homepage #sortable_exhibitors_2').sortable({
        connectWith: ".sortable_exhibitors",
        update: function(event, ui) {
            jQuery(this).closest('.sortable-container').find('[name*=exhibitorslist]').val(jQuery(this).closest('.sortable-container').find("#sortable_exhibitors_1").sortable('toArray', {
                attribute: "data-id"
            }).toString());
        }
    }).disableSelection();
}