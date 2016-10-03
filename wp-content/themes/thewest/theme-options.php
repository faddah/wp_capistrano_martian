<?php
/**
	This File handles Customizer Options
*/

include_once( 'admin/kirki/kirki.php' );


// Early exit if Kirki is not installed
if ( ! class_exists( 'Kirki' ) ) {
	return;
}

 
/**
 * Configuration sample for the Kirki Customizer.
 */
function navthemes_configuration() {

	$args = array(
		'logo_image'   => 'http://navthemes.com/branding/inthemes/logo.png',
		'url_path' => get_stylesheet_directory_uri() . '/admin/kirki/'
   );

	return $args;

}

add_filter( 'kirki/config', 'navthemes_configuration' );

/*=================================
	Config	
  ================================= */

Kirki::add_config( 'navthemes', array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'theme_mod',
 	
) );

	/* NavThemes Branding */

	Kirki::add_section( 'navthemes_support', array(
			'title'          => __( 'NavThemes Support', 'thewest' ),
			'description'    => __( 'You are using Free version of TheWest Theme, Check out Paid version, which comes with many exciting features in the package.' , 'thewest' ),
			'priority'       => 1,
	) );
			
		Kirki::add_field( 'navthemes', array(
		'type'        => 'custom',
		'settings'     => 'navthemes_support',
		'section'     => 'NavThemes_Support',
		'default'     => '<div id="navthemes_branding"><h1>Get Paid Version of TheWest for Just $59</h1>
			<div class="navthemes-links">
			<ul>
				<li><a target="_blank" href="http://www.navthemes.com/thewest-pro-multipurpose-wordpress-theme/">Check out All Features of Paid version</a></li>
				<li><a target="_blank" href="http://demo.navthemes.com/?demo=thewest-pro-multipurpose-wordpress-theme&c=o0ITXKdmK">View Demo</a></li>
			</ul> 
		</div>
		</div>',
		'priority'    => 10,
	) );		


/*=================================
	Home Page Panel	
  ================================= */

	Kirki::add_panel( 'homepage', array(
		'priority'    => 10,
		'title'       => __( 'Front Page Settings', 'thewest' ),
		'description' => __( 'Manage Front Page Setting from here', 'thewest' ),
	) );
	
	/*=================================
		Home Slider Section	
  	================================= */
		
	Kirki::add_section( 'homepage_slider', array(
		'title'          => __( 'Slider Settings', 'thewest' ),
		'description'    => __( 'From here you can manage background image, Title and Text of Sliders', 'thewest' ),
		'panel'          => 'homepage', 
		'priority'       => 160,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
	) );
 	
		/*=================================
			Add Fields to Home Page Section
		================================= */
	 	
		// Switch
		Kirki::add_field( 'navthemes', array(
			'type'        => 'switch',
			'settings'    => 'slider_active',
			'label'       => __( 'Slider Active', 'thewest' ),
			'description' => __( 'You Can On/Off Front Page Slider from here', 'thewest' ),
			'section'     => 'homepage_slider',
			'default'     => '1',
			'priority'    => 10,
		) );
				
		Kirki::add_field( 'navthemes', array(
				'settings' => 'slider_title1',
				'label'    => __( 'Slider Title 1', 'thewest' ),
				'section'  => 'homepage_slider',
				'type'     => 'text',
				'priority' => 10,
				'default'  => __('Slider One Title', 'thewest'),
			) );
			
				
			Kirki::add_field( 'navthemes', array(
				'settings' => 'slider_text1',
				'label'    => __( 'Slider Text 1', 'thewest' ),
				'section'  => 'homepage_slider',
				'type'     => 'text',
				'priority' => 10,
				'default'  => __('You can have anything here, which makes a good impression on your visitor', 'thewest'),
				
			) );
	 
	
			Kirki::add_field( 'navthemes', array(
				'settings' => 'slider_image1',
				'label'    => __( 'Slider Image 1', 'thewest' ),
				'section'  => 'homepage_slider',
				'type'        => 'image',
				'priority' => 10,
				'default'  => get_template_directory_uri() . '/images/slider-1.jpg',
			) );
			
				
			Kirki::add_field( 'navthemes', array(
				'settings' => 'slider_title2',
				'label'    => __( 'Slider Title 2', 'thewest' ),
				'section'  => 'homepage_slider',
				'type'     => 'text',
				'priority' => 10,
				'default'  => __('Slider Two Title', 'thewest'),
			) );
			
				
			Kirki::add_field( 'navthemes', array(
				'settings' => 'slider_text2',
				'label'    => __( 'Slider Text 2', 'thewest' ),
				'section'  => 'homepage_slider',
				'type'     => 'text',
				'priority' => 10,
				'default'  => __('You can have anything here, which makes a good impression on your visitor', 'thewest'),
			) );
			
				 
			Kirki::add_field( 'navthemes', array(
				'settings' => 'slider_image2',
				'label'    => __( 'Slider Image 2', 'thewest' ),
				'section'  => 'homepage_slider',
				'type'     => 'image',
				'priority' => 10,
				'default'  => get_template_directory_uri() . '/images/slider-2.jpg',
			) );
			
			Kirki::add_field( 'navthemes', array(
				'settings' => 'slider_title3',
				'label'    => __( 'Slider Title 3', 'thewest' ),
				'section'  => 'homepage_slider',
				'type'     => 'text',
				'priority' => 10,
				'default'  => __('Slider Three Title', 'thewest'),
			) );
			
				
			Kirki::add_field( 'navthemes', array(
				'settings' => 'slider_text3',
				'label'    => __( 'Slider Text 3', 'thewest' ),
				'section'  => 'homepage_slider',
				'type'     => 'text',
				'priority' => 10,
				'default'  => __('You can have anything here, which makes a good impression on your visitor', 'thewest'),
			) );
	 	 
			Kirki::add_field( 'navthemes', array(
				'settings' => 'slider_image3',
				'label'    => __( 'Slider Image 3', 'thewest' ),
				'section'  => 'homepage_slider',
				'type'     => 'image',
				'priority' => 10,
				'default'  => get_template_directory_uri() . '/images/slider-3.jpg',
			) );
			
				
	/*--------------------------------------------------------------------------
	  --------------------------------------------------------------------------
				Home Page About us Section	
	--------------------------------------------------------------------------
	--------------------------------------------------------------------------*/
			
		Kirki::add_section( 'homepage_aboutus', array(
			'title'          => __( 'About us Setting' , 'thewest' ),
			'description'    => __( 'From here you can manage Home Page about us section' , 'thewest' ),
			'panel'          => 'homepage', 
			'priority'       => 160,
			'capability'     => 'edit_theme_options',
		) );
		
  		Kirki::add_field( 'navthemes', array(
				'settings' => 'homepage_aboutus_title',
				'label'    => __( 'About us Title', 'thewest' ),
				'section'  => 'homepage_aboutus',
				'type'     => 'text',
				'priority' => 10,
				'default'  => __('you can have anything here which is related to your about us', 'thewest'), 
			  
			) );
			
  		Kirki::add_field( 'navthemes', array(
				'settings' => 'homepage_aboutus_text',
				'label'    => __( 'About us Text', 'thewest' ),
				'section'  => 'homepage_aboutus',
				'type'     => 'textarea',
				'priority' => 10,
				'default'  => __('Pellentesque nulla magna, accumsan sed ante quis, gravida feugiat turpis. Vivamus et fringilla ligula. Etiam sapien tellus, imperdiet eget posuere nec, cursus vel arcu. Ut molestie at posuere ante, at volutpat tellus egestas. Sed ut nunc egestas, porta tortor a, tempor sem.', 'thewest'), 
			 
			) );
 		
  	Kirki::add_field( 'navthemes', array(
				'settings' => 'homepage_aboutus_readmore_switch',
				'label'    => __( 'Show Read More', 'thewest' ),
				'section'  => 'homepage_aboutus',
				'type'     => 'toggle',
				'priority' => 10,
				'default'  => 1, 
			 
			) );
	
	Kirki::add_field( 'navthemes', array(
		'settings' => 'homepage_aboutus_readmore_link',
		'label'    => __( 'Read More link', 'thewest' ),
		'section'  => 'homepage_aboutus',
		'type'     => 'text',
		'priority' => 10,
		'default'  => '#', 	
		 'required'  => array(
		  array(
			'setting'  => 'homepage_aboutus_readmore_switch',
			'operator' => '==',
			'value'    => 1,
		  ),
		)
	 
	) );
	
	Kirki::add_field( 'navthemes', array(
		'settings' => 'homepage_aboutus_image',
		'label'    => __( 'About us Image', 'thewest' ),
		'section'  => 'homepage_aboutus',
		'type'     => 'image',
		'priority' => 10,
		'default'  => get_template_directory_uri() . '/images/about_us.jpg', 	
	) );
					
	/*--------------------------------------------------------------------------
	  --------------------------------------------------------------------------
				Home Page Services Section	
	--------------------------------------------------------------------------
	--------------------------------------------------------------------------*/
			
		Kirki::add_section( 'homepage_services', array(
			'title'          => __( 'Services', 'thewest' ),
			'description'    => __( 'From here you can manage Home Page about us section' , 'thewest' ),
			'panel'          => 'homepage', 
			'priority'       => 160,
			'capability'     => 'edit_theme_options',
		) );
		
  		Kirki::add_field( 'navthemes', array(
				'settings' => 'homepage_services_title1',
				'label'    => __( 'Services Title 1', 'thewest' ),
				'section'  => 'homepage_services',
				'type'     => 'text',
				'priority' => 10,
				'default'  => __('Services Title One', 'thewest'), 
			 
			) );
			
  		Kirki::add_field( 'navthemes', array(
				'settings' => 'homepage_services_text1',
				'label'    => __( 'Services Text 1', 'thewest' ),
				'section'  => 'homepage_services',
				'type'     => 'textarea',
				'priority' => 10,
				'default'  => __('You can anything related to your Services. Pellentesque nulla magna, accumsan sed ante quis, gravida feugiat turpis.', 'thewest' ), 
			 
			) );
 		
  	Kirki::add_field( 'navthemes', array(
				'settings' => 'homepage_services_image1',
				'label'    => __( 'Services Image 1', 'thewest' ),
				'section'  => 'homepage_services',
				'type'     => 'image',
				'priority' => 10,
				'default'  => get_template_directory_uri() . '/images/service-image-1.jpg',
			 
			) );
	
 
 		Kirki::add_field( 'navthemes', array(
				'settings' => 'homepage_services_title2',
				'label'    => __( 'Services Title 2', 'thewest' ),
				'section'  => 'homepage_services',
				'type'     => 'text',
				'priority' => 10,
				'default'  => __('Services Title Two', 'thewest'),  
			 
			) );
			
  		Kirki::add_field( 'navthemes', array(
				'settings' => 'homepage_services_text2',
				'label'    => __( 'Services Text 2', 'thewest' ),
				'section'  => 'homepage_services',
				'type'     => 'textarea',
				'priority' => 10,
				'default'  => __('You can anything related to your Services. Pellentesque nulla magna, accumsan sed ante quis, gravida feugiat turpis.', 'thewest' ), 
			 
			) );
 		
  	Kirki::add_field( 'navthemes', array(
				'settings' => 'homepage_services_image2',
				'label'    => __( 'Services Image 3', 'thewest' ),
				'section'  => 'homepage_services',
				'type'     => 'image',
				'priority' => 10,
				'default'  => get_template_directory_uri() . '/images/service-image-2.jpg',
			 
			) );
	
 
 		Kirki::add_field( 'navthemes', array(
				'settings' => 'homepage_services_title3',
				'label'    => __( 'Services Title 3', 'thewest' ),
				'section'  => 'homepage_services',
				'type'     => 'text',
				'priority' => 10,
				'default'  => __('Services Title Three', 'thewest'), 
			 
			) );
			
  		Kirki::add_field( 'navthemes', array(
				'settings' => 'homepage_services_text3',
				'label'    => __( 'Services Text 3', 'thewest' ),
				'section'  => 'homepage_services',
				'type'     => 'textarea',
				'priority' => 10,
				'default'  => __('You can anything related to your Services. Pellentesque nulla magna, accumsan sed ante quis, gravida feugiat turpis.', 'thewest' ), 
			 
			) );
 		
  	Kirki::add_field( 'navthemes', array(
				'settings' => 'homepage_services_image3',
				'label'    => __( 'Services Image 3', 'thewest' ),
				'section'  => 'homepage_services',
				'type'     => 'image',
				'priority' => 10,
				'default'  => get_template_directory_uri() . '/images/service-image-3.jpg',
			 
			) );		
	
	
	/*--------------------------------------------------------------------------
	  --------------------------------------------------------------------------
				Home Page Testimonial Section	
	--------------------------------------------------------------------------
	--------------------------------------------------------------------------*/
			
		Kirki::add_section( 'homepage_testimonial', array(
			'title'          => __( 'Testimonials', 'thewest' ),
			'description'    => __( 'From here you can manage Testimonials', 'thewest' ),
			'panel'          => 'homepage', 
			'priority'       => 160,
			'capability'     => 'edit_theme_options',
		) );
		
			
  		Kirki::add_field( 'navthemes', array(
				'settings' => 'homepage_testimoial_title',
				'label'    => __( 'Testimonial Title', 'thewest' ),
				'section'  => 'homepage_testimonial',
				'type'     => 'text',
				'priority' => 10,
				'default'  => __('Testimonials', 'thewest'), 
			 
		 ) );
		
			
			
  		Kirki::add_field( 'navthemes', array(
				'settings' => 'homepage_testimoial_text',
				'label'    => __( 'Testimonial Text', 'thewest' ),
				'section'  => 'homepage_testimonial',
				'type'     => 'textarea',
				'priority' => 10,
				'default'  => __('Pellentesque nulla magna, accumsan sed ante quis, gravida feugiat turpis.', 'thewest' ), 
			 
		 ) );
		
			
  		Kirki::add_field( 'navthemes', array(
				'settings' => 'homepage_testimoial_client1',
				'label'    => __( 'Client 1', 'thewest' ),
				'section'  => 'homepage_testimonial',
				'type'     => 'text',
				'priority' => 10,
				'default'  => __('Client 1', 'thewest'), 
			 
		 ) );
		 
  		Kirki::add_field( 'navthemes', array(
				'settings' => 'homepage_testimoial_text1',
				'label'    => __( 'Testimonial 1', 'thewest' ),
				'section'  => 'homepage_testimonial',
				'type'     => 'textarea',
				'priority' => 10,
				'default'  => __('Pellentesque nulla magna, accumsan sed ante quis, gravida feugiat turpis.', 'thewest' ), 
			 
			) );
		
			
  		Kirki::add_field( 'navthemes', array(
				'settings' => 'homepage_testimoial_client2',
				'label'    => __( 'Client 2', 'thewest' ),
				'section'  => 'homepage_testimonial',
				'type'     => 'text',
				'priority' => 10,
				'default'  => __('Client 2', 'thewest'), 
			 
		 ) );
		 
  		Kirki::add_field( 'navthemes', array(
				'settings' => 'homepage_testimoial_text2',
				'label'    => __( 'Testimonial 2', 'thewest' ),
				'section'  => 'homepage_testimonial',
				'type'     => 'textarea',
				'priority' => 10,
				'default'  => __('Pellentesque nulla magna, accumsan sed ante quis, gravida feugiat turpis.', 'thewest' ), 
			 
			) );
		
			
  		Kirki::add_field( 'navthemes', array(
				'settings' => 'homepage_testimoial_client3',
				'label'    => __( 'Client 3', 'thewest' ),
				'section'  => 'homepage_testimonial',
				'type'     => 'text',
				'priority' => 10,
				'default'  => __('Client 3', 'thewest'), 
			 
		 ) );
		 
  		Kirki::add_field( 'navthemes', array(
				'settings' => 'homepage_testimoial_text3',
				'label'    => __( 'Testimonial 3', 'thewest' ),
				'section'  => 'homepage_testimonial',
				'type'     => 'textarea',
				'priority' => 10,
				'default'  => __('Pellentesque nulla magna, accumsan sed ante quis, gravida feugiat turpis. ', 'thewest' ), 
			 
			) );

/*--------------------------------------------------------------------------
  --------------------------------------------------------------------------
			General Settings
--------------------------------------------------------------------------
--------------------------------------------------------------------------*/
			
		
	Kirki::add_panel( 'general_settings', array(
		'priority'    => 10,
		'title'       => __( 'General Settings', 'thewest' ),
		'description' => __( 'Manage General Setting from here', 'thewest' ),
	) );
	
	/*=================================
		General Section	
  	================================= */
		
	Kirki::add_section( 'general_settings', array(
		'title'          => __( 'General Settings', 'thewest' ),
		'description'    => __( 'From Here You Can Manage Some General Settings' , 'thewest' ),
		'panel'          => 'general_settings', 
		'priority'       => 160,
		'capability'     => 'edit_theme_options', 
	) );
  
		Kirki::add_field( 'navthemes', array(
				'settings' => 'inner_page_bg_image',
				'label'    => __( 'Inner Pages Title Background image', 'thewest' ),
				'section'  => 'general_settings',
				'type'     => 'image',
				'priority' => 10,
				'default'  => get_template_directory_uri() . '/images/slider-1.jpg',
				//'active_callback' => 'is_not_front_page', 
			 
			) );

	Kirki::add_field( 'navthemes', array(
			'settings' => 'top_top',
			'label'    => __( 'Show Top Button', 'thewest' ),
			'section'  => 'general_settings',
			'type'     => 'toggle',
			'priority' => 10,
			'default'  => 1,
			 
		 
		) );				

	Kirki::add_section( 'social_settings', array(
		'title'          => __( 'Social Settings', 'thewest' ),
		'description'    => __( 'From Here You Can Manage Some Social Settings' , 'thewest' ),
		'panel'          => 'general_settings', 
		'priority'       => 160,
		'capability'     => 'edit_theme_options', 
	) );
	
		Kirki::add_field( 'navthemes', array(
				'settings' => 'social_facebook',
				'label'    => __( 'Facebook', 'thewest' ),
				'section'  => 'social_settings',
				'type'     => 'url',
				'priority' => 10,
				'default'  => '#',
				 
			 
			) );
	
		Kirki::add_field( 'navthemes', array(
				'settings' => 'social_twitter',
				'label'    => __( 'Twiiter', 'thewest' ),
				'section'  => 'social_settings',
				'type'     => 'url',
				'priority' => 10,
				'default'  => '#',
				 
			 
			) );
	
		Kirki::add_field( 'navthemes', array(
				'settings' => 'social_pinterest',
				'label'    => __( 'Pinterest', 'thewest' ),
				'section'  => 'social_settings',
				'type'     => 'url',
				'priority' => 10,
				'default'  => '#',
				 
			 
			) );
	 
	 Kirki::add_field( 'navthemes', array(
				'settings' => 'social_tumblr',
				'label'    => __( 'Tumblr', 'thewest' ),
				'section'  => 'social_settings',
				'type'     => 'url',
				'priority' => 10,
				'default'  => '#',
				 
			 
			) );
	
		Kirki::add_section( 'logo_settings', array(
			'title'          => __( 'Logo Settings', 'thewest' ),
			'description'    => __( 'From Here You Can Manage Manage Settings' , 'thewest' ),
			'panel'          => 'general_settings', 
			'priority'       => 160,
			'capability'     => 'edit_theme_options', 
		) );
	
		Kirki::add_field( 'navthemes', array(
				'settings' => 'logo',
				'label'    => __( 'Logo', 'thewest' ),
				'section'  => 'logo_settings',
				'type'     => 'image',
				'priority' => 10,
				'default'  => get_template_directory_uri() . '/images/logo.png',
			 
			) );
/*	
	 	 function is_not_front_page() {
		 	if(!is_front_page()) return true;
			else false;	
				
		}*/
		
 	function customizer_css() {
	 // Loads our main stylesheet.
		wp_enqueue_style( 'customizer-css', get_template_directory_uri().'/customizer.css' );
	}
	
	add_action( 'customize_controls_print_styles', 'customizer_css');

		