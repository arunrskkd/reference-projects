<?php
get_header();
add_action('wp_footer', 'scripts', 25);
function scripts() {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function(e) {
            /*jQuery(document).ready(function() {
                jQuery( '.menu-item-has-children' ).hover(
                    function(){
                        jQuery(this).children(".sub-menu").stop(true,true).slideDown("slow");
                    },
                    function(){
                        jQuery(this).children('.sub-menu').stop(true,true).slideUp(200);
                    }
                    );
            });*/
        });
    </script>
    <?php } ?>  
    <section class="inner-header-section" style="height: 100px;background-color: #cfcfcf;">
        <div class="container">
            
            <h1 class="title"><?php the_title(); ?> </h1>
               
        </div>  
    </section>
    <div class="main-container container" id="post_<?php the_ID(); ?>">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="post clearfix" id="post-<?php the_ID(); ?>">
                <?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
            </div>
            <?php
            endwhile;
            endif; ?> 
        </div>
        <?php get_footer(); ?>