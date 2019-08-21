<?php
/**
 * dronen Theme Customizer
 *
 * @package dronen
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function dronen_customize_register( $wp_customize ) {

	global $dronenPostsPagesArray, $dronenYesNo, $dronenSliderType, $dronenServiceLayouts, $dronenAvailableCats, $dronenBusinessLayoutType;

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'dronen_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'dronen_customize_partial_blogdescription',
		) );
	}
	
	$wp_customize->add_panel( 'dronen_general', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'      => __('General Settings', 'dronen'),
		'active_callback' => '',
	) );

	$wp_customize->get_section( 'title_tagline' )->panel = 'dronen_general';
	$wp_customize->get_section( 'background_image' )->panel = 'dronen_general';
	$wp_customize->get_section( 'background_image' )->title = __('Site background', 'dronen');
	$wp_customize->get_section( 'header_image' )->panel = 'dronen_general';
	$wp_customize->get_section( 'header_image' )->title = __('Header Settings', 'dronen');
	$wp_customize->get_control( 'header_image' )->priority = 20;
	$wp_customize->get_control( 'header_image' )->active_callback = 'dronen_show_wp_header_control';	
	$wp_customize->get_section( 'static_front_page' )->panel = 'business_page';
	$wp_customize->get_section( 'static_front_page' )->title = __('Select frontpage type', 'dronen');
	$wp_customize->get_section( 'static_front_page' )->priority = 9;
	$wp_customize->remove_section('colors');
	$wp_customize->add_control( 
			new WP_Customize_Color_Control( 
			$wp_customize, 
			'background_color', 
			array(
				'label'      => __( 'Background Color', 'dronen' ),
				'section'    => 'background_image',
				'priority'   => 9
			) ) 
	);
	//$wp_customize->remove_section('static_front_page');	
	//$wp_customize->remove_section('header_image');	

	/* Upgrade */	
	$wp_customize->add_section( 'business_upgrade', array(
		'priority'       => 8,
		'capability'     => 'edit_theme_options',
		'title'      => __('Upgrade to PRO', 'dronen'),
		'active_callback' => '',
	) );		
	$wp_customize->add_setting( 'dronen_show_sliderr',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new dronen_Customize_Control_Upgrade(
		$wp_customize,
		'dronen_show_sliderr',
		array(
			'label'      => __( 'Show headerr?', 'dronen' ),
			'settings'   => 'dronen_show_sliderr',
			'priority'   => 10,
			'section'    => 'business_upgrade',
			'choices' => '',
			'input_attrs'  => 'yes',
			'active_callback' => ''			
		)
	) );
	
	/* Usage guide */	
	$wp_customize->add_section( 'business_usage', array(
		'priority'       => 9,
		'capability'     => 'edit_theme_options',
		'title'      => __('Theme Usage Guide', 'dronen'),
		'active_callback' => '',
	) );		
	$wp_customize->add_setting( 'dronen_show_sliderrr',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);	
	$wp_customize->add_control( new dronen_Customize_Control_Guide(
		$wp_customize,
		'dronen_show_sliderrr',
		array(

			'label'      => __( 'Show headerr?', 'dronen' ),
			'settings'   => 'dronen_show_sliderrr',
			'priority'   => 10,
			'section'    => 'business_usage',
			'choices' => '',
			'input_attrs'  => 'yes',
			'active_callback' => ''				
		)
	) );
	
	/* Header Section */
	$wp_customize->add_setting( 'dronen_show_slider',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'dronen_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'dronen_show_slider',
		array(
			'label'      => __( 'Show header?', 'dronen' ),
			'settings'   => 'dronen_show_slider',
			'priority'   => 10,
			'section'    => 'header_image',
			'type'    => 'select',
			'choices' => $dronenYesNo,
		)
	) );	
	$wp_customize->add_setting( 'header_type',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'dronen_sanitize_slider_type_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'header_type',
		array(
			'label'      => __( 'Header type :', 'dronen' ),
			'settings'   => 'header_type',
			'priority'   => 10,
			'section'    => 'header_image',
			'type'    => 'select',
			'choices' => $dronenSliderType,
		)
	) );
	
	$wp_customize->add_setting( 'dronen_header_one_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'dronen_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'dronen_header_one_post',
		array(
			'label'      => __( 'Header post :', 'dronen' ),
			'settings'   => 'dronen_header_one_post',
			'priority'   => 30,
			'section'    => 'header_image',
			'type'    => 'select',
			'choices' => $dronenPostsPagesArray,
			'active_callback' => 'dronen_show_header_one_control'
		)
	) );	
	
	
	/* Business page panel */
	$wp_customize->add_panel( 'business_page', array(
		'priority'       => 20,
		'capability'     => 'edit_theme_options',
		'title'      => __('Home/Front Page Settings', 'dronen'),
		'active_callback' => '',
	) );
	$wp_customize->add_section( 'business_page_layout', array(
		'priority'       => 13,
		'capability'     => 'edit_theme_options',
		'title'      => __('Select layout', 'dronen'),
		'active_callback' => 'dronen_front_page_sections',
		'panel'  => 'business_page',
	) );
	$wp_customize->add_setting( 'business_page_layout_type',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'dronen_sanitize_layout_type',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'business_page_layout_type',
		array(
			'label'      => __( 'Layout type :', 'dronen' ),
			'settings'   => 'business_page_layout_type',
			'priority'   => 10,
			'section'    => 'business_page_layout',
			'type'    => 'select',
			'choices' => $dronenBusinessLayoutType,
		)
	) );
	
	$wp_customize->add_section( 'business_page_layout_one', array(
		'priority'       => 20,
		'capability'     => 'edit_theme_options',
		'title'      => __('Layout One settings', 'dronen'),
		'active_callback' => 'dronen_front_page_sections',
		'panel'  => 'business_page',
	) );


	$wp_customize->add_setting( 'dronen_welcome_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'dronen_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'dronen_welcome_post',
		array(
			'label'      => __( 'Welcome post :', 'dronen' ),
			'settings'   => 'dronen_welcome_post',
			'priority'   => 11,
			'section'    => 'business_page_layout_one',
			'type'    => 'select',
			'choices' => $dronenPostsPagesArray,
		)
	) );
	
	$wp_customize->add_setting( 'dronen_services_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'dronen_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'dronen_services_cat',
		array(
			'label'      => __( 'Select category for services :', 'dronen' ),
			'settings'   => 'dronen_services_cat',
			'priority'   => 21,
			'section'    => 'business_page_layout_one',
			'type'    => 'select',
			'choices' => $dronenAvailableCats,
		)
	) );
	
	

	$wp_customize->add_setting( 'dronen_portfolio_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'dronen_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'dronen_portfolio_cat',
		array(
			'label'      => __( 'Select category for portfolio :', 'dronen' ),
			'settings'   => 'dronen_portfolio_cat',
			'priority'   => 21,
			'section'    => 'business_page_layout_one',
			'type'    => 'select',
			'choices' => $dronenAvailableCats,
		)
	) );
	

	$wp_customize->add_setting( 'dronen_news_cat',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'dronen_sanitize_cat_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'dronen_news_cat',
		array(
			'label'      => __( 'Select category for news :', 'dronen' ),
			'settings'   => 'dronen_news_cat',
			'priority'   => 31,
			'section'    => 'business_page_layout_one',
			'type'    => 'select',
			'choices' => $dronenAvailableCats,
		)
	) );	
	
	
	
	
	$wp_customize->add_section( 'business_page_layout_two', array(
		'priority'       => 30,
		'capability'     => 'edit_theme_options',
		'title'      => __('Layout Two settings', 'dronen'),
		'active_callback' => 'dronen_front_page_sections',
		'panel'  => 'business_page',
	) );
	/*
	$wp_customize->add_setting( 'dronen_show_slider_two',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'dronen_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'dronen_show_slider_two',
		array(
			'label'      => __( 'Show header?', 'dronen' ),
			'settings'   => 'dronen_show_slider_two',
			'priority'   => 10,
			'section'    => 'business_page_layout_two',
			'type'    => 'select',
			'choices' => $dronenYesNo,
		)
	) );
	*/
	$wp_customize->add_setting( 'dronen_two_welcome_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'dronen_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'dronen_two_welcome_post',
		array(
			'label'      => __( 'Welcome post :', 'dronen' ),
			'settings'   => 'dronen_two_welcome_post',
			'priority'   => 20,
			'section'    => 'business_page_layout_two',
			'type'    => 'select',
			'choices' => $dronenPostsPagesArray,
		)
	) );	
	
	$wp_customize->add_setting( 'dronen_two_product_post_one',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'dronen_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'dronen_two_product_post_one',
		array(
			'label'      => __( 'Product One :', 'dronen' ),
			'settings'   => 'dronen_two_product_post_one',
			'priority'   => 30,
			'section'    => 'business_page_layout_two',
			'type'    => 'select',
			'choices' => $dronenPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'dronen_two_product_post_two',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'dronen_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'dronen_two_product_post_two',
		array(
			'label'      => __( 'Product Two :', 'dronen' ),
			'settings'   => 'dronen_two_product_post_two',
			'priority'   => 30,
			'section'    => 'business_page_layout_two',
			'type'    => 'select',
			'choices' => $dronenPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'dronen_two_product_post_three',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'dronen_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'dronen_two_product_post_three',
		array(
			'label'      => __( 'Product Three :', 'dronen' ),
			'settings'   => 'dronen_two_product_post_three',
			'priority'   => 30,
			'section'    => 'business_page_layout_two',
			'type'    => 'select',
			'choices' => $dronenPostsPagesArray,
		)
	) );
	
	$wp_customize->add_section( 'business_page_layout_three', array(
		'priority'       => 40,
		'capability'     => 'edit_theme_options',
		'title'      => __('Layout Three settings', 'dronen'),
		'active_callback' => 'dronen_front_page_sections',
		'panel'  => 'business_page',
	) );
	$wp_customize->add_setting( 'dronen_three_welcome_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'dronen_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'dronen_three_welcome_post',
		array(
			'label'      => __( 'Welcome post :', 'dronen' ),
			'settings'   => 'dronen_three_welcome_post',
			'priority'   => 10,
			'section'    => 'business_page_layout_three',
			'type'    => 'select',
			'choices' => $dronenPostsPagesArray,
		)
	) );
	
	$wp_customize->add_setting( 'dronen_three_products_one',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'dronen_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'dronen_three_products_one',
		array(
			'label'      => __( 'Product One :', 'dronen' ),
			'settings'   => 'dronen_three_products_one',
			'priority'   => 20,
			'section'    => 'business_page_layout_three',
			'type'    => 'select',
			'choices' => $dronenPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'dronen_three_products_two',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'dronen_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'dronen_three_products_two',
		array(
			'label'      => __( 'Product Two :', 'dronen' ),
			'settings'   => 'dronen_three_products_two',
			'priority'   => 30,
			'section'    => 'business_page_layout_three',
			'type'    => 'select',
			'choices' => $dronenPostsPagesArray,
		)
	) );	
	$wp_customize->add_setting( 'dronen_three_products_three',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'dronen_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'dronen_three_products_three',
		array(
			'label'      => __( 'Product Three :', 'dronen' ),
			'settings'   => 'dronen_three_products_three',
			'priority'   => 40,
			'section'    => 'business_page_layout_three',
			'type'    => 'select',
			'choices' => $dronenPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'dronen_three_portfolio_one',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'dronen_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'dronen_three_portfolio_one',
		array(
			'label'      => __( 'Portfolio item one :', 'dronen' ),
			'settings'   => 'dronen_three_portfolio_one',
			'priority'   => 50,
			'section'    => 'business_page_layout_three',
			'type'    => 'select',
			'choices' => $dronenPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'dronen_three_portfolio_two',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'dronen_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'dronen_three_portfolio_two',
		array(
			'label'      => __( 'Portfolio item two :', 'dronen' ),
			'settings'   => 'dronen_three_portfolio_two',
			'priority'   => 60,
			'section'    => 'business_page_layout_three',
			'type'    => 'select',
			'choices' => $dronenPostsPagesArray,
		)
	) );
	$wp_customize->add_setting( 'dronen_three_portfolio_three',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'dronen_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'dronen_three_portfolio_three',
		array(
			'label'      => __( 'Portfolio item three :', 'dronen' ),
			'settings'   => 'dronen_three_portfolio_three',
			'priority'   => 70,
			'section'    => 'business_page_layout_three',
			'type'    => 'select',
			'choices' => $dronenPostsPagesArray,
		)
	) );	

	$wp_customize->add_section( 'business_page_quote', array(
		'priority'       => 110,
		'capability'     => 'edit_theme_options',
		'title'      => __('Quote Settings', 'dronen'),
		'active_callback' => '',
		'panel'  => 'dronen_general',
	) );
	$wp_customize->add_setting( 'dronen_show_quote',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'dronen_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'dronen_show_quote',
		array(
			'label'      => __( 'Show quote?', 'dronen' ),
			'settings'   => 'dronen_show_quote',
			'priority'   => 10,
			'section'    => 'business_page_quote',
			'type'    => 'select',
			'choices' => $dronenYesNo,
		)
	) );
	$wp_customize->add_setting( 'dronen_quote_post',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'dronen_sanitize_post_selection',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'dronen_quote_post',
		array(
			'label'      => __( 'Select post', 'dronen' ),
			'description' => __( 'Select a post/page you want to show in quote section', 'dronen' ),
			'settings'   => 'dronen_quote_post',
			'priority'   => 11,
			'section'    => 'business_page_quote',
			'type'    => 'select',
			'choices' => $dronenPostsPagesArray,
		)
	) );	
	
	$wp_customize->add_section( 'business_page_social', array(
		'priority'       => 120,
		'capability'     => 'edit_theme_options',
		'title'      => __('Social Settings', 'dronen'),
		'active_callback' => '',
		'panel'  => 'dronen_general',
	) );	
	$wp_customize->add_setting( 'dronen_show_social',
		array(
			'default'    => 'select',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'dronen_sanitize_yes_no_setting',
		) 
	);	
	$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'dronen_show_social',
		array(
			'label'      => __( 'Show social?', 'dronen' ),
			'settings'   => 'dronen_show_social',
			'priority'   => 10,
			'section'    => 'business_page_social',
			'type'    => 'select',
			'choices' => $dronenYesNo,
		)
	) );
	$wp_customize->add_setting( 'business_page_facebook',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_facebook', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Facebook', 'dronen' ),
	  'description' => __( 'Enter your facebook url.', 'dronen' ),
	) );
	$wp_customize->add_setting( 'business_page_flickr',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_flickr', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Flickr', 'dronen' ),
	  'description' => __( 'Enter your flickr url.', 'dronen' ),
	) );
	$wp_customize->add_setting( 'business_page_gplus',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_gplus', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Gplus', 'dronen' ),
	  'description' => __( 'Enter your gplus url.', 'dronen' ),
	) );
	$wp_customize->add_setting( 'business_page_linkedin',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_linkedin', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Linkedin', 'dronen' ),
	  'description' => __( 'Enter your linkedin url.', 'dronen' ),
	) );
	$wp_customize->add_setting( 'business_page_reddit',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_reddit', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Reddit', 'dronen' ),
	  'description' => __( 'Enter your reddit url.', 'dronen' ),
	) );
	$wp_customize->add_setting( 'business_page_stumble',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_stumble', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Stumble', 'dronen' ),
	  'description' => __( 'Enter your stumble url.', 'dronen' ),
	) );
	$wp_customize->add_setting( 'business_page_twitter',
		array(
			'default'    => '',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		) 
	);
	$wp_customize->add_control( 'business_page_twitter', array(
	  'type' => 'text',
	  'section' => 'business_page_social', // Add a default or your own section
	  'label' => __( 'Twitter', 'dronen' ),
	  'description' => __( 'Enter your twitter url.', 'dronen' ),
	) );	
	
}
add_action( 'customize_register', 'dronen_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function dronen_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function dronen_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function dronen_customize_preview_js() {
	wp_enqueue_script( 'dronen-customizer', esc_url( get_template_directory_uri() ) . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'dronen_customize_preview_js' );

require get_template_directory() . '/inc/variables.php';

function dronen_sanitize_yes_no_setting( $value ){
	global $dronenYesNo;
    if ( ! array_key_exists( $value, $dronenYesNo ) ){
        $value = 'select';
	}
    return $value;	
}

function dronen_sanitize_post_selection( $value ){
	global $dronenPostsPagesArray;
    if ( ! array_key_exists( $value, $dronenPostsPagesArray ) ){
        $value = 'select';
	}
    return $value;	
}

function dronen_front_page_sections(){
	
	$value = false;
	
	if( 'page' == get_option( 'show_on_front' ) ){
		$value = true;
	}
	
	return $value;
	
}

function dronen_show_wp_header_control(){
	
	$value = false;
	
	if( 'header' == get_theme_mod( 'header_type' ) ){
		$value = true;
	}
	
	return $value;
	
}

function dronen_show_header_one_control(){
	
	$value = false;
	
	if( 'header-one' == get_theme_mod( 'header_type' ) ){
		$value = true;
	}
	
	return $value;
	
}

function dronen_sanitize_slider_type_setting( $value ){

	global $dronenSliderType;
    if ( ! array_key_exists( $value, $dronenSliderType ) ){
        $value = 'select';
	}
    return $value;	
	
}

function dronen_sanitize_cat_setting( $value ){
	
	global $dronenAvailableCats;
	
	if( ! array_key_exists( $value, $dronenAvailableCats ) ){
		
		$value = 'select';
		
	}
	return $value;
	
}

function dronen_sanitize_layout_type( $value ){
	
	global $dronenBusinessLayoutType;
	
	if( ! array_key_exists( $value, $dronenBusinessLayoutType ) ){
		
		$value = 'select';
		
	}
	return $value;
	
}

add_action( 'customize_register', 'dronen_load_customize_classes', 0 );
function dronen_load_customize_classes( $wp_customize ) {
	
	class dronen_Customize_Control_Upgrade extends WP_Customize_Control {

		public $type = 'dronen-upgrade';
		
		public function enqueue() {

		}

		public function to_json() {
			
			parent::to_json();

			$this->json['link']    = $this->get_link();
			$this->json['value']   = $this->value();
			$this->json['id']      = $this->id;
			//$this->json['default'] = $this->default;
			
		}	
		
		public function render_content() {}
		
		public function content_template() { ?>

			<div id="dronen-upgrade-container" class="dronen-upgrade-container">

				<ul>
					<li>More sliders</li>
					<li>More layouts</li>
					<li>Color customization</li>
					<li>Font customization</li>
				</ul>

				<p>
					<a href="https://www.themealley.com/business/">Upgrade</a>
				</p>
									
			</div><!-- .dronen-upgrade-container -->
			
		<?php }	
		
	}
	
	class dronen_Customize_Control_Guide extends WP_Customize_Control {

		public $type = 'dronen-guide';
		
		public function enqueue() {

		}

		public function to_json() {
			
			parent::to_json();

			$this->json['link']    = $this->get_link();
			$this->json['value']   = $this->value();
			$this->json['id']      = $this->id;
			//$this->json['default'] = $this->default;
			
		}	
		
		public function render_content() {}
		
		public function content_template() { ?>

			<div id="dronen-upgrade-container" class="dronen-upgrade-container">

				<ol>
					<li>Select 'A static page' for "your homepage displays" in 'select frontpage type' section of 'Home/Front Page settings' tab.</li>
					<li>Enter details for various section like header, welcome, services, quote, social sections.</li>
				</ol>
									
			</div><!-- .dronen-upgrade-container -->
			
		<?php }	
		
	}	

	$wp_customize->register_control_type( 'dronen_Customize_Control_Upgrade' );
	$wp_customize->register_control_type( 'dronen_Customize_Control_Guide' );
	
	
}