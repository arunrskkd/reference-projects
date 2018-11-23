<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
	<?php if(ot_get_option('fav_icon')):?>
		<link rel="shortcut icon" href="<?php echo ot_get_option('fav_icon'); ?>" />
	<?php else:?>
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
	<?php endif;?>
	<link rel="stylesheet" href="<?php bloginfo('template_directory')?>/css/bootstrap.min.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory')?>/css/hover.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory')?>/css/style.css" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<?php if( ot_get_option('custom_css') ):?>
		<style type="text/css">
			<?php echo ot_get_option('custom_css'); ?>
		</style>
	<?php endif;
	wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header>
        <div class="sectinsidehead">
            <div class="container-fluid">
                <div class="row">
					<?php if( ot_get_option('logo_img') ):?>
						<div class="col-sm-3 col-xs-8">
							<a href="<?php echo esc_url( home_url( '/' )); ?>" class="logo_image" title="<?php bloginfo('name'); ?>">
								<img src="<?php echo ot_get_option('logo_img'); ?>" alt="<?php bloginfo('name'); ?>" />
							</a>
						</div>
					<?php endif; ?>
                    <div class="col-sm-9 col-xs-4">
                        <ul class="headul ">
                            <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="navicn ">
                                <div class="bar1"></div>
                                <div class="bar2"></div>
                                <div class="bar3"></div>

                            </span>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
	</header>
	<div id="myNav" class="overlay">
        <div class="overlay-content">
            <?php wp_nav_menu( array( 'container' => '', 'theme_location' => 'header_menu' ) ); ?>
        </div>
    </div>
	<main class="containerproj">