<?php
namespace Elementor;

class Widget_MS_Testimonial extends Widget_Base {
    
    public function get_name() {
        return 'ms_testimonial';
    }
    
    public function get_title() {
        return 'Testimonial';
    }
    
    public function get_icon() {
        return 'eicon-review ms-badge';
    }
    
    public function get_categories() {
        return [ 'ms-elements' ];
    }
    
    public function get_keywords() {
        return [ 'testimonial', 'review', 'blockquote', 'carousel' ];
    }

    protected function register_controls() {

        $first_level = 0;

        $this->start_controls_section(
            'content_section', [
                'label' => __( 'Testimonial', 'madsparrow' ),
                'tab' => Controls_Manager::TAB_CONTENT,
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
            'avatar', [
                'label' => __( 'Author Avatar', 'madsparrow' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(), [
                'name' => 'avatar', 
            ]
        );

        $repeater->add_control(
            'author_name', [
                'label' => __( 'Author Name', 'madsparrow' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Name', 'madsparrow' ),
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'function', [
                'label' => __( 'Author Position', 'madsparrow' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __( 'Position', 'madsparrow' ),
                'separator' => 'before',
            ]
        );

        $repeater->add_control(
            'review_text', [
                'label' => __( 'Review Text', 'madsparrow' ),
                'type' => Controls_Manager::TEXTAREA,
                'rows' => 10,
                'placeholder' => __( 'Type your blockquote here', 'madsparrow' ),
                'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'madsparrow' ),
            ]
        );

        $this->add_control(
            'reviews', [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'avatar' => 'avatar',
                        'author_name' => 'Author',
                        'function' => 'Position',
                        'blockquote' => 'Review text',
                    ],
                ],
                'title_field' => '{{author_name}}',
            ]
        );

        $this->end_controls_section();

        // TAB CONTENT
        $this->start_controls_section(
            'section_' . $first_level++, [
                'label' => esc_html__( 'Content', 'madsparrow' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'review_style', [
                'label' => __( 'Style', 'madsparrow' ),
                'type' => Controls_Manager::SELECT,
                'default' => 's_1',
                'options' => [
                    's_1'  => __( 'Style 1', 'madsparrow' ),
                    's_2' => __( 'Style 2', 'madsparrow' ),
                    's_3' => __( 'Style 3', 'madsparrow' ),
                ],
            ]
        );

        $this->add_control(
            'alignment', [
                'label' => __( 'Alignment', 'madsparrow' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'center',
                'options' => [
                    'left'  => __( 'Left', 'madsparrow' ),
                    'center'  => __( 'Center', 'madsparrow' ),
                    'right' => __( 'Right', 'madsparrow' ),
                ],
                'condition' => [
                    'review_style' => 's_2',
                ],
            ]
        );

        $this->add_control(
            'content_space', [
                'label' =>esc_html__( 'Space Between', 'madsparrow' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'default' => [
                    'unit' => 'px',
                    'size' => 50,
                    ],
                ],               
                'selectors' => [
                    '{{WRAPPER}} .ms-rb .ms-rb--avatar' => 'margin-right: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'review_style' => 's_1',
                ],
            ]
        );

        $this->add_control(
            'cont_padding',
            [
                'label' => __( 'Padding', 'madsparrow' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ms-rb-rc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(), [
                'name' => 'content_border',
                'label' => __( 'Border', 'madsparrow' ),
                'selector' => '{{WRAPPER}} .ms-rb-rc',
            ]
        );

        $this->add_control(
            'content_radius', [
                'label' => __( 'Border Radius', 'madsparrow' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ms-rb-rc' => 'border-top-left-radius: {{TOP}}{{UNIT}} {{TOP}}{{UNIT}}; border-top-right-radius: {{RIGHT}}{{UNIT}} {{RIGHT}}{{UNIT}}; border-bottom-right-radius: {{BOTTOM}}{{UNIT}} {{BOTTOM}}{{UNIT}}; border-bottom-left-radius: {{LEFT}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .ms-rb--text',
                'separator' => 'after',
            ]
        );

        $this->add_control(
            'icon_quote', [
                'label' => __( 'Icon', 'madsparrow' ),
                'type' => Controls_Manager::SWITCHER,
                'true' => __( 'On', 'madsparrow' ),
                'false' => __( 'Off', 'madsparrow' ),
                'return_value' => 'on',
                'default' => 'on',
            ]
        );

        $this->add_control(
            'icon_size', [
                'label' => __( 'Size', 'madsparrow' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 36,
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-quote' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_' . $first_level++, [
                'label' => esc_html__( 'Avatar', 'madsparrow' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(), [
                'name' => 'border',
                'label' => __( 'Border', 'madsparrow' ),
                'selector' => '{{WRAPPER}} .ms-rb--avatar_sm img, .ms-rb--avatar img',
            ]
        );

        $this->add_control(
            'border_radius', [
                'label' => __( 'Border Radius', 'madsparrow' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ms-rb--avatar_sm img' => 'border-top-left-radius: {{TOP}}{{UNIT}} {{TOP}}{{UNIT}}; border-top-right-radius: {{RIGHT}}{{UNIT}} {{RIGHT}}{{UNIT}}; border-bottom-right-radius: {{BOTTOM}}{{UNIT}} {{BOTTOM}}{{UNIT}}; border-bottom-left-radius: {{LEFT}}{{UNIT}} {{LEFT}}{{UNIT}};', '{{WRAPPER}} .ms-rb--avatar img' => 'border-top-left-radius: {{TOP}}{{UNIT}} {{TOP}}{{UNIT}}; border-top-right-radius: {{RIGHT}}{{UNIT}} {{RIGHT}}{{UNIT}}; border-bottom-right-radius: {{BOTTOM}}{{UNIT}} {{BOTTOM}}{{UNIT}}; border-bottom-left-radius: {{LEFT}}{{UNIT}} {{LEFT}}{{UNIT}};', 
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_' . $first_level++, [
                'label' => esc_html__( 'Colors', 'madsparrow' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'bg_color', [
                'label' => esc_html__( 'Background', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ms-rb-rc' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'name_color', [
                'label' => esc_html__( 'Name', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ms-rb--name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'function_color', [
                'label' => esc_html__( 'Position', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ms-rb--function' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'text_color', [
                'label' => esc_html__( 'Text', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ms-rb--text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_color', [
                'label' => esc_html__( 'Icon', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ms-rb .ms-rb-rc .ms-rb--quote .icon-quote' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'nav_bg_color', [
                'label' => esc_html__( 'Navigation', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',
                'selectors' => [
                    '{{WRAPPER}} .ms-rb-btn-next, .ms-rb-btn-prev' => 'background-color: {{VALUE}};', '{{WRAPPER}} .ms-rb-btn-prev' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'nav_icon_color', [
                'label' => esc_html__( 'Icon', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ms-rb-btn-next svg' => 'fill: {{VALUE}};', '{{WRAPPER}} .ms-rb-btn-prev svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'nav_dots_color', [
                'label' => esc_html__( 'Bullet', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ms-rb .ms-rb-db .swiper-pagination-bullet' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_' . $first_level++, [
                'label' => esc_html__( 'Slider Options', 'madsparrow' ),
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
            'delay', [
                'label' => __( 'Autoplay Delay', 'madsparrow' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1000,
                'max' => 10000,
                'step' => 1000,
                'default' => 1000,
                'condition' => [
                    'autoplay' => 'on',
                ],
            ]
        );

        $this->add_control(
            'loop', [
                'label' => __( 'Loop', 'madsparrow' ),
                'type' => Controls_Manager::SWITCHER,
                'true' => __( 'On', 'madsparrow' ),
                'false' => __( 'Off', 'madsparrow' ),
                'return_value' => 'on',
                'default' => 'on',
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
                ],
            ]
        );

        $this->add_control(
            'slidesPerView', [
                'label' => __( 'Slides Per View', 'madsparrow' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 4,
                'step' => 1,
                'default' => 1,
                'condition' => [
                    'effect' => 'slide',
                    'review_style' => 's_2',
                ],
            ]
        );

        $this->add_control(
            'slides_gap', [
                'label' => __( 'Gap', 'madsparrow' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 30,
                ],
                'condition' => [
                    'effect' => 'slide',
                    'review_style' => 's_2',
                ],
            ]
        );

        $this->add_control(
            'button_background_blur', [
                'label' =>esc_html__( 'Navigation Blur', 'madsparrow' ),
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
                    '{{WRAPPER}} .ms-rb-btn-next, .ms-rb-btn-prev' => 'backdrop-filter: blur({{SIZE}}{{UNIT}})', '{{WRAPPER}} .ms-rb-btn-prev' => 'backdrop-filter: blur({{SIZE}}{{UNIT}});',
                ],
                'condition' => [
                    'review_style' => 's_1',
                ],
            ]
        );

        $this->add_control(
            'btnp_radius', [
                'label' => __( 'Button Prev Border Radius', 'madsparrow' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ms-rb .ms-rb-fr .ms-rb-btn-prev' => 'border-top-left-radius: {{TOP}}{{UNIT}} {{TOP}}{{UNIT}}; border-top-right-radius: {{RIGHT}}{{UNIT}} {{RIGHT}}{{UNIT}}; border-bottom-right-radius: {{BOTTOM}}{{UNIT}} {{BOTTOM}}{{UNIT}}; border-bottom-left-radius: {{LEFT}}{{UNIT}} {{LEFT}}{{UNIT}};','{{WRAPPER}} .ms-rb .ms-rb-fr .ms-rb-btn-next' => 'border-top-left-radius: {{TOP}}{{UNIT}} {{TOP}}{{UNIT}}; border-top-right-radius: {{RIGHT}}{{UNIT}} {{RIGHT}}{{UNIT}}; border-bottom-right-radius: {{BOTTOM}}{{UNIT}} {{BOTTOM}}{{UNIT}}; border-bottom-left-radius: {{LEFT}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'review_style' => 's_1',
                ],
            ]
        );

        $this->end_controls_section();  

        }
            
        protected function render() {

            $settings = $this->get_settings_for_display();

            $slide_gap = isset($settings['slides_gap']['size']) ? $settings['slides_gap']['size'] : 30;

            $this->add_render_attribute(
                'review_block',
                [
                    'class' => [ 'ms-rb', $settings['review_style'], $settings['alignment']  ],
                    'data-autoplay' => $settings['autoplay'],
                    'data-effect' => $settings['effect'],
                    'data-loop' => $settings['loop'],
                    'data-slides' => $settings['slidesPerView'],
                    'data-gap' => $slide_gap,
                ]
            ); ?>

            <div <?php echo $this->get_render_attribute_string( 'review_block' ); ?>>
                <div class="swiper-wrapper" id="<?php echo $this->get_id(); ?>">
                    <?php foreach ( $settings[ 'reviews' ] as $index => $item ) : ?>
                        <div class="swiper-slide" data-swiper-autoplay="<?php echo $settings['delay']; ?>">
                        <?php if ( $settings['review_style'] == 's_1' || $settings['review_style'] == 's_2') : ?>
                            <?php if ( $settings['review_style'] == 's_1' ) : ?>
                                <?php if ( ! empty( $item['avatar']['url'] ) ) : ?>
                                    <div class="ms-rb--avatar">
                                        <?php echo Group_Control_Image_Size::get_attachment_image_html( $item, 'avatar' ); ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="ms-rb-rc">
                                <div class="ms-rb--quote">
                                    <svg class="icon-quote" viewBox="0 0 289 223" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M133.013 164.256C133.044 172.092 131.421 179.841 128.253 186.974C125.086 194.108 120.45 200.455 114.663 205.583C102.245 217.184 85.9251 223.417 69.1194 222.978C47.7849 222.978 30.9398 215.377 18.5844 200.173C6.24183 185.056 -0.352578 165.884 0.0145426 146.185C0.0145426 99.0222 12.6514 63.531 37.925 39.7116C63.1986 15.8922 91.1757 2.70508 121.856 0.150312V51.8843C106.395 53.57 91.7584 59.8667 79.7622 69.993C73.5885 74.7216 68.5027 80.7785 64.8631 87.7371C61.2235 94.6957 59.1186 102.387 58.6968 110.268C63.7922 107.727 69.3973 106.441 75.0647 106.511C93.3899 106.511 107.629 111.834 117.783 122.478C122.912 128.053 126.901 134.62 129.516 141.794C132.132 148.968 133.321 156.605 133.013 164.256ZM288.985 164.256C289.024 172.093 287.403 179.845 284.236 186.979C281.068 194.113 276.428 200.46 270.635 205.583C258.217 217.184 241.897 223.417 225.092 222.978C203.806 222.978 187.096 215.377 174.96 200.173C162.766 184.984 156.26 165.843 156.611 146.185C156.611 99.0222 169.113 63.531 194.117 39.7116C219.122 15.8922 247.062 2.65495 277.939 0V51.734C262.512 53.4849 247.926 59.8338 235.991 69.993C229.771 74.6936 224.64 80.7393 220.961 87.7003C217.282 94.6612 215.146 102.366 214.706 110.268C219.788 107.726 225.381 106.44 231.037 106.511C249.338 106.511 263.577 111.834 273.755 122.478C278.884 128.051 282.871 134.618 285.481 141.794C288.09 148.969 289.269 156.607 288.948 164.256H288.985Z" fill="#F3F5F7"/>
                                    </svg>
                                </div>
                                <div class="ms-rb--text"><?php echo $item['review_text']; ?></div>
                                <div class="ms-rb-footer">
                                <?php if ( $settings['review_style'] == 's_2' ) : ?>
                                    <?php if ( ! empty( $item['avatar']['url'] ) ) : ?>
                                        <div class="ms-rb--avatar_sm">
                                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $item, 'avatar' ); ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                    <div class="ms-rb-fl">
                                        <?php if ( ! empty( $item['author_name'] ) ) : ?>
                                            <p class="ms-rb--name"><?php echo $item['author_name']; ?></p>
                                        <?php endif; ?>
                                        <?php if ( ! empty( $item['function'] ) ) : ?>
                                            <div class="ms-rb--function"><?php echo $item['function']; ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if ( $settings['review_style'] == 's_3' ) : ?>
                                <div class="ms-rb-rc">

                                    <div class="ms-rb-lc">
                                        <div class="ms-rb-info">
                                            <?php if ( ! empty( $item['author_name'] ) ) : ?>
                                                <h3 class="ms-rb--name"><?php echo $item['author_name']; ?></h3>
                                            <?php endif; ?>
                                            <?php if ( ! empty( $item['function'] ) ) : ?>
                                                <div class="ms-rb--function"><?php echo $item['function']; ?></div>
                                            <?php endif; ?>
                                            <div class="ms-rb--quote">
                                                <svg class="icon-quote" viewBox="0 0 289 223" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M133.013 164.256C133.044 172.092 131.421 179.841 128.253 186.974C125.086 194.108 120.45 200.455 114.663 205.583C102.245 217.184 85.9251 223.417 69.1194 222.978C47.7849 222.978 30.9398 215.377 18.5844 200.173C6.24183 185.056 -0.352578 165.884 0.0145426 146.185C0.0145426 99.0222 12.6514 63.531 37.925 39.7116C63.1986 15.8922 91.1757 2.70508 121.856 0.150312V51.8843C106.395 53.57 91.7584 59.8667 79.7622 69.993C73.5885 74.7216 68.5027 80.7785 64.8631 87.7371C61.2235 94.6957 59.1186 102.387 58.6968 110.268C63.7922 107.727 69.3973 106.441 75.0647 106.511C93.3899 106.511 107.629 111.834 117.783 122.478C122.912 128.053 126.901 134.62 129.516 141.794C132.132 148.968 133.321 156.605 133.013 164.256ZM288.985 164.256C289.024 172.093 287.403 179.845 284.236 186.979C281.068 194.113 276.428 200.46 270.635 205.583C258.217 217.184 241.897 223.417 225.092 222.978C203.806 222.978 187.096 215.377 174.96 200.173C162.766 184.984 156.26 165.843 156.611 146.185C156.611 99.0222 169.113 63.531 194.117 39.7116C219.122 15.8922 247.062 2.65495 277.939 0V51.734C262.512 53.4849 247.926 59.8338 235.991 69.993C229.771 74.6936 224.64 80.7393 220.961 87.7003C217.282 94.6612 215.146 102.366 214.706 110.268C219.788 107.726 225.381 106.44 231.037 106.511C249.338 106.511 263.577 111.834 273.755 122.478C278.884 128.051 282.871 134.618 285.481 141.794C288.09 148.969 289.269 156.607 288.948 164.256H288.985Z" fill="#F3F5F7"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <?php if ( ! empty( $item['avatar']['url'] ) ) : ?>
                                        <div class="ms-rb--avatar_sm">
                                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $item, 'avatar' ); ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="ms-rb--text"><?php echo $item['review_text']; ?></div>

                                </div>

                            <?php endif; ?>
                            
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if ( $settings['review_style'] == 's_1' ) : ?>
                    <div class="ms-rb-fr">
                        <div class="ms-rb-btn-prev">
                            <svg width="32" height="32" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path d="M20 6.996a1 1 0 01.71.29 1 1 0 010 1.42l-7.3 7.29 7.3 7.29a1.004 1.004 0 11-1.42 1.42l-8-8a1 1 0 010-1.42l8-8a1 1 0 01.71-.29z"/>
                                    <path stroke-width="none" stroke="none" fill="none" d="M8.911 6.206v7.907"/>
                                </g>
                            </svg>
                        </div>
                        <div class="ms-rb-btn-next">
                            <svg width="32" height="32" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path d="M12 25a1 1 0 01-.71-.29 1 1 0 010-1.42l7.3-7.29-7.3-7.29a1 1 0 111.42-1.42l8 8a1 1 0 010 1.42l-8 8A1 1 0 0112 25z"/>
                                    <path stroke-width="none" stroke="none" fill="none" d="M8.911 6.206v7.907"/>
                                </g>
                            </svg>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ( count($settings[ 'reviews' ]) > 1 ) : ?>
                    <div class="ms-rb-db"></div>
                <?php endif; ?>
            </div>
                          
        <?php  }

}