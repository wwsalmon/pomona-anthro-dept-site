<?php

function panth_script_enqueue()
{
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/style.css', false, NULL, 'all' );
    wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Inter:wght@300;400;500;600;700&display=swap', false, NULL, 'all' );
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css', false, NULL, 'all' );
}

add_action('wp_enqueue_scripts', 'panth_script_enqueue');

function remove_admin_bar() {
    show_admin_bar(false);
}

add_action('after_setup_theme', 'remove_admin_bar');

function panth_create_post_type() {

	register_post_type( 'Student work',
		// CPT Options
		array(
			'labels' => array(
				'name' => 'Student work',
				'singular_name' => 'Item',
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'student_work'),
			'show_in_rest' => true,
			'supports' => array('title', 'custom-fields'),
			'taxonomies' => array('category'),
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'panth_create_post_type' );