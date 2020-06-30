<?php
// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

/**
 * Register the tickets Widget
 * 
 * @package Event Framework
 * @since 1.0.0
 */

/**
 * Ef_Tickets_Widget Widget Class.
 * 
 * 
 * @package Event Framework
 * @since 1.0.0
 */
class Ef_Tickets_Widget extends WP_Widget {

    /**
     * Tickets Widget setup.
     * 
     * @package Event Framework
     * @since 1.1.0
     */
    function Ef_Tickets_Widget() {

        $widget_name = EF_Framework_Helper::get_widget_name();

        /* Widget settings. */
        $widget_ops = array('classname' => 'ef_tickets', 'description' => __('Shows a section displaying tickets by tier type created in the Tickets custom post type.', 'dxef'));

        /* Create the widget. */
        $this->WP_Widget('ef_tickets', $widget_name . __(' Tickets List', 'dxef'), $widget_ops);
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

        $ticketstitle = isset($instance['ticketstitle']) ? $instance['ticketstitle'] : '';
        $ticketssubtitle = isset($instance['ticketssubtitle']) ? $instance['ticketssubtitle'] : '';
        $tickets = get_posts(array(
            'post_type' => 'ticket',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC'
        ));

        echo stripslashes($args['before_widget']);
        echo apply_filters('ef_widget_render', '', $this->id_base, array(
            'title' => $ticketstitle,
            'subtitle' => $ticketssubtitle,
            'tickets' => $tickets));
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
        $instance['ticketstitle'] = strip_tags($new_instance['ticketstitle']);
        $instance['ticketssubtitle'] = strip_tags($new_instance['ticketssubtitle']);

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

        $ticketstitle = isset($instance['ticketstitle']) ? $instance['ticketstitle'] : '';
        $ticketssubtitle = isset($instance['ticketssubtitle']) ? $instance['ticketssubtitle'] : '';
        ?>

        <em><?php _e('Title:', 'dxef'); ?></em><br />
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('ticketstitle'); ?>" value="<?php echo stripslashes($ticketstitle); ?>"/>
        <br /><br />
        <em><?php _e('Subtitle:', 'dxef'); ?></em><br />
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('ticketssubtitle'); ?>" value="<?php echo stripslashes($ticketssubtitle); ?>"/>
        <?php
    }

}

// Register Widget
register_widget('Ef_Tickets_Widget');
