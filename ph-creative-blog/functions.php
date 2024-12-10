<?php 
/**
 * phcreativeblog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package phcreativeblog
 */

if ( ! defined( '_phcreativeblog_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_phcreativeblog_VERSION', '1.0' );
}

if ( ! function_exists( 'phcreativeblog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function phcreativeblog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on phcreativeblog, use a find and replace
		 * to change 'ph-creative-blog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ph-creative-blog', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Align wide support
		add_theme_support( 'align-wide' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'ph-creative-blog' ),
				'menu-top' => esc_html__( 'Top', 'ph-creative-blog' ),
				'mobile' => esc_html__( 'Mobile Menu', 'ph-creative-blog' ),
				'social' => esc_html__( 'Social Networks', 'ph-creative-blog' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
		
		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'pixanews_custom_background_args',
				array(
					'default-color' => '#ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		
		add_image_size( 'phcreativeblog-thumbnail-4x3', '600', '450', true );
		add_image_size( 'phcreativeblog-thumbnail-4x4', '600', '600', true );
		
	}
endif;
add_action( 'after_setup_theme', 'phcreativeblog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function phcreativeblog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'phcreativeblog_content_width', 768 );
}
add_action( 'after_setup_theme', 'phcreativeblog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function phcreativeblog_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ph-creative-blog' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ph-creative-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widgets Area 1', 'ph-creative-blog' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'ph-creative-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widgets Area 2', 'ph-creative-blog' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'ph-creative-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widgets Area 3', 'ph-creative-blog' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'ph-creative-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widgets Area 4', 'ph-creative-blog' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'ph-creative-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Before Main Content', 'ph-creative-blog' ),
			'id'            => 'before-main-content',
			'description'   => esc_html__( 'Add widgets here.', 'ph-creative-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		)
	);
}
add_action( 'widgets_init', 'phcreativeblog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function phcreativeblog_scripts() {
	wp_enqueue_style( 'phcreativeblog-style', get_stylesheet_uri(), array(), _phcreativeblog_VERSION );
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/lib/bootstrap/bootstrap.min.css'); 
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/lib/font-awesome/css/all.min.css'); 
	wp_enqueue_style('acme-ticker-css', get_template_directory_uri() . '/lib/acmeticker/css/style.min.css'); 
	wp_enqueue_style('owl-carousel-css', get_template_directory_uri() . '/lib/owl-carousel/dist/assets/owl.carousel.min.css'); 
	wp_enqueue_style('owl-carousel-theme-css', get_template_directory_uri() . '/lib/owl-carousel/dist/assets/owl.theme.default.min.css'); 
	wp_enqueue_style('sidr-light-css', get_template_directory_uri() . '/lib/sidr/stylesheets/jquery.sidr.light.min.css'); 
	wp_enqueue_style('phcreativeblog-primary-font', 'https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro&display=swap' );
	wp_enqueue_style('phcreativeblog-secondary-font', 'https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro&family=Public+Sans:ital,wght@0,100..900;1,100..900&family=Roboto+Mono&display=swap' );
	wp_enqueue_style('phcreativeblog-core', get_template_directory_uri() . '/design-files/core/core.css'); 
	wp_enqueue_style('phcreativeblog-header', get_template_directory_uri() . '/design-files/header/'.esc_html(get_theme_mod('phcreativeblog-header-style','style1')).'/header.css'); 
	wp_enqueue_style('phcreativeblog-blog-style1', get_template_directory_uri() . '/design-files/blog-style/blog-style1.css'); 
	wp_enqueue_style('phcreativeblog-single', get_template_directory_uri() . '/design-files/single/single.css');
	wp_enqueue_style('phcreativeblog-sidebar', get_template_directory_uri() . '/design-files/sidebar/sidebar.css'); 
	wp_enqueue_style('phcreativeblog-footer', get_template_directory_uri() . '/design-files/footer/footer.css'); 
	wp_enqueue_style('phcreativeblog-featured-modules', get_template_directory_uri() . '/design-files/featured-modules/featured-modules.css'); 

	wp_enqueue_script( 'phcreativeblog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _phcreativeblog_VERSION, true );
	wp_enqueue_script( 'acme-ticker', get_template_directory_uri() . '/lib/acmeticker/js/acmeticker.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/lib/owl-carousel/dist/owl.carousel.js', array('jquery'), '2.3.4', true );
	wp_enqueue_script( 'sidr', get_template_directory_uri() . '/lib/sidr/jquery.sidr.min.js', array('jquery'), '2.2.1', true );
	wp_enqueue_script( 'phcreativeblog-theme-js', get_template_directory_uri() . '/js/theme.js', array('sidr','owl-carousel'), _phcreativeblog_VERSION, true );
	 // Swiper CSS
	 wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css');

	 // Swiper JS
	 wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', array('jquery'), null, true);
 
	 // Custom script to initialize the Swiper slider
	 wp_enqueue_script('custom-swiper-js', get_template_directory_uri() . '/js/custom-swiper.js', array('swiper-js'), null, true);


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'phcreativeblog_scripts' );

/**
 * Filter the excerpt length to 50 words.
 *
 * @param int $length Excerpt length.
 * @return int 
 */
function phcreativeblog_excerpt_length( $length ) {
		if (!is_admin() ) { 
			return 30; 
		} 
		return $length;

}
add_filter( 'excerpt_length', 'phcreativeblog_excerpt_length', 999 );

function phcreativeblog_excerpt_more( $more ) {
	if (!is_admin() ) {
		return '....'; 
	} 
	return $more;

}
add_filter( 'excerpt_more', 'phcreativeblog_excerpt_more' );

function phcreativeblog_insert_featured_modules() {
	if (is_home()) :
		$i = 0;
		for ($i = 1; $i < 3; $i++) :
			phcreativeblog_display_featured_module( get_theme_mod( 'phcreativeblog-fa-style-'.$i, 'style1' ), get_theme_mod('phcreativeblog-fa-enable-'.$i, 0) ,get_theme_mod( 'phcreativeblog-fa-cat-'.$i, 0 ), get_theme_mod( 'phcreativeblog-fa-show-title-'.$i, true ));
		endfor;
	endif;	
}
add_action('phcreativeblog_after_header','phcreativeblog_insert_featured_modules'); 

function phcreativeblog_insert_featured_slider() {
	if (is_home()) :?>
	<div class="container">
			<div class="before-main-slider">
				<?php if(is_active_sidebar('before-main-content'))
				dynamic_sidebar('before-main-content');?>
			</div>
		</div>
		<?php
	endif;	
}
add_action('phcreativeblog_after_header','phcreativeblog_insert_featured_slider'); 


/**
 * Function to alter the width of sidebar and content area based on diff pages.
 *
 */
function phcreativeblog_sidebar_setting() {
	if (is_search())	
		$setting = get_theme_mod('phcreativeblog-primary-width-search', 'no-sidebar-narrow-primary');
	if (is_single())
		$setting = get_theme_mod('phcreativeblog-primary-width-single-post', 'no-sidebar-narrow-primary');
	if (is_page())
		$setting = get_theme_mod('phcreativeblog-primary-width-page', 'no-sidebar-narrow-primary');
	if (is_archive())
		$setting = get_theme_mod('phcreativeblog-primary-width-archives', 'no-sidebar-narrow-primary');
	if (is_home())
		$setting = get_theme_mod('phcreativeblog-primary-width-home', 'right-sidebar');	 
	return $setting;
}
	
function phcreativeblog_primary_width() {
	$setting = phcreativeblog_sidebar_setting();
		
	switch ($setting) {
		case 'no-sidebar':
			$class = 'col-md-12';
			break;
		case 'right-sidebar':
			$class = 'col-md-8';
			break;
		case 'right-sidebar-narrow':
			$class = 'col-md-9';
			break;
		case 'no-sidebar-narrow-primary':
			$class = 'col-md-8 offset-md-2 offset-sm-0 offset-lg-2';
			break;	
		default:
			$class = 'col-md-8 offset-md-2 offset-sm-0 offset-lg-2';
			break;					
	}
	echo esc_html($class); 
}
add_action('phcreativeblog_primary_width_class','phcreativeblog_primary_width');

function phcreativeblog_secondary_width() {
	$setting = phcreativeblog_sidebar_setting();
	
	switch ($setting) {
		case 'no-sidebar':
			$class = 'd-none';
			break;
		case 'no-sidebar-narrow-primary':
			$class = 'd-none';
			break;	
		case 'right-sidebar':
			$class = 'col-md-4';
			break;
		case 'right-sidebar-narrow':
			$class = 'col-md-3';
			break;
		default:
			$class = 'd-none';
			break;					
	}
	echo esc_html($class); 
}
add_action('phcreativeblog_secondary_width_class','phcreativeblog_secondary_width');


/**
 * LessCSS PHP Color Darken/Lighten
 */
function phcreativeblog_darken_color($color_code,$percentage_adjuster = 0) {
	$percentage_adjuster = round($percentage_adjuster/100,2);
	if(preg_match("/#/",$color_code)) {
		$hex = str_replace("#","",$color_code);
		$r = (strlen($hex) == 3)? hexdec(substr($hex,0,1).substr($hex,0,1)):hexdec(substr($hex,0,2));
		$g = (strlen($hex) == 3)? hexdec(substr($hex,1,1).substr($hex,1,1)):hexdec(substr($hex,2,2));
		$b = (strlen($hex) == 3)? hexdec(substr($hex,2,1).substr($hex,2,1)):hexdec(substr($hex,4,2));
		$r = round($r - ($r*$percentage_adjuster));
		$g = round($g - ($g*$percentage_adjuster));
		$b = round($b - ($b*$percentage_adjuster));
 
		return "#".str_pad(dechex( max(0,min(255,$r)) ),2,"0",STR_PAD_LEFT)
			.str_pad(dechex( max(0,min(255,$g)) ),2,"0",STR_PAD_LEFT)
			.str_pad(dechex( max(0,min(255,$b)) ),2,"0",STR_PAD_LEFT);
	}
}

/**
 * Implement the Custom Colors feature.
 */
function phcreativeblog_colors_override(){ ?>
 <style>
 	:root {
		 --phcreativeblog-primary: <?php echo esc_html(get_theme_mod('phcreativeblog-primary-color','#FF0F4B')); ?>;
		 --phcreativeblog-primary-text: <?php echo esc_html(get_theme_mod('phcreativeblog-primary-text-color','#f9ffe7')); ?>;
		 --phcreativeblog-background-main: <?php echo esc_html(get_theme_mod('background_color','#ffffff')); ?>;
		 --phcreativeblog-background-vibrant: <?php echo esc_html(get_theme_mod('phcreativeblog-bg-vibrant-color','#acfff9')); ?>;
		 --phcreativeblog-background-light: <?php echo esc_html(get_theme_mod('phcreativeblog-bg-light-color','#fffacd')); ?>;

		 --phcreativeblog-background-darker: <?php echo esc_html(get_theme_mod('phcreativeblog-background-darker-color','#eeeeee')); ?>;
		 
		 --phcreativeblog-secondary: <?php echo esc_html(get_theme_mod('phcreativeblog-secondary-color','#747474')); ?>;
		 --phcreativeblog-secondary-text: <?php echo esc_html(get_theme_mod('phcreativeblog-secondary-text-color','#FFFFFF')); ?>;
		 --phcreativeblog-secondary-dark: <?php echo esc_html(get_theme_mod('phcreativeblog-secondary-dark-color','#B6002E')); ?>;
		 
		 --phcreativeblog-text-dark: <?php echo esc_html(get_theme_mod('phcreativeblog-text-dark-color','#111')); ?>;
		 --phcreativeblog-text: <?php echo esc_html(get_theme_mod('phcreativeblog-text-color','#555')); ?>;
		 --phcreativeblog-text-light: <?php echo esc_html(get_theme_mod('phcreativeblog-text-light-color','#777')); ?>;
		 --phcreativeblog-menu-text: <?php echo esc_html(get_theme_mod('phcreativeblog-menu-text-color','#232323')); ?>;
		 
		 --phcreativeblog-header-background: <?php echo esc_html(get_theme_mod('phcreativeblog-header-bg-color','#fff')); ?>;
		 --phcreativeblog-header-text: <?php echo esc_html(get_theme_mod('phcreativeblog-header-content-color','#FFFFFF')); ?>;
		 --phcreativeblog-header-lighter: <?php echo esc_html(get_theme_mod('phcreativeblog-header-bg-lighter-color','#222222')); ?>;
		 --phcreativeblog-top-bar-text: <?php echo esc_html(get_theme_mod('phcreativeblog-top-bar-text-color','#FFFDEC')); ?>;
		 --phcreativeblog-top-bar-background: <?php echo esc_html(get_theme_mod('phcreativeblog-top-bar-bg-color','#3a3a3a')); ?>;
		 
		 --phcreativeblog-mobile-header-background: <?php echo esc_html(get_theme_mod('phcreativeblog-header-mobile-bg-color','#FFFFFF')); ?>;
		 --phcreativeblog-mobile-header-text: <?php echo esc_html(get_theme_mod('phcreativeblog-header-mobile-text-color','#222222')); ?>;
	 }
	 
 </style>
<?php 
}
add_action( 'wp_head', 'phcreativeblog_colors_override' );

/**
 * Implement Some Additional CSS based on theme mods.
 */
function phcreativeblog_custom_css() {
	
	if (get_theme_mod('phcreativeblog-enable-top-bar')) {
		?><style>
			#masthead.style2 #top-bar, #masthead.style3 #top-bar {
				background: <?php echo esc_attr(get_theme_mod('phcreativeblog-top-bar-bg-color','#000000')); ?>;
			}
		</style><?php
	}
}
add_action( 'wp_head', 'phcreativeblog_custom_css' );

/**
 * Implement Logo Max Height Limiter
 */
function phcreativeblog_logo_max_height(){ ?>
 <style>
	 #masthead #site-branding .custom-logo {
		 max-height: <?php echo esc_attr(get_theme_mod('phcreativeblog-logo-max-height', 90))."px"; ?> !important;
	 }
 </style>
<?php 
}
add_action( 'wp_head', 'phcreativeblog_logo_max_height' );


/*
* Get Blog Posts Layout for Archive, Home & Tax Pages
*
*/ 
function phcreativeblog_blog_layout_setting() {
	if (is_search())	
		$setting = get_theme_mod('phcreativeblog-search-results-layout', 'style1');
	if (is_archive())
		$setting = get_theme_mod('phcreativeblog-archives-layout', 'style4');
	if (is_home())
		$setting = get_theme_mod('phcreativeblog-home-layout', 'style1');	
	
	return $setting;
}

function phcreativeblog_blog_layout_display() {
	$layout = phcreativeblog_blog_layout_setting();
	
	get_template_part( 'template-parts/blog-style/content', $layout );
}
add_action('phcreativeblog_blog_layout','phcreativeblog_blog_layout_display');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement the Featured Modules
 */
require get_template_directory() . '/inc/display-featured-modules.php';

/**
 * Implement the Multiple Masthead Styles
 */
require get_template_directory() . '/inc/display-masthead.php';


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Customizer additions.
 */
require_once(get_template_directory() . '/tgmpa/tgmpa-configuration.php');

/**
 * Customizer additions.
 */
require_once(get_template_directory() . '/inc/customizer/go-pro.php');

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Read more 

$phcreativeblog_read_more_enabled = get_theme_mod('phcreativeblog-readmore-set');

if ($phcreativeblog_read_more_enabled) {
    function phcreativeblog_excerpt_read_more($more) {
        global $post;
        return '<br><button class="read-more"><a href="'. get_permalink($post->ID) . '">' . 'Read More &rsaquo;' . '</a></button>';
    }

    add_filter('excerpt_more', 'phcreativeblog_excerpt_read_more');
}

// Breadcrumbs
function phcreativeblog_get_breadcrumbs() {
    echo '<a href="' . esc_url(home_url()) . '" rel="nofollow">' . esc_html__('Home', 'ph-creative-blog') . '</a>';
    ?>
    <img id="greater-than" src="<?php echo esc_url(get_template_directory_uri() . '/template-parts/single-post/images/greater-than.png'); ?>" />

    <?php if (is_category() || is_single()) {
        echo "<span class='space'></span>";
        echo '<span>' . esc_html__('Category:', 'ph-creative-blog') . '</span>';
        the_category(' &bull;');
        if (is_single()) { ?>
            <img id="greater-than" src="<?php echo esc_url(get_template_directory_uri() . '/template-parts/single-post/images/greater-than.png'); ?>" />
            <span><?php the_title(); ?></span>
        <?php }
    } elseif (is_page()) {
        echo "<span class='space'></span>";
        echo '<span>' . esc_html__('Page:', 'ph-creative-blog') . '</span>';
        echo '<span>' . esc_html(get_the_title()) . '</span>';
    } elseif (is_search()) {
        echo "; " . esc_html__('Search Results for...', 'ph-creative-blog') . " ";
        echo '<em>' . esc_html(get_search_query()) . '</em>';
    }
}



function phcreativeblog_ocdi_register_plugins( $plugins ) {
	$theme_plugins = [
	  [ // A WordPress.org plugin repository example.
		'name'     => 'One Click Demo Import', // Name of the plugin.
		'slug'     => 'one-click-demo-import', // Plugin slug - the same as on WordPress.org plugin repository.                   // If the plugin is required or not.
	  ],

	];
   
	return array_merge( $plugins, $theme_plugins );
  }
  add_filter( 'ocdi/register_plugins', 'phcreativeblog_ocdi_register_plugins' );

  function phcreativeblog_sticky_sidebar_styles() {
	// Retrieve the value of the 'proto-sticky-sidebar-set' setting from the Customizer
	$sticky_sidebar_enabled = get_theme_mod('phcreativeblog-sticky-sidebar-set');

	// Check if the sticky sidebar setting is enabled
	if ($sticky_sidebar_enabled) {
		?>
		<style>
			/* Apply sticky positioning to the sidebar when enabled */
			#secondary {
				height: fit-content;
                position: sticky;
                top: 0;
			}
		</style>
		<?php
	}
}

// Hook the function into the wp_head action to output styles in the head section
add_action('wp_head', 'phcreativeblog_sticky_sidebar_styles');


  function phcreativeblog_ocdi_import_files() {
	return [
	  [
		'import_file_name'           => 'General Blog',
		'categories'                 => [ 'General Blog' ],
		'import_file_url'            => 'https://theme-demos.pixahive.com/wp-content/creativeblogimp/demo-files/creativeblog.WordPress.2024-03-14.xml',
		'import_customizer_file_url' => 'https://theme-demos.pixahive.com/wp-content/creativeblogimp/customizer-files/ph-creative-blog-export%20(1).dat',
	
		'import_preview_image_url'   => 'https://theme-demos.pixahive.com/ph-creative-blog/wp-content/themes/ph-creative-blog/screenshot.png?ver=1.0',
		'preview_url'                => 'https://theme-demos.pixahive.com/ph-creative-blog/',
	  ],

	  [
		'import_file_name'           => 'Technology Blog',
		'categories'                 => [ 'Technology' ],
		'import_file_url'            => 'https://theme-demos.pixahive.com/wp-content/creativeblogimp/demo-files/technews.WordPress.2024-03-14.xml',
		'import_customizer_file_url' => 'https://theme-demos.pixahive.com/wp-content/creativeblogimp/customizer-files/ph-creative-blog-tech.dat',
	
		'import_preview_image_url'   => 'https://pixahive.com/themes/wp-content/uploads/2024/02/technlogyrr.png',
		'preview_url'                => 'https://theme-demos.pixahive.com/ph-creative-blog-technology/',
	  ],

	  [
		'import_file_name'           => 'Fashion Blog',
		'categories'                 => [ 'Fashion and Beauty' ],
		'import_file_url'            => 'https://theme-demos.pixahive.com/wp-content/creativeblogimp/demo-files/fashionista.WordPress.2024-03-14.xml',
		'import_customizer_file_url' => 'https://theme-demos.pixahive.com/wp-content/creativeblogimp/customizer-files/ph-creative-blog-fashion.dat',
	
		'import_preview_image_url'   => 'https://pixahive.com/themes/wp-content/uploads/2024/02/beautty.png',
		'preview_url'                => 'https://theme-demos.pixahive.com/ph-creative-blog-fashion/',
	  ],

	  [
		'import_file_name'           => 'Travel Blog',
		'categories'                 => [ 'Travel' ],
		'import_file_url'            => 'https://theme-demos.pixahive.com/wp-content/creativeblogimp/demo-files/WordPress.2024-03-14-travel.xml',
		'import_customizer_file_url' => 'https://theme-demos.pixahive.com/wp-content/creativeblogimp/customizer-files/ph-creative-blog-travel.dat',
	
		'import_preview_image_url'   => 'https://pixahive.com/themes/wp-content/uploads/2024/02/traaavel.png',
		'preview_url'                => 'https://theme-demos.pixahive.com/ph-creative-blog-travel/',
	  ],
];
  }
  add_filter( 'ocdi/import_files', 'phcreativeblog_ocdi_import_files' );

