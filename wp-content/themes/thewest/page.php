<?php
/**
 * This file is responsible for the display of pages.
 */
get_header(); 
?>
	<?php if(is_front_page()): 
		  thewest_home_slider(); 
 	else: 
	?>
      <div class="page-title" style="background-image:url(<?php echo get_theme_mod('inner_page_bg_image',  get_template_directory_uri() . '/images/slider-1.jpg'); ?>)">
      	<div class="overly_bg">
			   <?php
                    the_title( '<h1 class="page-title">', '</h1>' );
                ?>
			 </div>
         </div>
	<?php endif; ?>
     
 <div class="middle_wrapper">
 		
        <?php if(is_front_page()): ?>
              
        <!-- About us Section -->
            <section class="about_section">
             <div class="container">
                <div class="col-md-8 col-sm-8">
                    
                   	 <h2 id="aboutus_title"><?php echo get_theme_mod('homepage_aboutus_title', __('you can have anything here which is related to your about us' , 'thewest')); ?></h2>
                    
                        <p><?php echo get_theme_mod('homepage_aboutus_text',  __('Pellentesque nulla magna, accumsan sed ante quis, gravida feugiat turpis. Vivamus et fringilla ligula. Etiam sapien tellus, imperdiet eget posuere nec, cursus vel arcu. Ut molestie at posuere ante, at volutpat tellus egestas. Sed ut nunc egestas, porta tortor a, tempor sem.' , 'thewest') ); ?></p>
                    
                   <?php if(get_theme_mod('homepage_aboutus_readmore_switch' , 1)): ?> 
                        <a href="<?php echo esc_url(get_theme_mod('homepage_aboutus_readmore_link' , '#'), 'thewest'); ?>" class="read_more"><?php _e('Read More', 'thewest'); ?></a>
                    <?php endif; ?>
                </div>
                <div class="col-md-4 col-sm-4"><img src="<?php echo thewest_get_resized_only_image_from_url(get_theme_mod('homepage_aboutus_image' , get_template_directory_uri() . '/images/about_us.jpg'),'aboutus_image');  ?>"></div> 	
             </div>   
          </section>
        <!-- /About us Section -->
        
        <section class="services_wrapper">
                 <div class="container">
                    <div class="row">
                          <div class="col-md-4 col-sm-4">
                                <img src="<?php echo thewest_get_resized_only_image_from_url(get_theme_mod('homepage_services_image1' , get_template_directory_uri() . '/images/service-image-1.jpg'),'services_image');  ?>">
                                <h3><?php echo get_theme_mod('homepage_services_title1' , __('Services Title One', 'thewest') );  ?></h3>
                                <p><?php echo get_theme_mod('homepage_services_text1' , __('You can anything related to your Services. Pellentesque nulla magna, accumsan sed ante quis, gravida feugiat turpis.', 'thewest'));  ?></p>
                          </div>
                          <div class="col-md-4 col-sm-4 ">
                                <img src="<?php echo thewest_get_resized_only_image_from_url(get_theme_mod('homepage_services_image2', get_template_directory_uri() . '/images/service-image-2.jpg'),'services_image');  ?>">
                                <h3><?php echo get_theme_mod('homepage_services_title2' , __('Services Title Two' , 'thewest'));  ?></h3>
                                <p><?php echo get_theme_mod('homepage_services_text2' , __('You can anything related to your Services. Pellentesque nulla magna, accumsan sed ante quis, gravida feugiat turpis.', 'thewest'));  ?></p>
                          </div>
                          <div class="col-md-4 col-sm-4">
                                <img src="<?php echo thewest_get_resized_only_image_from_url(get_theme_mod('homepage_services_image3' , get_template_directory_uri() . '/images/service-image-3.jpg'),'services_image');  ?>">
                                <h3><?php echo get_theme_mod('homepage_services_title3' , __('Services Title Three', 'thewest'));  ?></h3>
                                <p><?php echo get_theme_mod('homepage_services_text3' , __('You can anything related to your Services. Pellentesque nulla magna, accumsan sed ante quis, gravida feugiat turpis.', 'thewest'));  ?></p>
                          </div>
                    </div>	      
               </div>
         </section>

       <!--Testimonials Wrapper Start Here-->  
        <section class="testimonials_wrapper">
             <div class="container">
                    <div class="col-md-7 col-sm-7">
                        <div class="one_item_carousel">
                        
                           <div> <i class="fa fa-quote-left"></i> 
                            <span><?php echo get_theme_mod('homepage_testimoial_text1' , __('Pellentesque nulla magna, accumsan sed ante quis, gravida feugiat turpis.', 'thewest' ));   ?></span>
                            <br/>
                            <span class="pull-right"><?php echo get_theme_mod('homepage_testimoial_client1' , __('Client 1', 'thewest'));  ?></span>
                            </div>
                               
                           <div> <i class="fa fa-quote-left"></i>
                            <span><?php echo get_theme_mod('homepage_testimoial_text2' , __('Pellentesque nulla magna, accumsan sed ante quis, gravida feugiat turpis.', 'thewest'));  ?></span>
                            <br/>
                            <span class="pull-right"><?php echo get_theme_mod('homepage_testimoial_client2' , __('Client 2', 'thewest' ));  ?></span>
                            </div>
                               
                           <div> <i class="fa fa-quote-left"></i>
                            <span><?php echo get_theme_mod('homepage_testimoial_text3' , __('Pellentesque nulla magna, accumsan sed ante quis, gravida feugiat turpis.', 'thewest' ));  ?></span>
                            <br/>
                            <span class="pull-right"><?php echo get_theme_mod('homepage_testimoial_client3' , __('Client 3', 'thewest' ));  ?></span>
                            </div> 
                            
                        </div>    
                     </div>	
                        
                     <div class="col-md-5 col-sm-5">
                          <h2><?php echo get_theme_mod('homepage_testimoial_title' , __('Testimonials' , 'thewest'));  ?></h2>
                          <p><?php echo get_theme_mod('homepage_testimoial_text' , __('Pellentesque nulla magna, accumsan sed ante quis, gravida feugiat turpis.', 'thewest') );  ?></p>
                     </div>
                                 
             </div> 
         </section> 
       <!--Testimonials Wrapper End Here-->  
   
        <?php  
	else:	
		 ?>
            
       <div class="col-md-12"> 
            <?php
            if(have_posts()) {
                while(have_posts()) {
                    the_post();
                    get_template_part('content-page');
                }
            }
            ?> 
        </div>  
 <?php endif;?>	
</div>

<?php
get_footer();