<?php

// Add Shortcode
function itga_stand() {


    $args = array ( 'post_type' => 'cm-business',
		
			
		'before' => '<p class=\"meta\">',
   				
   		'sep' => ' ',
   		'after' => '<p class=\"meta\">',
   					
   		'template' => '%s: %l.'	,
                             

		 );

 $query = New WP_Query( $args ); ?>


        
 
     <div>
            <div>

                         
  
  <?php if($query->have_posts()) : while ($query->have_posts() ) : $query->the_post();

                
                 
                 echo  (get_post_meta( get_the_ID(), 'stand', true )) ;
                
                 
                
            endwhile;
            endif; 
            wp_reset_postdata(); ?>

  
 </div>
</div>   
                 

 <?php }
add_shortcode( 'stand', 'itga_stand' );