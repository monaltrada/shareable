<?php if ( ! defined( 'ABSPATH' ) ) { exit( 'Direct script access denied.' ); }

// Menu
function nicex_primary_menu() {

    $manu_class = 'navbar-nav';

    if ( ! class_exists( 'acf' ) ) {
        $manu_class = 'navbar-nav';
    } else {
        if ( get_field('menu_variation') ) {
            
            if (get_field('menu_variation') == 'default') {
                $manu_class = 'navbar-nav';
            } else {
                $manu_class = 'navbar-nav-button';
            }        
        }     
    }

    echo wp_nav_menu( array(
        'theme_location' => 'primary-menu',
        'container' => true,
        'depth' => 3,
        'menu_id'        => 'primary-menu',
        'menu_class'     => $manu_class,
    ) );
}

// Theme Mode
function nicex_theme_mode() {
    if(get_theme_mod( 'mode_switcher' )) {
        $out = nicex_theme_mode_cookie();
    } else {
        if(get_theme_mod( 'theme_mode' )) {
            $out = get_theme_mod( 'theme_mode' );
        } else {
            $out = "light";
        }
    }
    return $out;
}

function nicex_theme_mode_cookie() {
    if(!isset($_COOKIE["theme-mode"])) {
        $theme_mode = get_theme_mod( 'theme_mode' );
    } else {
        $theme_mode = $_COOKIE["theme-mode"];
    }
    return $theme_mode;
}
function nicex_theme_mode_cheked() {
    $theme_mode = nicex_theme_mode_cookie();
    if ($theme_mode === 'light') {
        $cheked = 'checked';
    } else {
        $cheked = null;
    }
    return $cheked;
}

// Menu Type
function nicex_menu_type() {

    
    if( ! class_exists('acf')) {
        get_template_part( 'template-parts/menu/default', get_post_format() );

    } else {
        $menu = get_field('menu_variation');
        if (get_field('menu_variation')) {
            get_template_part( 'template-parts/menu/'. $menu, get_post_format() );
        } else {
            get_template_part( 'template-parts/menu/default', get_post_format() );
        }
    }
    
}


function nicex_page_transition() {
    if(get_theme_mod( 'page_transition' ) && get_theme_mod( 'page_transition' ) == '1') {
        $transition = '<div id="loaded"></div>';
        return $transition;
    }
}
// Elementor Templates List Footer
function ms_get_elementor_templates( $type = null ) {

    $args = [
        'post_type' => 'elementor_library',
        'posts_per_page' => -1,
    ];

    if ( $type ) {

        $args[ 'tax_query' ] = [
            [
                'taxonomy' => 'elementor_library_type',
                'field' => 'slug',
                'terms' => $type,
            ],
        ];

    }

    $page_templates = get_posts( $args );

    $options[0] = esc_html__( 'Select a Template', 'nicex' );

    if ( ! empty( $page_templates ) && ! is_wp_error( $page_templates ) ) {
        foreach ( $page_templates as $post ) {
            $options[$post->ID] = $post->post_title;
        }
    } else {

        $options[0] = esc_html__( 'Create a Template First', 'nicex' );

    }

    return $options;

}

// DELETE
function nicex_one_print_first_instance_of_block( $block_name, $content = null, $instances = 1 ) {
	$instances_count = 0;
	$blocks_content  = '';

	if ( ! $content ) {
		$content = get_the_content();
	}

	// Parse blocks in the content.
	$blocks = parse_blocks( $content );

	// Loop blocks.
	foreach ( $blocks as $block ) {

		// Sanity check.
		if ( ! isset( $block['blockName'] ) ) {
			continue;
		}

		// Check if this the block matches the $block_name.
		$is_matching_block = false;

		// If the block ends with *, try to match the first portion.
		if ( '*' === $block_name[-1] ) {
			$is_matching_block = 0 === strpos( $block['blockName'], rtrim( $block_name, '*' ) );
		} else {
			$is_matching_block = $block_name === $block['blockName'];
		}

		if ( $is_matching_block ) {
			// Increment count.
			$instances_count++;

			// Add the block HTML.
			$blocks_content .= render_block( $block );

			// Break the loop if the $instances count was reached.
			if ( $instances_count >= $instances ) {
				break;
			}
		}
	}

	if ( $blocks_content ) {
		/** This filter is documented in wp-includes/post-template.php */
		echo apply_filters( 'the_content', $blocks_content ); // phpcs:ignore WordPress.Security.EscapeOutput
		return true;
	}

	return false;
}

function ms_render_elementor_template( $template ) {

    if ( ! $template ) {
      return;
    }

    if ( 'publish' !== get_post_status( $template ) ) {
      return;
    }
    if ( did_action( 'elementor/loaded' ) ) {
        $new_frontend = new Elementor\Frontend;
        return $new_frontend->get_builder_content_for_display( $template, false );        
    }

}

// Footer query
function nicex_get_footer() {
    $args = array(
        'post_type' => 'elementor_library',
        'posts_per_page' => -1,
    );

    $ps = get_posts( $args );
    return $ps;
}

// Sanitize Class
if ( ! function_exists( 'nicex_sanitize_class' ) ) {
  function nicex_sanitize_class( $class, $fallback = null ) {

    if ( is_string( $class ) ) {
      $class = explode( ' ', $class );
    }

    if ( is_array( $class ) && count( $class ) > 0 ) {
      $class = array_map( 'sanitize_html_class', $class );
      return implode( ' ', $class );
    } else {
      return sanitize_html_class( $class, $fallback );
    }

  }
}

// Header Class
function nicex_header_class() {

    if( class_exists('acf')) {
        if (get_field('header_transparent')) {
            $h_transparent = (get_field('header_transparent') == '1' ? ' ms-nb--transparent' : '');
        } else {
            $h_transparent = '';
        }

        if ( function_exists('get_field') && get_field('full_width') ) {
            $full_width = get_field('full_width') ? ' full-width' : '';
        } else {
            $full_width = '';
        }
        $h_ac = $h_transparent . $full_width;

    } else {
        $h_ac = '';
    }
    $menu_class = 'main-header js-main-header auto-hide-header' . $h_ac;

    return nicex_sanitize_class($menu_class);

}
// Header Type
function nicex_header_type() {
    $header_style = 'default';
    if ( function_exists('get_theme_mod') ) {
        $header_style = get_theme_mod('type_header');
    }
    return $header_style;
}

// Data Blur
function nicex_header_blur() {
    $blur_effect = '';
    if ( function_exists('get_theme_mod') ) {
        $blur_effect = get_theme_mod('blur_hedaer') ? 'data-blur=on' : '';
    }
    return $blur_effect;
}

// Posts Loop
function nicex_posts_loop($items, $cat, $post_id, $order, $orderby) {

    $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'paged' => $paged,
            'posts_per_page' => $items,
            'category_name' => $cat,
            'post__in' => $post_id,
            'orderby' => $orderby,
            'order' => $order
        );
    $query = new WP_Query($args);
    return $query;
}

// Posts Pagination
function nicex_posts_pagination( $new_query = null ) {
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    if ( $new_query == null ) {
        global $wp_query;
        $new_query = $wp_query;
    } 
    /* Stop the code if there is only a single page page */
    if( $new_query->max_num_pages <= 1 )
        return;
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $new_query->max_num_pages );
    /*Add current page into the array */
    if ( $paged >= 1 )
        $links[] = $paged;
    /*Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
    echo '<nav class="pagination" aria-label="Pagination"><ol class="pagination__list">' . "\n";
    /*Display Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li class="page-item prev">%s </li>' . "\n", get_previous_posts_link(esc_html( 'Previous', 'nicex' )) );
    /*Display Link to first page*/
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class=""' : '';
        printf( '<li%s class=""><a href="%s" class="pagination__item">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
        if ( ! in_array( 2, $links ) )
            echo '<li class=""><span>…</span></li>';
    }
    /* Link to current page */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="page-item active"' : '';
        printf( '<li%s><a href="%s" class="pagination__item">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
    /* Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li class="display--sm">…</li>' . "\n";
        $class = $paged == $max ? ' class="display--sm"' : '';
        printf( '<li%s class="display--sm"><a href="%s" class="pagination__item pagination__item--ellipsis">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link('Next', $max) )
        printf( '<li class="page-item next">%s </li>' . "\n", get_next_posts_link( esc_html( 'Next', 'nicex' ), $max) );
    echo '</ol></nav>' . "\n";
}

// Related Posts
function nicex_related_posts() {

$post_id = get_the_ID();
    $cat_ids = array();
    $categories = get_the_category( $post_id );

    if(!empty($categories) && !is_wp_error($categories)):
        foreach ($categories as $category):
            array_push($cat_ids, $category->term_id);
        endforeach;
    endif;

    $current_post_type = get_post_type($post_id);

    $query_args = array( 
        'category__in'   => $cat_ids,
        'post_type'      => $current_post_type,
        'post__not_in'    => array($post_id),
        'posts_per_page'  => '3',
     );

    $related_cats_post = new WP_Query( $query_args );

    return $related_cats_post;
}

// Socials Custom Plugin
function nicex_twitter_share() {
    $posttags = get_the_tags();
    if ($posttags) {
        foreach($posttags as $tag) {
            echo strtolower('#' . $tag->name . ', '); 
        }
    }
}

// Estimated reading time
function nicex_reading_time($id) {

    $content = get_post_field( 'post_content', $id );
    $word_count = str_word_count( strip_tags( $content ) );
    $readingtime = ceil($word_count / 200);
    $timer = esc_html( ' min read', 'nicex' );

    $totalreadingtime = $readingtime . $timer;
    return $totalreadingtime;
    
}

// Custom Comments
function nicex_comments( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment;
	
	switch ( $comment->comment_type ) :
		case 'pingback':
		case 'trackback':
		?>
        <li class="post pingback" id="comment-<?php comment_ID(); ?>">
        	<div class="pingback ms-author-name"><?php comment_author_link(); ?></div>
        	<div class="post-date"><?php comment_date(); ?></div>
        	<div class="ms-commentcontent"><?php comment_text();  ?></div>
        	<?php edit_comment_link( __( 'Edit', 'nicex' ), '<span class="edit-link">', '</span>' ); ?></p>
    	</li>
		<?php 
		break;
		default: 
		?>
            <li id="comment-<?php comment_ID(); ?>">
            <div <?php comment_class(); ?>>
				<div class="ms-comment-body">
                    <div class="ms-author-vcard">
                        <figure class="avatar__figure" role="img" aria-label="Avatar">
                                <svg class="avatar__placeholder" aria-hidden="true" viewBox="0 0 20 20" stroke-linecap="round" stroke-linejoin="round"><circle cx="10" cy="6" r="2.5" stroke="currentColor"/><path d="M10,10.5a4.487,4.487,0,0,0-4.471,4.21L5.5,15.5h9l-.029-.79A4.487,4.487,0,0,0,10,10.5Z" stroke="currentColor"/></svg>
                            <div class="avatar__img"><?php echo get_avatar( $comment, 48 ); ?></div>
                        </figure>
                    </div>
					<div class="ms-author-vcard-content">
                        <div class="ms-author-vcard--info">
                            <div class="ms-author-name"><?php comment_author(); ?></div>
                            <span class="ms-comment-time"><?php comment_date(); ?></span>
                        </div>					
						<div class="ms-commentcontent">
							<?php comment_text(); ?>
                            <div class="ms-comment-footer">
							<div class="ms-comment-edit">
                                <?php edit_comment_link( $text = '<svg height="14px" version="1.1" viewBox="0 0 24 24" width="14px"><path d="M21.635,6.366c-0.467-0.772-1.043-1.528-1.748-2.229c-0.713-0.708-1.482-1.288-2.269-1.754L19,1C19,1,21,1,22,2S23,5,23,5  L21.635,6.366z M10,18H6v-4l0.48-0.48c0.813,0.385,1.621,0.926,2.348,1.652c0.728,0.729,1.268,1.535,1.652,2.348L10,18z M20.48,7.52  l-8.846,8.845c-0.467-0.771-1.043-1.529-1.748-2.229c-0.712-0.709-1.482-1.288-2.269-1.754L16.48,3.52  c0.813,0.383,1.621,0.924,2.348,1.651C19.557,5.899,20.097,6.707,20.48,7.52z M4,4v16h16v-7l3-3.038V21c0,1.105-0.896,2-2,2H3  c-1.104,0-2-0.895-2-2V3c0-1.104,0.896-2,2-2h11.01l-3.001,3H4z"/></svg>Edit' ); ?></div>
							<div class="ms-comment-reply">
								<?php comment_reply_link( array_merge( $args, array(
									'reply_text' => '<svg height="16px" version="1.1" viewBox="0 0 16 16" width="14px"><g fill="none" fill-rule="evenodd" stroke="none" stroke-width="1"><g fill="none" class="group" transform="translate(0.000000, -336.000000)"><path d="M0,344 L6,339 L6,342 C10.5,342 14,343 16,348 C13,345.5 10,345 6,346 L6,349 L0,344 L0,344 Z M0,344"/></g></g></svg>Reply',
									'depth' => $depth,
									'max_depth' => $args['max_depth'] 
								) ) ); ?>
							</div>
						</div>
						</div>
					</div>
				</div>
            </div>
   	<?php
        break;
    endswitch;
}

// Blog Custom Comments
function nicex_comments_number() {

	$comment_count = get_comments_number();
	printf(
	    '<span>' . esc_html( _nx( '1 comment', '%1$s comments', get_comments_number(), 'comments title', 'nicex' ) ),
	    number_format_i18n( get_comments_number() ) . '</span>',
        '<span>' . get_the_title() . '</span>'
	);	
}

// Pagination
function nicex_link_pages() {
    wp_link_pages( array(
        'before'      => '<div class="page-links">' . __( 'Pages:', 'nicex' ),
        'after'       => '</div>',
        'link_before' => '<span class="page-number">',
        'link_after'  => '</span>',
    ) );
}

// Portfolio Filter
function nicex_filter_category() {
    if ( isset($_GET['category']) ) {
        $out = $_GET['category'];
        return $out;
    } else {
        $out = null;
        return $out;
    }
}

// Portfolio Loop
function nicex_portfolio_loop( $cat = null, $items, $post_id ) {
   
    if ($cat == null) {
        $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
        $args = array(
            'post_type'      => 'portfolios',
            'post_status'    => 'publish',
            'posts_per_page' => $items,         
            'paged'          => $paged,
            'post__in' => $post_id
        );  
    } else {
        $paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
        $args = array(
            'post_type'      => 'portfolios',
            'post_status'    => 'publish',
            'posts_per_page' => $items,         
            'paged'          => $paged,
            'post__in' => $post_id,
            'tax_query' => array(
                array(
                    'taxonomy' => 'portfolios_categories',
                    'field'    => 'slug',
                    'terms' => $cat
                )
            )
        );  
    }
    $query = new WP_Query($args);
    return $query;
}

// Get Works Taxonomy
if ( !function_exists( 'nicex_works_category' ) ) {
    function nicex_work_category($post_id) {
        $terms = wp_get_post_terms($post_id, 'portfolios_categories');
        $count = count($terms);
        $slug = '';
        $out = '';
        if ( $count > 1 ) {
            foreach ( $terms as $term ) {
                $out = implode(', ', array_map(function($term) { return $term->slug; }, $terms));
            }
        } else {
           foreach ( $terms as $term ) {
               $out = $term->slug;
            } 
        }
        return $out;
    }
}

// Portfolio pagination
function nicex_portfolio_pagination($total_pages, $btntext) {

    $total = $total_pages;
    $out = '<div class="ajax-area" data-max="' . $total . '">';
    $out .= '<div class="btn btn-load-more btn--primary btn--md">';
    $out .= '<div class="ms-btn__text">';
    $out .= '<span class="text--main">' . $btntext . '</span>';
    $out .= '<span class="text--no-items">' . esc_html__('No more projects', 'nicex') . '</span>';
    $out .= '<span class="text--ghost">' . $btntext . '</span>';
    $out .= '<div class="btn__content-b">';
    $out .= '<svg class="load-more-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35px" height="35px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
<circle cx="50" cy="50" r="30" stroke="" stroke-width="0" fill="none"></circle>
<circle cx="50" cy="50" r="30" stroke="" stroke-width="8" stroke-linecap="round" fill="none" transform="rotate(307.62 50 50)">
  <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;180 50 50;720 50 50" keyTimes="0;0.5;1"></animateTransform>
  <animate attributeName="stroke-dasharray" repeatCount="indefinite" dur="1s" values="18.84955592153876 169.64600329384882;94.2477796076938 94.24777960769377;18.84955592153876 169.64600329384882" keyTimes="0;0.5;1"></animate></circle></svg>';
    $out .= '</div>';
    $out .= '</div>';
    $out .= '<span class="ms-btn--ripple"></span>';
    $out .= '</div>';
    $out .= '</div>';
    return $out;

}

function nicex_portfolio_pagination_list($total_pages, $btntext) {

    $total = $total_pages;
    $out = '<div class="ajax-area--list" data-max="' . $total . '">';
    $out .= '<div class="btn btn-load-more btn--primary btn--md">';
    $out .= '<div class="ms-btn__text">';
    $out .= '<span class="text--main">' . $btntext . '</span>';
    $out .= '<span class="text--no-items">' . esc_html__('No more projects', 'nicex') . '</span>';
    $out .= '<span class="text--ghost">' . $btntext . '</span>';
    $out .= '<div class="btn__content-b">';
    $out .= '<svg class="load-more-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35px" height="35px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
<circle cx="50" cy="50" r="30" stroke="" stroke-width="0" fill="none"></circle>
<circle cx="50" cy="50" r="30" stroke="" stroke-width="8" stroke-linecap="round" fill="none" transform="rotate(307.62 50 50)">
  <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;180 50 50;720 50 50" keyTimes="0;0.5;1"></animateTransform>
  <animate attributeName="stroke-dasharray" repeatCount="indefinite" dur="1s" values="18.84955592153876 169.64600329384882;94.2477796076938 94.24777960769377;18.84955592153876 169.64600329384882" keyTimes="0;0.5;1"></animate></circle></svg>';
    $out .= '</div>';
    $out .= '</div>';
    $out .= '<span class="ms-btn--ripple"></span>';
    $out .= '</div>';
    $out .= '</div>';
    return $out;

}

//Infinite next and previous post looping in WordPress
// Single Portfolio Page Next Link

function nicex_portfolio_nav_prev( $id ) {

    if (get_previous_post() == true) {
        $prevPost = get_previous_post();
        $prevTitle = get_the_title($prevPost);
        $link = get_permalink( get_adjacent_post(false,'',true)->ID );
        $img = get_the_post_thumbnail_url( $prevPost->ID);
        $out = '<a class="ms-spn--link" href="' . $link . '">';
        $out .= '<h1>' . $prevTitle . '</h1>';
        $out .= '</a>';
        $out .= '<div class="ms-spn--thumb">';
        $out .= '<img src="' . $img . '" />';
        $out .= '</div>';
        return $out;
    } else {

        $first = new WP_Query( array(
            'post_type'      => 'portfolios',
            'post_status'    => 'publish',
            'posts_per_page' => 2,
            'post__not_in'   => array( $id ),
            'order' => 'DESC',
        ));

        $first->the_post();

        $prevPost = get_previous_post();
        $prevTitle = get_the_title($prevPost);
        $img = get_the_post_thumbnail_url($post = null);
        $out = '<a class="ms-spn--link" href="' . get_permalink() . '">';
        $out .= '<h1>' . get_the_title() . '</h1>';
        $out .= '</a>';
        $out .= '<div class="ms-spn--thumb">';
        $out .= '<img  class="TEST" src="' . $img . '" />';
        $out .= '</div>';
        
        return $out;
        wp_reset_postdata();
    };
}

// Single Portfolio Page Prev Link
function nicex_portfolio_nav_next() {
    if (get_next_post() == true) {
        $nextPost = get_next_post();
        $nextTitle = get_the_title( get_next_post() );
        $out_title = '<div class="ms-spn--text">KAKA<svg width="80" height="11" viewBox="0 0 80 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="ms-spn--arrow"><g><path d="M0 5.09961H74.7" stroke-width="0.922" stroke-miterlimit="10"></path> <path d="M74.5 0.299805L79.3 5.0998L74.5 9.8998" stroke-width="0.922" stroke-miterlimit="10"></path></g></svg><h1>' . esc_html__('Previous', 'nicex') . '</h1><h3>' . $nextTitle . '</h3></div>';
        $nextThumbnail = get_the_post_thumbnail( $nextPost->ID) . $out_title ;
        next_post_link( '%link', $nextThumbnail );
    }
    else {
        $last = new WP_Query( array(
            'post_type'      => 'portfolios',
            'post_status'    => 'publish',
            'posts_per_page' => 1,
            'order' => 'ASC',
        ));

        $last->the_post();

        $img = get_the_post_thumbnail_url($post = null);
        $out = '<a href="' . get_permalink() . '">';
        $out .= '<img src="' . $img . '" />';
        $out .= '<div class="ms-spn--text"><svg width="80" height="11" viewBox="0 0 80 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="ms-spn--arrow"><g><path d="M0 5.09961H74.7" stroke="white" stroke-width="0.922" stroke-miterlimit="10"></path> <path d="M74.5 0.299805L79.3 5.0998L74.5 9.8998" stroke="white" stroke-width="0.922" stroke-miterlimit="10"></path></g></svg><h1>' . esc_html__('Previous', 'nicex') . '</h1><h3>';
        $out .=  get_the_title();
        $out .=  '</h3></div>';
        $out .= '</a>';

        return $out;
        wp_reset_postdata();
    }
}

// Load More Button
if( !function_exists( 'nicex_infinity_load' ) ){
    function nicex_infinity_load( $query = null ) {
        
        $max = $query->max_num_pages;
        $paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;

        wp_localize_script( 'nicex-main-script', 'infinity_load', array(
                'startPage' => $paged,
                'maxPages' => $max,
                'nextLink' => next_posts($max, false)
        ) );
        
    }
}

// Custom Excertp
function nicex_get_excerpt( $id, $count ){
   $permalink = get_permalink( $id );

   $excerpt = get_the_excerpt();
   $excerpt = strip_tags( $excerpt );
   $excerpt = mb_substr( $excerpt, 0, $count );
   $excerpt = mb_substr( $excerpt, 0, strripos( $excerpt, " " ) );
   $excerpt = rtrim( $excerpt, ",.;:- _!$&#" );
   $excerpt = '<p class="post-excerpt">' . $excerpt . '...' . '</p>';

   return $excerpt;
}

// Custom excerpt lenght
add_filter( 'excerpt_length', function($length) {
    return 24;
}, PHP_INT_MAX );