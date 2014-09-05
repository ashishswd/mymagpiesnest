<?php
//Main plugin page
	if( !function_exists('mymagpie_plugin_main_page') ){
		function mymagpie_plugin_main_page(){
			$mymagpie_plugin_components = new mymagpie_plugin_components;
			$mymagpie_plugin_components -> get_header(array('title' => __('Mymagpie Plugin', MYMAGPIE_PLUGIN_DOMAIN), 'wrapper_class' => 'mymagpie_plugin_main_page'));

			add_thickbox();
			?>

			<p><?php _e( 'Mymagpie Plugin has been released with intention to separate widgets, shortcodes and data management logics with theme editor options. Mymagpie Plugin is installed automatically on MymagpieFramework installation and is required for the correct work of MymagpieFramework.  ', MYMAGPIE_PLUGIN_DOMAIN); ?></p><br>
				<div class="cols cols-2">
					<div class="col">
						<div class="plugin-option">
							<a href="#TB_inline?width=600&height=505&inlineId=help_import" class="demo-vid thickbox" title="<?php _e('Files Import demo', MYMAGPIE_PLUGIN_DOMAIN); ?>"><i class="icon-facetime-video"></i></a>
							<div class="thumb-icon">
								<i class="icon-download-alt"></i>
							</div>
							<h4><a href="?page=import-page"><?php _e('Import', MYMAGPIE_PLUGIN_DOMAIN); ?></a></h4>
							<p><small><?php _e('Option to import website content from the backup. Select all files from the backup archive and drag them to the upload files area to start uploading.', MYMAGPIE_PLUGIN_DOMAIN); ?></small></p>
						</div>
					</div>

					<div class="col">
						<div class="plugin-option">
							<a href="#TB_inline?width=600&height=505&inlineId=help_export" class="demo-vid thickbox" title="<?php _e('Files Export demo', MYMAGPIE_PLUGIN_DOMAIN); ?>"><i class="icon-facetime-video"></i></a>
							<div class="thumb-icon">
								<i class="icon-upload-alt"></i>
							</div>
							<h4><a href="?page=export-page"><?php _e('Export', MYMAGPIE_PLUGIN_DOMAIN); ?></a></h4>
							<p><small><?php _e('Option to backup your website data creating a downloadable archive. Use this option to keep your website data on performing some serious modifications or moving website to other hosting.', MYMAGPIE_PLUGIN_DOMAIN); ?></small></p>
						</div>
				</div>
			</div>
			<div class="cols cols-2">

				<div class="col">
					<div class="plugin-option">
						<div class="thumb-icon">
							<i class="icon-puzzle-piece"></i>
						</div>
						<h4><a href="widgets.php"><?php _e('Widgets', MYMAGPIE_PLUGIN_DOMAIN); ?></a></h4>
						<p><small><?php _e('Mymagpie Widgets offer additional ways to place content to widget areas. Several available widget will allow you to add more functionality to your website.', MYMAGPIE_PLUGIN_DOMAIN); ?></small></p>
					</div>
				</div>

				<div class="col">
					<div class="plugin-option">
						<div class="thumb-icon">
							<i class="icon-th-large"></i>
						</div>
						<h4><?php _e('Shortcodes', MYMAGPIE_PLUGIN_DOMAIN); ?></h4>
						<p><small><?php _e('Mymagpie Plugin adds various widgets to the post editor. Shortcodes allow to create various content structures in WordPress posts. Use "Insert Shortcode" icon in post editor toolbar to add shortcodes.', MYMAGPIE_PLUGIN_DOMAIN); ?> <a href="//info.template-help.com/help/quick-start-guide/wordpress-themes/master/index_en.html#shortcodes" target="_blank"><?php _e('Learn more', MYMAGPIE_PLUGIN_DOMAIN); ?></a></small></p>
					</div>
				</div>

			</div>
			<?php
			echo mymagpie_plugin_help_import_popup().mymagpie_plugin_help_export_popup();
			$mymagpie_plugin_components -> get_footer();
		}
	}
//import settings page
	if( !function_exists('mymagpie_plugin_import_page') ){
		function mymagpie_plugin_import_page(){
			?>
			<script>
				if (typeof(window.FileReader) == 'undefined' && window.location.search.indexOf('not_supported=true')==-1) { 
					window.location.search = '?page=import-page&not_supported=true'; 
				}
			</script>
			<?php
			$response = wp_check_browser_version();
			$browser_not_supported = isset($_GET['not_supported']) 
									|| $response['name'] == 'Internet Explorer' && $response['version'] <= 9
									|| $response['name'] == 'Safari' && $response['version'] <= 6 ? true : false ;
			$holder_id = $browser_not_supported ? 'browser_nag' : '' ;
			$mymagpie_plugin_components = new mymagpie_plugin_components;
			$mymagpie_plugin_components -> get_header(array('title' => __('Mymagpie Content Import', MYMAGPIE_PLUGIN_DOMAIN), 'wrapper_class' => 'impotr_export_wrapper', 'wrapper_id' => $holder_id));

			include_once (MYMAGPIE_PLUGIN_DIR.'admin/import-export/import-check-settings.php');

			$mymagpie_plugin_components -> get_footer();
		}
	}
//export settings page
	if( !function_exists('mymagpie_plugin_export_page') ){
		function mymagpie_plugin_export_page(){
			$mymagpie_plugin_components = new mymagpie_plugin_components;
			$mymagpie_plugin_components -> get_header(array('title' => __('Mymagpie Content Export', MYMAGPIE_PLUGIN_DOMAIN), 'wrapper_class' => 'impotr_export_wrapper'));

			include_once (MYMAGPIE_PLUGIN_DIR.'admin/import-export/export.php');
			$mymagpie_plugin_components -> get_footer();
		}
	}
//under construction page
	if( !function_exists('mymagpie_maintenance_mode_admin_page') ){
		function mymagpie_maintenance_mode_admin_page(){
			$mymagpie_plugin_components = new mymagpie_plugin_components;
			$mymagpie_plugin_components -> get_header(array('title' => __('Maintenance Mode', MYMAGPIE_PLUGIN_DOMAIN), 'wrapper_class' => ''));

			include_once (MYMAGPIE_PLUGIN_DIR.'admin/plugin-maintenance-mode.php');

			$mymagpie_plugin_components -> get_footer();
		}
	}
