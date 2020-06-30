<?php
/**
 * Template Name: News
 *
 * @package      Event Manager
 * @author       Bill Erickson <bill@billerickson.net>
 * @copyright    Copyright (c) 2011, Bill Erickson
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 *
 */

/**
 * Session Loop Wrapper
 *
 */
function sc_session_loop_wrapper() {
	$terms = get_terms( 'sc-session-grouping', apply_filters( 'sc_schedule_term_args', array( 'orderby' => 'name' ) ) );
	
	// If using the Session Grouping, break it down by grouping
	if( $terms ) {
		echo '<div class="sessions by-grouping">';
		foreach( $terms as $term ) {
			// Group intro (box on left)
			echo '<div class="group"><div class="group-info"><span class="name">' . $term->name . '</span><span class="desc">' . $term->description . '</span></div><!-- .group-info -->';
			$args = array( 
				'post_type' => 'sc-sessions',
				'posts_per_page' => '-1',
				'tax_query' => array(
					array(
						'taxonomy' => 'sc-session-grouping',
						'field' => 'id',
						'terms' => $term->term_id
					)
				),
				'orderby' => 'meta_value_num',
				'order' => 'ASC',
				'meta_key' => 'sc_session_timestamp',
			);
			sc_session_loop( $args );
			echo '</div><!-- .group -->';
		}
		echo '</div><!- .sessions -->';
	
	// If not using Session Grouping, list all sessions by time
	} else {
		echo '<div class="sessions no-grouping">';
		$args = array(
			'post_type' => 'sc-sessions',
			'posts_per_page' => '-1',
			'orderby' => 'meta_value_num',
			'order' => 'ASC',
			'meta_key' => 'sc_session_timestamp',
		);
		sc_session_loop( $args );
		echo '</div>';
	}
} 
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'sc_session_loop_wrapper' );




function sc_session_loop( $args = array() ) {
	

    $recentPosts = new WP_Query();
    $recentPosts->query('showposts=50');
	echo("<h2>TOUTES LES ACTUALITÉS EXPOSANTS</h2></br></br>"); ?>

<?php while ($recentPosts->have_posts()) : $recentPosts->the_post(); ?>
    <li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a> <?php echo(" :"); ?>  <?php the_date(); ?><?php echo("</br>"); ?> 
	<?php echo(substr(get_the_excerpt(), 0, 80)); echo("..."); ?> <a href="<?php the_permalink(); ?>">
    <a href="<?php the_permalink(); ?>"><?php echo("[lire]"); ?> </a> 
	<?php echo("</br></br>"); ?> 
    </li>
    
<?php endwhile; ?>

<?php  wp_reset_query();
}
 
 
 
 
genesis();



