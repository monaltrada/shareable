<?php

/**
 * Register Sidebar.
 */
function nicex_register_sidebar() {
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'nicex' ),
			'id'            => 'blog_sidebar',
			'before_widget' => '<aside id="%1$s" class="%2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="text-divider"><h5>',
			'after_title'   => '</h5></div>'
		)
	);
}
add_action( 'widgets_init', 'nicex_register_sidebar' );

if ( ! function_exists( 'wp_body_open' ) ) {
        function wp_body_open() {
                do_action( 'wp_body_open' );
        }
}