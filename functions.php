<?php
/**
 * mattWpStarter's functions and definitions
 */


/**
 * Set the maximum content width based on the theme's design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */
if ( ! isset( $content_width ) )
    $content_width = 800; /* pixels */


if ( ! function_exists( 'mattWpStarter_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features
     *
     *  It is important to set up these functions before the init hook so that none of these
     *  features are lost.
     *
     *  @since mattWpStarter-starter 1.0
     */

    function mattWpStarter_setup() {

        /**
         * Automatic feed links enables post and comment RSS feeds by default.
         * These feeds will be displayed in <head> automatically.
         */
        add_theme_support( 'automatic-feed-links' );

        /**
         * Enable support for the following post formats:
         * aside, gallery, quote, image, and video
         */
        add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );

        /**
         * Enable block editor functions for theme
         */
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'editor-styles' );
        add_theme_support( 'html5', array('style','script', ) );
        add_theme_support( 'automatic-feed-links' );

        /**
         * Register nav menus
         */
        register_nav_menus( array(
            'primary'   => __( 'Primary Menu', 'mattWpStarter' ),
            'mobile' => __('Mobile Menu', 'mattWpStarter' ),
            'footer' => __('Footer Menu', 'mattWpStarter' )
        ) );

        /**
         * Register scripts and styles
         */
        function add_scripts(){
            wp_enqueue_style( 'starter-style', get_template_directory_uri() . '/dist/css/app.css' );
            wp_enqueue_script('starter-script', get_template_directory_uri() . '/dist/js/app.js' , array(), null, true);
        }
        add_action('wp_enqueue_scripts', 'add_scripts');

        /**
         * Register Sidebars
         */
        add_action( 'widgets_init', 'my_register_sidebars' );
        function my_register_sidebars()
        {
            /* Register the 'primary' sidebar. */
            register_sidebar(
                array(
                    'id' => 'primary',
                    'name' => __('Primary Sidebar'),
                    'description' => __('Primary sidebar for the theme'),
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget' => '</div>',
                    'before_title' => '<h3 class="widget-title">',
                    'after_title' => '</h3>',
                )
            );
        }
    }
endif;
add_action( 'after_setup_theme', 'mattWpStarter_setup' );

/**
 * Add Function files from Lib
 */
require_once('lib/functions/functions.php');