<?php
/*
  Template Name: Contact page
 */

get_header();

 wp_enqueue_script('validate');
 add_action('wp_footer', 'san_scripts', 21);

function san_scripts() {
    ?>
    <script src="http://maps.google.com/maps/api/js?key=<?php echo get_field("map_api_key")?>"></script>

    <script>
       
 
            google.maps.event.addDomListener(window, 'load', init);
            
            function init() {

              
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 11,
                    zoomControl: true,
                    zoomControlOptions: {
                        position: google.maps.ControlPosition.LEFT_BOTTOM
                    },
                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(<?php echo get_field('map_longitude')?>, <?php echo get_field('map_latitude')?>), // New York

                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]
                };

                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map');

                // Create the Google Map using our element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);

                // Let's also add a marker while we're at it
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(<?php echo get_field('map_longitude')?>, <?php echo get_field('map_latitude')?>),
                    map: map,
                    icon: '<?php echo  get_template_directory_uri(); ?>/images/mapicon.png',
                });
                var contentString = '<div class="mapinfocontent"><div class="mapimgdiv"><img src="<?php echo  get_template_directory_uri(); ?>/images/mapaddimg.jpg" alt="Address" /></div><div class="mapaddtext">Prime Gain Realty Inc Company Address line 1 Area name line 2</div></div>';
                var infowindow = new google.maps.InfoWindow({
                    content: contentString,
                    maxWidth: 258,
                    pixelOffset: new google.maps.Size(20,200),
                  

                });
 
                marker.addListener('click', function(event) {
                    infowindow.open(map, marker);
                });
            }


             (function (jQuery) {
                jQuery(document).ready(function () {

                    (function (jQuery) {

                        jQuery.validator.addMethod("defaultInvalid", function (value, element)
                        {
                            return !(element.value == element.defaultValue);
                        });
                        jQuery('#contactForm').validate({

                            rules: {
                                fname: {
                                    defaultInvalid: true
                                },
                                email: {
                                    required: true,
                                    email: true
                                },

                            },

                            messages: {
                                fname: "Please enter your firstname",
                                lname:"Please enter your lastname",
                                phone:"Please enter your phone",
                                message:"Please enter your message",
                                email: {
                                    required: "Please enter your email",
                                    email: "Invalid email address"
                                },
                            },
                            submitHandler: function (form) {

                                jQuery.ajax({
                                    type: "POST",
                                    url: '<?php echo admin_url(); ?>admin-ajax.php',
                                    data: jQuery('#contactForm').serialize(),
                                    beforeSend: function () {
                                        jQuery("input[name=submit]", form).attr('disabled', 'disabled');
                                        jQuery("div.c-load", form).show();
                                        jQuery("div.c-status", form).hide();
                                    },
                                       success: function (result) {

                                        if (result == 1 || result == '1') {
                                            jQuery("div.c-load", form).hide();
                                            jQuery("div.c-status").html('<span class="green">Thank You for your enquiry. We will contact you shortly.</span>');
                                            jQuery("div.c-status").show();

                                            setTimeout(function() {
                                                jQuery("div.c-status").hide();
                                                jQuery('#contactForm').trigger("reset");
                                                jQuery("input[name=submit]", form).removeAttr('disabled');
                                            }, 5000);

                                        }
                                        else if (result == 0 || result == '0') {
                                            jQuery("div.c-load", form).hide();
                                            jQuery("input[name=submit]", form).removeAttr('disabled');
                                            jQuery("div.c-status").html('<span class="red">Mail Sending failed</span>');
                                            jQuery("div.c-status").show();
                                        }
                                        else {
                                            jQuery("div.c-load", form).hide();
                                            jQuery("input[name=submit]", form).removeAttr('disabled');
                                            jQuery("div.c-status").html('<span class="red">' + result + '</span>');
                                            jQuery("div.c-status").show();
                                        }
                                    }
                                });
                            }
                        });
                        jQuery("#contactForm input, .textarea_box textarea").focusin(function () {
                            jQuery(this).parent("li").removeClass("error");
                        }).focusout(function () {
                            var crnt_value = jQuery(this).val();
                            if (crnt_value == '') {
                                // jQuery(this).parent("li").children("label").fadeIn(800);
                            }
                        });
                    })(jQuery);
                });
            })(jQuery);
    
 
        </script>

<?php } ?>

<?php $banner_image= get_field("banner_image")?>

<div class="containercontact containermain">
<!-- banner -->

    <div class="section contactsectone"  style="background:url('<?php echo $banner_image;?>') no-repeat">
        <div class="container">
            <div class="sectionhead">
                <?php the_content();?>
             
            </div> 
            <div class="sectioninone">
               <ul class="row">
                    <?php if(get_field("address")){ ?>
                    <li class="col-sm-4"><img src="<?php echo  get_template_directory_uri(); ?>/images/location-icon.png" alt="Address" />
                        <h5>Address</h5>
                        <div class="contact-address"><?php echo get_field("address");?></div>
                    </li>
                    <?php } ?>
                    <?php if(get_field("phone_numbers")){ ?>  
                    <li class="col-sm-4">
                        <img src="<?php echo  get_template_directory_uri(); ?>/images/call-icon.png" alt="Phone Numbers" />
                        <h5>Phone</h5>
                        <div class="contact-phone">
                            <ul>
                                <?php $numbers=get_field("phone_numbers");
                                foreach($numbers as $number){ ?>
                                <?php if($number['phone']){ ?><li><a href="tel:<?php echo preg_replace("/[\s-]+/","",$number['phone']); ?>" title="Phone Number"><?php echo $number['phone']?></a></li><?php } ?>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
                    <?php if(get_field("email_ids")){ ?>  
                    <li class="col-sm-4">
                        <img src="<?php echo  get_template_directory_uri(); ?>/images/mail-icon.png" alt="Email" />
                        <h5>Message</h5>
                        <div class="contact-email">
                            <ul>
                                <?php $emails=get_field("email_ids");
                                foreach($emails as $email){ ?>
                                <?php if($email['email']){ ?>
                                <li><a href="mailto:<?php echo $email['email']?>" title="Email"><?php echo $email['email']?></a></li>
                                <?php }}  ?>
                            </ul>
                        </div>
                    </li>
                    <?php } ?>
            </ul>
            </div>
        
         </div>

    </div>
<!-- end banner -->
<!-- Blog -->
<div class="section contactsecttwo">


   <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="sectionhead">
              <?php echo get_field('contact_form_title');?>
            </div>
            <br>
               <div class="contact-formsec">
               <form name="contactForm" method="post" id="contactForm"  class="contact-form" enctype="multipart/form-data" >
              <div class="row">
                <div class="col-sm-6">
               
                  <input type="text" name="fname" class="field required" placeholder="First Name* ">
                </div>
                <div class="col-sm-6">
                  <input type="text" name="lname" class="field required" placeholder="Last Name* ">
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-6">
                  
                  <input type="text" name="email" class="field required" placeholder="Email* ">
                </div>
                <div class="col-sm-6">
                  <input type="text" name="phone" class="field required" placeholder="Phone* ">
                </div>
                <div class="clearfix"></div>
                
                <div class="col-sm-12">
                  <textarea name="message" class="field required" placeholder="Message* "></textarea>
                </div>
               
                                 
                <div class="col-sm-12 lastrow">
                    <div class="clearfix">
                    <div class="required-fields pull-left"> Required *</div>
                    <input type="submit" id="contact_submit" name="submit" class="btn pull-right " value="Submit Now" />

                    </div>
                </div>
              </div>
                <input type="hidden" name="action" value="contactform">
                <div class="c-load" style="display:none; text-align: center">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/Disk.svg" alt="loading">
                </div>
                 <div class="c-status" style="display:none;"></div>
       
            </form>
            </div>
            </div>
        
       </div>
    </div>
    </div>

<div class="sectionthreecontact">
    
    <div id="map" style="height:680px"></div>
    <!-- end Blog -->

    </div>

</div>
  

<?php get_footer(); ?>
