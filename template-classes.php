<?php
/*
Template name: classes
*/
?>


<?php get_header(); ?>

<div class="container mx-auto my-8">
	

	<?php if (have_posts()) : ?>
		<?php
		while (have_posts()) :
			the_post();
		?>
			<?php get_template_part('template-parts/content', get_post_format()); ?>

		<?php endwhile; ?>

	<?php endif; ?>
	<div class="entry-content container">
		<?php get_template_part("template-parts/classes", "grid") ?>
	</div>
</div>

<?php
get_footer();
