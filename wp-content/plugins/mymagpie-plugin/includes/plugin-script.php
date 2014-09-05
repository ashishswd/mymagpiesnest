<?php
//include stylesheet files
	if ( !function_exists('mymagpie_include_stylesheet') ) {
		function mymagpie_include_stylesheet() {

			wp_deregister_style( 'flexslider' );
			wp_register_style( 'flexslider', MYMAGPIE_PLUGIN_URL . 'lib/js/FlexSlider/flexslider.css', false, '2.2.0', 'all' );
			wp_register_style( 'owl-carousel', MYMAGPIE_PLUGIN_URL . 'lib/js/owl-carousel/owl.carousel.css', false, '1.24', 'all' );
			wp_register_style( 'owl-theme', MYMAGPIE_PLUGIN_URL . 'lib/js/owl-carousel/owl.theme.css', false, '1.24', 'all' );
			wp_enqueue_style( 'flexslider' );
			wp_enqueue_style( 'owl-carousel', MYMAGPIE_PLUGIN_URL . 'lib/js/owl-carousel/owl.carousel.css', false, '1.24', 'all' );
			wp_enqueue_style( 'owl-theme', MYMAGPIE_PLUGIN_URL . 'lib/js/owl-carousel/owl.theme.css', false, '1.24', 'all' );
			wp_enqueue_style( 'font-awesome', 'http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css', false, '3.2.1', 'all' );

			if ( is_rtl() ) {
				wp_enqueue_style( 'mymagpie-plugin', MYMAGPIE_PLUGIN_URL . 'includes/css/mymagpie-plugin-rtl.css', false, MYMAGPIE_PLUGIN_VERSION, 'all' );
			} else {
				wp_enqueue_style( 'mymagpie-plugin', MYMAGPIE_PLUGIN_URL . 'includes/css/mymagpie-plugin.css', false, MYMAGPIE_PLUGIN_VERSION, 'all' );
			}
		}
		add_action( 'wp_enqueue_scripts', 'mymagpie_include_stylesheet', 9);
	}

//include script files
	if ( !function_exists('mymagpie_include_script') ) {
		function mymagpie_include_script(){
			wp_deregister_script( 'flexslider' );
			wp_register_script( 'flexslider', MYMAGPIE_PLUGIN_URL . 'lib/js/FlexSlider/jquery.flexslider-min.js', array('jquery'), '2.2.2', true );
			wp_enqueue_script( 'flexslider' );

			wp_deregister_script( 'easing' );
			wp_register_script( 'easing', MYMAGPIE_PLUGIN_URL . 'lib/js/jquery.easing.1.3.js', array('jquery'), '1.3' );
			wp_enqueue_script( 'easing' );

			wp_deregister_script( 'elastislide' );
			wp_register_script( 'elastislide', MYMAGPIE_PLUGIN_URL . 'lib/js/elasti-carousel/jquery.elastislide.js', array('jquery', 'easing'), MYMAGPIE_PLUGIN_VERSION );
			wp_enqueue_script( 'elastislide' );

			wp_enqueue_script( 'mymagpie-plugin', MYMAGPIE_PLUGIN_URL . 'includes/js/mymagpie-plugin.js', array('jquery'), MYMAGPIE_PLUGIN_VERSION, true );
		}
		add_action( 'wp_enqueue_scripts', 'mymagpie_include_script' );
	}