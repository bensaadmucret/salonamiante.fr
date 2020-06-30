jQuery(function() {
    jQuery(document).ajaxSuccess(function(e, xhr, settings) {
        var widget_id_base = 'ef_speakers';
        if (settings.data.search('action=save-widget') != -1 && settings.data.search('id_base=' + widget_id_base) != -1) {
            vertoh_widget_speakers_refresh_sortable();
        }
    });

    vertoh_widget_speakers_refresh_sortable();
});

function vertoh_widget_speakers_refresh_sortable() {
    jQuery('#homepage #sortable_speakers_1, #homepage #sortable_speakers_2').sortable({
        connectWith: ".sortable_speakers",
        update: function(event, ui) {
            jQuery(this).closest('.sortable-container').find('[name*=speakerslist]').val(jQuery(this).closest('.sortable-container').find("#sortable_speakers_1").sortable('toArray', {
                attribute: "data-id"
            }).toString());
        }
    }).disableSelection();
}