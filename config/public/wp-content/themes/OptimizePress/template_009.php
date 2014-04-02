<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<?php /*
Template Name: Squeeze 09
*/
    $postcustom = get_post_custom($post->ID);
    $templatedir = get_bloginfo('template_directory');

($postcustom['_optthemes_disablecookiecheck']) ? include 'inc_check_user_cookie.php' : '';
($postcustom['_optthemes_disablecookiecheck']) ? include 'inc_squeeze_cookie_check.php' : ''; // Enable/Disable Cookie Check 
?>

<?php get_header();?>
<?php include ("exit-pop.php"); ?>

<?php $mainbodytextfont = stripcslashes($postcustom['_optthemes_mainbodytextfont'][0]); // Add Main Body Font ?>

<style>
body{font-family:<?php echo $mainbodytextfont?>;}
<?php if($postcustom['_optthemes_shownavbar']) { ?>
#membersnavbar{<?php echo ($squeezepagenavbarheight) ? 'height:'.$squeezepagenavbarheight.'px' : ""; ?>;<?php echo ($squeezepagenavbaralignment) ? 'text-align:'.stripslashes($squeezepagenavbaralignment).';' : ""; ?>}

#membersnavbarbk{
background: #<?php echo ($squeezepagenavbarmainbggradienttopcolor) ? $squeezepagenavbarmainbggradienttopcolor : ""; ?>;
	background-image: -moz-linear-gradient(100% 100% 90deg, #<?php echo ($squeezepagenavbarmainbggradientbotcolor) ? $squeezepagenavbarmainbggradientbotcolor : ""; ?>, #<?php echo ($squeezepagenavbarmainbggradienttopcolor) ? $squeezepagenavbarmainbggradienttopcolor : ""; ?>);
	background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#<?php echo ($squeezepagenavbarmainbggradienttopcolor) ? $squeezepagenavbarmainbggradienttopcolor : ""; ?>), to(#<?php echo ($squeezepagenavbarmainbggradientbotcolor) ? $squeezepagenavbarmainbggradientbotcolor : ""; ?>));
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo ($squeezepagenavbarmainbggradienttopcolor) ? $squeezepagenavbarmainbggradienttopcolor : ""; ?>, endColorstr=#<?php echo ($squeezepagenavbarmainbggradientbotcolor) ? $squeezepagenavbarmainbggradientbotcolor : ""; ?>);
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo ($squeezepagenavbarmainbggradienttopcolor) ? $squeezepagenavbarmainbggradienttopcolor : ""; ?>, endColorstr=#<?php echo ($squeezepagenavbarmainbggradientbotcolor) ? $squeezepagenavbarmainbggradientbotcolor : ""; ?>)";
	border-bottom:<?php echo ($squeezepagenavbarbottomlinethickness) ? $squeezepagenavbarbottomlinethickness : ""; ?>px solid #<?php echo ($squeezepagenavbarbottomlinecolor) ? $squeezepagenavbarbottomlinecolor : ""; ?>;<?php echo ($squeezepagenavbarheight) ? 'height:'.$squeezepagenavbarheight.'px' : ""; ?>;
}

#access a {color:#<?php echo ($squeezepagenavbartextcolor) ? $squeezepagenavbartextcolor : ""; ?>;text-shadow:0 1px 0 #<?php echo ($squeezepagenavbartextshadow) ? $squeezepagenavbartextshadow : ""; ?>;<?php echo ($squeezepagenavbarfontw8) ? 'font-weight:'.$squeezepagenavbarfontw8 : ""; ?>;<?php echo ($squeezepagenavbarheight) ? 'line-height:'.$squeezepagenavbarheight.'px' : ""; ?>;}

#access li:hover > a,
#access ul ul :hover > a {
	background: #<?php echo ($squeezepagenavbarmainbggradientbotcolor) ? $squeezepagenavbarmainbggradientbotcolor : ""; ?>;
	color: #<?php echo ($squeezepagenavbartexthovercolor) ? $squeezepagenavbartexthovercolor : ""; ?>;
	background-image: -moz-linear-gradient(100% 100% 90deg, #<?php echo ($squeezepagenavbarmainbggradienthoverbotcolor) ? $squeezepagenavbarmainbggradienthoverbotcolor : ""; ?>, #<?php echo ($squeezepagenavbarmainbggradienthovertopcolor) ? $squeezepagenavbarmainbggradienthovertopcolor : ""; ?>);
	background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#<?php echo ($squeezepagenavbarmainbggradienthovertopcolor) ? $squeezepagenavbarmainbggradienthovertopcolor : ""; ?>), to(#<?php echo ($squeezepagenavbarmainbggradienthoverbotcolor) ? $squeezepagenavbarmainbggradienthoverbotcolor : ""; ?>));
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo ($squeezepagenavbarmainbggradienthovertopcolor) ? $squeezepagenavbarmainbggradienthovertopcolor : ""; ?>, endColorstr=#<?php echo ($squeezepagenavbarmainbggradienthoverbotcolor) ? $squeezepagenavbarmainbggradienthoverbotcolor : ""; ?>);
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo ($squeezepagenavbarmainbggradienthovertopcolor) ? $squeezepagenavbarmainbggradienthovertopcolor : ""; ?>, endColorstr=#<?php echo ($squeezepagenavbarmainbggradienthoverbotcolor) ? $squeezepagenavbarmainbggradienthoverbotcolor : ""; ?>)";
	text-shadow:0 1px 0 #<?php echo ($squeezepagenavbartexthovercolorshadow) ? $squeezepagenavbartexthovercolorshadow : ""; ?>;
	font-size:<?php echo ($squeezepagenavbarfontsize) ? $squeezepagenavbarfontsize : ""; ?>px;
}


#access ul ul a {
	background:#<?php echo ($squeezepagenavbarsubbggradientbotcolor) ? $squeezepagenavbarsubbggradientbotcolor : ""; ?>;
    color: #<?php echo ($squeezepagenavbarsubtextcolor) ? $squeezepagenavbarsubtextcolor : ""; ?>;
	background-image: -moz-linear-gradient(100% 100% 90deg, #<?php echo ($squeezepagenavbarsubbggradientbotcolor) ? $squeezepagenavbarsubbggradientbotcolor : ""; ?>, #<?php echo ($squeezepagenavbarsubbggradienttopcolor) ? $squeezepagenavbarsubbggradienttopcolor : ""; ?>);
	background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#<?php echo ($squeezepagenavbarsubbggradienttopcolor) ? $squeezepagenavbarsubbggradienttopcolor : ""; ?>), to(#<?php echo ($squeezepagenavbarsubbggradientbotcolor) ? $squeezepagenavbarsubbggradientbotcolor : ""; ?>));
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo ($squeezepagenavbarsubbggradienttopcolor) ? $squeezepagenavbarsubbggradienttopcolor : ""; ?>, endColorstr=#<?php echo ($squeezepagenavbarsubbggradientbotcolor) ? $squeezepagenavbarsubbggradientbotcolor : ""; ?>);
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo ($squeezepagenavbarsubbggradienttopcolor) ? $squeezepagenavbarsubbggradienttopcolor : ""; ?>, endColorstr=#<?php echo ($squeezepagenavbarsubbggradientbotcolor) ? $squeezepagenavbarsubbggradientbotcolor : ""; ?>)";
	
	text-shadow:0 1px 0 #<?php echo ($squeezepagenavbarsubtextshadow) ? $squeezepagenavbarsubtextshadow : ""; ?>;	
}

#access ul ul{<?php echo ($squeezepagenavbarheight) ? 'top:'.$squeezepagenavbarheight.'px' : ""; ?>}

#access .menu-header, div.menu{font-size:<?php echo ($squeezepagenavbarfontsize) ? $squeezepagenavbarfontsize : ""; ?>px}

#access ul li.current-menu-item > a{
font-size:<?php echo ($squeezepagenavbarfontsize) ? $squeezepagenavbarfontsize : ""; ?>px;
padding:0 15px;
}
#access .menu-header li, div.menu li{font-size:<?php echo ($squeezepagenavbarfontsize) ? $squeezepagenavbarfontsize : ""; ?>px;}
<?php } ?>
</style> 


<!--CODE FOR NEW HEADER!-->
<?php if($postcustom['_optthemes_shownavbar']) { ?>

<div id="membersnavbarbk">
<div id="membersnavbar">
<div id="access">
<?php wp_nav_menu(array('theme_location' => 'squeeze_menu', 'container_class' => 'menu-header')); ?>
</div>
</div>
</div>

<?php } ?>
<!--CODE FOR NEW HEADER!-->

<div id="wrapper">

<div id="mainouter">

<div id="main-headlines">
<?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '<script>utmx_section("Pre-Headline")</script>' : ''; ?><?php echo !empty($postcustom['_optthemes_preheadline']) ? '<h2 class="main-preheadline">'. stripcslashes($postcustom['_optthemes_preheadline'][0]) .'</h2>' :  ""; ?><?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '</noscript>' : ''; ?>

<?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '<script>utmx_section("Main Headline")</script>' : ''; ?><?php echo !empty($postcustom['_optthemes_headline']) ? '<h1 class="main-headline">'. stripcslashes($postcustom['_optthemes_headline'][0]) .' </h1>' :  ""; ?><?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '</noscript>' : ''; ?>

<?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '<script>utmx_section("Sub-Headline")</script>' : ''; ?><?php echo !empty($postcustom['_optthemes_subheadline']) ? '<h2 class="main-postheadline">'. stripcslashes($postcustom['_optthemes_subheadline'][0]) .'</h2>' :  ""; ?><?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '</noscript>' : ''; ?>
</div>
    
  <div id="main">





<div class="main-bottom">

  <!-- Start Share bar-->
  <?php $thesharelink = ($postcustom['_optthemes_customshareurl'][0]!="") ? $postcustom['_optthemes_customshareurl'][0] : get_permalink($postcustom['_optthemes_page2share'][0]); ?>
  
    <?php if($postcustom['_optthemes_activatesocialmedia']) { ?>

		<div id="socialelements-media" style="padding-bottom:15px;">

            <div id="sharebarnew2">
            <div id="sharebarnew-text"><img src="<?php echo ($postcustom['_optthemes_socialmediacalltoactiontext']) ? $templatedir.'/images/share/sharetext-'.$postcustom['_optthemes_socialmediacalltoactiontext'][0].'.png' : ''; ?>" style="border:0;"></div>
          
             <div id="sharebarnew-fb"><?php echo ($postcustom['_optthemes_facebookshare']) ? '<a target="_blank" href="http://www.facebook.com/sharer.php?u='.$thesharelink.'&t='.$postcustom['_optthemes_facebookshare'][0].'"><img src="'.$templatedir.'/images/'.$postcustom['_optthemes_socialmeduabutton'][0].'fbsmall.png" border="0" /></a>' : ''; ?></div>    
            <div id="sharebarnew-twitter"><?php echo ($postcustom['_optthemes_twitterurl']) ? '<a target="_blank" href="http://twitter.com/home?status='.$postcustom['_optthemes_twitterurl'][0].' '.$thesharelink.'"><img src="'.$templatedir.'/images/'.$postcustom['_optthemes_socialmeduabutton'][0].'twittersmall.png" border="0" /></a>' : ''; ?></div>
            <div class="aclear"></div>
            </div><!--close sharebar outer-->
            
		</div>
        
<?php } ?>

    <!--End Share Bar-->


<div id="main-bullets">

              <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
                      <?php endwhile; ?>
                      
                      
                      


</div>
<!--Close main-bullets-->


<!--DOUBLE OPTIN START-->

<?php if($postcustom['_optthemes_activedoubleoptin']) {  ?>
<div style="width:300px;margin:0px auto;padding-bottom:15px;">

<?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '<script>utmx_section("Optin Box Headline")</script>' : ''; ?><?php echo !empty($postcustom['_optthemes_sidebarheadline']) ? '<div class="sidebar-headline">'.stripcslashes($postcustom['_optthemes_sidebarheadline'][0]).'</div>' :  ""?><?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '</noscript>' : ''; ?>

<?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '<script>utmx_section("Optin Box Text")</script>' : ''; ?><?php echo !empty($postcustom['_optthemes_sidebartext']) ? '<div class="sidebar-text">'.stripcslashes($postcustom['_optthemes_sidebartext'][0]).'</div>' :  ""?><?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '</noscript>' : ''; ?>

<form action="<?php echo !empty($postcustom['_optthemes_optinformurl']) ? stripcslashes($postcustom['_optthemes_optinformurl'][0]) : ""?>" method="post">

<div class="sidebar-boxes">

<?php $namefield_name = !empty($postcustom['_optthemes_optinname']) ? stripcslashes($postcustom['_optthemes_optinname'][0]) : "" ?>
<?php $emailfield_name = !empty($postcustom['_optthemes_optinemail']) ? stripcslashes($postcustom['_optthemes_optinemail'][0]) : "" ?>

<?php $name_init = !empty($postcustom['_optthemes_optinnametext']) ? 'value="'.stripcslashes($postcustom['_optthemes_optinnametext'][0]).'" name="'.$namefield_name.'" onblur="if (this.value == \'\') {this.value = \''.stripcslashes($postcustom['_optthemes_optinnametext'][0]).'\';}" onfocus="if (this.value == \''.stripcslashes($postcustom['_optthemes_optinnametext'][0]).'\') {this.value = \'\';}"' : ' value="Enter your name..." name="'.$namefield_name.'" onblur="if (this.value == \'\') {this.value = \'Enter your name...\';}" onfocus="if (this.value == \'Enter your name...\') {this.value = \'\';}"';
$email_init = !empty($postcustom['_optthemes_optinemailtext']) ? 'value="'.stripcslashes($postcustom['_optthemes_optinemailtext'][0]).'" name="'.$emailfield_name.'" onblur="if (this.value == \'\') {this.value = \''.stripcslashes($postcustom['_optthemes_optinemailtext'][0]).'\';}" onfocus="if (this.value == \''.stripcslashes($postcustom['_optthemes_optinemailtext'][0]).'\') {this.value = \'\';}"' : ' value="Enter your email..." name="'.$emailfield_name.'" onblur="if (this.value == \'\') {this.value = \'Enter your email...\';}" onfocus="if (this.value == \'Enter your email...\') {this.value = \'\';}"';
?>

<?php echo !empty($postcustom['_optthemes_optinnameshow']) ? '<input id="'.$namefield_name.'" class="text" type="text" size="20" '.$name_init.' />' : ""; ?>

<?php echo !empty($postcustom['_optthemes_optinemailshow']) ? '<input id="'.$emailfield_name.'" class="text" type="text" size="20" '.$email_init.' />' : ""; ?>

<?php $extra = 1; 
while($extra<=5) {
	$value_init = !empty($postcustom['_optthemes_extra'.$extra.'value']) ? 'value="'.stripcslashes($postcustom['_optthemes_extra'.$extra.'value'][0]).'" onblur="if (this.value == \'\') {this.value = \''.stripcslashes($postcustom['_optthemes_extra'.$extra.'value'][0]).'\';}" onfocus="if (this.value == \''.stripcslashes($postcustom['_optthemes_extra'.$extra.'value'][0]).'\') {this.value = \'\';}"' : '';
	echo !empty($postcustom['_optthemes_extra'.$extra.'ID']) ? '<input name="'.stripcslashes($postcustom['_optthemes_extra'.$extra.'ID'][0]).'" id="'.stripcslashes($postcustom['_optthemes_extra'.$extra.'ID'][0]).'" class="text" type="text" size="20" '.$value_init.' />' : "";
$extra++;	
}
?>

</div>

<?php echo !empty($postcustom['_optthemes_webformhiddenhtml']) ? stripcslashes(eval('?>'.htmlspecialchars_decode($postcustom['_optthemes_webformhiddenhtml'][0]))) : ""; ?>

<div class="sidebar-button">
<center><input class="button1" id="submit_image_5f17aab77d6c" type="image" width="268" src="<?php echo stripcslashes($postcustom['_optthemes_buttonselect'][0]); ?>" name="submit" value="Get Instant Access"/></center>
</div>

<?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '<script>utmx_section("Optin Box Spam Notice")</script>' : ''; ?><?php echo !empty($postcustom['_optthemes_spamnoticetext']) ? '<div class="sidebar-padlock">'.stripcslashes($postcustom['_optthemes_spamnoticetext'][0]).'</div>' :  ""; ?><?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '</noscript>' : ''; ?>

</form>

</div>

<?php } // End Active Double Optin ?>

<!--DOUBLE OPTIN END-->

<!--START Comments Section-->

<?php if($postcustom['_optthemes_activatecomments']) { ?>
<div id="launchcommentslink">
<div id="launchcommentsarrow"></div>
<?php echo ($postcustom['_optthemes_commentscalltoactiontext']) ? '<div id="launchcommentstext">'.$postcustom['_optthemes_commentscalltoactiontext'][0].'</div>' : ''; ?>
</div>
<?php } ?>

<div id="launchcommentsblock">

<?php 
if($postcustom['_optthemes_activatecomments']) {
	switch($postcustom['_optthemes_commentssystem'][0]) {
		case "Wordpress" : { ?>
<div id="wpcomments">

<div class="commenticon"></div><div class="commenttitle"><h2><?php echo ($postcustom['_optthemes_wpcommentstitle']) ? $postcustom['_optthemes_wpcommentstitle'][0] : 'Leave A Reply'; ?> (<?php comments_number('No comments', 'One comment', '% comments'); ?>    so far)</h2></div><div class="aclear"></div><div class="aclear"></div>

<?php comments_template(); // Get wp-comments.php template ?>

</div>
		<?php break; }
        case "Facebook" : { ?>
<div id="fbcomments">

<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php echo $thesharelink; ?>" show_faces="true" send="true" width="610" font=""></fb:like>
<div id="fb-root" style="padding-top:8px;"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=<?php echo $facebookappid; ?>";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-comments" data-href="<?php echo $thesharelink; ?>" data-num-posts="<?php echo ($postcustom['_optthemes_fbcommentnum']) ? $postcustom['_optthemes_fbcommentnum'][0] : '20'; ?>" data-width="610" publish_feed="true"></div>

</div>

		<?php break; }
        case "Both" : { ?>
        <?php if($postcustom['_optthemes_commentsorder'][0]=="fbwp") : ?>
<div id="fbcomments">
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php echo $thesharelink; ?>" show_faces="true" send="true" width="610" font=""></fb:like>
<div id="fb-root" style="padding-top:8px;"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=<?php echo $facebookappid; ?>";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-comments" data-href="<?php echo $thesharelink; ?>" data-num-posts="<?php echo ($postcustom['_optthemes_fbcommentnum']) ? $postcustom['_optthemes_fbcommentnum'][0] : '20'; ?>" data-width="610" publish_feed="true"></div>


</div>
<div id="wpcomments">

<div class="commenticon"></div><div class="commenttitle"><h2><?php echo ($postcustom['_optthemes_wpcommentstitle']) ? $postcustom['_optthemes_wpcommentstitle'][0] : 'Leave A Reply'; ?> (<?php comments_number('No comments', 'One comment', '% comments'); ?>    so far)</h2></div><div class="aclear"></div><div class="aclear"></div>

<?php comments_template(); // Get wp-comments.php template ?>

</div>
		<?php elseif($postcustom['_optthemes_commentsorder'][0]=="wpfb") : ?>
<div id="wpcomments">

<div class="commenticon"></div><div class="commenttitle"><h2><?php echo ($postcustom['_optthemes_wpcommentstitle']) ? $postcustom['_optthemes_wpcommentstitle'][0] : 'Leave A Reply'; ?> (<?php comments_number('No comments', 'One comment', '% comments'); ?>    so far)</h2></div><div class="aclear"></div><div class="aclear"></div>

<?php comments_template(); // Get wp-comments.php template ?>

</div>
<div id="fbcomments">
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php echo $thesharelink; ?>" show_faces="true" send="true" width="610" font=""></fb:like>
<div id="fb-root" style="padding-top:8px;"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=<?php echo $facebookappid; ?>";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-comments" data-href="<?php echo $thesharelink; ?>" data-num-posts="<?php echo ($postcustom['_optthemes_fbcommentnum']) ? $postcustom['_optthemes_fbcommentnum'][0] : '20'; ?>" data-width="610" publish_feed="true"></div>


</div>
		<?php endif; ?>

<?php break; } 
    } //end switch 
} //end if comment enabled ?>
</div>
<!--close Comments Section-->

</div><!--Close main-bottom-->

</div><!--Close main-->


<div id="sidebar">
<script type="text/javascript">
function show_alert() {
var msg = "<?php echo $postcustom['_optthemes_js1message'][0]; ?>";
alert(msg);
}
</script>

<?php if(!empty($postcustom['_optthemes_activatevideo'])){ ?>

<div id="sidebarvideobox">
<div id="sidebarvideoboximage">
<img src="<?php echo get_bloginfo('template_directory'); ?>/images/test-video-normal.png" width="323" height="163" <?php echo ($postcustom['_optthemes_js1message']) ? ' OnClick="show_alert()"' : ''; ?>" style="cursor:pointer;" onMouseOver="this.src='<?php echo get_bloginfo('template_directory'); ?>/images/test-video-down.png'" onMouseOut="this.src='<?php echo get_bloginfo('template_directory'); ?>/images/test-video-normal.png'" />
</div>

</div>

<div style="padding-top:10px;"></div>
<?php } ?>


<!--Start Custom Optin Code-->
<?php if($postcustom['_optthemes_activatecustomoptinform']) { ?>
	<?php echo !empty($postcustom['_optthemes_customoptincode']) ? stripcslashes(eval('?>'.htmlspecialchars_decode($postcustom['_optthemes_customoptincode'][0]))) : ""; ?>
<?php } else { ?>
<!--Close Custom Optin Code-->



<?php echo ($postcustom['_optthemes_activatesidebararrow']) ? '<center><img src="'.$templatedir.'/images/arrows/'.$postcustom['_optthemes_sidebararrowstyle'][0].'.gif" border="0"></center>' : ''; ?>

<div id="sidebarbox">
<div id="sidebarboxtop"></div>
<div id="sidebarboxbk">

<?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '<script>utmx_section("Optin Box Headline")</script>' : ''; ?><?php echo !empty($postcustom['_optthemes_sidebarheadline']) ? '<div class="sidebar-headline">'.stripcslashes($postcustom['_optthemes_sidebarheadline'][0]).'</div>' :  ""?><?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '</noscript>' : ''; ?>

<?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '<script>utmx_section("Optin Box Text")</script>' : ''; ?><?php echo !empty($postcustom['_optthemes_sidebartext']) ? '<div class="sidebar-text">'.stripcslashes($postcustom['_optthemes_sidebartext'][0]).'</div>' :  ""?><?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '</noscript>' : ''; ?>

<form action="<?php echo !empty($postcustom['_optthemes_optinformurl']) ? stripcslashes($postcustom['_optthemes_optinformurl'][0]) : ""?>" method="post">

<div class="sidebar-boxes">

<?php $namefield_name = !empty($postcustom['_optthemes_optinname']) ? stripcslashes($postcustom['_optthemes_optinname'][0]) : "" ?>
<?php $emailfield_name = !empty($postcustom['_optthemes_optinemail']) ? stripcslashes($postcustom['_optthemes_optinemail'][0]) : "" ?>

<?php // nick 10/29/2010
$name_init = !empty($postcustom['_optthemes_optinnametext']) ? 'value="'.stripcslashes($postcustom['_optthemes_optinnametext'][0]).'" name="'.$namefield_name.'" onblur="if (this.value == \'\') {this.value = \''.stripcslashes($postcustom['_optthemes_optinnametext'][0]).'\';}" onfocus="if (this.value == \''.stripcslashes($postcustom['_optthemes_optinnametext'][0]).'\') {this.value = \'\';}"' : ' value="Enter your name..." name="'.$namefield_name.'" onblur="if (this.value == \'\') {this.value = \'Enter your name...\';}" onfocus="if (this.value == \'Enter your name...\') {this.value = \'\';}"';
$email_init = !empty($postcustom['_optthemes_optinemailtext']) ? 'value="'.stripcslashes($postcustom['_optthemes_optinemailtext'][0]).'" name="'.$emailfield_name.'" onblur="if (this.value == \'\') {this.value = \''.stripcslashes($postcustom['_optthemes_optinemailtext'][0]).'\';}" onfocus="if (this.value == \''.stripcslashes($postcustom['_optthemes_optinemailtext'][0]).'\') {this.value = \'\';}"' : ' value="Enter your email..." name="'.$emailfield_name.'" onblur="if (this.value == \'\') {this.value = \'Enter your email...\';}" onfocus="if (this.value == \'Enter your email...\') {this.value = \'\';}"';
?>

<?php echo !empty($postcustom['_optthemes_optinnameshow']) ? '<input id="'.$namefield_name.'" class="text" type="text" size="20" '.$name_init.' />' : ""; ?>

<?php echo !empty($postcustom['_optthemes_optinemailshow']) ? '<input id="'.$emailfield_name.'" class="text" type="text" size="20" '.$email_init.' />' : ""; ?>



<?php $extra = 1; 
while($extra<=5) {
	$value_init = !empty($postcustom['_optthemes_extra'.$extra.'value']) ? 'value="'.stripcslashes($postcustom['_optthemes_extra'.$extra.'value'][0]).'" onblur="if (this.value == \'\') {this.value = \''.stripcslashes($postcustom['_optthemes_extra'.$extra.'value'][0]).'\';}" onfocus="if (this.value == \''.stripcslashes($postcustom['_optthemes_extra'.$extra.'value'][0]).'\') {this.value = \'\';}"' : '';
	echo !empty($postcustom['_optthemes_extra'.$extra.'ID']) ? '<input name="'.stripcslashes($postcustom['_optthemes_extra'.$extra.'ID'][0]).'" id="'.stripcslashes($postcustom['_optthemes_extra'.$extra.'ID'][0]).'" class="text" type="text" size="20" '.$value_init.' />' : "";
$extra++;	
}
?>

</div>

<?php echo !empty($postcustom['_optthemes_webformhiddenhtml']) ? stripcslashes(eval('?>'.htmlspecialchars_decode($postcustom['_optthemes_webformhiddenhtml'][0]))) : ""; ?>


<div class="sidebar-button">
<center><input class="button1" id="submit_image_5f17aab77d6c" type="image" src="<?php echo stripcslashes($postcustom['_optthemes_buttonselect'][0]); ?>" name="submit" value="Submit Button"/></center>
</div>

<?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '<script>utmx_section("Optin Box Spam Notice")</script>' : ''; ?><?php echo !empty($postcustom['_optthemes_spamnoticetext']) ? '<div class="sidebar-padlock">'.stripcslashes($postcustom['_optthemes_spamnoticetext'][0]).'</div>' :  ""; ?><?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '</noscript>' : ''; ?>

</form>

</div><!--close sidebarboxbk-->

<div id="sidebarboxbottom"></div>

</div><!--close sidebarbox-->

<?php } ?>
<!--Close OptimizePress Optin Code-->


<?php if ( is_active_sidebar( 'sidebar-'.$postcustom['_optthemes_sidebarwidgettoshow'][0] ) ) : ?>
	<div style="padding-left:20px;">
	<?php (($postcustom['_optthemes_sidebarwidgettoshow'][0]!='0') && ($postcustom['_optthemes_sidebarwidgettoshow'][0]!='')) ? dynamic_sidebar( 'sidebar-'.$postcustom['_optthemes_sidebarwidgettoshow'][0] ) : ''; ?>
    </div>
<?php endif; ?>


</div><!--close sidebar-->

<div class="aclear"></div>
</div><!--Close mainouter-->

</div><!--Close wrapper-->

<div id="footer">

<div id="footer-inside">

<?php if(!$postcustom['_optthemes_disabledisclaimermsg']) { // On-Page disabled ?>
<?php if($activatefooterdisclaimermsg) { // if Footer Disclaimer Message Activated ?>
<div id="footer-disclaimer">
<?php echo ($footerdisclaimermsg) ? stripslashes($footerdisclaimermsg) : ""; ?>
</div>
<?php } ?>
<?php } // end On-Page disabled ?>



<?php if($postcustom['_optthemes_showfooterlinks']) { ?>
    <div class="footer-right">
		<?php if($footer_include) { ?>
        <ul>		<?php // Nick 11/12/2010
            function new_nav_menu_items($items) {
                return str_replace('<a', '<a target="_blank"', $items);
            }
            ($footerlinkstarget) ? add_filter( 'wp_list_pages', 'new_nav_menu_items' ) : '';
            ?>
            <?php wp_list_pages("depth=0&sort_column=menu_order&include=".$footer_include."&title_li="); ?>
        </ul>
        <?php } ?>
    </div>
<?php } ?>
<div class="footer-left">Copyright &copy; <?php echo ($footer_text) ? stripslashes($footer_text) : ""; ?>
	<?php echo ($footer_poweredby) ? ( ($footer_afflink) ? '<a href="'.$footer_afflink.'">Powered by OptimizePress</a>' : 'Powered by OptimizePress.' ) : ''; ?>
</div>
<div style="clear:both;"></div>
</div>
</div><!--close footer-->

<?php include ("exit-redirect.php"); ?>

<?php // custom tracking code
echo ($customtrackingcodefooter) ? eval('?>'.stripcslashes(stripslashes($customtrackingcodefooter))) : ""; ?>
<?php echo ($postcustom['_seo_footertrackingjscode']) ? eval('?>'.stripcslashes($postcustom['_seo_footertrackingjscode'][0])) : ""; ?>
<?php wp_footer(); ?>
</body>

<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/combinebottom.js"></script>

<script type="text/javascript">
	Cufon.replace('.main-preheadline', { fontFamily: '<?php echo stripcslashes($postcustom['_optthemes_preheadlinefont'][0]); ?>' });
	Cufon.replace('.main-headline', { fontFamily: '<?php echo stripcslashes($postcustom['_optthemes_headlinefont'][0]); ?>' });
    Cufon.replace('.main-postheadline', { fontFamily: '<?php echo stripcslashes($postcustom['_optthemes_subheadlinefont'][0]); ?>' });	
	Cufon.replace('.main-bottomheadline', { fontFamily: '<?php echo stripcslashes($postcustom['_optthemes_headlinebelowvideofont'][0]); ?>' });
Cufon.replace('.sidebar-headline', { fontFamily: '<?php echo stripcslashes($postcustom['_optthemes_sidebarheadlinefont'][0]); ?>' });
Cufon.replace('#launchcommentstext', { fontFamily: 'Hand Of Sean' });
</script>
</html>