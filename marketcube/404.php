<?php get_header(); ?>
	<section class="page-banner" style="background-image: url('<?php echo ot_get_option('default_banner'); ?>');">
        <div class="page-banner-container">
			<h1>404 Page Not Found</h1>
		</div>
    </section>
    <section class="page-contents gen-container">
        <div class="container">
			<h2 class="gen-page-title">404 Page Not Found</h2>
			<div class="error_img">
				<img src="<?php bloginfo('template_directory');?>/images/404.png" alt="404"/>
			</div>
        </div>
    </section>
<?php get_footer(); ?>