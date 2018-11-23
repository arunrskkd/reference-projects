<div id="sidebar2" class="sidebar">
	<?php 	/* Widgetized sidebar, if you have the plugin installed. */
	if ( function_exists('dynamic_sidebar')  && dynamic_sidebar('Blog Sidebar'))  : else :  ?>
	<?php if ( is_404() || is_category() || is_day() || is_month() ||
		is_year() || is_search() || is_paged() ) {
			?> 
			<div class="pagewidget widget">
				<?php /* If this is a 404 page */ if (is_404()) { ?>
				<?php /* If this is a category archive */ } elseif (is_category()) { ?>
				<p>Browsing the archives for the <?php single_cat_title(''); ?> category.</p>
				<?php /* If this is a yearly archive */ } elseif (is_day()) { ?>
				<p>Browsing the blog archives
					for the day <?php the_time('l, F jS, Y'); ?>.</p>
					<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
					<p>Browsing the blog archives
						for <?php the_time('F, Y'); ?>.</p>
						<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
						<p>Browsing the blog archives
							for the year <?php the_time('Y'); ?>.</p>
							<?php /* If this is a monthly archive */ } elseif (is_search()) { ?>
							<p>Search results for <strong>'<?php the_search_query(); ?>'</strong>. If you are unable to find what you are looking for, try one of the following links.</p>
							<?php /* If this is a monthly archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
							<p>Browsing the blog archives.</p>
							<?php } ?>
						</div> <?php }?>
						<div class="pagewidget widget"><h3>Pages</h3>
							<ul>
								<?php wp_list_pages('title_li='); ?>
							</ul>
						</div>
						<div class="pagewidget widget"><h3>Archives</h3>
							<ul>
								<?php wp_get_archives('type=monthly'); ?>
							</ul>
						</div>
						<div class="pagewidget widget"><h3>Categories</h3>
							<ul>
								<?php wp_list_categories('title_li='); ?>
							</ul>
						</div>
						<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
						<?php wp_list_bookmarks(); ?>
						<div class="pagewidget widget">
							<h3>Meta</h3>
							<ul>
								<?php wp_register(); ?>
								<li><?php wp_loginout(); ?></li>
								<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
								<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
								<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
								<?php wp_meta(); ?>
							</ul>
						</div>
						<?php } ?>
					<?php endif; ?>
				</div>