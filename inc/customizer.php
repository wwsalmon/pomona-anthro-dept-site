<?php
function sz_template_customizer($wp_customize)
{
    $wp_customize->add_section('sz-template-section', array(
        'title' => "Theme Custom Settings"
    ));
    $wp_customize->add_setting('sz-template-image');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'sz-template-image-control', array(
        "label" => "image field",
        "section" => "sz-template-section",
        "settings" => "sz-template-image",
        "width" => 900,
        "height" => 600,
        "flex-width" => true,
        "flex-height" => true
    )));
    $wp_customize->add_setting('sz-template-text');
    $wp_customize->add_control('sz-template-text-control', array(
        'label' => 'text field',
        'type' => 'string',
        'section' => 'sz-template-section',
        'settings' => 'sz-template-home-text'
    ));
}

add_action('customize_register', 'sz_template_customizer');