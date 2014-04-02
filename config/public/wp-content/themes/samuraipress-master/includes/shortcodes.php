<?php

require_once( __DIR__ . '/dbhack.php' );
require_once( 'db/user.php' );
require_once( 'db/userProduct.php' );
require_once( 'db/productFamily.php' );
require_once( 'token.php' );

class SamuraiPress_ShortCodes
{
	const MAX_TOKEN_EXPIRE = '2029-12-31 23:59:59';
	const DEFAULT_APP_COLOR = '#00aaff';
	const ACTIVATE_PDF_REPORTS_SALT = '4POvwPjdvAqmGQM8snpku7lVboJp';

	private static $user;
	private static $user_product;

	public static function init() {
		add_shortcode( 'ns_firstname', array( __CLASS__, 'user_firstname' ) );
		add_shortcode( 'ns_email', array( __CLASS__, 'user_email' ) );
		add_shortcode( 'ns_box', array( __CLASS__, 'box' ) );
		add_shortcode( 'ns_video', array( __CLASS__, 'video' ) );
		add_shortcode( 'ns_testimonial', array( __CLASS__, 'testimonial' ) );
		add_shortcode( 'ns_testimonial_2', array( __CLASS__, 'testimonial_2' ) );
		add_shortcode( 'ns_button', array( __CLASS__, 'button' ) );
		add_shortcode( 'ns_optin', array( __CLASS__, 'optin' ) );
		add_shortcode( 'ns_app_badge', array( __CLASS__, 'app_badge' ) );
		add_shortcode( 'ns_app_token', array( __CLASS__, 'app_token' ) );
		add_shortcode( 'ns_browser', array( __CLASS__, 'browser' ) );
		add_shortcode( 'ns_activate_pdf_reports_url', array( __CLASS__, 'activate_pdf_reports_url' ) );

		add_filter( 'tiny_mce_before_init', array( __CLASS__, 'add_mce_styles' ) );
		add_filter( 'get_post_metadata', array(__CLASS__, 'modify_hidden_fields'), 10, 4 );
	}

	/**
	 *  Get the current user product (based on the user samid cookie value).
	 */
	private static function get_user_product() {
		// if user_product is cached, return that
		if ( self::$user_product !== null ) return self::$user_product;

		// don't go any further if we don't have a cookie to get the user info from
		if ( ! isset( $_COOKIE[ SamuraiPress_Rewrite::SAMID_COOKIE ] ) ) return null;
		$samid = $_COOKIE[ SamuraiPress_Rewrite::SAMID_COOKIE ];

		// get user info from samurai db
		if ( ( $user_products = UserProduct::getAllBySamId( $samid, 'MarketSamurai', false ) ) ) {
			foreach ( $user_products as $user_product ) {
				self::$user_product = $user_product;
				return self::$user_product;
			}
		}

		return null;
	}

	/**
	 *  Get the current user (based on the user samid cookie value).
	 */
	private static function get_user() {
		// if user is cached, return that
		if ( self::$user !== null ) return self::$user;

		$user_product = self::get_user_product();
		if ( $user_product !== null ) {
			self::$user = $user_product->getUser();
			return self::$user;
		}

		return null;
	}

	/**
	 *  Display the current users firstname.
	 *
	 *  Possible attributes:
	 *    after - text to put after the name (if the name is set).
	 */
	public static function user_firstname( $attrs, $content ) {
		extract( shortcode_atts( array( 'after' => '' ), $attrs ), EXTR_SKIP );
		$user = self::get_user();
		if ( $user !== null && 0 < strlen( $user->firstName ) ) {
			$name = ucwords( strtolower( $user->firstName ) );
			return esc_html( $name . $after );
		}
		return '';
	}

	/**
	 *  Display the current users email address.
	 */
	public static function user_email( $attrs, $content ) {
		$user = self::get_user();
		if ( $user !== null && 0 < strlen( $user->email ) ) {
			return esc_html( $user->email );
		}
		return '';
	}

	/**
	 *  Display a "samurai" style display box.  Need enough information to
	 *  make this work on any samurai related site.
	 *
	 *  Possible attributes:
	 *    title - title bar text
	 *
	 *  Content contains the html that goes in the box
	 */
	public static function box( $attrs, $content ) {
		extract( shortcode_atts( array( 'title' => '' ), $attrs ), EXTR_SKIP );
		$content = wpautop( do_shortcode( $content ) );
		return _apply_template( __DIR__ . '/html/box.html', compact( 'title', 'content' ) );
	}

	/**
	 *  Display a "samurai" style youtube video.
	 *
	 *  Possible attributes:
	 *    code - youtube hash
	 *    width - width of embeded video
	 *    height - height of embeded video
	 *    transcript - url where the transcript pdf can be found
	 */
	public static function video( $attrs, $content ) {
		$attrs = shortcode_atts( array(
			'code' => '',
			'width' => '600px',
			'height' => '364px',
			'autoplay' => '',
			'controls' => '',
			'rel' => '',
			'modestbranding' => '',
			'showinfo' => '',
			'transcript' => '' ),
		$attrs );

		$youtube_args = array( 'wmode=opaque' );
		if ( $attrs[ 'autoplay' ] !== '' ) $youtube_args[] = 'autoplay=' . $attrs['autoplay'];
		if ( $attrs[ 'controls' ] !== '' ) $youtube_args[] = 'controls=' . $attrs['controls'];
		if ( $attrs[ 'rel' ] !== '' ) $youtube_args[] = 'rel=' . $attrs['rel'];
		if ( $attrs[ 'modestbranding' ] !== '' ) $youtube_args[] = 'modestbranding=' . $attrs['modestbranding'];
		if ( $attrs[ 'showinfo' ] !== '' ) $youtube_args[] = 'showinfo=' . $attrs['showinfo'];
		$attrs[ 'youtube_args' ] = implode( '&', $youtube_args );

		return _apply_template( __DIR__ . '/html/video.html', $attrs );
	}

	/**
	 *  Display a "samurai" style testimonial box.  Need enough information
	 *  to make this work on any samurai related site.
	 *
	 *  Possible attributes:
	 *    title - testimonial heading
	 *    author - name of the person giving the testimonial
	 *    description - short description of the person giving the testimonial
	 *    url - url for person giving the testimonial
	 *
	 *  Content contains the actual testimonial text
	 */
	public static function testimonial( $attrs, $content ) {
		$content = wpautop( do_shortcode( $content ) );
		$attrs = shortcode_atts( array( 'title' => '', 'author' => '', 'description' => '', 'url' => '' ), $attrs );
		return _apply_template( __DIR__ . '/html/testimonial.html', $attrs + compact( 'content' ) );
	}

	public static function testimonial_2( $attrs, $content ) {
		$content = wpautop( do_shortcode( $content ) );

		$template_dir = get_stylesheet_directory_uri();

		$theme = get_post_custom_values( 'samurai_theme' );
		if ( $theme ) $theme = array_shift( $theme );

		$attrs = shortcode_atts( array(
			'image' => get_stylesheet_directory_uri() . "/themes/{$theme}/images/testimonial-portrait.jpg",
			'title' => '',
			'author' => '',
			'description' => '',
			'url' => '',
			'color' => 'orange',
		), $attrs );
		$testimonial = _apply_template( __DIR__ . '/html/testimonial_2.html', $attrs + compact( 'content' ) );
		return trim( preg_replace( '/>\s+</', '><', $testimonial ) );
	}

	/**
	 *  Display a "samurai" style buy button.  Need enough information to
	 *  make this work on any samurai related site.
	 *
	 *  Possible attributes:
	 *    url - where we end up when we click on the button.
	 *    target - target location. ie. "_blank" etc...
	 *    style - the button style to display
	 *
	 *  Content contains the button text
	 */
	public static function button( $attrs, $content ) {
		$attrs = shortcode_atts( array( 'url' => '', 'target' => '_blank', 'style' => 'orange' ), $attrs );
		return _apply_template( __DIR__ . '/html/button.html', $attrs + compact( 'content' ) );
	}

	/**
	 *  Display simple opt-in form (name, email fields, submit button).
	 *
	 *  Possible attributes:
	 *    webform - where to post this form to
	 *    list - list to be added to
	 *    redirect - where to return to (both success and onlist responses for
	 *      now).
	 *    redirect_prefix - what to prefix all return value keys with.  This is
	 *      necessary with WP due to "name" already being used.
	 *    samid - set to 1 if we should add a hidden samid field
	 *    button - set the text for the button
	 */
	public static function optin( $attrs, $content ) {
		$attrs = shortcode_atts( array(
			'webform' => '',
			'list' => '',
			'redirect' => '',
			'redirect_onlist' => '',
			'redirect_prefix' => '',
			'samid' => 0,
			'button' => 'Sign Up',
			'partner' => getPartner()
		), $attrs );

		// copy onlist redirect from normal redirect if not set.
		if ( $attrs['redirect_onlist'] == '' ) {
			$attrs['redirect_onlist'] = $attrs['redirect'];
		}

		// generate a samid if we need one.
		if ( $attrs['samid'] == 1 ) $attrs['samid'] = generateSignupSamID();
		$attrs['source_url'] = get_site_url();

		// add js to setup input field default text
		$template_dir = get_stylesheet_directory_uri();
		wp_enqueue_script( 'samurai_optimizepress_extensions',
			$template_dir . '/includes/js/optin.js' );

		$form = _apply_template( __DIR__ . '/html/optin.html', $attrs );

		// remove all whitespace between tags (so that we don't end up with
		// unexpected spacing etc around hidden elements).
		return trim( preg_replace( '/>\s+</', '><', $form ) );
	}

	public static function app_token( $attrs, $content ) {
		$user_product = self::get_user_product();
		$token = SamuraiToken::get( 'user-product', $user_product->userProductId );
		if ( ! $token ) {
			$token = SamuraiToken::create( 'user-product', $user_product->userProductId, self::MAX_TOKEN_EXPIRE );
		}
		return $token;
	}

	public static function app_badge( $attrs, $content ) {
		extract( shortcode_atts( array(
			'float' => '',
			'color' => self::DEFAULT_APP_COLOR,
		), $attrs ) );

		// float styles
		switch ( $float ) {
			case 'left': $float_style = 'style="float:left;margin-right:20px"'; break;
			case 'right': $float_style = 'style="float:right;margin-left:20px"'; break;
			default: $float_style = '';
		}

		$user_product = self::get_user_product();
		$id = $user_product->productId;

		$product_family = ProductFamily::getById( $id );
		$name = $product_family->title;

		$token = SamuraiToken::get( 'user-product', $user_product->userProductId );
		if ( ! $token ) {
			$token = SamuraiToken::create( 'user-product', $user_product->userProductId, self::MAX_TOKEN_EXPIRE );
		}

		wp_enqueue_script( 'swfobject' );
		wp_enqueue_script( 'thickbox' ); wp_enqueue_style( 'thickbox' );
		$badge = _apply_template( __DIR__ . '/html/app_badge.html', compact( 'token', 'color', 'id', 'name', 'float_style' ) );
		return trim( preg_replace( '/>\s+</', '><', $badge ) );
	}

	/**
	 *  Allow browser specific code...
	 *
	 * eg..
	 * [ns_browser is="chrome"]...[/ns_browser]
	 * [ns_browser is="not_chrome"]...[/ns_browser]
	 */
	public static function browser( $attrs, $content ) {
		global $is_gecko, $is_IE, $is_safari, $is_chrome;
		extract( shortcode_atts( array(
			'is' => '',
		), $attrs ) );

		if ( preg_match( '/(not_)?(.*)/i', $is, $match ) ) {
			$browser_match = false;
			switch( strtolower( $match[2] ) ) {
				case 'chrome': $browser_match = $is_chrome; break;
				case 'ie': $browser_match = $is_IE; break;
				case' safari': $browser_match = $is_safari; break;
				case 'firefox': case 'ff': case 'gecko': $browser_match = $is_gecko; break;
				default: return '';
			}

			// if either $browser_match is true, or $match == 'not_'... but not both, then we want to keep the content.
			if ( $browser_match xor $match[1] == 'not_' ) {
				return do_shortcode( $content );
			}
		}

		return '';
	}

	/**
	 *  Yield a URL with PDF report activation parameters.
	 *
	 *  Content ignored.  Sample use:
	 *
	 *    <a href="[ns_activate_pdf_reports_url url="https://noblesamurai.com/buy/RankTracker"][/ns_activate_pdf_reports_url]> ... </a>
	 */
	public static function activate_pdf_reports_url( $attrs, $content ) {
		$url = $attrs['url'];

		// First check for a pdf_token_email GET variable.
		if ( isset( $_GET['pdf_token_email'] ) ) {
			$pdf_email_token = base64_decode( $_GET['pdf_token_email'] );
			list( $email, $token ) = explode( ' ', $pdf_email_token );
			if ( $token !== sha1( self::ACTIVATE_PDF_REPORTS_SALT . ' ' . $email ) ) {
				unset( $email );
			}
		}

		// Didn't find, or didn't check out?  Try the SamID cookie.
		if ( ! isset( $email ) ) {
			$user = self::get_user();
			if ( $user === null ) {
				// Cannot identify user; just use the base URL.
				return $url;
			}

			$email = $user->email;
		}

		if ( strpos( $url, '?' ) !== false ) {
			$url .= '&';
		} else {
			$url .= '?';
		}

		$url .=
			'email=' . urlencode( $email ) .
			'&pdf_token=' . urlencode( sha1( self::ACTIVATE_PDF_REPORTS_SALT . ' ' . $email ) );

		return $url;
	}

	/**
	 *  Add "Style" selector options to the MCE Editor for some of the simpler
	 *  formatting items like highlighting or heading colours.
	 */
	public static function add_mce_styles( $settings ) {
		$style_formats = array(
			array( 'title' => 'Heading 1 - Risk', 'block' => 'h1', 'classes' => 'risk', 'exact' => true ),
			array( 'title' => 'Paragraph - Dojo', 'block' => 'p', 'classes' => 'dojo', 'exact' => true ),
			array( 'title' => 'Paragraph - Pitch', 'block' => 'p', 'classes' => 'pitch', 'exact' => true ),
			array( 'title' => 'List - Video', 'selector' => 'ul', 'classes' => 'video', 'exact' => true ),
			array( 'title' => 'Highlight', 'inline' => 'span', 'classes' => 'highlight' ),
		);
		if ( ! preg_match( '!styleselect!', $settings['theme_advanced_buttons2'] ) ) {
			$settings['theme_advanced_buttons2'] = preg_replace(
				'!formatselect!', 'formatselect,styleselect', $settings['theme_advanced_buttons2'] );
		}
		$settings['style_formats'] = json_encode( $style_formats );
		return $settings;
	}

	/**
	 * Dynamically modify OptimizePress's forms to include a newly generated SAMID
	 */
	public static function modify_hidden_fields($value, $object_id, $meta_key, $single) {
		if ($object_id > 0 && $meta_key == '' && $single === false) {
			$meta_cache = wp_cache_get($object_id, 'post_meta');
			if ($meta_cache && isset($meta_cache['_optthemes_webformhiddenhtml'])) {
				// Add the SamId field
				$samId = generateSignupSamID();
				$hidden_field = '<input type="hidden" name="custom samID" value="' . $samId . '">';
				$meta_cache['_optthemes_webformhiddenhtml'][0] .= $hidden_field;
				return $meta_cache;
			}
		}
		return $value;
	}
}
