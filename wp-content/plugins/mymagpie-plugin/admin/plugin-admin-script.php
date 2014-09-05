<?php
//includ js files
	if(!function_exists('mymagpie_include_admin_scripts')){
		function mymagpie_include_admin_scripts(){
			wp_enqueue_script('mymagpie_plugin_script', MYMAGPIE_PLUGIN_URL.'admin/js/mymagpie-admin-plugin.js', array('jquery'), '0.1', true);
		}
		add_action( 'admin_enqueue_scripts', 'mymagpie_include_admin_scripts' );
	}
//includ css files
	if(!function_exists('mymagpie_include_admin_style')){
		function mymagpie_include_admin_style(){
			wp_enqueue_style('mymagpie_plugin_stylesheet', MYMAGPIE_PLUGIN_URL.'admin/css/mymagpie-admin-plugin.css', false, '0.1', 'all');
			wp_enqueue_style('font-awesome', 'http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css', false, '3.2.1', 'all');
		}
		add_action( 'admin_enqueue_scripts', 'mymagpie_include_admin_style' );
	}