<?php
// Audio Player
if (!function_exists('shortcode_audio')) {
	function shortcode_audio( $atts, $content = null, $shortcodename = '' ) {
		extract(shortcode_atts(array(
			'type'  => '',
			'file'  => '',
			'title' => ''
		), $atts));

		$template_url = get_template_directory_uri();
		$id = rand();

		if ( isset( $atts['file'] ) ) {
			$file = $atts['file'];
		}

		if ( isset( $atts['url'] ) ) {
			$file = $atts['url'];
		}

		if ( isset( $atts['src'] ) ) {
			$file = $atts['src'];
		}

		if ( empty($file) ) {
			$audio_array = array(
				'mpeg'  => '',
				'mp3'   => '',
				'mp4'   => '',
				'm4a'   => '',
				'ogg'   => '',
				'oga'   => '',
				'webm'  => '',
				'webma' => '',
				'wav'   => ''
				);

			$result = array_intersect_key($atts, $audio_array);

			if ( !empty($result) ) {
				foreach ($result as $key => $value) {
					$type = $key;
					$file = $value;
				}
			} else
				return;
		}

		if ( empty( $type ) ) {
			$type_pos = strripos( $file, '.' );

			if ( $type_pos !== false ) {
				$type = substr( $file, $type_pos+1 );
			}
		}

		// Get the URL to the content area.
		$content_url = untrailingslashit( content_url() );

		// Find latest '/' in content URL.
		$last_slash_pos = strrpos( $content_url, '/' );

		// 'wp-content' or something else.
		$content_dir_name = substr( $content_url, $last_slash_pos - strlen( $content_url ) + 1 );

		$pos = strpos( $file, $content_dir_name );

		if ( false !== $pos ) {

			$audio_new = substr( $file, $pos + strlen( $content_dir_name ), strlen( $file ) - $pos );
			$file     = $content_url . $audio_new;

		}

		$output = '<div class="audio-wrap">';
		$output .= '<script type="text/javascript">
						jQuery(document).ready(function(){
							if(jQuery().jPlayer) {
								jQuery("#jquery_jplayer_'. $id .'").jPlayer( {
									ready: function () {
										jQuery(this).jPlayer("setMedia", {'.
											$type .': "'. $file .'",
											end: ""
										});
									},
									play: function() {
										jQuery(this).jPlayer("pauseOthers");
									},
									swfPath: "'. $template_url .'/flash",
									wmode: "window",
									cssSelectorAncestor: "#jp_container_'. $id .'",
									supplied: "'. $type .',  all"
								});
							}
						});
					</script>';

		$output .= '<div id="jquery_jplayer_'. $id .'" class="jp-jplayer"></div>';
		$output .= '<div id="jp_container_'. $id .'" class="jp-audio">';
		$output .= '<div class="jp-type-single">';
		$output .= '<div class="jp-gui">';
		$output .= '<div class="jp-interface">';
		$output .= '<div class="jp-progress">';
		$output .= '<div class="jp-seek-bar"><div class="jp-play-bar"></div></div>';
		$output .= '</div>';
		$output .= '<div class="jp-duration"></div><div class="jp-time-sep"></div><div class="jp-current-time"></div>';
		$output .= '<div class="jp-controls-holder">';
		$output .= '<ul class="jp-controls">';
		$output .= '<li><a href="javascript:;" class="jp-play" tabindex="1" title="'.__('Play', MYMAGPIE_PLUGIN_DOMAIN).'"><span>'.__('Play', MYMAGPIE_PLUGIN_DOMAIN).'</span></a></li>';
		$output .= '<li><a href="javascript:;" class="jp-pause" tabindex="1" title="'.__('Pause', MYMAGPIE_PLUGIN_DOMAIN).'"><span>'.__('Pause', MYMAGPIE_PLUGIN_DOMAIN).'</span></a></li>';
		$output .= '<li><a href="javascript:;" class="jp-stop" tabindex="1" title="'.__('Stop', MYMAGPIE_PLUGIN_DOMAIN).'"><span>'.__('Stop', MYMAGPIE_PLUGIN_DOMAIN).'</span></a></li>';
		$output .= '</ul>';
		$output .= '<div class="jp-volume-bar">';
		$output .= '<div class="jp-volume-bar-value">';
		$output .= '</div></div>';
		$output .= '<ul class="jp-toggles">';
		$output .= '<li><a href="javascript:;" class="jp-mute" tabindex="1" title="'.__('Mute', MYMAGPIE_PLUGIN_DOMAIN).'"><span>'.__('Mute', MYMAGPIE_PLUGIN_DOMAIN).'</span></a></li>';
		$output .= '<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="'.__('Unmute', MYMAGPIE_PLUGIN_DOMAIN).'""><span>'.__('Unmute', MYMAGPIE_PLUGIN_DOMAIN).'</span></a></li>';
		$output .= '</ul>';
		$output .= '<div class="jp-title"><ul><li>'. $title .'</li></ul></div></div>';
		$output .= '</div>';
		$output .= '<div class="jp-no-solution">';
		$output .= '<span>'.__('Update Required.', MYMAGPIE_PLUGIN_DOMAIN).'</span>'.__('To play the media you will need to either update your browser to a recent version or update your ', MYMAGPIE_PLUGIN_DOMAIN).'<a href="http://get.adobe.com/flashplayer/" target="_blank">'.__('Flash plugin', MYMAGPIE_PLUGIN_DOMAIN).'</a>';
		$output .= '</div></div></div></div>';
		$output .= '</div><!-- .audio-wrap (end) -->';

		$output = apply_filters( 'mymagpie_plugin_shortcode_output', $output, $atts, $shortcodename );

		return $output;
	}
	add_shortcode('audio', 'shortcode_audio');
}


// Video Player
if (!function_exists('wp_video_shortcode')) {
	if (!function_exists('shortcode_video')) {
		function shortcode_video( $atts, $content = null, $shortcodename = '' ) {
			extract(shortcode_atts(array(
				'file'   => '',
				'm4v'    => '',
				'ogv'    => '',
				'width'  => '600',
				'height' => '350',
			), $atts));

			$template_url = get_template_directory_uri();
			$id = rand();

			$video_url = $file;
			$m4v_url   = $m4v;
			$ogv_url   = $ogv;

			// Get the URL to the content area.
			$content_url = untrailingslashit( content_url() );

			// Find latest '/' in content URL.
			$last_slash_pos = strrpos( $content_url, '/' );

			// 'wp-content' or something else.
			$content_dir_name = substr( $content_url, $last_slash_pos - strlen( $content_url ) + 1 );

			$pos1     = strpos($m4v_url, $content_dir_name);
			if ($pos1 === false) {
				$file1 = $m4v_url;
			} else {
				$m4v_new  = substr($m4v_url, $pos1+strlen($content_dir_name), strlen($m4v_url) - $pos1);
				$file1    = $content_url.$m4v_new;
			}

			$pos2     = strpos($ogv_url, $content_dir_name);
			if ($pos2 === false) {
				$file2 = $ogv_url;
			} else {
				$ogv_new  = substr($ogv_url, $pos2+strlen($content_dir_name), strlen($ogv_url) - $pos2);
				$file2    = $content_url.$ogv_new;
			}

			//Check for video format
			$vimeo   = strpos($video_url, "vimeo");
			$youtube = strpos($video_url, "youtu");

			$output = '<div class="video-wrap">';

			//Display video
			if ($file) {
				if($vimeo !== false){

				//Get ID from video url
				$video_id = str_replace( 'http://vimeo.com/', '', $video_url );
				$video_id = str_replace( 'http://www.vimeo.com/', '', $video_id );

				//Display Vimeo video
				$output .= '<iframe src="http://player.vimeo.com/video/'.$video_id.'?title=0&amp;byline=0&amp;portrait=0" width="'.$width.'" height="'.$height.'" frameborder="0"></iframe>';

				} elseif($youtube !== false){

				//Get ID from video url
				$video_id = str_replace( 'http://', '', $video_url );
				$video_id = str_replace( 'https://', '', $video_id );
				$video_id = str_replace( 'www.youtube.com/watch?v=', '', $video_id );
				$video_id = str_replace( 'youtube.com/watch?v=', '', $video_id );
				$video_id = str_replace( 'youtu.be/', '', $video_id );
				$video_id = str_replace( '&feature=channel', '', $video_id );

				$output .= '<iframe title="YouTube video player" class="youtube-player" type="text/html" width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$video_id.'" frameborder="0"></iframe>';

				}
			} else {

				$output .= '<script type="text/javascript">
							jQuery(document).ready(function(){
								if(jQuery().jPlayer) {
									jQuery("#jquery_jplayer_'. $id .'").jPlayer( {
										ready: function () {
											jQuery(this).jPlayer("setMedia", {
												m4v: "'. $file1 .'",
												ogv: "'. $file2 .'"
											});
										},
										play: function() {
											jQuery(this).jPlayer("pauseOthers");
										},
										swfPath: "'. $template_url .'/flash",
										wmode: "window",
										cssSelectorAncestor: "#jp_container_'. $id .'",
										solution: "flash, html",
										supplied: "ogv, m4v, all",
										size: {width: "100%", height: "100%"}
									});
								}
							});
						</script>';
				$output .= '<div id="jp_container_'. $id .'" class="jp-video fullwidth">';
				$output .= '<div class="jp-type-single">';
				$output .= '<div id="jquery_jplayer_'. $id .'" class="jp-jplayer"></div>';
				$output .= '<div class="jp-gui">';
				$output .= '<div class="jp-video-play">';
				$output .= '<a href="javascript:;" class="jp-video-play-icon" tabindex="1" title="'.__('Play', MYMAGPIE_PLUGIN_DOMAIN).'">'.__('Play', MYMAGPIE_PLUGIN_DOMAIN).'</a></div>';
				$output .= '<div class="jp-interface">';
				$output .= '<div class="jp-progress">';
				$output .= '<div class="jp-seek-bar">';
				$output .= '<div class="jp-play-bar">';
				$output .= '</div></div></div>';
				$output .= '<div class="jp-duration"></div>';
				$output .= '<div class="jp-time-sep">/</div>';
				$output .= '<div class="jp-current-time"></div>';
				$output .= '<div class="jp-controls-holder">';
				$output .= '<ul class="jp-controls">';
				$output .= '<li><a href="javascript:;" class="jp-play" tabindex="1" title="'.__('Play', MYMAGPIE_PLUGIN_DOMAIN).'"><span>'.__('Play', MYMAGPIE_PLUGIN_DOMAIN).'</span></a></li>';
				$output .= '<li><a href="javascript:;" class="jp-pause" tabindex="1" title="'.__('Pause', MYMAGPIE_PLUGIN_DOMAIN).'"><span>'.__('Pause', MYMAGPIE_PLUGIN_DOMAIN).'</span></a></li>';
				$output .= '<li class="li-jp-stop"><a href="javascript:;" class="jp-stop" tabindex="1" title="'.__('Stop', MYMAGPIE_PLUGIN_DOMAIN).'"><span>'.__('Stop', MYMAGPIE_PLUGIN_DOMAIN).'</span></a></li>';
				$output .= '</ul>';
				$output .= '<div class="jp-volume-bar">';
				$output .= '<div class="jp-volume-bar-value">';
				$output .= '</div></div>';
				$output .= '<ul class="jp-toggles">';
				$output .= '<li><a href="javascript:;" class="jp-mute" tabindex="1" title="'.__('Mute', MYMAGPIE_PLUGIN_DOMAIN).'"><span>'.__('Mute', MYMAGPIE_PLUGIN_DOMAIN).'</span></a></li>';
				$output .= '<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="'.__('Unmute', MYMAGPIE_PLUGIN_DOMAIN).'"><span>'.__('Unmute', MYMAGPIE_PLUGIN_DOMAIN).'</span></a></li>';
				$output .= '</ul>';
				$output .= '</div></div>';
				$output .= '<div class="jp-no-solution">';
				$output .= '<span>'.__('Update Required.', MYMAGPIE_PLUGIN_DOMAIN).'</span>'.__('To play the media you will need to either update your browser to a recent version or update your ', MYMAGPIE_PLUGIN_DOMAIN).'<a href="http://get.adobe.com/flashplayer/" target="_blank">'.__('Flash plugin', MYMAGPIE_PLUGIN_DOMAIN).'</a>';
				$output .= '</div></div></div></div>';

			}
			$output .= '</div><!-- .video-wrap (end) -->';

			$output = apply_filters( 'mymagpie_plugin_shortcode_output', $output, $atts, $shortcodename );

			return $output;
		}
		add_shortcode('video', 'shortcode_video');
	}
}
?>