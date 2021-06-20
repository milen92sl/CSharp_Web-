<?php
/**
 * Before Content AD Options
 *
 * @package Blossom_Pin_Pro
 */

function blossom_pin_pro_customize_register_ad_before_content( $wp_customize ) {    
    
    $wp_customize->add_section( 'ad_bc_post_settings', array(
        'title'    => __( 'Before Content AD Settings', 'blossom-pin-pro' ),
        'priority' => 20,
        'panel'    => 'ad_settings'
    ) );
    
    /** Enable AD Before Content */
    $wp_customize->add_setting(
        'ed_bc_post_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'ed_bc_post_ad',
			array(
				'section'     => 'ad_bc_post_settings',
				'label'       => __( 'Enable AD Before Content', 'blossom-pin-pro' ),
                'description' => __( 'Enable AD Before Content in single post page.', 'blossom-pin-pro' ),
			)
		)
	);
    
    /** Enable Before Content AD Code */
    $wp_customize->add_setting(
        'ed_bc_post_ad_code',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'ed_bc_post_ad_code',
			array(
				'section' => 'ad_bc_post_settings',
				'label'   => __( 'Enable Before Content AD Code', 'blossom-pin-pro' ),
			)
		)
	);
    
    /** Before Content AD Code */
    $wp_customize->add_setting(
        'bc_post_ad_code',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_code'
        )
    );
        
    $wp_customize->add_control( 
        new Blossom_Pin_Pro_Code_Control(
            $wp_customize, 
            'bc_post_ad_code',
    		array(
    			'section'	  => 'ad_bc_post_settings',
    			'label'		  => __( 'Before Content AD Code', 'blossom-pin-pro' ),
                'description' => __( 'Paste your Adsense, ad code here to show ads before content in single post page.', 'blossom-pin-pro' ),
    			'choices'     => array(
			        'language' => 'javascript',
			        'theme'    => 'elegant', //options are 'monokai', 'material' & 'elegant'
                    'height'   => 250,
                ), 
                'active_callback' => 'blossom_pin_pro_adbc_ac'     		
            )
        )		
    );
    
    /** Open Link in Different Tab */
    $wp_customize->add_setting(
        'open_link_diff_tab_bc_post',
        array(
            'default'           => true,
            'sanitize_callback' => 'blossom_pin_pro_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
		new Blossom_Pin_Pro_Toggle_Control( 
			$wp_customize,
			'open_link_diff_tab_bc_post',
			array(
				'section'         => 'ad_bc_post_settings',
				'label'           => __( 'Open Link in Different Tab', 'blossom-pin-pro' ),
                'active_callback' => 'blossom_pin_pro_adbc_ac'
			)
		)
	);
    
    /** Upload Before Content AD */
    $wp_customize->add_setting(
        'bc_post_ad',
        array(
            'default'           => '',
            'sanitize_callback' => 'blossom_pin_pro_sanitize_number_absint',
        )
    );
    
    $wp_customize->add_control(
       new WP_Customize_Cropped_Image_Control(
           $wp_customize,
           'bc_post_ad',
           array(
               'label'           => __( 'Upload Before Content AD', 'blossom-pin-pro' ),
               'section'         => 'ad_bc_post_settings',
               'width'           => 920,
               'height'          => 90,
               'active_callback' => 'blossom_pin_pro_adbc_ac'
           )
       )
    );
       
    /** Before Content AD Link */
    $wp_customize->add_setting(
        'bc_post_ad_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    
    $wp_customize->add_control(
	   'bc_post_ad_link',
		array(
			'section'         => 'ad_bc_post_settings',
			'label'	          => __( 'Before Content AD Link', 'blossom-pin-pro' ),
			'type'            => 'text',
            'active_callback' => 'blossom_pin_pro_adbc_ac'
		)		
	);
    
}
add_action( 'customize_register', 'blossom_pin_pro_customize_register_ad_before_content' );