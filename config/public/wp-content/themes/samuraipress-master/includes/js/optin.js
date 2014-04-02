( function( $ ) {
	$( function() {
		function setup_input_default( selector, default_text ) {
			$( selector ).blur( function() {
				if ( this.value == '' ) this.value = default_text;
			}).focus( function() {
				if ( this.value == default_text ) this.value = '';
			}).blur();
		}

		setup_input_default( '.optin_form form input[type="text"][name="name"]', 'Enter your name...' );
		setup_input_default( '.optin_form form input[type="text"][name="from"]', 'Enter your email...' );
	} );
} )( jQuery );

function validate_optin_form( form ) {
	if ( form.name.value == '' || form.name.value == 'Enter your name...' ) {
		alert( 'Please Enter Your Name.' );
		form.name.focus();
		return false;
	} else if ( form.from.value == '' || form.name.value == 'Enter your email...' ) {
		alert( 'Please Enter Your Email Address.' );
		form.from.focus();
		return false;
	} else if ( ! form.from.value.match( /^([a-zA-Z0-9])+([.a-zA-Z0-9_\-+])*@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-]+)+$/ ) ) {
		alert( 'You Entered an Invalid Email Address.' );
		form.from.focus();
		return false;
	}

	if ( form.partner ) {
		if ( form.partner.value == '_invalid' ) {
			alert('Please let us know how you heard about Market Samurai.');
			form.partner.focus();
			return false;
		}

		var date = new Date();
		date.setTime(date.getTime() + (1000 * 24 * 60 * 60 * 1000));
		var partner = form.partner.value;
		if ((partner.length > 0) && (partner.charAt(0) == '_')) partner = '';
		document.cookie = 'partner=' + partner + '; expires=' + date.toGMTString() + '; path=/';

		// we know what partner we are - set the list appropriately.
		switch (partner) {
			case 'mdc': form.unit.value = 'ms-mdc-prospect'; break;
			case 'thirtydc': form.unit.value = 'ms-30dc-2009b'; break;
			case 'immedge': form.unit.value = 'ms-immedge-usr'; break;
			case 'blueprint': form.unit.value = 'ms-blueprint-pr'; break;
			case 'paypal': form.unit.value = 'ms-paypal-usr'; break;
			case 'stomper': form.unit.value = 'ms-stomper-pr'; break;
			case 'bully': form.unit.value = 'ms-bully-usr'; break;
			case 'stomper2': form.unit.value = 'ms-stomper2-pr'; break;
			default: form.unit.value = 'ms-prospect'; break;
		}
	}

	return true;
}
