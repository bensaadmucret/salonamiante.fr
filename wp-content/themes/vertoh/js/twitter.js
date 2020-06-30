jQuery(document).ready(function() {
    jQuery('#twitter_update_list').tweetMachine(
            '#' + vertoh_twitter_hash, {
                backendScript: ajaxurl,
                tweetFormat: false,
                limit: 9,
                rate: 30000
            },
    function(tweets, tweetsDisplayed) {
        stream_html = '';
        tweets_html = new Array();
        for (var i = 0; i < tweets.length; i++) {
            tweet_html = '';
            if (i === 0)
                tweet_html += '<div class="wide-panel tweet row">';
            else
                tweet_html += '<div class="col-sm-3">';

            tweet_html += '<div class="tweet-box">\
                            <a href="http://twitter.com/' + tweets[i].user.screen_name + '" target="_blank"><img class="tweet-image avatar" src="' + tweets[i].user.profile_image_url.replace("normal", "reasonably_small") + '" alt="" width="50" height="50" /></a>\
                            <a class="tweet-title time" href="http://twitter.com/' + tweets[i].user.screen_name + '/status/' + tweets[i].id_str + '" target="_blank">' + this.relativeTime(tweets[i].created_at) + '</a>\
                            <a href="http://twitter.com/' + tweets[i].user.screen_name + '" target="_blank"><span class="tweet-user username">' + tweets[i].user.screen_name + '</span></a>\
                            <p class="tweet-content content">' + this.parseText(tweets[i].text) + '</p>\
                          </div>';

            tweet_html += '</div>';
            tweets_html.push(tweet_html);
        }

        if (tweets_html.length > 0) {
            stream_html += tweets_html[0];
            //delete tweets_html[0];
            // chunk array by 4
            var i, j, tweets_html_chunks;
            for (i = 1, j = tweets_html.length; i < j; i += 4) {
                tweets_html_chunks = tweets_html.slice(i, i + 4);
                if (tweets_html_chunks && tweets_html_chunks.length > 0) {
                    stream_html += '<div class="row">';
                    for (var z = 0; z < tweets_html_chunks.length; z++) {
                        stream_html += tweets_html_chunks[z];
                    }
                    stream_html += '</div>';
                }
            }
        }

        jQuery('#twitter_update_list').html(stream_html);
    });
});