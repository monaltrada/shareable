<?php

$priority = 0;

new \Kirki\Field\Dimensions(
	[
		'settings'    => 'setting_dimensions_1',
		'label'       => esc_html__( 'Dimensions Control', 'nicex' ),
		'section'     => 'header_settings',
        'priority' => $priority++,
		'default'     => [
			'width'  => '1240px',
			'height' => '80px',
		],
        'output'    => [
            [
                'choice'      => 'width',
                'element'  => ':root',
                'property' => '--main-header-width-md',
            ],
            [
                'choice'      => 'height',
                'element'  => ':root',
                'property' => '--main-header-height-md',
            ],
        ],
        'transport' => 'auto',
	]
);

new \Kirki\Field\Radio_Buttonset(
    [
    'section'     => 'header_settings',
    'settings'    => 'type_header',
    'label' => esc_html__( 'Style', 'nicex' ),
    'default'     => 'default',
    'choices'     => [
        'default'   => esc_html__( 'Default', 'nicex' ),
        'fixed' => esc_html__( 'Fixed', 'nicex' ),
        'sticky'  => esc_html__( 'Sticky', 'nicex' ),
    ],
    'priority' => $priority++,
] );

new \Kirki\Field\Checkbox_Switch(
	[
		'settings'    => 'blur_hedaer',
		'label'       => esc_html__( 'Background Blur Effect', 'nicex' ),
		'section'     => 'header_settings',
		'default'     => 'on',
		'priority' => $priority++,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'nicex' ),
			'off' => esc_html__( 'Disable', 'nicex' ),
		],
	]
);