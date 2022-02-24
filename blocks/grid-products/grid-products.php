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
$classes = 'block-grid-product';
if (!empty($block['className'])) {
    $classes .= sprintf(' %s', $block['className']);
}
if (!empty($block['align'])) {
    $classes .= sprintf(' align%s', $block['align']);
}
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($classes); ?>">
    <h3 class="has-text-color"><?php _e('Our products', 'valentine') ?></h3>
    <?php 
    $args = array(
        'taxonomy' => 'machine_type',
        'hide_empty' => false,
    );
    $terms = get_terms($args); ?>
  
        <div class="grid-product grid-x grid-padding-x small-up-2 medium-up-5">
            <?php foreach ($terms as $term) {
                $term_id = $term->term_id;
                $term_slug = $term->slug;
            ?>
                <div class="cell text-center">
                    <a href="<?php echo get_site_url()."/produits/?_machine_type=".$term_slug ?>" >
                        <?php
                        if (get_field('image', "machine_type_" . $term_id)) {
                            $attachment_id = get_field('image', "machine_type_" . $term_id);
                            $size = "full"; // (thumbnail, medium, large, full or custom size)
                            echo wp_get_attachment_image($attachment_id, $size);
                        }
                        ?>
                        <h4 class="has-text-color uppercase"><?php echo $term->name; ?></h4>
                    </a>
                </div>
            <?php 
            } ?>
            <div class="cell align-self-middle text-center">
                <div class="icon-base is-style-outline">
                    <a class="wp-block-button__link " href="#"> <?php _e("E-shop","jointswp") ?> </a>
                </div>
            </div>
        </div>

</div>