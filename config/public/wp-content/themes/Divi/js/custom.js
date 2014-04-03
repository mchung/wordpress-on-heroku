(function($){
	$.et_pb_simple_slider = function(el, options) {
		var settings = $.extend( {
			slide         			: '.et-slide',				 	// slide class
			arrows					: '.et-pb-slider-arrows',		// arrows container class
			prev_arrow				: '.et-pb-arrow-prev',			// left arrow class
			next_arrow				: '.et-pb-arrow-next',			// right arrow class
			controls 				: '.et-pb-controllers a',		// control selector
			control_active_class	: 'et-pb-active-control',		// active control class name
			previous_text			: 'Previous',					// previous arrow text
			next_text				: 'Next',						// next arrow text
			fade_speed				: 500,							// fade effect speed
			use_arrows				: true,							// use arrows?
			use_controls			: true,							// use controls?
			manual_arrows			: '',							// html code for custom arrows
			append_controls_to		: '',							// controls are appended to the slider element by default, here you can specify the element it should append to
			controls_class			: 'et-pb-controllers',				// controls container class name
			slideshow				: false,						// automattic animation?
			slideshow_speed			: 7000,							// automattic animation speed
			show_progress_bar		: false,							// show progress bar if automattic animation is active
			tabs_animation			: false
		}, options );

		var $et_slider 			= $(el),
			$et_slide			= $et_slider.find( settings.slide ),
			et_slides_number	= $et_slide.length,
			et_fade_speed		= settings.fade_speed,
			et_active_slide		= 0,
			$et_slider_arrows,
			$et_slider_prev,
			$et_slider_next,
			$et_slider_controls,
			et_slider_timer,
			controls_html = '',
			$progress_bar = null,
			progress_timer_count = 0,
			$et_pb_container = $et_slider.find( '.et_pb_container' ),
			et_pb_container_width = $et_pb_container.width();

			$et_slider.et_animation_running = false;

			$.data(el, "et_pb_simple_slider", $et_slider);

			$et_slide.eq(0).addClass( 'et-pb-active-slide' );

			if ( ! settings.tabs_animation ) {
				$et_slider.addClass( et_get_bg_layout_color( $et_slide.eq(0) ) );
			}

			if ( settings.use_arrows && et_slides_number > 1 ) {
				if ( settings.manual_arrows == '' )
					$et_slider.append( '<div class="et-pb-slider-arrows"><a class="et-pb-arrow-prev" href="#">' + '<span>' +settings.previous_text + '</span>' + '</a><a class="et-pb-arrow-next" href="#">' + '<span>' + settings.next_text + '</span>' + '</a></div>' );
				else
					$et_slider.append( settings.manual_arrows );

				$et_slider_arrows 	= $( settings.arrows );
				$et_slider_prev 	= $et_slider.find( settings.prev_arrow );
				$et_slider_next 	= $et_slider.find( settings.next_arrow );

				$et_slider_next.click( function(){
					if ( $et_slider.et_animation_running )	return false;

					$et_slider.et_slider_move_to( 'next' );

					return false;
				} );

				$et_slider_prev.click( function(){
					if ( $et_slider.et_animation_running )	return false;

					$et_slider.et_slider_move_to( 'previous' );

					return false;
				} );
			}

			if ( settings.use_controls && et_slides_number > 1 ) {
				for ( var i = 1; i <= et_slides_number; i++ ) {
					controls_html += '<a href="#"' + ( i == 1 ? ' class="' + settings.control_active_class + '"' : '' ) + '>' + i + '</a>';
				}

				controls_html =
					'<div class="' + settings.controls_class + '">' +
						controls_html +
					'</div>';

				if ( settings.append_controls_to == '' )
					$et_slider.append( controls_html );
				else
					$( settings.append_controls_to ).append( controls_html );

				$et_slider_controls	= $et_slider.find( settings.controls ),

				$et_slider_controls.click( function(){
					if ( $et_slider.et_animation_running )	return false;

					$et_slider.et_slider_move_to( $(this).index() );

					return false;
				} );
			}

			if ( settings.slideshow && et_slides_number > 1 ) {
				$et_slider.hover( function() {
					$et_slider.addClass( 'et_slider_hovered' );

					if ( typeof et_slider_timer != 'undefined' ) {
						clearInterval( et_slider_timer );
					}
				}, function() {
					$et_slider.removeClass( 'et_slider_hovered' );

					et_slider_auto_rotate();
				} );
			}

			et_slider_auto_rotate();

			function et_slider_auto_rotate(){
				if ( settings.slideshow && et_slides_number > 1 && ! $et_slider.hasClass( 'et_slider_hovered' ) ) {
					et_slider_timer = setTimeout( function() {
						$et_slider.et_slider_move_to( 'next' );
					}, settings.slideshow_speed );
				}
			}

			function et_fix_slider_content_images() {
				var $this_slider           = $et_slider,
					$slide_image_container = $this_slider.find( '.et-pb-active-slide .et_pb_slide_image' );
					$slide                 = $slide_image_container.closest( '.et_pb_slide' ),
					$slider                = $slide.closest( '.et_pb_slider' ),
					slide_height           = $slider.innerHeight(),
					image_height           = parseInt( slide_height * 0.8 );

				$slide_image_container.find( 'img' ).css( 'maxHeight', image_height + 'px' );

				if ( $slide.hasClass( 'et_pb_media_alignment_center' ) ) {
					$slide_image_container.css( 'marginTop', '-' + parseInt( $slide_image_container.height() / 2 ) + 'px' );
				}
			}

			function et_get_bg_layout_color( $slide ) {
				if ( $slide.hasClass( 'et_pb_bg_layout_dark' ) ) {
					return 'et_pb_bg_layout_dark';
				}

				return 'et_pb_bg_layout_light';
			}

			$(window).load( function() {
				et_fix_slider_content_images();
			} );

			$(window).resize( function() {
				if ( et_pb_container_width !== $et_pb_container.width() ) {
					et_pb_container_width = $et_pb_container.width();

					et_fix_slider_content_images();
				}
			} );

			$et_slider.et_slider_move_to = function ( direction ) {
				var $active_slide = $et_slide.eq( et_active_slide ),
					$next_slide;

				$et_slider.et_animation_running = true;

				if ( direction == 'next' || direction == 'previous' ){

					if ( direction == 'next' )
						et_active_slide = ( et_active_slide + 1 ) < et_slides_number ? et_active_slide + 1 : 0;
					else
						et_active_slide = ( et_active_slide - 1 ) >= 0 ? et_active_slide - 1 : et_slides_number - 1;

				} else {

					if ( et_active_slide == direction ) {
						$et_slider.et_animation_running = false;
						return;
					}

					et_active_slide = direction;

				}

				if ( typeof et_slider_timer != 'undefined' )
					clearInterval( et_slider_timer );

				$next_slide	= $et_slide.eq( et_active_slide );

				$et_slide.each( function(){
					$(this).css( 'zIndex', 1 );
				} );
				$active_slide.css( 'zIndex', 2 ).removeClass( 'et-pb-active-slide' );
				$next_slide.css( { 'display' : 'block', opacity : 0 } ).addClass( 'et-pb-active-slide' );

				et_fix_slider_content_images();

				if ( settings.use_controls )
					$et_slider_controls.removeClass( settings.control_active_class ).eq( et_active_slide ).addClass( settings.control_active_class );

				if ( ! settings.tabs_animation ) {
					$next_slide.animate( { opacity : 1 }, et_fade_speed );
					$active_slide.addClass( 'et_slide_transition' ).css( { 'display' : 'list-item', 'opacity' : 1 } ).animate( { opacity : 0 }, et_fade_speed, function(){
						var active_slide_layout_bg_color = et_get_bg_layout_color( $active_slide ),
							next_slide_layout_bg_color = et_get_bg_layout_color( $next_slide );

						$(this).css('display', 'none').removeClass( 'et_slide_transition' );

						$et_slider
							.removeClass( active_slide_layout_bg_color )
							.addClass( next_slide_layout_bg_color );

						$et_slider.et_animation_running = false;
					} );
				} else {
					$next_slide.css( { 'display' : 'none', opacity : 0 } );

					$active_slide.addClass( 'et_slide_transition' ).css( { 'display' : 'block', 'opacity' : 1 } ).animate( { opacity : 0 }, et_fade_speed, function(){
						$(this).css('display', 'none').removeClass( 'et_slide_transition' );

						$next_slide.css( { 'display' : 'block', 'opacity' : 0 } ).animate( { opacity : 1 }, et_fade_speed, function() {
							$et_slider.et_animation_running = false;
						} );
					} );
				}

				et_slider_auto_rotate();
			}
	}

	$.fn.et_pb_simple_slider = function( options ) {
		return this.each(function() {
			new $.et_pb_simple_slider(this, options);
		});
	}

	var $et_pb_slider  = $( '.et_pb_slider' ),
		$et_pb_tabs    = $( '.et_pb_tabs' ),
		$et_pb_tabs_li = $et_pb_tabs.find( '.et_pb_tabs_controls li' ),
		$et_pb_video_section = $('.et_pb_section_video_bg'),
		$et_pb_newsletter_button = $( '.et_pb_newsletter_button' ),
		et_is_mobile_device = navigator.userAgent.match( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/ ),
		et_is_ipad = navigator.userAgent.match( /iPad/ ),
		$et_container = $( '.container' ),
		et_container_width = $et_container.width(),
		et_is_fixed_nav = $( 'body' ).hasClass( 'et_fixed_nav' ),
		etRecalculateOffset = false,
		et_header_height,
		et_header_modifier,
		et_header_offset;

	$(document).ready( function(){
		var $et_top_menu = $( 'ul.nav' ),
			$et_search_icon = $( '#et_search_icon' );

		$et_top_menu.find( 'li' ).hover( function() {
			if ( ! $(this).closest( 'li.mega-menu' ).length || $(this).hasClass( 'mega-menu' ) ) {
				$(this).addClass( 'et-show-dropdown' );
				$(this).removeClass( 'et-hover' ).addClass( 'et-hover' );
			}
		}, function() {
			var $this_el = $(this);

			$this_el.removeClass( 'et-show-dropdown' );

			setTimeout( function() {
				if ( ! $this_el.hasClass( 'et-show-dropdown' ) ) {
					$this_el.removeClass( 'et-hover' );
				}
			}, 200 );
		} );

		if ( $('ul.et_disable_top_tier').length ) {
			$("ul.et_disable_top_tier > li > ul").prev('a').attr('href','#');
		}

		if ( et_is_mobile_device ) {
			$( '.et_pb_section_video_bg' ).each( function() {
				var $this_el = $(this);

				$this_el.css( 'visibility', 'hidden' ).closest( '.et_pb_preload' ).removeClass( 'et_pb_preload' )
			} );

			$( 'body' ).addClass( 'et_mobile_device' );

			if ( ! et_is_ipad ) {
				$( 'body' ).addClass( 'et_mobile_device_not_ipad' );
			}
		}

		$et_search_icon.click( function() {
			var $this_el = $(this),
				$form = $this_el.siblings( '.et-search-form' );

			if ( $form.hasClass( 'et-hidden' ) ) {
				$form.css( { 'display' : 'block', 'opacity' : 0 } ).animate( { opacity : 1 }, 500 );
			} else {
				$form.animate( { opacity : 0 }, 500 );
			}

			$form.toggleClass( 'et-hidden' );
		} );

		if ( $et_pb_video_section.length ){
			$et_pb_video_section.find( 'video' ).mediaelementplayer( {
				pauseOtherPlayers: false,
				success : function( mediaElement, domObject ) {
					mediaElement.addEventListener( 'canplay', function() {
						et_pb_resize_section_video_bg( $(domObject) );
						et_pb_center_video( $(domObject) );
					} );
				}
			} );
		}

		if ( $et_pb_slider.length ){
			$et_pb_slider.each( function() {
				var $this_slider = $(this),
					et_slider_settings = {
						fade_speed 		: 700,
						slide			: '.et_pb_slide'
					}

				if ( $this_slider.hasClass('et_pb_slider_no_arrows') )
					et_slider_settings.use_arrows = false;

				if ( $this_slider.hasClass('et_pb_slider_no_pagination') )
					et_slider_settings.use_controls = false;

				if ( $this_slider.hasClass('et_slider_auto') ) {
					var et_slider_autospeed_class_value = /et_slider_speed_(\d+)/g;

					et_slider_settings.slideshow = true;

					et_slider_autospeed = et_slider_autospeed_class_value.exec( $this_slider.attr('class') );

					et_slider_settings.slideshow_speed = et_slider_autospeed[1];
				}

				$this_slider.et_pb_simple_slider( et_slider_settings );

				$this_slider.find( '.et_pb_slide_video' ).each( function() {
					var $this_el = $(this).find( 'iframe' ),
						src_attr = $this_el.attr('src'),
						wmode_character = src_attr.indexOf( '?' ) == -1 ? '?' : '&amp;',
						this_src = src_attr + wmode_character + 'wmode=opaque';

					$this_el.attr('src', this_src);
				} );
			} );
		}

		if ( $et_pb_tabs.length ) {
			$et_pb_tabs.et_pb_simple_slider( {
				use_controls   : false,
				use_arrows     : false,
				slide          : '.et_pb_all_tabs > div',
				tabs_animation : true
			} );

			$et_pb_tabs_li.click( function() {
				var $this_el        = $(this),
					$tabs_container = $this_el.closest( '.et_pb_tabs' ).data('et_pb_simple_slider');

				if ( $tabs_container.et_animation_running ) return false;

				$this_el.addClass( 'et_pb_tab_active' ).siblings().removeClass( 'et_pb_tab_active' );

				$tabs_container.data('et_pb_simple_slider').et_slider_move_to( $this_el.index() );

				return false;
			} );
		}

		$('.et_pb_toggle_title').click( function(){
			var $this_heading = $(this),
				$module = $this_heading.closest('.et_pb_toggle'),
				$content = $module.find('.et_pb_toggle_content');

			$content.slideToggle( 700, function() {
				if ( $module.hasClass('et_pb_toggle_close') )
					$module.removeClass('et_pb_toggle_close').addClass('et_pb_toggle_open');
				else
					$module.removeClass('et_pb_toggle_open').addClass('et_pb_toggle_close');
			} );
		} );

		var $et_contact_container = $('.et_pb_contact_form_container');

		if ( $et_contact_container.length ) {
			var $et_contact_form = $et_contact_container.find( 'form' ),
				$et_contact_submit = $et_contact_container.find( 'input.et_pb_contact_submit' ),
				$et_inputs = $et_contact_form.find('input[type=text],textarea'),
				et_email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/,
				et_contact_error = false,
				$et_contact_message = $et_contact_container.find('.et-pb-contact-message'),
				et_message = '';

			$et_inputs.live('focus', function(){
				if ( $(this).val() === $(this).siblings('label').text() ) $(this).val("");
			}).live('blur', function(){
				if ($(this).val() === "") $(this).val( $(this).siblings('label').text() );
			});

			$et_contact_form.on('submit', function(event) {
				et_contact_error = false;
				et_message = '<ul>';

				$et_inputs.removeClass('et_contact_error');

				$et_inputs.each(function(index, domEle){
					if ( $(domEle).val() === '' || $(domEle).val() === $(this).siblings('label').text() ) {
						$(domEle).addClass('et_contact_error');
						et_contact_error = true;

						var default_value = $(this).siblings('label').text();
						if ( default_value == '' ) default_value = et_custom.captcha;

						et_message += '<li>' + et_custom.fill + ' ' + default_value + ' ' + et_custom.field + '</li>';
					}
					if ( ($(domEle).attr('id') == 'et_contact_email') && !et_email_reg.test($(domEle).val()) ) {
						$(domEle).removeClass('et_contact_error').addClass('et_contact_error');
						et_contact_error = true;

						if ( !et_email_reg.test($(domEle).val()) ) et_message += '<li>' + et_custom.invalid + '</li>';
					}
				});

				if ( !et_contact_error ) {
					$href = $(this).attr('action');

					$et_contact_container.fadeTo('fast',0.2).load($href + ' #' + $et_contact_form.closest('.et_pb_contact_form_container').attr('id'), $(this).serializeArray(), function() {
						$et_contact_container.fadeTo('fast',1);
					});
				}

				et_message += '</ul>';

				if ( et_message != '<ul></ul>' )
					$et_contact_message.html(et_message);

				event.preventDefault();
			});
		}

		if ( $.fn.fitVids ) {
			$( '.et_pb_slide_video' ).fitVids();

			$( '#main-content' ).fitVids();
		}


		function et_pb_resize_section_video_bg( $video ) {
			$element = typeof $video !== 'undefined' ? $video.closest( '.et_pb_section_video_bg' ) : $( '.et_pb_section_video_bg' );

			$element.each( function() {
				var $this_el = $(this),
					ratio = ( typeof $this_el.attr( 'data-ratio' ) !== 'undefined' )
						? $this_el.attr( 'data-ratio' )
						: $this_el.find('video').attr( 'width' ) / $this_el.find('video').attr( 'height' ),
					$video_elements = $this_el.find( '.mejs-video, video, object' ).css( 'margin', 0 ),
					$container = $this_el.closest( '.et_pb_section' ).length
						? $this_el.closest( '.et_pb_section' )
						: $this_el.closest( '.et_pb_slides' ),
					body_width = $container.width(),
					container_height = $container.innerHeight(),
					width, height;

				if ( typeof $this_el.attr( 'data-ratio' ) == 'undefined' )
					$this_el.attr( 'data-ratio', ratio );

				if ( body_width / container_height < ratio ) {
					width = container_height * ratio;
					height = container_height;
				} else {
					width = body_width;
					height = body_width / ratio;
				}

				$video_elements.width( width ).height( height );
			} );
		}

		function et_pb_center_video( $video ) {
			$element = typeof $video !== 'undefined' ? $video : $( '.et_pb_section_video_bg .mejs-video' );

			$element.each( function() {
				var $video_width = $(this).width() / 2;
				var $video_width_negative = 0 - $video_width;
				$(this).css("margin-left",$video_width_negative );

				if ( typeof $video !== 'undefined' ) {
					if ( $video.closest( '.et_pb_slider' ).length && ! $video.closest( '.et_pb_first_video' ).length )
						return false;

					setTimeout( function() {
						$( this ).closest( '.et_pb_preload' ).removeClass( 'et_pb_preload' );
					}, 500 );
				}
			} );
		}

		function et_calculate_header_values() {
			et_header_height   = $( '#main-header' ).innerHeight(),
			et_header_modifier = et_header_height <= 90 ? et_header_height - 29 : et_header_height - 56,
			et_header_offset   = $( '#wpadminbar' ).length ? ( et_header_modifier + $( '#wpadminbar' ).innerHeight() ) : et_header_modifier;
		}

		function et_fix_slider_height() {
			if ( ! $et_pb_slider.length ) return;

			$et_pb_slider.each( function() {
				var $slide = $(this).find( '.et_pb_slide' ),
					$slide_container = $slide.find( '.et_pb_container' ),
					max_height = 0;

				$slide_container.css( 'min-height', 0 );

				$slide.each( function() {
					var $this_el = $(this),
						height = $this_el.innerHeight();

					if ( max_height < height )
						max_height = height;
				} );

				$slide_container.css( 'min-height', max_height );
			} );
		}
		et_fix_slider_height();

		var $comment_form = $('#commentform');

		et_pb_form_placeholders_init( $comment_form );
		et_pb_form_placeholders_init( $( '.et_pb_newsletter_form' ) );

		$comment_form.submit(function(){
			et_pb_remove_placeholder_text( $comment_form );
		});

		function et_pb_form_placeholders_init( $form ) {
			$form.find('input:text, textarea').each(function(index,domEle){
				var $et_current_input = jQuery(domEle),
					$et_comment_label = $et_current_input.siblings('label'),
					et_comment_label_value = $et_current_input.siblings('label').text();
				if ( $et_comment_label.length ) {
					$et_comment_label.hide();
					if ( $et_current_input.siblings('span.required') ) {
						et_comment_label_value += $et_current_input.siblings('span.required').text();
						$et_current_input.siblings('span.required').hide();
					}
					$et_current_input.val(et_comment_label_value);
				}
			}).bind('focus',function(){
				var et_label_text = jQuery(this).siblings('label').text();
				if ( jQuery(this).siblings('span.required').length ) et_label_text += jQuery(this).siblings('span.required').text();
				if (jQuery(this).val() === et_label_text) jQuery(this).val("");
			}).bind('blur',function(){
				var et_label_text = jQuery(this).siblings('label').text();
				if ( jQuery(this).siblings('span.required').length ) et_label_text += jQuery(this).siblings('span.required').text();
				if (jQuery(this).val() === "") jQuery(this).val( et_label_text );
			});
		}

		// remove placeholder text before form submission
		function et_pb_remove_placeholder_text( $form ) {
			$form.find('input:text, textarea').each(function(index,domEle){
				var $et_current_input = jQuery(domEle),
					$et_label = $et_current_input.siblings('label'),
					et_label_value = $et_current_input.siblings('label').text();

				if ( $et_label.length && $et_label.is(':hidden') ) {
					if ( $et_label.text() == $et_current_input.val() )
						$et_current_input.val( '' );
				}
			});
		}

		et_duplicate_menu( $('#et-top-navigation ul.nav'), $('#et-top-navigation .mobile_nav'), 'mobile_menu', 'et_mobile_menu' );

		function et_duplicate_menu( menu, append_to, menu_id, menu_class ){
			var $cloned_nav;

			menu.clone().attr('id',menu_id).removeClass().attr('class',menu_class).appendTo( append_to );
			$cloned_nav = append_to.find('> ul');
			$cloned_nav.find('.menu_slide').remove();
			$cloned_nav.find('li:first').addClass('et_first_mobile_item');

			append_to.click( function(){
				if ( $(this).hasClass('closed') ){
					$(this).removeClass( 'closed' ).addClass( 'opened' );
					$cloned_nav.slideDown( 500 );
				} else {
					$(this).removeClass( 'opened' ).addClass( 'closed' );
					$cloned_nav.slideUp( 500 );
				}
				return false;
			} );

			append_to.find('a').click( function(event){
				event.stopPropagation();
			} );
		}

		$et_pb_newsletter_button.click( function( event ) {
			event.preventDefault();

			var $newsletter_container = $(this).closest( '.et_pb_newsletter' ),
				$firstname = $newsletter_container.find( 'input[name="et_pb_signup_firstname"]' ),
				$lastname = $newsletter_container.find( 'input[name="et_pb_signup_lastname"]' ),
				$email = $newsletter_container.find( 'input[name="et_pb_signup_email"]' ),
				list_id = $newsletter_container.find( 'input[name="et_pb_signup_list_id"]' ).val(),
				$result = $newsletter_container.find( '.et_pb_newsletter_result' ).hide();

			$firstname.removeClass( 'et_pb_signup_error' );
			$lastname.removeClass( 'et_pb_signup_error' );
			$email.removeClass( 'et_pb_signup_error' );

			et_pb_remove_placeholder_text( $(this).closest( '.et_pb_newsletter_form' ) );

			if ( $firstname.val() == '' || $email.val() == '' || list_id === '' ) {
				if ( $firstname.val() == '' ) $firstname.addClass( 'et_pb_signup_error' );

				if ( $email.val() == '' ) $email.addClass( 'et_pb_signup_error' );

				if ( $firstname.val() == '' )
					$firstname.val( $firstname.siblings( '.et_pb_contact_form_label' ).text() );

				if ( $lastname.val() == '' )
					$lastname.val( $lastname.siblings( '.et_pb_contact_form_label' ).text() );

				if ( $email.val() == '' )
					$email.val( $email.siblings( '.et_pb_contact_form_label' ).text() );

				return;
			}

			$.ajax( {
				type: "POST",
				url: et_custom.ajaxurl,
				data:
				{
					action : 'et_pb_submit_subscribe_form',
					et_load_nonce : et_custom.et_load_nonce,
					et_list_id : list_id,
					et_firstname : $firstname.val(),
					et_lastname : $lastname.val(),
					et_email : $email.val()
				},
				success: function( data ){
					if ( data ) {
						$newsletter_container.find( '.et_pb_newsletter_form > p' ).hide();
						$result.html( data ).show();
					} else {
						$result.html( et_custom.subscription_failed ).show();
					}
				}
			} );
		} );

		$( window ).resize( function(){
			var containerWidthChanged = et_container_width !== $et_container.width();

			et_pb_resize_section_video_bg();
			et_pb_center_video();

			et_fix_slider_height();

			if ( $( '.et_pb_blog_grid' ).length )
				$( '.et_pb_blog_grid' ).masonry('reload');

			if ( et_is_fixed_nav && containerWidthChanged ) {
				setTimeout( function() {
					$( 'body' ).css( 'paddingTop', $( '#main-header' ).innerHeight() );
				}, 200 );
			}

			if ( containerWidthChanged ) {
				et_container_width = $et_container.width();

				etRecalculateOffset = true;
			}
		} );

		$( window ).load( function(){
			if ( et_is_fixed_nav ) {
				et_calculate_header_values();

				$( 'body' ).css( 'paddingTop', et_header_height );
			}

			if ( $( '.et_pb_blog_grid' ).length ) {
				$( '.et_pb_blog_grid' ).masonry( {
					itemSelector : '.et_pb_post'
				} );
			}

			setTimeout( function() {
				$( '.et_pb_preload' ).removeClass( 'et_pb_preload' );
			}, 500 );

			if ( $( '.et_pb_portfolio_grid' ).length ) {
				$( '.et_pb_portfolio_grid' ).each( function() {
					var $grid = $(this),
						min_height = 0;

					$grid.find( '.et_pb_portfolio_item' ).each( function() {
						if ( $(this).innerHeight() > min_height )
							min_height = $(this).innerHeight();
					} );

					$grid.find( '.et_pb_portfolio_item' ).css( 'min-height', min_height + 'px' );
				} );
			}

			if ( $.fn.waypoint ) {
				$( '.et_pb_counter_container, .et-waypoint' ).waypoint( {
					offset: '75%',
					handler: function() {
						$(this).addClass( 'et-animated' );
					}
				} );

				if ( et_is_fixed_nav ) {
					$('#main-content').waypoint( {
						offset: function() {
							if ( etRecalculateOffset ) {
								et_calculate_header_values();

								etRecalculateOffset = false;
							}

							return et_header_offset;
						},
						handler : function( direction ) {
							if ( direction === 'down' ) {
								$('#main-header').addClass( 'et-fixed-header' );
							} else {
								$('#main-header').removeClass( 'et-fixed-header' );
							}
						}
					} );
				}
			}
		} );
	} );
})(jQuery)