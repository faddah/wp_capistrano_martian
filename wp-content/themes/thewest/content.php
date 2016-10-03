<?php
/**
 * This file is responsible for the post's rendering on the pages.
 */
?> 

 <article id="post-<?php the_ID(); ?>" itemscope="" itemtype="http://schema.org/BlogPosting">
  
  <div class="post_block">
  
	<div class="entry-content">
    <header class="header">
    
        <figure>
            <?php
            // Post thumbnail.
            thewest_post_thumbnail();
        ?>
        </figure>
         
   	<?php
			if ( !is_single() ) :
				the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark" itemprop="url">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
    
  	  <div class="clearfix"></div>
  		
		<?php if ( !is_single() ) :
	 		 thewest_entry_meta();
 		endif; ?>
         
          
   </header>
   
		<?php
			if ( is_single() ) :
		 
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'thewest' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'thewest' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'thewest' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		
    else:
			the_excerpt();
	
	endif;
	?>
 	
        <?php 
	 	if ( !is_single() ) : 
     ?>
     	 <a href="<?php echo esc_url(get_the_permalink()); ?>" class="readmore pull-right"><?php _e('Read More', 'thewest'); ?></a> 
        
     <?php endif ;?>	
    
    <div class="clearboth"></div> 
 	<div class="border"></div>  
    
     
 	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'thewest' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
      
      
  	</div><!-- .entry-content -->
    
    
 </div>
 	<div class="clearboth"></div> 
 </article><!-- #post-## -->
    
 
      <?php
		if(is_single()) {
			comments_template();
			comment_form();
		}
    ?> 
                                        
 