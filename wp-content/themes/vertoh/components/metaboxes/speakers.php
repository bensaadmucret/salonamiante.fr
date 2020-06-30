<?php
add_action('add_meta_boxes', 'vertoh_speakers_metabox');

function vertoh_speakers_metabox() {
    if (get_page_template_slug() == 'speakers.php') {
        add_meta_box('metabox-speakers-full-screen-calltoaction', __('Call To Action', 'vertoh'), 'vertoh_metabox_speakers_full_screen_calltoaction', 'page', 'normal', 'high');
    }
}

function vertoh_metabox_speakers_full_screen_calltoaction($post) {
    $speakers_calltoaction_status = get_post_meta($post->ID, 'speakers_calltoaction_status', true);
    $speakers_calltoaction_title = get_post_meta($post->ID, 'speakers_calltoaction_title', true);
    $speakers_calltoaction_subtitle = get_post_meta($post->ID, 'speakers_calltoaction_subtitle', true);
    $speakers_calltoaction_image = get_post_meta($post->ID, 'speakers_calltoaction_image', true);
    $speakers_calltoaction_buttontext = get_post_meta($post->ID, 'speakers_calltoaction_buttontext', true);
    $speakers_calltoaction_buttonurl = get_post_meta($post->ID, 'speakers_calltoaction_buttonurl', true);
    $speakers_calltoaction_textcolor = get_post_meta($post->ID, 'speakers_calltoaction_textcolor', true);
    $speakers_calltoaction_buttonhovercolor = get_post_meta($post->ID, 'speakers_calltoaction_buttonhovercolor', true);
    ?>
    <p>
        <label for="speakers_calltoaction_status"><?php _e('Status', 'vertoh'); ?></label>
        <select class="widefat" id="speakers_calltoaction_status" name="speakers_calltoaction_status">
            <option value="0"<?php if ($speakers_calltoaction_status == 0) echo ' selected="selected"'; ?>><?php _e('Disabled', 'vertoh'); ?></option>
            <option value="1"<?php if ($speakers_calltoaction_status == 1) echo ' selected="selected"'; ?>><?php _e('Enabled', 'vertoh'); ?></option>
        </select>
    </p>
    <p>
        <label for="speakers_calltoaction_title"><?php _e('Title', 'vertoh'); ?></label>
        <input type="text" class="widefat" id="speakers_calltoaction_title" name="speakers_calltoaction_title" value="<?php echo $speakers_calltoaction_title; ?>" />
    </p>
    <p>
        <label for="speakers_calltoaction_textcolor"><?php _e('Text Color', 'vertoh'); ?></label>
        <input type="text" class="widefat" id="speakers_calltoaction_textcolor" name="speakers_calltoaction_textcolor" value="<?php echo!empty($speakers_calltoaction_textcolor) ? $speakers_calltoaction_textcolor : '#000000'; ?>" />
    <div id="speakers_calltoaction_textcolor_picker"></div>
    <p>
    <p>
        <label for="speakers_calltoaction_subtitle"><?php _e('Subtitle', 'vertoh'); ?></label>
        <input type="text" class="widefat" id="speakers_calltoaction_subtitle" name="speakers_calltoaction_subtitle" value="<?php echo $speakers_calltoaction_subtitle; ?>" />
    </p>
    <p>
        <label for="speakers_calltoaction_image"><?php _e('Image', 'vertoh'); ?></label>
        <br />
        <input id="upload_image_button_speakers" class="upload_image_button" type="button" value="Upload" />
        <small><?php _e('Recommendend size: '); ?>1920x566</small>
        <br/>
        <img class="upload_image" src="<?php if (!empty($speakers_calltoaction_image)) echo wp_get_attachment_url($speakers_calltoaction_image); ?>" style="max-width: 100%;" />
        <input type="hidden" id="speakers_calltoaction_image" name="speakers_calltoaction_image" class="upload_image_id" value="<?php echo $speakers_calltoaction_image; ?>" />
        <br/>
        <?php if (!empty($speakers_calltoaction_image)) { ?>
            <input type="button" class="upload_image_delete" value="<?php _e('Remove', 'vertoh'); ?>"/>
        <?php } ?>
    </p>
    <p>
        <label for="speakers_calltoaction_buttontext"><?php _e('Button Text', 'vertoh'); ?></label>
        <input type="text" class="widefat" id="speakers_calltoaction_buttontext" name="speakers_calltoaction_buttontext" value="<?php echo $speakers_calltoaction_buttontext; ?>" />
    </p>
    <p>
        <label for="speakers_calltoaction_buttonurl"><?php _e('Button URL', 'vertoh'); ?></label>
        <input type="text" class="widefat" id="speakers_calltoaction_buttonurl" name="speakers_calltoaction_buttonurl" value="<?php echo $speakers_calltoaction_buttonurl; ?>" />
    </p>
    <p>
        <label for="speakers_calltoaction_buttonhovercolor"><?php _e('Button Hover Background Color', 'vertoh'); ?></label>
        <input type="text" class="widefat" id="speakers_calltoaction_buttonhovercolor" name="speakers_calltoaction_buttonhovercolor" value="<?php echo!empty($speakers_calltoaction_buttonhovercolor) ? $speakers_calltoaction_buttonhovercolor : '#000000'; ?>" />
    <div id="speakers_calltoaction_buttonhovercolor_picker"></div>
    </p>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('#speakers_calltoaction_textcolor_picker').farbtastic('#speakers_calltoaction_textcolor');
            jQuery('#speakers_calltoaction_buttonhovercolor_picker').farbtastic('#speakers_calltoaction_buttonhovercolor');
        });
    </script>
    <?php
}

add_action('save_post', 'vertoh_speakers_save_post');

function vertoh_speakers_save_post($id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (get_page_template_slug() == 'speakers.php') {
        if (isset($_POST['speakers_calltoaction_status']))
            update_post_meta($id, 'speakers_calltoaction_status', $_POST['speakers_calltoaction_status']);

        if (isset($_POST['speakers_calltoaction_title']))
            update_post_meta($id, 'speakers_calltoaction_title', $_POST['speakers_calltoaction_title']);

        if (isset($_POST['speakers_calltoaction_subtitle']))
            update_post_meta($id, 'speakers_calltoaction_subtitle', $_POST['speakers_calltoaction_subtitle']);

        if (isset($_POST['speakers_calltoaction_image']))
            update_post_meta($id, 'speakers_calltoaction_image', $_POST['speakers_calltoaction_image']);

        if (isset($_POST['speakers_calltoaction_buttontext']))
            update_post_meta($id, 'speakers_calltoaction_buttontext', $_POST['speakers_calltoaction_buttontext']);

        if (isset($_POST['speakers_calltoaction_buttonurl']))
            update_post_meta($id, 'speakers_calltoaction_buttonurl', $_POST['speakers_calltoaction_buttonurl']);

        if (isset($_POST['speakers_calltoaction_textcolor']))
            update_post_meta($id, 'speakers_calltoaction_textcolor', $_POST['speakers_calltoaction_textcolor']);

        if (isset($_POST['speakers_calltoaction_buttonhovercolor']))
            update_post_meta($id, 'speakers_calltoaction_buttonhovercolor', $_POST['speakers_calltoaction_buttonhovercolor']);
    }
}
