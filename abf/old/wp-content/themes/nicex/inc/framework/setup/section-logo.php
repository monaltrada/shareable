<?php

$priority = 0;

new \Kirki\Field\Dimensions(
	[
		'settings'    => 'logo_dimensions',
		'label'       => esc_html__( 'Logo Dimensions', 'nicex' ),
		'section'     => 'logo_settings',
        'priority' => $priority++,
		'default'     => [
			'width'  => 'auto',
			'height' => '18px',
		],
        'output'    => [
            [
                'choice'      => 'width',
                'element'  => '.main-header__logo a, .main-header__logo svg, .main-header__logo img',
                'property' => 'width',
            ],
            [
                'choice'      => 'height',
                'element'  => '.main-header__logo a, .main-header__logo svg, .main-header__logo img',
                'property' => 'height',
            ],
        ],
        'transport' => 'auto',
	]
);

new \Kirki\Field\Dimensions(
	[
		'settings'    => 'logo_dimensions_m',
		'label'       => esc_html__( 'Logo Dimensions For Mobile', 'nicex' ),
		'section'     => 'logo_settings',
        'priority' => $priority++,
		'default'     => [
			'width'  => 'auto',
			'height' => '48px',
		],
        'output'    => [
            [
				'element' => '.main-header__logo a, .main-header__logo svg, .main-header__logo img',
				'media_query' => '@media (max-width: 767px)'
            ],
        ],
        'transport' => 'auto',
	]
);

new \Kirki\Field\Image(
	[
		'settings'    => 'logo_light',
		'label'       => esc_html__( 'Image Logo Light', 'nicex' ),
		'description' => esc_html__( 'For Dark Theme Mode', 'nicex' ),
		'section'     => 'logo_settings',
		'default'     => '',
        'priority' => $priority++
	]
);

new \Kirki\Field\Image(
	[
		'settings'    => 'logo_dark',
		'label'       => esc_html__( 'Image Logo Dark', 'nicex' ),
		'description' => esc_html__( 'For Light Theme Mode', 'nicex' ),
		'section'     => 'logo_settings',
		'default'     => '',
        'priority' => $priority++
	]
);