<?php require(OPTPRESS_INCLUDES . "/var.php"); ?>
<?php $postcustom = get_post_custom($post->ID);
$seo = new OpSeo;
/*
echo '<xmp>';
print_r($postcustom);
echo '</xmp>';
*/

$videoheight = !empty($postcustom['_optthemes_videoheight']) ? stripcslashes($postcustom['_optthemes_videoheight'][0])."px" :  "355px";
$videowidth = !empty($postcustom['_optthemes_videowidth']) ? stripcslashes($postcustom['_optthemes_videowidth'][0])."px" :  "628px";
$mainpreheadline = !empty($postcustom['_optthemes_preheadlinemaincolor']) ? stripcslashes($postcustom['_optthemes_preheadlinemaincolor'][0]) :  "636363";
$mainpreheadlineem = !empty($postcustom['_optthemes_alternativepreheadlinecolor']) ? stripcslashes($postcustom['_optthemes_alternativepreheadlinecolor'][0]) :  "636363";

$mainsalespreheadline = !empty($postcustom['_launchpage_preheadlinemaincolor']) ? stripcslashes($postcustom['_launchpage_preheadlinemaincolor'][0]) :  "636363";
$mainsalespreheadlineem = !empty($postcustom['_launchpage_alternativepreheadlinecolor']) ? stripcslashes($postcustom['_launchpage_alternativepreheadlinecolor'][0]) :  "636363";

$headlinecolor = !empty($postcustom['_optthemes_colorpickerField1']) ? stripcslashes($postcustom['_optthemes_colorpickerField1'][0]) :  "db1f00";
$headlinecolorem = !empty($postcustom['_optthemes_colorpickerField2']) ? stripcslashes($postcustom['_optthemes_colorpickerField2'][0]) :  "215e8e";

$mainbottomheadline = !empty($postcustom['_optthemes_headlinebelowvideomaincolor']) ? stripcslashes($postcustom['_optthemes_headlinebelowvideomaincolor'][0]) :  "DB1F00";
$mainbottomheadlineem = !empty($postcustom['_optthemes_alternativeheadlinebelowvideocolor']) ? stripcslashes($postcustom['_optthemes_alternativeheadlinebelowvideocolor'][0]) :  "db1f00";

$mainpostheadline = !empty($postcustom['_optthemes_subheadlinemaincolor']) ? stripcslashes($postcustom['_optthemes_subheadlinemaincolor'][0]) :  "303030";
$mainpostheadlineem = !empty($postcustom['_optthemes_alternativesubheadlinecolor']) ? stripcslashes($postcustom['_optthemes_alternativesubheadlinecolor'][0]) :  "303030";

$mainsalespostheadline = !empty($postcustom['_launchpage_subheadlinemaincolor']) ? stripcslashes($postcustom['_launchpage_subheadlinemaincolor'][0]) :  "303030";
$mainsalespostheadlineem = !empty($postcustom['_launchpage_alternativesubheadlinecolor']) ? stripcslashes($postcustom['_launchpage_alternativesubheadlinecolor'][0]) :  "303030";

$sidebarheadlinecolor = !empty($postcustom['_optthemes_sidebarheadlinemaincolor']) ? stripcslashes($postcustom['_optthemes_sidebarheadlinemaincolor'][0]) :  "215e8e";

$seometadescription = !empty($postcustom['_seo_metadescription']) ? stripcslashes($postcustom['_seo_metadescription'][0]) :  "";
$seometakeywords = !empty($postcustom['_seo_metakeywords']) ? stripcslashes($postcustom['_seo_metakeywords'][0]) :  "";

$seonoindex = !empty($postcustom['_seo_1']) ? $postcustom['_seo_1'][0]=="yes" ? "noindex," : "index," :  "index,";
$seonofollow = !empty($postcustom['_seo_2']) ? $postcustom['_seo_2'][0]=="yes" ? "nofollow," : "follow," :  'follow,';
$seonoarchive = !empty($postcustom['_seo_3']) ? $postcustom['_seo_3'][0]=="yes" ? "noarchive" : "archive" :  'archive';
?>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php echo op_seo_title(); ?></title>
<?php echo op_seo_header(); ?>
<?php echo ($favicon_url) ? '<link rel="shortcut icon" href="'.$favicon_url.'" type="image/x-icon" />' : ''; ?>
<link href="<?php echo get_bloginfo('template_directory'); ?>/typography.css" rel="stylesheet" type="text/css">
<?php         switch($postcustom['_wp_page_template'][0]){
			case 'plus01.php';
                echo '<link href="'.get_bloginfo('template_directory').'/plus01-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'blogpage_ns_001.php';
                echo '<link href="'.get_bloginfo('template_directory').'/blog-style.css" rel="stylesheet" type="text/css">';
            break;
	        case 'template_001blog.php';
                echo '<link href="'.get_bloginfo('template_directory').'/blog-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'template_001blogfull.php';
                echo '<link href="'.get_bloginfo('template_directory').'/blog-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'squeezetemplate_001.php';
                echo '<link href="'.get_bloginfo('template_directory').'/squeezetemplate001-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'squeezetemplate_002.php';
                echo '<link href="'.get_bloginfo('template_directory').'/squeezetemplate002-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'squeezetemplate_003.php';
                echo '<link href="'.get_bloginfo('template_directory').'/squeezetemplate003-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'squeezetemplate_004.php';
                echo '<link href="'.get_bloginfo('template_directory').'/squeezetemplate004-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'squeezetemplate_005.php';
                echo '<link href="'.get_bloginfo('template_directory').'/squeezetemplate005-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'squeezetemplate_005b.php';
                echo '<link href="'.get_bloginfo('template_directory').'/squeezetemplate005-style.css" rel="stylesheet" type="text/css">';
            break;
            case 'template_001.php';
                echo '<link href="'.get_bloginfo('template_directory').'/template001-style.css" rel="stylesheet" type="text/css">';
            break;
			 case 'template_001b.php';
                echo '<link href="'.get_bloginfo('template_directory').'/template001b-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'template_001bc.php';
                echo '<link href="'.get_bloginfo('template_directory').'/template002-style.css" rel="stylesheet" type="text/css">';
            break;
            case 'template_002.php':
                echo '<link href="'.get_bloginfo('template_directory').'/template002-style.css" rel="stylesheet" type="text/css">';
            break;
            case 'template_003.php':
                echo '<link href="'.get_bloginfo('template_directory').'/template003-style.css" rel="stylesheet" type="text/css">';
            break;
            case 'template_004.php':
                echo '<link href="'.get_bloginfo('template_directory').'/template004-style.css" rel="stylesheet" type="text/css">';
            break;
            case 'template_005.php':
                echo '<link href="'.get_bloginfo('template_directory').'/template005-style.css" rel="stylesheet" type="text/css">';
            break;
            case 'template_006.php':
                echo '<link href="'.get_bloginfo('template_directory').'/template006-style.css" rel="stylesheet" type="text/css">';
            break;
            case 'template_007.php':
                echo '<link href="'.get_bloginfo('template_directory').'/template007-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'template_008.php':
                echo '<link href="'.get_bloginfo('template_directory').'/template008-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'template_008b.php':
                echo '<link href="'.get_bloginfo('template_directory').'/template008-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'template_009.php':
                echo '<link href="'.get_bloginfo('template_directory').'/template009-style.css" rel="stylesheet" type="text/css">';
            break;
				case 'template_010.php':
                echo '<link href="'.get_bloginfo('template_directory').'/template010-style.css" rel="stylesheet" type="text/css">';
            break;
			 case 'template_011.php':
                echo '<link href="'.get_bloginfo('template_directory').'/template011-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'template_012.php':
                echo '<link href="'.get_bloginfo('template_directory').'/template012-style.css" rel="stylesheet" type="text/css">';
            break;
            case 'launch_001.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch001-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'launch_001b.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch001b-style.css" rel="stylesheet" type="text/css">';
            break;
			 case 'launch_001d.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch001d-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'launch_001e.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch001e-style.css" rel="stylesheet" type="text/css">';
            break;
			 case 'launch_001f.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch001f-style.css" rel="stylesheet" type="text/css">';
            break;
			 case 'launch_002.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch002-style.css" rel="stylesheet" type="text/css">';
            break;
			 case 'launch_002b.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch002b-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'launch_002d.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch002d-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'launch_002e.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch002e-style.css" rel="stylesheet" type="text/css">';
            break;
			 case 'launch_002f.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch002f-style.css" rel="stylesheet" type="text/css">';
            break;
			  case 'launch_003.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch003-style.css" rel="stylesheet" type="text/css">';
            break;
			 case 'launch_003b.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch003b-style.css" rel="stylesheet" type="text/css">';
            break;
			 case 'launch_003d.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch003d-style.css" rel="stylesheet" type="text/css">';
            break;
			 case 'launch_003e.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch003e-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'launch_003f.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch003f-style.css" rel="stylesheet" type="text/css">';
            break;
			 case 'launch_004.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch004-style.css" rel="stylesheet" type="text/css">';
            break;
			 case 'launch_004b.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch004b-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'launch_004d.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch004d-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'launch_004e.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch004e-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'launch_004f.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch004f-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'launch_005.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch005-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'launch_005b.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch005b-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'launch_005d.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch005d-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'launch_005e.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch005e-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'launch_005f.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch005f-style.css" rel="stylesheet" type="text/css">';
            break;
			
		case 'launch_006.php';
                echo '<link href="'.get_bloginfo('template_directory').'/launch006-style.css" rel="stylesheet" type="text/css">';
            break;
			
			case 'widelaunch_001.php';
                echo '<link href="'.get_bloginfo('template_directory').'/widelaunch001-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'widelaunch_001b.php';
                echo '<link href="'.get_bloginfo('template_directory').'/widelaunch001b-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'thinlaunch_001.php';
                echo '<link href="'.get_bloginfo('template_directory').'/thinlaunch001.css" rel="stylesheet" type="text/css">';
            break;
			case 'thinlaunch_002.php';
                echo '<link href="'.get_bloginfo('template_directory').'/thinlaunch002.css" rel="stylesheet" type="text/css">';
            break;
			case 'members-style1.php';
                echo '<link href="'.get_bloginfo('template_directory').'/members-style1-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'members-style1-content.php';
                echo '<link href="'.get_bloginfo('template_directory').'/members-style1-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'members-style1-module.php';
                echo '<link href="'.get_bloginfo('template_directory').'/members-style1-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'members-style1US.php';
                echo '<link href="'.get_bloginfo('template_directory').'/members-style1-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'members-style1-contentUS.php';
                echo '<link href="'.get_bloginfo('template_directory').'/members-style1-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'members-style1-moduleUS.php';
                echo '<link href="'.get_bloginfo('template_directory').'/members-style1-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'members-style1-login.php';
                echo '<link href="'.get_bloginfo('template_directory').'/members-style1-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'members-style1-general.php';
                echo '<link href="'.get_bloginfo('template_directory').'/members-style1-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'members-style1-generalUS.php';
                echo '<link href="'.get_bloginfo('template_directory').'/members-style1-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'members-style1-daperror.php';
                echo '<link href="'.get_bloginfo('template_directory').'/members-style1-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'members-style1-daplogin.php';
                echo '<link href="'.get_bloginfo('template_directory').'/members-style1-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'members-style1-nonmember.php';
                echo '<link href="'.get_bloginfo('template_directory').'/members-style1-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'members-style1-nosidebar.php';
                echo '<link href="'.get_bloginfo('template_directory').'/members-style1-style.css" rel="stylesheet" type="text/css">';
            break;
			case 'members-style1-nosidebarUS.php';
                echo '<link href="'.get_bloginfo('template_directory').'/members-style1-style.css" rel="stylesheet" type="text/css">';
            break;
			
			case 'members-style1-forum.php';
                echo '<link href="'.get_bloginfo('template_directory').'/members-style1-style.css" rel="stylesheet" type="text/css">';
            break;
			
			// end added 28 october 2010 //
            default:
                echo '<link href="'.get_bloginfo('stylesheet_url').'" rel="stylesheet" type="text/css">';
            break;
        }
    ?>

<link rel="pingback" href="<?php echo bloginfo('pingback_url'); ?>" />
<?php wp_get_archives('type=monthly&format=link'); ?>
<?php wp_head(); ?>
   
<style type="text/css">
span.cufon {margin:2px 0px;}
#launchvideobox{margin:0px auto;
}

#videobox2{margin:0px auto;
<?php if($postcustom['_launchpage_showshadowborder']){ ?>
-moz-box-shadow: 0px 0px 4px #666;
	-webkit-box-shadow: 0px 0px 4px #666;
	box-shadow: 0px 0px 4px #666;
	/* For IE 8 */
	-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=0, Color='#666666')";
	/* For IE 5.5 - 7 */
	filter: progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=0, Color='#666666');
<?php } ?>
}

#videobox3{margin:0px auto;
<?php if($postcustom['_launchpage_showshadowborder']){ ?>
-moz-box-shadow: 0px 0px 4px #666;
	-webkit-box-shadow: 0px 0px 4px #666;
	box-shadow: 0px 0px 4px #666;
	/* For IE 8 */
	-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=0, Color='#666666')";
	/* For IE 5.5 - 7 */
	filter: progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=0, Color='#666666');
<?php } ?>
}

#videobox{margin:0px auto;
<?php if($postcustom['_optthemes_showshadowborder']){ ?>
	-moz-box-shadow: 0px 0px 4px #666;
	-webkit-box-shadow: 0px 0px 4px #666;
	box-shadow: 0px 0px 4px #666;
	/* For IE 8 */
	-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=0, Color='#666666')";
	/* For IE 5.5 - 7 */
	filter: progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=0, Color='#666666');
<?php } ?>
}

<?php 	switch(stripcslashes($postcustom['_optthemes_preheadlinefont'][0])) {
		case "Arial": { $preheadlinecss = "letter-spacing:-1px"; break;	}
		case "Impact": { $preheadlinecss = "letter-spacing:0px"; break;	}
		case "Vegur": { $preheadlinecss = "letter-spacing:-1px"; break; }
		case "Georgia": { $preheadlinecss = "letter-spacing:0px;font-weight:normal"; break; }
		case "Tahoma": { $preheadlinecss = "letter-spacing:-1px"; break; }
	}
	switch(stripcslashes($postcustom['_optthemes_headlinefont'][0])) {
		case "Arial": { $headlinecss = "letter-spacing:-2px;line-height:32px"; break; }
		case "Impact": { $headlinecss = "letter-spacing:-1px"; break; }
		case "Vegur": { $headlinecss = "letter-spacing:-1px;line-height:35px"; break; }
		case "Georgia": { $headlinecss = "letter-spacing:-2px"; break; }
		case "Tahoma": { $headlinecss = "letter-spacing:-1px"; break; }
	}
	switch(stripcslashes($postcustom['_optthemes_subheadlinefont'][0])) {
		case "Arial": { $postheadlinecss = "letter-spacing:-1px"; break; }
		case "Impact": { $postheadlinecss = "letter-spacing:0px"; break; }
		case "Vegur": { $postheadlinecss = "letter-spacing:-1px"; break; }
		case "Georgia": { $postheadlinecss = "letter-spacing:0px;font-weight:normal"; break; }
		case "Tahoma": { $postheadlinecss = "letter-spacing:-1px"; break; }
	}
	switch(stripcslashes($postcustom['_optthemes_headlinebelowvideofont'][0])) {
		case "Arial": { $bottomheadlinecss = "letter-spacing:-2px;line-height:32px"; break; }
		case "Impact": { $bottomheadlinecss = "letter-spacing:0px"; break; }
		case "Vegur": { $bottomheadlinecss = "letter-spacing:-1px;line-height:35px"; break; }
		case "Georgia": { $bottomheadlinecss = "letter-spacing:-2px"; break; }
		case "Tahoma": { $bottomheadlinecss = "letter-spacing:-1px"; break; }
	}
	switch(stripcslashes($postcustom['_optthemes_sidebarheadlinefont'][0])) {
		case "Arial": { $sidebarheadlinecss = "letter-spacing:-1px;line-height:21px"; break;	}
		case "Impact": { $sidebarheadlinecss = "letter-spacing:-0px;font-weight:normal"; break;	}
		case "Vegur": { $sidebarheadlinecss = "letter-spacing:-1px;font-weight:bold"; break; }
		case "Georgia": { $sidebarheadlinecss = "letter-spacing:0px;font-weight:normal"; break; }
		case "Tahoma": { $sidebarheadlinecss = "letter-spacing:-1px"; break; }
		case "Hand of Sean": { $sidebarheadlinecss = "letter-spacing:0px"; break; }
		case "Arial Narrow": { $sidebarheadlinecss = "letter-spacing:-1px"; break; }
	}
	
	/* Launch Pages Above/Below Video Text Spacing/Setting */
	switch(stripcslashes($postcustom['_launchpage_headlineabovevideofont'][0])) {
		case "Arial": { $launch_abovevideocss = "letter-spacing:-2px;line-height:32px"; break;	}
		case "Impact": { $launch_abovevideocss = "letter-spacing:-1px;font-weight:normal"; break;	}
		case "Vegur": { $launch_abovevideocss = "letter-spacing:-1px;font-weight:bold"; break; }
		case "Georgia": { $launch_abovevideocss = "letter-spacing:-2px;font-weight:bold"; break; }
		case "Tahoma": { $launch_abovevideocss = "letter-spacing:-3px"; break; }
		case "Hand of Sean": { $launch_abovevideocss = "letter-spacing:0px"; break; }
		case "Arial Narrow": { $launch_abovevideocss = "letter-spacing:-1px"; break; }
	}
	switch(stripcslashes($postcustom['_launchpage_headlinebelowvideofont'][0])) {
		case "Arial": { $launch_belowvideocss = "letter-spacing:-2px;line-height:32px"; break;	}
		case "Impact": { $launch_belowvideocss = "letter-spacing:-1px;font-weight:normal"; break;	}
		case "Vegur": { $launch_belowvideocss = "letter-spacing:-1px;font-weight:bold"; break; }
		case "Georgia": { $launch_belowvideocss = "letter-spacing:-2px;font-weight:bold"; break; }
		case "Tahoma": { $launch_belowvideocss = "letter-spacing:-3px"; break; }
		case "Hand of Sean": { $launch_belowvideocss = "letter-spacing:0px"; break; }
		case "Arial Narrow": { $launch_belowvideocss = "letter-spacing:-1px"; break; }
	}

?>




<?php echo !empty($postcustom['_launchpage_launchbgcolor']) ? 'body{background-color:#'.$postcustom['_launchpage_launchbgcolor'][0].';}' : ''; ?>


#footer-inside{color:#<?php echo stripcslashes($postcustom['_launchpage_footertextcolor'][0]); ?><?php echo stripcslashes($postcustom['_optthemes_footertextcolor'][0]); ?>;}

#footer-inside a{color:#<?php echo stripcslashes($postcustom['_launchpage_footertextcolor'][0]); ?><?php echo stripcslashes($postcustom['_optthemes_footertextcolor'][0]); ?>;}

.footer-right a{color:#<?php echo stripcslashes($postcustom['_launchpage_footertextcolor'][0]); ?><?php echo stripcslashes($postcustom['_optthemes_footertextcolor'][0]); ?>;text-decoration:none;font-weight:normal;}

.footer-right li:first-child  {border-left:0px solid #<?php echo stripcslashes($postcustom['_launchpage_footertextcolor'][0]); ?><?php echo stripcslashes($postcustom['_optthemes_footertextcolor'][0]); ?>;padding-left:0px;}

.footer-right li:first-child a {border-left:0px solid #<?php echo stripcslashes($postcustom['_launchpage_footertextcolor'][0]); ?><?php echo stripcslashes($postcustom['_optthemes_footertextcolor'][0]); ?>;padding-left:0px;}

.footer-right li {color:#<?php echo stripcslashes($postcustom['_launchpage_footertextcolor'][0]); ?>;border-left:1px solid #<?php echo stripcslashes($postcustom['_launchpage_footertextcolor'][0]); ?>;
}
<?php $squeezepreheadlinefontsize=($postcustom['_optthemes_preheadlinefontsize'])?'font-size:'.$postcustom['_optthemes_preheadlinefontsize'][0].'px;':''; ?>
<?php $squeezepreheadlinefontweight=($postcustom['_optthemes_preheadlinefontweight'])?'font-weight:'.$postcustom['_optthemes_preheadlinefontweight'][0].';':''; ?>
<?php $squeezepreheadlinefontstyle=($postcustom['_optthemes_preheadlinefontstyle'])?'font-style:'.$postcustom['_optthemes_preheadlinefontstyle'][0].';':''; ?>
<?php $squeezepreheadlineletterspacing=($postcustom['_optthemes_preheadlineletterspacing'])?'letter-spacing:'.$postcustom['_optthemes_preheadlineletterspacing'][0].';':''; ?>
.main-preheadline{color:#<?php echo $mainpreheadline?> !important;<?php echo $preheadlinecss?>;<?php echo $squeezepreheadlinefontsize?><?php echo $squeezepreheadlinefontweight?><?php echo $squeezepreheadlinefontstyle?><?php echo $squeezepreheadlineletterspacing?>}
.main-preheadline em{color:#<?php echo $mainpreheadlineem?> !important;<?php echo $preheadlinecss?>;<?php echo $squeezepreheadlinefontsize?><?php echo $squeezepreheadlinefontweight?><?php echo $squeezepreheadlinefontstyle?><?php echo $squeezepreheadlineletterspacing?>}

<?php $squeezeheadlinefontsize=($postcustom['_optthemes_headlinefontsize'])?'font-size:'.$postcustom['_optthemes_headlinefontsize'][0].'px;':''; ?>
<?php $squeezeheadlinefontweight=($postcustom['_optthemes_headlinefontweight'])?'font-weight:'.$postcustom['_optthemes_headlinefontweight'][0].';':''; ?>
<?php $squeezeheadlinefontstyle=($postcustom['_optthemes_headlinefontstyle'])?'font-style:'.$postcustom['_optthemes_headlinefontstyle'][0].';':''; ?>
<?php $squeezeheadlineletterspacing=($postcustom['_optthemes_headlineletterspacing'])?'letter-spacing:'.$postcustom['_optthemes_headlineletterspacing'][0].';':''; ?>
.main-headline{color:#<?php echo $headlinecolor?> !important;<?php echo $headlinecss?>;<?php echo $squeezeheadlinefontsize?><?php echo $squeezeheadlinefontsize?><?php echo $squeezeheadlinefontweight?><?php echo $squeezeheadlinefontstyle?><?php echo $squeezeheadlineletterspacing?>}
.main-headline em{color:#<?php echo $headlinecolorem?> !important;<?php echo $headlinecss?>;<?php echo $squeezeheadlinefontsize?><?php echo $squeezeheadlinefontsize?><?php echo $squeezeheadlinefontweight?><?php echo $squeezeheadlinefontstyle?><?php echo $squeezeheadlineletterspacing?>}

<?php $squeezeheadlinebelowvideofontsize=($postcustom['_optthemes_headlinebelowvideofontsize'])?'font-size:'.$postcustom['_optthemes_headlinebelowvideofontsize'][0].'px;':''; ?>
<?php $squeezeheadlinebelowvideofontweight=($postcustom['_optthemes_headlinebelowvideofontweight'])?'font-weight:'.$postcustom['_optthemes_headlinebelowvideofontweight'][0].';':''; ?>
<?php $squeezeheadlinebelowvideofontstyle=($postcustom['_optthemes_headlinebelowvideofontstyle'])?'font-style:'.$postcustom['_optthemes_headlinebelowvideofontstyle'][0].';':''; ?>
<?php $squeezeheadlinebelowvideoletterspacing=($postcustom['_optthemes_headlinebelowvideoletterspacing'])?'letter-spacing:'.$postcustom['_optthemes_headlinebelowvideoletterspacing'][0].';':''; ?>
.main-bottomheadline{color:#<?php echo $mainbottomheadline?> !important;<?php echo $bottomheadlinecss?>;<?php echo $squeezeheadlinebelowvideofontsize?><?php echo $squeezeheadlinebelowvideofontweight?><?php echo $squeezeheadlinebelowvideofontstyle?><?php echo $squeezeheadlinebelowvideoletterspacing?>}
.main-bottomheadline em{color:#<?php echo $mainbottomheadlineem?> !important;<?php echo $bottomheadlinecss?>;<?php echo $squeezeheadlinebelowvideofontsize?><?php echo $squeezeheadlinebelowvideofontweight?><?php echo $squeezeheadlinebelowvideofontstyle?><?php echo $squeezeheadlinebelowvideoletterspacing?>}

<?php $squeezesubheadlinefontsize=($postcustom['_optthemes_subheadlinefontsize'])?'font-size:'.$postcustom['_optthemes_subheadlinefontsize'][0].'px;':''; ?>
<?php $squeezesubheadlinefontweight=($postcustom['_optthemes_subheadlinefontweight'])?'font-weight:'.$postcustom['_optthemes_subheadlinefontweight'][0].';':''; ?>
<?php $squeezesubheadlinefontstyle=($postcustom['_optthemes_subheadlinefontstyle'])?'font-style:'.$postcustom['_optthemes_subheadlinefontstyle'][0].';':''; ?>
<?php $squeezesubheadlineletterspacing=($postcustom['_optthemes_subheadlineletterspacing'])?'letter-spacing:'.$postcustom['_optthemes_subheadlineletterspacing'][0].';':''; ?>
.main-postheadline{color:#<?php echo $mainpostheadline?> !important;<?php echo $postheadlinecss?>;<?php echo $squeezesubheadlinefontsize?><?php echo $squeezesubheadlinefontweight?><?php echo $squeezesubheadlinefontstyle?><?php echo $squeezesubheadlineletterspacing?>}
.main-postheadline em{color:#<?php echo $mainpostheadlineem?> !important;<?php echo $postheadlinecss?>;<?php echo $squeezesubheadlinefontsize?><?php echo $squeezesubheadlinefontweight?><?php echo $squeezesubheadlinefontstyle?><?php echo $squeezesubheadlineletterspacing?>}

<?php $salespreheadlinefontsize = ($postcustom['_launchpage_preheadlinefontsize']) ? 'font-size:'.$postcustom['_launchpage_preheadlinefontsize'][0].'px;' : ''; ?>
<?php $salespreheadlinefontweight=($postcustom['_launchpage_preheadlinefontweight'])?'font-weight:'.$postcustom['_launchpage_preheadlinefontweight'][0].';':''; ?>
<?php $salespreheadlinefontstyle=($postcustom['_launchpage_preheadlinefontstyle'])?'font-style:'.$postcustom['_launchpage_preheadlinefontstyle'][0].';':''; ?>
<?php $salespreheadlineletterspacing=($postcustom['_launchpage_preheadlineletterspacing'])?'letter-spacing:'.$postcustom['_launchpage_preheadlineletterspacing'][0].';':''; ?>
.sales-preheadline{color:#<?php echo $mainsalespreheadline?> !important;<?php echo $preheadlinecss?>;<?php echo $salespreheadlinefontsize?><?php echo $salespreheadlinefontweight?><?php echo $salespreheadlinefontstyle?><?php echo $salespreheadlineletterspacing?>}
.sales-preheadline em{color:#<?php echo $mainsalespreheadlineem?> !important;<?php echo $preheadlinecss?>;<?php echo $salespreheadlinefontsize?><?php echo $salespreheadlinefontweight?><?php echo $salespreheadlinefontstyle?><?php echo $salespreheadlineletterspacing?>}

<?php $salessubheadlinefontsize = ($postcustom['_launchpage_subheadlinefontsize']) ? 'font-size:'.$postcustom['_launchpage_subheadlinefontsize'][0].'px;' : ''; ?>
<?php $salessubheadlinefontweight=($postcustom['_launchpage_subheadlinefontweight'])?'font-weight:'.$postcustom['_launchpage_subheadlinefontweight'][0].';':''; ?>
<?php $salessubheadlinefontstyle=($postcustom['_launchpage_subheadlinefontstyle'])?'font-style:'.$postcustom['_launchpage_subheadlinefontstyle'][0].';':''; ?>
<?php $salessubheadlineletterspacing=($postcustom['_launchpage_subheadlineletterspacing'])?'letter-spacing:'.$postcustom['_launchpage_subheadlineletterspacing'][0].';':''; ?>
.sales-postheadline{color:#<?php echo $mainsalespostheadline?> !important;<?php echo $salessubheadlinefontsize?><?php echo $salessubheadlinefontweight?><?php echo $salessubheadlinefontstyle?><?php echo $salessubheadlineletterspacing?>}
.sales-postheadline em{color:#<?php echo $mainsalespostheadlineem?> !important;<?php echo $salessubheadlinefontsize?><?php echo $salessubheadlinefontweight?><?php echo $salessubheadlinefontstyle?><?php echo $salessubheadlineletterspacing?>}

<?php $salesheadlinefontsize = ($postcustom['_launchpage_headlinefontsize']) ? 'font-size:'.$postcustom['_launchpage_headlinefontsize'][0].'px;' : ''; ?>
<?php $salesheadlinefontweight=($postcustom['_launchpage_headlinefontweight'])?'font-weight:'.$postcustom['_launchpage_headlinefontweight'][0].';':''; ?>
<?php $salesheadlinefontstyle=($postcustom['_launchpage_headlinefontstyle'])?'font-style:'.$postcustom['_launchpage_headlinefontstyle'][0].';':''; ?>
<?php $salesheadlineletterspacing=($postcustom['_launchpage_headlineletterspacing'])?'letter-spacing:'.$postcustom['_launchpage_headlineletterspacing'][0].';':''; ?>
<?php $salesheadlinebelowvideofontsize = ($postcustom['_launchpage_headlinebelowvideofontsize']) ? 'font-size:'.$postcustom['_launchpage_headlinebelowvideofontsize'][0].'px;' : ''; ?>
<?php $salesheadlinebelowvideofontweight=($postcustom['_launchpage_headlinebelowvideofontweight'])?'font-weight:'.$postcustom['_launchpage_headlinebelowvideofontweight'][0].';':''; ?>
<?php $salesheadlinebelowvideofontstyle=($postcustom['_launchpage_headlinebelowvideofontstyle'])?'font-style:'.$postcustom['_launchpage_headlinebelowvideofontstyle'][0].';':''; ?>
<?php $salesheadlinebelowvideoletterspacing=($postcustom['_launchpage_headlinebelowvideoletterspacing'])?'letter-spacing:'.$postcustom['_launchpage_headlinebelowvideoletterspacing'][0].';':''; ?>
.launchtopheadline{ <?php echo $salesheadlinefontsize?><?php echo $salesheadlinefontweight?><?php echo $salesheadlinefontstyle?><?php echo $salesheadlineletterspacing?> }
.launchbottomheadline{ <?php echo $salesheadlinebelowvideofontsize?><?php echo $salesheadlinebelowvideofontweight?><?php echo $salesheadlinebelowvideofontstyle?><?php echo $salesheadlinebelowvideoletterspacing?>  }
.sidebar-headline{color:#<?php echo $sidebarheadlinecolor?> !important;<?php echo $sidebarheadlinecss?>;}

#sidebarvideoboximage{height:163px;width:323px;background-image:url(<?php echo ''.$postcustom['_optthemes_images'][0].'' ?>);}	

#maintopbar{background-color:#<?php echo stripcslashes($postcustom['_optthemes_headercolor'][0]); ?>;}
#footer{background-color:#<?php echo stripcslashes($postcustom['_optthemes_footercolor'][0]); ?>;}

a {color:#<?php echo ($postcustom['_launchpage_pagehyperlinkcolor']) ? stripcslashes($postcustom['_launchpage_pagehyperlinkcolor'][0]) : '0000ff'; ?>;text-decoration:none;}

<?php echo ($postcustom['_launchpage_activateheadertext']) ? "#headertext { color:#".$postcustom['_launchpage_headertextcolor'][0].";  }" : ""; ?>

<?php echo ($postcustom['_optthemes_activateheadertext']) ? "#headertext { color:#".$postcustom['_optthemes_headertextcolor'][0].";  }" : ""; ?>

<?php echo ($postcustom['_optthemes_activatesidebararrow']) ? ".sidebar-arrow{margin:0px auto;background-image:url(".get_bloginfo('template_directory')."/images/arrows/".$postcustom['_optthemes_sidebararrowstyle'][0].".gif);background-position:center;width:290px;height:99px;background-repeat:no-repeat;}" : ""; ?>

<?php echo !empty($postcustom['_launchpage_headlineabovevideofont']) ? '.launchtopheadline{color:#'.$postcustom['_launchpage_headlineabovevideofontcolor'][0].';'.$launch_abovevideocss.';}' : ''; ?>
<?php echo !empty($postcustom['_launchpage_headlinebelowvideofont']) ? '.launchbottomheadline{color:#'.$postcustom['_launchpage_headlinebelowvideofontcolor'][0].';'.$launch_belowvideocss.';}' : ''; ?>

<?php 
// Header Nav Style
switch($postcustom['_launchpage_headernavstyle'][0]){
	// page templates
	case 'style1';
		echo '.launch1navbar li {
		font-size:15px;
		letter-spacing:0.15em;
		padding:0 20px 0 25px;
		text-transform:uppercase;
		font-weight:normal;
		}';
	break;
	case 'style2';
		echo '.launch1navbar li {
font-size:16px;
letter-spacing:0em;
padding:0 18px 0 18px;
font-weight:bold;
}';
	break;
	case 'style3';
		echo '.launch1navbar li {
font-size:14px;
letter-spacing:0em;
padding:0 18px 0 18px;
font-weight:bold;
}';
	break;
}

// Main Body Text Font
$mainbodytextfont = stripcslashes($postcustom['_launchpage_mainbodytextfont'][0]);
$launchbgtiling = ($postcustom['_launchpage_launchbgimgtiling']) ? stripcslashes($postcustom['_launchpage_launchbgimgtiling'][0]) : 'repeat';
$bgimgurl = ($postcustom['_launchpage_launchbgimgurl']) ? 'url('.stripcslashes($postcustom['_launchpage_launchbgimgurl'][0]).');background-repeat:'.$launchbgtiling : 'none';
?>

#launchbk p {font-family:<?php echo $mainbodytextfont?>;}
#launchbk h2{font-family:<?php echo $mainbodytextfont?>;}
#launchbk h3{font-family:<?php echo $mainbodytextfont?>;}
#launchbk h1{font-family:<?php echo $mainbodytextfont?>;}
body{font-family:<?php echo $mainbodytextfont?>;background-image:<?php echo $bgimgurl?>;}
<?php echo ($postcustom['_launchpage_showcommentcalltoaction']) ? '' : '#launchcommentslink { display:none; }'; ?>
<?php echo ($postcustom['_optthemes_showcommentcalltoaction']) ? '#launchcommentslink { display:block; }' : ''; ?>
<?php // Bullet Style
$bulletstyle = stripcslashes($postcustom['_optthemes_bulletstyle'][0]);
echo "#main li{background-image: url(".get_bloginfo('template_directory')."/images/".$bulletstyle.".png)}";
?>
<?php // Bullet Style
$bulletstyle = stripcslashes($postcustom['_optthemes_bulletstyle'][0]);
echo "#main-lower li{background-image: url(".get_bloginfo('template_directory')."/images/".$bulletstyle.".png) !important;}";
?>

#main li{background-position:0 2px;padding-left:39px;}

.launch1navbar a.CurrentLinkActiveClass{color:#<?php echo $currentsalespagenavcolor?>}

<?php echo ($postcustom['_launchpage_hidemembermoduletitle']) ? '.moduletitle { display:none; }' : ''; ?>
<?php echo ($postcustom['_launchpage_hidemembercontenttitle']) ? '.contenttitle1,.contenttitle1ns { display:none; }' : ''; ?>
</style>

<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/cufon-yui.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/qtobject.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/flowplayer-3.2.10.min.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/flowplayer.ipad-3.2.9.min.js"></script>

<script>
function clearText(thefield){
if (thefield.defaultValue==thefield.value)
thefield.value = ""
}
</script>

<?php // Facebook Share Image Sales Letter
echo ($postcustom['_launchpage_fbshareimg']) ? '<meta property="og:image" content="'.$postcustom['_launchpage_fbshareimg'][0].'">' : ""; ?>

<?php // Facebook Description Sales Letter
echo ($postcustom['_launchpage_fbdesc']) ? '<meta property="og:description" content="'.$postcustom['_launchpage_fbdesc'][0].'" />' : ""; ?>

<?php // Facebook Share Image Sales Letter
echo ($postcustom['_optthemes_fbshareimg']) ? '<meta property="og:image" content="'.$postcustom['_optthemes_fbshareimg'][0].'">' : ""; ?>

<?php // Facebook Description Squeeze
echo ($postcustom['_optthemes_fbdesc']) ? '<meta property="og:description" content="'.$postcustom['_optthemes_fbdesc'][0].'" />' : ""; ?>

<meta property="og:title" content="<?php echo op_seo_title(); ?>" />
<meta property="og:site_name" content="<?php bloginfo('name'); ?>"/>
<meta property="fb:app_id" content="<?php echo $facebookappid; ?>">

<?php $seoheadergooglewebcode = !empty($postcustom['_seo_headergooglewebcode']) ? stripslashes($postcustom['_seo_headergooglewebcode'][0]) : ''; ?>
<?php echo $seoheadergooglewebcode; ?>

<?php // custom tracking code
echo ($customtrackingcodeheader) ? eval('?>'.stripcslashes(stripslashes($customtrackingcodeheader))) : ""; ?>



<?php if($customcss) {
echo '<style>'; 
echo stripslashes($customcss); 
echo '</style>';}
?>

<?php if($postcustom['_seo_onpagecustomcss']) {
echo '<style>'; 
echo stripslashes($postcustom['_seo_onpagecustomcss'][0]); 
echo '</style>';} 
?>

</head>
<body>
<div id="maintopbar"></div>
