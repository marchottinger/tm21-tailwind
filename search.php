<?php get_header(); ?>

	<div class="container my-8 mx-auto">

	<h1 class="archive-title"><?php _e( 'Search Results for:', 'jointswp' ); ?> <?php echo esc_attr(get_search_query()); ?></h1>


	<?php if ( have_posts() ) : ?>

		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<?php the_title(); ?>

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			
			?>

		<?php endwhile; ?>

	<?php endif; ?>

	</div>

<?php
get_footer();

