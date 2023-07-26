<?php

$priority = 0;

/**
 * Theme Mode
 */
new \Kirki\Field\Radio_Buttonset(
	[
        'settings'    => 'theme_mode',
        'label'       => esc_html__( 'Select Website Mode', 'nicex' ),
        'section'     => 'colors_schemes',
        'default'     => 'light',
        'priority'    => $priority++,
        'choices'     => [
            'light'   => esc_html__( 'Light Mode', 'nicex' ),
            'dark'    => esc_html__( 'Dark Mode', 'nicex' ),
        ],
    ]
);

/**
 * Primary Color (Light Mode)
 */
new \Kirki\Field\Color(
	[
        'settings' => 'accent_color',
        'section' => 'colors_schemes',
        'label' => esc_html__( 'Accent Color', 'nicex' ),
        'description' => esc_html__( 'Select the Accent Color', 'nicex' ),
        'priority' => $priority++,
        'choices' => array(
            'alpha' => false 
        ),
        'default' => 'hsl(239, 29%, 54%)',
        'output'    => [
            [
                'element'  => ':root, [data-theme="light"]',
                'property' => '--color-primary',
            ],
        ],
        'transport' => 'auto',
        'required'  => array( 
            array( 
                'setting'   => 'theme_mode',
                'operator'  => '==',
                'value'     => 'light'
            )
        ),
    ]
);

/**
 * Contrast Higher (Light Mode)
 */
new \Kirki\Field\Color(
	[
        'settings' => 'primary_color1',
        'section' => 'colors_schemes',
        'label' => esc_html__( 'Primary Text Color', 'nicex' ),
        'description' => esc_html__( 'Text color', 'nicex' ),
        'priority' => $priority++,
        'choices' => array(
            'alpha' => false 
        ),
        'default' => 'hsl(223, 8%, 17%)',
        'output'    => [
            [
                'element'  => ':root, [data-theme="light"]',
                'property' => '--color-contrast-higher',
            ],
        ],
        'transport' => 'auto',
        'required'  => array( 
            array( 
                'setting'   => 'theme_mode',
                'operator'  => '==',
                'value'     => 'light'
            )
        ),
    ]
);

/**
 * Contrast Medium (Light Mode)
 */
new \Kirki\Field\Color(
	[
        'settings' => 'contrast_color2',
        'section' => 'colors_schemes',
        'label' => esc_html__( '', 'nicex' ),
        'description' => esc_html__( 'Color Contrast Medium', 'nicex' ),
        'priority' => $priority++,
        'choices' => array(
            'alpha' => true 
        ),
        'default' => 'hsl(225, 2%, 52%)',
        'output'    => [
            [
                'element'  => ':root, [data-theme="light"]',
                'property' => '--color-contrast-medium',
            ],
        ],
        'transport' => 'auto',
        'required'  => array( 
            array( 
                'setting'   => 'theme_mode',
                'operator'  => '==',
                'value'     => 'light'
            )
        ),
    ]
);

/**
 * Contrast Low (Light Mode)
 */
new \Kirki\Field\Color(
	[
        'settings' => 'contrast_low',
        'section' => 'colors_schemes',
        'label' => esc_html__( '', 'nicex' ),
        'description' => esc_html__( 'Color Contrast Low', 'nicex' ),
        'priority' => $priority++,
        'choices' => array(
            'alpha' => true 
        ),
        'default' => 'hsl(0, 0%, 90%)',
        'output'    => [
            [
                'element'  => ':root, [data-theme="light"]',
                'property' => '--color-contrast-low',
            ],
        ],
        'transport' => 'auto',
        'required'  => array( 
            array( 
                'setting'   => 'theme_mode',
                'operator'  => '==',
                'value'     => 'light'
            )
        ),
    ]
);

/**
 * Contrast Lower (Light Mode)
 */
new \Kirki\Field\Color(
	[
        'settings' => 'contrast_lower',
        'section' => 'colors_schemes',
        'label' => esc_html__( '', 'nicex' ),
        'description' => esc_html__( 'Color Contrast Lower', 'nicex' ),
        'priority' => $priority++,
        'choices' => array(
            'alpha' => true 
        ),
        'default' => 'hsl(0, 0%, 95%)',
        'output'    => [
            [
                'element'  => ':root, [data-theme="light"]',
                'property' => '--color-contrast-lower',
            ],
        ],
        'transport' => 'auto',
        'required'  => array( 
            array( 
                'setting'   => 'theme_mode',
                'operator'  => '==',
                'value'     => 'light'
            )
        ),
    ]
);

/**
 * Background Color Light
 */
new \Kirki\Field\Color(
	[
        'settings' => 'bg_color_light',
        'section' => 'colors_schemes',
        'label' => esc_html__( 'Background Color', 'nicex' ),
        'description' => esc_html__( 'Select the background color', 'nicex' ),
        'priority' => $priority++,
        'choices' => array(
            'alpha' => false 
        ),
        'default' => 'hsl(0, 0%, 100%)',
            'output'    => [
            [
                'element'  => ':root, [data-theme="light"]',
                'property' => '--color-bg',
            ],
        ],
        'transport' => 'auto',
        'required'  => array( 
            array( 
                'setting'   => 'theme_mode',
                'operator'  => '==',
                'value'     => 'light'
            )
        ),
    ]
);

/**
 * Primary Color (Dark Mode)
 */
new \Kirki\Field\Color(
	[
        'settings' => 'accent_color_d',
        'section' => 'colors_schemes',
        'label' => esc_html__( 'Accent Color', 'nicex' ),
        'description' => esc_html__( 'Select the Accent Color', 'nicex' ),
        'priority' => $priority++,
        'choices' => array(
            'alpha' => false 
        ),
        'default' => 'hsl(250, 93%, 65%)',
        'output'    => [
            [
                'element'  => ':root, [data-theme="dark"]',
                'property' => '--color-primary',
            ],
        ],
        'transport' => 'auto',
        'required'  => array( 
            array( 
                'setting'   => 'theme_mode',
                'operator'  => '==',
                'value'     => 'dark'
            )
        ),
    ]
);

new \Kirki\Field\Custom(
	[
        'settings'    => 'separator',
        'section'     => 'colors_schemes',
        'default'     => '<hr>',
        'priority' => $priority++,
    ]
);


/**
 * Contrast Higher (Dark Mode)
 */
new \Kirki\Field\Color(
	[
        'settings' => 'primary_color_dark_1',
        'section' => 'colors_schemes',
        'label' => esc_html__( 'Primary Text Color', 'nicex' ),
        'description' => esc_html__( 'Text color', 'nicex' ),
        'priority' => $priority++,
        'choices' => array(
            'alpha' => false 
        ),
        'default' => 'hsl(240, 100%, 99%)',
        'output'    => [
            [
                'element'  => ':root, [data-theme="dark"]',
                'property' => '--color-contrast-higher',
            ],
        ],
        'transport' => 'auto',
        'required'  => array( 
            array( 
                'setting'   => 'theme_mode',
                'operator'  => '==',
                'value'     => 'dark'
            )
        ),
    ]
);

/**
 * Contrast Medium (Dark Mode)
 */
new \Kirki\Field\Color(
	[
        'settings' => 'contrast_color_dark_2',
        'section' => 'colors_schemes',
        'label' => esc_html__( '', 'nicex' ),
        'description' => esc_html__( 'Color Contrast Medium', 'nicex' ),
        'priority' => $priority++,
        'choices' => array(
            'alpha' => true 
        ),
        'default' => 'hsl(240, 1%, 54%)',
        'output'    => [
            [
                'element'  => ':root, [data-theme="dark"]',
                'property' => '--color-contrast-medium',
            ],
        ],
        'transport' => 'auto',
        'required'  => array( 
            array( 
                'setting'   => 'theme_mode',
                'operator'  => '==',
                'value'     => 'dark'
            )
        ),
    ]
);

/**
 * Contrast Low (Dark Mode)
 */
new \Kirki\Field\Color(
	[
        'settings' => 'contrast_low_2',
        'section' => 'colors_schemes',
        'label' => esc_html__( '', 'nicex' ),
        'description' => esc_html__( 'Color Contrast Low', 'nicex' ),
        'priority' => $priority++,
        'choices' => array(
            'alpha' => true 
        ),
        'default' => 'hsl(240, 1%, 37%)',
        'output'    => [
            [
                'element'  => ':root, [data-theme="dark"]',
                'property' => '--color-contrast-low',
            ],
        ],
        'transport' => 'auto',
        'required'  => array( 
            array( 
                'setting'   => 'theme_mode',
                'operator'  => '==',
                'value'     => 'dark'
            )
        ),
    ]
);

/**
 * Contrast Lower (Dark Mode)
 */
new \Kirki\Field\Color(
	[
        'settings' => 'contrast_lower_2',
        'section' => 'colors_schemes',
        'label' => esc_html__( '', 'nicex' ),
        'description' => esc_html__( 'Color Contrast Lower', 'nicex' ),
        'priority' => $priority++,
        'choices' => array(
            'alpha' => true 
        ),
        'default' => 'hsl(240, 1%, 20%)',
        'output'    => [
            [
                'element'  => ':root, [data-theme="dark"]',
                'property' => '--color-contrast-lower',
            ],
        ],
        'transport' => 'auto',
        'required'  => array( 
            array( 
                'setting'   => 'theme_mode',
                'operator'  => '==',
                'value'     => 'dark'
            )
        ),
    ]
);

Kirki::add_field( 'nicex_customize', array(
    'type'        => 'custom',
    'settings'    => 'separator2',
    'section'     => 'colors_schemes',
    'default'     => '<hr>',
    'priority' => $priority++,
) );

/**
 * Background Color Dark
 */
new \Kirki\Field\Color(
	[
        'settings' => 'bg_color',
        'section' => 'colors_schemes',
        'label' => esc_html__( 'Background Color', 'nicex' ),
        'description' => esc_html__( 'Select the background color', 'nicex' ),
        'priority' => $priority++,
        'choices' => array(
            'alpha' => false 
        ),
        'default' => 'hsl(0, 0%, 9%)',
            'output'    => [
            [
                'element'  => ':root, [data-theme="dark"]',
                'property' => '--color-bg',
            ],
        ],
        'transport' => 'auto',
        'required'  => array( 
            array( 
                'setting'   => 'theme_mode',
                'operator'  => '==',
                'value'     => 'dark'
            )
        ),
    ]
);

new \Kirki\Field\Custom(
	[
        'settings'    => 'separator3',
        'section'     => 'colors_schemes',
        'default'     => '<hr>',
        'priority' => $priority++,
     ]
);