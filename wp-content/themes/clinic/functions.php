<?php
/**
 * clinic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package clinic
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function clinic_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on clinic, use a find and replace
		* to change 'clinic' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'clinic', get_template_directory() . '/languages' );

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
require get_template_directory() . '/inc/class-clinic-navwalker.php';
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'clinic' ),
		)
	);
	register_nav_menus(
		array(
			'Studio' => esc_html__( 'Studio-menu', 'clinic' ),
		)
	);
	register_nav_menus(
		array(
			'Services' => esc_html__( 'Services-menu', 'clinic' ),
		)
	);
	register_nav_menus(
		array(
			'Resources' => esc_html__( 'Resources-menu', 'clinic' ),
		)
	);
	register_nav_menus(
		array(
			'Connect' => esc_html__( 'Connect-menu', 'clinic' ),
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
			'clinic_custom_background_args',
			array(
				'default-color' => 'ffffff',
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
}
add_action( 'after_setup_theme', 'clinic_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function clinic_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'clinic_content_width', 640 );
}
add_action( 'after_setup_theme', 'clinic_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function clinic_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'clinic' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'clinic' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'clinic_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function clinic_scripts() {

	wp_enqueue_style( 'clinic-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'clinic-style', 'rtl', 'replace' );

	/* Google Fonts */
	wp_enqueue_style( 'clinic-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap', array(), null );

	/* Vendor CSS */
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', array(), null );
	wp_enqueue_style( 'bootstrap-icons', get_template_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.css', array(), null );
	wp_enqueue_style( 'aos', get_template_directory_uri() . '/assets/vendor/aos/aos.css', array(), null );
	wp_enqueue_style( 'glightbox', get_template_directory_uri() . '/assets/vendor/glightbox/css/glightbox.min.css', array(), null );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/vendor/fontawesome-free/css/all.min.css', array(), null );
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css', array(), null );

	/* Main CSS */
	wp_enqueue_style( 'clinic-main', get_template_directory_uri() . '/assets/css/main.css', array(), null );

	/* Navigation JS */
	wp_enqueue_script( 'clinic-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	/* Vendor JS */
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array(), null, true );
	wp_enqueue_script( 'php-email-form', get_template_directory_uri() . '/assets/vendor/php-email-form/validate.js', array(), null, true );
	wp_enqueue_script( 'aos-js', get_template_directory_uri() . '/assets/vendor/aos/aos.js', array(), null, true );
	wp_enqueue_script( 'glightbox-js', get_template_directory_uri() . '/assets/vendor/glightbox/js/glightbox.min.js', array(), null, true );
	wp_enqueue_script( 'purecounter', get_template_directory_uri() . '/assets/vendor/purecounter/purecounter_vanilla.js', array(), null, true );
	wp_enqueue_script( 'swiper-js', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', array(), null, true );

	/* Main JS */
	wp_enqueue_script( 'clinic-main-js', get_template_directory_uri() . '/assets/js/main.js', array(), null, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'clinic_scripts' );
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

