<?php
// Exit if accessed directly
if (!defined('ABSPATH'))
    exit;

/**
 * Register the speakers Widget
 * 
 * @package Event Framework
 * @since 1.0.0
 */

/**
 * Ef_Speakers_Widget Widget Class.
 * 
 * 
 * @package Event Framework
 * @since 1.0.0
 */
class Ef_Speakers_Widget extends WP_Widget {

    /**
     * Speakers Widget setup.
     * 
     * @package Event Framework
     * @since 1.0.0
     */
    function Ef_Speakers_Widget() {

        $widget_name = EF_Framework_Helper::get_widget_name();

        /* Widget settings. */
        $widget_ops = array('classname' => 'ef_speakers', 'description' => __('Shows a section displaying speakers created in the Speakers custom post type.', 'dxef'));

        /* Create the widget. */
        $this->WP_Widget('ef_speakers', $widget_name . __(' Speaker List', 'dxef'), $widget_ops);

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

        $speakerstitle = isset($instance['speakerstitle']) ? $instance['speakerstitle'] : '';
        $speakersubtitle = isset($instance['speakerssubtitle']) ? $instance['speakerssubtitle'] : '';
        $speakersviewprofiletext = isset($instance['speakersviewprofiletext']) ? $instance['speakersviewprofiletext'] : '';
        $speakersviewalltext = isset($instance['speakersviewalltext']) ? $instance['speakersviewalltext'] : '';
        $speakerslist = isset($instance['speakerslist']) ? explode(',', $instance['speakerslist']) : array();

        if (!empty($speakerslist)) {
            $speakerslist = array_filter($speakerslist);
        }

        $speaker_args = array(
            'post_type' => 'speaker',
            'posts_per_page' => -1,
            'post__in' => $speakerslist,
            'orderby' => 'post__in'
        );

        $speakers = get_posts($speaker_args);

        $full_speakers_page = get_posts(
                array(
                    'post_type' => 'page',
                    'meta_key' => '_wp_page_template',
                    'meta_value' => 'speakers.php'
                )
        );

        echo stripslashes($args['before_widget']);
        echo apply_filters('ef_widget_render', '', $this->id_base, array(
            'title' => $speakerstitle,
            'subtitle' => $speakersubtitle,
            'viewprofiletext' => $speakersviewprofiletext,
            'viewalltext' => $speakersviewalltext,
            'speakers' => $speakers,
            'full_speakers_page' => $full_speakers_page));
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
        $instance['speakerstitle'] = strip_tags($new_instance['speakerstitle']);
        $instance['speakerssubtitle'] = strip_tags($new_instance['speakerssubtitle']);
        $instance['speakersviewprofiletext'] = strip_tags($new_instance['speakersviewprofiletext']);
        $instance['speakersviewalltext'] = strip_tags($new_instance['speakersviewalltext']);
        $instance['speakerslist'] = $new_instance['speakerslist'];

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

        $speakerstitle = isset($instance['speakerstitle']) ? $instance['speakerstitle'] : '';
        $speakerssubtitle = isset($instance['speakerssubtitle']) ? $instance['speakerssubtitle'] : '';
        $speakersviewprofiletext = isset($instance['speakersviewprofiletext']) ? $instance['speakersviewprofiletext'] : '';
        $speakersviewalltext = isset($instance['speakersviewalltext']) ? $instance['speakersviewalltext'] : '';
        $speakerslist = isset($instance['speakerslist']) ? explode(',', $instance['speakerslist']) : array();
        if (!empty($speakerslist))
            $selected_speakers_query = new WP_Query(array('post_type' => 'speaker', 'post__in' => $speakerslist, 'orderby' => 'post__in', 'posts_per_page' => -1));
        else
            $selected_speakers_query = false;
        $ignored_speakers_query = new WP_Query(array('post_type' => 'speaker', 'post__not_in' => $speakerslist, 'orderby' => 'title', 'order' => 'ASC', 'posts_per_page' => -1));
        ?>

        <em><?php _e('Title:', 'dxef'); ?></em><br />
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('speakerstitle'); ?>" value="<?php echo $speakerstitle; ?>"/>
        <br /><br />
        <em><?php _e('Subtitle:', 'dxef'); ?></em><br />
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('speakerssubtitle'); ?>" value="<?php echo $speakerssubtitle; ?>"/>
        <br /><br />
        <em><?php _e('"View profile" Text:', 'dxef'); ?></em><br/>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('speakersviewprofiletext'); ?>" value="<?php echo $speakersviewprofiletext; ?>"/>
        <br /><br />
        <em><?php _e('"View all speakers" Text:', 'dxef'); ?></em><br/>
        <input type="text" class="widefat" name="<?php echo $this->get_field_name('speakersviewalltext'); ?>" value="<?php echo $speakersviewalltext; ?>"/>
        <br /><br />
        <em><?php _e('Speakers:', 'dxef'); ?></em><br/>
        <div class="sortable-container">
            <p><?php _e('Select and order speakers to show in this section', 'dxef'); ?></p>
            <ul id="sortable_speakers_1" class="sortable destination sortable_speakers">
                <?php
                if ($selected_speakers_query) {
                    while ($selected_speakers_query->have_posts()) :
                        $selected_speakers_query->the_post();
                        ?>
                        <li class="ui-state-default" data-id="<?php the_ID(); ?>"><?php the_title(); ?></li>
                        <?php
                    endwhile;
                    wp_reset_query();
                    wp_reset_postdata();
                }
                ?>
            </ul>
            <ul id="sortable_speakers_2" class="sortable source sortable_speakers">
                <?php
                while ($ignored_speakers_query->have_posts()) :
                    $ignored_speakers_query->the_post();
                    ?>
                    <li class="ui-state-default" data-id="<?php the_ID(); ?>"><?php the_title(); ?></li>
                        <?php
                    endwhile;
                    wp_reset_query();
                    wp_reset_postdata();
                    ?>
            </ul>
            <input type="hidden" name="<?php echo $this->get_field_name('speakerslist'); ?>" value="<?php if (!empty($speakerslist)) echo implode(',', $speakerslist); ?>" />
        </div>
        <?php
    }

    function upload_scripts() {
        wp_enqueue_script('jquery-ui-sortable');
        wp_enqueue_script('ef-speakers-widget', EF_ASSETS_URL . 'js/widget-speakers.js', array('jquery', 'jquery-ui-sortable'), false, true);
        wp_enqueue_style('vertoh-sortable', get_template_directory_uri() . '/css/admin/sortable.css');
    }

}

// Register Widget
register_widget('Ef_Speakers_Widget');
