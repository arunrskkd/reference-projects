<?php
get_header();
?>

<div class="container product-outer">
    <div class="row">
   
        <div class=" product-cat">
        <?php 
        if(!$category->parent>0)
        {
         $terms = get_terms( array(
                'post_type' => 'products',
                'taxonomy' => 'categories',
                'hide_empty' => false,
            ) );
         }
      
            ?>
            
            <?php if($terms)
            {?><ul>
            <?php
            foreach($terms as $value)
            {?>
            <li <?php if($category->term_id==$value->term_id){?> class="active"<?php }?>><a href="<?php echo get_term_link( $value->term_id ); ?>"><?php echo $value->name;?></a></li>
            <?php }?></ul>
            <?php
        }?>
        </div>
        
        <div class=" products">
        <?php     
            if(have_posts()):
                while(have_posts()): the_post();?>
                    <div class="product-item"><a href="<?php echo get_the_permalink();?>"><span><?php foreach (get_the_terms(get_the_ID(), 'categories') as $cat) {echo $cat->name;}?><br/><b><?php the_title();?></b></span>
                    <?php if(has_post_thumbnail()): the_post_thumbnail('full');?> 
                    <?php endif;
                   ?></a>
                    </div>
                    <?php endwhile;?>
            <?php endif; ?>
            <div class="pagination">
            <?php

                $big = 999999999; // need an unlikely integer

                echo paginate_links( array(
                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $wp_query->max_num_pages
                ) );
            ?>
            </div>
           <?php wp_reset_postdata();?>
        </div>
                <?php }?>
    </div>
</div>
<?php get_footer(); ?>
