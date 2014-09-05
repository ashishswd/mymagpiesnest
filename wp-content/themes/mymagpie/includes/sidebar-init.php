<?php
// Register sidebars by running mymagpie_widgets_init() on the widgets_init hook.
add_action( 'widgets_init', 'mymagpie_widgets_init' );

function mymagpie_widgets_init() {
	// Sidebar Widget
	// Location: the sidebar
	register_sidebar( array(
		'name'          => theme_locals("sidebar"),
		'id'            => 'main-sidebar',
		'description'   => theme_locals("sidebar_desc"),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	// Home Widget Area 1
	// Location: the Home
	register_sidebar( array(
		'name'          => theme_locals("home_1"),
		'id'            => 'home-sidebar-1',
		'description'   => theme_locals("home_desc"),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<header>',
		'after_title'   => '</header>',
	) );
	// Home Widget Area 2
	// Location: the Home
	register_sidebar( array(
		'name'          => theme_locals("home_2"),
		'id'            => 'home-sidebar-2',
		'description'   => theme_locals("home_desc"),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<header>',
		'after_title'   => '</header>',
	) );
	// Home Widget Area 3
	// Location: the Home
	register_sidebar( array(
		'name'          => theme_locals("home_3"),
		'id'            => 'home-sidebar-3',
		'description'   => theme_locals("home_desc"),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<header>',
		'after_title'   => '</header>',
	) );
	// Home Widget Area 4
	// Location: the Home
	register_sidebar( array(
		'name'          => theme_locals("home_4"),
		'id'            => 'home-sidebar-4',
		'description'   => theme_locals("home_desc"),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<header>',
		'after_title'   => '</header>',
	) );
	// Top Widget Area 1
	// Location: the Home
	register_sidebar( array(
		'name'          => theme_locals("top_1"),
		'id'            => 'top-sidebar-1',
		'description'   => theme_locals("top_desc"),
		'before_widget' => '<div id="%1$s" class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<header>',
		'after_title'   => '</header>',
	) );
	// Footer Widget Area 1
	// Location: at the top of the footer, above the copyright
	register_sidebar( array(
		'name'          => theme_locals("footer_1"),
		'id'            => 'footer-sidebar-1',
		'description'   => theme_locals("footer_desc"),
		'before_widget' => '<div id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	// Footer Widget Area 2
	// Location: at the top of the footer, above the copyright
	register_sidebar( array(
		'name'          => theme_locals("footer_2"),
		'id'            => 'footer-sidebar-2',
		'description'   => theme_locals("footer_desc"),
		'before_widget' => '<div id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	// Footer Widget Area 3
	// Location: at the top of the footer, above the copyright
	register_sidebar( array(
		'name'          => theme_locals("footer_3"),
		'id'            => 'footer-sidebar-3',
		'description'   => theme_locals("footer_desc"),
		'before_widget' => '<div id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
	// Footer Widget Area 4
	// Location: at the top of the footer, above the copyright
	register_sidebar( array(
		'name'          => theme_locals("footer_4"),
		'id'            => 'footer-sidebar-4',
		'description'   => theme_locals("footer_desc"),
		'before_widget' => '<div id="%1$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );
} ?>