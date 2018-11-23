<?php get_header();
wp_enqueue_script('validate');
add_action('wp_footer','single_scripts',25);
	function single_scripts() { ?>
		<script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery('#commentform').validate({
					rules: {
						author: {
						  required: true,
						},
						email: {
							required: true,
							email: true,
						},
						comment: {
							required: true,
						},
					}
				});
			});
		</script><?php
	}
 ?>
	<?php if(get_field('banner_image')):?>
		<section class="page-banner" style="background-image: url('<?php echo get_field('banner_image'); ?>');">
	<?php else: ?>
		<section class="page-banner" style="background-image: url('<?php echo ot_get_option('default_banner'); ?>');">
	<?php endif; ?>
		<div class="page-banner-container">
			<?php $title = get_post_type();				
			if($title =="post"):?>					
				<h1>Blog</h1>
			<?php else:?>		
				<h1><?php echo str_replace("-"," ",$title);?></h1>			
			<?php endif;?>
		</div>
	</section>
	<section class="page-contents gen-container">
		<div class="container">
			<div class="page-gen-inner">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<h2 class="gen-page-title gen-post-title"><?php the_title();?></h2>
					<div class="blog_info clearfix">				
						<span class="blog_date">Posted on <?php echo get_the_date('M d, Y'); ?></span>				
						<span class="blog_author">by <?php the_author_nickname(); ?></span>			
					</div>	
					<?php if(has_post_thumbnail()):?>
						 <div class="thumb-page">
							<?php the_post_thumbnail('full');?>
						 </div>
					 <?php endif;?>
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
					<?php $cats = get_the_category(get_the_ID());
					$cat_list = '';
					if($cats){
						foreach($cats as $cat){
							$cat_list .= '<a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a>';
						}
					}
					
					$tags = get_the_tags(get_the_ID());			
					$tag_list = '';			
					if ($tags) {				
						foreach($tags as $tag) {
							$tag_list .= '<a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>';
						}			
					}?> 
					<div class="tag_info clearfix">
						<?php if($cat_list) { ?>
							<p>Posted in  <?php echo $cat_list; ?></p>
						<?php } if($tag_list) { ?>
							<p>Tagged <?php echo $tag_list; ?></p>
						<?php } ?>
					</div> 
					<div class="blog_nav">
						<div class="prev">
							<?php previous_post_link('%link', 'Previous', TRUE); ?> 
						</div>
						<div class="next">   
							<?php next_post_link('%link', 'Next', TRUE); ?>
						</div>  
					</div>
					<div class="single_comment">
						<?php comments_template(); ?>
					</div>	
				<?php endwhile; endif;?>
			</div>
		</div>
	</section>
<?php get_footer(); ?>