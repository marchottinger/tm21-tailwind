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
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'slider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview == 1 ) {
    $className .= ' is-admin';
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php if( have_rows('slides') ): ?>
		<div class="slides">
			<?php while( have_rows('slides') ): the_row(); ?>
				
				<?php 
				$image = get_sub_field('image');
				$text = get_sub_field('text');
				$txt_option = get_sub_field("txt_option");
                    $text_align = $txt_option["text_align"];
                    $text_color = $txt_option["text_color"];
                    $transparency = $txt_option["transparency"];
                $img_option = get_sub_field("img_option");
                    $h_align = $img_option["h_align"];
					$v_align = $img_option["v_align"];
				
					$link = get_sub_field('button');
					if( $link ): 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					endif;
				?>
				<div class="slide" style="height:<?php the_field("slider_height"); ?>px">
					<div class="hero <?php echo $text_align ?>">
						<?php if(get_sub_field('text')):?>
						<div class="hero__content <?php echo $text_width ?> <?php echo $text_color ?> <?php echo $transparency ?>">
							<?php echo $text ?> 
						
							<?php if ($link) : ?>
	                                <a class="button button--red" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
	                        <?php endif; ?>
						</div>
							<?php endif;?>
					</div>
					<?php echo wp_get_attachment_image( $image['id'], 'full',false, array( "class" => $v_align ) ); ?>	
				</div>
				
			<?php endwhile; ?>
		</div>
	<?php else: ?>
		<p>Please add some slides.</p>
	<?php endif; ?>
</div>