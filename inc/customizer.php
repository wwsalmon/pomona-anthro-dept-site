<?php
function panth_customizer($wp_customize)
{
    $wp_customize->add_section('panth-section', array(
        'title' => "Theme Custom Settings"
    ));
    $wp_customize->add_setting('panth-image');
    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'panth-image-control', array(
        "label" => "image field",
        "section" => "panth-section",
        "settings" => "panth-image",
        "width" => 900,
        "height" => 600,
        "flex-width" => true,
        "flex-height" => true
    )));
    $wp_customize->add_setting('panth-text');
    $wp_customize->add_control('panth-text-control', array(
        'label' => 'text field',
        'type' => 'string',
        'section' => 'panth-section',
        'settings' => 'panth-home-text'
    ));
}

add_action('customize_register', 'panth_customizer');