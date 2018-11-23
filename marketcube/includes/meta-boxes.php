<?php
/**
 * Initialize the meta boxes. 
 */
add_action('admin_init', 'custom_meta_boxes');
function custom_meta_boxes() {
	/****************************Home Template*************************/

	$page_excerpt =  array(
        'id' => 'page_excerpt',
        'title' => 'Excerpt',
        'desc' => '',
		'pages' => array('page'),
/*		'page_templates' => array('templates/home.php'),*/
        'context' => 'normal',
        'priority' => 'high',
        'post_slugs' => array(),
        'fields' => array(
			array(
                'id' => 'exprt_cont',
				'label' => '',
                'desc' => '',
                'std' => '',
                'type' => 'textarea-simple',
                'section' => '',
                'class' => '',
                'choices' => array()
            )
        )
    );

    $home_page_banner =  array(
        'id' => 'home_page_banner',
        'title' => 'Banner Settings',
        'desc' => '',
		'pages' => array('page'),
        'page_templates' => array('templates/home.php'),
        'context' => 'normal',
        'priority' => 'high',
        'post_slugs' => array(),
        'fields' => array(
            array(
                'id' => 'ban_img',
				'label' => 'Image',
                'desc' => '',
                'std' => '',
                'type' => 'upload',
                'section' => '',
                'class' => '',
                'choices' => array()
            ),
            array(
                'id' => 'ban_title',
				'label' => 'Title',
                'desc' => '',
                'std' => '',
                'type' => 'text',
                'section' => '',
                'class' => '',
                'choices' => array()
            ),
			array(
                'id' => 'ban_desc',
				'label' => 'Description',
                'desc' => '',
                'std' => '',
                'type' => 'textarea-simple',
                'section' => '',
                'class' => '',
                'choices' => array()
            )
        )
    );
    
    $solutionspagegallery =  array(
        'id' => 'home_page_banner',
        'title' => 'solutions Settings',
        'desc' => '',
		'pages' => array('page'),
        'page_templates' => array('templates/solutions.php'),
        'context' => 'normal',
        'priority' => 'high',
        'post_slugs' => array(),
        'fields' => array(
            array(
                'id' => 'sol_ban_title',
				'label' => 'Title',
                'desc' => '',
                'std' => '',
                'type' => 'text',
                'section' => '',
                'class' => '',
                'choices' => array()
            ),
            array(
                'id'          => 'items',
                'label'       => 'items Blocks',
                'desc'        => '',
                'std'         => '',
                'type'        => 'list-item',
                'section'     => 'general',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and',
                'settings'    => array(
                    array(
                        'id'          => 'image',
                        'label'       => 'image',
                        'desc'        => '',
                        'std'         => '',
                        'type'        => 'upload',
                        'rows'        => '',
                        'post_type'   => '',
                        'taxonomy'    => '',
                        'min_max_step'=> '',
                        'class'       => '',
                        'condition'   => '',
                        'operator'    => 'and'
                    ),
                    array(
                        'id'          => 'heading',
                        'label'       => 'heading',
                        'desc'        => '',
                        'std'         => '',
                        'type'        => 'text',
                        'rows'        => '',
                        'post_type'   => '',
                        'taxonomy'    => '',
                        'min_max_step'=> '',
                        'class'       => '',
                        'condition'   => '',
                        'operator'    => 'and'
                    ),
                    array(
                        'id'          => 'para',
                        'label'       => 'para',
                        'desc'        => '',
                        'std'         => '',
                        'type'        => 'textarea-simple',
                        'rows'        => '',
                        'post_type'   => '',
                        'taxonomy'    => '',
                        'min_max_step'=> '',
                        'class'       => '',
                        'condition'   => '',
                        'operator'    => 'and'
                    )
            )
        )
    )
                    );

	$home_sec2 =  array (
        'id' => 'home_sec2',
        'title' => 'Section2',
        'desc' => '',
        'pages' => array('page'),
        'page_templates' => array('templates/home.php'),
        'context' => 'normal',
        'priority' => 'high',
        'post_slugs' => array(),
        'fields' => array(
            array(
                'id'          => 'h_s2_blks',
                'label'       => 'Top Blocks',
                'desc'        => '',
                'std'         => '',
                'type'        => 'list-item',
                'section'     => 'general',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and',
                'settings'    => array(
                    array(
                        'id'          => 'icon',
                        'label'       => 'Icon',
                        'desc'        => '',
                        'std'         => '',
                        'type'        => 'upload',
                        'rows'        => '',
                        'post_type'   => '',
                        'taxonomy'    => '',
                        'min_max_step'=> '',
                        'class'       => '',
                        'condition'   => '',
                        'operator'    => 'and'
                    ),
					array(
                        'id'          => 'btn_label',
                        'label'       => 'Button Label',
                        'desc'        => '',
                        'std'         => 'Our Technology',
                        'type'        => 'text',
                        'rows'        => '',
                        'post_type'   => '',
                        'taxonomy'    => '',
                        'min_max_step'=> '',
                        'class'       => '',
                        'condition'   => '',
                        'operator'    => 'and'
                    ),
                    array(
                        'id'          => 'btn_link',
                        'label'       => 'Button Link',
                        'desc'        => '',
                        'std'         => '',
                        'type'        => 'text',
                        'rows'        => '',
                        'post_type'   => '',
                        'taxonomy'    => '',
                        'min_max_step'=> '',
                        'class'       => '',
                        'condition'   => '',
                        'operator'    => 'and'
                    ),
					array(
                        'id'          => 'img_url',
                        'label'       => 'Image',
                        'desc'        => '',
                        'std'         => '',
                        'type'        => 'upload',
                        'rows'        => '',
                        'post_type'   => '',
                        'taxonomy'    => '',
                        'min_max_step'=> '',
                        'class'       => '',
                        'condition'   => '',
                        'operator'    => 'and'
                    )
                )
            ),
            array(
                'id' => 'h_s2_blk_title',
				'label' => 'Bottom Block Title',
                'desc' => '',
                'std' => '',
                'type' => 'text',
                'section' => '',
                'class' => '',
                'choices' => array()
            ),
            array(
                'id' => 'h_s2_blk_btn_link',
				'label' => 'Bottom Block Button Link',
                'desc' => '',
                'std' => '',
                'type' => 'text',
                'section' => '',
                'class' => '',
                'choices' => array()
            ),
            array(
                'id' => 'h_s2_blk_btn_label',
				'label' => 'Bottom Block Button Label',
                'desc' => '',
                'std' => 'About Clarity',
                'type' => 'text',
                'section' => '',
                'class' => '',
                'choices' => array()
            ),
            array(
                'id' => 'h_s2_blk_btn_circle',
				'label' => 'Bottom Block Circle',
                'desc' => '',
                'std' => '',
                'type' => 'upload',
                'section' => '',
                'class' => '',
                'choices' => array()
            )

        )
    );

    $home_sec3 =  array (
        'id' => 'home_sec3',
        'title' => 'Section3',
        'desc' => '',
        'pages' => array('page'),
        'page_templates' => array('templates/home.php'),
        'context' => 'normal',
        'priority' => 'high',
        'post_slugs' => array(),
        'fields' => array(
            array(
                'id' => 'h_s3_title',
				'label' => 'Title',
                'desc' => '',
                'std' => '',
                'type' => 'text',
                'section' => '',
                'class' => '',
                'choices' => array()
            ),
            array(
                'id' => 'h_s3_desc',
				'label' => 'Description',
                'desc' => '',
                'std' => '',
                'type' => 'textarea-simple',
                'section' => '',
                'class' => '',
                'choices' => array()
            ),
            array(
                'id' => 'h_s3_btn_link',
				'label' => 'Button Link',
                'desc' => '',
                'std' => '',
                'type' => 'text',
                'section' => '',
                'class' => '',
                'choices' => array()
            ),
            array(
                'id' => 'h_s3_btn_label',
				'label' => 'Button Label',
                'desc' => '',
                'std' => 'About Clarity',
                'type' => 'text',
                'section' => '',
                'class' => '',
                'choices' => array()
            ),
            array(
                'id' => 'h_s3_image',
				'label' => 'Image',
                'desc' => '',
                'std' => '',
                'type' => 'upload',
                'section' => '',
                'class' => '',
                'choices' => array()
            )

        )
    );

    $home_sec4 =  array (
        'id' => 'home_sec4',
        'title' => 'Section4',
        'desc' => '',
        'pages' => array('page'),
        'page_templates' => array('templates/home.php'),
        'context' => 'normal',
        'priority' => 'high',
        'post_slugs' => array(),
        'fields' => array(
            array(
                'id' => 'h_s4_title',
				'label' => 'Title',
                'desc' => '',
                'std' => '',
                'type' => 'text',
                'section' => '',
                'class' => '',
                'choices' => array()
            ),
            array(
                'id'          => 'h_s4_blks',
                'label'       => 'Blocks( maximum 3 )',
                'desc'        => '',
                'std'         => '',
                'type'        => 'list-item',
                'section'     => 'general',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and',
                'settings'    => array( 
                    array(
                        'id'          => 'desc',
                        'label'       => 'Description',
                        'desc'        => '',
                        'std'         => '',
                        'type'        => 'textarea-simple',
                        'rows'        => '',
                        'post_type'   => '',
                        'taxonomy'    => '',
                        'min_max_step'=> '',
                        'class'       => '',
                        'condition'   => '',
                        'operator'    => 'and'
                    ),
					array(
                        'id'          => 'image',
                        'label'       => 'Image',
                        'desc'        => '',
                        'std'         => '',
                        'type'        => 'upload',
                        'rows'        => '',
                        'post_type'   => '',
                        'taxonomy'    => '',
                        'min_max_step'=> '',
                        'class'       => '',
                        'condition'   => '',
                        'operator'    => 'and'
                    )
                )
            ),
            array(
                'id' => 'h_s4_btn_link',
				'label' => 'Button Link',
                'desc' => '',
                'std' => '',
                'type' => 'text',
                'section' => '',
                'class' => '',
                'choices' => array()
            ),
            array(
                'id' => 'h_s4_btn_label',
				'label' => 'Button Label',
                'desc' => '',
                'std' => 'Request a demo',
                'type' => 'text',
                'section' => '',
                'class' => '',
                'choices' => array()
            )
        )
    );
	
	$contact_map =  array(
        'id' => 'contact_map',
        'title' => 'Map Settings',
        'desc' => '',
		'pages' => array('page'),
		'page_templates' => array('templates/contact.php'),
        'context' => 'normal',
        'priority' => 'high',
        'post_slugs' => array(),
        'fields' => array(
			array(
				'id'          => 'map_lat',
				'label'       => 'Map Latitude',
				'desc'        => '',
				'std'         => '',
				'type'        => 'text',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => '',
				'operator'    => 'and'
			),
			array(
				'id'          => 'map_longi',
				'label'       => 'Map Longitude',
				'desc'        => '',
				'std'         => '',
				'type'        => 'text',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => '',
				'operator'    => 'and'
			),
			array(
				'id'          => 'map_zoom',
				'label'       => 'Map Zoom Level',
				'desc'        => '',
				'std'         => '',
				'type'        => 'text',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => '',
				'operator'    => 'and'
			),
			array(
                'id'          => 'cont_map',
                'label'       => 'Locations(Markers)',
                'desc'        => '',
                'std'         => '',
                'type'        => 'list-item',
                'section'     => 'general',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and',
                'settings'    => array( 
                    array(
                        'id'          => 'l_lati',
                        'label'       => 'Location Latitude',
                        'desc'        => '',
                        'std'         => '',
                        'type'        => 'text',
                        'rows'        => '',
                        'post_type'   => '',
                        'taxonomy'    => '',
                        'min_max_step'=> '',
                        'class'       => '',
                        'condition'   => '',
                        'operator'    => 'and'
                    ),
					array(
                        'id'          => 'l_longi',
                        'label'       => 'Location Longitude',
                        'desc'        => '',
                        'std'         => '',
                        'type'        => 'text',
                        'rows'        => '',
                        'post_type'   => '',
                        'taxonomy'    => '',
                        'min_max_step'=> '',
                        'class'       => '',
                        'condition'   => '',
                        'operator'    => 'and'
                    ),
					array(
                        'id'          => 'loc_address',
                        'label'       => 'Address',
                        'desc'        => '',
                        'std'         => '',
                        'type'        => 'textarea-simple',
                        'rows'        => '',
                        'post_type'   => '',
                        'taxonomy'    => '',
                        'min_max_step'=> '',
                        'class'       => '',
                        'condition'   => '',
                        'operator'    => 'and'
                    ),
                )
			)
        )
    );

    ot_register_meta_box($home_page_banner);
    ot_register_meta_box($home_sec2);
    ot_register_meta_box($home_sec3);
    ot_register_meta_box($home_sec4);
	ot_register_meta_box($solutionspagegallery);
	//ot_register_meta_box($homepage_slider);
	//ot_register_meta_box($contact_map);
}
?>
