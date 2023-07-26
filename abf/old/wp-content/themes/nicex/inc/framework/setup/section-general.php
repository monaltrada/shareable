<?php

/**
 * General
 */
$priority = 0;

new \Kirki\Field\Checkbox_Switch(
	[
		'settings'    => 'page_transition',
		'label'       => esc_html__( 'Page transition', 'nicex' ),
		'section'     => 'section_general_settings',
		'default'     => 'off',
		'priority' => $priority++,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'nicex' ),
			'off' => esc_html__( 'Disable', 'nicex' ),
		],
	]
);

new \Kirki\Field\Checkbox_Switch(
	[
		'settings'    => 'top_btn',
		'label'       => esc_html__( 'Back To Top Button', 'nicex' ),
		'section'     => 'section_general_settings',
		'default'     => 'off',
		'priority' => $priority++,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'nicex' ),
			'off' => esc_html__( 'Disable', 'nicex' ),
		],
	]
);

new \Kirki\Field\Checkbox_Switch(
	[
		'settings'    => 'mode_switcher',
		'label'       => esc_html__( 'Theme Mode Switcher', 'nicex' ),
		'section'     => 'section_general_settings',
		'default'     => 'off',
		'priority' => $priority++,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'nicex' ),
			'off' => esc_html__( 'Disable', 'nicex' ),
		],
	]
);