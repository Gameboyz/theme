<?php
/**
 * Register Header Content section, settings and controls for Theme Customizer
 *
 */

// Add Theme Colors section to Customizer
add_action( 'customize_register', 'momentous_customize_register_header_settings' );

function momentous_customize_register_header_settings( $wp_customize ) {

	// Add Sections for Header Content
	$wp_customize->add_section( 'momentous_section_header', array(
        'title'    => __( 'Header Content', 'momentous-lite' ),
        'priority' => 20,
		'panel' => 'momentous_options_panel' 
		)
	);

	// Add Header Content Header
	$wp_customize->add_setting( 'momentous_theme_options[header_content]', array(
        'default'           => '',
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_attr'
        )
    );
    $wp_customize->add_control( new Momentous_Customize_Header_Control(
        $wp_customize, 'momentous_control_header_content', array(
            'label' => __( 'Header Content', 'momentous-lite' ),
            'section' => 'momentous_section_header',
            'settings' => 'momentous_theme_options[header_content]',
            'priority' => 2
            )
        )
    );

	// Add Settings and Controls for Header
	$wp_customize->add_setting( 'momentous_theme_options[header_search]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'momentous_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'momentous_control_header_search', array(
        'label'    => __( 'Activate dropdown search field on header area', 'momentous-lite' ),
        'section'  => 'momentous_section_header',
        'settings' => 'momentous_theme_options[header_search]',
        'type'     => 'checkbox',
		'priority' => 3
		)
	);

	$wp_customize->add_setting( 'momentous_theme_options[header_icons]', array(
        'default'           => false,
		'type'           	=> 'option',
        'transport'         => 'refresh',
        'sanitize_callback' => 'momentous_sanitize_checkbox'
		)
	);
    $wp_customize->add_control( 'momentous_control_header_icons', array(
        'label'    => __( 'Display Social Icons on main navigation', 'momentous-lite' ),
        'section'  => 'momentous_section_header',
        'settings' => 'momentous_theme_options[header_icons]',
        'type'     => 'checkbox',
		'priority' => 4
		)
	);
	
}

?>