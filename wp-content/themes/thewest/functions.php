<?php
/**
 * The main theme functions file loads styles/scripts, allows some theme functionality and provides some helper functions.
 */
/**
 * This theme only works in WordPress 4.2 or later.
 */

if ( version_compare( $GLOBALS['wp_version'], '4.2', '<' ) ) {
    require get_template_directory() . '/inc/back-compat.php';
}

if ( ! isset( $content_width ) ) $content_width = 1140;


function getAssetsPath($path) {
    return get_template_directory_uri() . '/assets/' . $path;
}

function image($name) {
    return getAssetsPath('img/'.$name);
}

	/**
	 * Enqueue scripts and styles.
	 *
	 */
	function thewest_scripts() {
		global $wp_styles;
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	
		// Loads our bootstrap.
		wp_enqueue_style( 'thewest-bootstrap-style', getAssetsPath('bootstrap/css/bootstrap.min.css') );

		// Adds bootstrap JavaScript.
		wp_enqueue_script( 'thewest-bootstrap-js',getAssetsPath('bootstrap/js/bootstrap.min.js'), array( 'jquery' ) );
	
		// Loads our main stylesheet.
		wp_enqueue_style( 'thewest-style', get_stylesheet_uri() );
	 
		// Loads our main stylesheet.
		wp_enqueue_style( 'thewest-simple-sidebar', getAssetsPath('custom/css/simple-sidebar.css') );
	 
		//Load Font CSS
		wp_enqueue_style('thewest-font-awesome.min', getAssetsPath('custom/css/font-awesome.min.css'));
		
		/* OWL */
		// Loads stylesheets.
			wp_enqueue_style( 'thewest-owl-style', getAssetsPath('owl-carousel/owl.carousel.css'));
			wp_enqueue_style( 'thewest-owl-theme', getAssetsPath('owl-carousel/owl.theme.css'));
			// OWL JS
			wp_enqueue_script( 'thewest-owl',  getAssetsPath('owl-carousel/owl.carousel.js'));
	
		// Custom JS
		wp_enqueue_script( 'thewest-custom',  getAssetsPath('custom/js/custom.min.js'));
	}
	
	add_action( 'wp_enqueue_scripts', 'thewest_scripts' );

/** -------------------------
	 Google Fonts
----------------------------*/

if ( ! function_exists( 'thewest_fonts_url' ) ) :

function thewest_fonts_url() {
    $fonts_url = '';
 
    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $Montserrat = _x( 'on', 'Montserrat font: on or off', 'thewest' );
 
    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $open_sans = _x( 'on', 'Open Sans font: on or off', 'thewest' );
 
    if ( 'off' !== $Montserrat || 'off' !== $open_sans ) {
        $font_families = array();
 
        if ( 'off' !== $Montserrat ) {
            $font_families[] = 'Montserrat:400,700';
        }
 
        if ( 'off' !== $open_sans ) {
            $font_families[] = 'Open Sans:700italic,400,600';
        }
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
           // 'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }
 
    return esc_url_raw( $fonts_url );
}

endif;

function thewest_scripts_styles() {
    wp_enqueue_style( 'thewest-fonts', thewest_fonts_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'thewest_scripts_styles' );	


    //Navigation Menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'thewest')
    ));

    //Add featured image support
    add_theme_support('post-thumbnails');

    //This feature enables plugins and themes to manage the document title tag.
    add_theme_support('title-tag');
    //This feature adds RSS feed links to HTML <head>.
    add_theme_support( 'automatic-feed-links' );
 

	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 1100, 450, true ); 
 
	//Customize excerpt word count
	function custom_excerpt_length() {
		return 25; //25 words
	}
	
	add_filter('excerpt_length', 'custom_excerpt_length');

//Add our Widget Locations
function thewest_WidgetsInit() {

    register_sidebar(array(
        'name' => __('Footer Area 1', 'thewest'),
        'id' => 'footer_area_1',
        'before_widget' => '<div class="footer_widget col-md-5 col-sm-5">',
        'after_widget' => '</div>'
    ));

    register_sidebar(array(
        'name' => __('Footer Area 2', 'thewest'),
        'id' => 'footer_area_2',
        'before_widget' => '<div class="footer_widget col-md-7 col-sm-7">',
        'after_widget' => '</div>'
    ));

}
	/* Add image sizes */
	add_image_size ( 'slider_image', 1100, 611, true);
	add_image_size ( 'aboutus_image', 295, 350, true);
	add_image_size ( 'services_image', 300, 200, true);

add_action('widgets_init', 'thewest_WidgetsInit');

include_once( dirname( __FILE__ ) . '/theme-options.php' );

include('navthemes_fuctions.php');