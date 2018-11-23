<?php get_header();?>
	<section class="default-index container">
		<?php if(have_posts()):
			while(have_posts()): the_post();?>
				<div class="posts">
					<h2><a href="<?php echo get_the_permalink();?>"><?php the_title();?></a></h2>
					<p><?php echo get_the_excerpt();?></p>
				</div><?php 
			endwhile;
		endif;?>
	</section>
<?php get_footer(); ?>