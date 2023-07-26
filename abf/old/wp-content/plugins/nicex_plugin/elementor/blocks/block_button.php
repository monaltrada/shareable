<?php

/**
 * @author: Mad Sparrow
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_MS_Button extends Widget_Base {

	public function get_name() {
		return 'ms-button';
	}

	public function get_title() {
		return esc_html__( 'Button', 'madsparrow' );
	}

	public function get_icon() {
		return 'eicon-button ms-badge';
	}

	public function get_categories() {
		return [ 'ms-elements' ];
	}

	public function get_keywords() {
		return [ 'button', 'link', 'action' ];
	}

	public static function get_button_sizes() {
		return [
			'sm' => esc_html__( 'Small', 'madsparrow' ),
			'ba' => esc_html__( 'Basic', 'madsparrow' ),
			'md' => esc_html__( 'Medium', 'madsparrow' ),
			'lg' => esc_html__( 'Large', 'madsparrow' ),
		];
	}

	public static function get_button_styles() {
		return [
			'primary' => esc_html__( 'Primary', 'madsparrow' ),
			'subtle' => esc_html__( 'Subtle', 'madsparrow' ),
			'accent' => esc_html__( 'Accent', 'madsparrow' ),
		];
	}

	protected function register_controls() {

		$first_level = 0;

		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'Button', 'madsparrow' ),
			]
		);

        if ( get_template() !== 'nicex' ) {

            $this->add_control(
                'notification_' . $first_level++, [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => '<strong>' . esc_html__( 'NiceX Theme not activated!', 'madsparrow' ) . '</strong><br>' . sprintf( __( 'Go to the <a href="%s" target="_blank">Themes</a> to activate.', 'madsparrow' ), admin_url( 'themes.php' ) ),
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-danger',
                    'separator' => 'after',
                ]
            );

        }

		$this->add_control(
			'text', [
				'label' => esc_html__( 'Text', 'madsparrow' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Click Here',
				'label_block' => true
			]
		);

		$this->add_control(
			'link', [
				'label' => esc_html__( 'Link', 'madsparrow' ),
				'type' => Controls_Manager::URL,
				'placeholder' => 'https://your-link.com',
				'default' => [
					'url'=> '#',
				]
			]
		);

		$this->add_control(
			'style', [
				'label' => esc_html__( 'Style', 'madsparrow' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'primary',
				'options' => self::get_button_styles(),
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'alignment', [
				'label' => esc_html__( 'Alignment', 'madsparrow' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'madsparrow' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'madsparrow' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'madsparrow' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};'
				],
			]
		);

		$this->add_control(
			'full_width', [
				'label' => esc_html__( 'Full Width', 'madsparrow' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'disabled', [
				'label' => esc_html__( 'Disable Button', 'madsparrow' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'size', [
				'label' => esc_html__( 'Size', 'madsparrow' ),
				'type' => Controls_Manager::SELECT,
				'options' => self::get_button_sizes(),
				'default' => 'md'
			]
		);

		$this->add_control(
			'icon', [
				'label' => esc_html__( 'Icon', 'madsparrow' ),
				'type' => Controls_Manager::ICONS,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'icon_position', [
				'label' => esc_html__( 'Position', 'madsparrow' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'madsparrow' ),
						'icon' => 'eicon-long-arrow-left',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'madsparrow' ),
						'icon' => 'eicon-long-arrow-right',
					],
				],
				'default' => 'right',
				'condition' => [
					'icon[value]!' => '',
				],
			]
		);

		$this->end_controls_section();

        // TAB CONTENT
        $this->start_controls_section(

            'style_section',
                [
                    'label' => __( 'Button', 'madsparrow' ),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );

        $this->add_control(
            'border_radius',
            [
                'label' => __( 'Border Radius', 'madsparrow' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'pt' ],
                'selectors' => [
                    '{{WRAPPER}} .btn' => 'border-top-left-radius: {{TOP}}{{UNIT}} {{TOP}}{{UNIT}}; border-top-right-radius: {{RIGHT}}{{UNIT}} {{RIGHT}}{{UNIT}}; border-bottom-right-radius: {{BOTTOM}}{{UNIT}} {{BOTTOM}}{{UNIT}}; border-bottom-left-radius: {{LEFT}}{{UNIT}} {{LEFT}}{{UNIT}};', 
                ],
            ]
        );

        // TAB CONTENT
        $this->start_controls_tabs(
            'tabs_' . $first_level++
        );

        // TAB CONTENT
        $this->start_controls_tab(
            'tab_' . $first_level++, [
                'label' => esc_html__( 'Normal', 'madsparrow' ),
            ]
        );

		$this->add_control(
			'btn_text',
			[
				'label' => esc_html__( 'Text Color', 'madsparrow' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
            'text_color', [
                'label' => esc_html__( 'Color', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ms-btn__text .text--main, .ms-btn__icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'a_text_color', [
                'label' => esc_html__( 'Active Color', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .text--ghost, .btn:hover .ms-btn__icon' => 'color: {{VALUE}};',
                ],
            ]
        );

		$this->add_control(
			'btn_background',
			[
				'label' => esc_html__( 'Background', 'madsparrow' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
            'bg_color', [
                'label' => esc_html__( 'Base', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bgs_color', [
                'label' => esc_html__( 'Second', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn:after' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bgt_color', [
                'label' => esc_html__( 'The Third', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn:before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bga_color', [
                'label' => esc_html__( 'Active', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ms-btn--ripple' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        // TAB CONTENT
        $this->start_controls_tab(
            'tab_' . $first_level++, [
                'label' => esc_html__( 'Hover', 'madsparrow' ),
            ]
        );

        $this->add_control(
            'text_color_hover', [
                'label' => esc_html__( 'Text Color', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .text--ghost, .btn:hover .ms-btn__icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bg_color_hover', [
                'label' => esc_html__( 'Background', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn:before' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( [
			'button' => [
				'class' => [
					'btn',
					'btn--' . $settings[ 'size' ],
					'btn--' . $settings[ 'style' ]
				],
				'role' => 'button'
			]
		] );

		if ( $settings[ 'full_width' ] == 'yes' ) {
			$this->add_render_attribute( 'button', 'class', 'btn--full-width' );
		}

		if ( $settings[ 'disabled' ] == 'yes' ) {
			$this->add_render_attribute( 'button', 'class', 'btn--disabled' );
		}

		if ( ! empty( $settings[ 'link' ][ 'url' ] ) ) {

			$this->add_render_attribute( 'button', 'href', $settings[ 'link' ][ 'url' ] );

			if ( $settings[ 'link' ][ 'is_external' ] ) {
				$this->add_render_attribute( 'button', 'target', '_blank' );
			}

			if ( $settings[ 'link' ][ 'nofollow' ] ) {
				$this->add_render_attribute( 'button', 'rel', 'nofollow' );
			}

		}

		?>

		<a <?php echo $this->get_render_attribute_string( 'button' ); ?>>

			<?php if ( ! empty( $settings[ 'icon' ][ 'value' ] ) && $settings[ 'icon_position' ] == 'left' ) : ?>

				<span class="ms-btn__icon ms-btn__icon--left">
					<?php Icons_Manager::render_icon( $settings[ 'icon' ], [ 'aria-hidden' => 'true' ] ); ?>
				</span>

			<?php endif; ?>

			<div class="ms-btn__text">
				<span class="text--main"><?php echo $settings[ 'text' ]; ?></span>
				<span class="text--ghost"><?php echo $settings[ 'text' ]; ?></span>
			</div>

			<span class="ms-btn--ripple"></span>

			<?php if ( ! empty( $settings[ 'icon' ][ 'value' ] ) && $settings[ 'icon_position' ] == 'right' ) : ?>

				<span class="ms-btn__icon ms-btn__icon--right">
					<?php Icons_Manager::render_icon( $settings[ 'icon' ], [ 'aria-hidden' => 'true' ] ); ?>
				</span>

			<?php endif; ?>

		</a>

		<?php

	}

}