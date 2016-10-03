<?php
/**
 * This file handles how search results will look like.
 */
get_header();
?>

  <div class="page-title" style="background-image:url(<?php echo get_theme_mod('inner_page_bg_image',  get_template_directory_uri() . '/images/slider-1.jpg'); ?>)">
      	<div class="overly_bg">
			 <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'thewest' ), get_search_query() ); ?></h1>
			 </div>
   </div>
  
          <div class="post_section">
               <?php
                if(have_posts()) {
                    while(have_posts()) {
                        the_post();
                      get_template_part('content');
                    }
                }
			else {
		        ?>
            <div class="post_block" <?php post_class(); ?>>
	            <div class="content_wrap"><h2><?php printf( __( 'Nothing Found for : %s <br/>', 'thewest' ), get_search_query() ); ?></h2>
            </div>   
       <?php }?> 
        
      
        <!--pagination start-->
        <?php thewest_number_post_nav(); ?>
        <!--pagination end-->
    </div> <!--col-md-9 end-->
<?php
get_footer();