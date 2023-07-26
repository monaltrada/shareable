<?php

/**
 * @author: madsparrow
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_MS_Text_Ticker extends Widget_Base {

    public function get_name() {
        return 'ms_text_ticker';
    }

    public function get_title() {
        return esc_html__( 'Text Ticker', 'madsparrow' );
    }

    public function get_icon() {
        return 'eicon-animation-text ms-badge';
    }

    public function get_categories() {
        return [ 'ms-elements' ];
    }

    public function get_keywords() {
        return [ 'text', 'animation', 'ticker' ];
    }

    protected function register_controls() {

        $first_level = 0;

        $this->start_controls_section(
            'section_' . $first_level++, [
                'label' => esc_html__( 'Content', 'madsparrow' ),
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
            'text_ticker',[
                'label' => __( 'Text', 'madsparrow' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 10,
                'placeholder' => __( 'Type your text here', 'madsparrow' ),
                'description' => __( 'You can use <strong>&#x3c;span&#x3e;</strong> tag to highlight specific words in text.', 'madsparrow' ),
                'default' => __( 'Type your text here', 'madsparrow' ),
            ]
        );

        $this->end_controls_section();

        // TAB CONTENT
        $this->start_controls_section(
            'section_' . $first_level++, [
                'label' => esc_html__( 'Style', 'madsparrow' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .ms-tt__text',
            ]
        );

        $this->add_control(
            'text_color', [
                'label' => esc_html__( 'Text Color', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ms-tt__text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bg_color', [
                'label' => esc_html__( 'Background Color', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ms-tt-wrap' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(), [
                'name' => 'border',
                'label' => __( 'Border', 'madsparrow' ),
                'selector' => '{{WRAPPER}} .ms-tt-wrap',
            ]
        );

        $this->add_control(
            'speed', [
                'label' => __( 'Speed', 'madsparrow' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 1000,
                'step' => 1,
                'default' => 10,
                'selectors' => [
                    '{{WRAPPER}} .ms-tt' => 'animation-duration: {{UNIT}}s;',
                ],
            ]
        );

        $this->add_control(
            'margin',
            [
                'label' => __( 'Text Padding', 'madsparrow' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ms-tt__text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'direction',
            [
                'label' => __( 'Direction', 'madsparrow' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'rtl',
                'options' => [
                    'ltr'  => __( 'from left to right', 'madsparrow' ),
                    'rtl' => __( 'from right to left', 'madsparrow' ),
                ],
            ]
        );

        $this->add_control(
            'text_rotate', [
                'label' => __( 'Rotate', 'madsparrow' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => -90,
                        'max' => 90,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'selectors' => [
                    '{{WRAPPER}} .ms-tt-wrap' => ' -webkit-transform: rotate({{SIZE}}deg)',
                ],
            ]
        );

        $this->add_control(
            'stop_hover',
            [
                'label' => __( 'Stop on Hover', 'madsparrow' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'madsparrow' ),
                'label_off' => __( 'No', 'madsparrow' ),
                'return_value' => 'on',
                'default' => 'on',
            ]
        );

        $this->add_control(
            'text_stroke',
            [
                'label' => __( 'Stroke', 'madsparrow' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'madsparrow' ),
                'label_off' => __( 'No', 'madsparrow' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'stroke_color',
            [
                'label' => __( 'Stroke Color', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ms-tt__text' => '-webkit-text-stroke-color: {{VALUE}}',
                ],
                'condition' => [
                    'text_stroke' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'stroke_width', [
                'label' => __( 'Stroke Fill Width', 'madsparrow' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 20,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 20,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .ms-tt__text' => ' -webkit-text-stroke-width: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'text_stroke' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'heading_' . $first_level++, [
                'label' => __( 'Span Text', 'madsparrow' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'title_typography_span',
                'selector' => '{{WRAPPER}} .ms-tt__text span',
            ]
        );

        $this->add_control(
            'text_color_span', [
                'label' => esc_html__( 'Text Color', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ms-tt__text span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'bg_color_span', [
                'label' => esc_html__( 'Background Color', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ms-tt-wrap span' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(), [
                'name' => 'border_span',
                'label' => __( 'Border', 'madsparrow' ),
                'selector' => '{{WRAPPER}} .ms-tt-wrap span',
            ]
        );

        $this->add_control(
            'text_stroke_span',
            [
                'label' => __( 'Stroke', 'madsparrow' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'madsparrow' ),
                'label_off' => __( 'No', 'madsparrow' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'stroke_color_span',
            [
                'label' => __( 'Stroke Color', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ms-tt__text span' => '-webkit-text-stroke-color: {{VALUE}}',
                ],
                'condition' => [
                    'text_stroke_span' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'stroke_width_span', [
                'label' => __( 'Stroke Fill Width', 'madsparrow' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em' ],
                'default' => '1',
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 20,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 20,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 1,
                ],
                'selectors' => [
                    '{{WRAPPER}} .ms-tt__text span' => ' -webkit-text-stroke-width: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'text_stroke_span' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'text-scope', [
            'id' => $this->get_id(),
            'class' => [ 'ms-tt-wrap'],
            'data-speed' => $settings['speed'],
            'data-direction' => $settings['direction'],
            'data-sh' => $settings['stop_hover'],
        ]);
        $this->add_render_attribute( 'text-wrap', [
            'class' => [ 'ms-tt'],
        ] );

        ?>
        <div <?php echo $this->get_render_attribute_string( 'text-scope' ); ?>>
            <ul <?php echo $this->get_render_attribute_string( 'text-wrap' ); ?>>

            <?php $i = 1;
                while ($i <= 8): ?>
                    <li class="ms-tt__text"><?php echo $settings['text_ticker']; ?>&nbsp;</li>
                <?php $i++; endwhile; ?>    
            </ul>
        </div>
        <?php }

}