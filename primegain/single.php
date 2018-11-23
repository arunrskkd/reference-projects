<?php
get_header();
add_action('wp_footer', 'scripts', 25);
function scripts() {
    ?>
    <script type="text/javascript">
        $(document).ready(function(e) {
        });
    </script>
    <?php } ?>  
    <section class="inner-header-section" style="padding: 15px 0; background-color: #cfcfcf;">
        <div class="container">
            <h1 class="title"><?php the_title(); ?> </h1>
        </div>  
    </section>
    <div class="main-container container" id="post_<?php the_ID(); ?>">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="post clearfix" id="post-<?php the_ID(); ?>">
                <span class="post-name">Posted By 
                    <span><?php the_author_meta('nickname'); ?></span>
                    On 
                    <span><?php echo get_the_date('D, M j, Y', $post->ID); ?></span>
                </span> 
                <?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
                <div class="comments-section">
                    <?php comments_template(); ?>
                </div>
            </div>
            <?php
            endwhile;
         endif; ?> 
    </div>
    <?php get_footer(); ?>