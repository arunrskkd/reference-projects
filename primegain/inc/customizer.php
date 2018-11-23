<?php
/**
 * Acodez Themes Theme Customizer.
 *
 * @package Acodez_Themes
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function acodez_themes_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	$wp_customize->add_section( 'acodez-themes_logo_section' , array(
    'title'       => __( 'Logo', 'acodez-themes' ),
    'priority'    => 30,
    'description' => 'Upload a logo to replace the default site name and description in the header',
) );
$wp_customize->add_setting( 'acodez-themes_logo' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'acodez-themes_logo', array(
    'label'    => __( 'Logo', 'acodez-themes' ),
    'section'  => 'acodez-themes_logo_section',
    'settings' => 'acodez-themes_logo',
) ) );

}
add_action( 'customize_register', 'acodez_themes_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function acodez_themes_customize_preview_js() {
	wp_enqueue_script( 'acodez_themes_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'acodez_themes_customize_preview_js' );


