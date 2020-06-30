<?php
add_action('add_meta_boxes', 'vertoh_exhibitor_metabox');

function vertoh_exhibitor_metabox() {
    add_meta_box('metabox-speakers-full-screen-exhibitor', __('Exhibitor Details', 'vertoh'), 'vertoh_metabox_exhibitor_details', 'exhibitor', 'normal', 'high');
}

function vertoh_metabox_exhibitor_details($post) {
    $exhibitor_subtitle = get_post_meta($post->ID, 'exhibitor_subtitle', true);
    $exhibitor_topdetail = get_post_meta($post->ID, 'exhibitor_topdetail', true);

    $exhibitor_detail1 = get_post_meta($post->ID, 'exhibitor_detail1', true);
    $exhibitor_detail2 = get_post_meta($post->ID, 'exhibitor_detail2', true);
    $exhibitor_detail3 = get_post_meta($post->ID, 'exhibitor_detail3', true);
    $exhibitor_detail4 = get_post_meta($post->ID, 'exhibitor_detail4', true);

    $exhibitor_title1 = get_post_meta($post->ID, 'exhibitor_title1', true);
    $exhibitor_title2 = get_post_meta($post->ID, 'exhibitor_title2', true);
    $exhibitor_title3 = get_post_meta($post->ID, 'exhibitor_title3', true);
    $exhibitor_title4 = get_post_meta($post->ID, 'exhibitor_title4', true);
    ?>
    <p>
        <label for="exhibitor_subtitle"><?php _e('Subtitle', 'vertoh'); ?></label>
        <input type="text" class="widefat" id="exhibitor_subtitle" name="exhibitor_subtitle" value="<?php echo $exhibitor_subtitle; ?>" />
    </p>
    <p>
        <label for="exhibitor_topdetail"><?php _e('Top Detail', 'vertoh'); ?></label>
        <textarea class="widefat" id="exhibitor_topdetail" name="exhibitor_topdetail"><?php echo $exhibitor_topdetail; ?></textarea>
    </p>
    <p>
        <strong><?php _e('Detail 1', 'vertoh'); ?></strong>
    </p>
    <p>
        <label for="exhibitor_title1"><?php _e('Title', 'vertoh'); ?></label>
        <textarea class="widefat" id="exhibitor_title1" name="exhibitor_title1"><?php echo $exhibitor_title1; ?></textarea>
    </p>
    <p>
        <label for="exhibitor_detail1"><?php _e('Description', 'vertoh'); ?></label>
        <textarea class="widefat" id="exhibitor_detail1" name="exhibitor_detail1"><?php echo $exhibitor_detail1; ?></textarea>
    </p>
    <p>
        <strong><?php _e('Detail 2', 'vertoh'); ?></strong>
    </p>
    <p>
        <label for="exhibitor_title2"><?php _e('Title', 'vertoh'); ?></label>
        <textarea class="widefat" id="exhibitor_title2" name="exhibitor_title2"><?php echo $exhibitor_title2; ?></textarea>
    </p>
    <p>
        <label for="exhibitor_detail2"><?php _e('Description', 'vertoh'); ?></label>
        <textarea class="widefat" id="exhibitor_detail2" name="exhibitor_detail2"><?php echo $exhibitor_detail2; ?></textarea>
    </p>
    <p>
        <strong><?php _e('Detail 3', 'vertoh'); ?></strong>
    </p>
    <p>
        <label for="exhibitor_title3"><?php _e('Title', 'vertoh'); ?></label>
        <textarea class="widefat" id="exhibitor_title3" name="exhibitor_title3"><?php echo $exhibitor_title3; ?></textarea>
    </p>
    <p>
        <label for="exhibitor_detail3"><?php _e('Description', 'vertoh'); ?></label>
        <textarea class="widefat" id="exhibitor_detail3" name="exhibitor_detail3"><?php echo $exhibitor_detail3; ?></textarea>
    </p>
    <p>
        <strong><?php _e('Detail 4', 'vertoh'); ?></strong>
    </p>
    <p>
        <label for="exhibitor_title4"><?php _e('Title', 'vertoh'); ?></label>
        <textarea class="widefat" id="exhibitor_title4" name="exhibitor_title4"><?php echo $exhibitor_title4; ?></textarea>
    </p>
    <p>
        <label for="exhibitor_detail4"><?php _e('Description', 'vertoh'); ?></label>
        <textarea class="widefat" id="exhibitor_detail4" name="exhibitor_detail4"><?php echo $exhibitor_detail4; ?></textarea>
    </p>
    <?php
}

add_action('save_post', 'vertoh_save_post');

function vertoh_save_post($id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (isset($_POST['post_type']) && $_POST['post_type'] === 'exhibitor') {
        if (isset($_POST['exhibitor_subtitle']))
            update_post_meta($id, 'exhibitor_subtitle', $_POST['exhibitor_subtitle']);

        if (isset($_POST['exhibitor_topdetail']))
            update_post_meta($id, 'exhibitor_topdetail', $_POST['exhibitor_topdetail']);

        if (isset($_POST['exhibitor_detail1']))
            update_post_meta($id, 'exhibitor_detail1', $_POST['exhibitor_detail1']);

        if (isset($_POST['exhibitor_detail2']))
            update_post_meta($id, 'exhibitor_detail2', $_POST['exhibitor_detail2']);

        if (isset($_POST['exhibitor_detail3']))
            update_post_meta($id, 'exhibitor_detail3', $_POST['exhibitor_detail3']);

        if (isset($_POST['exhibitor_detail4']))
            update_post_meta($id, 'exhibitor_detail4', $_POST['exhibitor_detail4']);

        if (isset($_POST['exhibitor_title1']))
            update_post_meta($id, 'exhibitor_title1', $_POST['exhibitor_title1']);

        if (isset($_POST['exhibitor_title2']))
            update_post_meta($id, 'exhibitor_title2', $_POST['exhibitor_title2']);

        if (isset($_POST['exhibitor_title3']))
            update_post_meta($id, 'exhibitor_title3', $_POST['exhibitor_title3']);

        if (isset($_POST['exhibitor_title4']))
            update_post_meta($id, 'exhibitor_title4', $_POST['exhibitor_title4']);
    }
}
