<?php
/**
 * This is the index file handling the view of the homepage of the blog.
 */
get_header();
?>
<?php if (is_home()): ?>
    <div class="page-title" style="background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>')">
      	<div class="overly_bg">
			        <h1><?php bloginfo('name'); ?></h1>
             </div>
         </div>
  <?php endif; ?>
    
<div class="post_section">
 <div class="col-md-12 col-sm-12">
 	<!--col-md-9 start-->
        <?php
        if(have_posts()) {
            while(have_posts()) {
                the_post();
    	         get_template_part('content');
	        }
        }
        ?>
        
   </div>
   </div>
 	 <!--pagination start-->
    <?php thewest_number_post_nav(); ?>
    <!--pagination end-->
<?php
get_footer();