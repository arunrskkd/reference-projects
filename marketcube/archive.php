<?php get_header();	?>
	<section class="page-banner" style="background-image: url('<?php echo ot_get_option('default_banner'); ?>');">
        <div class="page-banner-container">
			<h1>Archive Page</h1>
		</div>
    </section>
    <section class="page-contents gen-container">
        <div class="container">
			<div class="page-gen-inner">
				<?php is_tag(); ?>				
				<?php if (have_posts()) : ?>					
					<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>						
					<?php /* If this is a category archive */ if (is_category()) { ?>							
						<h2 class="gen-page-title gen-post-title">Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>						
					<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>							
						<h2 class="gen-page-title gen-post-title">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>						
					<?php /* If this is a daily archive */ } elseif (is_day()) { ?>							
						<h2 class="gen-page-title gen-post-title">Archive for <?php the_time('F jS, Y'); ?></h2>						
					<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>							
						<h2 class="gen-page-title gen-post-title">Archive for <?php the_time('F, Y'); ?></h2>						
					<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>							
						<h2 class="gen-page-title gen-post-title">Archive for <?php the_time('Y'); ?></h2>						
					<?php /* If this is an author archive */ } elseif (is_author()) { ?>							
						<h2 class="gen-page-title gen-post-title">Author Archive</h1>						
					<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>							
						<h2 class="gen-page-title gen-post-title">Blog Archives</h2>						
					<?php } ?>				
				<?php endif;?> 
				<?php include('searchform.php');?>
				<?php if (have_posts()): 
					while (have_posts()) : the_post(); ?>
						<div class="search_post clearfix">
							<h2 class="search-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="search_post_meta">
								<p>Posted By <span><?php the_author_meta('nickname'); ?></span> On <span><?php echo get_the_date('D, M j, Y', $post->ID); ?></span></p>
							</div>
							<?php if ( has_post_thumbnail() ) { 
								$url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
								$thumb_params = array( 'width' => 340, 'height' => 160 );
								$thumb = bfi_thumb( $url, $thumb_params );?>
								<div class="sear_thumb">
								  <img src="<?php echo $url; ?>" alt="<?php the_title(); ?>" />
								</div>
							<?php }?>
							<div class="sear_cont <?php if ( has_post_thumbnail() ) { echo 'sear_cont_thum'; }?>">
								<?php the_excerpt(); ?>
							</div>
							<a class="sear_read" href="<?php the_permalink(); ?>">Read more</a>
						</div>
					<?php endwhile;?> 
					<div class="navigation row">
						<div class="alignleft"><?php next_posts_link('&laquo; Previous') ?></div>
						<div class="alignright"><?php previous_posts_link('Next &raquo;') ?></div>
					</div>
				<?php else : ?>
						<h2 class="center">Not Found</h2>
						<p class="center">Sorry, but you are looking for something that isn't here.</p>
				<?php endif; ?>
			</div>
        </div>
    </section>
<?php get_footer(); ?>