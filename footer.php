</main>
</div>



<?php
	$footer_block_id = get_field("footer_block", "option");
	$footer_block = get_post($footer_block_id)->post_content;
?>
<footer class="footer" role="contentinfo">
	<div class="container">
		<?php if( $footer_block ) : ?>
			<?php echo $footer_block ?>
		<?php endif; ?>
	</div>
</footer>


<footer class="py-4 copyright bg-gray-light" role="contentinfo">
	<div class="container text-xs">
		&copy; Copyright <?php echo date_i18n('Y'); ?> - <?php echo get_bloginfo('name'); ?> – <?php _e('Réalisé par', 'tm21') ?> <a href="https://trivialmass.ch">trivialmass</a>
	</div>
</footer>

</div>
<?php wp_footer(); ?>
</body>

</html>