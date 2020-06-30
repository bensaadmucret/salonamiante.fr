<?php
// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

/**
 * Register the Instagram Widget
 * 
 * @package Event Framework
 * @since 1.0.0
 */

/**
 * Ef_Instagram_Widget Widget Class.
 * 
 * 
 * @package Event Framework
 * @since 1.1.0
 */
class Ef_Instagram_Widget extends WP_Widget {

    /**
     * Instagram Widget setup.
     * 
     * @package Instagram
     * @since 1.0.0
     */
    function Ef_Instagram_Widget() {

        $widget_name = EF_Framework_Helper::get_widget_name();

        /* Widget settings. */
        $widget_ops = array('classname' => 'ef_instagram', 'description' => __('Shows a section displaying instagram photos', 'dxef'));

        /* Create the widget. */
        $this->WP_Widget('ef_instagram', $widget_name . __(' Instagram', 'dxef'), $widget_ops);
    }

    /**
     * Output of Widget Content
     * 
     * Handle to outputs the
     * content of the widget
     * 
     * @package Event Framework
     * @since 1.0.0
     */
    function widget($args, $instance) {

        global $instagram;

        $instagramtitle = isset($instance['instagramtitle']) ? $instance['instagramtitle'] : '';
        $instagramlinktext = isset($instance['instagramlinktext']) ? $instance['instagramlinktext'] : '';
        $instagramhash = isset($instance['instagramhash']) ? $instance['instagramhash'] : '';
        $instagramclientid = isset($instance['instagramclientid']) ? $instance['instagramclientid'] : '';
        $instagramclientsecret = isset($instance['instagramclientsecret']) ? $instance['instagramclientsecret'] : '';

        $full_instagram_page = get_posts(array(
            'post_type' => 'page',
            'meta_key' => '_wp_page_template',
            'meta_value' => 'instagram.php'
        ));
        
        if (isset($instagram) && !empty($instagramhash)) {
            $photos = $instagram->getTagMedia($instagramhash, 4);
        } else
            $photos = array();

        echo stripslashes($args['before_widget']);
        echo apply_filters('ef_widget_render', '', $this->id_base, array(
            'title' => $instagramtitle,
            'full_instagram_page' => $full_instagram_page,
            'instagramhash' => $instagramhash,
            'linktext' => $instagramlinktext,
            'photos' => $photos));
        echo stripslashes($args['after_widget']);
    }

    /**
     * Update Widget Setting
     * 
     * Handle to updates the widget control options
     * for the particular instance of the widget
     * 
     * @package Instagram
     * @since 1.0.0
     */
    function update($new_instance, $old_instance) {

        if (isset($_POST['submitted'])) {
            update_option('ef_instagram_widget_instagramtitle', isset($new_instance['instagramtitle']) ? $new_instance['instagramtitle'] : '' );
            update_option('ef_instagram_widget_instagramlinktext', isset($new_instance['instagramlinktext']) ? $new_instance['instagramlinktext'] : '' );
            update_option('ef_instagram_widget_instagramhash', isset($new_instance['instagramhash']) ? $new_instance['instagramhash'] : '' );
            update_option('ef_instagram_widget_clientid', isset($new_instance['instagramclientid']) ? $new_instance['instagramclientid'] : '' );
            update_option('ef_instagram_widget_clientsecret', isset($new_instance['instagramclientsecret']) ? $new_instance['instagramclientsecret'] : '' );
        }

        $instance = $old_instance;

        /* Set the instance to the new instance. */
        $instance = $new_instance;

        /* Input fields */
        $instance['instagramtitle'] = strip_tags($new_instance['instagramtitle']);
        $instance['instagramlinktext'] = strip_tags($new_instance['instagramlinktext']);
        $instance['instagramhash'] = strip_tags($new_instance['instagramhash']);
        $instance['instagramclientid'] = strip_tags($new_instance['instagramclientid']);
        $instance['instagramclientsecret'] = strip_tags($new_instance['instagramclientsecret']);

        return $instance;
    }

    /**
     * Display Widget Form
     * 
     * Displays the widget
     * form in the admin panel
     * 
     * @package Event Framework
     * @since 1.0.0
     */
    function form($instance) {

        $instagramtitle = isset($instance['instagramtitle']) ? $instance['instagramtitle'] : '';
        $instagramlinktext = isset($instance['instagramlinktext']) ? $instance['instagramlinktext'] : '';
        $instagramhash = isset($instance['instagramhash']) ? $instance['instagramhash'] : '';
        $instagramclientid = isset($instance['instagramclientid']) ? $instance['instagramclientid'] : '';
        $instagramclientsecret = isset($instance['instagramclientsecret']) ? $instance['instagramclientsecret'] : '';
        ?>

        <em><?php _e('Title:', 'dxef'); ?></em><br />
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('instagramtitle'); ?>" value="<?php echo stripslashes($instagramtitle); ?>"/><br/>
        <br /><br />
        <em><?php _e('Link Text:', 'dxef'); ?></em><br />
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('instagramlinktext'); ?>" value="<?php echo stripslashes($instagramlinktext); ?>"/><br/>
        <br /><br />
        <em><?php _e('Tag:', 'dxef'); ?></em><br />
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('instagramhash'); ?>" value="<?php echo stripslashes($instagramhash); ?>"/><br/>
        <br /><br />
        <em><?php _e('Client ID:', 'dxef'); ?></em><br />
        <input type="text" class="instagramaclientid" name="<?php echo $this->get_field_name('instagramclientid'); ?>" value="<?php echo stripslashes($instagramclientid); ?>"/>
        <br /><br />
        <em><?php _e('Client Secret:', 'dxef'); ?></em><br />
        <input type="text" class="instagramclientsecret" name="<?php echo $this->get_field_name('instagramclientsecret'); ?>" value="<?php echo stripslashes($instagramclientsecret); ?>"/>
        <br /><br />
        <input type="hidden" name="submitted" value="1" /><?php
    }

}

// Register Widget
register_widget('Ef_Instagram_Widget');
