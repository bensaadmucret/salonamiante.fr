<?php
// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

/**
 * Register the Event Description Widget
 * 
 * @package Event Framework
 * @since 1.0.0
 */

/**
 * Ef_Explore_Widget Widget Class.
 * 
 * 
 * @package Event Framework
 * @since 1.0.0
 */
class Ef_Explore_Widget extends WP_Widget {

    /**
     * Contact Widget setup.
     * 
     * @package Event Framework
     * @since 1.0.0
     */
    function Ef_Explore_Widget() {

        $widget_name = EF_Framework_Helper::get_widget_name();

        /* Widget settings. */
        $widget_ops = array('classname' => 'ef_explore', 'description' => __('Shows a section displaying points of interest & maps', 'dxef'));

        /* Create the widget. */
        $this->WP_Widget('ef_explore', $widget_name . __(' Points of Interest', 'dxef'), $widget_ops);
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

        $exploretitle = isset($instance['exploretitle']) ? $instance['exploretitle'] : '';
        $gmap_zoom = isset($instance['gmap_zoom']) ? $instance['gmap_zoom'] : '';
        $poi_groups = get_terms('poi-group');
        $gmap_zoom = ( is_numeric($gmap_zoom) ? $gmap_zoom : 13 );

        echo stripslashes($args['before_widget']);
        echo apply_filters('ef_widget_render', '', $this->id_base, array(
            'title' => $exploretitle,
            'gmap_zoom' => $gmap_zoom,
            'poi_groups' => $poi_groups));
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
            update_option('ef_explore_widget_gmapzoom', !empty($new_instance['gmap_zoom']) ? $new_instance['gmap_zoom'] : 13 );
        }

        $instance = $old_instance;

        /* Set the instance to the new instance. */
        $instance = $new_instance;

        /* Input fields */
        $instance['exploretitle'] = strip_tags($new_instance['exploretitle']);
        $instance['gmap_zoom'] = strip_tags($new_instance['gmap_zoom']);

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

        $exploretitle = isset($instance['exploretitle']) ? $instance['exploretitle'] : '';
        $gmap_zoom = isset($instance['gmap_zoom']) ? $instance['gmap_zoom'] : '';
        ?>

        <em><?php _e('Widget Title:', 'dxef'); ?></em><br />
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('exploretitle'); ?>" value="<?php echo $exploretitle; ?>"/>
        <em><?php _e('Google Map Zoom:', 'dxef'); ?></em><br />
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('gmap_zoom'); ?>" value="<?php echo $gmap_zoom; ?>" placeholder="<?php _e('From 1 to 21', 'dxef'); ?>"/>
        <br /><br />
        <input type="hidden" name="submitted" value="1" /><?php
    }

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
function vertoh_home_pois_fields($fields) {

    global $wpdb;
    return $fields . ", $wpdb->postmeta.meta_value AS vertoh_address, mt2.meta_value AS vertoh_latitude, mt1.meta_value AS vertoh_longitude";
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
function vertoh_frontend_scripts() {
    if (is_active_widget(false, false, 'ef_explore')) {
        ?>

        <script type="text/javascript">
        <?php
// Get Theme Options
        $ef_options = EF_Event_Options::get_theme_options();
        $color_scheme = empty($ef_options['ef_color_palette']) ? 'basic' : $ef_options['ef_color_palette'];
        $poi_gmap_zoom = get_option('ef_explore_widget_gmapzoom');

        add_filter('posts_fields', 'vertoh_home_pois_fields');

        $pois = get_posts(
                array(
                    'post_type' => 'poi',
                    'posts_per_page' => -1,
                    'suppress_filters' => false,
                    'meta_query' => array(
                        array(
                            'key' => 'poi_address',
                            'compare' => 'EXISTS',
                        ),
                        array(
                            'key' => 'poi_latitude',
                            'compare' => 'EXISTS',
                        ),
                        array(
                            'key' => 'poi_longitude',
                            'compare' => 'EXISTS',
                        )
                    )
                )
        );

        remove_filter('posts_fields', 'vertoh_home_pois_fields');

        $pois_arr = array();

        foreach ($pois as $poi) {
            $pois_arr[] = array(
                'poi_address' => sprintf('<strong>%s</strong><br/>%s', $poi->post_title, $poi->poi_address),
                'poi_latitude' => $poi->poi_latitude,
                'poi_longitude' => $poi->poi_longitude,
                'poi_title' => $poi->post_title
            );
        }
        ?>

            var pois = <?php echo json_encode($pois_arr); ?>;
            var poi_marker = '<?php echo get_template_directory_uri(); ?>/images/schemes/<?php echo $color_scheme; ?>/icon-map-pointer.png';
            var poi_gmap_zoom = <?php echo (!empty($poi_gmap_zoom)) ? $poi_gmap_zoom : 13; ?>;
        </script><?php
    }
}

//add action for frontend scripts
add_action('wp_head', 'vertoh_frontend_scripts');

//Register Widget
register_widget('Ef_Explore_Widget');
