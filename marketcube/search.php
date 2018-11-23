<?php get_header();	?>
    <div class="page-banner" style="background-image: url('<?php echo ot_get_option('default_banner'); ?>');">
        <div class="page-banner-container">
			<h1>Search Page</h1>
		</div>
    </div>
    <div class="page-contents gen-container">
        <div class="wrapper">
			<div class="page-gen-inner">
				<h2 class="gen-page-title gen-post-title">Search Result For <span style="text-transform: none;"><?php echo get_search_query(); ?></h2>
				<?php include('searchform.php');?>
				<?php if (have_posts()): 
					while (have_posts()) : the_post(); ?>
						<div class="search_post clearfix">
							<h2 class="search-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="search_post_meta">
								<p>Posted By <span><?php the_author_meta('nickname'); ?></span> On <span><?php echo get_the_date('D, M j, Y', $post->ID); ?></span></p>
							</div>
							<?php if ( has_post_thumbnail() ) { 
								$url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()),'full');
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
    </div>
<?php get_footer(); ?>