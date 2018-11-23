<?php
/*
  Template Name: Blog page
 */

get_header();
// wp_enqueue_script('swiper');

add_action('wp_footer', 'san_scripts', 21);

function san_scripts() {
    ?>
<script>
/*var swiper = new Swiper('.client-slider', {
        paginationClickable: true,
        slidesPerView: 5,
        spaceBetween: 0,
        autoplay: 2500,
        speed: 1000,
        loop: true,
        breakpoints: {
            1024: {
                slidesPerView: 5,
                spaceBetween: 0
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 0
            },
            640: {
                slidesPerView: 2,
                spaceBetween: 0
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 0
            }
        }
    });*/
</script>

<?php }
?>

<!-- banner -->
    <div class="banner" style="height: 300px; background: #ccc;"></div>
<!-- end banner -->
<!-- Blog -->
   <div class="main-container container">
        <div class="row">
            <div class="col-md-9">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post(); ?>
                <div class="post-list">
                <div class="post-date">
                    <?php echo get_the_date('M j Y', $post->ID); ?>
                </div>
                    <h2 class="post-title">
                        <a href="<?php echo get_permalink();?>" title="<?php the_title();?>"><?php the_title(); ?></a>
                    </h2>
                    <span class="post-name">Posted By 
                        <span><?php the_author_meta('nickname'); ?></span>
                        On 
                        <span><?php echo get_the_date('D, M j, Y', $post->ID); ?></span>
                    </span>   
                    <?php if ( has_post_thumbnail() ) { 
                        echo '<figure class="thumbnail">';
                        the_post_thumbnail(); 
                        echo '</figure>';
                    }?>  
                    <?php the_excerpt();?>     
                    <a class="more" href="<?php the_permalink(); ?>">Read more</a>
                </div>
            <?php endwhile;
            the_posts_navigation();
            else : ?>
            <p>
                <?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'smpl' ); ?>          
            </p>
            <?php get_search_form(); 
            endif; ?>
        </div>
        <div class="col-md-3">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<!-- end Blog -->



<?php get_footer(); ?>
