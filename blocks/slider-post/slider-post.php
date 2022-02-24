<?php

/**
 * Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'slider-' . $block['id'];
if (!empty($block['anchor'])) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'block-slider-post';
if (!empty($block['className'])) {
	$className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
	$className .= ' align' . $block['align'];
}
if ($is_preview == 1) {
	$className .= ' is-admin';
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<?php

	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'post',
		'cat' => 81,
		'order' => "DESC",

	);

	$query = new WP_Query($args);

	?>

	<?php if ($query->have_posts()) : ?>
		<div class="slides">
			<?php while ($query->have_posts()) : $query->the_post(); ?>
				<div class="slide">
					<a href="<?php the_permalink() ?>">
						<?php echo get_the_post_thumbnail("", "large"); ?>
						<?php //get_template_part( 'parts/content', 'byline' ); 
						?>
						<h3> <?php the_title(); ?></h3>
						<p>
							<?php the_content() ?>
						</p>
					</a>
				</div>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>

	<?php wp_reset_query(); ?>








</div>