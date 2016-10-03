<?php
/**
 * This file handles how each individual post will look like.
 */
get_header();
global $post;
the_post();
?>
    <div class="page-title" style="background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>')">
      	<div class="overly_bg">
			   <?php
                    the_title( '<h1 class="page-title">', '</h1>' );
                ?>
        
         <?php if ( is_single() ) :
				 thewest_entry_meta();
 		endif; ?>
        
     		 </div>
         </div>
		 
<div class="post_section single">
 <div class="col-md-12 col-sm-12">

        <?php if ( is_single() ) :
  			get_template_part('content');
 		
		else:
			if(have_posts()) {
				while(have_posts()) {
					the_post();
					get_template_part('content');
				}
			}
		endif;	
        ?>
    </div> <!--col-md-9 end--> 
<?php
get_footer();