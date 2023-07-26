<?php
/**
 * @author: MadSparrow
 * @version: 1.0
 */

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) { exit( 'Direct script access denied.' ); } ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="ms-sp--header">
		<?php if ( is_singular() ) : ?>
			<?php the_title( '<h1 class="ms-sp--title default-max-width">', '</h1>' ); ?>
		<?php else : ?>
			<?php the_title( sprintf( '<h2 class="entry-title default-max-width"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php endif; ?>
	</header>

	<div class="ms-default-page entry-content">
		<?php the_content(); ?>
		<div class="clearfix"></div>
		<?php wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'nicex' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'nicex' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		?>
	</div>

	<?php if ( comments_open() || get_comments_number() ) : ?>
		<?php comments_template(); ?>
	<?php endif; ?>
</article>