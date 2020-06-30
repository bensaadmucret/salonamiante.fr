 <?php
 	
function lien_spa_lyon_test() {
	
	$args = array(
			'post_type'    => 'lyon_cpt',
			'orderby' => 'title',
			'order'   => 'ASC',
			'posts_per_page' => -1,
	);
$my_query= new WP_Query($args);	



 if ($my_query->have_posts()) : while ($my_query->have_posts() ) : $my_query->the_post(); 

$titre = get_the_title( $post->ID  );
$image =wp_get_attachment_image( get_post_thumbnail_id(), 'thumbnail' );


$html .='<div class="col-3 col-md-3">';
$html .='<a href="#" data-toggle="modal" data-target="#'.$titre.' ">'; 
$html .=  $image;
$html .='</a>';
$html .='</div>';

endwhile;
endif;

return $html;


wp_reset_postdata();

} 
add_shortcode( 'lien_spa_lyon_test', 'lien_spa_lyon_test' );




function contenu_spa_lyon_test() { 

$args = array(
			'post_type'    => 'lyon_cpt',
			'orderby' => 'title',
			'order'   => 'DESC',
			'posts_per_page' => -1,
	);
$my_query= new WP_Query($args);	

if($my_query->have_posts()) : while ($my_query->have_posts() ) : $my_query->the_post();
$titre = get_the_title(  );
$image =get_the_post_thumbnail( $my_query->ID, 'thumbnail' );
$contenu = get_the_content(  );
$lien = get_field('site_web_lyon'); 


$html .='<div id="'.$titre.'" class="modal " tabindex="-1">';
$html .='<div class="modal-dialog">';
$html .='<div class="modal-content">';
$html .='<div class="modal-header">';
$html .='<h2 id="titrePopUp" class="modal-title">'; 
$html .=$titre ;
$html .='<button class="close" type="button" data-dismiss="modal">×</button>';
$html .=' </h2>';
$html .='</div>';



$html .='<div class="modal-body">';
$html .='<div style="line-height: 1.7; text-align: justify;">';
$html .='<div style="float:right">' . $image .' </div>';
$html .=$contenu;
$html .='</div>';
$html .='</div>';
$html .='<div class="modal-footer"><a class="btn btn-primary pull-left" href=" '.$lien . ' "> site internet</a>';
$html .='</div>';
$html .='	</div>';
$html .='</div>';
$html .='</div>';

endwhile;
endif; 
return  $html;
}
add_shortcode( 'contenu_spa_lyon_test', 'contenu_spa_lyon_test' );