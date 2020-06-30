<?php
add_action('add_meta_boxes', 'vertoh_exhibitors_metabox');

function vertoh_exhibitors_metabox() {
    if (get_page_template_slug() == 'exhibitors.php') {
        add_meta_box('metabox-exhibitors-full-screen-calltoaction', __('Call To Action', 'vertoh'), 'vertoh_metabox_exhibitors_full_screen_calltoaction', 'page', 'normal', 'high');
    }
}

function vertoh_metabox_exhibitors_full_screen_calltoaction($post) {
    $exhibitors_calltoaction_status = get_post_meta($post->ID, 'exhibitors_calltoaction_status', true);
    $exhibitors_calltoaction_title = get_post_meta($post->ID, 'exhibitors_calltoaction_title', true);
    $exhibitors_calltoaction_subtitle = get_post_meta($post->ID, 'exhibitors_calltoaction_subtitle', true);
    $exhibitors_calltoaction_image = get_post_meta($post->ID, 'exhibitors_calltoaction_image', true);
    $exhibitors_calltoaction_buttontext = get_post_meta($post->ID, 'exhibitors_calltoaction_buttontext', true);
    $exhibitors_calltoaction_buttonurl = get_post_meta($post->ID, 'exhibitors_calltoaction_buttonurl', true);
    $exhibitors_calltoaction_textcolor = get_post_meta($post->ID, 'exhibitors_calltoaction_textcolor', true);
    $exhibitors_calltoaction_buttonhovercolor = get_post_meta($post->ID, 'exhibitors_calltoaction_buttonhovercolor', true);
    ?>
    <p>
        <label for="exhibitors_calltoaction_status"><?php _e('Status', 'vertoh'); ?></label>
        <select class="widefat" id="exhibitors_calltoaction_status" name="exhibitors_calltoaction_status">
            <option value="0"<?php if ($exhibitors_calltoaction_status == 0) echo ' selected="selected"'; ?>><?php _e('Disabled', 'vertoh'); ?></option>
            <option value="1"<?php if ($exhibitors_calltoaction_status == 1) echo ' selected="selected"'; ?>><?php _e('Enabled', 'vertoh'); ?></option>
        </select>
    </p>
    <p>
        <label for="exhibitors_calltoaction_title"><?php _e('Title', 'vertoh'); ?></label>
        <input type="text" class="widefat" id="exhibitors_calltoaction_title" name="exhibitors_calltoaction_title" value="<?php echo $exhibitors_calltoaction_title; ?>" />
    </p>
    <p>
        <label for="exhibitors_calltoaction_textcolor"><?php _e('Text Color', 'vertoh'); ?></label>
        <input type="text" class="widefat" id="exhibitors_calltoaction_textcolor" name="exhibitors_calltoaction_textcolor" value="<?php echo !empty($exhibitors_calltoaction_textcolor) ? $exhibitors_calltoaction_textcolor: '#000000'; ?>" />
        <div id="exhibitors_calltoaction_textcolor_picker"></div>
    <p>
        <label for="exhibitors_calltoaction_subtitle"><?php _e('Subtitle', 'vertoh'); ?></label>
        <input type="text" class="widefat" id="exhibitors_calltoaction_subtitle" name="exhibitors_calltoaction_subtitle" value="<?php echo $exhibitors_calltoaction_subtitle; ?>" />
    </p>
    <p>
        <label for="exhibitors_calltoaction_image"><?php _e('Image', 'vertoh'); ?></label>
        <br />
        <input id="upload_image_button_exhibitors" class="upload_image_button" type="button" value="Upload" />
        <small><?php _e('Recommendend size: '); ?>1920x566</small>
        <br/>
        <img class="upload_image" src="<?php if (!empty($exhibitors_calltoaction_image)) echo wp_get_attachment_url($exhibitors_calltoaction_image); ?>" style="max-width: 100%;" />
        <input type="hidden" id="exhibitors_calltoaction_image" name="exhibitors_calltoaction_image" class="upload_image_id" value="<?php echo $exhibitors_calltoaction_image; ?>" />
        <br/>
        <?php if (!empty($exhibitors_calltoaction_image)) { ?>
            <input type="button" class="upload_image_delete" value="<?php _e('Remove', 'vertoh'); ?>"/>
        <?php } ?>
    </p>
    <p>
        <label for="exhibitors_calltoaction_buttontext"><?php _e('Button Text', 'vertoh'); ?></label>
        <input type="text" class="widefat" id="exhibitors_calltoaction_buttontext" name="exhibitors_calltoaction_buttontext" value="<?php echo $exhibitors_calltoaction_buttontext; ?>" />
    </p>
    <p>
        <label for="exhibitors_calltoaction_buttonurl"><?php _e('Button URL', 'vertoh'); ?></label>
        <input type="text" class="widefat" id="exhibitors_calltoaction_buttonurl" name="exhibitors_calltoaction_buttonurl" value="<?php echo $exhibitors_calltoaction_buttonurl; ?>" />
    </p>
    <p>
        <label for="exhibitors_calltoaction_buttonhovercolor"><?php _e('Button Hover Background Color', 'vertoh'); ?></label>
        <input type="text" class="widefat" id="exhibitors_calltoaction_buttonhovercolor" name="exhibitors_calltoaction_buttonhovercolor" value="<?php echo !empty($exhibitors_calltoaction_buttonhovercolor) ? $exhibitors_calltoaction_buttonhovercolor: '#000000'; ?>" />
        <div id="exhibitors_calltoaction_buttonhovercolor_picker"></div>
    </p>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('#exhibitors_calltoaction_textcolor_picker').farbtastic('#exhibitors_calltoaction_textcolor');
            jQuery('#exhibitors_calltoaction_buttonhovercolor_picker').farbtastic('#exhibitors_calltoaction_buttonhovercolor');
        });
    </script>
    <?php
}

add_action('save_post', 'vertoh_exhibitors_save_post');

function vertoh_exhibitors_save_post($id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (get_page_template_slug() == 'exhibitors.php') {
        if (isset($_POST['exhibitors_calltoaction_status']))
            update_post_meta($id, 'exhibitors_calltoaction_status', $_POST['exhibitors_calltoaction_status']);

        if (isset($_POST['exhibitors_calltoaction_title']))
            update_post_meta($id, 'exhibitors_calltoaction_title', $_POST['exhibitors_calltoaction_title']);

        if (isset($_POST['exhibitors_calltoaction_subtitle']))
            update_post_meta($id, 'exhibitors_calltoaction_subtitle', $_POST['exhibitors_calltoaction_subtitle']);

        if (isset($_POST['exhibitors_calltoaction_image']))
            update_post_meta($id, 'exhibitors_calltoaction_image', $_POST['exhibitors_calltoaction_image']);

        if (isset($_POST['exhibitors_calltoaction_buttontext']))
            update_post_meta($id, 'exhibitors_calltoaction_buttontext', $_POST['exhibitors_calltoaction_buttontext']);

        if (isset($_POST['exhibitors_calltoaction_buttonurl']))
            update_post_meta($id, 'exhibitors_calltoaction_buttonurl', $_POST['exhibitors_calltoaction_buttonurl']);
        
         if (isset($_POST['exhibitors_calltoaction_textcolor']))
            update_post_meta($id, 'exhibitors_calltoaction_textcolor', $_POST['exhibitors_calltoaction_textcolor']);
         
          if (isset($_POST['exhibitors_calltoaction_buttonurl']))
            update_post_meta($id, 'exhibitors_calltoaction_buttonhovercolor', $_POST['exhibitors_calltoaction_buttonhovercolor']);
    }
}
