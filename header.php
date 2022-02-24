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

	<?php do_action('tailpress_site_before'); ?>
	<div id="page" class="flex-col min-h-screen flex ">
		<?php do_action('tailpress_header'); ?>

		<div class="overlay fixed w-full h-full left-0 top-0 right-0 bottom-0 z-20 bg-white opacity-0 pointer-events-none transition-all duration-500 ease-out"></div>

		<?php get_template_part('template-parts/offcanvas', 'menu') ?>

		<header class="topbar fixed z-30 w-full py-4 transition-all duration-300  ">
			<div class="container m-auto flex items-center justify-end ">
				<a href="<?php echo home_url(); ?>" class="mr-auto">
					<?php if (has_custom_logo()) : ?>
						<div class="flex align-middle mr-2">
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

				<?php wp_nav_menu(
					array(
						'container_id'    => 'language-switcher',
						'container_class' => 'mt-8 md:mt-0 hidden md:block',
						'menu_class'      => 'menu font-semibold',
						'theme_location'  => 'language-switcher',
						'li_class'        => '',
						'fallback_cb'     => false,
					)

				); ?>

				<div class="burger-menu lg:hidden group flex items-center justify-center ml-6 text-2xl text-primary cursor-pointer w-11 h-11">
					<i class="far fa-bars transition-all group-hover:scale-110"></i>
				</div>

			</div>
		</header>

		<div id="content" class="site-content">
			<?php do_action('tailpress_content_start'); ?>
			<main>