<?php 

function dipsheet_script_enqueue() {

	//To get the bootstrap custom style sheet 
	wp_enqueue_style('bootstrapstyle',get_template_directory_uri().'/css/bootstrap.min.css',array(),'1.0','all');

	//To get the custom style sheet 
	wp_enqueue_style('customstyle',get_template_directory_uri().'/css/dipsheet.css',array(),'1.0','all');

	// To include Jquery
	wp_enqueue_script('jquery');

	// To get the bootstrap javascript
	wp_enqueue_script('bootstrapscripts',get_template_directory_uri().'/js/bootstrap.min.js',array(),'1.0',true);

	// To get the custom javascript
	wp_enqueue_script('customscripts',get_template_directory_uri().'/js/dipsheet.js',array(),'1.0',true);


	
}	
// To get the action to the  
add_action('wp_enqueue_scripts','dipsheet_script_enqueue');

function dipsheet_theme_setup(){

	/*
	++++++++++++++++++++++++++++++++++++++
	Activate Menus
	++++++++++++++++++++++++++++++++++++++
	*/
 
 	//Will add theme support for menus
	add_theme_support('menus');
	//Will register the primary navigation
	register_nav_menu('primary','Primary Header Navigation'); 
	//Will register the footer navigation
	register_nav_menu('footer','Footer Navigation'); 
 
	
	
}

	/*
	++++++++++++++++++++++++++++++++++++++
	Theme Support Function
	++++++++++++++++++++++++++++++++++++++
	*/

	//Action to initialize the theme
	add_action('init','dipsheet_theme_setup');
	//Action to let the user customize the background
	add_theme_support('custom-background');
	//Action to let the user customize the header
	add_theme_support('custom-header');
	//Action to let the user customize the thumbnails
	add_theme_support('post-thumbnails');

	//Action to add post formats
	add_theme_support('post-formats',array('aside','image','video'));

	//Add HTML 5 SUpport
	add_theme_support('html5',array('search-form'));

	/*
	++++++++++++++++++++++++++++++++++++++
	Sidebar Function
	++++++++++++++++++++++++++++++++++++++
	*/

	function dipsheet_widget_setup(){

		register_sidebar(
			array(

				'name' => 'Sidebar',
				'id' => 'sidebar-1',
				'class' => 'custom',
				'description' => 'Standard Sidebar',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>',

			)
		);

	}

	add_action('widgets_init','dipsheet_widget_setup');



	/*
	++++++++++++++++++++++++++++++++++++++
	Include Walker  File
	++++++++++++++++++++++++++++++++++++++
	*/

	require get_template_directory() . '/inc/walker.php';



?> 