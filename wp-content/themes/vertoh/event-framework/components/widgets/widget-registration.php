<?php
// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

/**
 * Register the Registration Widget
 * 
 * @package Event Framework
 * @since 1.0.0
 */

/**
 * Ef_Registration_Widget Widget Class.
 * 
 * 
 * @package Event Framework
 * @since 1.0.0
 */
class Ef_Registration_Widget extends WP_Widget {

    /**
     * Contact Widget setup.
     * 
     * @package Event Framework
     * @since 1.0.0
     */
    function Ef_Registration_Widget() {

        $widget_name = EF_Framework_Helper::get_widget_name();

        /* Widget settings. */
        $widget_ops = array('classname' => 'ef_registration', 'description' => __('Shows registration information & ticket display', 'dxef'));

        /* Create the widget. */
        $this->WP_Widget('ef_registration', $widget_name . __(' Registration', 'dxef'), $widget_ops);
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

        $registrationtitle = isset($instance['registrationtitle']) ? $instance['registrationtitle'] : '';
        $registrationsubtitle = isset($instance['registrationsubtitle']) ? $instance['registrationsubtitle'] : '';
        $registrationtext = isset($instance['registrationtext']) ? $instance['registrationtext'] : '';
        $registrationeventbrite = isset($instance['registrationeventbrite']) ? $instance['registrationeventbrite'] : '';
        $registrationshowtopmenu = isset($instance['registrationshowtopmenu']) ? $instance['registrationshowtopmenu'] : '';
        $registrationshowcalltoaction = isset($instance['registrationshowcalltoaction']) ? $instance['registrationshowcalltoaction'] : '';
        $registrationtopmenutext = isset($instance['registrationtopmenutext']) ? $instance['registrationtopmenutext'] : '';
        $registrationcalltoactiontext = isset($instance['registrationcalltoactiontext']) ? $instance['registrationcalltoactiontext'] : '';
        $registrationtopmenuurl = isset($instance['registrationtopmenuurl']) ? $instance['registrationtopmenuurl'] : '';
        $registrationcalltoactionurl = isset($instance['registrationcalltoactionurl']) ? $instance['registrationcalltoactionurl'] : '';

        echo stripslashes($args['before_widget']);
        echo apply_filters('ef_widget_render', '', $this->id_base, array(
            'title' => $registrationtitle,
            'subtitle' => $registrationsubtitle,
            'text' => $registrationtext,
            'eventbrite' => $registrationeventbrite,
            'showtopmenu' => $registrationshowtopmenu,
            'showcalltoaction' => $registrationshowcalltoaction,
            'topmenutext' => $registrationtopmenutext,
            'calltoactiontext' => $registrationcalltoactiontext,
            'topmenuurl' => $registrationtopmenuurl,
            'calltoactionurl' => $registrationcalltoactionurl));
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

        if (isset($_POST['submitted'])) {
            update_option('ef_registration_widget_title', isset($new_instance['registrationtitle']) ? $new_instance['registrationtitle'] : '' );
            update_option('ef_registration_widget_subtitle', isset($new_instance['registrationsubtitle']) ? $new_instance['registrationsubtitle'] : '' );
            update_option('ef_registration_widget_text', isset($new_instance['registrationtext']) ? $new_instance['registrationtext'] : '' );
            update_option('ef_registration_widget_eventbrite', isset($new_instance['registrationeventbrite']) ? $new_instance['registrationeventbrite'] : '' );
            if (isset($new_instance['registrationshowtopmenu'])) {
                update_option('ef_registration_widget_showtopmenu', 1);
            } else {
                update_option('ef_registration_widget_showtopmenu', 0);
            }
            if (isset($new_instance['registrationshowcalltoaction'])) {
                update_option('ef_registration_widget_showcalltoaction', 1);
            } else {
                update_option('ef_registration_widget_showcalltoaction', 0);
            }
            update_option('ef_registration_widget_calltoactiontext', isset($new_instance['registrationcalltoactiontext']) ? $new_instance['registrationcalltoactiontext'] : '' );
            update_option('ef_registration_widget_topmenutext', isset($new_instance['registrationtopmenutext']) ? $new_instance['registrationtopmenutext'] : '' );
            update_option('ef_registration_widget_calltoactionurl', isset($new_instance['registrationcalltoactionurl']) ? $new_instance['registrationcalltoactionurl'] : '' );
            update_option('ef_registration_widget_topmenuurl', isset($new_instance['registrationtopmenuurl']) ? $new_instance['registrationtopmenuurl'] : '' );
        }

        $instance = $old_instance;

        /* Set the instance to the new instance. */
        $instance = $new_instance;

        /* Input fields */
        $instance['registrationtitle'] = strip_tags($new_instance['registrationtitle']);
        $instance['registrationsubtitle'] = strip_tags($new_instance['registrationsubtitle']);
        $instance['registrationtext'] = $new_instance['registrationtext'];
        $instance['registrationeventbrite'] = $new_instance['registrationeventbrite'];
        $instance['registrationshowtopmenu'] = strip_tags($new_instance['registrationshowtopmenu']);
        $instance['registrationshowcalltoaction'] = strip_tags($new_instance['registrationshowcalltoaction']);
        $instance['registrationtopmenutext'] = strip_tags($new_instance['registrationtopmenutext']);
        $instance['registrationcalltoactiontext'] = strip_tags($new_instance['registrationcalltoactiontext']);
        $instance['registrationtopmenuurl'] = strip_tags($new_instance['registrationtopmenuurl']);
        $instance['registrationcalltoactionurl'] = strip_tags($new_instance['registrationcalltoactionurl']);
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

        $registrationtitle = isset($instance['registrationtitle']) ? $instance['registrationtitle'] : '';
        $registrationsubtitle = isset($instance['registrationsubtitle']) ? $instance['registrationsubtitle'] : '';
        $registrationtext = isset($instance['registrationtext']) ? $instance['registrationtext'] : '';
        $registrationeventbrite = isset($instance['registrationeventbrite']) ? $instance['registrationeventbrite'] : '';
        $registrationshowtopmenu = isset($instance['registrationshowtopmenu']) ? $instance['registrationshowtopmenu'] : '';
        $registrationshowcalltoaction = isset($instance['registrationshowcalltoaction']) ? $instance['registrationshowcalltoaction'] : '';
        $registrationtopmenutext = isset($instance['registrationtopmenutext']) ? $instance['registrationtopmenutext'] : '';
        $registrationcalltoactiontext = isset($instance['registrationcalltoactiontext']) ? $instance['registrationcalltoactiontext'] : '';
        $registrationtopmenuurl = isset($instance['registrationtopmenuurl']) ? $instance['registrationtopmenuurl'] : '';
        $registrationcalltoactionurl = isset($instance['registrationcalltoactionurl']) ? $instance['registrationcalltoactionurl'] : '';
        ?>

        <em><?php _e('Title:', 'dxef'); ?></em><br />
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('registrationtitle'); ?>" value="<?php echo stripslashes($registrationtitle); ?>" />
        <br /><br />
        <em><?php _e('Subtitle:', 'dxef'); ?></em><br />
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('registrationsubtitle'); ?>" value="<?php echo stripslashes($registrationsubtitle); ?>" />
        <br /><br />
        <em><?php _e('Main Text:', 'dxef'); ?></em><br />
        <textarea rows="10" class="widefat" name="<?php echo $this->get_field_name('registrationtext'); ?>"><?php echo esc_html($registrationtext); ?></textarea>
        <br /><br />
        <em><?php _e('Registration Embed Code:', 'dxef'); ?></em><br />
        <textarea rows="10" class="widefat" name="<?php echo $this->get_field_name('registrationeventbrite'); ?>"><?php echo esc_html($registrationeventbrite); ?></textarea>
        <br /><br />
        <em><?php _e('Show in top menu:', 'dxef'); ?></em><br />
        <input type="checkbox" name="<?php echo $this->get_field_name('registrationshowtopmenu'); ?>" value="1" <?php checked($registrationshowtopmenu, 1); ?> /><br/>
        <em><?php _e('With this text:', 'dxef'); ?></em><br />
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('registrationtopmenutext'); ?>" value="<?php echo stripslashes($registrationtopmenutext); ?>" />
        <em><?php _e('linking to this url:', 'dxef'); ?></em><br />
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('registrationtopmenuurl'); ?>" value="<?php echo stripslashes($registrationtopmenuurl); ?>" />
        <br /><br />
        <em><?php _e('Show call to action:', 'dxef'); ?></em><br />
        <input type="checkbox" name="<?php echo $this->get_field_name('registrationshowcalltoaction'); ?>" value="1" <?php checked($registrationshowcalltoaction, 1); ?> /><br/>
        <em><?php _e('With this text:', 'dxef'); ?></em><br />
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('registrationcalltoactiontext'); ?>" value="<?php echo stripslashes($registrationcalltoactiontext); ?>" />
        <em><?php _e('linking to this url:', 'dxef'); ?></em><br />
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('registrationcalltoactionurl'); ?>" value="<?php echo stripslashes($registrationcalltoactionurl); ?>" />
        <br /><br />
        <input type="hidden" name="submitted" value="1" />
        <?php
    }

}

// Register Widget
register_widget('Ef_Registration_Widget');
