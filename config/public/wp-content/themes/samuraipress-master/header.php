<?php

require( OPTPRESS_INCLUDES . '/var.php' );
$seo = new OpSeo;

$_postcustom = get_post_custom( $post->ID );
$_postcustom = array_map( 'stripslashes', array_map( 'array_shift', $_postcustom ) );
extract( $_postcustom );

if ( ! isset( $_wp_page_template ) ) $_wp_page_template = false;
$bodyclass = isset( $_postcustom['samurai_smalltext'] ) && $_postcustom['samurai_smalltext'] == 'yes'
	? 'smalltext' : '';

// template specific css
switch( $_wp_page_template ) {
	case 'plus01.php':
		$style = 'plus01-style.css'; break;
	case 'blogpage_ns_001.php':
	case 'template_001blog.php':
	case 'template_001blogfull.php':
		$style = 'blog-style.css'; break;
	case 'squeezetemplate_001.php':
		$style = 'squeezetemplate001-style.css'; break;
	case 'squeezetemplate_002.php':
		$style = 'squeezetemplate002-style.css'; break;
	case 'squeezetemplate_003.php':
		$style = 'squeezetemplate003-style.css'; break;
	case 'squeezetemplate_004.php':
		$style = 'squeezetemplate004-style.css'; break;
	case 'squeezetemplate_005.php':
	case 'squeezetemplate_005b.php':
		$style = 'squeezetemplate005-style.css'; break;
	case 'template_001.php':
		$style = 'template001-style.css'; break;
	case 'template_001b.php':
		$style = 'template001b-style.css'; break;
	case 'template_001bc.php':
	case 'template_002.php':
		$style = 'template002-style.css'; break;
	case 'template_003.php':
		$style = 'template003-style.css'; break;
	case 'template_004.php':
		$style = 'template004-style.css'; break;
	case 'template_005.php':
		$style = 'template005-style.css'; break;
	case 'template_006.php':
		$style = 'template006-style.css'; break;
	case 'template_007.php':
		$style = 'template007-style.css'; break;
	case 'template_008.php':
		$style = 'template008-style.css'; break;
	case 'template_008b.php':
		$style = 'template008-style.css'; break;
	case 'template_009.php':
		$style = 'template009-style.css'; break;
	case 'template_010.php':
		$style = 'template010-style.css'; break;
	case 'template_011.php':
		$style = 'template011-style.css'; break;
	case 'template_012.php':
		$style = 'template012-style.css'; break;
	case 'launch_001.php':
		$style = 'launch001-style.css'; break;
	case 'launch_001b.php':
		$style = 'launch001b-style.css'; break;
	case 'launch_001d.php':
		$style = 'launch001d-style.css'; break;
	case 'launch_001e.php':
		$style = 'launch001e-style.css'; break;
	case 'launch_001f.php':
		$style = 'launch001f-style.css'; break;
	case 'launch_002.php':
		$style = 'launch002-style.css'; break;
	case 'launch_002b.php':
		$style = 'launch002b-style.css'; break;
	case 'launch_002d.php':
		$style = 'launch002d-style.css'; break;
	case 'launch_002e.php':
		$style = 'launch002e-style.css'; break;
	case 'launch_002f.php':
		$style = 'launch002f-style.css'; break;
	case 'launch_003.php':
		$style = 'launch003-style.css'; break;
	case 'launch_003b.php':
		$style = 'launch003b-style.css'; break;
	case 'launch_003d.php':
		$style = 'launch003d-style.css'; break;
	case 'launch_003e.php':
		$style = 'launch003e-style.css'; break;
	case 'launch_003f.php':
		$style = 'launch003f-style.css'; break;
	case 'launch_004.php':
		$style = 'launch004-style.css'; break;
	case 'launch_004b.php':
		$style = 'launch004b-style.css'; break;
	case 'launch_004d.php':
		$style = 'launch004d-style.css'; break;
	case 'launch_004e.php':
		$style = 'launch004e-style.css'; break;
	case 'launch_004f.php':
		$style = 'launch004f-style.css'; break;
	case 'launch_005.php':
		$style = 'launch005-style.css'; break;
	case 'launch_005b.php':
		$style = 'launch005b-style.css'; break;
	case 'launch_005d.php':
		$style = 'launch005d-style.css'; break;
	case 'launch_005e.php':
		$style = 'launch005e-style.css'; break;
	case 'launch_005f.php':
		$style = 'launch005f-style.css'; break;
	case 'launch_006.php':
		$style = 'launch006-style.css'; break;
	case 'widelaunch_001.php':
		$style = 'widelaunch001-style.css'; break;
	case 'widelaunch_001b.php':
		$style = 'widelaunch001b-style.css'; break;
	case 'thinlaunch_001.php':
		$style = 'thinlaunch001.css'; break;
	case 'thinlaunch_002.php':
		$style = 'thinlaunch002.css'; break;
	case 'members-style1.php':
	case 'members-style1-content.php':
	case 'members-style1-module.php':
	case 'members-style1US.php':
	case 'members-style1-contentUS.php':
	case 'members-style1-moduleUS.php':
	case 'members-style1-login.php':
	case 'members-style1-general.php':
	case 'members-style1-generalUS.php':
	case 'members-style1-daperror.php':
	case 'members-style1-daplogin.php':
	case 'members-style1-nonmember.php':
	case 'members-style1-nosidebar.php':
	case 'members-style1-nosidebarUS.php':
	case 'members-style1-forum.php':
		$style = 'members-style1-style.css'; break;
	default:
		$style = get_stylesheet_uri(); break;
}
wp_enqueue_style( 'op_typography', get_template_directory_uri() . '/typography.css' );
wp_enqueue_style( 'op_style', get_template_directory_uri() . '/' . $style );
wp_add_inline_style( 'op_style', _apply_template( __DIR__ . '/header.css' ) );

if ( isset( $samurai_theme ) ) {
	wp_enqueue_style( 'samurai_style', get_stylesheet_directory_uri() . "/themes/{$samurai_theme}/style.css" );
}

wp_enqueue_script( 'op_cufon-yui', get_template_directory_uri() . '/js/cufon-yui.js' );
wp_enqueue_script( 'op_qtobject', get_template_directory_uri() . '/js/qtobject.js' );
wp_enqueue_script( 'op_flowplayer', get_template_directory_uri() . '/js/flowplayer-3.2.10.min.js' );
wp_enqueue_script( 'op_flowplayer_ipad', get_template_directory_uri() . '/js/flowplayer.ipad-3.2.9.min.js' );

?>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
	<title><?php echo op_seo_title(); ?></title>
	<?php echo op_seo_header(); ?>
	<?php if ( isset( $favicon_url ) ) { ?><link rel="shortcut icon" href="<?php echo $favicon_url; ?>" type="image/x-icon" /><?php } ?>
	<link rel="pingback" href="<?php echo bloginfo( 'pingback_url' ); ?>" />
	<?php wp_get_archives( 'type=monthly&format=link' ); ?>
	<?php wp_head(); ?>
   
	<script>
	function clearText(thefield){
	if (thefield.defaultValue==thefield.value)
	thefield.value = ""
	}
	</script>

	<?php
	if ( isset( $_launchpage_fbshareimg ) || isset( $_optthemes_fbshareimg ) ) {
		$_fbshareimg = isset( $_optthemes_fbshareimg ) ? $_optthemes_fbshareimg : $_launchpage_fbshareimg;
		?><meta property="og:image" content="<?php esc_attr_e( $_fbshareimg ); ?>" /><?php
	}
	if ( isset( $_launchpage_fbdesc ) || isset( $_optthemes_fbdesc ) ) {
		$_fbdesc = isset( $_optthemes_fbdesc ) ? $_optthemes_fbdesc : $_launchpage_fbdesc;
		?><meta property="og:description" content="<?php esc_attr_e( $_fbdesc ); ?>" /><?php
	}
	?>
	<meta property="og:title" content="<?php echo op_seo_title(); ?>" />
	<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>" />
	<?php if ( isset( $facebookappid ) ) { ?><meta property="fb:app_id" content="<?php echo $facebookappid; ?>" /><?php } ?>

	<?php
	if ( isset( $_seo_headergooglewebcode ) && ! empty( $_seo_headergooglewebcode ) ) {
		echo $_seo_headergooglewebcode;
	}
	// custom tracking code
	if ( isset( $customtrackingcodeheader ) && $customtrackingcodeheader ) {
		echo eval( '?>' . stripcslashes( stripslashes( $customtrackingcodeheader ) ) );
	}
	?>
</head>
<body class="<?php esc_attr_e( $bodyclass ); ?>">
<div id="maintopbar"></div>
