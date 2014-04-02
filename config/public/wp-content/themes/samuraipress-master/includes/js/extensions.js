( function( $ ) {
	$( function() {
		// show/hide optimizepress options based on theme name
		function show_hide_op_options() {
			var template = $( '#page_template option:selected' ).text();
			$( '#my-custom-fields' ).toggle( /Squeeze/.test( template ) );
			$( '#my-lp-custom-fields' ).toggle( /Sales/.test( template ) );
			$( '#my-mem-custom-fields' ).toggle( /Members/.test( template ) );
		}

		show_hide_op_options();
		$( '#page_template' ).change( show_hide_op_options );

		// change tinymce css based on theme
		var $samurai_theme_selector = $( 'select[name="samurai_theme"]' );
		function change_tinymce_theme() {
			if ( ! tinymce.activeEditor || ! tinymce.activeEditor.contentDocument ) {
				setTimeout( change_tinymce_theme, 100 );
				return;
			}
			var theme = $samurai_theme_selector.val();
			var $style = $( '#samurai-css-style', tinymce.activeEditor.contentDocument ).eq( 0 );
			if ( $style.length == 0 ) {
				if ( theme == '' ) return;
				$style = $( '<link type="text/css" rel="stylesheet" id="samurai-css-style" />' );
				$( tinymce.activeEditor.contentDocument.head ).append( $style );
			}
			if ( theme == '' ) $style.remove();
			else $style.attr( 'href', 'http://localhost/~andrew/wp/wp-content/themes/samuraipress/themes/' + theme + '/style.css' );
		}

		change_tinymce_theme();
		$samurai_theme_selector.change( change_tinymce_theme );
	} );
} )( jQuery );
