<?php//-------------------1 Add panel Header -------------------------// Add panel Header$wp_customize->add_panel(    'header',    array(        'title'      => __( 'Header', 'restaurant' ),        'priority'   => 30,    ));//--------------------- Add section ---------------------------------// Add section Page Header hotline.$wp_customize->add_section(    'page_header',    array(        'title'    => __( 'Page header', 'restaurant' ),        'panel'    => 'header',    ));//----------------------------------------Setting----------------------------------// Add background_header_image color.$wp_customize->add_setting(    'background_header_image',    array(        'type'       => 'option', // 'option' || 'theme_mod        'capability' => 'edit_theme_options',    ));// Add background color control.$wp_customize->add_control(    new WP_Customize_Color_Control(        $wp_customize,        'background_header_image',        array(            'label'    => __( 'Background Color', 'restaurant' ),            'section'  => 'page_header',            'settings' => 'background_header_image',        )    ));//---------------------------------------- Background Image Header// Add Background Image header section$wp_customize->add_setting(    'page_header_background',    array(        'type'       => 'option', // 'option' || 'theme_mod        'capability' => 'edit_theme_options',    ));// Add Background Image header control.$wp_customize->add_control(    new WP_Customize_Image_Control(        $wp_customize,        'page_header_background',        array(            'label'    => __( 'Background', 'restaurant' ),            'section'  => 'page_header',            'settings' => 'page_header_background',        )    ));