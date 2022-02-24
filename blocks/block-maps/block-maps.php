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
$classes = 'block-maps';
if (!empty($block['className'])) {
    $classes .= sprintf(' %s', $block['className']);
}
if (!empty($block['align'])) {
    $classes .= sprintf(' align%s', $block['align']);
}


?>

<?php 
get_template_part("parts/google", "map") ;

$list_projetcs_id = get_field("list_projects");


$args = array(
    'post_type' => 'projet',
    'post__in' => $list_projetcs_id
);

$query = new WP_Query($args);
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($classes); ?>">
<?php if ($query->have_posts()) : ?>
        <div class="acf-map">
            <?php while ($query->have_posts()) : $query->the_post(); 
                // Load sub field values.
                $location = get_field('maps' , get_the_id());
                var_dump($location);
                $short_desc = get_field('short_description', get_the_id());
                $title = get_the_title();
            ?>
                <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>">
                    <h3><?php echo $title; ?></h3>
                    <p><?php echo $short_desc; ?></p>
                    <p><em><?php echo esc_html($location['address']); ?></em></p>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
    <?php wp_reset_query(); ?>
</div>

