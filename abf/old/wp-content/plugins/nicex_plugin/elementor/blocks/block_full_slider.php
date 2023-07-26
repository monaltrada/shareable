<?php

/**
 * @author: madsparrow
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_MS_Slider extends Widget_Base {

    use \MS_Elementor\Traits\Helper;

    public function get_name() {
        return 'ms_slider_fs';
    }

    public function get_title() {
        return esc_html__( 'Slider', 'madsparrow' );
    }

    public function get_icon() {
        return 'eicon-slider-full-screen ms-badge';
    }

    public function get_categories() {
        return [ 'ms-elements' ];
    }

    public function get_keywords() {
        return [ 'slider', 'controls', ];
    }

    protected function register_controls() {

        $first_level = 0;

        $this->start_controls_section(
            'section_' . $first_level++, [
                'label' => esc_html__( 'Slider Full Screen', 'madsparrow' ),
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

        $repeater = new Repeater();

        $repeater->add_control(
            'slide_type', [
                'label' => __( 'Slide Type', 'madsparrow' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'image',
                'options' => [
                    'image'  => __( 'Image', 'madsparrow' ),
                    'video'  => __( 'Video', 'madsparrow' ),
                ],
            ]
        );

        $repeater->add_control(
            'slide_img', [
                'label' => __( 'Slide Image', 'madsparrow' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'slide_type' => 'image',
                ],
            ]
        );

        $repeater->add_control(
			'slide_video_type', [
				'label' => esc_html__( 'Source', 'madsparrow' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'youtube',
				'options' => [
					'youtube' => esc_html__( 'YouTube', 'madsparrow' ),
					'vimeo' => esc_html__( 'Vimeo', 'madsparrow' ),
					'hosted' => esc_html__( 'Self Hosted', 'madsparrow' ),
				],
                'condition' => [
                    'slide_type' => 'video',
                ],
			]
		);
        $repeater->add_control(
            'youtube_url',
            [
                'label' => esc_html__( 'Link', 'madsparrow' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Enter your URL', 'madsparrow' ) . ' (YouTube)',
                'default' => 'https://www.youtube.com/watch?v=XHOmBV4js_E',
                'label_block' => true,
                'condition' => [
                    'slide_video_type' => 'youtube',
                ],
                'frontend_available' => true,
            ]
        );
        
        $repeater->add_control(
            'vimeo_url',
            [
                'label' => esc_html__( 'Link', 'madsparrow' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Enter your URL', 'madsparrow' ) . ' (Vimeo)',
                'default' => 'https://vimeo.com/235215203',
                'label_block' => true,
                'condition' => [
                    'slide_video_type' => 'vimeo',
                ],
            ]
        );

        $repeater->add_control(
            'hosted_url', [
                'label' => esc_html__( 'Choose File', 'madsparrow' ),
                'type' => Controls_Manager::MEDIA,
                'media_type' => 'video',
                'condition' => [
                    'slide_video_type' => 'hosted',
                    'slide_type' => 'video',
                ],
            ]
        );

        $repeater->add_control(
			'video_start', [
				'label' => esc_html__( 'Start Time', 'madsparrow' ),
				'type' => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Specify a start time (in seconds)', 'madsparrow' ),
				'frontend_available' => true,
                'condition' => [
					'slide_video_type' => [ 'youtube', ['vimeo'] ],
				],
			]
		);

		$repeater->add_control(
			'video_end', [
				'label' => esc_html__( 'End Time', 'madsparrow' ),
				'type' => Controls_Manager::NUMBER,
				'description' => esc_html__( 'Specify an end time (in seconds)', 'madsparrow' ),
				'condition' => [
					'slide_video_type' => [ 'youtube' ],
				],
				'frontend_available' => true,
			]
		);

        $repeater->add_control(
            'content_select', [
                'label' => __( 'Content Text', 'madsparrow' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'default',
                
                'separator' => 'before',
                'options' => [
                    'default'  => __( 'Default', 'madsparrow' ),
                    'template'  => __( 'Template', 'madsparrow' ),
                ],
            ]
        );

        $repeater->add_control(
            'content_subtitle', [
                'label' => esc_html__( 'Subtitle', 'madsparrow' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'condition' => [
                    'content_select' => 'default',
                ],
            ]
        );

        $repeater->add_control(
            'content_title', [
                'label' => esc_html__( 'Title', 'madsparrow' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'condition' => [
                    'content_select' => 'default',
                ],
            ]
        );

        $repeater->add_control(
            'content_desc', [
                'label' => __( 'Description', 'madsparrow' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => esc_html__( 'Type your description here', 'madsparrow' ),
                'condition' => [
                    'content_select' => 'default',
                ],
            ]
        );

        $repeater->add_control(
            'content_link_title', [
                'label' => esc_html__( 'Link Title', 'madsparrow' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'condition' => [
                    'content_select' => 'default',
                ],
            ]
        );

        $repeater->add_control(
            'content_link', [
                'label' => esc_html__( 'Link', 'madsparrow' ),
                'type' => Controls_Manager::URL,
                'placeholder' => 'https://your-link.com',
                'label_block' => true,
                'default' => [
                    'url'=> '',
                ],
                'condition' => [
                    'content_select' => 'default',
                ],
            ]
        );

        $repeater->add_control(
            'content_template', [
                'label' => esc_html__( 'Select a Template', 'madsparrow' ),
                'type' => Controls_Manager::SELECT2,
                'options' => $this->ms_get_elementor_templates(),
                'label_block' => true,
                'condition' => [
                    'content_select' => 'template',
                ],
            ]
        );

        $repeater->add_control(
            'slide_link', [
                'label' => esc_html__( 'Link', 'madsparrow' ),
                'type' => Controls_Manager::URL,
                'placeholder' => 'https://your-link.com',
                'default' => [
                    'url'=> '',
                ],
                'condition' => [
                    'content_select' => 'template',
                ],
            ]
        );

        $this->add_control(
            'slider_fs', [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'slide_img' => 'Slide Image',
                        'slide_link' => 'Link',
                        'slide_title' => 'Title',
                        'sldie_desc' => 'Description',
                        'content_template' => '',
                    ],
                ],
            ]
        );

        $this->end_controls_section();


        // TAB CONTENT
        $this->start_controls_section(
            'slider_view', [
                'label' => __( 'View', 'madsparrow' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'effect', [
                'label' => __( 'Effect', 'madsparrow' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'fade',
                'options' => [
                    'slide'  => __( 'Slide', 'madsparrow' ),
                    'fade'  => __( 'Fade', 'madsparrow' ),
                    'carousel'  => __( 'Carousel', 'madsparrow' ),
                ],
            ]
        );

        $this->add_control(
            'fl_carousel', [
                'label' => __( 'Full Page Content', 'madsparrow' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'On', 'madsparrow' ),
                'label_off' => __( 'Off', 'madsparrow' ),
                'return_value' => 'on',
                'default' => 'off',
                'condition' => [
                    'effect' => 'carousel',
                ],
            ]
        );

        $this->add_responsive_control(
            'height_' . $first_level++, [
                'label' => __( 'Container Height', 'madsparrow' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'vh', 'em' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1080,
                        'step' => 1,
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'vh',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .ms-slider' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'slidesPerView', [
                'label' => __( 'Slides Per View', 'madsparrow' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'default' => [
                    'unit' => 'px',
                    'size' => 2,
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 8,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'desktop_default' => [
                    'size' => 1,
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'size' => 1,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'size' => 1,
                    'unit' => 'px',
                ],
                'condition' => [
                    'effect' => 'carousel',
                ],
            ]

        );

        $this->add_responsive_control(
            'spaceBetween', [
                'label' => __( 'Space Between', 'madsparrow' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ], 
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 400,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'desktop_default' => [
                    'size' => 0,
                    'unit' => 'px',
                ],
                'tablet_default' => [
                    'size' => 30,
                    'unit' => 'px',
                ],
                'mobile_default' => [
                    'size' => 10,
                    'unit' => 'px',
                ],
                'condition' => [
                    'effect' => 'carousel',
                ],
            ]
        );

        $this->add_control(
            'data_parallax', [
                'label' => __( 'Image Parallax Effect', 'madsparrow' ),
                'type' => Controls_Manager::SLIDER,
                'description' => __( 'This attribute may accept percentage to move element depending on progress and on its size', 'madsparrow' ),
                'size_units' => [ '%' ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 0,
                ],
                'condition' => [
                    'effect' => 'slide',
                ],
            ]
        );

        $this->add_control(
            'data_parallax_content', [
                'label' => __( 'Content Parallax Effect', 'madsparrow' ),
                'type' => Controls_Manager::SLIDER,
                'description' => __( 'This attribute may accept percentage to move element depending on progress and on its size', 'madsparrow' ),
                'size_units' => [ '%' ],
                'range' => [
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 0,
                ],
                'condition' => [
                    'effect' => 'slide',
                ],
            ]
        );

        $this->add_control(
            'badge_radius', [
                'label' => __( 'Border Radius', 'madsparrow' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'pt' ],
                'selectors' => [
                    '{{WRAPPER}} .ms-slider .swiper-slide .ms-slider--img' => 'border-top-left-radius: {{TOP}}{{UNIT}} {{TOP}}{{UNIT}}; border-top-right-radius: {{RIGHT}}{{UNIT}} {{RIGHT}}{{UNIT}}; border-bottom-right-radius: {{BOTTOM}}{{UNIT}} {{BOTTOM}}{{UNIT}}; border-bottom-left-radius: {{LEFT}}{{UNIT}} {{LEFT}}{{UNIT}};', '{{WRAPPER}} .ms-slider .swiper-slide .ms-slider--img img' => 'border-top-left-radius: {{TOP}}{{UNIT}} {{TOP}}{{UNIT}}; border-top-right-radius: {{RIGHT}}{{UNIT}} {{RIGHT}}{{UNIT}}; border-bottom-right-radius: {{BOTTOM}}{{UNIT}} {{BOTTOM}}{{UNIT}}; border-bottom-left-radius: {{LEFT}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .ms-slider' => 'border-top-left-radius: {{TOP}}{{UNIT}} {{TOP}}{{UNIT}}; border-top-right-radius: {{RIGHT}}{{UNIT}} {{RIGHT}}{{UNIT}}; border-bottom-right-radius: {{BOTTOM}}{{UNIT}} {{BOTTOM}}{{UNIT}}; border-bottom-left-radius: {{LEFT}}{{UNIT}} {{LEFT}}{{UNIT}};', '{{WRAPPER}} .ms-slider .swiper-slide .ms-slider--img img' => 'border-top-left-radius: {{TOP}}{{UNIT}} {{TOP}}{{UNIT}}; border-top-right-radius: {{RIGHT}}{{UNIT}} {{RIGHT}}{{UNIT}}; border-bottom-right-radius: {{BOTTOM}}{{UNIT}} {{BOTTOM}}{{UNIT}}; border-bottom-left-radius: {{LEFT}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // TAB CONTENT
        $this->start_controls_section(
            'slider_opt', [
                'label' => __( 'Options', 'madsparrow' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'autoplay', [
                'label' => __( 'Autoplay', 'madsparrow' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'On', 'madsparrow' ),
                'label_off' => __( 'Off', 'madsparrow' ),
                'return_value' => 'on',
                'default' => 'on',
            ]
        );

        $this->add_control(
            'tricker', [
                'label' => __( 'Tricker', 'madsparrow' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'On', 'madsparrow' ),
                'label_off' => __( 'Off', 'madsparrow' ),
                'return_value' => 'on',
                'default' => 'off',
                'condition' => [
                    'autoplay!' => 'on',
                ],
            ]
        );

        $this->add_control(
            'centered', [
                'label' => __( 'Centered', 'madsparrow' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'On', 'madsparrow' ),
                'label_off' => __( 'Off', 'madsparrow' ),
                'return_value' => 'on',
                'default' => 'on',
            ]
        );

        $this->add_control(
            'mousewheel', [
                'label' => __( 'Mousewheel', 'madsparrow' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'On', 'madsparrow' ),
                'label_off' => __( 'Off', 'madsparrow' ),
                'return_value' => 'on',
                'default' => 'on',
            ]
        );

        $this->add_control(
            'simulatetouch', [
                'label' => __( 'Simulate Touch', 'madsparrow' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'On', 'madsparrow' ),
                'label_off' => __( 'Off', 'madsparrow' ),
                'return_value' => 'on',
                'default' => 'on',
            ]
        );

        $this->add_control(
            'grabcursor', [
                'label' => __( 'Grab Cursor', 'madsparrow' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'On', 'madsparrow' ),
                'label_off' => __( 'Off', 'madsparrow' ),
                'return_value' => 'on',
                'default' => 'on',
                'condition' => [
                    'simulatetouch' => 'on',
                ],
            ]
        );

        $this->add_control(
            'delay', [
                'label' => __( 'Autoplay Delay', 'madsparrow' ),
                'type' => Controls_Manager::NUMBER,
                'description' => __( 'Delay between transitions (in ms)', 'madsparrow' ),
                'min' => 0,
                'max' => 10000,
                'step' => 100,
                'default' => 1000,
                'condition' => [
                    'autoplay' => 'on',
                ],
            ]
        );

        $this->add_control(
            'speed', [
                'label' => __( 'Speed', 'madsparrow' ),
                'type' => Controls_Manager::NUMBER,
                'description' => __( 'Duration of transition between slides (in ms)', 'madsparrow' ),
                'min' => 300,
                'max' => 10000,
                'step' => 100,
                'default' => 1000,
            ]
        );

        $this->add_control(
            'loop', [
                'label' => __( 'Loop', 'madsparrow' ),
                'type' => Controls_Manager::SWITCHER,
                'true' => __( 'On', 'madsparrow' ),
                'false' => __( 'Off', 'madsparrow' ),
                'return_value' => 'on',
                'default' => 'off',
            ]
        );

        $this->add_control(
            'direction', [
                'label' => __( 'Direction', 'madsparrow' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'horizontal',
                'options' => [
                    'horizontal'  => __( 'Horizontal', 'madsparrow' ),
                    'vertical'  => __( 'Vertical', 'madsparrow' ),
                ],
                'condition' => [
                    'effect' => 'slide',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'navigation_' . $first_level++, [
                'label' => __( 'Navigation', 'madsparrow' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ] 
        );

        $this->add_control(
            'nav', [
                'label' => __( 'Show', 'madsparrow' ),
                'type' => Controls_Manager::SWITCHER,
                'true' => __( 'On', 'madsparrow' ),
                'false' => __( 'Off', 'madsparrow' ),
                'return_value' => 'on',
                'default' => 'on',
            ]
        );

        $this->add_control(
            'nav_size', [
                'label' => __( 'Size', 'madsparrow' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'lg',
                'options' => [
                    'sm'  => __( 'Small', 'madsparrow' ),
                    'md'  => __( 'Medium', 'madsparrow' ),
                    'lg'  => __( 'Large', 'madsparrow' ),
                ],
                'condition' => [
                    'nav' => 'on',
                ],
            ]
        );

        $this->add_control(
            'nav_position', [
                'label' => esc_html__( 'Position', 'madsparrow' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'top' => [
                        'title' => esc_html__( 'Top', 'madsparrow' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Middle', 'madsparrow' ),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'bottom' => [
                        'title' => esc_html__( 'Bottom', 'madsparrow' ),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'default' => 'center',
                'condition' => [
                    'nav' => 'on',
                ],
            ]
        );

        $this->add_control(
            'button_color', [
                'label' =>esc_html__( 'Arrow Color', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ms-slider .i-arrow' => 'stroke: {{VALUE}};',
                ],
                'condition' => [
                    'nav' => 'on',
                ], 
            ]
        );

        $this->add_control(
            'button_background_color', [
                'label' =>esc_html__( 'Background Color', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ms-slider .ms-nav--next, .ms-slider .ms-nav--prev' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'nav' => 'on',
                ], 
            ]
        );

        $this->add_control(
            'button_background_blur', [
                'label' =>esc_html__( 'Background Blur', 'madsparrow' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 30,
                    ],
                    'default' => [
                    'unit' => 'px',
                    'size' => 10,
                    ],
                ],               
                'selectors' => [
                    '{{WRAPPER}} .ms-slider .ms-nav--next, .ms-slider .ms-nav--prev' => 'backdrop-filter: blur({{SIZE}}{{UNIT}});',
                ],
                'condition' => [
                    'nav' => 'on',
                ], 
            ]
        );

        $this->add_control(
            'border_radius', [
                'label' => __( 'Border Radius', 'madsparrow' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ms-slider .ms-nav--next, .ms-slider .ms-nav--prev' => 'border-top-left-radius: {{TOP}}{{UNIT}} {{TOP}}{{UNIT}}; border-top-right-radius: {{RIGHT}}{{UNIT}} {{RIGHT}}{{UNIT}}; border-bottom-right-radius: {{BOTTOM}}{{UNIT}} {{BOTTOM}}{{UNIT}}; border-bottom-left-radius: {{LEFT}}{{UNIT}} {{LEFT}}{{UNIT}};', '{{WRAPPER}} .ms-rb--avatar img' => 'border-top-left-radius: {{TOP}}{{UNIT}} {{TOP}}{{UNIT}}; border-top-right-radius: {{RIGHT}}{{UNIT}} {{RIGHT}}{{UNIT}}; border-bottom-right-radius: {{BOTTOM}}{{UNIT}} {{BOTTOM}}{{UNIT}}; border-bottom-left-radius: {{LEFT}}{{UNIT}} {{LEFT}}{{UNIT}};', 
                ],
                'condition' => [
                    'nav' => 'on',
                ],
            ]
        );

        $this->end_controls_section();

        // TAB CONTENT
        $this->start_controls_section(
            'progress', [
                'label' => __( 'Progressbar', 'madsparrow' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    '!direction' => ['horizontal'],
                ],
            ]
        );

        $this->add_control(
            'progressbar', [
                'label' => __( 'Show', 'madsparrow' ),
                'type' => Controls_Manager::SWITCHER,
                'true' => __( 'On', 'madsparrow' ),
                'false' => __( 'Off', 'madsparrow' ),
                'return_value' => 'on',
                'default' => 'off',
            ]
        );

        $this->add_control(
            'progress_color', [
                'label' =>esc_html__( 'Color', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ms-slider--pagination .swiper-pagination-progressbar-fill' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'progressbar' => 'on',
                ], 
            ]
        );

        $this->add_control(
            'progress_background_color', [
                'label' =>esc_html__( 'Background', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .swiper-pagination-progressbar' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'progressbar' => 'on',
                ], 
            ]
        );

        $this->add_responsive_control(
            'progress_position', [
                'label' => esc_html__( 'Position', 'madsparrow' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'madsparrow' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'madsparrow' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'madsparrow' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'center',
                'condition' => [
                    'progressbar' => 'on',
                ],
            ]
        );

        $this->add_control(
            'progress_width', [
                'label' => __( 'Width', 'madsparrow' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'vh', 'vw' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1920,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 35,
                ],
                'condition' => [
                    'effect' => 'slide',
                ],             
                'selectors' => [
                    '{{WRAPPER}} .ms-slider--progress' => 'width: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'progressbar' => 'on',
                ], 
            ]
        );

        $this->add_control(
            'progress_bottom', [
                'label' => __( 'Bottom', 'madsparrow' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'rem', 'vh', 'vw' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1920,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'rem' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'rem',
                    'size' => 3,
                ],
                'condition' => [
                    'effect' => 'slide',
                ],             
                'selectors' => [
                    '{{WRAPPER}} .ms-slider--progress' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'progressbar' => 'on',
                ], 
            ]
        );


        $this->add_control(
            'count_color', [
                'label' =>esc_html__( 'Count Color', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ms-slider--count' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'progressbar' => 'on',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'img_opt_' . $first_level++, [
                    'label' => __( 'Image', 'madsparrow' ),
                    'tab' => Controls_Manager::TAB_STYLE,
                ] 
        );

        $this->add_responsive_control(
            'image_object', [
                'label' => __( 'Position', 'madsparrow' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'cover',
                'options' => [
                    'none'  => __( 'None', 'madsparrow' ),
                    'fill'  => __( 'Fill', 'madsparrow' ),
                    'contain'  => __( 'Contain', 'madsparrow' ),
                    'cover'  => __( 'Cover', 'madsparrow' ),
                    'scale-down'  => __( 'Scale-down', 'madsparrow' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} .ms-slider .swiper-slide .ms-slider--img img' => 'object-fit: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_section();

        $this->start_controls_section(
            'img_' . $first_level++, [
                    'label' => __( 'Overlay', 'madsparrow' ),
                    'tab' => Controls_Manager::TAB_STYLE,
                ] 
        );

        $this->start_controls_tabs(
            'tabs_' . $first_level++
        );

        $this->start_controls_tab(
            'tab_' . $first_level++, [
                'label' => esc_html__( 'Normal', 'vlthemes' ),
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(), [
                'name' => 'overlay',
                'label' => __( 'Overlay', 'madsparrow' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .ms-slider--img::after',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_' . $first_level++, [
                'label' => esc_html__( 'Hover', 'vlthemes' ),
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(), [
                'name' => 'overlay_h',
                'label' => __( 'Overlay', 'madsparrow' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .slide-inner:hover .ms-slider--img::after',
            ]
        );
        
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // TAB CONTENT
        $this->start_controls_section(
            'content_' . $first_level++, [
                'label' => __( 'Content', 'madsparrow' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'alignment_' . $first_level++, [
                'label' => esc_html__( 'Horizontal Position', 'madsparrow' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'madsparrow' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'madsparrow' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__( 'Right', 'madsparrow' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ms-slider--cont' => 'justify-content: {{VALUE}}',
                ],
                'default' => 'left',
                'toggle' => true,
            ]
        );

        $this->add_responsive_control(
            'position_' . $first_level++, [
                'label' => esc_html__( 'Vertical Position', 'madsparrow' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'flex-start' => [
                        'title' => esc_html__( 'Top', 'madsparrow' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Middle', 'madsparrow' ),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'flex-end' => [
                        'title' => esc_html__( 'Bottom', 'madsparrow' ),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ms-slider--cont' => 'align-items: {{VALUE}}',
                ],
                'default' => 'flex-start',
                'separator' => 'before',
                'toggle' => true,
            ]
        );

		$this->add_responsive_control(
			'content_text_align',
			[
				'label' => esc_html__( 'Text Alignment', 'madsparrow' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
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
                'selectors' => [
                    '{{WRAPPER}} .ms-slider--cont .ms-cont__inner' => 'text-align: {{VALUE}}',
                ],
				'default' => 'center',
				'toggle' => true,
                'separator' => 'before',
			]
		);

        $this->add_control(
            'heading_' . $first_level++, [
                'label' => esc_html__( 'Subtitle', 'madsparrow' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'label' => esc_html__( 'Typography', 'madsparrow' ),
                'name' => 'content_subtitle',
                'selector' => '{{WRAPPER}} .ms-sc--st',
            ]
        );

		$this->add_control(
			'subtitle_color', [
				'label' => esc_html__( 'Color', 'madsparrow' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ms-sc--st' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
            'heading_' . $first_level++, [
                'label' => esc_html__( 'Title', 'madsparrow' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'label' => esc_html__( 'Typography', 'madsparrow' ),
                'name' => 'content_title',
                'selector' => '{{WRAPPER}} .ms-sc--t',
            ]
        );

		$this->add_control(
			'title_color', [
				'label' => esc_html__( 'Color', 'madsparrow' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ms-sc--t' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
            'heading_' . $first_level++, [
                'label' => esc_html__( 'Description', 'madsparrow' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'label' => esc_html__( 'Typography', 'madsparrow' ),
                'name' => 'content_desc',
                'selector' => '{{WRAPPER}} .ms-sc--desc',
            ]
        );

		$this->add_control(
			'desc_color', [
				'label' => esc_html__( 'Color', 'madsparrow' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ms-sc--desc' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'heading_' . $first_level++, [
				'label' => esc_html__( 'Link', 'madsparrow' ),
				'type' => Controls_Manager::HEADING,
                'separator' => 'before',
			]
		);

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'label' => esc_html__( 'Typography', 'madsparrow' ),
                'name' => 'content_link',
                'selector' => '{{WRAPPER}} .ms-sc--l',
            ]
        );
              
		$this->add_control(
			'link_color', [
				'label' => esc_html__( 'Color', 'madsparrow' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .ms-sc--l' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_responsive_control(
            'alignment_' . $first_level++, [
                'label' => esc_html__( 'Aligment', 'madsparrow' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'madsparrow' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'madsparrow' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'flex-end' => [
                        'title' => esc_html__( 'Right', 'madsparrow' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .ms-slider--cont .ms-sc--l' => 'justify-content: {{VALUE}}',
                ],
                'default' => 'left',
                'toggle' => true,
            ]
        );

        $this->add_responsive_control(
            'margin' . $first_level++, [
                'label' => __( 'Margin', 'madsparrow' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'vh', 'vw' ],
                'selectors' => [
                    '{{WRAPPER}} .ms-slider--cont .elementor-section-wrap' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .ms-slider--cont .ms-cont__inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'padding' . $first_level++, [
                'label' => __( 'Padding', 'madsparrow' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'vh', 'vw' ],
                'selectors' => [
                    '{{WRAPPER}} .ms-slider--cont .elementor-section-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .ms-slider--cont .ms-cont__inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',

            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        if ($settings['fl_carousel'] == 'on') {
            $fl_carousel = " fullpage-carousel";
        } else {
            $fl_carousel = null;
        }
        if ($settings['tricker'] == 'on') {
            $ticker = ' ms-ticker';
            $settings['autoplay'] = 'on';
            $settings['delay'] = '0';
        } else {
            $ticker = null;
            $settings['autoplay'] = $settings['autoplay'];
            $settings['delay'] = $settings['delay'];
        }

        switch ( $settings['effect'] ) {

            case 'fade':

                $data_parallax_content = null;
                $this->add_render_attribute( 'slider-wrap', [
                    'class' => [ 'ms-slider' ],
                    'id' => $this->get_id(),
                    'data-nav' => $settings['nav_position'],
                    'data-autoplay' => $settings['autoplay'],
                    'data-centered' => 'off',
                    'data-mousewheel' => $settings['mousewheel'],
                    'data-simulatetouch' => $settings['simulatetouch'],
                    'data-grabcursor' => $settings['grabcursor'],
                    'data-effect' => $settings['effect'],
                    'data-direction' => 'horizontal',
                    'data-loop' => $settings['loop'],
                    'data-spv' => '1',
                    'data-spv-t' => '1',
                    'data-spv-m' => '1',
                    'data-space' => '0',
                    'data-space-t' => '0',
                    'data-space-m' => '0',
                    'data-speed' => $settings['speed'],
                ] );

            break;

            case 'slide':

                $data_parallax = $settings['data_parallax']['size'] . $settings['data_parallax']['unit'];
                $data_parallax_content = $settings['data_parallax_content']['size'] . $settings['data_parallax_content']['unit'];

                $this->add_render_attribute( 'slider-wrap', [
                    'class' => [ 'ms-slider' ],
                    'id' => $this->get_id(),
                    'data-nav' => $settings['nav_position'],
                    'data-autoplay' => $settings['autoplay'],
                    'data-centered' => 'off',
                    'data-mousewheel' => $settings['mousewheel'],
                    'data-simulatetouch' => $settings['simulatetouch'],
                    'data-grabcursor' => $settings['grabcursor'],
                    'data-effect' => $settings['effect'],
                    'data-direction' => $settings['direction'],
                    'data-loop' => $settings['loop'],
                    'data-spv' => '1',
                    'data-spv-t' => '1',
                    'data-spv-m' => '1',
                    'data-space' => '0',
                    'data-space-t' => '0',
                    'data-space-m' => '0',
                    'data-speed' => $settings['speed'],
                ] );

            break;

            case 'carousel':
                if (isset($settings['slidesPerView_tablet']['size'])) {
                    $spv_t = $settings['slidesPerView_tablet']['size'];
                } else {
                    $spv_t = '1';
                }
                if (isset($settings['slidesPerView_mobile']['size'])) {
                    $spv_m = $settings['slidesPerView_mobile']['size'];
                } else {
                    $spv_m = '1';
                }
                if (isset($settings['spaceBetween_tablet']['size'])) {
                    $sbt_t = $settings['spaceBetween_tablet']['size'];
                } else {
                    $sbt_t = '0';
                }
                if (isset($settings['spaceBetween_mobile']['size'])) {
                    $sbt_m = $settings['spaceBetween_mobile']['size'];
                } else {
                    $sbt_m = '0';
                }

                $data_parallax = null;
                $data_parallax_content = null;
                $this->add_render_attribute( 'slider-wrap', [
                    'class' => [ 'ms-slider' ],
                    'id' => $this->get_id(),
                    'data-nav' => $settings['nav_position'],
                    'data-autoplay' => $settings['autoplay'],
                    'data-centered' => $settings['centered'],
                    'data-mousewheel' => $settings['mousewheel'],
                    'data-simulatetouch' => $settings['simulatetouch'],
                    'data-grabcursor' => $settings['grabcursor'],
                    'data-effect' => 'slide',
                    'data-direction' => 'horizontal',
                    'data-loop' => $settings['loop'],
                    'data-spv' => $settings['slidesPerView']['size'],
                    'data-spv-t' => $spv_t,
                    'data-spv-m' => $spv_m,
                    'data-space' => $settings['spaceBetween']['size'],
                    'data-space-t' => $sbt_t,
                    'data-space-m' => $sbt_m,
                    'data-speed' => $settings['speed'],
                ] );

            break;
        } ?>
       
        <div class="ms-swiper-content<?php echo $fl_carousel;?>">
            <div <?php echo $this->get_render_attribute_string( 'slider-wrap' ); ?>>
                <div class="swiper-wrapper<?php echo $ticker; ?>">
                
                    <?php foreach ( $settings[ 'slider_fs' ] as $index => $item ) : ?>
                        <?php if ( $settings['autoplay'] ) : ?>
                        <div class="swiper-slide" data-swiper-autoplay="<?php echo $settings['delay']; ?>">
                        <?php else: ?>
                        <div class="swiper-slide">
                        <?php endif; ?>
                            <div class="slide-inner" data-swiper-parallax="<?php echo $data_parallax;?>">
                            <?php if ( !empty( $item['slide_link']['url'] ) ) : ?>
                                    <a href="<?php echo $item['slide_link']['url']; ?>" class="ms-slider--link"></a>
                                <?php endif; ?>

                                <?php if ( $item['slide_type'] == 'image' ) : ?>
                                    <div class="ms-slider--img">
                                        <?php echo Group_Control_Image_Size::get_attachment_image_html( $item, 'slide_img' ); ?>
                                    </div>
                                <?php endif; ?>
                                
                                <?php if ($item['slide_type'] == 'video') : ?>
                                    <div class="ms-slider--video">

                                        <?php if ( $item['slide_video_type'] === 'youtube') : ?>
                                            <div data-vbg-mobile="true" data-vbg-start-at="<?php echo $item['video_start']; ?>" data-vbg-end-at="<?php echo $item['video_end']; ?>" data-vbg="<?php echo $item['youtube_url']; ?>"></div>
                                        <?php endif; ?>

                                        <?php if ( $item['slide_video_type'] === 'vimeo') : ?>
                                            <div data-vbg-mobile="true" data-vbg-start-at="<?php echo $item['video_start']; ?>" data-vbg="<?php echo $item['vimeo_url']; ?>"></div>
                                        <?php endif; ?>

                                        <?php if ( $item['slide_video_type'] === 'hosted') : ?>
                                            <div data-vbg-mobile="true" video-background-mute data-vbg="<?php echo $item['hosted_url']['url']; ?>"></div>
                                        <?php endif; ?>

                                    </div>
                                <?php endif; ?>

                                <?php if ( !empty( $item[ 'content_template' ] ) ) : ?>
                                    <div class="ms-slider--cont" data-swiper-parallax="<?php echo $data_parallax_content;?>">
                                        <?php
                                            if ( 'publish' !== get_post_status( $item[ 'content_template' ] ) ) {
                                                return;
                                            }
                                            echo Plugin::instance()->frontend->get_builder_content_for_display( $item[ 'content_template' ], true );
                                        ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ( $item[ 'content_select' ] == 'default' ) : ?>

                                    <?php if ( !empty( $item[ 'content_select' ] ) ) : ?>

                                        <div class="ms-slider--cont" data-swiper-parallax="<?php echo $data_parallax_content;?>">
                                            <div class="ms-cont__inner">

                                                <?php if ( $item['content_subtitle'] ) : ?>
                                                    <h3 class="ms-sc--st"><?php echo $item['content_subtitle']; ?></h3>
                                                <?php endif; ?>

                                                <?php if ( $item['content_title'] ) : ?>
                                                    <h1 class="ms-sc--t"><?php echo wp_kses_post($item['content_title']); ?></h1>
                                                <?php endif; ?>
                                                
                                                <?php if ( $item['content_desc'] ) : ?>
                                                    <p class="ms-sc--desc"><?php echo $item['content_desc']; ?></p>
                                                <?php endif; ?>

                                                <?php if ( $item['content_link_title'] ) : ?>
                                                    <a class="ms-sc--l text" href="<?php echo $item['content_link']['url']; ?>">
                                                        <?php echo $item['content_link_title']; ?>
                                                    </a>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                    <?php endif; ?>

                                <?php endif; ?>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if ( $settings['nav_position'] ) : ?>
                    <div class="ms-slider--nav nav-size--<?php echo $settings['nav_size'];?>">
                        <div class="ms-nav--next">
                            <svg class="i-arrow" viewBox="0 0 17 12">
                                <path d="M1,6h14"></path>
                                <path d="M12,1l4,5"></path>
                                <path d="M12,11l4-5"></path>
                            </svg>
                        </div>
                        <div class="ms-nav--prev">
                            <svg class="i-arrow" viewBox="0 0 17 12">
                                <path d="M1,6h14"></path>
                                <path d="M12,1l4,5"></path>
                                <path d="M12,11l4-5"></path>
                            </svg>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ( $settings['progressbar'] == 'on' ) : ?>
                    <div class="ms-slider--progress <?php echo $settings['progress_position']?>">
                        <div class="ms-slider--pagination"></div>
                        <div class="ms-slider--count"></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
		<?php if ( Plugin::$instance->editor->is_edit_mode() ) : ?>
			<script>			
                jQuery('[data-vbg]').youtube_background({
                    'mute-button': true,
                });
			</script>
		<?php endif;
    }

}