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
$classes = 'block-grid-news';
if (!empty($block['className'])) {
    $classes .= sprintf(' %s', $block['className']);
}
if (!empty($block['align'])) {
    $classes .= sprintf(' align%s', $block['align']);
}

$news = get_field("news");

 
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($classes); ?>">
    <h3 class="has-text-color"><?php _e('Latest news', 'valentine') ?></h3>
    <?php
    
    $args = array(
       'post__in' => $news  
    );
    
    $query = new WP_Query( $args );
    
    ?>
    
    <?php if( $query->have_posts() ) : ?>
        <div class="grid-news grid-x grid-padding-x">
        <?php while ( $query->have_posts() ) : $query->the_post(); 
            $cat_name = get_the_category()[0]-> name ;
            $cat_id = get_the_category()[0]-> cat_ID;
            $cat_link = get_category_link($cat_id);
        ?>
            <div class="cell large-4">
            <a href="<?php the_permalink(); ?>">
                <?php echo get_the_post_thumbnail("", "large") ?>
                <?php get_template_part( 'parts/content', 'byline' ); ?>
                <h4><?php the_title(); ?></h4>
            </a>
            <div class="wp-block-button icon-base is-style-outline">
                <a href="<?php echo  $cat_link ?>" class="wp-block-button__link">
                    <?php echo $cat_name ; ?> 
                </a>
            </div>
            
            </div>
        <?php endwhile; ?>
        </div>
    <?php endif; ?>
    
    <?php wp_reset_query(); ?>
    

</div>