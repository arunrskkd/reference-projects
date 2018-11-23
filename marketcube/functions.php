<?php
/*------- Theme Supports ---------*/
add_action( 'after_setup_theme', 'res_theme_support' );
function res_theme_support() {
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'post-formats' );
  add_theme_support('post-thumbnails');
  add_post_type_support('page', 'excerpt');
  add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
  set_post_thumbnail_size(190,140,true);
}

/*------------- Disallow Backend Editting ----------------*/
define( 'DISALLOW_FILE_EDIT', true );

/*-------------- Disable XMLRPC ---------------------*/
add_filter('xmlrpc_enabled', '__return_false');

/*------------- Hide Wordpress Version Generator ---------------*/
add_filter('the_generator', 'version');
function version() {
	return '';
}

/*----------- Remove WP-Embed script ---------------*/
function disable_embeds_init() {
    // Remove the REST API endpoint.
    remove_action('rest_api_init', 'wp_oembed_register_route');
    // Turn off oEmbed auto discovery.
    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
    // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');
}
add_action('init', 'disable_embeds_init', 9999);

/*------- Remove emoji script and css ------*/
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

/*---------- Include BFI Thumb ---------------*/
require_once('includes/BFI_Thumb.php');

/*----------- Option Tree Integration ---------*/
add_filter('ot_show_pages', '__return_false');
add_filter('ot_theme_mode', '__return_true');
add_filter( 'ot_show_new_layout', '__return_false' );
include_once( 'includes/option-tree/ot-loader.php' );
include_once( 'includes/theme-options.php' );
load_template(trailingslashit(get_template_directory()) . 'includes/meta-boxes.php');

// Enqueue Scripts & Styles
add_action('wp_enqueue_scripts', 'theme_marketcube_scripts_styles');
function theme_marketcube_scripts_styles() {
  wp_deregister_script('jquery');
  wp_deregister_script('jquery-migrate');
  wp_register_script('jquery', get_template_directory_uri() . '/js/jquery.js');
  wp_register_script('jquery-migrate', get_template_directory_uri() . '/js/migrate.js');
  wp_enqueue_script('jquery');
  wp_enqueue_script('jquery-migrate');
  
  //Scripts
  wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true);
  wp_register_script('validate', get_template_directory_uri() . '/js/validate.js', array('jquery'), '', true);
  wp_register_script('tweenmax', get_template_directory_uri() . '/js/TweenMax.min.js', array('jquery'), '', true);
  wp_register_script('particles', get_template_directory_uri() . '/js/particles.min.js', array('jquery'), '', true);
  wp_register_script('stats', get_template_directory_uri() . '/js/stats.min.js', array('jquery'), '', true);
  wp_register_script('aos', get_template_directory_uri() . '/js/aos.js', array('jquery'), '', true);
  //Custom
  wp_register_script('home_scripts', get_template_directory_uri() . '/js/home-scripts.js', array('jquery'), '', true);
  wp_register_script('scripts', get_template_directory_uri() . '/js/script.js', array('jquery','tweenmax','bootstrap','particles','stats','aos'), '', true);

  wp_enqueue_script('scripts');
  if (is_front_page() || is_home()) {
    wp_enqueue_script('home_scripts');
  }
}

/*---------- Register Widgets Area ---------*/
add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
	register_sidebar(array(
    'id' => 'footer_widgets',
		'name' => 'Footer Widgets',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
}

function smallenvelop_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Header Sidebar', 'smallenvelop' ),
        'id' => 'header-sidebar',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h1>',
        'after_title' => '</h1>',
    ) );
}
add_action( 'widgets_init', 'smallenvelop_widgets_init' );
/*------- Excerpt -------*/
function new_excerpt_length($length) {
    return 200;  // length used for media press release
}
add_filter('excerpt_length', 'new_excerpt_length');
function trim_excerpt($more) {
    return '...';
}
add_filter('excerpt_more', 'trim_excerpt');
/*** end ***/

/*------ Register Navigation Menu -------*/
register_nav_menus( array(
	'header_menu' => 'Header Menu',
    'footer_menu'=> 'Footer Menu',
    'sidebar_menu'=> 'sidebar Menu'
	)
);

/*----------- Register Post Type ------------*/
function theme_posttype() {
	register_post_type('testimonial', array('label' => 'Testimonials',
		'description' => '',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'query_var' => true, 
		'exclude_from_search' => false,
		'supports' => array('title', 'editor','thumbnail'),
		'menu_icon'   => 'dashicons-format-chat',		
		'labels' => array(
			'name' => 'Testimonials',
			'singular_name' => 'Testimonial',
			'menu_name' => 'Testimonials',
			'add_new' => 'Add New Testimonial',
			'add_new_item' => 'Add New Testimonial',
			'edit' => 'Edit Testimonial',
			'edit_item' => 'Edit Testimonial',
			'new_item' => 'New Testimonial',
			'view' => 'View Testimonial',
			'view_item' => 'View Testimonial',
			'search_items' => 'Search Testimonials',
			'not_found' => 'No Testimonials Found',
			'not_found_in_trash' => 'No Testimonials Found in Trash',
			'parent' => 'Parent Testimonial',
	)));
	register_taxonomy(
		'testimonial-category',
		'testimonial',
		array(
			'label' => __( 'Categories' ),
			'hierarchical' => true,
			'show_admin_column' => true
		)
	);
}
add_action('init', 'theme_posttype');

// Contact Form
add_action('wp_ajax_nopriv_contactForm', 'theme_contactForm');
add_action('wp_ajax_contactForm', 'theme_contactForm');
function theme_contactForm() {
    global $wpdb;
    if (!isset($_POST['c_name']) && !empty($_POST['c_name']) && !isset($_POST['c_email']) && !empty($_POST['c_email']) && !isset($_POST['c_phone']) && !empty($_POST['c_phone']) && !isset($_POST['c_query']) && !empty($_POST['c_query'])) {
        echo 'Enter all fields';
    } else if (!is_email($_POST['c_email'])) {
        echo 'Email is not valid';
    } else {
		if (ot_get_option('contact_form_email')) {
            $to = ot_get_option('contact_form_email');
        } else {
            $to = get_bloginfo('admin_email');
        }
        $contact_subject = 'Enquiry From Website';
        ob_start();
        ?> 
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title>.:  :.</title>
            </head>
            <body style="background-color:#F0EEE0; margin:0px;">
                <table width="100%" border="0" cellpadding="0">
                    <tr>
                        <td align="center" valign="top" style="background-color:#F0EEE0; margin:0px;">
                            <table width="572" border="0" cellspacing="0" cellpadding="0" style="font-size:12px; font-family: Arial, Helvetica, sans-serif; line-height:18px; color:#444444; ">
                                <tr>
                                    <td align="center" valign="top" style="padding-bottom:10px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top" style="background-color:#FFF; padding:20px; border-right:1px solid #d6d6d6; border-bottom:2px solid #d6d6d6;">
                                        <p style="color:#504e4e; font-size:16px;">
                                            <span class="footer"><strong>Enquiry From Website</strong></span>
                                        </p>
                                        <table width="100%" border="0" cellspacing="2" cellpadding="4">
                                            <tr>
                                                <td align="left" valign="middle" style="border-bottom:1px solid #e2dfd9;">Name</td>
                                                <td align="left" valign="middle" style="border-bottom:1px solid #e2dfd9;"><strong><?php echo $_POST['c_name']; ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="middle" style="border-bottom:1px solid #e2dfd9;">Email Id</td>
                                                <td align="left" valign="middle" style="border-bottom:1px solid #e2dfd9;"><strong><?php echo $_POST['c_email']; ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="middle" style="border-bottom:1px solid #e2dfd9;">Phone</td>
                                                <td align="left" valign="middle" style="border-bottom:1px solid #e2dfd9;"><strong><?php echo $_POST['c_phone']; ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="middle" style="border-bottom:1px solid #e2dfd9;">Message</td>
                                                <td align="left" valign="middle" style="border-bottom:1px solid #e2dfd9;"><strong><?php echo $_POST['c_query']; ?></strong></td>
                                            </tr>
                                        </table>
                                        <p>Thank you<br /></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" valign="top" style=" text-align:center; color:#4c4c4c; font-size:11px; padding:15px 0px;"><span class="footer">Website. All Rights Reserved.</span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </body>
        </html>
        <?php
        $message = ob_get_contents();
        ob_end_clean();
        $subject = $contact_subject;
        $headers[] = 'From: ' . $_POST["c_name"] . '<no-reply@kediacommodity.com>';
        $headers[] = 'Reply-To: ' . $_POST["c_name"] . ' <' . $_POST["c_email"] . '>';
        add_filter('wp_mail_content_type', 'contact_html_content_type');

        function contact_html_content_type() {
            return 'text/html';
        }

        if (wp_mail($to, $subject, $message, $headers)) {
            $cto = $to;
			$cheaders[] = 'From: Kedia Commodity' .'<no-reply@kediacommodity.com>';
			$cheaders[] = 'Reply-To: ' . 'Kedia Commodity'. '<' . $to . '>';
			add_filter('wp_mail_content_type', 'contp_content_type');
			$cmail = $_POST["c_email"];
			ob_start();?> 
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
				<head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
					<title>.:  :.</title>
				</head>
				<body style="background-color:#F0EEE0; margin:0px;">
					<table width="100%" border="0" cellpadding="0">
						<tr>
							<td align="center" valign="top" style="background-color:#F0EEE0; margin:0px;">
								<table width="572" border="0" cellspacing="0" cellpadding="0" style="font-size:12px; font-family: Arial, Helvetica, sans-serif; line-height:18px; color:#444444; ">
									<tr>
										<td align="center" valign="top" style="padding-bottom:10px;">&nbsp;</td>
									</tr>
									<tr>
										<td align="left" valign="top" style="background-color:#FFF; padding:20px; border-right:1px solid #d6d6d6; border-bottom:2px solid #d6d6d6; text-align: center;">
											<img src="<?php echo get_option_tree('logo_img'); ?>"/>
										</td>
									</tr>
									<tr>
										<td align="left" valign="top" style="background-color:#FFF; padding:20px; border-right:1px solid #d6d6d6; border-bottom:2px solid #d6d6d6;">
											<p style="color:#504e4e; font-size:16px;">
												<span class="footer"><strong>Email Acknowledgement From Website</strong></span>
											</p>
											<table width="100%" border="0" cellspacing="2" cellpadding="4">
												<tr>
													<td align="left" valign="middle" style="border-bottom:1px solid #e2dfd9;">Thank You for showing your interest. We will get back to you shortly.</td>
												</tr>
											</table>
											<p>Regards<br />Website Team</p>
										</td>
									</tr>
									<tr>
										<td align="left" valign="top" style=" text-align:center; color:#4c4c4c; font-size:11px; padding:15px 0px;"><span class="footer">Website. All Rights Reserved.</span></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</body>
			</html><?php
			$cmessage = ob_get_contents();
			ob_end_clean();
			function contp_content_type() {
				return 'text/html';
			}
			wp_mail($cmail,'Contact Email Acknowledgement', $cmessage, $cheaders);
			echo 1;
        } else {
            echo 'Mail Sending failed';
        }
    }
    die();
}

//Breadcrumb
function breadcrumbs() {
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '&raquo;'; // delimiter between crumbs
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  global $post;
  $homeLink = get_bloginfo('url');
 
  if (is_home() || is_front_page()) {
 
    if ($showOnHome == 1) echo '<div id="breadcrumbs"><a href="' . $homeLink . '"  class="home_link">Home</a></div>';
 
  } else {
 
    echo '<div id="breadcrumbs"><a href="' . $homeLink . '"  class="home_link">Home</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
		$blink = "<a href='".esc_url(home_url( '/' ))."blog/'>Blog</a> ";
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $blink;
        if ($showCurrent == 1) echo $before;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
} 
// end breadcrumbs()

/*----- svg support -----*/
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/*----- custom post archive -----*/
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if(is_category() || is_tag() || is_month() || is_day() || is_year()) {
    $post_type = get_query_var('post_type');
    if($post_type)
        $post_type = $post_type;
    else
      $post_type = get_post_types();
    $query->set('post_type',$post_type);
    return $query;
  }
}

/*** Threaded Comments ***/
function netscribes_comments($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    switch ($comment->comment_type) :
    case 'pingback' :
    case 'trackback' :
        // Display trackbacks differently than normal comments.
        ?>
        <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
            <p><?php _e('Pingback:', 'netscribes'); ?> <?php comment_author_link(); ?> <?php edit_comment_link(__('(Edit)', 'netscribes'), '<span class="edit-link">', '</span>'); ?></p>
        <?php
        break;
    default :
    // Proceed with normal comments.
        global $post;
        ?>
        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
            <div id="comment-<?php comment_ID(); ?>" class="comment article">
                <header class="comment-meta comment-author vcard">
                    <?php
                    echo '<span class="cmnt-authr-img">'.get_avatar($comment, 44).'</span>';
					echo '<div class="cmnt-authr-desc">';
                    printf('<cite class="fn">%1$s %2$s</cite>', get_comment_author_link(),
                            // If current post author is also comment author, make it known visually.
                            ( $comment->user_id === $post->post_author ) ? '<span> ' . __('Post author', 'netscribes') . '</span>' : ''
                    );
                    printf('<a href="%1$s"><time datetime="%2$s">%3$s</time></a>', esc_url(get_comment_link($comment->comment_ID)), get_comment_time('c'),
                            /* translators: 1: date, 2: time */ sprintf(__('%1$s at %2$s', 'netscribes'), get_comment_date(), get_comment_time())
                    );
					echo '</div>';
                    ?>
                </header><!-- .comment-meta -->

         <?php if ('0' == $comment->comment_approved) : ?>
                <p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'netscribes'); ?></p>
                <?php endif; ?>
            <div class="comment-content comment">
        <?php comment_text(); ?>
        <?php edit_comment_link(__('Edit', 'netscribes'), '<p class="edit-link">', '</p>'); ?>
            </div><!-- .comment-content -->

            <div class="reply">
        <?php comment_reply_link(array_merge($args, array('reply_text' => __('Reply', 'netscribes'), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
            </div><!-- .reply -->
        </div><!-- #comment-## -->
        <?php
        break;
    endswitch; // end comment_type check
}

/*----- Wp Login Page Logo Link ------*/
add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginlogo_url($url) {
	return get_home_url();
}

/*------ Wp login Page Logo Change ---------*/
add_action( 'login_enqueue_scripts', 'my_login_logo' );
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url('<?php echo get_option_tree('logo_img'); ?>');
            padding-bottom: 0;
        }
    </style>
<?php }

/*-------- Move header scripts to footer ------*/
function remove_head_scripts() { 
   remove_action('wp_head', 'wp_print_scripts'); 
   remove_action('wp_head', 'wp_print_head_scripts', 9); 
   remove_action('wp_head', 'wp_enqueue_scripts', 1);

   add_action('wp_footer', 'wp_print_scripts', 5);
   add_action('wp_footer', 'wp_enqueue_scripts', 5);
   add_action('wp_footer', 'wp_print_head_scripts', 5); 
} 
add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );

/*------- remove css and js versions --------*/
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
?>