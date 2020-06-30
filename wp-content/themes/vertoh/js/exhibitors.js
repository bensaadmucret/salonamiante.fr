function vertoh_get_querystring_without_param(paramArray) {
    var queryParameters = {}, queryString = location.search.substring(1),
            re = /([^&=]+)=([^&]*)/g, m;
    while (m = re.exec(queryString)) {
        queryParameters[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
    }
    for (i = 0; i <= paramArray.length; i++)
        delete queryParameters[paramArray[i]];
    return jQuery.param(queryParameters);
}

jQuery(function() {
    jQuery('#search-letter').on('click', 'a[data-search]', function(e) {
        e.preventDefault();
        new_url = window.location.origin + window.location.pathname + '?' + vertoh_get_querystring_without_param(['letter', 'category', 'text', 'paged']);
        if (window.location.href.indexOf('?') == -1)
            new_url += '?';
        else
            new_url += '&';
        window.location.href = new_url + 'letter=' + jQuery(this).attr('data-search');
        return false;
    });

    jQuery('#search-category').on('click', 'a[data-search]', function(e) {
        e.preventDefault();
        new_url = window.location.origin + window.location.pathname + '?' + vertoh_get_querystring_without_param(['letter', 'category', 'text', 'paged']);
        if (window.location.href.indexOf('?') == -1)
            new_url += '?';
        else
            new_url += '&';
        window.location.href = new_url + 'category=' + jQuery(this).attr('data-search');
        return false;
    });

    jQuery('.search-form').on('click', 'button', function(e) {
        e.preventDefault();
        new_url = window.location.origin + window.location.pathname + '?' + vertoh_get_querystring_without_param(['letter', 'category', 'text', 'paged']);
        if (window.location.href.indexOf('?') == -1)
            new_url += '?';
        else
            new_url += '&';
        window.location.href = new_url + 'text=' + jQuery('.search-form input[type=text]').val();
        return false;
    });
    
    jQuery('body').on('click', '#exhibitor_clear_search', function(e) {
        e.preventDefault();
        new_url = window.location.origin + window.location.pathname + '?' + vertoh_get_querystring_without_param(['letter', 'category', 'text', 'paged']);
        window.location.href = new_url;
        return false;
    });
});