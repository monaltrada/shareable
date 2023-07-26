<?php
/**
 * Show the appropriate content.
 *
 * @package WordPress
 * @since NiceX 1.0
 */
$length = '10';
?>

<span class="post-meta">
	<span class="post-meta__author"><?php the_author(); ?></span>
	<span class="post-meta__date"><?php echo get_the_date(); ?></span>
	<span class="ms-p--ttr"><?php echo nicex_reading_time(get_the_ID()); ?></span>
</span>

<div class="post-content">

	<a href="<?php the_permalink(); ?>">
		<h2><?php the_title(); ?></h2>
	</a>

	<?php if ( isset( $show_excerpt_list)  ) {
		if ( $show_excerpt_list == 'on' ) {
			echo nicex_get_excerpt(get_the_ID(),'240');
		}
	} else {
		echo nicex_get_excerpt(get_the_ID(),'240');
	} ?>

	<div class="post-footer">

		<span class="post-footer--link link">
			<a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'nicex'); ?></a>
		</span>

	</div>

</div>