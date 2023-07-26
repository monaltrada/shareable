<?php 
/**
 * @author: MadSparrow
 * @version: 1.0
 */

get_header();

$id = get_the_ID();

get_template_part( 'template-parts/header/header');

?>
<main class="ms-main">

    <div class="ms-content--portfolio">
        <?php while ( have_posts() ) : the_post();
            the_content();
        endwhile; ?>
    </div>

    <div class="ms-spn--wrap">
        <div class="ms-spn--text">
            <h3><?php echo esc_html__('Next Project', 'nicex'); ?></h3>
        </div>
        <div class="ms-spn--content">
            <?php echo nicex_portfolio_nav_prev( $id ); ?>
        </div>
    </div>
    
</main>

<?php get_footer(); ?>
