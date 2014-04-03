(function($){
	var ET_Google_Fonts = function(element, options){
		this.element = element;
		this.custom_select_link = null;
		this.custom_dropdown = null;
		this.frontend_customizer = $('body').hasClass( 'et_frontend_customizer' ) ? true : false;

		this.options = jQuery.extend({}, this.defaults, options);

		this.create_dropdown();
	}

	ET_Google_Fonts.prototype = {
		defaults: {
			apply_font_to	: 'body',
			used_for		: 'et_body_font'
		},

		create_dropdown: function(){
			var $et_google_font_main_select = this.element,
				et_filter_options_html = '',
				$selected_option,
				$dropdown_selected_option,
				self = this;

			$et_google_font_main_select.hide().addClass( 'et_google_font_main_select' );

			$et_google_font_main_select.change( $.proxy( self.change_font, self ) );

			$et_google_font_main_select.find( 'option' ).each( function() {
				var $this_option = $(this),
					selected = $(this).is( ':selected' ) ? ' class="et_google_font_active"' : '';

				et_filter_options_html += '<li class="' + self.fontname_to_class( $this_option.text() ) + '" data-value="' + $this_option.attr( 'value' ) + '"' + selected +'>' + $this_option.text() + '</li>';
			} );

			$et_google_font_main_select.after( '<a href="#" class="et_google_font_custom_select">' + '<span class="et_filter_text"></span>' + '</a>' + '<ul class="et_google_font_options">' + et_filter_options_html + '</ul>' );

			this.custom_select_link = $et_google_font_main_select.next( '.et_google_font_custom_select' );

			this.custom_dropdown = this.custom_select_link.next('.et_google_font_options');

			$selected_option = $et_google_font_main_select.find( ':selected' );

			if ( $selected_option.length ) {
				this.custom_select_link.find('.et_filter_text').text( $selected_option.text() );

				$dropdown_selected_option = ( $selected_option.val() == 'none' ) ? this.custom_dropdown.find('li').eq(0) : this.custom_dropdown.find('li[data-value="' + $selected_option.text() + '"]');

				this.custom_select_link.find('.et_filter_text').addClass( $dropdown_selected_option.attr('class') ).attr( 'data-gf-class', $dropdown_selected_option.attr('class') );

				$dropdown_selected_option.addClass( 'et_google_font_active' );
			}

			this.custom_select_link.click( $.proxy( self.open_dropdown, self ) );

			this.custom_dropdown.find('li').click( $.proxy( self.select_option, self ) );
		},

		open_dropdown: function(event) {
			var self = this,
				$this_link = $(event.target);

			if ( self.custom_dropdown.hasClass( 'et_google_font_open' ) ) return false;

			self.custom_dropdown.show().addClass( 'et_google_font_open' );

			$this_link.hide();

			return false;
		},

		select_option: function(event) {
			var self = this,
				$this_option = $(event.target),
				this_option_value = $this_option.text(),
				$main_text = self.custom_select_link.find( '.et_filter_text' ),
				$main_select_active_element = self.element.find( 'option[value="' + this_option_value + '"]' ),
				main_text_gf_class = $main_text.attr( 'data-gf-class' );

			if ( $this_option.hasClass( 'et_google_font_active' ) ) {
				self.close_dropdown();

				return false;
			}

			$this_option.siblings().removeClass( 'et_google_font_active' );

			$main_text.removeClass( main_text_gf_class ).addClass( $this_option.attr( 'class' ) ).attr( 'data-gf-class', $this_option.attr( 'class' ) );

			$this_option.addClass('et_google_font_active');

			self.close_dropdown();

			if ( ! $main_select_active_element.length )
				self.element.val( 'none' ).trigger( 'change' );
			else
				self.element.val( this_option_value ).trigger( 'change' );

			return false;
		},

		close_dropdown: function() {
			this.custom_select_link.find( '.et_filter_text' ).show();
			this.custom_dropdown.hide().removeClass( 'et_google_font_open' );
		},

		maybe_request_font: function( font_name, font_option ) {
			if ( font_option.val() === 'none' ) return;

			if ( $('head').find( 'link#' + this.fontname_to_class( font_name ) ).length ) return;

			$('head').append( '<link id="' + this.fontname_to_class( font_name ) + '" href="http://fonts.googleapis.com/css?family=' + this.convert_to_google_font_name( font_name ) + '" rel="stylesheet" type="text/css" />' );
		},

		apply_font: function( font_name, font_option ) {
			var $head = $( 'head' );

			$head.find( 'style.' + this.options.used_for ).remove();

			if ( font_option.val() === 'none' )
				return;

			$head.append( '<style class="' + this.options.used_for + '">' + this.options.apply_font_to + ' { font-family: "' + font_name + '", sans-serif; } </style>' );
		},

		change_font: function() {
			if ( ! this.frontend_customizer ) return;

			var self = this,
				$active_option = self.element.find('option:selected'),
				active_option_value = $active_option.val(),
				$this_option = this.custom_dropdown.find('li[data-value="' + active_option_value + '"]'),
				$main_text = self.custom_select_link.find( '.et_filter_text' ),
				main_text_gf_class = $main_text.attr( 'data-gf-class' );

			self.maybe_request_font( active_option_value, $active_option );
			self.apply_font( active_option_value, $active_option );

			// set correct custom dropdown values on first load
			if ( this.custom_dropdown.find('li.et_google_font_active').data( 'value' ) !== active_option_value ) {
				this.custom_dropdown.find('li').removeClass( 'et_google_font_active' );
				$main_text.removeClass( main_text_gf_class ).addClass( $this_option.attr( 'class' ) ).attr( 'data-gf-class', $this_option.attr( 'class' ) );

				$this_option.addClass('et_google_font_active');
			}
		},

		convert_to_google_font_name: function( font_name ) {
			return font_name.replace(/ /g,'+');
		},

		fontname_to_class: function( option_value ) {
			return 'et_gf_' + option_value.replace(/ /g,'_').toLowerCase();
		}
	}

	$.fn.et_google_fonts = function(options){
		new ET_Google_Fonts(this, options)
		return this;
	};

	var et_heading_font_option_name = '[heading_font]',
		et_body_font_option_name = '[body_font]';

	if ( typeof et_google_fonts !== 'undefined' && et_google_fonts.options_in_one_row == 0 ) {
		et_heading_font_option_name = '_heading_font';
		et_body_font_option_name = '_body_font';
	}

	$('select[data-customize-setting-link$="' + et_heading_font_option_name + '"]').et_google_fonts();
	$('select[data-customize-setting-link$="' + et_body_font_option_name + '"]').et_google_fonts();
})(jQuery)