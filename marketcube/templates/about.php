<?php
    /*
    Template Name: about
    */
    get_header();

?>

<section class="page-wrap clearfix">
    		<h1 class="page-title" data-aos="fade-up" data-aos-easing="ease-out-cubic"  data-aos-duration="800"><?php  echo get_field("heading");  ?></h1>
    		<div class="abt-s2">
    			<div class="container">
    				<div class="abt-s2-col1"  >
    					<h2><?php  echo get_field("s3heading"); ?></h2>
    					<h5><?php  echo get_field("s3heading2"); ?></h5>
                    <p><?php  echo get_field("s3para"); ?></p>
    				</div>
    				<div class="abt-s2-col2" data-aos="fade-left" data-aos-easing="ease-out-cubic"  data-aos-duration="800" data-aos-offset="300">
    					<img src="<?php  echo get_field("s3image");   ?>" alt=""/>
    				</div>
    			</div>
    		</div>
    		<div class="abt-s3">
    			<div class="container">
    				<h2><?php  echo get_field("s2heading");   ?></h2>
    				<h3><?php  echo get_field("s2subheading");   ?></h3>
    				<div class="abt-s3-team clearfix">
					<?php  
					$gallery = get_field('s2gallery');
					foreach($gallery as $gal){ ?>
					 <div class="blk-team">
    						<img src="<?php echo $gal['s2galleryimage']; ?>" alt=" <?php echo $gal['s2gallerytext1']; ?>"/>
    						<div class="team-mem-info">
    							<h4> <?php echo $gal['s2gallerytext1']; ?></h4>
    							<span> <?php echo $gal['s2gallerytext2']; ?></span>
    						</div>
    					</div>
					
					 
					<?php  } ?>
    				</div>
    			</div>
    		</div>
    		<div class="abt-s4 clearfix">
    			<div class="container">
    				<h2><?php  the_field("s2bottom text");   ?></h2>
    				<div class="abt-s4-btn-wrap clearfix">
    					<a href="#" class="abt-s4-btn"><?php  the_field("s2buttontext");   ?></a>
    				</div>
    			</div>
    		</div>
    	</section>














<?php get_footer(); ?>