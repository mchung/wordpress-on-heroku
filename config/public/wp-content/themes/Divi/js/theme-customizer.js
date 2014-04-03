/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	wp.customize( 'et_divi[link_color]', function( value ) {
		value.bind( function( to ) {
			$( 'a' ).css( 'color', to );
		} );
	} );

	wp.customize( 'et_divi[font_color]', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( 'color', to );
		} );
	} );

	wp.customize( 'et_divi[accent_color]', function( value ) {
		value.bind( function( to ) {
			$( '.et_pb_counter_amount, .et_pb_featured_table .et_pb_pricing_heading, .et_pb_pricing_table_button, .comment-reply-link, .form-submit input' ).css( 'background-color', to );

			$( '#et_search_icon:hover, .mobile_menu_bar:before, .footer-widget h4, .et-social-icon a:hover, .et_pb_sum, .et_pb_pricing li a, .et_overlay:before' ).css( 'color', to );

			$( '.et-search-form, .nav li ul, .et_mobile_menu, .footer-widget li:before, .et_pb_pricing li:before' ).css( 'border-color', to );
		} );
	} );

	wp.customize( 'et_divi[footer_bg]', function( value ) {
		value.bind( function( to ) {
			$( '#main-footer' ).css( 'background-color', to );
		} );
	} );

	wp.customize( 'et_divi[menu_link]', function( value ) {
		value.bind( function( to ) {
			$( '#top-menu a' ).css( 'color', to );
		} );
	} );

	wp.customize( 'et_divi[menu_link_active]', function( value ) {
		value.bind( function( to ) {
			$( '#top-menu li.current-menu-ancestor > a, #top-menu li.current-menu-item > a' ).css( 'color', to );
		} );
	} );

	wp.customize( 'et_divi[color_schemes]', function( value ) {
		value.bind( function( to ) {
			var $body = $( 'body' ),
				body_classes = $body.attr( 'class' ),
				et_customizer_color_scheme_prefix = 'et_color_scheme_',
				body_class;

			body_class = body_classes.replace( /et_color_scheme_[^\s]+/, '' );
			$body.attr( 'class', $.trim( body_class ) );

			if ( 'none' !== to  )
				$body.addClass( et_customizer_color_scheme_prefix + to );
		} );
	} );
} )( jQuery );