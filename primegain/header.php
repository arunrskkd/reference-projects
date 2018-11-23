<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Acodez_Themes
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Muli:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto:700" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header class="header_block  <?php if (! is_front_page() ){ echo "stickyhead"; }   ?>" id="head_<?php echo get_the_ID();?>">
        <div class="headtop">
			<div class="container">
				<div class="">
					<?php if(get_field('header_phno','option')){ ?>
				   <div class=" pull-left">
				     <a href="tel:<?php echo preg_replace("/[\s-()]+/","",get_field('header_phno', 'option')); ?>" class="linkone">
							 <img src="<?php echo  get_template_directory_uri(); ?>/images/phone.png">
							 QUICK CONTACT <?php echo get_field('header_phno', 'option'); ?>
						 </a>
				   </div>
					 <?php } ?>
					 <?php if(get_field('hdr_agent_join_link','option')){ ?>
				   <div class=" pull-right">
				   	<a href="<?php echo get_field('hdr_agent_join_link','option'); ?>" class="linkone">
				   		<img src="<?php echo  get_template_directory_uri(); ?>/images/handshake.png">AGENTS: JOIN US
						</a>
				   </div>
					 <?php } ?>
				</div>
			</div>
		</div>
        <div class="headbottom">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-sm-3 col-xs-6">
						<?php if ( get_theme_mod( 'acodez-themes_logo' ) ) : ?>
							<div class='site-logo'>
								<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
									<img src='<?php echo esc_url( get_theme_mod( 'acodez-themes_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' class="trspbg">
									<img src="<?php echo  get_template_directory_uri(); ?>/images/logowhitebak.png" class="whitebg">
								</a>
							</div>
						<?php else : ?>
							<div class='site-logo'>
								<h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
								<h2 class='site-description'><?php bloginfo( 'description' ); ?></h2>
							</div>
						<?php endif;
						?>
					</div>
					<div class="col-lg-7 col-sm-9  col-xs-6">
						<nav id="site-navigation" class="main-navigation" role="navigation">
							<?php wp_nav_menu( array('container' => 'div', 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ,'menu_class' => 'header-menu') ); ?>
							<a href="#" class="navicon fas fa-bars"><span></span></a>
						</nav><!-- #site-navigation -->
					</div>
					<div class="col-lg-3 col-md-2 md-hidden">
						<ul class="actionbtns">
							<?php if(get_field('hdr_favourites_link','option')){ ?>
								<li><a href="<?php echo get_field('hdr_favourites_link','option'); ?>"><i class="far fa-heart"></i>FAVOURITES</a></li>
							<?php } ?>
							<?php if(get_field('hdr_signup_link','option')){ ?>
								<li><a href="<?php echo get_field('hdr_signup_link','option'); ?>"><i class="far fa-user"></i>SIGN UP</a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>

	</header>
	<?php 	if((is_home()) || (is_front_page())){ ?>

	<?php } ?>
