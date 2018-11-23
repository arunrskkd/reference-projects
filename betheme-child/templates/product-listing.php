<?php
/*
  Template Name: Projects
 */
get_header();
add_action('wp_footer', 'san_scripts', 21);
function san_scripts() { ?>
    <script>
        jQuery(document).ready(function() {
        }); 
    </script>
<?php } ?>
<div class="project-sec">
<div class="proj-container">
  <?php 
    $page_catID = get_field('page_category'); 
    $project_args = array(
        'paged' => $paged,
        'post_type' =>'project',
        'order' =>'ASC',
        'orderby' => 'menu_order',
        'posts_per_page' => -1,
    );
    $project_query = new WP_Query($project_args);
    if ($project_query->have_posts()) : $clr =0; ?>       
    <div class="projectList">
    <div class="rp-outer">
      <?php while ($project_query->have_posts()) : $project_query->the_post();
      if($clr==5){$clr=0;} $clr++; ?>
      <div class="proj-box">   
          <div class="sm-img">
              <a href="<?php the_permalink(); ?>">
                <?php $project_params = array('width' => 440, 'height' => 270);
                        if(has_post_thumbnail($project_query->post->ID)&&(get_the_post_thumbnail($project_query->post->ID)!='')){ 
                          $project_thumb = bfi_thumb(get_the_post_thumbnail_url($project_query->post->ID), $project_params); 
                        }else{
                          $project_thumb = bfi_thumb(get_stylesheet_directory_uri().'/images/no-image.jpg', $project_params); 
                        } ?>
                    <img src="<?php echo $project_thumb; ?>" alt="<?php the_title(); ?>">
              </a>
          </div>
          <div class="lg-text color<?php echo $clr; ?>">
              <a href="<?php the_permalink(); ?>"><h3><?php echo get_the_title(); ?></h3></a>
              <?php echo trim_text(get_the_content(),150); ?>
              <div class="box-ftr">
                <ul>
                  <li><b><?php _e('Project/Initiative :','tyf'); ?> </b><?php echo (get_field('is_project',get_the_ID())=='Initiative')?'Initiative':'Project'; ?></li>
                  <?php if(get_field('project_status',get_the_ID())){ ?>
                  <li><b><?php _e('Status :','tyf'); ?> </b><?php echo get_field('project_status',get_the_ID()); ?></li>
                  <?php } if(get_field('duration',get_the_ID())){ ?>
                  <li><b><?php _e('Period:','tyf'); ?> </b><?php echo get_field('duration',get_the_ID()); ?></li>
                  <?php } if(get_field('location',get_the_ID())){ ?>
                  <li><b><?php _e('Intervention category :','tyf'); ?> </b><?php echo get_field('location',get_the_ID()); ?></li>
                  <?php } if(get_field('funded_by',get_the_ID())){ ?>
                  <li><b><?php _e('Funded By :','tyf'); ?> </b><?php echo get_field('funded_by',get_the_ID()); ?></li>
                  <?php } if(get_field('location',get_the_ID())){ ?>
                  <li><b><?php _e('Location :','tyf'); ?> </b><?php echo get_field('location',get_the_ID()); ?></li>
                  <?php } if(get_field('partner_with',get_the_ID())){ ?>
                  <li><b><?php _e('Partner with :','tyf'); ?> </b><?php echo get_field('partner_with',get_the_ID()); ?></li>
                  <?php } if(get_field('targeted',get_the_ID())){ ?>
                  <li><b><?php _e('Targeted Beneficiaries :','tyf'); ?> </b><?php echo get_field('targeted',get_the_ID()); ?></li>
                  <?php } ?>
               </ul>
              </div>
                  <a href="<?php the_permalink(); ?>" class="proj-more"><i class="fa fal fa-long-arrow-right"></i></a>    
          </div>
      </div><!-- rp-box -->
      <?php endwhile; ?> 
    </div>
    </div>
  <?php endif; ?>
</div>
</div>
<?php get_footer(); ?>