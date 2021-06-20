<?php
/**
 * Typography Body Settings
 *
 * @package Blossom_Recipe_Pro
 */

function blossom_recipe_pro_customize_register_typography_body( $wp_customize ) {
    
    /** Body Settings */
    $wp_customize->add_section(
        'body_settings',
        array(
            'title'    => __( 'Body Settings', 'blossom-recipe-pro' ),
            'priority' => 10,
            'panel'    => 'typography_settings'
        )
    );
    
    /** Primary Font */
    $wp_customize->add_setting(
		'primary_font',
		array(
			'default'			=> 'Nunito Sans',
			'sanitize_callback' => 'blossom_recipe_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Recipe_Pro_Select_Control(
    		$wp_customize,
    		'primary_font',
    		array(
                'label'	      => __( 'Primary Font', 'blossom-recipe-pro' ),
                'description' => __( 'Primary font of the site.', 'blossom-recipe-pro' ),
    			'section'     => 'body_settings',
    			'choices'     => blossom_recipe_pro_get_all_fonts(),	
     		)
		)
	);
    
    /** Secondary Font */
    $wp_customize->add_setting(
		'secondary_font',
		array(
			'default'			=> 'Marcellus',
			'sanitize_callback' => 'blossom_recipe_pro_sanitize_select'
		)
	);

	$wp_customize->add_control(
		new Blossom_Recipe_Pro_Select_Control(
    		$wp_customize,
    		'secondary_font',
    		array(
                'label'	      => __( 'Secondary Font', 'blossom-recipe-pro' ),
                'description' => __( 'Secondary font of the site.', 'blossom-recipe-pro' ),
    			'section'     => 'body_settings',
    			'choices'     => blossom_recipe_pro_get_all_fonts(),	
     		)
		)
	);  
        
    /** Font Size*/
    $wp_customize->add_setting( 
        'font_size', 
        array(
            'default'           => 18,
            'sanitize_callback' => 'blossom_recipe_pro_sanitize_number_absint'
        ) 
    );
    
    $wp_customize->add_control(
		new Blossom_Recipe_Pro_Slider_Control( 
			$wp_customize,
			'font_size',
			array(
				'section'	  => 'body_settings',
				'label'		  => __( 'Font Size', 'blossom-recipe-pro' ),
				'description' => __( 'Change the font size of your site.', 'blossom-recipe-pro' ),
                'choices'	  => array(
					'min' 	=> 10,
					'max' 	=> 50,
					'step'	=> 1,
				)                 
			)
		)
	);
}
add_action( 'customize_register', 'blossom_recipe_pro_customize_register_typography_body' );