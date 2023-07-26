<?php

$priority = 0;

new \Kirki\Field\Select(
	[
		'settings'    => 'footer_template',
		'label'       => esc_html__( 'Select Footer Template', 'nicex' ),
		'section'     => 'footer_settings',
        'priority' => $priority++,
		'placeholder' => esc_html__( 'Choose an option', 'nicex' ),
        'choices'     => ms_get_elementor_templates(),
	]
);