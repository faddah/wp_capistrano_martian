<?php
/**
 * This file handles how search results will look like.
 */
get_header();
?>
	
     <div class="page-title" style="background-image:url(<?php echo get_theme_mod('inner_page_bg_image',  get_template_directory_uri() . '/images/slider-1.jpg'); ?>)">
      	<div class="overly_bg">
			 <h1 class="page-title"><?php _e( '404. Nothing here', 'thewest' ); ?></h1>
			 </div>
   </div>
     
     <div class="post_section">
        <div class="post_block" <?php post_class(); ?>>
            <div class="content_wrap"><h2><?php _e( 'Nothing Found here, you might want to try Searching', 'thewest' ); ?></h2>
            <?php echo get_search_form(); ?>
        </div>   
	</div>     
<?php
get_footer();