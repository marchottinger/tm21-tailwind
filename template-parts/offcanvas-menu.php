<div id="offcanvas-menu" class="offcanvas fixed w-80 md:w-96 bg-white shadow-2xl right-0 top-0 h-full z-30 translate-x-80 md:translate-x-96 opacity-0 pointer-events-none transition-all duration-500 ease-out">

   <?php wp_nav_menu(
        array(
            'container_id'    => 'primary-menu',
            'container_class' => 'mt-0 relative p-0 bg-transparent block',
            'menu_class'      => 'menu accordion',
            'theme_location'  => 'primary',
            'li_class'        => 'text-primary  w-64',
            'fallback_cb'     => false,
        )
    ); ?>

</div>
