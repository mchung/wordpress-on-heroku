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

$headlinecolor = !empty($postcustom['_optthemes_colorpickerField1']) ? stripcslashes($postcustom['_optthemes_colorpickerField1'][0]) :  "db1f00";
$headlinecolorem = !empty($postcustom['_optthemes_colorpickerField2']) ? stripcslashes($postcustom['_optthemes_colorpickerField2'][0]) :  "215e8e";

$mainbottomheadline = !empty($postcustom['_optthemes_headlinebelowvideomaincolor']) ? stripcslashes($postcustom['_optthemes_headlinebelowvideomaincolor'][0]) :  "DB1F00";
$mainbottomheadlineem = !empty($postcustom['_optthemes_alternativeheadlinebelowvideocolor']) ? stripcslashes($postcustom['_optthemes_alternativeheadlinebelowvideocolor'][0]) :  "db1f00";

$mainpostheadline = !empty($postcustom['_optthemes_subheadlinemaincolor']) ? stripcslashes($postcustom['_optthemes_subheadlinemaincolor'][0]) :  "303030";
$mainpostheadlineem = !empty($postcustom['_optthemes_alternativesubheadlinecolor']) ? stripcslashes($postcustom['_optthemes_alternativesubheadlinecolor'][0]) :  "303030";

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
			// page templates

             default:
                echo '<link href="'.get_bloginfo('template_directory').'/page-style.css" rel="stylesheet" type="text/css">';
            break;
        }
    ?>

    <link rel="pingback" href="<?php echo bloginfo('pingback_url'); ?>" />
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>

<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/cufon-yui.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/qtobject.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/flowplayer-3.2.10.min.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/flowplayer.ipad-3.2.9.min.js"></script>

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
		case "Tahoma": { $preheadlinecss = "letter-spacing:-1px; break"; }
	}
	switch(stripcslashes($postcustom['_optthemes_headlinefont'][0])) {
		case "Arial": { $headlinecss = "letter-spacing:-2px;line-height:32px"; break; }
		case "Impact": { $headlinecss = "letter-spacing:-1px"; break; }
		case "Vegur": { $headlinecss = "letter-spacing:-1px;line-height:35px"; break; }
		case "Georgia": { $headlinecss = "letter-spacing:-2px"; break; }
		case "Tahoma": { $headlinecss = "letter-spacing:-1px; break"; }
	}
	switch(stripcslashes($postcustom['_optthemes_subheadlinefont'][0])) {
		case "Arial": { $postheadlinecss = "letter-spacing:-1px"; break; }
		case "Impact": { $postheadlinecss = "letter-spacing:0px"; break; }
		case "Vegur": { $postheadlinecss = "letter-spacing:-1px"; break; }
		case "Georgia": { $postheadlinecss = "letter-spacing:0px;font-weight:normal"; break; }
		case "Tahoma": { $postheadlinecss = "letter-spacing:-1px; break"; }
	}
	switch(stripcslashes($postcustom['_optthemes_headlinebelowvideofont'][0])) {
		case "Arial": { $bottomheadlinecss = "letter-spacing:-2px;line-height:32px"; break; }
		case "Impact": { $bottomheadlinecss = "letter-spacing:0px"; break; }
		case "Vegur": { $bottomheadlinecss = "letter-spacing:-1px;line-height:35px"; break; }
		case "Georgia": { $bottomheadlinecss = "letter-spacing:-2px"; break; }
		case "Tahoma": { $bottomheadlinecss = "letter-spacing:-1px; break"; }
	}
	switch(stripcslashes($postcustom['_optthemes_sidebarheadlinefont'][0])) {
		case "Arial": { $sidebarheadlinecss = "letter-spacing:-1px;line-height:21px"; break;	}
		case "Impact": { $sidebarheadlinecss = "letter-spacing:-0px;font-weight:normal"; break;	}
		case "Vegur": { $sidebarheadlinecss = "letter-spacing:-1px;font-weight:bold"; break; }
		case "Georgia": { $sidebarheadlinecss = "letter-spacing:0px;font-weight:normal"; break; }
		case "Tahoma": { $sidebarheadlinecss = "letter-spacing:-1px; break"; }
		case "Hand of Sean": { $sidebarheadlinecss = "letter-spacing:0px"; break; }
		case "Arial Narrow": { $sidebarheadlinecss = "letter-spacing:-1px"; break; }
	}
	
	/* Launch Pages Above/Below Video Text Spacing/Setting */
	switch(stripcslashes($postcustom['_launchpage_headlineabovevideofont'][0])) {
		case "Arial": { $launch_abovevideocss = "letter-spacing:-2px;line-height:32px"; break;	}
		case "Impact": { $launch_abovevideocss = "letter-spacing:-1px;font-weight:normal"; break;	}
		case "Vegur": { $launch_abovevideocss = "letter-spacing:-1px;font-weight:bold"; break; }
		case "Georgia": { $launch_abovevideocss = "letter-spacing:-2px;font-weight:bold"; break; }
		case "Tahoma": { $launch_abovevideocss = "letter-spacing:-3px; break"; }
		case "Hand of Sean": { $launch_abovevideocss = "letter-spacing:0px"; break; }
		case "Arial Narrow": { $launch_abovevideocss = "letter-spacing:-1px"; break; }
	}
	switch(stripcslashes($postcustom['_launchpage_headlinebelowvideofont'][0])) {
		case "Arial": { $launch_belowvideocss = "letter-spacing:-2px;line-height:32px"; break;	}
		case "Impact": { $launch_belowvideocss = "letter-spacing:-1px;font-weight:normal"; break;	}
		case "Vegur": { $launch_belowvideocss = "letter-spacing:-1px;font-weight:bold"; break; }
		case "Georgia": { $launch_belowvideocss = "letter-spacing:-2px;font-weight:bold"; break; }
		case "Tahoma": { $launch_belowvideocss = "letter-spacing:-3px; break"; }
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
.main-preheadline{color:#<?php echo $mainpreheadline?> !important;<?php echo $preheadlinecss?>;}
.main-preheadline em{color:#<?php echo $mainpreheadlineem?> !important;<?php echo $preheadlinecss?>;}

.main-headline{color:#<?php echo $headlinecolor?> !important;<?php echo $headlinecss?>;}
.main-headline em{color:#<?php echo $headlinecolorem?> !important;<?php echo $headlinecss?>;}

.main-bottomheadline{color:#<?php echo $mainbottomheadline?> !important;<?php echo $bottomheadlinecss?>;}
.main-bottomheadline em{color:#<?php echo $mainbottomheadlineem?> !important;<?php echo $bottomheadlinecss?>;}

.main-postheadline{color:#<?php echo $mainpostheadline?> !important;<?php echo $postheadlinecss?>;}
.main-postheadline em{color:#<?php echo $mainpostheadlineem?> !important;<?php echo $postheadlinecss?>;}

.sidebar-headline{color:#<?php echo $sidebarheadlinecolor?> !important;<?php echo $sidebarheadlinecss?>;}

#sidebarvideoboximage{height:163px;width:323px;background-image:url(<?php echo ''.$postcustom['_optthemes_images'][0].'' ?>);}	

#maintopbar{background-color:#<?php echo stripcslashes($postcustom['_optthemes_headercolor'][0]); ?>;}
#footer{background-color:#<?php echo stripcslashes($postcustom['_optthemes_footercolor'][0]); ?>;}

a {color:#<?php echo ($postcustom['_launchpage_pagehyperlinkcolor']) ? stripcslashes($postcustom['_launchpage_pagehyperlinkcolor'][0]) : '0000ff'; ?>;text-decoration:none;}

<?php echo ($postcustom['_launchpage_activateheadertext']) ? "#headertext { color:#".$postcustom['_launchpage_headertextcolor'][0].";  }" : ""; ?>

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
<?php // Bullet Style
$bulletstyle = stripcslashes($postcustom['_optthemes_bulletstyle'][0]);
echo "#main li{background-image: url(".get_bloginfo('template_directory')."/images/".$bulletstyle.".png)}";
?>

#main li{background-position:0 2px;padding-left:39px;}

.launch1navbar a.CurrentLinkActiveClass{color:#<?php echo $currentsalespagenavcolor?>}

</style>
    <script>
function clearText(thefield){
if (thefield.defaultValue==thefield.value)
thefield.value = ""
}
</script>

<?php // custom tracking code
echo ($customtrackingcodeheader) ? eval('?>'.stripcslashes(stripslashes($customtrackingcodeheader))) : ""; ?>

<?php $seoheadergooglewebcode = !empty($postcustom['_seo_headergooglewebcode']) ? stripslashes($postcustom['_seo_headergooglewebcode'][0]) : ''; ?>
<?php echo $seoheadergooglewebcode; ?>

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
