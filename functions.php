<?php
/**
 * wordpress skiel functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wordpress_skiel
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
function wordpress_skiel_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on wordpress skiel, use a find and replace
		* to change 'wordpress-skiel' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'wordpress-skiel', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'wordpress-skiel' ),
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
			'wordpress_skiel_custom_background_args',
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
add_action( 'after_setup_theme', 'wordpress_skiel_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wordpress_skiel_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wordpress_skiel_content_width', 640 );
}
add_action( 'after_setup_theme', 'wordpress_skiel_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wordpress_skiel_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wordpress-skiel' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wordpress-skiel' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wordpress_skiel_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wordpress_skiel_scripts() {
	wp_enqueue_style( 'wordpress-skiel-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'wordpress-skiel-style', 'rtl', 'replace' );

	wp_enqueue_script( 'wordpress-skiel-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wordpress_skiel_scripts' );

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

// Custom PHP

$version = wp_get_theme()->get('version');

function wp_register_styles() {
	wp_enqueue_style('sekolahifywordpress_style', get_template_directory_uri() . '/style.css', $version);
	wp_enqueue_style('sekolahifywordpress_style_splidedep', get_template_directory_uri() . '/css/splide.min.css', $version);
}
add_action('wp_enqueue_scripts', 'wp_register_styles');

function wp_register_scripts() {
	wp_enqueue_script('sekolahifywordpress_script', get_template_directory_uri() . '/js/script.js', $version);
	wp_enqueue_script('sekolahifywordpress_script_splidedep', get_template_directory_uri() . '/js/splide.min.js', $version);
	wp_enqueue_script('sekolahifywordpress_script_splideinit', get_template_directory_uri() . '/js/splide-init.js', $version);
}
add_action('wp_enqueue_scripts', 'wp_register_scripts');

function wp_register_fonts() {
	wp_enqueue_style('worksansregular_fonts', get_template_directory_uri() . '/assets/fonts/WorkSans-Regular.ttf', $version);
	wp_enqueue_style('montserrat_fonts', get_template_directory_uri() . '/assets/fonts/Montserrat-Regular.ttf', $version);
}
add_action('wp_enqueue_scripts', 'wp_register_fonts');

function wp_theme_support() {
	add_theme_support('custom-logo', array(
		'height' => 1000,
		'width' => 1000
	));
}
add_action('after_setup_theme', 'wp_theme_support');

function wp_add_custom_post_type_event() {
	$support = array(
		'title',
		'custom-fields',
		'editor',
		'thumbnail'
	);
	$labels = array(
		'name' => _x('Acara', 'plural'),
		'singular_name' => _x('Acara', 'singular'),
		'add_new' => _x('Tambah Acara', 'add new')
	);
	$args = array(
		'supports' => $support,
		'labels' => $labels,
		'description' => 'Tambahkan acara untuk ditampilkan pada daftar acara',
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'acara'),
		'has_archive' => true,
		'publicly_queryable' => true,
		'show_in_rest' => true,
	);
	register_post_type('Acara', $args);
}
add_action('init', 'wp_add_custom_post_type_event');

function wp_customizer_add_schoolinformation($wp_customize) {
	$wp_customize->add_section('wp_schoolinformation_section', array(
		'title' => 'Informasi Sekolah',
		'priority' => 30
	));

	$wp_customize->add_setting('wp_schoolinformation-name', array());
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'wp_schoolinformation-name',
		array(
			'label' => __('Nama Sekolah', 'wp'),
			'description' => 'Nama sekolah untuk footer',
			'section' => 'wp_schoolinformation_section',
			'settings' => 'wp_schoolinformation-name',
			'priority' => 1,
		)
	));

	$wp_customize->add_setting('wp_schoolinformation-description', array());
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'wp_schoolinformation-description',
		array(
			'label' => __('Deskripsi Sekolah', 'wp'),
			'description' => 'Deskripsi singkat untuk footer',
			'section' => 'wp_schoolinformation_section',
			'settings' => 'wp_schoolinformation-description',
			'priority' => 1,
		)
	));

	$wp_customize->add_setting('wp_schoolinformation-address', array());
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'wp_schoolinformation-address',
		array(
			'label' => __('Informasi Alamat', 'wp'),
			'description' => 'Alamat yang akan tertera pada sidebar semua halaman',
			'section' => 'wp_schoolinformation_section',
			'settings' => 'wp_schoolinformation-address',
			'priority' => 1,
		)
	));

	$wp_customize->add_setting('wp_schoolinformation-contact', array());
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'wp_schoolinformation-contact',
		array(
			'label' => __('Informasi Kontak', 'wp'),
			'description' => '(1) Nomor Telepon (2) Email (3+) Bebas. Pisahkan dengan koma',
			'section' => 'wp_schoolinformation_section',
			'settings' => 'wp_schoolinformation-contact',
			'priority' => 1,
		)
	));

	$wp_customize->add_setting('wp_schoolinformation-social-instagram', array());
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'wp_schoolinformation-social-instagram',
		array(
			'label' => __('Sosial Media', 'wp'),
			'description' => 'Link Instagram',
			'section' => 'wp_schoolinformation_section',
			'settings' => 'wp_schoolinformation-social-instagram',
			'priority' => 1,
		)
	));

	$wp_customize->add_setting('wp_schoolinformation-social-youtube', array());
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'wp_schoolinformation-social-youtube',
		array(
			'description' => 'Link YouTube',
			'section' => 'wp_schoolinformation_section',
			'settings' => 'wp_schoolinformation-social-youtube',
			'priority' => 1,
		)
	));

	$wp_customize->add_setting('wp_schoolinformation-maps', array());
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'wp_schoolinformation-maps',
		array(
			'label' => __('Google Maps', 'wp'),
			'description' => 'iFrame Google Maps',
			'section' => 'wp_schoolinformation_section',
			'settings' => 'wp_schoolinformation-maps',
			'priority' => 1,
		)
	));
}
add_action('customize_register', 'wp_customizer_add_schoolinformation');

if( function_exists('acf_add_local_field_group') ){
	// Post Type = Post
	acf_add_local_field_group(
		array(
			'key' => 'post_settings',
			'title' => 'Post Settings',
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'post'
					)
				)
			)
		)
	);

	acf_add_local_field(
		array(
			'key' => 'post_is_checked',
			'name' => 'post_is_checked',
			'label' => 'Highlight as banner',
			'type' => 'checkbox',
			'parent' => 'post_settings',
			'message' => 'Highlight',
			'choices' => array(
				'post_highlighted' => 'Highlight'
			)
		)
	);

	// Post Type = Acara
	acf_add_local_field_group(
		array(
			'key' => 'acara_settings',
			'title' => 'Acara Settings',
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'acara'
					)
				)
			)
		)
	);

	acf_add_local_field(
		array(
			'key' => 'acara_date',
			'label' => 'Date of Event ( DD/MM/YYYY/HH/MM/SS )',
			'type' => 'text',
			'name' => 'acara_date',
			'parent' => 'acara_settings',
		)
	);
}