<?php
// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

/**
 * Register the exhibitors Widget
 * 
 * @package Event Framework
 * @since 1.0.0
 */

/**
 * Ef_Exhibitors_Widget Widget Class.
 * 
 * 
 * @package Event Framework
 * @since 1.0.0
 */
class Ef_Exhibitors_Widget extends WP_Widget {

    /**
     * Exhibitors Widget setup.
     * 
     * @package Event Framework
     * @since 1.1.0
     */
    function Ef_Exhibitors_Widget() {

        $widget_name = EF_Framework_Helper::get_widget_name();

        /* Widget settings. */
        $widget_ops = array('classname' => 'ef_exhibitors', 'description' => __('Shows a section displaying exhibitors created in the Exhibitors custom post type.', 'vertoh'));

        /* Create the widget. */
        $this->WP_Widget('ef_exhibitors', $widget_name . __(' Exhibitor List', 'vertoh'), $widget_ops);

        add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
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

        $exhibitorstitle = isset($instance['exhibitorstitle']) ? $instance['exhibitorstitle'] : '';
        $exhibitorsubtitle = isset($instance['exhibitorssubtitle']) ? $instance['exhibitorssubtitle'] : '';
        $exhibitorsviewprofiletext = isset($instance['exhibitorsviewprofiletext']) ? $instance['exhibitorsviewprofiletext'] : '';
        $exhibitorsviewalltext = isset($instance['exhibitorsviewalltext']) ? $instance['exhibitorsviewalltext'] : '';
        $exhibitorslist = isset($instance['exhibitorslist']) ? explode(',', $instance['exhibitorslist']) : array();

        if (!empty($exhibitorslist)) {
            $exhibitorslist = array_filter($exhibitorslist);
        }

        $exhibitor_args = array(
            'post_type' => 'exhibitor',
            'posts_per_page' => -1,
            'post__in' => $exhibitorslist,
            'orderby' => 'post__in'
        );

        $exhibitors = get_posts($exhibitor_args);

        $full_exhibitors_page = get_posts(
                array(
                    'post_type' => 'page',
                    'meta_key' => '_wp_page_template',
                    'meta_value' => 'exhibitors.php'
                )
        );

        echo stripslashes($args['before_widget']);
        echo apply_filters('ef_widget_render', '', $this->id_base, array(
            'title' => $exhibitorstitle,
            'subtitle' => $exhibitorsubtitle,
            'viewprofiletext' => $exhibitorsviewprofiletext,
            'viewalltext' => $exhibitorsviewalltext,
            'exhibitors' => $exhibitors,
            'full_exhibitors_page' => $full_exhibitors_page));
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
        $instance['exhibitorstitle'] = strip_tags($new_instance['exhibitorstitle']);
        $instance['exhibitorssubtitle'] = strip_tags($new_instance['exhibitorssubtitle']);
        $instance['exhibitorsviewprofiletext'] = strip_tags($new_instance['exhibitorsviewprofiletext']);
        $instance['exhibitorsviewalltext'] = strip_tags($new_instance['exhibitorsviewalltext']);
        $instance['exhibitorslist'] = $new_instance['exhibitorslist'];

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

        $exhibitorstitle = isset($instance['exhibitorstitle']) ? $instance['exhibitorstitle'] : '';
        $exhibitorssubtitle = isset($instance['exhibitorssubtitle']) ? $instance['exhibitorssubtitle'] : '';
        $exhibitorsviewprofiletext = isset($instance['exhibitorsviewprofiletext']) ? $instance['exhibitorsviewprofiletext'] : '';
        $exhibitorsviewalltext = isset($instance['exhibitorsviewalltext']) ? $instance['exhibitorsviewalltext'] : '';
        $exhibitorslist = isset($instance['exhibitorslist']) ? explode(',', $instance['exhibitorslist']) : array();
        if (!empty($exhibitorslist))
            $selected_exhibitors__query = new WP_Query(array('post_type' => 'exhibitor', 'post__in' => $exhibitorslist, 'orderby' => 'post__in', 'posts_per_page' => -1));
        else
            $selected_exhibitors__query = false;
        $ignored_exhibitors_query = new WP_Query(array('post_type' => 'exhibitor', 'post__not_in' => $exhibitorslist, 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => -1));
        ?>

        <em><?php _e('Title:', 'vertoh'); ?></em><br />
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('exhibitorstitle'); ?>" value="<?php echo $exhibitorstitle; ?>"/>
        <br /><br />
        <em><?php _e('Subtitle:', 'vertoh'); ?></em><br />
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('exhibitorssubtitle'); ?>" value="<?php echo $exhibitorssubtitle; ?>"/>
        <br /><br />
        <em><?php _e('"View profile" Text:', 'vertoh'); ?></em><br/>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('exhibitorsviewprofiletext'); ?>" value="<?php echo $exhibitorsviewprofiletext; ?>"/>
        <br /><br />
        <em><?php _e('"View all exhibitors" Text:', 'vertoh'); ?></em><br/>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('exhibitorsviewalltext'); ?>" value="<?php echo $exhibitorsviewalltext; ?>"/>
        <br/><br/>
        <em><?php _e('Exhibitors:', 'vertoh'); ?></em><br/>
        <div class="sortable-container">
            <p><?php _e('Select and order exhibitors to show in this section', 'vertoh'); ?></p>
            <ul id="sortable_exhibitors_1" class="sortable destination sortable_exhibitors">
                <?php
                if ($selected_exhibitors__query) {
                    while ($selected_exhibitors__query->have_posts()) :
                        $selected_exhibitors__query->the_post();
                        ?>
                        <li class="ui-state-default" data-id="<?php the_ID(); ?>"><?php the_title(); ?></li>
                        <?php
                    endwhile;
                    wp_reset_query();
                    wp_reset_postdata();
                }
                ?>
            </ul>
            <ul id="sortable_exhibitors_2" class="sortable source sortable_exhibitors">
                <?php
                while ($ignored_exhibitors_query->have_posts()) :
                    $ignored_exhibitors_query->the_post();
                    ?>
                    <li class="ui-state-default" data-id="<?php the_ID(); ?>"><?php the_title(); ?></li>
                        <?php
                    endwhile;
                    wp_reset_query();
                    wp_reset_postdata();
                    ?>
            </ul>
            <input type="hidden" name="<?php echo $this->get_field_name('exhibitorslist'); ?>" value="<?php if (!empty($exhibitorslist)) echo implode(',', $exhibitorslist); ?>" />
        </div>
        <?php
    }

    function upload_scripts() {
        wp_enqueue_script('jquery-ui-sortable');
        wp_enqueue_script('ef-exhibitors-widget', EF_ASSETS_URL . 'js/widget-exhibitors.js', array('jquery', 'jquery-ui-sortable'), false, true);
        wp_enqueue_style('vertoh-sortable', get_template_directory_uri() . '/css/admin/sortable.css');
    }

}

// Register Widget
register_widget('Ef_Exhibitors_Widget');