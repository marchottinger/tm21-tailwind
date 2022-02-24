<?php

/**
 * Restricted Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create class attribute allowing for custom "className" and "align" values.
$id = 'block-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}
$classes = 'block-grid-partners';
if (!empty($block['className'])) {
    $classes .= sprintf(' %s', $block['className']);
}
if (!empty($block['align'])) {
    $classes .= sprintf(' align%s', $block['align']);
}



?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($classes); ?>">
    <h3 class="has-text-color"><?php _e('Our partners', 'valentine') ?></h3>
    <?php if (have_rows('partners')) : ?>
        <div class="grid-partners grid-x grid-padding-x">
            <?php while (have_rows('partners')) : the_row(); ?>
                <div class="cell large-3 align-self-middle">
                    <?php if (get_sub_field('link')) : ?>
                        <a href="<?php echo get_sub_field('link'); ?>">

                            <?php
                            if (get_sub_field('image')) {
                                $attachment_id = get_sub_field('image');
                                $size = "full"; // (thumbnail, medium, large, full or custom size)
                                echo wp_get_attachment_image($attachment_id, $size);
                            }
                            ?>

                        </a>
               
            <?php endif; ?>
            </div>

    <?php endwhile; ?>
    </div>

<?php endif; ?>





</div>