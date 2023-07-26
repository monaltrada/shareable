<?php
/**
 * @package WordPress
 * @since NiceX 1.0
 */
?>

<div class="<?php echo nicex_header_class();?>" <?php echo esc_attr(nicex_header_blur()); ?>>

	<div class="main-header__layout">
		<div class="main-header__inner">
			<div class="main-header__logo">
				<div class="logo-dark">
					<?php if (get_theme_mod( 'logo_dark' )): ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo esc_url( get_theme_mod( 'logo_dark' ) ); ?>" alt="<?php echo esc_attr( bloginfo( 'name' ) ); ?>">
						</a>
					<?php else: ?>
						<div class="ms-logo__default">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<h3><?php bloginfo( 'name' ); ?></h3>
							</a>
						</div>
					<?php endif; ?>
				</div>
				<div class="logo-light">
					<?php if (get_theme_mod( 'logo_light' )): ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo esc_url( get_theme_mod( 'logo_light' ) ); ?>" alt="<?php echo esc_attr( bloginfo( 'name' ) ); ?>">
						</a>
					<?php else: ?>
					<div class="ms-logo__default">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<h3><?php bloginfo( 'name' ); ?></h3>
						</a>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<?php nicex_menu_type(); ?>
		</div>
	</div>
	
</div>