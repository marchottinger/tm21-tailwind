<?php tailpress()->get_header(); ?>


<div class="container mx-auto my-8">
<div class="flex mb-6 ">
	<div class="ml-2"><?php echo facetwp_display('facet', 'types'); ?></div>
	<div class="ml-2"><?php echo facetwp_display('facet', 'ages'); ?></div>
	<div class="ml-2"><?php echo facetwp_display('facet', 'search'); ?></div>
</div>

	<?php if (have_posts()) : ?>
		<div class="grid  grid-cols-3 grid-rows-3 gap-6">
			<?php
			while (have_posts()) :
				the_post();

				$post_id = get_the_id();
			?>
				<div class="bg-gray-50 border border-gray-100 p-6 rounded-lg">
					<div class="flex justify-between">
						<?php echo get_the_term_list($post->ID, 'age', '<div class="text-sm">', '- ', '</div>'); ?>
						<?php echo get_the_term_list($post->ID, 'course-style', '<div class="text-sm"> ', ' ', '</div>'); ?>
					</div>
					<div class="mt-4">

						<a href="<?php the_permalink(); ?>" >
							<?php //echo get_the_post_thumbnail("", "large") 
							?>
						<h3><?php the_title(); ?></h3>
					</a>
					</div>
					<p><?php the_excerpt() ?></p>
				</div>
			<?php endwhile; ?>

		<?php endif; ?>

		</div>
</div>

<?php
tailpress()->get_footer();
