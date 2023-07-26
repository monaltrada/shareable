<?php

/**
 * @author: Mad Sparrow
 * @version: 1.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_MS_Posts extends Widget_Base {

	use \MS_Elementor\Traits\Helper;

	public function get_name() {
		return 'ms_posts';
	}

	public function get_title() {
		return esc_html__( 'Posts List', 'madsparrow' );
	}

	public function get_icon() {
		return 'eicon-post-list ms-badge';
	}

	public function get_categories() {
		return [ 'ms-elements' ];
	}

	public function get_keywords() {
		return [ 'posts', 'news', 'showcase', 'blog' ];
	}

	protected function register_controls() {

		$first_level = 0;

		// TAB CONTENT
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'General', 'madsparrow' ),
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
			'post_style', [
				'label' => esc_html__( 'Posts Style', 'madsparrow' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => esc_html__( 'Default', 'madsparrow' ),
					'list' => esc_html__( 'List', 'madsparrow' ),
					'card' => esc_html__( 'Card', 'madsparrow' ),
				],
			]
		);

		$this->add_control(
			'list_style', [
				'label' => esc_html__( 'List Order', 'madsparrow' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'order_1',
				'options' => [
					'order_1' => esc_html__( 'Order 1','madsparrow' ),
					'order_2' => esc_html__( 'Order 2','madsparrow' ),
					'order_3' => esc_html__( 'Order 3','madsparrow' ),
				],
				'condition' => [
					'post_style' => 'list',
				],
			]
		);

		$this->add_control(
			'show_excerpt_list', [
				'label' => __( 'Excerpt', 'madsparrow' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'madsparrow' ),
				'label_off' => __( 'Off', 'madsparrow' ),
				'return_value' => 'on',
				'default' => 'on',
				'separator' => 'before',
				'condition' => [
					'post_style' => 'list',
				],
			]
		);

		$this->add_control(
			'masonry_style', [
				'label' => esc_html__( 'Layout', 'madsparrow' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'grid',
				'options' => [
					'masonry' => esc_html__( 'Masonry','madsparrow' ),
					'grid' => esc_html__( 'Grid','madsparrow' ),
				],
				'condition' => [
					'post_style' => ['card']
				],
			]
		);

		$this->add_control(
			'show_by', [
				'label' => esc_html__( 'Show By', 'madsparrow' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'show_all',
				'options' => [
					'show_all' => esc_html__( 'Show All', 'madsparrow' ),
					'show_by_id' => esc_html__( 'Show By ID', 'madsparrow' ),
					'show_by_cat' => esc_html__( 'Show By Category', 'madsparrow' ),
				],
			]
		);

		$this->add_control(
			'post_id', [
				'label' => esc_html__( 'Select Post', 'madsparrow' ),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => $this->ms_get_post_name( 'post' ),
				'condition' => [
					'show_by' => 'show_by_id',
				],
			]
		);

		$this->add_control(
			'post_cat', [
				'label' => esc_html__( 'Select Category', 'madsparrow' ),
				'type' => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => $this->ms_get_taxonomies( 'category' ),
				'condition' => [
					'show_by' => 'show_by_cat',
				],
			]
		);

		$this->add_control(
			'columns_number', [
				'label' => esc_html__( 'Columns', 'madsparrow' ),
				'type' => Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 4,
				'step' => 1,
				'default' => 3,
				'separator' => 'before',
				'condition' => [
					'post_style' => ['card'],
				],
			]
		);

		$this->add_control(
			'max_posts', [
				'label' => esc_html__( 'Max Posts', 'madsparrow' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 9,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'custom_order', [
				'label' => esc_html__( 'Order', 'madsparrow' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'orderby', [
				'label' => esc_html__( 'Orderby', 'madsparrow' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
					'none' => esc_html__( 'None','madsparrow' ),
					'ID' => esc_html__( 'ID','madsparrow' ),
					'date' => esc_html__( 'Date','madsparrow' ),
					'name' => esc_html__( 'Name','madsparrow' ),
					'title' => esc_html__( 'Title','madsparrow' ),
					'comment_count' => esc_html__( 'Comment count','madsparrow' ),
					'rand' => esc_html__( 'Random','madsparrow' ),
				],
				'condition' => [
					'custom_order' => 'yes',
				],
			]
		);

		$this->add_control(
			'order', [
				'label' => esc_html__( 'Order', 'madsparrow' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'DESC' => esc_html__( 'Descending', 'madsparrow' ),
					'ASC' => esc_html__( 'Ascending', 'madsparrow' ),
				],
				'condition' => [
					'custom_order' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'show_pagination', [
				'label' => esc_html__( 'Show Pagination', 'madsparrow' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default' => 'no',
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// TAB CONTENT
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'General', 'madsparrow' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'post_style' => 'list',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'title_typography_list',
				'label' => __( 'Title Typography', 'madsparrow' ),
				'selector' => '{{WRAPPER}} .ms-posts--list .grid-item h2',
				'condition' => [
					'post_style' => 'list',
				],
			]
		);

		$this->end_controls_section();

		// TAB CONTENT
		$this->start_controls_section(
			'section_' . $first_level++, [
				'label' => esc_html__( 'General', 'madsparrow' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'post_style' => ['card'],
				],
			]
		);

		$this->add_control(
			'show_thumb', [
				'label' => __( 'Thumbnail', 'madsparrow' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'madsparrow' ),
				'label_off' => __( 'Off', 'madsparrow' ),
				'return_value' => 'on',
				'default' => 'on',
			]
		);

		$this->add_control(
			'thumb_border_radius', [
				'label' => __( 'Radius', 'madsparrow' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ms-posts--card .grid-item figure' => 'border-top-left-radius: {{TOP}}{{UNIT}} {{TOP}}{{UNIT}}; border-top-right-radius: {{RIGHT}}{{UNIT}} {{RIGHT}}{{UNIT}}; border-bottom-right-radius: {{BOTTOM}}{{UNIT}} {{BOTTOM}}{{UNIT}}; border-bottom-left-radius: {{LEFT}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'border_card!' => '',
					'show_thumb' => 'on',
					'post_style' => ['card'],
				],
			]
		);

		$this->add_control(
			'show_excerpt', [
				'label' => __( 'Excerpt', 'madsparrow' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'madsparrow' ),
				'label_off' => __( 'Off', 'madsparrow' ),
				'return_value' => 'on',
				'default' => 'on',
				'separator' => 'before',
				'condition' => [
					'post_style' => 'card',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), [
				'name' => 'title_typography_card',
				'label' => __( 'Title Typography', 'madsparrow' ),
				'selector' => '{{WRAPPER}} .ms-posts--card .grid-item .post-meta-cont h3',
				'separator' => 'before',
				'condition' => [
					'post_style' => 'card',
				],
			]
		);

		$this->add_control( 
			'padding', [
				'label' => esc_html__( 'Content Padding', 'madsparrow' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ms-posts--card .post-meta-cont' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'post_style' => 'card',
				],
			]
		);

		$this->add_control( 
			'border_card', [
				'label' => esc_html__( 'Border Type', 'Border Control', 'madsparrow' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => __( 'None', 'elementor' ),
					'solid' => esc_html__( 'Solid', 'Border Control', 'madsparrow' ),
					'double' => esc_html__( 'Double', 'Border Control', 'madsparrow' ),
					'dotted' => esc_html__( 'Dotted', 'Border Control', 'madsparrow' ),
					'dashed' => esc_html__( 'Dashed', 'Border Control', 'madsparrow' ),
				],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .ms-posts--card .post-meta-cont' => 'border-style: {{VALUE}};',
				],
				'condition' => [
					'post_style' => 'card',
				],
			]
		);

		$this->add_control( 
			'border_width', [
				'label' => esc_html__( 'Width', 'Border Control', 'madsparrow' ),
				'type' => Controls_Manager::DIMENSIONS,
				'selectors' => [
					'{{WRAPPER}} .ms-posts--card .post-meta-cont' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'border_card!' => '',
					'post_style' => 'card',
				],
			]
		);

		$this->add_control(
			'border_radius', [
				'label' => __( 'Radius', 'madsparrow' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .ms-posts--card .post-meta-cont' => 'border-top-left-radius: {{TOP}}{{UNIT}} {{TOP}}{{UNIT}}; border-top-right-radius: {{RIGHT}}{{UNIT}} {{RIGHT}}{{UNIT}}; border-bottom-right-radius: {{BOTTOM}}{{UNIT}} {{BOTTOM}}{{UNIT}}; border-bottom-left-radius: {{LEFT}}{{UNIT}} {{LEFT}}{{UNIT}};', 
				],
				'condition' => [
					'border_card!' => '',
					'post_style' => 'card',
				],
			]
		);

		$this->add_control( 
			'border_color', [
				'label' => esc_html__( 'Color', 'Border Control', 'madsparrow' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ms-posts--card .post-meta-cont' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'border_card!' => '',
					'post_style' => 'card',
				],
			]
		);

		$this->add_control( 
			'border_color_hover', [
				'label' => esc_html__( 'Hover Color', 'Border Control', 'madsparrow' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .ms-posts--card .post-meta-cont:hover' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'border_card!' => '',
					'post_style' => 'card',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		if ( $settings[ 'custom_order' ] == 'yes' ) {
			$orderby = $settings[ 'orderby' ];
			$order = $settings[ 'order' ];
		} else {
			$orderby = 'date';
			$order = 'DESC';
		}

		switch ( $settings[ 'post_style' ] ) {

			case 'default':
				$col = 'col-12';
				$posts_class = 'ms-posts--default';
				$col_numb = null;
				$list_order = null;
			break;

			case 'list':
				$col = 'col-12';
				$posts_class = 'ms-posts--list';
				$col_numb = null;
				$list_order = $settings[ 'list_style' ];
			break;

			case 'card':
				$col_numb_set = $settings['columns_number'];
				$col_numb = '12' / $col_numb_set;
				$col = 'col-12 col-md-6 col-lg-4';
				$posts_class = 'row ms-posts--card';
				$list_order = null;
			break;

		}

		switch ( $settings[ 'show_by' ] ) {

			case 'show_all':
				$post_id = null;
				$post_cat = null;
			break;

			case 'show_by_id':
				$post_cat = null;
				$post_id = $settings[ 'post_id' ];
			break;

			case 'show_by_cat':
				$post_cat = implode(",", $settings['post_cat']);
				$post_id = null;
			break;
		}

		$new_query = nicex_posts_loop( $settings[ 'max_posts' ], $post_cat, $post_id, $order, $orderby );
		$blog_style = $settings[ 'post_style' ];
		$show_thumb = $settings['show_thumb'];
		$show_excerpt = $settings['show_excerpt'];
		$show_excerpt_list = $settings['show_excerpt_list'];

		if ( $settings['masonry_style'] == 'masonry') {
			$masonry_style = ' grid-content';
		} else {
			$masonry_style = null;
			$data_masonry = null;
		}

		?>
		
		<div class="ms-posts--wrap">
			<div class="<?php echo $posts_class, $masonry_style; ?>" id="<?php echo $this->get_id(); ?>" data-order="<?php echo $list_order; ?>">

					<?php if ( $new_query->have_posts() ) : while ( $new_query->have_posts() ) : $new_query->the_post(); ?>


						<?php 
							set_query_var( 'show_thumb', $show_thumb );
							set_query_var( 'col_numb', $col_numb );
							set_query_var( 'show_excerpt', $show_excerpt );
							set_query_var( 'show_excerpt_list', $show_excerpt_list );

						get_template_part( 'template-parts/post/' . $blog_style );
						 ?>

					<?php endwhile; endif; wp_reset_postdata(); wp_reset_query(); ?>

		            <?php if ( $settings[ 'show_pagination' ] == 'yes' ) : ?>
	        			<?php if ( $new_query->max_num_pages > 1 ) : ?>
								<?php echo nicex_posts_pagination( $new_query ); ?>
		            	<?php endif; ?>
		            <?php endif; ?>
			</div>
		</div>
		<?php 
		if ( $settings['masonry_style'] == 'masonry') {
			if ( Plugin::$instance->editor->is_edit_mode() ) : ?>
				<script>
					var el = jQuery('#<?php echo $this->get_id(); ?>'),
						item = el.find('.grid-item');
						el.isotope();
						el.imagesLoaded().progress( function() {
						el.isotope('layout');
					});
				</script>
			<?php endif;
		}
			
	}

}