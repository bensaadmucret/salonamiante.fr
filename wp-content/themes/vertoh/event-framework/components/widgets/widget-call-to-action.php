<?php
// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

/**
 * Register the call-to-action Widget
 * 
 * @package Event Framework
 * @since 1.0.0
 */

/**
 * Ef_Calltoaction_Widget Widget Class.
 * 
 * 
 * @package Event Framework
 * @since 1.0.0
 */
class Ef_Calltoaction_Widget extends WP_Widget {

    /**
     * Calltoaction Widget setup.
     * 
     * @package Event Framework
     * @since 1.0.0
     */
    function Ef_Calltoaction_Widget() {

        $widget_name = EF_Framework_Helper::get_widget_name();

        /* Widget settings. */
        $widget_ops = array('classname' => 'ef_calltoaction', 'description' => __('Shows a section displaying the call to action.', 'dxef'));

        /* Create the widget. */
        $this->WP_Widget('ef_calltoaction', $widget_name . __(' Call to Action', 'dxef'), $widget_ops);

        add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
        add_action('admin_enqueue_styles', array($this, 'upload_styles'));
        add_action('wp_head', array($this, 'print_styles'));
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

        $calltoactiontitle = isset($instance['calltoactiontitle']) ? $instance['calltoactiontitle'] : '';
        $calltoactionsubtitle = isset($instance['calltoactionsubtitle']) ? $instance['calltoactionsubtitle'] : '';
        $calltoactiontextcolor = isset($instance['calltoactiontextcolor']) ? $instance['calltoactiontextcolor'] : '';
        $calltoactionbuttonhovercolor = isset($instance['calltoactionbuttonhovercolor']) ? $instance['calltoactionbuttonhovercolor'] : '';
        $calltoactionbuttontext = isset($instance['calltoactionbuttontext']) ? $instance['calltoactionbuttontext'] : '';
        $calltoactionbuttonlink = isset($instance['calltoactionbuttonlink']) ? $instance['calltoactionbuttonlink'] : '';
        $calltoactionimage = isset($instance['calltoactionimage']) ? $instance['calltoactionimage'] : '';
        $calltoactionalignment = isset($instance['calltoactionalignment']) ? $instance['calltoactionalignment'] : '';

        echo stripslashes($args['before_widget']);
        echo apply_filters('ef_widget_render', '', $this->id_base, array(
            'title' => $calltoactiontitle,
            'subtitle' => $calltoactionsubtitle,
            'textcolor' => $calltoactiontextcolor,
            'buttontext' => $calltoactionbuttontext,
            'buttonlink' => $calltoactionbuttonlink,
            'image' => wp_get_attachment_url($calltoactionimage),
            'alignment' => $calltoactionalignment,
            'buttonhovercolor' => $calltoactionbuttonhovercolor));
        echo stripslashes($args['after_widget']);
    }

    /**
     * Update Widget Setting
     * 
     * Handle to updates the widget control options
     * for the particular instance of the widget
     * 
     * @package Event Framework
     * @since 1.0.0
     */
    function update($new_instance, $old_instance) {

        $instance = $old_instance;

        /* Set the instance to the new instance. */
        $instance = $new_instance;

        /* Input fields */
        $instance['calltoactiontitle'] = strip_tags($new_instance['calltoactiontitle']);
        $instance['calltoactionsubtitle'] = strip_tags($new_instance['calltoactionsubtitle']);
        $instance['calltoactiontextcolor'] = strip_tags($new_instance['calltoactiontextcolor']);
        $instance['calltoactionbuttontext'] = strip_tags($new_instance['calltoactionbuttontext']);
        $instance['calltoactionbuttonlink'] = strip_tags($new_instance['calltoactionbuttonlink']);
        $instance['calltoactionimage'] = strip_tags($new_instance['calltoactionimage']);
        $instance['calltoactionalignment'] = strip_tags($new_instance['calltoactionalignment']);
        $instance['calltoactionbuttonhovercolor'] = strip_tags($new_instance['calltoactionbuttonhovercolor']);

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

        $calltoactiontitle = isset($instance['calltoactiontitle']) ? $instance['calltoactiontitle'] : '';
        $calltoactionsubtitle = isset($instance['calltoactionsubtitle']) ? $instance['calltoactionsubtitle'] : '';
        $calltoactiontextcolor = isset($instance['calltoactiontextcolor']) ? $instance['calltoactiontextcolor'] : '';
        $calltoactionbuttontext = isset($instance['calltoactionbuttontext']) ? $instance['calltoactionbuttontext'] : '';
        $calltoactionbuttonlink = isset($instance['calltoactionbuttonlink']) ? $instance['calltoactionbuttonlink'] : '';
        $calltoactionimage = isset($instance['calltoactionimage']) ? $instance['calltoactionimage'] : '';
        $calltoactionalignment = isset($instance['calltoactionalignment']) ? $instance['calltoactionalignment'] : '';
        $calltoactionbuttonhovercolor = isset($instance['calltoactionbuttonhovercolor']) ? $instance['calltoactionbuttonhovercolor'] : '';

        if (!empty($calltoactionimage))
            $calltoactionimageattachment = wp_get_attachment_url($calltoactionimage);
        else
            $calltoactionimageattachment = '';
        ?>
        <em><?php _e('Title:', 'dxef'); ?></em><br />
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('calltoactiontitle'); ?>" value="<?php echo stripslashes($calltoactiontitle); ?>" />
        <br /><br />
        <em><?php _e('Subtitle:', 'dxef'); ?></em><br />
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('calltoactionsubtitle'); ?>" value="<?php echo stripslashes($calltoactionsubtitle); ?>" />
        <br /><br />
        <em><?php _e('Text Color:', 'dxef'); ?></em><br />
        <input id="<?php echo $this->get_field_id('calltoactiontextcolor'); ?>_text" type="text" class="widefat ef-picker" name="<?php echo $this->get_field_name('calltoactiontextcolor'); ?>" value="<?php echo!empty($calltoactiontextcolor) ? stripslashes($calltoactiontextcolor) : '#000000'; ?>" />
        <div id="<?php echo $this->get_field_id('calltoactiontextcolor'); ?>_picker"></div>
        <br /><br />
        <em><?php _e('Text Alignment:', 'dxef'); ?></em><br />
        <select class="widefat" name="<?php echo $this->get_field_name('calltoactionalignment'); ?>">
            <option value="left" <?php if ($calltoactionalignment == 'left') echo 'selected="selected"'; ?>>Left</option>
            <option value="right" <?php if ($calltoactionalignment == 'right') echo 'selected="selected"'; ?>>Right</option>
            <option value="center" <?php if ($calltoactionalignment == 'center') echo 'selected="selected"'; ?>>Center</option>
        </select>
        <br /><br />
        <em><?php _e('Image:', 'dxef'); ?></em><br />
        <img class="upload_image" src="<?php echo $calltoactionimageattachment; ?>" style="display:block; max-width: 100%; margin: 10px 0;" />
        <small><?php echo apply_filters('ef_widget_recommended_size_text', '', $this->id_base, 'calltoactionimage'); ?></small>
        <input type="button" id="upload_image_button" class="upload_image_button" value="<?php _e('Upload image', 'dxef'); ?>" />
        <?php if (!empty($calltoactionimage)) { ?>
            <a href="#" class="remove_image_id"><?php _e('Remove Image', 'dxef'); ?></a>
        <?php } ?>
        <input type="hidden" class="upload_image_id" name="<?php echo $this->get_field_name('calltoactionimage'); ?>" value="<?php echo $calltoactionimage; ?>" />
        <br /><br />
        <em><?php _e('Button text:', 'dxef'); ?></em><br />
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('calltoactionbuttontext'); ?>" value="<?php echo stripslashes($calltoactionbuttontext); ?>" />
        <br /><br />
        <em><?php _e('Button url:', 'dxef'); ?></em><br />
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('calltoactionbuttonlink'); ?>" value="<?php echo stripslashes($calltoactionbuttonlink); ?>" />
        <br /><br />
        <em><?php _e('Button Hover Background Color:', 'dxef'); ?></em><br />
        <input id="<?php echo $this->get_field_id('calltoactionbuttonhovercolor'); ?>_text" type="text" class="widefat ef-picker" name="<?php echo $this->get_field_name('calltoactionbuttonhovercolor'); ?>" value="<?php echo!empty($calltoactionbuttonhovercolor) ? stripslashes($calltoactionbuttonhovercolor) : '#000000'; ?>" />
        <div id="<?php echo $this->get_field_id('calltoactionbuttonhovercolor'); ?>_picker"></div>
        <br /><br />
        <?php
    }

    function upload_scripts() {
        wp_enqueue_media();
        wp_enqueue_script('ef-upload-media', EF_ASSETS_URL . 'js/upload-media.js', array('jquery'), false, true);
        wp_enqueue_script('ef-widget-calltoaction', EF_ASSETS_URL . 'js/widget-call-to-action.js', array('jquery'), false, true);
        wp_enqueue_script('ef-colorpicker');
    }

    function upload_styles() {
        wp_enqueue_style('thickbox');
        wp_enqueue_style('farbtastic');
    }

    function print_styles() {
        $options = get_option($this->option_name);
        if (!empty($options) && !empty($options[$this->number]['calltoactionbuttonhovercolor'])) {
            ?>
            <style type="text/css">
                #tile_calltoaction .section-button:hover {background-color: <?php echo $options[$this->number]['calltoactionbuttonhovercolor']; ?>;}
            </style>
            <?php
        }
    }

}

// Register Widget
register_widget('Ef_Calltoaction_Widget');
