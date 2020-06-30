<?php
/* 
Template Name: Exposant
*/



// Just an example.
remove_action('genesis_loop', 'genesis_do_loop');
/**
 * Example function that replaces the default loop with a custom loop querying 'PostType' CPT.
 * Remove this function (along with the remove action hook) to show default page content.
 * Or feel free to update the $args to make it work for you.
*/
add_action('genesis_loop', 'gt_custom_loop');
function gt_custom_loop() {

     
    $args = array('post_type' => 'cmd',
	
	);
	

    $the_query = new WP_Query( $args );

 

// The Loop

	echo '<div style="margin-top:5%;">';
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		
		
		echo  the_post_thumbnail( array('200', '200')); 

echo'<div style="float:right; width:300px ">';
		echo '<div><h1>'. get_post_meta( get_the_ID(), 'societe', true) . '</h1></div>';
		echo '<div> <b> Stand : </b>' . get_post_meta( get_the_ID(), 'stand', true) . '</div>';
		echo '<div class="myButton">'. get_post_meta( get_the_ID(), 'site', true ) .  '</div>';
		


		
echo '</div>';		
		
		
		echo '<p align="justify" style="margin-bottom:2%; margin-top:5%; ">' . get_the_content() . '</p>';
	
	wp_reset_postdata();
	}
	echo '</div>';
 //Accepts WP_Query args (http://codex.wordpress.org/Class_Reference/WP_Query)
    

}


genesis(); // <- everything important: make sure to include this. 