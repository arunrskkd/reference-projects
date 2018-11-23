<?php
/*
  Template Name: Productss foundry-molding-machine
 */
get_header();
?>
<?php
// the query
$all_posts = array( 'post_type' => 'products', 'post_status' => 'publish', 'posts_per_page' => -1 , 
'tax_query' => array(
  array(
      'taxonomy' => 'categories',
      'field' => 'slug',
      'terms' => 'foundry-molding-machine',
  ),
), ) ;

$project_query = new WP_Query($all_posts);

if ( $project_query->have_posts() ) :
?>

<div class="container">

  <ul class="productuls">
    <?php while ( $project_query->have_posts() ) : $project_query->the_post(); ?>

    

      <li>
        <div class="feature_box">
        <div class="feature_box_wrapper">
        <div class="photo_wrapper">
 
                <?php $project_params = array('width' => 440, 'height' => 270);

                        if(has_post_thumbnail($project_query->post->ID)&&(get_the_post_thumbnail($project_query->post->ID)!='')){ 
                          $project_thumb = bfi_thumb(get_the_post_thumbnail_url($project_query->post->ID), $project_params); 
                        }
                        ?>

                    <img src="<?php echo $project_thumb; ?>" alt="<?php the_title(); ?>">
         
       
 
              
        </div>
        <div class="desc_wrapper">
        <h4><?php the_title(); ?></h4>
        <div class="desc">
        <a href="<?php the_permalink(); ?>" class="readmoreproj">Read more</a>
        </div>
        </div>
        </div>
        </div>
      </li>



    <?php endwhile; ?>
  </ul>
  </div>
<?php else : ?>
  <p><?php _e( 'Sorry, no posts were found.' ); ?></p>
<?php endif; ?>

<?php wp_reset_postdata();
get_footer(); 

?>