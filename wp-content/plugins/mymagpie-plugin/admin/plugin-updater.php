<?php
set_site_transient( 'update_plugins', null );
add_filter( 'pre_set_site_transient_update_plugins', 'mymagpie_plugin_check_for_update' );

function mymagpie_plugin_check_for_update( $transient ) {
	global $mymagpie_plugin_details_url;

	$remote_query = mymagpie_plugin_remote_query( array( 'data_type' => 'plugin' ) );

	if ( $remote_query != NULL ) {

		$mymagpie_plugin_details_url = $remote_query['url'];
		add_action( 'admin_head', 'mymagpie_change_details_link' );

		$response = array(
			'slug'        => dirname( MYMAGPIE_PLUGIN_SLUG ),
			'new_version' => $remote_query['new_version'],
			'url'         => $remote_query['url'],
			'package'     => $remote_query['package'],
		);
		$transient->response[ MYMAGPIE_PLUGIN_SLUG ] = (object) $response;
	}

	return $transient;
}

// Change details link
function mymagpie_change_details_link() {
	global $mymagpie_plugin_details_url;

	echo '<script>
		jQuery(document).on("ready", function() {
			jQuery("#mymagpie-plugin + .plugin-update-tr a.thickbox").attr({"href": "' . add_query_arg( array( 'TB_iframe' => 'true', 'width' => 1024, 'height' => 800 ), $mymagpie_plugin_details_url) . '" })
		})</script>';
}

// Show notice in admin panel. Notice formed in xml file on server
mymagpie_plugin_remote_query( array(
								'data_type'   => 'notice',
								'output_type' => 'notice',
								)
							);

// Remote query, function return any data of xml file on server
function mymagpie_plugin_remote_query( $atts ) {
	global $wp_version;

	$default = array(
		'remote_server' => MYMAGPIE_PLUGIN_REMOTE_SERVER,
		'data_type'     => '', //framework, plugin, notice, info (Or any channel in xml)
		'output_type'   => 'return' //return, echo, notice
		);
	extract( array_merge( $default, $atts ) );

	if( $data_type == 'framework' && defined('MYMAGPIE_VER') ) {

		$current_version = MYMAGPIE_VER;

	} else if( $data_type == 'plugin' ) {

		$current_version = MYMAGPIE_PLUGIN_VERSION;

	} else {
		$current_version = '';
	}

	$response = wp_remote_post( $remote_server, array(
		'body'       => array(
							'data_type'       => $data_type,
							'current_version' => $current_version,
							'api-key'         => md5( get_bloginfo('url') )
							),
		'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo('url')
		)
	);

	if ( is_wp_error( $response ) || !is_array( $response ) || $response['response']['code'] != '200' ) {
		return;
	}

	$response = unserialize( $response['body'] );
	if ( $response == null ) {
		return;
	}

	switch ( $output_type ) {
		case 'notice':
			if ( !empty( $response ) && isset( $response['action'] ) && !empty( $response['notice_content'] ) ) {
				global $notice_attr;

				$notice_attr = array();
				if ( isset( $response['wrapper_id'] ) ) $notice_attr['wrapper_id'] = $response['wrapper_id'];
				if ( isset( $response['wrapper_class'] ) ) $notice_attr['wrapper_class'] = $response['wrapper_class'];
				if ( isset( $response['notice_content'] ) ) $notice_attr['notice_content'] = $response['notice_content'];

				if ( !did_action( 'mymagpie_plugin_upgrade_ver ') ) {

					add_action( $response['action'], 'mymagpie_call_function_add_notice' );
					function mymagpie_call_function_add_notice() {
						global $notice_attr;

						echo mymagpie_add_notice( $notice_attr );
					}

				}
			}
			break;

		case 'echo':
			echo $response;
			break;

		default:
			return $response;
			break;
	}
}