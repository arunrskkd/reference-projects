<?php
get_header();?>

<div class="prod-details">     
<?php 
					while ( have_posts() ){
						the_post();							// Post Loop
						mfn_builder_print( get_the_ID() );	// Content Builder & WordPress Editor Content
					}
				?>
</div>
<?php
 $id = get_the_ID();
?>

<?php get_footer(); ?>
