<?php
/**
 * NavThemes Custom Functions
 *
 */
 	$default_images = array(
							'images/slider-1.jpg',
							'images/slider-2.jpg',
							'images/slider-3.jpg',
							'images/about_us.jpg',
							'images/logo.png',
							'images/service-image-1.jpg',
							'images/service-image-2.jpg',
							'images/service-image-3.jpg'
					);
	
	function contains($str, array $arr)
	{
		foreach($arr as $a) {
			if (stripos($str,$a) !== false) return true;
		}
		return false;
	}
	
  
  
// Get Resized image from url
function thewest_get_resized_image_from_url($image_url, $image_name){
	
	/**
		@param
		$image_url = image path
		$image_name = Resized image name from add_image_size()
	*/	
 	if(empty($image_url)) return ;
	
	// check if default value
	global $default_images;

	if(contains($image_url,$default_images)) {  
		$image_url = array($image_url);
		return $image_url; 
	}
	
		global $wpdb;
		$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
		
		$image =  wp_get_attachment_image_src( $attachment[0], $image_name);
		return $image; 
  }
       
  
// Get Resized image from url
function thewest_get_resized_only_image_from_url($image_url, $image_name){
	
	/**
		@param
		$image_url = image path
		$image_name = Resized image name from add_image_size()
	*/
		
	if(empty($image_url)) return ;

	// check if default value
	global $default_images;
	if(contains($image_url,$default_images)) return $image_url;
	
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
	
	$image =  wp_get_attachment_image_src( $attachment[0], $image_name);
	return $image[0]; 
  }
       
	/* ----------------------------------------------------------------------------------- */
	/* Logo Tags 
	/* ----------------------------------------------------------------------------------- */

   function thewest_logo_tag(){
	   
	   $logo_tag = array();
	   
	   if(!is_home() || !is_front_page()):
	   
	   	$logo_tag['open'] = "<p itemprop='name'";
	   	$logo_tag['close'] = "</p>";
	   
	   else:
	  
	  	$logo_tag['open'] = "<h1 itemprop='name'";
	   	$logo_tag['close'] = "</h1>";
	   
	   endif;
	   
	   return $logo_tag; 
	   
   }
   
   	/* ----------------------------------------------------------------------------------- */
	/* Description Tags 
	/* ----------------------------------------------------------------------------------- */

   function thewest_description_tag(){
	   
	   $description_tag = array();
	   
	   if(!is_home() || !is_front_page()):
	   
	   	$description_tag['open'] = "<h3 itemprop='description'";
	   	$description_tag['close'] = "</h3>";
	   
	   else:
	  
	   	$description_tag['open'] = "<h2 itemprop='description'";
	   	$description_tag['close'] = "</h2>";
	   
	   endif;
	   
	   return $description_tag;
	   
   }
   
   if ( ! function_exists( 'thewest_entry_meta' ) ) :
   
/**
 * Set up post entry meta.
 */
function thewest_entry_meta() {
	
	// Translators: used between list items, there is a space after the comma.
	$categories_list = '<span class="category" itemprop="articleSection"><i class="fa fa-bookmark"></i>'. get_the_category_list( __( ', ', 'thewest' ) ) . "</span>";
  

	$date = sprintf( '<span class="date"><i class="fa fa-clock-o"></i> <a href="%1$s" title="%2$s" rel="bookmark"><time itemprop="datePublished" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span itemprop="author"><i class="fa fa-user"></i> <span class="author"><a href="%1$s" title="%2$s" rel="">%3$s</a></span></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'thewest' ), get_the_author() ) ),
		get_the_author()
	);
	
	$comment_number = get_comments_number();
	$comment_number = sprintf( _n( '1 Comment', '%s Comments', $comment_number, 'thewest' ), $comment_number );
	$comment_number =  sprintf( ' <span class="comments" itemprop="interactionCount"> <i class="fa fa-comment"></i><a href="%1$s" title="%2$s" rel="comments">%2$s</a></span>',
		get_comments_link(),
		$comment_number
	);

  
  	// Translators: used between list items, there is a space after the comma.
	$tag_list = '<span class="tags"> <i class="fa fa-tags"></i> '. get_the_tag_list( '', __( ', ', 'thewest' ) ). '</span>';

	$utility_text = __( ' %1$s %3$s %4$s %5$s %2$s ', 'thewest' );	
	
  	// Translators: 1 is category, 2 is tag, 3 is the date, 4 is the author's name and 5 is comments.
	echo $categories_list ;
	echo $date ;
	echo $author ;
	echo $comment_number ;
	echo $tag_list ;
 }

endif;
 

	/* ----------------------------------------------------------------------------------- */
	/* Add Footer
	/* ----------------------------------------------------------------------------------- */

	function thewest_footer(){
				echo '<div class="top_btn">
					  <a class="cd-top" href="#0"></a>
								</div>';
				
	}
	
	add_action('wp_footer','thewest_footer');
	

	/* ----------------------------------------------------------------------------------- */
	/* Pagination
	/* ----------------------------------------------------------------------------------- */
	
	function thewest_number_post_nav() {

		 if( is_singular() )
        return;

		global $wp_query;
	
		/** Stop execution if there's only 1 page */
		if( $wp_query->max_num_pages <= 1 )
			return;
	
		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
		$max   = intval( $wp_query->max_num_pages );
	
		/**	Add current page to the array */
		if ( $paged >= 1 )
			$links[] = $paged;
	
		/**	Add the pages around the current page to the array */
		if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}
	
		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}
	
		echo '<div class="text-center"><ul class="pagination">' . "\n";
	
		/**	Previous Post Link */
		if ( get_previous_posts_link() )
			printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
	
		/**	Link to first page, plus ellipses if necessary */
		if ( ! in_array( 1, $links ) ) {
			$class = 1 == $paged ? ' class="active"' : '';
	
			printf( '<li><a href="%s" %s>%s</a></li>' . "\n", esc_url( get_pagenum_link( 1 ) ), $class, '1' );
		}
	
		/**	Link to current page, plus 2 pages in either direction if necessary */
		sort( $links );
		foreach ( (array) $links as $link ) {
			$class = $paged == $link ? ' class="active"' : '';
			printf( '<li><a href="%s" %s>%s</a></li>' . "\n", esc_url( get_pagenum_link( $link ) ), $class, $link );
		}
	
		/**	Link to last page, plus ellipses if necessary */
		if ( ! in_array( $max, $links ) ) {
			$class = $paged == $max ? ' class="active"' : '';
			printf( '<li><a href="%s" %s>%s</a></li>' . "\n", esc_url( get_pagenum_link( $max ) ), $class, $max );
		}
	
		/**	Next Post Link */
		if ( get_next_posts_link() )
			printf( '<li>%s</li>' . "\n", get_next_posts_link() );
	
		echo '</ul></div>' . "\n";

		}


	// Get Words from a string
	function thewest_get_words($content,$word_count=10,$suffix=''){
		$pieces = explode(" ", $content);
		echo $first_part = implode(" ", array_splice($pieces, 0, $word_count)) . $suffix ;
		
	}
 
 	
	if ( ! function_exists( 'thewest_post_thumbnail' ) ) :
	/**
	 * Display an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 *
	 */
	function thewest_post_thumbnail($image = null ) {
		if ( post_password_required() || is_attachment() ) {
			return;
		}
		
	  if(has_post_thumbnail()):		
		
		if ( is_singular() && $image == null) :
		?>
	
		<div class="post-thumbnail">
			<?php the_post_thumbnail( 'large'); ?>
		</div><!-- .post-thumbnail -->
			
		<?php elseif ($image != null) : ?>
        	
		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
			<?php
				the_post_thumbnail( $image , array( 'alt' => get_the_title() ) );
			?>
		</a>
            
        <?php else : ?>
	
		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
			<?php
				the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );
			?>
		</a>
	
		<?php endif; // End is_singular()
	    
          endif; // !has post thumbnails	
		}
	endif;
	
	
	function thewest_post_thumbnails_cond($image){
		if ( has_post_thumbnail() ) {
			the_post_thumbnail($image);
		}
		else {
			echo '<img src="' . get_template_directory_uri() . '/images/no-image.jpg" />';
		}
	}
	function thewest_post_thumbnails_cond_src($image){
		global $post;
		if ( has_post_thumbnail() ) {
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $image );
		 	return $url = $thumb['0']; 
		}
	}
 
 
 // MENU
 function thewest_nav_description( $item_output, $item, $depth, $args ) {

$item_output = str_replace( '>' . $args->link_before . $item->title, ' itemprop="url" >' . $args->link_before. '<span itemprop="name">' . $item->title . '</span>', $item_output );
	
	return $item_output;
}

add_filter( 'walker_nav_menu_start_el', 'thewest_nav_description', 10, 4 );


	/* ----------------------------------------------------------------------------------- */
	/* Home Slider
	/* ----------------------------------------------------------------------------------- */
 

function thewest_home_slider(){ 
	 
	$slider_image1 = thewest_get_resized_image_from_url(get_theme_mod("slider_image1" , get_template_directory_uri() . "/images/slider-1.jpg"), "slider_image");
	$slider_title1 = get_theme_mod('slider_title1', 'Slider Title 1');
	$slider_text1 =  get_theme_mod('slider_text1', __('You can have anything here, which makes a good impression on your visitor', ' thewest '));

	$slider_image2 = thewest_get_resized_image_from_url(get_theme_mod("slider_image2" , get_template_directory_uri() . "/images/slider-2.jpg"), "slider_image");
	$slider_title2 = get_theme_mod('slider_title2', 'Slider Title 2');
	$slider_text2 =  get_theme_mod('slider_text2', __('You can have anything here, which makes a good impression on your visitor', ' thewest '));

	$slider_image3 = thewest_get_resized_image_from_url(get_theme_mod("slider_image3", get_template_directory_uri() . "/images/slider-3.jpg"), "slider_image");
	$slider_title3 = get_theme_mod('slider_title3', 'Slider Title 3');
	$slider_text3 =  get_theme_mod('slider_text3', __('You can have anything here, which makes a good impression on your visitor', ' thewest '));

	if(get_theme_mod('slider_active' , 1)):	

	echo '<div class="slider_wrapper">
		<div class="one_item_carousel">';
	 
	if($slider_image1[0]):	

		echo'		<div id="slider_one" class="slider-item" style="height:611px; background-image:url('. $slider_image1[0] . ');">
					<div class="overly_bg">
						<h1>'.$slider_title1.'</h1>
						<p>'.$slider_text1.'</p>
					</div>
			 </div>';	
	  endif;
		
	if($slider_image2[0]):								
		echo'		<div id="slider_two" class="slider-item" style="height:611px; background-image:url('.  $slider_image2[0]  . ');">
					<div class="overly_bg">
						<h1>'.$slider_title2.'</h1>
						<p>'.$slider_text2.'</p>
					</div>
			 </div>';	
	 	endif;
	 
  	if($slider_image3[0]):								
		echo'		<div id="slider_three" class="slider-item" style="height:611px; background-image:url('.   $slider_image3[0] . ');">
					<div class="overly_bg">
						<h1>'.$slider_title3.'</h1>
						<p>'.$slider_text3.'</p>
					</div>
			 </div>';	
	
	 endif;		 		
	echo '</div></div>';
	
	endif;
	
}