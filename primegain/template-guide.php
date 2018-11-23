<?php
/*
  Template Name: guide
 */

get_header();

add_action('wp_footer', 'san_scripts', 21);

wp_enqueue_script('responsivetab');

function san_scripts() {
    ?>
   
    <script>
   
   (function ($) {
        
        $('#parentHorizontalTabtwo').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            tabidentify: 'hor_2', // The tab groups identifier
      
          });

      

    })(jQuery);
     </script>

<?php } ?>




<div class="containerguide containermain">


<div class="section guidesectone">
    <div class="container">
            <div class="sectionhead">
                <h2><?php   the_title()  ?></h2>
                <p><?php   the_content()  ?></p>
            </div>  
    
            <div class="forbuyselltab">
                <!--Horizontal Tab-->
                <div id="parentHorizontalTabtwo" class="horizontaltabtwo">
                    <ul class="resp-tabs-list hor_2 clearfix">
                        <li>For Buyers  </li>
                        <li>For Sellers</li>
                    </ul>
                    <div class="resp-tabs-container hor_2">
                        <div>
                            <div class="row">
                                <div class="col-sm-6 col-lg-4">
                                   <div class="boxsptwo">
                                        <img src="<?php echo  get_template_directory_uri(); ?>/images/bxspclimgone.jpg">
                                        <span class="overlayboxspcl">
                                                <h3>
                                                    The Benefits of Buying 
                                                    with Prime Gain Realty</h3>
                                                    <a href="" class="transparentbtn" >View All </a>

                                        </span>

                                   </div>     
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                   <div class="boxsptwo">
                                        <img src="<?php echo  get_template_directory_uri(); ?>/images/bxspclimg.jpg">
                                        <span class="overlayboxspcl">
                                                <h3>
                                                How to Buy a Home in 
                                                7 Steps</h3>
                                                    <a href="" class="transparentbtn" >View All </a>

                                        </span>

                                   </div>     
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                   <div class="boxsptwo">
                                        <img src="<?php echo  get_template_directory_uri(); ?>/images/bxspclimgonea.jpg">
                                        <span class="overlayboxspcl">
                                                <h3>
                                                    What to Look for on 
                                                    a Home Tour</h3>
                                                    <a href="" class="transparentbtn" >View All </a>

                                        </span>

                                   </div>     
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                   <div class="boxsptwo">
                                        <img src="<?php echo  get_template_directory_uri(); ?>/images/bxspclimgoneb.jpg">
                                        <span class="overlayboxspcl">
                                                <h3>
                                                How the Closing Process 
                                                    Works</h3>
                                                    <a href="" class="transparentbtn" >View All </a>

                                        </span>

                                   </div>     
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                   <div class="boxsptwo">
                                        <img src="<?php echo  get_template_directory_uri(); ?>/images/bxspclimgonec.jpg">
                                        <span class="overlayboxspcl">
                                                <h3>How Much Money Do You Need to Buy a Home?</h3>
                                                    <a href="" class="transparentbtn" >View All </a>

                                        </span>

                                   </div>     
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                   <div class="boxsptwo">
                                        <img src="<?php echo  get_template_directory_uri(); ?>/images/bxspclimgoned.jpg">
                                        <span class="overlayboxspcl">
                                                <h3>How to Get a Mortgage in 5 Steps</h3>
                                                    <a href="" class="transparentbtn" >View All </a>

                                        </span>

                                   </div>     
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                   <div class="boxsptwo">
                                        <img src="<?php echo  get_template_directory_uri(); ?>/images/bxspclimgonee.jpg">
                                        <span class="overlayboxspcl">
                                                <h3>What to Look for on a Home Tour</h3>
                                                    <a href="" class="transparentbtn" >View All </a>

                                        </span>

                                   </div>     
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                   <div class="boxsptwo">
                                        <img src="<?php echo  get_template_directory_uri(); ?>/images/bxspclimgonef.jpg">
                                        <span class="overlayboxspcl">
                                                <h3>How to Make an Offer on a Home</h3>
                                                    <a href="" class="transparentbtn" >View All </a>

                                        </span>

                                   </div>     
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                   <div class="boxsptwo">
                                        <img src="<?php echo  get_template_directory_uri(); ?>/images/bxspclimgoneg.jpg">
                                        <span class="overlayboxspcl">
                                                <h3>How the Closing Process Works</h3>
                                                    <a href="" class="transparentbtn" >View All </a>

                                        </span>

                                   </div>     
                                </div>

                            </div>
                        
                        </div>
                        <div>
                            <div class="row">
                            <div class="col-sm-6 col-lg-4">
                                   <div class="boxsptwo">
                                        <img src="<?php echo  get_template_directory_uri(); ?>/images/bxspclimgonee.jpg">
                                        <span class="overlayboxspcl">
                                                <h3>What to Look for on a Home Tour</h3>
                                                    <a href="" class="transparentbtn" >View All </a>

                                        </span>

                                   </div>     
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                   <div class="boxsptwo">
                                        <img src="<?php echo  get_template_directory_uri(); ?>/images/bxspclimgonef.jpg">
                                        <span class="overlayboxspcl">
                                                <h3>How to Make an Offer on a Home</h3>
                                                    <a href="" class="transparentbtn" >View All </a>

                                        </span>

                                   </div>     
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                   <div class="boxsptwo">
                                        <img src="<?php echo  get_template_directory_uri(); ?>/images/bxspclimgoneg.jpg">
                                        <span class="overlayboxspcl">
                                                <h3>How the Closing Process Works</h3>
                                                    <a href="" class="transparentbtn" >View All </a>

                                        </span>

                                   </div>     
                                </div>
                            <div class="col-sm-6 col-lg-4">
                                   <div class="boxsptwo">
                                        <img src="<?php echo  get_template_directory_uri(); ?>/images/bxspclimgone.jpg">
                                        <span class="overlayboxspcl">
                                                <h3>
                                                    The Benefits of Buying 
                                                    with Prime Gain Realty</h3>
                                                    <a href="" class="transparentbtn" >View All </a>

                                        </span>

                                   </div>     
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                   <div class="boxsptwo">
                                        <img src="<?php echo  get_template_directory_uri(); ?>/images/bxspclimg.jpg">
                                        <span class="overlayboxspcl">
                                                <h3>
                                                How to Buy a Home in 
                                                7 Steps</h3>
                                                    <a href="" class="transparentbtn" >View All </a>

                                        </span>

                                   </div>     
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                   <div class="boxsptwo">
                                        <img src="<?php echo  get_template_directory_uri(); ?>/images/bxspclimgonea.jpg">
                                        <span class="overlayboxspcl">
                                                <h3>
                                                    What to Look for on 
                                                    a Home Tour</h3>
                                                    <a href="" class="transparentbtn" >View All </a>

                                        </span>

                                   </div>     
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                   <div class="boxsptwo">
                                        <img src="<?php echo  get_template_directory_uri(); ?>/images/bxspclimgoneb.jpg">
                                        <span class="overlayboxspcl">
                                                <h3>
                                                How the Closing Process 
                                                    Works</h3>
                                                    <a href="" class="transparentbtn" >View All </a>

                                        </span>

                                   </div>     
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                   <div class="boxsptwo">
                                        <img src="<?php echo  get_template_directory_uri(); ?>/images/bxspclimgonec.jpg">
                                        <span class="overlayboxspcl">
                                                <h3>How Much Money Do You Need to Buy a Home?</h3>
                                                    <a href="" class="transparentbtn" >View All </a>

                                        </span>

                                   </div>     
                                </div>
                                <div class="col-md-4">
                                   <div class="boxsptwo">
                                        <img src="<?php echo  get_template_directory_uri(); ?>/images/bxspclimgoned.jpg">
                                        <span class="overlayboxspcl">
                                                <h3>How to Get a Mortgage in 5 Steps</h3>
                                                    <a href="" class="transparentbtn" >View All </a>

                                        </span>

                                   </div>     
                                </div>
                               
                            </div>
                        </div>
                </div> 
                </div>
            </div>
   
  </div>   
  
</div>
  
<?php get_footer(); ?>
