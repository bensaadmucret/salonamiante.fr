jQuery(document).ready(function() {
    refreshInstagrams();
    setInterval(refreshInstagrams, 30000);
});

function refreshInstagrams() {
    jQuery.post(
            ajaxurl,
            {action: 'get_instagrams', limit: 9},
    function(instagrams, textStatus, jqXHR) {
        instagrams_html = new Array();
        for (var i = 0; i < instagrams.length; i++) {
            instagram_html = '';
            if (i === 0)
                instagram_html += '<div class="featured img-text col-xs-6 no-margin">';
            else
                instagram_html += '<div class="col-xs-6 img-text">';

            instagram_html += '<h6>' + instagrams[i].user.username + '</h6><img src="' + instagrams[i].images.standard_resolution.url + '" alt="' + (instagrams[i].caption ? instagrams[i].caption.text : '') + '" />';

            instagram_html += '</div>';
            instagrams_html.push(instagram_html);
        }

        jQuery('#instagram_update_list').html(instagrams_html);
    },
            'json');
}