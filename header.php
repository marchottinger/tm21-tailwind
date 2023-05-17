<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class('bg-white text-gray-900 antialiased'); ?>>

	<div id="page" class="flex flex-col min-h-screen ">

		<div class="fixed top-0 bottom-0 left-0 right-0 z-20 w-full h-full transition-all duration-500 ease-out bg-white opacity-0 pointer-events-none overlay"></div>

		<?php get_template_part('template-parts/offcanvas', 'menu') ?>

		<header class="fixed z-30 w-full py-4 transition-all duration-300">
			<div class="container flex items-center justify-end m-auto">
				<a href="<?php echo home_url(); ?>" class="mr-auto">
					<?php if( has_custom_logo() ) : ?>
						<div class="flex mr-2 align-middle">
							<?php
								$custom_logo_id = get_theme_mod('custom_logo');
								echo wp_get_attachment_image($custom_logo_id, 'full', "", ["class" => "w-24"]);
							?>
						</div>
					<?php else : ?>
						<?php get_template_part('template-parts/logo', null) ?>
					<?php endif; ?>
				</a>

				<?php wp_nav_menu(
					array(
						'container_id'    => 'primary',
						'container_class' => 'hidden lg:block',
						'menu_class'      => 'menu dropdown',
						'theme_location'  => 'primary',
						'li_class'        => '',
						'fallback_cb'     => false,
					)
				); ?>

				<div class="flex items-center justify-center ml-6 text-2xl cursor-pointer burger-menu lg:hidden group text-primary w-11 h-11">
					<i class="transition-all far fa-bars group-hover:scale-110"></i>
				</div>

			</div>
		</header>

		<div id="content" class="site-content">
			<main>