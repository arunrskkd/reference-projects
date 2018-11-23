<?php
/*
  Template Name: home page
 */

get_header();

wp_enqueue_script('swiper');
wp_enqueue_script('responsivetab');
wp_enqueue_script('rangeslider');
add_action('wp_footer', 'scripts', 25);
function scripts() {
    ?>
 <script>
 
  (function ($) {
    var swiper = new Swiper('.swiper-container', {
        direction: 'vertical',
        slidesPerView: 1,
        spaceBetween: 30,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-btn-next',
          prevEl: '.swiper-btn-prev',
        },
        effect:'coverflow',
        speed:500,
        loop:true,
        preloadImages:true
    });
  
    var swiper = new Swiper('.swiper-containertwo', {
      spaceBetween: 0,
      slidesPerView: 1,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      navigation: {
        nextEl: '.swiper2-button-next',
        prevEl: '.swiper2-button-prev',
      },
      loop: true,
      speed: 500, 
      effect:'fade',
    });

    var swiper = new Swiper('.swiper-containerthree', {
      slidesPerView: 5,
      spaceBetween: 50,
      breakpoints: {
        1024: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        320: {
          slidesPerView: 1,
          spaceBetween: 10,
        }
      }
    });
    $(document).bind('ready load scroll', function() {
    var scroll_position = $('.headbottom').offset().top; 
    var scroll = $(window).scrollTop();

     //>=, not <=
    if (scroll >= 100) {
        //clearHeader, not clearheader - caps H
        $(".header_block").addClass("stickyhead");
    }
    else{
        $(".header_block").removeClass("stickyhead");
    }
    }); 

    $('#parentHorizontalTab').easyResponsiveTabs({
      type: 'default', //Types: default, vertical, accordion
      width: 'auto', //auto or any width like 600px
      fit: true, // 100% fit in a container
      tabidentify: 'hor_1', // The tab groups identifier

    });
   
    $('#parentHorizontalTabtwo').easyResponsiveTabs({
      type: 'default', //Types: default, vertical, accordion
      width: 'auto', //auto or any width like 600px
      fit: true, // 100% fit in a container
      tabidentify: 'hor_2', // The tab groups identifier

    });
    
    $('.rangesliderone').rangeslider({

        // Feature detection the default is `true`.
        // Set this to `false` if you want to use
        // the polyfill also in Browsers which support
        // the native <input type="range"> element.
        polyfill: false,

        // Default CSS classes
        rangeClass: 'rangeslider',
        disabledClass: 'rangeslider--disabled',
        horizontalClass: 'rangeslider--horizontal',
        verticalClass: 'rangeslider--vertical',
        fillClass: 'rangeslider__fill',
        handleClass: 'rangeslider__handle',

        // Callback function
        onInit: function() {

            $('.rangeslider__handle').append(' <span class="valuesect">HOME PRICE<br>$<span class="value">875000</span></span>');
        },

        // Callback function
        onSlide: function(position, value) {
            $('.value').text(value);
            $('#buyerrate').text(parseInt(value*8));
            $('#sellerrate').text(parseInt(value*14));
        },

        // Callback function
        onSlideEnd: function(position, value) {}

        });

  })(jQuery);
  
        </script>
<?php } ?>

<div class="containerhome">


  <!-- section banner -->
  <div class="bannersection">

    <!-- Swiper -->
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide"  style="background:url('<?php echo  get_template_directory_uri(); ?>/images/banner-bg.jpg') no-repeat"> </div>
        <div class="swiper-slide"  style="background:url('<?php echo  get_template_directory_uri(); ?>/images/banner-bg.jpg') no-repeat"> </div>
        <div class="swiper-slide"  style="background:url('<?php echo  get_template_directory_uri(); ?>/images/banner-bg.jpg') no-repeat"> </div>
        <div class="swiper-slide"  style="background:url('<?php echo  get_template_directory_uri(); ?>/images/banner-bg.jpg') no-repeat"> </div> 
      </div>     
      <!-- Add Pagination -->
      <div class="swiper-pagination">

      </div>
    </div>

     <!-- tab -->
    <div class="bannertab">
        <div class="alignmiddle">
            <div class="container">
              <div class="col-lg-6">
                <h2>Mordern Way Of Buying And Selling</h2>
                <h3>Real Property the Home or Investment</h3>
                    <!--Horizontal Tab-->
                    <div id="parentHorizontalTab" class="horizontaltab">
                        <ul class="resp-tabs-list hor_1">
                            <li>BUY</li>
                            <li>SELL</li>
                            <li>HOME ESTIMATE</li>
                        </ul>
                        <div class="resp-tabs-container hor_1">
                            <div>
                                <p>Check instant valuation and more</p>
                                <?php get_search_form(); ?>
                            </div>
                            <div>
                            <p>Check instant valuation and more</p>
                            <?php get_search_form(); ?>
                            </div>
                            <div>
                                <p>Check instant valuation and more</p>
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    </div>  
                  </div>
                </div>
         </div>
          <!-- If we need navigation buttons -->
          <div class="swiper-btn-prev"><img src="<?php echo  get_template_directory_uri(); ?>/images/arrowupslider.png"></div>
          <div class="swiper-btn-next"><img src="<?php echo  get_template_directory_uri(); ?>/images/arrowdownslider.png"></div>
    </div>
  </div>

  <!-- section how it works -->
  <div class="howitworks">
    <h2>How It Works</h2>
    <div class="container" >
    <div class="forbuyselltab">
        <!--Horizontal Tab-->
        <div id="parentHorizontalTabtwo" class="horizontaltabtwo">
            <ul class="resp-tabs-list hor_2">
                <li>For Buyers  </li>
                <li>For Sellers</li>
            </ul>
            <div class="resp-tabs-container hor_2">
                <div>
                    <div class="row">
                        <div class="col-md-4">
                          <div class="sectin">
                             <div class="sectimg">
                               <img src="<?php echo  get_template_directory_uri(); ?>/images/localllisting.png">  
                             </div> 
                            <div class="secttext">
                                <h3>1,000s of local listings</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and type setting industry's standard dummy.</p>  
                            </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="sectin">
                             <div class="sectimg">
                               <img src="<?php echo  get_template_directory_uri(); ?>/images/expersupport.png">  
                             </div> 
                            <div class="secttext">
                                <h3>Expert support</h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and type setting industry's standard dummy.</p>  
                            </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                          <div class="sectin">
                             <div class="sectimg">
                               <img src="<?php echo  get_template_directory_uri(); ?>/images/cashback.png">  
                             </div> 
                            <div class="secttext">
                                <h3>Cash back </h3>
                                <p>Lorem Ipsum is simply dummy text of the printing and type setting industry's standard dummy.</p>  
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="btncontainer">
                    <a href="" class="btnone">Explore More</a>
                    </div>
                   
                </div>
                <div>
                <div class="row">
                <div class="col-md-4">
                      <div class="sectin">
                         <div class="sectimg">
                           <img src="<?php echo  get_template_directory_uri(); ?>/images/cashback.png">  
                         </div> 
                        <div class="secttext">
                            <h3>Cash back </h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and type setting industry's standard dummy.</p>  
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                      <div class="sectin">
                         <div class="sectimg">
                           <img src="<?php echo  get_template_directory_uri(); ?>/images/localllisting.png">  
                         </div> 
                        <div class="secttext">
                            <h3>1,000s of local listings</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and type setting industry's standard dummy.</p>  
                        </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                      <div class="sectin">
                         <div class="sectimg">
                           <img src="<?php echo  get_template_directory_uri(); ?>/images/expersupport.png">  
                         </div> 
                        <div class="secttext">
                            <h3>Expert support</h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and type setting industry's standard dummy.</p>  
                        </div>
                        </div>
                    </div>
                    
                </div>
                <div class="btncontainer">
                    <a href="" class="btnone">Explore More</a>
                </div>
            </div>
            </div>
        </div> 
    </div>
    </div>
   
  </div>

  <!-- section see your savings -->
  <div class="seeyour">
     <div class="container">
        <h2>See Your Savings</h2>
        <p>You could use the money to update the kitchen</p>
        <div class="slidingelement">
           
        <input class="rangesliderone"
                type="range"
                min="20000"                   
                max="2000000"                 
                step="10"                   
                value="875000"                 
              
            >
            <span class="minvalue">$20,000</span>
            <span class="maxvalue">$2,000,000</span>
        </div>
        <div class="boxes">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="sectboxwhite">
                        <h3>As a buyer you can </h3>
                        <h4>save up to</h4>
                        <h5><sup>$</sup><span id="buyerrate">5,250</span></h5>
                        <p>Get up to half our commission back upon closing — up to 1.5% of the price.</p>

                    </div>
                </div>
            <div class="col-md-6 ">
                <div class="sectboxwhite boxblue">
                    <h3>As a seller you can </h3>
                    <h4>save up to</h4>
                    <h5><sup>$</sup><span id="sellerrate">25,855</span></h5>
                    <p>Pay only for the services you need — save on seller-side commission.</p>

                </div>    
            </div>
            </div>
        </div>
    </div>
  </div>

   <!-- section clients -->
  <div class="clients">
    <div class="container">
    <div class="swiper-containerthree">
    <div class="swiper-wrapper">
      <div class="swiper-slide"><img src="<?php echo  get_template_directory_uri(); ?>/images/client1.jpg"></div>
      <div class="swiper-slide"><img src="<?php echo  get_template_directory_uri(); ?>/images/client2.jpg"></div>
      <div class="swiper-slide"><img src="<?php echo  get_template_directory_uri(); ?>/images/client5.jpg"></div>
      <div class="swiper-slide"><img src="<?php echo  get_template_directory_uri(); ?>/images/client3.jpg"></div>
      <div class="swiper-slide"><img src="<?php echo  get_template_directory_uri(); ?>/images/client4.jpg"></div>
     
    </div>
  
    </div>

    </div>
  </div>
  <!-- section why client -->
  <div class="whyclient">
     <h2>Why Our Clients <i class="far fa-heart"></i> Us</h2>
      <div class="container">
          <!-- Swiper -->
            <div class="swiper-containertwo">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="<?php echo  get_template_directory_uri(); ?>/images/slidertwobg.jpg">
                    <div class="bluefade">
                    <h3>Jhone Doe</h3>
                    <h4>Bought with Prime gain realty</h4>
                    <p>“Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry's standard dummy text ever when an unknown printer.”</p>
                </div>
            </div>
            <div class="swiper-slide">
                <img src="<?php echo  get_template_directory_uri(); ?>/images/slidertwobg2.jpg">
                <div class="bluefade">
                    <h3>Jhone Doe</h3>
                    <h4>Bought with Prime gain realty</h4>
                    <p>“Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry's standard dummy text ever when an unknown printer.”</p>
                </div>
            </div>
            <div class="swiper-slide">
                <img src="<?php echo  get_template_directory_uri(); ?>/images/slidertwobg.jpg">
                <div class="bluefade">
                    <h3>Jhone Doe</h3>
                    <h4>Bought with Prime gain realty</h4>
                    <p>“Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been the industry's standard dummy text ever when an unknown printer.”</p>
                </div>
            </div>
            </div>
            <!-- Add Arrows -->
            <div class="arowpos">
            
            <div class="swiper2-button-prev"><i class="fas fa-angle-left"></i></div>
            <div class="swiper2-button-next"><i class="fas fa-angle-right"></i></div>
            </div>
            

                
            </div>
            <div class="btncontainer">
                    <a href="" class="btnone">Add Your Review</a>
             </div>
      </div>  
  </div>

  <!-- section latest blog -->
  <div class="latestblog">
      <div class="container">
          <h2>Latest Blog</h2>
          <div class="row">
            <div class="col-md-6">
                <div class="sectblogin"  style="background:url('<?php echo  get_template_directory_uri(); ?>/images/blogimgone.jpg') no-repeat">
                  <div class="row">
                    <div class="col-xs-4">
                    <div class=" sectimg" >
                        
                        </div>
                    </div>
                    
                    <div class="col-xs-8">
                        <div class="secttext">
                            <h3>Lorem Ipsum is simply dummy text of the printing and  industry. </h3>
                            <h5><span>By Admin </span> <span>20 Jul 17</span></h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem  dummy text ever when an unknown printer</p>
                        </div>
                    </div>
                  </div>
                </div>  
            </div>
            <div class="col-md-6">
                <div class="sectblogin"  style="background:url('<?php echo  get_template_directory_uri(); ?>/images/blogimgtwo.jpg') no-repeat">
                  <div class="row">
                    <div class="col-xs-4">
                    <div class=" sectimg" >
                        
                        </div>
                    </div>
                    
                    <div class="col-xs-8">
                        <div class="secttext">
                            <h3>Lorem Ipsum is simply dummy text of the printing and  industry. </h3>
                            <h5><span>By Admin </span> <span>20 Jul 17</span></h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem  dummy text ever when an unknown printer</p>
                        </div>
                    </div>
                  </div>
                </div>  
            </div>
            <div class="col-md-6">
                <div class="sectblogin"  style="background:url('<?php echo  get_template_directory_uri(); ?>/images/blogimgthree.jpg') no-repeat">
                  <div class="row">
                    <div class="col-xs-4">
                    <div class=" sectimg" >
                        
                        </div>
                    </div>
                    
                    <div class="col-xs-8">
                        <div class="secttext">
                            <h3>Lorem Ipsum is simply dummy text of the printing and  industry. </h3>
                            <h5><span>By Admin </span> <span>20 Jul 17</span></h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem  dummy text ever when an unknown printer</p>
                        </div>
                    </div>
                  </div>
                </div>  
            </div>
            <div class="col-md-6">
                <div class="sectblogin"  style="background:url('<?php echo  get_template_directory_uri(); ?>/images/blogimgfour.jpg') no-repeat">
                  <div class="row">
                    <div class="col-xs-4">
                    <div class=" sectimg" >
                        
                        </div>
                    </div>
                    
                    <div class="col-xs-8">
                        <div class="secttext">
                            <h3>Lorem Ipsum is simply dummy text of the printing and  industry. </h3>
                            <h5><span>By Admin </span> <span>20 Jul 17</span></h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem  dummy text ever when an unknown printer</p>
                        </div>
                    </div>
                  </div>
                </div>  
            </div>
          </div>
          <div class="btncontainer">
                    <a href="" class="btnone">View All Post</a>
         </div>
      </div>
  </div>

  <!-- section search for home -->
<div class="searchhome">
    
    <div class="container">
    <h2>Search For Home By City</h2>
    <div class="row">
        <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
              <div class="sectone">
                   <ul>
                       <li><a href="">Albany Real Estate</a></li>
                       <li><a href="">Albuquerque Real Estate</a></li>
                       <li><a href="">Alexandria Real Estate</a></li>
                       <li><a href="">Arlington Real Estate</a></li>
                       <li><a href="">Atlanta Real Estate</a></li>
                       <li><a href="">Austin Real Estate</a></li>
                       <li><a href="">Baltimore Real Estate</a></li>
                       <li><a href="">Baton Rouge Real Estate</a></li>
                       <li><a href="">Bellevue Real Estate</a></li>
                       <li><a href="">Bethesda Real Estate</a></li>
                       <li><a href="">Birmingham Real Estate</a></li>
                       <li><a href="">Boston Real Estate</a></li>
                       <li><a href="">Buffalo Real Estate</a></li>
                       <li><a href="">Burlington Real Estate</a></li>
                   </ul>             
              </div>  
        </div>
        <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
              <div class="sectone">
                   <ul>
                       <li><a href="">Charleston Real Estate</a></li>
                       <li><a href="">Charlotte Real Estate</a></li>
                       <li><a href="">Chicago Real Estate</a></li>
                       <li><a href="">Cincinnati Real Estate</a></li>
                       <li><a href="">Cleveland Real Estate</a></li>
                       <li><a href="">Columbia Real Estate</a></li>
                       <li><a href="">Columbus Real Estate</a></li>
                       <li><a href="">Dallas Real Estate</a></li>
                       <li><a href="">Dayton Real Estate</a></li>
                       <li><a href="">Denver Real Estate</a></li>
                       <li><a href="">Detroit Real Estate</a></li>
                       <li><a href="">El Paso Real Estate</a></li>
                       <li><a href="">Fort Lauderdale Real Estate</a></li>
                       <li><a href="">Fort Myers Real Estate</a></li>
                   </ul>             
              </div>  
        </div>
        <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
              <div class="sectone">
                   <ul>
                       <li><a href="">Fort Worth Real Estate</a></li>
                       <li><a href="">Grand Rapids Real Estate</a></li>
                       <li><a href="">Greenville Real Estate</a></li>
                       <li><a href="">Honolulu Real Estate</a></li>
                       <li><a href="">Houston Real Estate</a></li>
                       <li><a href="">Indianapolis Real Estate</a></li>
                       <li><a href="">Irvine Real Estate</a></li>
                       <li><a href="">Jacksonville Real Estate</a></li>
                       <li><a href="">Kansas City Real Estate</a></li>
                       <li><a href="">Kirkland Real Estate</a></li>
                       <li><a href="">Knoxville Real Estate</a></li>
                       <li><a href="">Lake Tahoe Real Estate</a></li>
                       <li><a href="">Las Vegas Real Estate</a></li>
                       <li><a href="">Little Rock Real Estate</a></li>
                   </ul>             
              </div>  
        </div>
        <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
              <div class="sectone">
                   <ul>
                       <li><a href="">Long Island Real Estate</a></li>
                       <li><a href="">Los Angeles Real Estate</a></li>
                       <li><a href="">Louisville Real Estate</a></li>
                       <li><a href="">Madison Real Estate</a></li>
                       <li><a href="">Manhattan Real Estate</a></li>
                       <li><a href="">McAllen Real Estate</a></li>
                       <li><a href="">Memphis Real Estate</a></li>
                       <li><a href="">Miami Real Estate</a></li>
                       <li><a href="">Milwaukee Real Estate</a></li>
                       <li><a href="">Minneapolis Real Estate</a></li>
                       <li><a href="">Nashville Real Estate</a></li>
                       <li><a href="">New Orleans Real Estate</a></li>
                       <li><a href="">Newark Real Estate</a></li>
                       <li><a href="">Oakland Real Estate</a></li>
                   </ul>             
              </div>  
        </div>
        <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
              <div class="sectone">
                   <ul>
                       <li><a href="">Oklahoma City Real Estate</a></li>
                       <li><a href="">Omaha Real Estate</a></li>
                       <li><a href="">Orlando Real Estate</a></li>
                       <li><a href="">Philadelphia Real Estate</a></li>
                       <li><a href="">Phoenix Real Estate</a></li>
                       <li><a href="">Pittsburgh Real Estate</a></li>
                       <li><a href="">Portland Real Estate</a></li>
                       <li><a href="">Princeton Real Estate</a></li>
                       <li><a href="">Providence Real Estate</a></li>
                       <li><a href="">Raleigh Real Estate</a></li>
                       <li><a href="">Redmond Real Estate</a></li>
                       <li><a href="">Richmond Real Estate</a></li>
                       <li><a href="">Sacramento Real Estate</a></li>
                       <li><a href="">Salt Lake City Real Estate</a></li>
                   </ul>             
              </div>  
        </div>
        <div class="col-lg-2 col-md-3 col-xs-6 col-sm-4">
              <div class="sectone">
                   <ul>
                       <li><a href="">San Antonio Real Estate</a></li>
                       <li><a href="">San Diego Real Estate</a></li>
                       <li><a href="">San Francisco Real Estate</a></li>
                       <li><a href="">San Jose Real Estate</a></li>
                       <li><a href="">Scottsdale Real Estate</a></li>
                       <li><a href="">Seattle Real Estate</a></li>
                       <li><a href="">St. Louis Real Estate</a></li>
                       <li><a href="">Tampa Real Estate</a></li>
                       <li><a href="">Tucson Real Estate</a></li>
                       <li><a href="">Virginia Beach Real Estate</a></li>
                       <li><a href="">Washington, DC Real Estate</a></li>
                       <li><a href="">White Plains Real Estate</a></li>
                      
                   </ul>             
              </div>  
        </div>
    </div>
    </div>

</div>


</div>



 
<?php get_footer(); ?>
