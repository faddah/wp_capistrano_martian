<?php
/**
 * This file handles how Archives will look like.
 */
get_header(); 
?>
      <div class="page-title" style="background-image:url(<?php echo get_theme_mod('inner_page_bg_image',  get_template_directory_uri() . '/images/slider-1.jpg'); ?>)">
      	<div class="overly_bg">
			   <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
                
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
        ?>
  
   </div>

        <!--pagination start-->
        <?php thewest_number_post_nav(); ?>
        <!--pagination end-->
  
<?php get_sidebar(); ?>
<?php
get_footer();