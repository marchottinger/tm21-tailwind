<?php
// Register a slider block.
add_action('acf/init', 'my_register_blocks');
function my_register_blocks(){

    // check function exists.
    if (function_exists('acf_register_block_type')) {


        // acf_register_block_type(array(
        //     'name'              => 'slider-post',
        //     'title'             => __('Slider Post'),
        //     'description'       => __('A custom slider block of posts.'),
        //     'render_template'   => 'parts/blocks/slider-post/slider-post.php',
        //     'category'          => 'formatting',
        //     'icon'                 => 'images-alt2',
        //     //'align'				=> 'full',
        //     'mode' => 'edit',
            
        //     'enqueue_assets'     => function () {
        //         wp_enqueue_style('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1');
        //         wp_enqueue_script('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true);
        //         wp_enqueue_script('block-slider', get_template_directory_uri() . '/parts/blocks/slider-post/slider.min.js', array(), '1.0.0', true);
        //     },
        // ));



       
        acf_register_block_type(array(
            'name'              => 'grid-news',
            'title'             => __('Grid News'),
            'description'       => __('A block that list the news.'),
            'category'          => 'formatting',
            'icon'              => 'images-alt2',
            'mode'              => 'edit',
            'render_template'   => 'parts/blocks/grid-news/grid-news.php'
        ));
        
        acf_register_block_type(array(
            'name'              => 'grid-team',
            'title'             => __('Grid team'),
            'description'       => __('A block that list the team.'),
            'category'          => 'formatting',
            'icon'              => 'images-alt2',
            'mode'              => 'auto',
            'render_template'   => 'parts/blocks/grid-team/grid-team.php'
        ));
        acf_register_block_type(array(
            'name'              => 'grid-project',
            'title'             => __('Grid project'),
            'description'       => __('A block that list the projects.'),
            'category'          => 'formatting',
            'icon'              => 'images-alt2',
            'mode'              => 'edit',
            'render_template'   => 'parts/blocks/grid-project/grid-project.php'
        ));
        acf_register_block_type(array(
            'name'              => 'socials',
            'title'             => __('Socials'),
            'description'       => __('A block that list of social networks.'),
            'category'          => 'formatting',
            'icon'              => 'images-alt2',
            'mode'              => 'edit',
            'render_template'   => 'parts/blocks/socials/socials.php'
        ));
        acf_register_block_type(array(
            'name'              => 'maps',
            'title'             => __('maps'),
            'description'       => __('A block that show the spots on a map'),
            'category'          => 'formatting',
            'icon'              => 'images-alt2',
            'mode'              => 'edit',
            'render_template'   => 'parts/blocks/block-maps/block-maps.php'
        ));
    }
}
