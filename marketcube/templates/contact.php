<?php
    /*
    Template Name: Contact Us
    */
    get_header();
    wp_enqueue_script('validate');
    add_action('wp_footer','contact_scripts',25);
    function contact_scripts(){
		$map_address = get_post_meta(get_the_ID(),'cont_map',true);
		if($map_address):
			foreach ($map_address as $a) {
				$latitude = $a['l_lati'];
				$longitude = $a['l_longi'];
				$title = $a['title'];
				$address = strip_tags($a['loc_address'], '<br>');
				$out[] = array(
					'latitude' => $latitude,
					'longitude' => $longitude,
					'title' => $title,
					'address' => strip_tags($address, '<br>'),
				);
			}
		endif; ?>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFGk543GXMzNdIHVF58Cyo249kJEPdMq4" defer></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#contactform').validate({
                    submitHandler: function(form) {
                        $.ajax({
                            type: "POST",
                            url: '<?php echo admin_url(); ?>admin-ajax.php',
                            data: $('#contactform').serialize(),
                            beforeSend: function() {
                                $("input[name=submit]", form).attr('disabled', 'disabled');
                                $("div.loading", form).show();
                                $("div.status", form).hide();
                            },
                            success: function(result) {
                                if (result == 1 || result == '1') {
                                    $("div.thanks").slideDown();
                                    $("div.loading", form).hide();
                                    document.forms["contact-form"].reset();
                                }
                                else {
                                    $("div.loading", form).hide();
                                    $("input[name=submit]", form).removeAttr('disabled');
                                    $("div.status", form).show();
                                }
                            }
                        });
                    },
                    rules: {
                        c_phone: {
                          required: true,
                          number: true
                        },
                        c_email: {
                            required: true,
                            email: true
                        },
                    }
                });
				
				$('.captcha-reload-normal').click(function(){
					angle+=360;
					$(this).css("transform","rotate("+angle+"deg)");
					$('#captcha-img').attr('src','<?php echo get_template_directory_uri(); ?>/captcha.php');
				});
				
				var add = <?php echo json_encode($out); ?>;
                var map;
				var isDraggable = true;
				var scroll = false;
                google.maps.event.addDomListener(window, 'load', init);
                function init() {
                    var mapOptions = {
                        zoom: <?php echo get_post_meta(get_the_ID(),'map_zoom',true);?>,
						draggable: isDraggable,
						scrollwheel: scroll,
                        center: new google.maps.LatLng(<?php echo get_post_meta(get_the_ID(),'map_lat',true);?>, <?php echo get_post_meta(get_the_ID(),'map_longi',true);?>),
					};
                    var mapElement = document.getElementById('map');
                    map = new google.maps.Map(mapElement, mapOptions);	
                    setMarkers(add);
                }
                function setMarkers(mapdata) {
                    var marker;
					var i;
                    for (i in mapdata) {
                        var lat = mapdata[i].latitude;
                        var lng = mapdata[i].longitude;
                        var title = mapdata[i].title;
                        var latlngset = new google.maps.LatLng(lat,lng);
                        var marker = new google.maps.Marker({
                            map: map, 
							title: title, 
							position: latlngset,
                        });
						var content = '<div class="map_cnt" style="width:250px;">';
                        content += '<h4>' + mapdata[i].title + '</h4>';
                        content += '<div class="mp_address">' + mapdata[i].address.replace(/(?:\r\n|\r|\n)/g, '<br />') + '</div>';
                        content += '</div>';
                        var infowindow = new google.maps.InfoWindow();
                        google.maps.event.addListener(marker, 'click', (function (marker, content, infowindow) {
                            return function () {
                                infowindow.setContent(content);
                                infowindow.open(map, marker);
                            };
                        })(marker, content, infowindow));
                    }
                }
            });
        </script><?php
    }
?>
<section class="page-banner" style="background-image: url('<?php echo get_field('banner_image'); ?>');">
    <div class="page-banner-container">
        <?php if(get_field('banner_title')):?>
            <h1><?php the_field('banner_title'); ?></h1>
        <?php else:?>
            <h1><?php the_title(); ?></h1>
        <?php endif;?>
    </div>
</section>
<section id="map"></section>
<section class="contact-form-container">
	<div class="container">
		<div class="contact-form-outer">
			<h2>SEND US A MESSAGE</h2>
			<form name="contact-form" id="contactform" method="post">
				<div class="status contact-status" style="display:none; color:#f00; padding: 10px 0;text-align: center;">
					<p style='font-size: 18px; text-align: center; color: #a50d0d;'>Error!!! Mail sending Failed!</p>
				</div>
				<div class="contact-field-outer">
					<div class="input-field">
						<input type='text' name="c_name" placeholder="Name" class="form-text required"/>
					</div>
					<div class="input-field">
						<input type='text' name="c_email" placeholder="Email" class="form-text required"/>
					</div>
					<div class="input-field">
						<input type='text' name="c_phone" placeholder="Phone" class="form-text required"/>
					</div>
					<div class="input-field">
						<textarea name="c_query" placeholder="Message" class="form-text-large required"></textarea>
					</div>
					<div class="input-field captcha">
						<div class="captcha-inr">
							<span class="captcha-main">
								<img id="captcha-img" src="<?php echo get_template_directory_uri(); ?>/captcha.php" alt="captcha" />
							</span>
							<span class="captcha-reload">
								<img src="<?php echo get_template_directory_uri(); ?>/images/captch-reload.png" class="captcha-reload-normal" alt="captcha-refresh" />
							</span>
							<input name="captcha" type="text" class="ct-captcha-txt required">
						</div>
					</div>
					<div class="input-field input-field-submit">
						<input type="hidden" name="action" value="contactForm"/>
						<input type="submit" name="submit" class="form-sub" value="Send"/>
					</div>
				</div>
				<div class="loading" style="display:none;text-align: center; padding: 0">
					<img src="<?php echo get_template_directory_uri(); ?>/images/progress.gif" alt="loading" />
				</div>
				<div class="thanks clearfix" style="display:none;">
					<h2 style='font-size: 16px; font-weight: 600; color: #3d9a20; line-height: 21px;'>Thank You for contacting us!</h2>
					<p style="text-align: center; margin: 7px;">We'll be in touch shortly.</p>
					<a href="<?php echo home_url('/'); ?>"></a>
				</div>
			</form>
		</div>
	</div>
</section>
<?php get_footer(); ?>