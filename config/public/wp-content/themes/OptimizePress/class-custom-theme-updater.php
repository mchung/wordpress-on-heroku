<?php /**
 * Allows themes to use their own update API.
 * 
 * @author Tim Wachsener
 * @version 1.0
 */
class Custom_Theme_Updater
{
	private $api_url = '';
	private $api_data = array();
	private $slug = '';

	/**
	 * Class constructor.
	 *
	 * @uses hook()
	 * 
	 * @param string $_api_url The URL pointing to the custom API endpoint.
	 * @param string $_theme_slug The themes slug.
	 * @param array $_api_data Optional data to send with API calls.
	 * @return void
	 */
	function __construct( $_api_url, $_theme_slug, $_api_data = null )
	{
		$this->api_url = $_api_url;
		$this->api_data = $_api_data;
		$this->slug = $_theme_slug;

		// Set up hooks.
		$this->hook();
	}

	/**
	 * Set up Wordpress filters to hook into WP's update process.
	 * 
	 * @uses add_filter()
	 * 
	 * @return void
	 */
	private function hook()
	{
		add_filter( 'pre_set_site_transient_update_themes', array( &$this, 'pre_set_site_transient_update_themes_filter' ) );
	}

	/**
	 * Check for Updates at the defined API endpoint and modify the update array.
	 *
	 * This function dives into the update api just when Wordpress creates its update array,
	 * then adds a custom API call and injects the custom plugin data retrieved from the API.
	 * It is reassembled from parts of the native Wordpress plugin update code.
	 * See wp-includes/update.php line 121 for the original wp_update_plugins() function.
	 *
	 * @uses api_request()
	 *
	 * @param array $_transient_data Update array build by Wordpress.
	 * @return array Modified update array with custom plugin data.
	 */
	function pre_set_site_transient_update_themes_filter( $_transient_data )
	{
		if( empty( $_transient_data ) ) return $_transient_data;

		$to_send = array( 'slug' => $this->slug );

		$api_response = $this->api_request( 'theme_latest_version', $to_send );
		if( false !== $api_response && version_compare( $_transient_data->checked[$this->slug], $api_response['new_version'], '<' ) ) $_transient_data->response[$this->slug] = $api_response;

		return $_transient_data;
	}

	/**
	 * Calls the API and, if successfull, returns the object as array delivered by the API.
	 * 
	 * @uses get_bloginfo()
	 * @uses wp_remote_post()
	 * @uses is_wp_error()
	 * 
	 * @param string $_action The requested action.
	 * @param array $_data Parameters for the API action.
	 * @return false||array
	 */
	private function api_request( $_action, $_data )
	{
		global $wp_version;

		$data = array_merge( (array)$this->api_data, $_data );

		$options = array(
			'timeout' => ( ( defined('DOING_CRON') && DOING_CRON ) ? 30 : 3),
			'body' => array( 'action' => $_action, 'data' => serialize( $data ) ),
			'user-agent' => 'WordPress/' . $wp_version . '; ' . get_bloginfo( 'url' ) // Do not change this line.
		);

		// Call the custom API.
		$raw_response = wp_remote_post( $this->api_url, $options );

		if ( !is_wp_error( $raw_response ) && ( 200 == $raw_response['response']['code'] ) ):
			return (array) unserialize( $raw_response['body'] );
		else:
			return false;
		endif;
		var_dump();
	}
}
?>