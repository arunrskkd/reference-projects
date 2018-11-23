<?php
/*
  Template Name: Faq page
 */

get_header();

add_action('wp_footer', 'san_scripts', 21);

wp_enqueue_script('responsivetab');

function san_scripts() {
    ?>
   
    <script>
   
      jQuery( document ).ready(function() {
        
        jQuery('#parentTab').easyResponsiveTabs({
          type: 'default', //Types: default, vertical, accordion
          width: 'auto', //auto or any width like 600px
          fit: true, // 100% fit in a container
          tabidentify: 'hor_1', // The tab groups identifier

        });


          jQuery(".vertical-tab li:first-child .tab-item").addClass("show").parent().siblings().children().find(".tab-item").removeClass("show");
          jQuery(".vertical-tab li:first-child .tabs-container").parent().siblings().children(".tabs-container").hide();
          

        jQuery(".vertical-tab .tab-item").click(function(){

          if(jQuery(this).hasClass("show"))
            {
              jQuery(this).removeClass("show");
              jQuery(this).next().slideUp();
            }
          else
            {
              jQuery(" .vertical-tab .tab-item").removeClass("show");
            jQuery(" .vertical-tab .tab-item").next().slideUp();
              jQuery(this).addClass("show");
              jQuery(this).next().slideDown();
            }
            });
        });
     </script>

<?php } ?>

<?php $faqterms= get_terms( array(
    'taxonomy' => 'faq-category',
    'hide_empty' => false,
) );
$ftermIds=array();
//print_r($faqterms);
?>


<div class="containerfaq containermain">
<div class="section faqsectone">
  <div class="container">
      <div class="sectionhead">
        <h2><?php   the_title()  ?></h2>
        <p><?php   the_content()  ?></p>
      </div>
  </div>

  <div class="container clearfix" >
    <div id="parentTab" class="horizontaltab">
              <ul class="resp-tabs-list hor_1">
                <?php foreach ($faqterms as $faqterm){
                  $ftermIds[]=$faqterm->term_id;?>
                  <li><?php echo $faqterm->name;?></li>
                  <?php } ?>
                  
              </ul>
              <div class="resp-tabs-container hor_1">
                <?php for($i=0;$i<count($ftermIds);$i++){  ?>
                
               
                <?php 

                $post_query =get_posts(
                    array(
                        'posts_per_page' => -1,
                        'post_type' => 'faq',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'faq-category',
                                'field' => 'term_id',
                                'terms' => array($ftermIds[$i]),
                                'operator' =>'IN'
                            )
                        )
                    )
                );

                  ?>
                  <div>
                      <ul class="vertical-tab">
                        <?php 
            
                        foreach($post_query  as $postq){
                          //print_r($postq);?>
                        <li>
                          <h2 class="tab-item"><?php echo $postq->post_title?></h2>
                          <div class="tabs-container"><?php echo $postq->post_content;?></div>
                        </li>
                      <?php } ?>
                      </ul>
                  </div>
             
                  <?php } ?>
                  
              </div>
          </div>  
      </div>

</div>
  
</div>
  
<?php get_footer(); ?>
<!-- <style>
  
  .vertical-tab .tabs-container {
    padding: 10px;
    display: none;
}
</style> -->
