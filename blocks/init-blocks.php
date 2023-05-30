<?php
// Register a slider block.
add_action('acf/init', 'tm21_register_blocks');
function tm21_register_blocks(){

    // check function exists.
    if (function_exists('acf_register_block_type')) {
       
        acf_register_block_type(array(
            'name'              => 'multitabs',
            'title'             => __('Multi-tabs'),
            'description'       => __('Tabs within tabs'),
            'render_template'   => 'blocks/multitabs/multitabs.php',
			'category'          => 'formatting',
			'icon' 				=> 'table-row-after',
            'enqueue_assets' => function(){
                wp_enqueue_script( 'multitabs', get_template_directory_uri().'/blocks/multitabs/multitabs.js', array('jquery'), '', true );
            },
        ));


        acf_register_block_type(array(
            'name'              => 'accordions',
            'title'             => __('Accordions'),
            'description'       => __('Accordions'),
            'render_template'   => 'blocks/accordions/accordions.php',
			'category'          => 'formatting',
			'icon' 				=> 'image-flip-vertical',
            'supports'		    => [
                'align'			=> false,
                'anchor'		=> true,
                'customClassName'	=> true,
                'jsx' 			=> true,
            ]
        ));


    }
}
