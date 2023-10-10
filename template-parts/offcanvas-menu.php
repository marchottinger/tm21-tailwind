<div id="offcanvas-menu" class="fixed top-0 right-0 z-30 h-full transition-all duration-500 ease-out bg-white shadow-2xl opacity-0 pointer-events-none offcanvas w-80 md:w-96 translate-x-80 md:translate-x-96">

   <?php wp_nav_menu(
        array(
            'container_id'    => 'primary-menu',
            'container_class' => 'mt-0 relative p-0 bg-transparent block',
            'menu_class'      => 'menu accordion',
            'theme_location'  => 'primary',
            'li_class'        => 'text-primary',
            'fallback_cb'     => false,
        )
    ); ?>

</div>
