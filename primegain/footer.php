<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Acodez_Themes
 */

?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
        <div class="row">
          <div class="col-md-6">
          <?php if ( is_active_sidebar( 'footer_widget_one' ) ) : ?>
						<div class="footsectone">
               <?php dynamic_sidebar( 'footer_widget_one' ); ?>
						 </div>
            <?php endif; ?>
          </div>
          <div class="col-md-6">
          <div class="row">
            <div class="col-sm-7">
            <div class="row">
							<?php wp_nav_menu( array('container' => 'div', 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ,'menu_class' => 'footsecttwo') ); ?>
            </div>
            </div>
            <div class="col-sm-5">
            <div class="row">

                <div class=" col-xs-12">
                    <div class="footsectthree">
											<?php if(get_field('soc_gp','option') || get_field('soc_tw','option') || get_field('soc_fa','option') || get_field('soc_ins','option') || get_field('soc_pin','option')){ ?>
                        <h3>Find Us On</h3>
                        <h4>
													<?php if(get_field('soc_gp','option')){ ?>
													<a href="<?php echo get_field('soc_gp','option'); ?>" target="_blank"><i class="fab fa-google-plus-g"></i></a>
													<?php } ?>
													<?php if(get_field('soc_tw','option')){ ?>
													<a href="<?php echo get_field('soc_tw','option'); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
													<?php } ?>
													<?php if(get_field('soc_fa','option')){ ?>
													<a href="<?php echo get_field('soc_fa','option'); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
													<?php } ?>
													<?php if(get_field('soc_ins','option')){ ?>
													<a href="<?php echo get_field('soc_ins','option'); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
													<?php } ?>
													<?php if(get_field('soc_pin','option')){ ?>
													<a href="<?php echo get_field('soc_pin','option'); ?>" target="_blank"><i class="fab fa-pinterest-p"></i></a>
													<?php } ?>
												</h4>
												<?php } ?>
                        <h5>Created by Acodez with  <i class="fas fa-heart"></i> </h5>
                    </div>

                </div>
            </div>
            </div>
          </div>

          </div>
        </div>
	</div>
</footer><!-- #colophon -->
<?php wp_footer(); ?>

</body>
</html>
