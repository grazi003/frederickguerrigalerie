<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package The_Minimal
 */

 /**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
 function the_minimal_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
 	if ( is_multi_author() ) {
 		$classes[] = 'group-blog';
 	}

	// Adds a class of hfeed to non-singular pages.
 	if ( ! is_singular() ) {
 		$classes[] = 'hfeed';
 	}
 	
    // Adds a class of custom-background-image to sites with a custom background image.
 	if ( get_background_image() ) {
 		$classes[] = 'custom-background-image';
 	}
 	
    // Adds a class of custom-background-color to sites with a custom background color.
 	if ( get_background_color() != 'ffffff' ) {
 		$classes[] = 'custom-background-color';
 	}

 	return $classes;
 }
 add_filter( 'body_class', 'the_minimal_body_classes' );

/**
 * Callback for Social Links 
 */
function the_minimal_social_cb(){
	$facebook    = get_theme_mod( 'the_minimal_facebook' );
	$twitter     = get_theme_mod( 'the_minimal_twitter' );
	$instagram   = get_theme_mod( 'the_minimal_instagram' );
	$google_plus = get_theme_mod( 'the_minimal_google_plus' );
	$pinterest   = get_theme_mod( 'the_minimal_pinterest' );
	$linkedin    = get_theme_mod( 'the_minimal_linkedin' );
	$youtube     = get_theme_mod( 'the_minimal_youtube' );
	$vimeo       = get_theme_mod( 'the_minimal_vimeo' );
	$ok          = get_theme_mod( 'the_minimal_odnoklassniki' );
	$vk          = get_theme_mod( 'the_minimal_vk' );
	$xing        = get_theme_mod( 'the_minimal_xing' );
	
	if( $facebook || $twitter || $instagram || $google_plus || $pinterest || $linkedin || $youtube || $vimeo || $ok || $vk || $xing ){
		?>
		<ul class="social-networks">
			<?php if( $facebook ){?>
				<li><a href="<?php echo esc_url( $facebook );?>" target="_blank" title="<?php esc_attr_e( 'Facebook', 'the-minimal' ); ?>"><span class="fa fa-facebook"></span></a></li>
			<?php } if( $twitter ){?>    
				<li><a href="<?php echo esc_url( $twitter );?>" target="_blank" title="<?php esc_attr_e( 'Twitter', 'the-minimal' ); ?>"><span class="fa fa-twitter"></span></a></li>
			<?php } if( $instagram ){?>
				<li><a href="<?php echo esc_url( $instagram );?>" target="_blank" title="<?php esc_attr_e( 'Instagram', 'the-minimal' ); ?>"><span class="fa fa-instagram"></span></a></li>
			<?php } if( $google_plus ){?>
				<li><a href="<?php echo esc_url( $google_plus );?>" target="_blank" title="<?php esc_attr_e( 'Google Plus', 'the-minimal' ); ?>"><span class="fa fa-google-plus"></span></a></li>
			<?php } if( $pinterest ){?>
				<li><a href="<?php echo esc_url( $pinterest );?>" target="_blank" title="<?php esc_attr_e( 'Pinterest', 'the-minimal' ); ?>"><span class="fa fa-pinterest-p"></span></a></li>
			<?php } if( $linkedin ){?>
				<li><a href="<?php echo esc_url( $linkedin );?>" target="_blank" title="<?php esc_attr_e( 'LinkedIn', 'the-minimal' ); ?>"><span class="fa fa-linkedin"></span></a></li>
			<?php } if( $youtube ){?>
				<li><a href="<?php echo esc_url( $youtube );?>" target="_blank" title="<?php esc_attr_e( 'YouTube', 'the-minimal' ); ?>"><span class="fa fa-youtube"></span></a></li>
			<?php } if( $vimeo ){?>
				<li><a href="<?php echo esc_url( $vimeo );?>" target="_blank" title="<?php esc_attr_e( 'Vimeo', 'the-minimal' ); ?>"><span class="fa fa-vimeo"></span></a></li>
			<?php } if( $ok ){?>
				<li><a href="<?php echo esc_url( $ok );?>" target="_blank" title="<?php esc_attr_e( 'OK', 'the-minimal' ); ?>"><span class="fa fa-odnoklassniki"></span></a></li>
			<?php } if( $vk ){?>
				<li><a href="<?php echo esc_url( $vk );?>" target="_blank" title="<?php esc_attr_e( 'VK', 'the-minimal' ); ?>"><span class="fa fa-vk"></span></a></li>
			<?php } if( $xing ){?>
				<li><a href="<?php echo esc_url( $xing );?>" target="_blank" title="<?php esc_attr_e( 'Xing', 'the-minimal' ); ?>"><span class="fa fa-xing"></span></a></li>
			<?php }?>
		</ul>
		<?php
	}
} 
add_action( 'the_minimal_social', 'the_minimal_social_cb' );

/**
 * Callback for Home Page Slider 
 **/
function the_minimal_slider_cb(){
	
	$slider_caption  = get_theme_mod( 'the_minimal_slider_caption', '1' );
	$slider_readmore = get_theme_mod( 'the_minimal_slider_readmore', __( 'Continue Reading', 'the-minimal' ) );
	$slider_cat      = get_theme_mod( 'the_minimal_slider_cat' );
	
	if( $slider_cat ){
		$qry = new WP_Query ( array( 
			'post_type'     => 'post', 
			'post_status'   => 'publish',
			'posts_per_page'=> 5,                    
			'cat'           => $slider_cat,
		) );
		
		if( $qry->have_posts() ){?>
			<div class="slider">
				<div class="flexslider">
					<ul class="slides owl-carousel" data-slider-id="1">
						<?php
						while( $qry->have_posts() ){
							$qry->the_post();
							?>
							<?php if( has_post_thumbnail() ){?>
								<li>
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'the-minimal-slider', array( 'itemprop' => 'image' ) ); ?></a>
									<?php if( $slider_caption ){ ?>
										<div class="slider-text">
											<div class="container">
												<div class="text">
													<h2><?php the_title(); ?></h2>
													<a class="continue-reading" href="<?php the_permalink(); ?>"><?php echo esc_html( $slider_readmore );?></a>
												</div>
											</div>
										</div>
									<?php } ?>
								</li>
							<?php } ?>
							<?php
						}
						?>
					</ul>
					
				</div>
			</div>
			<?php
		}
		wp_reset_postdata();       
	}    
}
add_action( 'the_minimal_slider', 'the_minimal_slider_cb' );

/**
* Callback function for Comment List
* 
* @link https://codex.wordpress.org/Function_Reference/wp_list_comments 
*/
function the_minimal_comment( $comment, $args, $depth ){
	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body" itemscope itemtype="https://schema.org/UserComments">
		<?php endif; ?>
		<div class="comment-author vcard">
			<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
			<?php printf( __( '<b class="fn" itemprop="creator" itemscope itemtype="https://schema.org/Person">%s</b> <span class="says">says:</span>', 'the-minimal' ), get_comment_author_link() ); ?>
		</div>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'the-minimal' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-metadata commentmetadata">
            <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php echo get_comment_date(); ?></a>
            <?php edit_comment_link( __( 'Edit', 'the-minimal' ), '  ', '' ); ?>
		</div>
			
		<div class="comment-content">
			<?php comment_text(); ?>
		</div>
		
		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
			
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif;
}

if( ! function_exists( 'the_minimal_change_comment_form_default_fields' ) ) :
/**
 * Change Comment form default fields i.e. author, email & url.
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function the_minimal_change_comment_form_default_fields( $fields ){    
    // get the current commenter if available
    $commenter = wp_get_current_commenter();
 
    // core functionality
    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $required = ( $req ? " required" : '' );
    $author   = ( $req ? __( 'Name*', 'the-minimal' ) : __( 'Name', 'the-minimal' ) );
    $email    = ( $req ? __( 'Email*', 'the-minimal' ) : __( 'Email', 'the-minimal' ) );
 
    // Change just the author field
    $fields['author'] = '<p class="comment-form-author"><label class="screen-reader-text" for="author">' . esc_html__( 'Name', 'the-minimal' ) . '<span class="required">*</span></label><input id="author" name="author" placeholder="' . esc_attr( $author ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $required . ' /></p>';
    
    $fields['email'] = '<p class="comment-form-email"><label class="screen-reader-text" for="email">' . esc_html__( 'Email', 'the-minimal' ) . '<span class="required">*</span></label><input id="email" name="email" placeholder="' . esc_attr( $email ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . $required. ' /></p>';
    
    $fields['url'] = '<p class="comment-form-url"><label class="screen-reader-text" for="url">' . esc_html__( 'Website', 'the-minimal' ) . '</label><input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'the-minimal' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'; 
    
    return $fields;    
}
endif;
add_filter( 'comment_form_default_fields', 'the_minimal_change_comment_form_default_fields' );

if( ! function_exists( 'the_minimal_change_comment_form_defaults' ) ) :
/**
 * Change Comment Form defaults
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function the_minimal_change_comment_form_defaults( $defaults ){    
    $defaults['comment_field'] = '<p class="comment-form-comment"><label class="screen-reader-text" for="comment">' . esc_html__( 'Comment', 'the-minimal' ) . '</label><textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Comment', 'the-minimal' ) . '" cols="45" rows="8" aria-required="true" required></textarea></p>';
    
    return $defaults;    
}
endif;
add_filter( 'comment_form_defaults', 'the_minimal_change_comment_form_defaults' );

/**
 * Custom CSS
*/
if ( function_exists( 'wp_update_custom_css_post' ) ) {
    // Migrate any existing theme CSS to the core option added in WordPress 4.7.
	$css = get_theme_mod( 'the_minimal_custom_css' );
	if ( $css ) {
        $core_css = wp_get_custom_css(); // Preserve any CSS already added to the core option.
        $return = wp_update_custom_css_post( $core_css . $css );
        if ( ! is_wp_error( $return ) ) {
            // Remove the old theme_mod, so that the CSS is stored in only one place moving forward.
        	remove_theme_mod( 'the_minimal_custom_css' );
        }
    }
} else {
    // Back-compat for WordPress < 4.7.
	function the_minimal_custom_css(){
		$custom_css = get_theme_mod( 'the_minimal_custom_css' );
		if( !empty( $custom_css ) ){
			echo '<style type="text/css">';
			echo wp_strip_all_tags( $custom_css );
			echo '</style>';
		}
	}
	add_action( 'wp_head', 'the_minimal_custom_css', 100 );
}

if ( ! function_exists( 'the_minimal_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
 */
function the_minimal_excerpt_more( $more ) {
	return is_admin() ? $more : ' &hellip; ';
}
add_filter( 'excerpt_more', 'the_minimal_excerpt_more' );
endif;

if ( ! function_exists( 'the_minimal_excerpt_length' ) ) :
/**
 * Changes the default 55 character in excerpt 
*/
function the_minimal_excerpt_length( $length ) {
	return is_admin() ? $length : 100;
}
add_filter( 'excerpt_length', 'the_minimal_excerpt_length', 999 );
endif;

/**
 * Footer Credits 
*/
function the_minimal_footer_credit(){
	
	$text  = '<div class="site-info"><p>';
	$text .=  esc_html__( 'Copyright &copy; ', 'the-minimal' ) . date_i18n( esc_html__( 'Y', 'the-minimal' ) ); 
	$text .= ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a> &middot; ';
	$text .= esc_html__( 'The Minimal | Developed By ', 'the-minimal' );
	$text .= '<a href="' . esc_url( 'https://rarathemes.com/' ) .'" rel="nofollow" target="_blank">' . esc_html__( 'Rara Theme', 'the-minimal' ) . '</a> &middot; ';
	$text .= sprintf( esc_html__( 'Powered by: %s', 'the-minimal' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'the-minimal' ) ) .'" target="_blank">WordPress</a>' );
	if( function_exists( 'get_the_privacy_policy_link' ) ){
		$text .= ' &middot; ' . get_the_privacy_policy_link();    
	}
	$text .= '</p></div>';
	
	echo apply_filters( 'the_minimal_footer_text', $text );    
}
add_action( 'the_minimal_footer', 'the_minimal_footer_credit' );

/**
 * Return sidebar layouts for pages
*/
function the_minimal_sidebar_layout(){
	global $post;
	
	if( get_post_meta( $post->ID, 'the_minimal_sidebar_layout', true ) ){
		return get_post_meta( $post->ID, 'the_minimal_sidebar_layout', true );    
	}else{
		return 'right-sidebar';
	}
}

if( ! function_exists( 'the_minimal_single_post_schema' ) ) :
/**
 * Single Post Schema
 *
 * @return string
 */
function the_minimal_single_post_schema() {
	if ( is_singular( 'post' ) ) {
		global $post;
		$custom_logo_id = get_theme_mod( 'custom_logo' );

		$site_logo   = wp_get_attachment_image_src( $custom_logo_id , 'the-minimal-schema' );
		$images      = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		$excerpt     = the_minimal_escape_text_tags( $post->post_excerpt );
		$content     = $excerpt === "" ? mb_substr( the_minimal_escape_text_tags( $post->post_content ), 0, 110 ) : $excerpt;
		$schema_type = ! empty( $custom_logo_id ) && has_post_thumbnail( $post->ID ) ? "BlogPosting" : "Blog";

		$args = array(
			"@context"  => "https://schema.org",
			"@type"     => $schema_type,
			"mainEntityOfPage" => array(
				"@type" => "WebPage",
				"@id"   => esc_url( get_permalink( $post->ID ) )
			),
			"headline"  	=> esc_html( get_the_title( $post->ID ) ),
			"datePublished" => esc_html( get_the_time( DATE_ISO8601, $post->ID ) ),
			"dateModified"  => esc_html( get_post_modified_time(  DATE_ISO8601, __return_false(), $post->ID ) ),
			"author"        => array(
				"@type"     => "Person",
				"name"      => the_minimal_escape_text_tags( get_the_author_meta( 'display_name', $post->post_author ) )
			),
			"description" => ( class_exists('WPSEO_Meta') ? WPSEO_Meta::get_value( 'metadesc' ) : $content )
		);

		if ( has_post_thumbnail( $post->ID ) ) :
			$args['image'] = array(
				"@type"  => "ImageObject",
				"url"    => $images[0],
				"width"  => $images[1],
				"height" => $images[2]
			);
		endif;

		if ( ! empty( $custom_logo_id ) ) :
			$args['publisher'] = array(
				"@type"       => "Organization",
				"name"        => esc_html( get_bloginfo( 'name' ) ),
				"description" => wp_kses_post( get_bloginfo( 'description' ) ),
				"logo"        => array(
					"@type"   => "ImageObject",
					"url"     => $site_logo[0],
					"width"   => $site_logo[1],
					"height"  => $site_logo[2]
				)
			);
		endif;

		echo '<script type="application/ld+json">' , PHP_EOL;
		if ( version_compare( PHP_VERSION, '5.4.0' , '>=' ) ) {
			echo wp_json_encode( $args, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ) , PHP_EOL;
		} else {
			echo wp_json_encode( $args ) , PHP_EOL;
		}
		echo '</script>' , PHP_EOL;
	}
}
endif;
add_action( 'wp_head', 'the_minimal_single_post_schema' );

if( ! function_exists( 'the_minimal_escape_text_tags' ) ) :
/**
 * Remove new line tags from string
 *
 * @param $text
 * @return string
 */
function the_minimal_escape_text_tags( $text ) {
	return (string) str_replace( array( "\r", "\n" ), '', strip_tags( $text ) );
}
endif;

if( ! function_exists( 'wp_body_open' ) ) :
/**
 * Fire the wp_body_open action.
 * Added for backwards compatibility to support pre 5.2.0 WordPress versions.
*/
function wp_body_open() {
	/**
	 * Triggered after the opening <body> tag.
    */
	do_action( 'wp_body_open' );
}
endif;

if( ! function_exists( 'the_minimal_get_image_sizes' ) ) :
/**
 * Get information about available image sizes
 */
function the_minimal_get_image_sizes( $size = '' ) {
 
    global $_wp_additional_image_sizes;
 
    $sizes = array();
    $get_intermediate_image_sizes = get_intermediate_image_sizes();
 
    // Create the full array with sizes and crop info
    foreach( $get_intermediate_image_sizes as $_size ) {
        if ( in_array( $_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) ) ) {
            $sizes[ $_size ]['width'] = get_option( $_size . '_size_w' );
            $sizes[ $_size ]['height'] = get_option( $_size . '_size_h' );
            $sizes[ $_size ]['crop'] = (bool) get_option( $_size . '_crop' );
        } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
            $sizes[ $_size ] = array( 
                'width' => $_wp_additional_image_sizes[ $_size ]['width'],
                'height' => $_wp_additional_image_sizes[ $_size ]['height'],
                'crop' =>  $_wp_additional_image_sizes[ $_size ]['crop']
            );
        }
    } 
    // Get only 1 size if found
    if ( $size ) {
        if( isset( $sizes[ $size ] ) ) {
            return $sizes[ $size ];
        } else {
            return false;
        }
    }
    return $sizes;
}
endif;

if ( ! function_exists( 'the_minimal_get_fallback_svg' ) ) :    
/**
 * Get Fallback SVG
*/
function the_minimal_get_fallback_svg( $post_thumbnail ) {
    if( ! $post_thumbnail ){
        return;
    }
    
    $image_size = the_minimal_get_image_sizes( $post_thumbnail );
     
    if( $image_size ){ ?>
        <div class="svg-holder">
             <svg class="fallback-svg" viewBox="0 0 <?php echo esc_attr( $image_size['width'] ); ?> <?php echo esc_attr( $image_size['height'] ); ?>" preserveAspectRatio="none">
                    <rect width="<?php echo esc_attr( $image_size['width'] ); ?>" height="<?php echo esc_attr( $image_size['height'] ); ?>" style="fill:#dedbdb;"></rect>
            </svg>
        </div>
        <?php
    }
}
endif;

if( ! function_exists( 'the_minimal_fonts_url' ) ) :
/**
 * Register custom fonts.
 */
function the_minimal_fonts_url() {
	$fonts_url = '';

	/*
	* translators: If there are characters in your language that are not supported
	* by Source Sans Pro, translate this to 'off'. Do not translate into your own language.
	*/
	$source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'the-minimal' );
	
	/*
	* translators: If there are characters in your language that are not supported
	* by Lato, translate this to 'off'. Do not translate into your own language.
	*/
	$lato = _x( 'on', 'Lato font: on or off', 'the-minimal' );

	if ( 'off' !== $source_sans_pro || 'off' !== $lato ) {
		$font_families = array();

		if( 'off' !== $source_sans_pro ){
			$font_families[] = 'Source Sans Pro:300,400,600,700';
		}

		if( 'off' !== $lato ){
			$font_families[] = 'Lato';
		}

		$query_args = array(
			'family'  => urlencode( implode( '|', $font_families ) ),
			'display' => urlencode( 'fallback' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url( $fonts_url );
}
endif;

/**
 * Function to exclude posts in blog index page
 */
function the_minimal_exclude_posts_for_blogpage( $query ) {
    $show_on_front   = get_option( 'show_on_front' );
    $ed_slider       = get_theme_mod( 'the_minimal_ed_slider' );
	$slider_category = get_theme_mod( 'the_minimal_slider_cat' );

    if ( ! is_admin() && $query->is_home() && $query->is_main_query() && $ed_slider && 'posts' == $show_on_front ) {
        if( $slider_category ){
            $query->set( 'category__not_in', $slider_category );
        }
    }
}
add_action( 'pre_get_posts', 'the_minimal_exclude_posts_for_blogpage' );