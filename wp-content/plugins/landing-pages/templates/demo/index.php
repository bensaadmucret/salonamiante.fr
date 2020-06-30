<?php
/**
* Template Name:	Demo Template
*
* @package	WordPress Landing Pages
* @author	Inbound Now
* @link http://www.inboundnow.com
* @version	1.0
*/


/* get the name of the template folder */
$key = basename(dirname(__FILE__));

/* Include ACF Field Definitions  */
include_once(LANDINGPAGES_PATH.'templates/'.$key.'/config.php');

/* discover the absolute path of where this template is located. Core templates are loacted in /wp-content/plugins/landing-pages/templates/ while custom templates belong in /wp-content/uploads/landing-pages/tempaltes/ */
$path = (preg_match("/uploads/", dirname(__FILE__))) ? LANDINGPAGES_UPLOADS_URLPATH . $key .'/' : LANDINGPAGES_URLPATH.'templates/'.$key.'/';

/* Define Landing Pages's custom pre-load hook for 3rd party plugin integration */
do_action('lp_init');

/* Load Regular WordPress $post data and start the loop */
if (have_posts()) : while (have_posts()) : the_post();

/* load ACF Input values */
$wysiwyg = get_field( 'wysiwyg',$post->ID , false );
$text = get_field( 'text',$post->ID , false );
$textarea = get_field( 'textarea',$post->ID , false );
$number = get_field( 'number',$post->ID , false );
$email = get_field( 'email',$post->ID , false );
$url = get_field( 'url',$post->ID , false );
$password = get_field( 'password',$post->ID , false );
$oembed = get_field( 'oembed',$post->ID , false );
$image = get_field( 'image', $post->ID , false ); /* images need formatting set false for non ACF Pro templates */
$file = get_field( 'file', $post->ID , false ); /* file urls need formatting set false for non ACF Pro templates */
$gallery = get_field( 'gallery',$post->ID , false );
$select = get_field( 'select',$post->ID , false );
$checkbox = get_field( 'checkbox',$post->ID , false );
$radio = get_field( 'radio',$post->ID , false );
$truefalse = get_field( 'truefalse',$post->ID , false );
$googlemap = get_field( 'googlemap',$post->ID , false );
$datepicker = get_field( 'datepicker',$post->ID , false );
$colorpicker = get_field( 'colorpicker',$post->ID , false );

?>
<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>	<html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>	<html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <!--	Define page title -->
        <title><?php wp_title(); ?></title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />

        <!-- Included CSS Files -->
        <link rel="stylesheet" href="<?php echo $path; ?>assets/css/style.css">
        <link rel="stylesheet" href="<?php echo $path; ?>assets/css/nav-landing-page.css">
        <link rel="stylesheet" href="<?php echo $path; ?>assets/css/landing-page-style.css">

        <!-- Included JS Files -->
        <script src="<?php echo $path; ?>assets/js/modernizr.js"></script>

        <!-- Inline Style Block for implementing css changes based off user settings -->
        <style type="text/css">
            <?php
            // If color changed, apply new hex color
            if ($colorpicker != "") {
                echo "table	{ border: 1px solid {$colorpicker};} ";
            }
            ?>
        </style>

        <?php

        /* Load Normal WordPress wp_head() function */
        do_action('wp_head');

        /* Load Landing Pages's custom pre-load hook for 3rd party plugin integration */
        do_action('lp_head');

        ?>

    </head>

    <!-- lp_body_class(); Defines Custom Body Classes for Advanced User CSS Customization -->
    <body <?php body_class(); ?>>


        <div id="content-wrapper">
            <!-- Nav Landing Page -->
            <div id="nav"><div class="wrap"><ul id="menu-new-home" class="menu genesis-nav-menu menu-primary"><li id="menu-item-4986" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-4986"><a href="https://www.salonamiante.fr/"><img id="logo-spa" src="https://www.salonamiante.fr/wp-content/uploads/2018/06/logo-spa.jpg" alt="Salon des Professionnels de l'Amiante" /></a></li>
                <li id="menu-item-4964" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-4962 current_page_item menu-item-4964"><a href="https://www.salonamiante.fr/">ACCUEIL</a></li>
                <li id="menu-item-4938" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4938"><a href="#">PARIS</a>
                    <ul class="sub-menu">
                        <li id="menu-item-5121" class="menu-item menu-item-type-post_type menu-item-object-landing-page menu-item-5121"><a href="https://www.salonamiante.fr/go/exposer-au-spa-paris/">EXPOSER au SPA PARIS</a></li>
                        <li id="menu-item-4943" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4943"><a href="https://www.salonamiante.fr/exposants/">EXPOSANTS du SPA PARIS</a></li>
                        <li id="menu-item-4944" class="menu-item menu-item-type-post_type menu-item-object-landing-page menu-item-4944"><a href="https://www.salonamiante.fr/go/des-espaces-pro/">DES ESPACES PRO</a></li>
                        <li id="menu-item-4945" class="menu-item menu-item-type-post_type menu-item-object-landing-page menu-item-4945"><a href="https://www.salonamiante.fr/go/visiteurs/">INFOS  VISITEURS SPA PARIS</a></li>
                        <li id="menu-item-5119" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5119"><a href="https://www.salonamiante.fr/acces-2/">ACCÈS</a></li>
                    </ul>
                </li>
                <li id="menu-item-4975" class="menu-item menu-item-type-post_type menu-item-object-landing-page menu-item-4975"><a href="https://www.salonamiante.fr/go/salon-amiante-regions/">RÉGIONS</a></li>
                <li id="menu-item-5118" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5118"><a href="https://www.salonamiante.fr/presse/">PRESSE</a></li>
                <li id="menu-item-5116" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-5116"><a href="https://www.salonamiante.fr/contact/">CONTACT</a></li>
                <li class="right search"><form method="get" class="searchform search-form" action="https://www.salonamiante.fr/" role="search" ><input type="text" value="" name="s" class="s search-input" onfocus="if (&#039;&#039; === this.value) {this.value = &#039;&#039;;}" onblur="if (&#039;&#039; === this.value) {this.value = &#039;&#039;;}" /><input type="submit" class="searchsubmit search-submit" value="" /></form></li></ul></div></div>

            <!-- End Nav Landing Page -->

            <table>
                <tr>
                    <td class="field-label">

                    </td>
                    <td class="field-value">
                        <?php echo $text; ?>
                    </td>
                </tr>
                <tr>
                    <td class="field-label">

                    </td>
                    <td class="field-value">
                        <?php echo $wysiwyg; ?>
                    </td>
                </tr>
                <tr>
                    <td class="field-label">

                    </td>
                    <td class="field-value">
                        <?php echo $textarea; ?>
                    </td>
                </tr>
                <tr>
                    <td class="field-label">

                    </td>
                    <td class="field-value">
                        <?php echo $number; ?>
                    </td>
                </tr>
                <tr>
                    <td class="field-label">

                    </td>
                    <td class="field-value">
                        <?php echo $email; ?>
                    </td>
                </tr>
                <tr>
                    <td class="field-label">

                    </td>
                    <td class="field-value">
                        <?php echo $url; ?>
                    </td>
                </tr>
                <tr>
                    <td class="field-label">

                    </td>
                    <td class="field-value">
                        <?php echo $image; ?>
                    </td>
                </tr>
                <tr>
                    <td class="field-label">

                    </td>
                    <td class="field-value">
                        <?php echo $file; ?>
                    </td>
                </tr>
                <tr>
                    <td class="field-label">

                    </td>
                    <td class="field-value">

                    </td>
                </tr>
                <tr>
                    <td class="field-label">

                    </td>
                    <td class="field-value">

                    </td>
                </tr>
                <tr>
                    <td class="field-label">

                    </td>
                    <td class="field-value">

                    </td>
                </tr>
                <tr>
                    <td class="field-label">

                    </td>
                    <td class="field-value">

                    </td>
                </tr>
                <tr>
                    <td class="field-label">

                    </td>
                    <td class="field-value">

                    </td>
                </tr>
                <tr>
                    <td class="field-label">

                    </td>
                    <td class="field-value">

                    </td>
                </tr>
                <tr>
                    <td class="field-label">

                    </td>
                    <td class="field-value">

                    </td>
                </tr>
                <tr>
                    <td class="field-label">

                    </td>
                    <td class="field-value">

                    </td>
                </tr>
            </table>


        </div>


        <?php
        break;
        endwhile; endif;
        ?>
        <footer>
            <?php
            do_action('lp_footer');
            do_action('wp_footer');
            ?>
        </footer>
    </body>
</html>