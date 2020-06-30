<?php
/*
Plugin Name: SPA Région
Plugin URI: html://www.itga.fr
Description: plugin qui liste tous les exposants région
Author: Mohammed Bensaad
Author URI: 
Version: 01
*/


/* Sortie si on y accède directement.  */
if ( ! defined( 'ABSPATH' ) ) exit;

final class itga_exposants_salon_plugin {


/**
*tient les instance de cette classe.
*/

    private static $instance;

/**
* nom du plugin
*/

    public $plugin_name = 'itga_exposants_salon_plugin';
/**
* Plugin author.
*
* @since 1.0.0
*
* @var string
*
*/
    public $author = 'mohammed bensaad';

    /**
    	 * Defines constants for the plugin.
    	 *
    	 * @since  1.0.0
    	 * @access public
    	 * @return void
    	 */
    	function constants() {

    		/* Set the version number of the plugin. */
    		define( 'itga_exposants_salon_plugin_VERSION', '1.0.0' );

    		/* Set constant path to the plugin directory. */
    		define( 'itga_exposants_salon_plugin_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );

    		/* Set constant path to the plugin URI. */
    		define( 'itga_exposants_salon_plugin_DIR', trailingslashit( plugin_dir_url( __FILE__ ) ) );
    	}



  function includes() {


    require_once( itga_exposants_salon_plugin_DIR . '/inc/lyon_CPT.php' );
	require_once( itga_exposants_salon_plugin_DIR . '/inc/nantes_CPT.php' );
    require_once( itga_exposants_salon_plugin_DIR . '/inc/shortcode_spa_lyon.php' );
	require_once( itga_exposants_salon_plugin_DIR . '/inc/shortcode_spa_nantes.php' );


      }

      public function __construct () {
        /* Définissez les constantes nécessaires par le plugin.*/
        add_action ( 'plugins_loaded', array ($this, "constants"), 1);

        /*Charger les fichiers fonctions.  */
        add_action ( 'plugins_loaded', array ($this, 'includes'), 2);

        /* Enregistrement des scripts et des styles.  */
        add_action ( 'wp_enqueue_scripts', array ($this, 'enqueue_scripts'), 11);


        }

      /**
    	 * Loads the stylesheet for the plugin.
    	 *
    	 * @since  1.0.0
    	 * @access public
    	 * @return void
    	 */
    	public static function enqueue_scripts() {

    		/* Utilisez la feuille de style .min si SCRIPT_DEBUG est éteint. */

    		/* CSS */
    		wp_dequeue_style( 'itga_bootstrap' );

    		 /*Enqueue the stylesheet. */
    		wp_enqueue_style(
    			'itga_exposants_salon_plugin',
    			trailingslashit( plugin_dir_url( __FILE__ ) ) . "truc/css/bootstrap.css",
    			itga_exposants_salon_plugin
    		);



        wp_enqueue_style( 'itga_custom_css' );

    		/* Enqueue the stylesheet. */
    		wp_enqueue_style(
    			'itga_exposants_salon_plugin_itga_custom_css',
    			trailingslashit( plugin_dir_url( __FILE__ ) ) . "truc/css/custom.css",
    			itga_exposants_salon_plugin
    		);



    	}


  /**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		if ( !self::$instance )
			self::$instance =new self;

		return self::$instance;
	}

}

itga_exposants_salon_plugin::get_instance();
