<?php
namespace Elementor;

class Widget_MS_Contact_Form extends Widget_Base {
    
    use \MS_Elementor\Traits\Helper;

    public function get_name() {
        return 'ms-contact-form-7';
    }
    
    public function get_title() {
        return 'Contact Form 7';
    }
    
    public function get_icon() {
        return 'eicon-form-horizontal ms-badge';
    }
    
    public function get_categories() {
        return [ 'ms-elements' ];
    }

    public function get_keywords() {
        return [ 'contact', 'form', '7', 'mail' ];
    }

    protected function register_controls() {
        
        $first_level = 0;

        if ( ! class_exists( 'WPCF7_ContactForm' ) ) {

            // TAB CONTENT
            $this->start_controls_section(
                'section_' . $first_level++, [
                    'label' => esc_html__( 'Warning!', 'madsparrow' ),
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

            // Contact Form 7 Not Installer/Activated
            $this->add_control(
                'notification_' . $first_level++, [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => '<strong>Contact Form 7</strong> is not installed/activated on your site. Please install and activate <strong>Contact Form 7</strong> first.',
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
                    'separator' => 'after',
                ]
            );

        } else {

            // TAB CONTENT
            $this->start_controls_section(
                'section_' . $first_level++, [
                    'label' => esc_html__( 'Contact Form 7', 'madsparrow' ),
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
                'contact_form', [
                    'label' => esc_html__( 'Select Form', 'madsparrow' ),
                    'type' => Controls_Manager::SELECT2,
                    'options' => $this->ms_get_contact_form_7(),
                    'default' => 0
                ]
            );

            $this->add_control(
                'contact_align', [
                    'label' => __( 'Button Alignment', 'madsparrow' ),
                    'type' => Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'madsparrow' ),
                            'icon' => 'eicon-text-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'madsparrow' ),
                            'icon' => 'eicon-text-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'madsparrow' ),
                            'icon' => 'eicon-text-align-right',
                        ],
                    ],
                    'default' => 'left',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .ms-cf--bottom' => 'text-align: {{VALUE}}',
                    ],
                ]
            );

            $this->end_controls_section();

        }

    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( [
            'contact-form-7' => [
                'class' => [
                    'ms-contact-form-7'
                ]
            ]
        ] );

        ?>

        <div <?php echo $this->get_render_attribute_string( 'contact-form-7' ); ?>>

            <?php
                if ( ! empty( $settings[ 'contact_form' ] ) ) {
                    echo do_shortcode( '[contact-form-7 id="' . $settings[ 'contact_form' ] . '" ]' );
                }
            ?>

        </div>

        <?php

    }

}

