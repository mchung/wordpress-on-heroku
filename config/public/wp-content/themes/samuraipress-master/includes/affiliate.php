<?php

class SamuraiPress_Affiliate
{
	public static function init() {
		add_action( 'wp_head', array( __CLASS__, 'partner_image' ) );
		add_action( 'sanitize_after_read_page', array( __CLASS__, 'partner_prices' ) );
	}

	public static function partner_image( $content ) {
		$partner = getPartner();
		$file = '/theme/MarketSamurai/theme/images/partner/logo-' . $partner . '.png';
		if ( file_exists( ABSPATH . 'old' . $file ) ) {
			?>
			<style type="text/css">
				#access { background: url(<?php esc_attr_e( get_site_url() . $file ); ?>) no-repeat right 10px; }
			</style>
			<?php
		}
	}

	/**
	 * Override scarcity timers based on partner offers
	 */
	public static function partner_prices( $data ) {
		if ( $data['available_until'] !== null && $data['available_until']['type'] === 'opt_in' ) {
			switch( $data['available_until']['value'] ) {
				case 604800:  /*  7 days */ $price = '97.00'; break;
				case 1036800: /* 12 days */ $price = '127.00'; break;
			}
			$data['available_until']['value'] = 0; // default to unavailable until we find a valid offer

			$partner = getPartner();
			$offers = getSequentialPartnerOffers( 'MarketSamurai', $partner, time() );
			foreach ( $offers as $offer ) {
				if ( $offer['price'] == $price ) {
					$data['available_until']['value'] = intval( $offer['expiry'] ) * 24 * 60 * 60;
					break;
				}
			}
		}
		return $data;
	}
}
