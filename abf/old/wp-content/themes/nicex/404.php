<?php
/**
 * @author: MadSparrow
 * @version: 1.0
 */

get_header();

get_template_part( 'template-parts/header/header');

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) { exit( 'Direct script access denied.' ); } ?>

<section class="ms-404-page">
  <div class="col-lg-6 align-self-center ms-404--content">
    <h2><?php esc_html_e('UH OH! You are lost.', 'nicex') ?></h2>
    <p><?php esc_html_e('The page you are looking for does not exist. How you got here is a mystery. But you can click the button below to go back to the', 'nicex') ?>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('homepage.', 'nicex') ?></a>
  </p>
  </div>
  <div class="col-lg-6 ms-404--img">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/404.svg" alt="<?php esc_attr_e('404 page', 'nicex'); ?>">
  </div>
</section>

<?php wp_footer(); ?>