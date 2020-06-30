<?php
/**
 * Template Name: Exposants
 *
 */

/**
 * Session Loop exposant
 *
 */

 remove_action( 'genesis_before_post_content', 'genesis_post_info' );
remove_action( 'genesis_after_post_content', 'genesis_post_meta' );

function exposant() {
	
		$args = array(
			'post_type' => 'cmd',
			'posts_per_page' => '-1',
			'orderby' => 'meta_value_num',
			'order' => 'ASC',
			
		);
	$Query = new WP_Query( $args ); ?>

	  <div class="prDateCol col-sm-4">
	  <div class="visible-xs afs-Divider">

		<?php while ($Query->have_posts()) : $Query->the_post(); ?>

    
	     
		 <div class="afs-PRDate"> <?php echo  get_post_meta( get_the_ID(), '', true ); ?></div>
		   <span class="afs-timezone">&nbsp;<?php echo  get_post_meta( get_the_ID(), 'stand', true ); ?></span></div>
		  		<span class="afs-timezone">&nbsp;<?php echo  get_post_meta( get_the_ID(), 'societe', true ); ?></span></div>
   	
	    
        <?php endwhile; ?>
		echo '</div>';
		echo '</div>';
        <?php  wp_reset_query();
		
		
} 

// Remove Post Info and Meta

remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'exposant' );


genesis();



