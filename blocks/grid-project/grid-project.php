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
$classes = 'block-grid-projet';
if (!empty($block['className'])) {
    $classes .= sprintf(' %s', $block['className']);
}
if (!empty($block['align'])) {
    $classes .= sprintf(' align%s', $block['align']);
}

$list_projetcs_id = get_field("list_projects");
$columns = get_field("columns");

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($classes); ?>">
    <div class="grid-projet grid-x grid-padding-y  grid-padding-x small-up-1 medium-up-<?php echo $columns ?>">

        <?php

        $args = array(
            'posts_per_page' => -1,
            'post_type' => 'projet',
            'post__in' => $list_projetcs_id,
            'order' => 'ASC',
            'orderby' => "post__in"

        );

        $query = new WP_Query($args);

        ?>

        <?php if ($query->have_posts()) : ?>
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="cell text-center">
                 
                        <?php get_template_part("parts/cell", "project-slider"); ?>
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_field("short_description", get_the_id()); ?></p>
                        <a class="color--black size--fat"  href="<?php echo get_permalink() ?>"><i class="fas fa-plus-square"></i></a>
                    
                </div>
            <?php endwhile; ?>

        <?php endif; ?>

        <?php wp_reset_query(); ?>

    </div>

</div>