<?php

class SamuraiPress_Rewrite
{
	const SAMID_COOKIE = 'samId';
	const COOKIE_EXPIRE_TIME = 31536000; // 365 * 24 * 60 * 60;

	public static function init() {
		add_action( 'generate_rewrite_rules', array( __CLASS__, 'generate_rewrite_rules' ) );
		add_action( 'template_redirect', array( __CLASS__, 'template_redirect' ) );
		add_filter( 'scarcity_samurai_get_user_id', array( __CLASS__, 'get_user_id' ) );
		add_rewrite_tag( '%samuraipress_action%', '.*' );
		add_rewrite_tag( '%samuraipress_samid%', '.*' );
		flush_rewrite_rules();
	}

	public static function get_user_id( $user_id ) {
		if ( $user_id === null && isset( $_COOKIE['samId'] ) ) {
			$user = getUserBySamId( $_COOKIE['samId'], 'MarketSamurai' );
			$user_record = Scarcity_Samurai_User::find_by( array( 'email' => $user['email'] ) );
			if ( $user_record !== null ) {
				return $user_record['id'];
			}
		}
		return $user_id;
	}

	public static function generate_rewrite_rules( $wp_rewrite ) {
		$wp_rewrite->rules = array(
			'^dl-(.*)$' => 'index.php?samuraipress_action=download&samuraipress_samid=$matches[1]'
		) + $wp_rewrite->rules;
	}

	public static function template_redirect() {
		// trial signup?
		if ( isset( $_REQUEST['trial_email'] ) && isset( $_REQUEST['trial_custom_samid'] ) ) {
			self::trial_signup();
		}

		// set samid cookie
		$samid = get_query_var( 'samuraipress_samid' );
		if ( $samid !== '' ) {
			self::set_samid_cookie( urldecode( $samid ) );
		}

		// redirect action?
		switch ( get_query_var( 'samuraipress_action' ) ) {
			case 'download':
				wp_redirect( site_url() . '?name=download' );
				exit;
		}
	}

	public static function trial_signup() {
		require_once( 'db/user.php' );
		require_once( 'db/userProduct.php' );
		require_once( __DIR__ . '/dbhack.php' );
		require_once( __DIR__ . '/name-parser.php' );

		$name = getRequest( 'trial_name' );
		$email = getRequest( 'trial_email', getRequest( 'trial_from' ) );
		$partner = getPartner();

		$user = User::getByEmail( $email );
		$already_exists = false;
		if ( $user && $user->email != null ) {
			$userProduct = UserProduct::getByProductId( $user->userId, 'MarketSamurai' );
			$already_exists = $userProduct != null;
		} else {
			$user = user::getNew();

			$name_parts = NS_Name_Parser::parse( $name );
			$user->firstName = $name_parts['first'];
			$user->lastName = $name_parts['last'];
			$user->name = $name;

			$user->email = $email;
			$user->ip = getClientIp();
			$user->country = getCountryCode( $user->ip );
			if ( ! $user->country ) $user->country = 'US';
			$user->userAgent = $_SERVER['HTTP_USER_AGENT'];
			$user->referrer = $_SERVER['HTTP_REFERER'];
			$user->partner = $partner;
			$user->save();
		}

		if ( ! $already_exists ) {
			$userProduct = UserProduct::getNew();
			$userProduct->userId = $user->userId;
			$userProduct->productId = 'MarketSamurai';
			$userProduct->partner = $partner;
			$userProduct->activationLimit = 0; // trial
			$userProduct->save();
		}

		$samid = getRequest( 'trial_custom_samid' );
		if ( $userProduct && is_string( $samid ) && $samid != '' ) {
			addProductKeyByUserProductId( $userProduct->userProductId, $samid );
			self::set_samid_cookie( $samid );

			// create the current url without query strings
			$request_uri_parts = parse_url( $_SERVER['REQUEST_URI'] );
			$site_url_parts = parse_url( site_url() );
			$redirect_to = urlencode( "{$site_url_parts['scheme']}://{$site_url_parts['host']}{$request_uri_parts['path']}" );

			$samid = urlencode( $samid );
			// redirect without query string
			wp_redirect( site_url( '/cookiemonster.php' ) . "?samId={$samid}&redirect_to={$redirect_to}" );
			exit;
		}
	}

	private static function set_samid_cookie( $samid ) {
		setcookie( self::SAMID_COOKIE, $samid, time() + self::COOKIE_EXPIRE_TIME, SITECOOKIEPATH, COOKIE_DOMAIN );
	}
}
