<?php
/**
 * @author: MadSparrow
 * @version: 1.0
 */
?>

<a href="<?php the_permalink(); ?>" class="ms-post-quote">

	<div class="post-content">

		<h2><?php echo get_field( 'post_quote_text' ); ?></h2>

		<div class="post-footer">
			<?php echo get_field( 'post_quote_author' ); ?>
		</div>

	</div>

</a>