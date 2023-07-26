<?php

define( 'NICEX_THEME_DIRECTORY', esc_url( trailingslashit( get_template_directory_uri() ) ) );
define( 'NICEX_REQUIRE_DIRECTORY', trailingslashit( get_template_directory() ) );
define( 'NICEX_DEVELOPMENT', true );

/**
 * After Setup
 */

function nicex_setup() {

	register_nav_menus( array(
		'primary-menu' => esc_html__( 'Primary Menu', 'nicex' )
	) );

	load_theme_textdomain( 'nicex', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array('link', 'image', 'gallery', 'video', 'audio', 'quote'));
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',	) );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'align-wide' );

	add_image_size( 'nicex-admin-list-thumb', 50, 50, true );
	add_image_size( 'nicex-default-post-thumb', 1210, 684, true );
	add_image_size( 'nicex-card-post-thumb', 400, 268, false );
	add_image_size( 'nicex-list-post-thumb', 400, 268, false );
	add_image_size( 'nicex-portfolio-thumb', 1120, 9999, false );
	add_image_size( 'nicex-portfolio-nav-thumb', 1024, 768, true );
	add_image_size( 'nicex-recent-post-thumb', 80, 80, true );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Enqueue editor styles.
	add_editor_style( 'style-editor.css' );

	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	// Add support dark editor style
	add_theme_support( 'dark-editor-style' );

	// Editor color palette.
	add_theme_support(
		'editor-color-palette', array(
			array(
				'name'  => esc_html__( 'Primary', 'nicex' ),
				'slug' => 'primary',
				'color' => '#1258ca',
			),
			array(
				'name'  => esc_html__( 'Accent', 'nicex' ),
				'slug' => 'accent',
				'color' => '#c70a1a',
			),
			array(
				'name'  => esc_html__( 'Success', 'nicex' ),
				'slug' => 'success',
				'color' => '#88c559',
			),
			array(
				'name'  => esc_html__( 'Black', 'nicex' ),
				'slug' => 'black',
				'color' => '#263654',
			),
			array(
				'name'  => esc_html__( 'Contrast', 'nicex' ),
				'slug' => 'contrast',
				'color' => '#292a2d',
			),
			array(
				'name'  => esc_html__( 'Contrast Medium', 'nicex' ),
				'slug' => 'contrast-medium',
				'color' => '#79797c',
			),
			array(
				'name'  => esc_html__( 'Contrast lower', 'nicex' ),
				'slug' => 'contrast lower',
				'color' => '#323639',
			),
			array(
				'name'  => esc_html__( 'White', 'nicex' ),
				'slug' => 'white',
				'color' => '#ffffff',
			)
		)
	);

	// Add custom editor font sizes.
	add_theme_support(
		'editor-font-sizes',
		array(
			array(
				'name'      => __( 'Small', 'nicex' ),
				'shortName' => __( 'S', 'nicex' ),
				'size'      => 14,
				'slug'      => 'small',
			),
			array(
				'name'      => __( 'Normal', 'nicex' ),
				'shortName' => __( 'M', 'nicex' ),
				'size'      => 16,
				'slug'      => 'normal',
			),
			array(
				'name'      => __( 'Large', 'nicex' ),
				'shortName' => __( 'L', 'nicex' ),
				'size'      => 24,
				'slug'      => 'large',
			),
			array(
				'name'      => __( 'Huge', 'nicex' ),
				'shortName' => __( 'XL', 'nicex' ),
				'size'      => 28,
				'slug'      => 'huge',
			),
		)
	);
	
}

add_action( 'after_setup_theme', 'nicex_setup' );

/**
 * Content Width
 */
function nicex_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nicex_content_width', 1170 );
}
add_action( 'after_setup_theme', 'nicex_content_width', 0 );


/**
 * Add Editor Styles
 */
function nicex_add_editor_styles() {
	add_editor_style( 'editor-styles.css' );
}
add_action( 'admin_init', 'nicex_add_editor_styles' );

/**
 * Include and IMPORT/EXPORT ACF fields via JSON
 */
if( false == NICEX_DEVELOPMENT ) {
	add_filter( 'acf/settings/show_admin', '__return_false' );
	require_once NICEX_REQUIRE_DIRECTORY . 'inc/helper/custom-fields/custom-fields.php';
}

function nicex_acf_save_json( $path ) {
	$path = NICEX_REQUIRE_DIRECTORY . 'inc/helper/custom-fields';
	return $path;
}
add_filter( 'acf/settings/save_json', 'nicex_acf_save_json' );

function nicex_acf_load_json( $paths ) {
	unset( $paths[0] );
	$paths[] = NICEX_REQUIRE_DIRECTORY . 'inc/helper/custom-fields';
	return $paths;
}
add_filter( 'acf/settings/load_json', 'nicex_acf_load_json' );

/**
 * Include required files
 */

// TGM
require_once NICEX_REQUIRE_DIRECTORY . 'inc/helper/class-tgm-plugin-activation.php';
// TGM register plugins
require_once NICEX_REQUIRE_DIRECTORY . 'inc/theme-required-plugins.php';
// Style and scripts for theme
require_once NICEX_REQUIRE_DIRECTORY . 'inc/theme-enqueue.php';
require_once NICEX_REQUIRE_DIRECTORY . 'inc/theme-elementor.php';
// Theme Functions
require_once NICEX_REQUIRE_DIRECTORY . 'inc/theme-functions.php';
require_once NICEX_REQUIRE_DIRECTORY . 'inc/theme-actions.php';
require_once NICEX_REQUIRE_DIRECTORY . 'inc/theme-filters.php';
require_once NICEX_REQUIRE_DIRECTORY . 'inc/theme-demo-import.php';

/**
 * Include kirki fields
 */
if ( class_exists( 'Kirki' ) ) {
	require_once NICEX_REQUIRE_DIRECTORY . 'inc/framework/customizer.php';
}
function nicex_load_all_variants_and_subsets() {
    if ( class_exists( 'Kirki_Fonts_Google' ) ) {
        Kirki_Fonts_Google::$force_load_all_variants = true;
        Kirki_Fonts_Google::$force_load_all_subsets = true;
    }
}
add_action( 'after_setup_theme', 'nicex_load_all_variants_and_subsets' );