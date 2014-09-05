<?php
/*
	Plugin Name: Mymagpie Plugin
	Version: 1.2.3
	Plugin URI: http://www.mymagpieframework.com/update/meet-the-mymagpie-plugin-bare-functionalities-no-strings-attached/
	Description: Mymagpie team has already created a Mymagpie framework that can be reasonably called perfect, but we are always looking for more improvements. Meet the Mymagpie Plugin. This is an extension for our Mymagpie framework where we've included all shortcodes and widgets you will ever need. The plugin is fully compatible with any WordPress theme powered by Mymagpie Framework. So far the plugin is a beta release, but we're going to keep on improving it, to deliver even more cool features.
	Author: Mymagpie Team.
	Author URI: http://www.mymagpieframework.com/
	Text Domain: mymagpie-plugin
	Domain Path: languages/
	License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
//plugin settings
	if(!function_exists('mymagpie_plugin_settings')){
		function mymagpie_plugin_settings(){
			global $wpdb;

			if ( !function_exists( 'get_plugin_data' ) ) require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

			$upload_dir = wp_upload_dir();
			$plugin_data = get_plugin_data(plugin_dir_path(__FILE__).'mymagpie-plugin.php');

			//Mymagpie plugin constant variables
			define('MYMAGPIE_PLUGIN_DIR', plugin_dir_path(__FILE__));
			define('MYMAGPIE_PLUGIN_URL', plugin_dir_url(__FILE__));
			define('MYMAGPIE_PLUGIN_DOMAIN', $plugin_data['TextDomain']);
			define('MYMAGPIE_PLUGIN_DOMAIN_DIR', $plugin_data['DomainPath']);
			define('MYMAGPIE_PLUGIN_VERSION', $plugin_data['Version']);
			define('MYMAGPIE_PLUGIN_NAME', $plugin_data['Name']);
			define('MYMAGPIE_PLUGIN_SLUG', plugin_basename( __FILE__ ));
			define('MYMAGPIE_PLUGIN_DB', $wpdb->prefix.MYMAGPIE_PLUGIN_DOMAIN);
			define('MYMAGPIE_PLUGIN_REMOTE_SERVER', 'http://www.mymagpieframework.com/components_update/');

			//Other constant variables
			define('CURRENT_THEME_DIR', get_stylesheet_directory());
			define('CURRENT_THEME_URI', get_stylesheet_directory_uri());
			define('UPLOAD_BASE_DIR', str_replace("\\", "/", $upload_dir['basedir']));
			define('UPLOAD_DIR', str_replace("\\", "/", $upload_dir['path'].'/'));

			if ( !defined('API_URL') ) {
				define( 'API_URL', esc_url( 'http://updates.mymagpie.template-help.com/mymagpiemoto/v3/api/' ) );
			}

			load_plugin_textdomain( MYMAGPIE_PLUGIN_DOMAIN, false, dirname( plugin_basename( __FILE__ ) ) . '/'.MYMAGPIE_PLUGIN_DOMAIN_DIR);

			do_action( 'mymagpie_plugin_settings' );
		}
		add_action('plugins_loaded', 'mymagpie_plugin_settings', 0);
	};
//init plugin
	if(!function_exists('mymagpie_plugin_init')){
		function mymagpie_plugin_init(){

			include_once (MYMAGPIE_PLUGIN_DIR . 'includes/plugin-assets.php');
			if(is_admin()){
				include_once (MYMAGPIE_PLUGIN_DIR . 'admin/admin.php');
			}else{
				include_once (MYMAGPIE_PLUGIN_DIR . 'includes/plugin-includes.php');
			}
			do_action( 'mymagpie_plugin_init' );
		}
		add_action('init', 'mymagpie_plugin_init', 0);
	};

//upgrade plugin's version
	if(!function_exists('mymagpie_plugin_upgrade')){
		function mymagpie_plugin_upgrade() {
			$opt = get_option( 'mymagpie_plugin' );

			if ( ! is_array( $opt ) )
				$opt = array();

			$old_ver = isset( $opt['version'] ) ? (string) $opt['version'] : '0';
			$new_ver = MYMAGPIE_PLUGIN_VERSION;

			if ( $old_ver == $new_ver )
				return;

			do_action( 'mymagpie_plugin_upgrade_ver', $new_ver, $old_ver );

			$opt['version'] = $new_ver;

			update_option( 'mymagpie_plugin', $opt );
		}
		add_action( 'admin_init', 'mymagpie_plugin_upgrade' );
	};

//activate plugin
	if(!function_exists('mymagpie_plugin_activate')){
		function mymagpie_plugin_activate(){
			do_action( 'mymagpie_plugin_activate' );
		}
		register_activation_hook( __FILE__, 'mymagpie_plugin_activate' );
	};

//deactivate plugin
	if(!function_exists('mymagpie_plugin_deactivate')){
		function mymagpie_plugin_deactivate(){
			//echo "mymagpie_plugin_deactivate";
			do_action( 'mymagpie_plugin_deactivate' );
		}
		register_deactivation_hook( __FILE__, 'mymagpie_plugin_deactivate' );
	};

//delete plugin
	if(!function_exists('mymagpie_plugin_uninstall')){
		function mymagpie_plugin_uninstall(){
			//echo "mymagpie_plugin_uninstall";
			do_action( 'mymagpie_plugin_uninstall' );
		}
		register_uninstall_hook(__FILE__, 'mymagpie_plugin_uninstall');
	};
