</main>
<?php do_action('tailpress_content_end'); ?>
</div>
<?php do_action('tailpress_content_after'); ?>




<footer class="footer bg-gray-50 pt-8 pb-4" role="contentinfo">
	<?php do_action('tailpress_footer'); ?>

	<div class="container mx-auto">



		<?php if (get_field("footer_content", "option")) :
			$post_id = get_field("footer_content", "option");
			$header = get_post($post_id);
			setup_postdata($header);
			echo the_content();
			wp_reset_postdata();
		else : ?>
			<div class="grid md:grid-cols-3 grid-cols-2 gap-8">
				<div>
					<div class="flex flex-wrap flex-col md:col-span-1 col-span-2">
						<?php get_template_part('template-parts/logo', null) ?>
						<?php get_template_part('template-parts/social', null) ?>
					</div>

					<div class="flex flex-wrap flex-col md:col-span-1 col-span-2">
						<h4><?php _e('Navigation', 'tm21') ?></h4>
						<?php wp_nav_menu(
							array(
								'container_id'    => 'footer-navigation',
								'container_class' => '',
								'menu_class'      => 'menu',
								'theme_location'  => 'footer-navigation',
								'li_class'        => '',
								'fallback_cb'     => false,
							)
						); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

</footer>


<footer class="copyright bg-gray-50 py-4" role="contentinfo">
	<div class="container mx-auto text-gray-500 text-xs">
		&copy; Copyright <?php echo date_i18n('Y'); ?> - <?php echo get_bloginfo('name'); ?> – <?php _e('Réalisé par', 'tm21') ?> <a href="https://trivialmass.ch">trivialmass</a>
	</div>
</footer>

</div>
<?php wp_footer(); ?>
</body>

</html>