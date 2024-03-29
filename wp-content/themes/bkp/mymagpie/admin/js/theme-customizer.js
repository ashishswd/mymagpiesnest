(function($) {
	wp.customize('blogname', function(value) {
		value.bind(function(to) {
			$('.logo_link').text(to)
		})
	});
	wp.customize('blogdescription', function(value) {
		value.bind(function(to) {
			$('.logo_tagline').text(to)
		})
	});
	wp.customize(CURRENT_THEME + '[body_background][color]', function(value) {
		value.bind(function(to) {
			$('body').css({'background-color': to})
		})
	});
	wp.customize(CURRENT_THEME + '[body_background][image]', function(value) {
		value.bind(function(to) {
			$('body').css({'background-image': 'url('+to+')'})
		})
	});
	wp.customize(CURRENT_THEME + '[main_background]', function(value) {
		value.bind(function(to) {
			$('.mymagpie-fixed-layout .main-holder').css({'background': to})
		})
	});
	wp.customize(CURRENT_THEME + '[header_background][color]', function(value) {
		value.bind(function(to) {
			$('.header').css({'background-color': to})
		})
	});
	wp.customize(CURRENT_THEME + '[g_breadcrumbs_id]', function(value) {
		value.bind(function(to) {
			if ('no' === to) {
				$('.breadcrumb').css({'display': 'none'})
			} else {
				$('.breadcrumb').css({'display': 'block'})
			}
		})
	});
	wp.customize(CURRENT_THEME + '[g_search_box_id]', function(value) {
		value.bind(function(to) {
			if ('no' === to) {
				$('.search-form__h').css({'display': 'none'})
			} else {
				$('.search-form__h').css({'display': 'block'})
			}
		})
	});
	wp.customize(CURRENT_THEME + '[logo_typography][color]', function(value) {
		value.bind(function(to) {
			$('.logo_h__txt, .logo_link').css({'color': to})
		})
	});
	wp.customize(CURRENT_THEME + '[menu_typography][color]', function(value) {
		value.bind(function(to) {
			$('.sf-menu > li > a').css({'color': to})
		})
	});
	wp.customize(CURRENT_THEME + '[footer_menu_typography][color]', function(value) {
		value.bind(function(to) {
			$('.nav.footer-nav a').css({'color': to})
		})
	});
	wp.customize(CURRENT_THEME + '[blog_text]', function(value) {
		value.bind(function(to) {
			$('.blog .title-header').text(to)
		})
	});
	wp.customize(CURRENT_THEME + '[blog_related]', function(value) {
		value.bind(function(to) {
			$('.related-posts_h').text(to)
		})
	});
	wp.customize(CURRENT_THEME + '[blog_button_text]', function(value) {
		value.bind(function(to) {
			$('.blog #content .btn').text(to)
		})
	});
	wp.customize(CURRENT_THEME + '[folio_button_text]', function(value) {
		value.bind(function(to) {
			$('#portfolio-grid .btn').text(to)
		})
	});
	wp.customize(CURRENT_THEME + '[footer_text]', function(value) {
		value.bind(function(to) {
			$('#footer-text').text(to)
		})
	});
})(jQuery);