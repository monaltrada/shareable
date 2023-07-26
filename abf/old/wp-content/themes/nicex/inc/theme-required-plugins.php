<?php

add_action( 'tgmpa_register', 'nicex_register_required_plugins' );

function nicex_register_required_plugins() {

	$source = 'https://theme.madsparrow.me/plugins/';

	$plugins = array(

		array(
			'name' => esc_html__( 'Elementor Page Builder', 'nicex' ),
			'slug' => 'elementor',
			'required' => false,
		),

		array(
			'name' => esc_html__( 'Advanced Custom Fields PRO', 'nicex' ),
			'slug' => 'acf_pro',
			'source' => esc_url( $source . 'advanced-custom-fields-pro.zip'),
			'required' => true,
		),

		array(
			'name' => esc_html__( 'Nicex Helper Plugin', 'nicex' ),
			'slug' => 'nicex_plugin',
			'source' => esc_url( $source . 'nicex_plugin.zip'),
			'required' => true,
		),

		array(
			'name' => esc_html__( 'Kirki', 'nicex' ),
			'slug' => 'kirki',
			'required' => true,
		),

		array(
			'name' => esc_html__( 'Contact Form 7', 'nicex' ),
			'slug' => 'contact-form-7',
			'required' => true,
		),

		array(
			'name' => esc_html__( 'MC4WP: Mailchimp for WordPress', 'nicex' ),
			'slug' => 'mailchimp-for-wp',
			'required' => false,
		),

		array(
			'name' => esc_html__( 'One Click Demo Import', 'nicex' ),
			'slug' => 'one-click-demo-import',
			'required' => true,
		),
	);

	$config = array(
		'id'           => 'nicex',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );
}