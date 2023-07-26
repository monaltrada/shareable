<?php
/**
 * @author: Mad Sparrow
 * @version: 1.0.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) { exit( 'Direct script access denied.' ); }

$footer_class = 'ms-footer ms-footer--template';

?>

<?php if ( get_theme_mod('top_btn') && get_theme_mod('top_btn') == '1' ) : ?>
  <div class="back-to-top js-back-to-top" data-offset="350">
    <div class="ms-btt--inner">
      <span class="ms_tm--tooltip"><?php echo esc_html__('Back To Top', 'nicex'); ?></span>
      <svg class="ms-btt-i" enable-background="new 0 0 96 96" height="96px" id="arrow_up" version="1.1" viewBox="0 0 96 96" width="96px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <path d="M52,84V21.656l21.457,21.456c1.561,1.562,4.095,1.562,5.656,0.001c1.562-1.562,1.562-4.096,0-5.658L50.829,9.172l0,0  c-0.186-0.186-0.391-0.352-0.609-0.498c-0.101-0.067-0.21-0.114-0.315-0.172c-0.124-0.066-0.242-0.142-0.373-0.195  c-0.135-0.057-0.275-0.089-0.415-0.129c-0.111-0.033-0.216-0.076-0.331-0.099C48.527,8.027,48.264,8,48.001,8l0,0  c-0.003,0-0.006,0.001-0.009,0.001c-0.259,0.001-0.519,0.027-0.774,0.078c-0.12,0.024-0.231,0.069-0.349,0.104  c-0.133,0.039-0.268,0.069-0.397,0.123c-0.139,0.058-0.265,0.136-0.396,0.208c-0.098,0.054-0.198,0.097-0.292,0.159  c-0.221,0.146-0.427,0.314-0.614,0.501L16.889,37.456c-1.562,1.562-1.562,4.095-0.001,5.657c1.562,1.562,4.094,1.562,5.658,0  L44,21.657V84c0,2.209,1.791,4,4,4S52,86.209,52,84z"/>
      </svg>
    </div>
  </div>
<?php endif; ?>

<?php if (get_theme_mod( 'footer_template')) :?>
  <footer class="<?php echo nicex_sanitize_class( $footer_class ); ?>">
      <?php $footer_template = get_theme_mod( 'footer_template'); ?>
      <?php echo ms_render_elementor_template( $footer_template ); ?>
  </footer>
<?php endif; ?>

<?php if( get_theme_mod( 'mode_switcher' ) && get_theme_mod( 'mode_switcher' ) == '1') : ?>
  <div class="ms_theme_mode">
    <div class="ms_tm--inner">
      <span class="ms_tm--tooltip"><?php echo esc_html__('Theme Mode', 'nicex'); ?></span>
      <div class="theme-toggle" id="theme-toggle">
        <input type="checkbox" id="switcher" class="check" <?php echo nicex_theme_mode_cheked(); ?>>
        <svg class="sun-and-moon" aria-hidden="true" width="24" height="24" viewBox="0 0 24 24">
          <mask class="moon" id="moon-mask">
            <rect x="0" y="0" width="100%" height="100%" fill="white"></rect>
            <circle cx="24" cy="10" r="6" fill="black"></circle>
          </mask>
          <circle class="sun" cx="12" cy="12" r="6" mask="url(#moon-mask)" fill="currentColor"></circle>
          <g class="sun-beams" stroke="currentColor">
            <line x1="12" y1="1" x2="12" y2="3"></line>
            <line x1="12" y1="21" x2="12" y2="23"></line>
            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
            <line x1="1" y1="12" x2="3" y2="12"></line>
            <line x1="21" y1="12" x2="23" y2="12"></line>
            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
          </g>
        </svg>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>