<?php get_header();?>
	<?php if(get_field('banner_image')):?>
		<section class="page-banner" style="background-image: url('<?php echo get_field('banner_image'); ?>');">
	<?php else: ?>
		<section class="page-banner" style="background-image: url('<?php echo ot_get_option('default_banner'); ?>');">
	<?php endif; ?>
		<div class="page-banner-container">
			<?php if(get_field('banner_title')):?>
				<h1><?php the_field('banner_title'); ?></h1>
			<?php else:?>
				<h1><?php the_title(); ?></h1>
			<?php endif;?>
		</div>
	</section>
  	<section class="page-contents gen-container">
		<div class="container">
			<div class="page-gen-inner">
				 <h2 class="gen-page-title"><?php the_title();?></h2>
				 <?php if (have_posts()) : while (have_posts()) : the_post(); 
					 if(has_post_thumbnail()):?>
						 <div class="thumb-page">
							<?php the_post_thumbnail('full');?>
						 </div>
					 <?php endif;
					the_content('<p class="serif">Read the rest of this page &raquo;</p>');
				endwhile; endif;?>
            </div>
		</div>
	</section>
<?php get_footer(); ?>