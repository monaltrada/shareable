<?php

/**
 * @author: madsparrow
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_MS_Hero_Style extends Widget_Base {
    
    use \MS_Elementor\Traits\Helper;

    public function get_name() {
        return 'ms-hero';
    }
    
    public function get_title() {
        return esc_html__( 'Hero Section', 'madsparrow' );
    }
    
    public function get_icon() {
        return 'eicon-archive-title ms-badge';
    }
    
    public function get_categories() {
        return [ 'ms-elements' ];
    }
    
    public function get_keywords() {
        return [ 'parallax', 'hero', 'header', 'title' ];
    }

    protected function register_controls() {

        $first_level = 0;

        // TAB CONTENT
        $this->start_controls_section(
            'section_size', [
                'label' => __( 'Hero Section', 'madsparrow' ),
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
            'content_type', [
                'label' => __( 'Content Type', 'madsparrow' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'text',
                'options' => [
                    'text'  => __( 'Text', 'madsparrow' ),
                    'cont_template'  => __( 'Content Template', 'madsparrow' ),
                ],
            ]
        );

        $this->add_control(
            'content_template', [
                'label' => esc_html__( 'Content', 'madsparrow' ),
                'type' => Controls_Manager::SELECT2,
                'options' => $this->ms_get_elementor_templates(),
                'label_block' => true,
                'condition' => [
                    'content_type' => 'cont_template',
                ],
            ]
        );

        $this->add_control(
            'title', [
                'label' => __( 'Title', 'madsparrow' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your title', 'madsparrow' ),
                'condition' => [
                    'content_type' => 'text',
                ],
            ]
        );

        $this->add_control(
            'subtitle', [
                'label' => __( 'Subtitle', 'madsparrow' ),
                'description' => __( 'Use <strong> br </strong> tag for line break.', 'madsparrow' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 5,
                'placeholder' => __( 'Enter your sub-title', 'madsparrow' ),
                'condition' => [
                    'content_type' => 'text',
                ],
            ]
        );

        $this->add_control(
            'heading_' . $first_level++, [
                'label' => __( 'Background', 'madsparrow' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'background_style', [
                'label' => __( 'Style', 'madsparrow' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'parallax',
                'options' => [
                    'default'  => __( 'Default', 'madsparrow' ),
                    'parallax' => __( 'Parallax Effect', 'madsparrow' ),
                ],
            ]
        );

        $this->add_control(
            'background_type', [
                'label' => __( 'Type', 'madsparrow' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'image',
                'options' => [
                    'image'  => __( 'Image', 'madsparrow' ),
                    'video' => __( 'Video', 'madsparrow' ),
                ],
                'condition' => [
                    'background_style' => 'parallax',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(), [
                'name' => 'background',
                'label' => __( 'Background', 'madsparrow' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .hero-image',
                'condition' => [
                    'background_style' => 'default',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'parallax_image', [
                'label' => __( 'Choose Image', 'madsparrow' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'background_style' => 'parallax',
                    'background_type' => 'image',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'video_link', [
                'label' => __( 'Video Link', 'madsparrow' ),
                'description' => __( 'YouTube/Vimeo link, or link to video file (MP4 is recommended).', 'madsparrow' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'https://www.youtube.com/watch?v=XHOmBV4js_E', 'madsparrow' ),
                'condition' => [
                    'background_style' => 'parallax',
                    'background_type' => 'video',
                ]
            ]

        );

        $this->end_controls_section();

        // TAB CONTENT
        $this->start_controls_section(
            'section_', [
                'label' => esc_html__( 'Style', 'madsparrow' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'height', [
                'label' => __( 'Height', 'madsparrow' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'vh', 'em' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
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
                    '{{WRAPPER}} .ms-hero' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'speed',
            [
                'label' => __( 'Speed', 'madsparrow' ),
                'type' => Controls_Manager::NUMBER,
                'description' => __( 'Parallax effect speed. Provide numbers from -1.0 to 2.0.', 'madsparrow' ),
                'min' => 0,
                'max' => 2,
                'step' => 0.1,
                'default' => 0.7,
                'condition' => [
                    'background_style' => 'parallax',
                ],
            ]
        );

        $this->add_control(
            'type', [
                'label' => __( 'Type', 'madsparrow' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'scroll',
                'options' => [
                    'scroll'  => __( 'Scroll', 'madsparrow' ),
                    'scale' => __( 'Scale', 'madsparrow' ),
                    'opacity' => __( 'Opacity', 'madsparrow' ),
                    'scroll-opacity' => __( 'Scroll-opacity', 'madsparrow' ),
                    'scale-opacity' => __( 'Scale-opacity', 'madsparrow' ),
                ],
            ]
        );        

        $this->add_control(
            'overlay', [
                'label' => esc_html__( 'Overlay', 'madsparrow' ),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'no',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'overlay_color', [
                'label' => __( 'Color Overlay', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .hero-overlay' => 'background-color: {{VALUE}}',
                ],
                'condition' => [
                    'overlay' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(

            'content_' . $first_level++, [
                'label' => __( 'Content', 'madsparrow' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        
        );

        $this->add_responsive_control(
            'content_width', [
                'label' => __( 'Width', 'madsparrow' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1600,
                        'step' => 5,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 1240,
                ],
                'selectors' => [
                    '{{WRAPPER}} .ms-hc' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'position_' . $first_level++, [
                'label' => esc_html__( 'Position', 'madsparrow' ),
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
                    '{{WRAPPER}} .ms-hero' => 'align-items: {{VALUE}}',
                ],
                'default' => 'center',
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
                'selectors' => [
                    '{{WRAPPER}} .ms-hc ' => 'text-align: {{VALUE}}',
                ],
                'default' => 'left',
                'condition' => [
                    'content_type' => 'text',
                ],
            ]
        );

        $this->add_responsive_control(
            'margin' . $first_level++, [
                'label' => __( 'Margin', 'madsparrow' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em', 'vh' ],
                'selectors' => [
                    '{{WRAPPER}} .ms-hero .ms-hc .ms-hc--inner' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'padding' . $first_level++, [
                'label' => __( 'Padding', 'madsparrow' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ms-hero .ms-hc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'heading_' . $first_level++, [
                'label' => __( 'Title', 'madsparrow' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'content_type' => 'text',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'title_typography',
                'label' => __( 'Typography', 'madsparrow' ),
                'selector' => '{{WRAPPER}} .ms-hero-title',
                'condition' => [
                    'content_type' => 'text',
                ],
            ]
        );

        $this->add_control(
            'title_color', [
                'label' => __( 'Color', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ms-hero-title' => 'color: {{VALUE}} !important',
                ],
                'condition' => [
                    'content_type' => 'text',
                ],
            ]
        );

        $this->add_control(
            'heading_' . $first_level++, [
                'label' => __( 'Subtitle', 'madsparrow' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'content_type' => 'text',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'sub_typography',
                'label' => __( 'Typography', 'madsparrow' ),
                'selector' => '{{WRAPPER}} .ms-hero-subtitle',
                'condition' => [
                    'content_type' => 'text',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color', [
                'label' => esc_html__( 'Color', 'vlthemes' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ms-hero-subtitle' => 'color: {{VALUE}};',
                ],
                'condition' => [
                    'content_type' => 'text',
                ],
            ]
        );

        $this->end_controls_section();

    }
    
    protected function render() {

        $settings = $this->get_settings_for_display();

        $speed = $settings['speed'];
        $type = $settings['type'];

        $this->add_render_attribute( 'hero_content', [
            'class' => [ 'ms-hero' ],
            'id' => $this->get_id(),
        ] );

        ?>

        <section <?php echo $this->get_render_attribute_string( 'hero_content' ); ?>>

            <?php if ( $settings[ 'overlay' ] === 'yes' ) : ?>
                <div class="hero-overlay"></div>
            <?php endif; ?>

            <?php if ( $settings[ 'background_style' ] === 'parallax' ) : ?>
                <div class="ms-parallax" data-speed="<?php echo $speed; ?>" data-type="<?php echo $type; ?>">
                    <?php if ( $settings[ 'background_type' ] === 'image' ) : ?>
                        <img class="jarallax-img" src="<?php echo $settings['parallax_image']['url'] ?>" alt="">
                    <?php endif; ?>
                    <?php if ( $settings[ 'background_type' ] === 'video' ) : ?>
                        <div class="jarallax-img" data-jarallax-video="<?php echo $settings[ 'video_link' ]; ?>"></div>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <div class="hero-image"></div>
            <?php endif; ?>

            <?php if ( $settings['content_type'] === 'text' ) : ?>

                <?php if ( ! empty( $settings[ 'title' ] or !empty( $settings['subtitle'] ) ) ) : ?>

                    <div class="ms-hc">
                        <div class="ms-hc--inner">
                            <?php if ( ! empty( $settings[ 'title' ] ) ) : ?>
                                <h1 class="ms-hero-title"><?php echo $settings['title']; ?></h1>
                            <?php endif; ?>
                            <?php if ( ! empty( $settings[ 'subtitle' ] ) ) : ?>
                                <p class="ms-hero-subtitle"><?php echo $settings['subtitle']; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                <?php endif; ?>

                <?php else: ?>

                    <?php if ( !empty( $settings[ 'content_template' ] ) ) : ?>
                        <div class="ms-hc">
                            <?php
                                if ( 'publish' !== get_post_status( $settings[ 'content_template' ] ) ) {
                                    return;
                                }
                                echo Plugin::instance()->frontend->get_builder_content_for_display( $settings[ 'content_template' ], true );
                            ?>
                        </div>
                    <?php endif; ?>

            <?php endif; ?>

            <?php if ( Plugin::$instance->editor->is_edit_mode() ) : ?>
                <script>
                    var el_id = jQuery('#<?php echo $this->get_id(); ?>'),
                        el = el_id.find('.ms-parallax');
                        video = el.find('.jarallax-img').attr('data-jarallax-video');
                        el.jarallax({ videoSrc: video });
                </script>
            <?php endif; ?>

        </section>

    <?php
    }
    
}

