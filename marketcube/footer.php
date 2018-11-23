	</main>
    <footer class="footer">
        <div class="container-fluid">
            <div class="footimgsect">
				<?php if( ot_get_option('logo_img') ):?>
					<a href="<?php echo esc_url( home_url( '/' )); ?>" class="logo_image" title="<?php bloginfo('name'); ?>">
						<img src="<?php echo ot_get_option('logo_img'); ?>" alt="<?php bloginfo('name'); ?>" />
					</a>
					
				<?php endif; ?>
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('header-sidebar') ) : 
 
endif; ?>
            </div>
            <div class="footmenu">
                <?php wp_nav_menu( array( 'container' => '', 'theme_location' => 'footer_menu', 'menu_class' => 'clearfix' ) ); ?>
                <p><?php echo ot_get_option('footer_copy_right_text'); ?></p>
            </div>
        </div>
	</footer>
	<?php wp_footer();
	if(ot_get_option('google_analytics_tracking_code')):
		echo ot_get_option('google_analytics_tracking_code');
	endif;
	if( ot_get_option('custom_js') ):?>
		<script type="text/javascript">
			<?php echo ot_get_option('custom_js'); ?>
		</script>
	<?php endif; ?>
</body>
</html>