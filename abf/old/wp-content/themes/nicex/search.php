<?php
/**
 * @author: MadSparrow
 * @version: 1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) { exit( 'Direct script access denied.' ); }

get_header();

get_template_part( 'template-parts/header/header');

?>

<?php if ( have_posts() ) : ?>

    <section class="ms-page-header">
        <div class="ms-sp--header">
            <h1 class="ms-sp--title"><?php esc_html_e( 'Search results: ', 'nicex' ); ?><i class="search-word"><?php printf( get_search_query() ); ?></i></h1>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="ms-posts--default col">
                <div class="grid-sizer"></div>
                <?php while ( have_posts() ) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('grid-item col-12@sm'); ?>>

                        <div class="post-category__list">
                            <?php the_category(); ?>
                        </div>

                        <span class="post-meta">
                            <span class="post-meta__author"><?php the_author(); ?></span>
                            <span class="post-meta__date"><?php echo get_the_date(); ?></span>
                            <span class="ms-p--ttr"><?php echo nicex_reading_time(get_the_ID()); ?></span>
                        </span>

                        <div class="post-content">

                            <a href="<?php the_permalink(); ?>">
                                <h2><?php the_title(); ?></h2>
                            </a>

                            <p class="post-excerpt"><?php the_excerpt(); ?></p>

                            <div class="post-footer">

                                <span class="post-footer--link link">
                                    <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'nicex'); ?></a>
                                </span>

                            </div>

                        </div>

                    </article>
                <?php endwhile;
                wp_reset_postdata(); ?>

                <?php if (the_posts_pagination()) : ?>
                    <div class="grid-item ms-pagination col">
                        <?php echo the_posts_pagination(); ?>
                    </div>
                <?php endif; ?>
                
            </div>
            <?php if ( is_active_sidebar( 'blog_sidebar' ) ) : ?>
                <div class="pl-lg-5 col-lg-4 ms-sidebar">
                    <?php get_sidebar(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
   
<?php else : get_template_part( 'template-parts/page/page', 'none' ); endif; ?>

<?php get_footer(); ?>