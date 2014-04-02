<?php

class SamuraiPress_Admin
{
	public static function init() {
		add_action( 'admin_menu', array( __CLASS__, 'init_post' ) );
	}

	public static function init_post() {
		global $pagenow;

		if ( $pagenow == 'post.php' ) {
			add_meta_box( 'samurai-custom-fields', 'Samurai Options',
				array( __CLASS__, 'render_samurai_options' ), 'page', 'normal', 'high' );
			add_action( 'save_post', array( __CLASS__, 'save_post' ) );

			$template_dir = get_stylesheet_directory_uri();
			wp_enqueue_script( 'samurai_optimizepress_extensions',
				$template_dir . '/includes/js/extensions.js' );
		}
	}

	public static function render_samurai_options() {
		$post_custom = array_map( 'array_shift', get_post_custom() );

		// get a list of all the available samurai sub-themes
		$theme_dir = __DIR__ . '/../themes';
		$themes = array();
		$dirs = @ scandir( $theme_dir );
		foreach ( $dirs as $dir ) {
			if ( ! is_dir( "{$theme_dir}/{$dir}" ) || $dir[0] == '.' ) continue;
			$theme = wp_get_theme( $dir, $theme_dir );
			$themes[] = (object) array( 'ID' => $dir, 'name' => $theme->get( 'Name' ) );
		}
		$theme = isset( $post_custom['samurai_theme'] ) ? $post_custom['samurai_theme'] : '';
		$smalltext = isset( $post_custom['samurai_smalltext'] ) ? $post_custom['samurai_smalltext'] : '';

		// get a list of all available menus
		$menus = get_terms( 'nav_menu' );
		$menu = isset( $post_custom['samurai_menu'] ) ? $post_custom['samurai_menu'] : '';

		echo _apply_template( __DIR__ . '/html/admin_options.html', compact( 'theme', 'themes', 'smalltext', 'menu', 'menus' ) );
	}

	public static function save_post() {
		// Don't do anything if this is an autosave as our meta values won't
		// have been submitted.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

		global $post;
		update_post_meta( $post->ID, 'samurai_theme', $_POST['samurai_theme'] );
		update_post_meta( $post->ID, 'samurai_menu', $_POST['samurai_menu'] );
		update_post_meta( $post->ID, 'samurai_smalltext', $_POST['samurai_smalltext'] );
	}
}
