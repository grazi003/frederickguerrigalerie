<?php
/**
 * The Minimal functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package The_Minimal
 */

$the_minimal_theme_data = wp_get_theme();
if( ! defined( 'THE_MINIMAL_THEME_VERSION' ) ) define( 'THE_MINIMAL_THEME_VERSION', $the_minimal_theme_data->get( 'Version' ) );
if( ! defined( 'THE_MINIMAL_THEME_NAME' ) ) define( 'THE_MINIMAL_THEME_NAME', $the_minimal_theme_data->get( 'Name' ) );

if ( ! function_exists( 'the_minimal_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function the_minimal_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on The Minimal, use a find and replace
	 * to change 'the-minimal' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'the-minimal', get_template_directory() . '/languages' );
    
    // Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'the-minimal' ),
        'secondary' => esc_html__( 'Secondary', 'the-minimal' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
        'gallery',
		'link',
        'image',
		'quote',
        'status',
        'video',
        'audio',        
        'chat'
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'the_minimal_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
    
    //Custom Image Sizes
    add_image_size( 'the-minimal-post-thumb', 60, 60, true);
    add_image_size( 'the-minimal-feature-thumb', 300, 220, true);
    add_image_size( 'the-minimal-slider', 1920, 500, true);
    add_image_size( 'the-minimal-slider-thumb', 63, 46, true);
    add_image_size( 'the-minimal-image-full', 1139, 498, true);
    add_image_size( 'the-minimal-image', 750, 400, true);
    add_image_size( 'the-minimal-schema', 600, 60, true);
    
    /* Custom Logo */
    add_theme_support( 'custom-logo', array(
		'header-text' => array( 'site-title', 'site-description' ),
    ) );
}
endif;
add_action( 'after_setup_theme', 'the_minimal_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function the_minimal_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'the_minimal_content_width', 750 );
}
add_action( 'after_setup_theme', 'the_minimal_content_width', 0 );

/**
* Adjust content_width value according to template.
*
* @return void
*/
function the_minimal_template_redirect_content_width() {

	// Full Width in the absence of sidebar.
	if( is_page() ){
	   $sidebar_layout = the_minimal_sidebar_layout();
       if( ( $sidebar_layout == 'no-sidebar' ) || ! ( is_active_sidebar( 'right-sidebar' ) ) ) $GLOBALS['content_width'] = 1139;
        
	}elseif ( ! ( is_active_sidebar( 'right-sidebar' ) ) ) {
		$GLOBALS['content_width'] = 1139;
	}

}
add_action( 'template_redirect', 'the_minimal_template_redirect_content_width' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function the_minimal_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'the-minimal' ),
		'id'            => 'right-sidebar',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'the-minimal' ),
		'id'            => 'footer-one',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'the-minimal' ),
		'id'            => 'footer-two',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'the-minimal' ),
		'id'            => 'footer-three',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'the_minimal_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function the_minimal_scripts() {
	$build  = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '/build' : '';
    $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';
    
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri(). '/css' . $build . '/owl.carousel' . $suffix . '.css', array(), '2.2.1' );
    wp_enqueue_style( 'the-minimal-google-fonts', the_minimal_fonts_url() );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri(). '/css' . $build . '/bootstrap' . $suffix . '.css' );             
    wp_enqueue_style( 'the-minimal-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js' . $build . '/bootstrap' . $suffix . '.js', array('jquery'), '3.3.5', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js' . $build . '/owl.carousel' . $suffix . '.js', array( 'jquery' ), '2.2.1', true );
	wp_enqueue_script( 'owl-carousel-thumb', get_template_directory_uri() . '/js'  . $build .  '/owl.carousel2.thumbs' . $suffix . '.js', array( 'jquery' ), '2.2.1', true );
    wp_enqueue_script( 'owlcarousel2-a11ylayer', get_template_directory_uri() . '/js' . $build . '/owlcarousel2-a11ylayer' . $suffix . '.js', array('owl-carousel'), '0.2.1', true );
    wp_enqueue_script( 'all', get_template_directory_uri() . '/js' . $build . '/all' . $suffix . '.js', array( 'jquery' ), '5.6.3', true );
    wp_enqueue_script( 'v4-shims', get_template_directory_uri() . '/js' . $build . '/v4-shims' . $suffix . '.js', array( 'jquery' ), '5.6.3', true );
    wp_enqueue_script( 'the-minimal-modal-accessibility', get_template_directory_uri() . '/js' . $build . '/modal-accessibility' . $suffix . '.js', array( 'jquery' ), THE_MINIMAL_THEME_VERSION, true );
    wp_register_script( 'the-minimal-custom', get_template_directory_uri() . '/js' . $build . '/custom' . $suffix . '.js', array('jquery'), THE_MINIMAL_THEME_VERSION, true );
    
    $the_minimal_slider_auto = get_theme_mod( 'the_minimal_slider_auto', '1' );
    $the_minimal_slider_loop = get_theme_mod( 'the_minimal_slider_loop', '1' );
    $the_minimal_slider_control = get_theme_mod( 'the_minimal_slider_control', '1' );
    $the_minimal_slider_thumbnail = get_theme_mod( 'the_minimal_slider_thumbnail', '1' );
    $the_minimal_slider_animation = get_theme_mod( 'the_minimal_slider_animation', 'slide' );
    $the_minimal_slider_speed = get_theme_mod( 'the_minimal_slider_speed', '500' );
    
    $the_minimal_array = array(
        'auto'      => esc_attr( $the_minimal_slider_auto ),
        'loop'      => esc_attr( $the_minimal_slider_loop ),
        'control'   => esc_attr( $the_minimal_slider_control ),
        'thumbnail' => esc_attr( $the_minimal_slider_thumbnail ),
        'animation' => esc_attr( $the_minimal_slider_animation ),
        'speed'     => absint( $the_minimal_slider_speed ),
    );
    
    wp_localize_script( 'the-minimal-custom', 'the_minimal_data', $the_minimal_array );
    wp_enqueue_script( 'the-minimal-custom' );
	
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'the_minimal_scripts' );

if( ! function_exists( 'the_minimal_admin_scripts' ) ) :
/**
 * Enqueue admin scripts and styles.
*/
function the_minimal_admin_scripts(){
    wp_enqueue_style( 'the-minimal-admin', get_template_directory_uri() . '/inc/css/admin.css', '', THE_MINIMAL_THEME_VERSION );
}
endif; 
add_action( 'admin_enqueue_scripts', 'the_minimal_admin_scripts' );

function the_minimal_customize_scripts() {
	wp_enqueue_style( 'the-minimal-customize-style',get_template_directory_uri().'/inc/css/customize.css','', THE_MINIMAL_THEME_VERSION );    
    wp_enqueue_script( 'the-minimal-admin-js', get_template_directory_uri().'/inc/js/admin.js', array( 'jquery' ), '', true );
}
add_action( 'customize_controls_enqueue_scripts', 'the_minimal_customize_scripts' );

if( ! function_exists( 'the_minimal_admin_notice' ) ) :
/**
 * Addmin notice for getting started page
*/
function the_minimal_admin_notice(){
    global $pagenow;
    $theme_args      = wp_get_theme();
    $meta            = get_option( 'the_minimal_admin_notice' );
    $name            = $theme_args->__get( 'Name' );
    $current_screen  = get_current_screen();
    
    if( 'themes.php' == $pagenow && !$meta ){
        
        if( $current_screen->id !== 'dashboard' && $current_screen->id !== 'themes' ){
            return;
        }

        if( is_network_admin() ){
            return;
        }

        if( ! current_user_can( 'manage_options' ) ){
            return;
        } ?>

        <div class="welcome-message notice notice-info">
            <div class="notice-wrapper">
                <div class="notice-text">
                    <h3><?php esc_html_e( 'Congratulations!', 'the-minimal' ); ?></h3>
                    <p><?php printf( __( '%1$s is now installed and ready to use. Click below to see theme documentation, plugins to install and other details to get started.', 'the-minimal' ), esc_html( $name ) ) ; ?></p>
                    <p><a href="<?php echo esc_url( admin_url( 'themes.php?page=the-minimal-getting-started' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Go to the getting started.', 'the-minimal' ); ?></a></p>
                    <p class="dismiss-link"><strong><a href="?the_minimal_admin_notice=1"><?php esc_html_e( 'Dismiss', 'the-minimal' ); ?></a></strong></p>
                </div>
            </div>
        </div>
    <?php }
}
endif;
add_action( 'admin_notices', 'the_minimal_admin_notice' );

if( ! function_exists( 'the_minimal_update_admin_notice' ) ) :
/**
 * Updating admin notice on dismiss
*/
function the_minimal_update_admin_notice(){
    if ( isset( $_GET['the_minimal_admin_notice'] ) && $_GET['the_minimal_admin_notice'] = '1' ) {
        update_option( 'the_minimal_admin_notice', true );
    }
}
endif;
add_action( 'admin_init', 'the_minimal_update_admin_notice' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Widget Featured Post
 */
require get_template_directory() . '/inc/widget-featured-post.php';

/**
 * Widget Recent Post
 */
require get_template_directory() . '/inc/widget-recent-post.php';

/**
 * Widget Popular Post
 */
require get_template_directory() . '/inc/widget-popular-post.php';

/**
 * Widget Social Links
 */
require get_template_directory() . '/inc/widget-social-links.php';

/**
 * Post Meta Box
 */
require get_template_directory() . '/inc/metabox.php';

/**
 * Theme Information
 */
require get_template_directory() . '/inc/info.php';

/**
 * Getting Started
*/
require get_template_directory() . '/inc/getting-started/getting-started.php';