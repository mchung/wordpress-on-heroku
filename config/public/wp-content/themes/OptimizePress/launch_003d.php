<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<?php /*
Template Name: Sales Style 3 (Sales Letter Standard) 
*/
?>
<?php     $postcustom = get_post_custom($post->ID);
    $templatedir = get_bloginfo('template_directory');

include 'inc_user_direct_access.php';

($postcustom['_launchpage_disablecookiecheck']) ? include 'inc_pages_links_check.php' : ''; // Enable/Disable Cookie Check 

?>
 
<?php get_header();?>
<?php include ("exit-pop.php"); ?>

<?php if($postcustom['_launchpage_shownavbar']) { ?>
<style>
#membersnavbar {
<?php echo ($salesletterpagenavbarheight) ? 'height:'.$salesletterpagenavbarheight.'px' : "";
?>;
<?php echo ($salesletternavbaralignment) ? 'text-align:'.stripslashes($salesletternavbaralignment).';' : "";
?>
}
#membersnavbarbk {
 background: #<?php echo ($salesletternavbarmainbggradienttopcolor) ? $salesletternavbarmainbggradienttopcolor : "";
?>;
 background-image: -moz-linear-gradient(100% 100% 90deg, #<?php echo ($salesletternavbarmainbggradientbotcolor) ? $salesletternavbarmainbggradientbotcolor : "";
?>, #<?php echo ($salesletternavbarmainbggradienttopcolor) ? $salesletternavbarmainbggradienttopcolor : "";
?>);
 background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#<?php echo ($salesletternavbarmainbggradienttopcolor) ? $salesletternavbarmainbggradienttopcolor : "";
?>), to(#<?php echo ($salesletternavbarmainbggradientbotcolor) ? $salesletternavbarmainbggradientbotcolor : "";
?>));
 filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo ($salesletternavbarmainbggradienttopcolor) ? $salesletternavbarmainbggradienttopcolor : "";
?>, endColorstr=#<?php echo ($salesletternavbarmainbggradientbotcolor) ? $salesletternavbarmainbggradientbotcolor : "";
?>);
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo ($salesletternavbarmainbggradienttopcolor) ? $salesletternavbarmainbggradienttopcolor : ""; ?>, endColorstr=#<?php echo ($salesletternavbarmainbggradientbotcolor) ? $salesletternavbarmainbggradientbotcolor : ""; ?>)";
 border-bottom:<?php echo ($salesletternavbarbottomlinethickness) ? $salesletternavbarbottomlinethickness : "";
?>px solid #<?php echo ($salesletternavbarbottomlinecolor) ? $salesletternavbarbottomlinecolor : "";
?>;
<?php echo ($salesletterpagenavbarheight) ? 'height:'.$salesletterpagenavbarheight.'px' : "";
?>;
}
#access a {
color:#<?php echo ($salesletternavbartextcolor) ? $salesletternavbartextcolor : "";
?>;
text-shadow:0 1px 0 #<?php echo ($salesletternavbartextshadow) ? $salesletternavbartextshadow : "";
?>;
<?php echo ($salesletterpagenavbarfontw8) ? 'font-weight:'.$salesletterpagenavbarfontw8 : "";
?>;
<?php echo ($salesletterpagenavbarheight) ? 'line-height:'.$salesletterpagenavbarheight.'px' : "";
?>
}
#access li:hover > a,  #access ul ul :hover > a {
 background: #<?php echo ($salesletternavbarmainbggradientbotcolor) ? $salesletternavbarmainbggradientbotcolor : "";
?>;
 color: #<?php echo ($salesletternavbartexthovercolor) ? $salesletternavbartexthovercolor : "";
?>;
 background-image: -moz-linear-gradient(100% 100% 90deg, #<?php echo ($salesletternavbarmainbggradienthoverbotcolor) ? $salesletternavbarmainbggradienthoverbotcolor : "";
?>, #<?php echo ($salesletternavbarmainbggradienthovertopcolor) ? $salesletternavbarmainbggradienthovertopcolor : "";
?>);
 background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#<?php echo ($salesletternavbarmainbggradienthovertopcolor) ? $salesletternavbarmainbggradienthovertopcolor : "";
?>), to(#<?php echo ($salesletternavbarmainbggradienthoverbotcolor) ? $salesletternavbarmainbggradienthoverbotcolor : "";
?>));
 filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo ($salesletternavbarmainbggradienthovertopcolor) ? $salesletternavbarmainbggradienthovertopcolor : "";
?>, endColorstr=#<?php echo ($salesletternavbarmainbggradienthoverbotcolor) ? $salesletternavbarmainbggradienthoverbotcolor : "";
?>);
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo ($salesletternavbarmainbggradienthovertopcolor) ? $salesletternavbarmainbggradienthovertopcolor : ""; ?>, endColorstr=#<?php echo ($salesletternavbarmainbggradienthoverbotcolor) ? $salesletternavbarmainbggradienthoverbotcolor : ""; ?>)";
 text-shadow:0 1px 0 #<?php echo ($salesletternavbartexthovercolorshadow) ? $salesletternavbartexthovercolorshadow : "";
?>;
 font-size:<?php echo ($salesletternavbarfontsize) ? $salesletternavbarfontsize : "";
?>px;
}
#access ul ul a {
 background:#<?php echo ($salesletternavbarsubbggradientbotcolor) ? $salesletternavbarsubbggradientbotcolor : "";
?>;
 color: #<?php echo ($salesletternavbarsubtextcolor) ? $salesletternavbarsubtextcolor : "";
?>;
 background-image: -moz-linear-gradient(100% 100% 90deg, #<?php echo ($salesletternavbarsubbggradientbotcolor) ? $salesletternavbarsubbggradientbotcolor : "";
?>, #<?php echo ($salesletternavbarsubbggradienttopcolor) ? $salesletternavbarsubbggradienttopcolor : "";
?>);
 background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#<?php echo ($salesletternavbarsubbggradienttopcolor) ? $salesletternavbarsubbggradienttopcolor : "";
?>), to(#<?php echo ($salesletternavbarsubbggradientbotcolor) ? $salesletternavbarsubbggradientbotcolor : "";
?>));
 filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo ($salesletternavbarsubbggradienttopcolor) ? $salesletternavbarsubbggradienttopcolor : "";
?>, endColorstr=#<?php echo ($salesletternavbarsubbggradientbotcolor) ? $salesletternavbarsubbggradientbotcolor : "";
?>);
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo ($salesletternavbarsubbggradienttopcolor) ? $salesletternavbarsubbggradienttopcolor : ""; ?>, endColorstr=#<?php echo ($salesletternavbarsubbggradientbotcolor) ? $salesletternavbarsubbggradientbotcolor : ""; ?>)";
 text-shadow:0 1px 0 #<?php echo ($salesletternavbarsubtextshadow) ? $salesletternavbarsubtextshadow : "";
?>;
}
#access ul ul {
<?php echo ($salesletterpagenavbarheight) ? 'top:'.$salesletterpagenavbarheight.'px' : "";
?>
}
#access .menu-header, div.menu {
font-size:<?php echo ($salesletternavbarfontsize) ? $salesletternavbarfontsize : "";
?>px
}
#access ul li.current-menu-item > a {
 font-size:<?php echo ($salesletternavbarfontsize) ? $salesletternavbarfontsize : "";
?>px;
	padding:0 15px;
}
#access .menu-header li, div.menu li {
font-size:<?php echo ($salesletternavbarfontsize) ? $salesletternavbarfontsize : "";
?>px;
}
</style>
<?php } ?>
<?php 
if($customcss) {

echo '<style>'; 

echo stripslashes($customcss); 

echo '</style>';}

?>
<?php if($postcustom['_seo_onpagecustomcss']) {

echo '<style>'; 

echo stripslashes($postcustom['_seo_onpagecustomcss'][0]); 

echo '</style>';} 

?>
<?php if($postcustom['_launchpage_shownavbar'] && $postcustom['_launchpage_navbarposition'][0]=="Above Header") { ?>
<div id="membersnavbarbk">
<div id="membersnavbar">
<div id="access">
<?php wp_nav_menu(array('theme_location' => 'sales_menu', 'container_class' => 'menu-header')); ?>
</div>
</div>
</div>
<?php } ?>
<div id="wrapper">
  <?php require(OPTPRESS_INCLUDES . "/var.php"); ?>
  <?php if($postcustom['_launchpage_showheader']) { ?>
  <?php if($launchheader) { ?>
  <?php $launchheader = ($postcustom['_launchpage_pageheaderurl']) ? stripslashes($postcustom['_launchpage_pageheaderurl'][0]) : $launchheader; ?>
  <?php $launchheaderlogo = ($postcustom['_launchpage_pagelogo']) ? stripslashes($postcustom['_launchpage_pagelogo'][0]) : $launchheaderlogo; ?>
  <?php $header_fullwidth = ($postcustom['_launchpage_pageheaderurlfullwidth']) ? stripslashes($postcustom['_launchpage_pageheaderurlfullwidth'][0]) : $header_fullwidth; ?>
  <?php $header_height = ($postcustom['_launchpage_pageheader_height']) ? stripslashes($postcustom['_launchpage_pageheader_height'][0]) : $header_height; ?>
  <?php $logo_align = ($postcustom['_launchpage_pagelogo_align']) ? stripslashes($postcustom['_launchpage_pagelogo_align'][0]) : $logo_align; ?>
  <style>

	    #launchheader{<?php echo ($header_height) ? "height:".$header_height."px" : ""; ?>;}

	.launchheaderlogo{background-position:<?php echo $logo_align; ?> center;background-image:url(<?php echo $launchheaderlogo; ?>);<?php echo ($header_height) ? "height:".$header_height."px" : ""; ?>;width:977px;background-repeat:no-repeat}

#headertext{<?php echo ($header_height) ? "line-height:".$header_height."px" : ""; ?>;text-align:center;width:977px;<?php echo ($header_height) ? "height:".$header_height."px" : ""; ?>;font-size:<?php echo ($postcustom['_launchpage_headertextsize']) ? $postcustom['_launchpage_headertextsize'][0].'px' : '48px'; ?>;letter-spacing:-2px;font-weight:normal;}





    </style>
  <div id="launchheader"<?php echo ($postcustom['_launchpage_showheaderhyperlink']) ? ' onclick="location.href=\''.$postcustom['_launchpage_headerhyperlink'][0].'\';" style="cursor: pointer;"' : ''; ?>><?php echo ($postcustom['_launchpage_showlogo']) ? '<div class="launchheaderlogo"></div>' : ''; ?>
    <?php if($postcustom['_launchpage_activateheadertext']) { echo ($postcustom['_launchpage_headertext']) ? '<div id="headertext">'.stripslashes($postcustom['_launchpage_headertext'][0]).'</div>' : ''; } ?>
  </div>
  <?php } ?>
  <?php } ?>
  <?php if($postcustom['_launchpage_disablecookiecheck']) { ?>
  <?php if($postcustom['_launchpage_showheaderlinks']) { ?>
  <?php } else { ?>
  <div style="display:none;">
    <?php } ?>
    <div id="launchnavbar">
      <?php include ("inc_pages_links.php");?>
    </div>
    <?php if($postcustom['_launchpage_showheaderlinks']) { ?>
    <?php } else { ?>
  </div>
  <?php } ?>
  <?php } ?>
  
  <?php if($postcustom['_launchpage_shownavbar'] && $postcustom['_launchpage_navbarposition'][0]=="Below Header") { ?>
<div id="membersnavbarbk">
<div id="membersnavbar">
<div id="access">
<?php wp_nav_menu(array('theme_location' => 'sales_menu', 'container_class' => 'menu-header')); ?>
</div>
</div>
</div>
<?php } ?>

  <div id="launchheaderbottom"></div>
  <div id="launchbk"> 
    
    <!-- Headlines --> 
    <?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '<script>utmx_section("Pre-Headline")</script>' : ''; ?><?php echo !empty($postcustom['_launchpage_preheadline']) ? '<h2 class="sales-preheadline">'.stripcslashes($postcustom['_launchpage_preheadline'][0]).'</h2>' :  ""; ?><?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '</noscript>' : ''; ?> <?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '<script>utmx_section("Main Headline")</script>' : ''; ?><?php echo ($postcustom['_launchpage_headlineabovevideotext']) ? '<h1 class="launchtopheadline">'.$postcustom['_launchpage_headlineabovevideotext'][0].'</h1>' : ''; ?><?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '</noscript>' : ''; ?> <?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '<script>utmx_section("Sub Headline")</script>' : ''; ?><?php echo !empty($postcustom['_launchpage_subheadline']) ? '<h2 class="sales-postheadline">'. stripcslashes($postcustom['_launchpage_subheadline'][0]) .'</h2>' :  ""; ?><?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '</noscript>' : ''; ?> <?php echo ($postcustom['_launchpage_headlineabovevideotext']) ? '<div style="width:10px;margin:0px auto;padding-top:10px;"></div>' : ''; ?> 
    <!-- Close Headlines --> 
    
    <!--open launchinnertop-->
    
    <?php if($postcustom['_launchpage_contentblockabovevideo'] && $postcustom['_launchpage_alertbartext']) { ?>
    <div id="launchinnertop"> <?php echo nl2br($postcustom['_launchpage_contentblockabovevideo'][0]); ?> <?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '<script>utmx_section("Alert Bar")</script>' : ''; ?><?php echo '<div class="launchbanner_'.strtolower($postcustom['_launchpage_alertbarcolor'][0]).'">'.$postcustom['_launchpage_alertbartext'][0].'</div>'; ?><?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '</noscript>' : ''; ?></div>
    <?php } else if($postcustom['_launchpage_contentblockabovevideo']) { ?>
    <div id="launchinnertop"> <?php echo nl2br($postcustom['_launchpage_contentblockabovevideo'][0]); // adds nl2br( ) to make the line breaks display as is ?> </div>
    <?php } else if($postcustom['_launchpage_alertbartext']) { ?>
    <div id="launchinnertop"> <?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '<script>utmx_section("Alert Bar")</script>' : ''; ?><?php echo '<div class="launchbanner_'.strtolower($postcustom['_launchpage_alertbarcolor'][0]).'">'.$postcustom['_launchpage_alertbartext'][0].'</div>'; ?><?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '</noscript>' : ''; ?></div>
    <?php } ?>
    
    <!--close launchinnertop-->
    
    <div id="launchvideocontainer" style="width:<?php echo $launchvideocontainerwidth; ?>; height:<?php echo $launchvideocontainerheight; ?>;">
      <?php if(!empty($postcustom['_launchpage_activatevideo'])){ ?>
      <div id="launchvideobox">
        <?php if($postcustom['_launchpage_externalvideo']) { // start external video ?>
        <?php echo $postcustom['_launchpage_externalvideo'][0]; ?>
        <?php } else { ?>
        <?php if(!empty($postcustom['_launchpage_videourl'])){

                   $videoheight = !empty($postcustom['_launchpage_videoheight']) ? stripcslashes($postcustom['_launchpage_videoheight'][0])."px" :  "478px";

                   $videowidth = !empty($postcustom['_launchpage_videowidth']) ? stripcslashes($postcustom['_launchpage_videowidth'][0])."px" :  "850px";

                   $myvideo = $postcustom['_launchpage_videourl'][0];

                   $myvideochangewidth = str_replace('width=','width="'.$videowidth.'"',$myvideo);

                   $myvideochangeheight = str_replace('height=','height="'.$videoheight.'"',$myvideochangewidth);

                   echo '<div id="videobox2" style="width:'.$videowidth.';height:'.$videoheight.'">';

                   echo stripcslashes($myvideochangeheight);

                   echo '</div>';

            }else if(!empty($postcustom['_launchpage_hostedvideourl'])){

                   $videourl = !empty($postcustom['_launchpage_hostedvideourl']) ? stripcslashes($postcustom['_launchpage_hostedvideourl'][0]) :  "";

                   $videoheight = !empty($postcustom['_launchpage_videoheight']) ? stripcslashes($postcustom['_launchpage_videoheight'][0])."px" :  "478px";

                   $videowidth = !empty($postcustom['_launchpage_videowidth']) ? stripcslashes($postcustom['_launchpage_videowidth'][0])."px" :  "850px";

                   if(!empty($videourl)){

            ?>
        <?php $url = get_bloginfo('template_directory'); ?>
        <?php $showcontrol = !empty($postcustom['_launchpage_showvideocontrolbar']) ? "over" :  "none"; ?>
        <?php $autoplay = !empty($postcustom['_launchpage_autoplay']) ? "true" :  "false"; ?>
        <!-- This is the Player Codes -->
        
        <style>
#launchvideobox{height:<?php echo $videoheight?>;width:<?php echo $videowidth?>;}

 #videobox{height:<?php echo $videoheight?>;width:<?php echo $videowidth?>;}
</style>
        <?php 


        function isIphone() {



        $agent = $_SERVER['HTTP_USER_AGENT'];



        if (stristr($agent, 'iPhone') == TRUE || stristr($agent, 'iPod') == TRUE || stristr($agent, 'iPad') == TRUE) {



                echo '<!--iPhone or iPod Touch detected-->';



                return TRUE;



        } else {



                echo '<!--iPhone or iPod Touch not detected-->';



                return FALSE;



        }



}



?>
        <?php if(isIphone()): ?>
        <div id="player" style="width:<?php echo $videowidth?>;height:<?php echo $videoheight?>;"> 
          <script type="text/javascript">



<!--



        var myQTObject = new QTObject("", "<?php echo ($postcustom['_launchpage_mobilevideourl']) ? $postcustom['_launchpage_mobilevideourl'][0] : ''; ?>", "<?php echo $videowidth?>", "<?php echo $videoheight?>");



        myQTObject.addParam("href","<?php echo ($postcustom['_launchpage_mobilevideourl']) ? $postcustom['_launchpage_mobilevideourl'][0] : ''; ?>");



        myQTObject.addParam("target","myself");



        myQTObject.addParam("controller","false");



        myQTObject.addParam("autostart","<?php echo $autoplay?>");



        myQTObject.addParam("kioskmode","true");



        myQTObject.addParam("targetcache","true");



        myQTObject.addParam("scale","aspect");



        myQTObject.write();



//-->



</script>
          </embed>
        </div>
        <?php else: ?>
        <script type='text/javascript' src='<?php echo $url?>/js/swfobject.js'></script>
        <div id="videobox3"  style="width:<?php echo $videowidth?>;height:<?php echo $videoheight?>;">
          <div id='mediaspace'>
            <center>
              Your browser does not support Flash or does not have it installed. <a href="http://http://www.adobe.com/products/flashplayer/" target="_blank">Click here download Flash Now</a>
            </center>
          </div>
          <script type='text/javascript'>

  var so = new SWFObject('<?php echo $url?>/js/player.swf','mpl','<?php echo $videowidth?>','<?php echo $videoheight?>','9');

  so.addParam('allowfullscreen','true');

  so.addParam('allowscriptaccess','always');

  so.addParam('wmode','opaque');

  so.addVariable('file','<?php echo $videourl?>');  so.addVariable('image','<?php echo ($postcustom['_launchpage_videoimage1']) ? $postcustom['_launchpage_videoimage1'][0] : ''; ?>');

  so.addVariable('controlbar','<?php echo $showcontrol?>');

  so.addVariable('autostart','<?php echo $autoplay?>');

  so.addVariable('stretching','fill');

<?php if($postcustom['_launchpage_videoplayercolor'][0]=='dark') { ?>

so.addVariable('screencolor','FFFFFF');

  so.addVariable('backcolor','1b1b1b');

  so.addVariable('frontcolor','FFFFFF');

  so.addVariable('lightcolor','1173ba');

<?php } ?>

so.write('mediaspace');

</script> 
        </div>
        <?php endif; ?>
        
        <!-- This is the end of the Player Codes -->
        
        <?php 
                   }

            }else{

				   echo '<div style="width:100%;margin:0 auto;text-align:center;">';

                   echo '<img style="max-width:590px;max-height:375px;" src="'.$postcustom['_launchpage_uploadvideothumbnail_images'][0].'">';

				   echo '</div>';

            }



            ?>
        <?php } // end non-externalvideo ?>
        
      </div>
      <?php } ?>
      <div class="aclear"></div>
      <?php if(!empty($postcustom['_launchpage_showvideodownloadlink'])){ ?>
      <div id="videodownloadlink"><a href="<?php echo $postcustom['_launchpage_downloadvideourl'][0]; ?>" target="_blank"><?php echo $postcustom['_launchpage_videodownloadlinktext'][0]; ?></a></div>
      <?php } ?>
    </div>
    <!--close videocontainer--> 
    
    <!-- Start Share bar-->
<?php $thesharelink = ($postcustom['_launchpage_customshareurl'][0]!="") ? $postcustom['_launchpage_customshareurl'][0] : get_permalink($postcustom['_launchpage_page2share'][0]); ?>
    
    <?php if($postcustom['_launchpage_activatesocialmedia']) { ?>
    <div id="sharebarnew">
      <div id="sharebarnew-left"></div>
      <div id="sharebarnew-text"><img src="<?php echo ($postcustom['_launchpage_socialmediacalltoactiontext']) ? $templatedir.'/images/share/sharetext-'.$postcustom['_launchpage_socialmediacalltoactiontext'][0].'.png' : ''; ?>" style="border:0;"></div>
<div id="sharebarnew-fb"><?php echo ($postcustom['_launchpage_facebookshare']) ? '<a target="_blank" href="http://www.facebook.com/sharer.php?u='.$thesharelink.'&t='.$postcustom['_launchpage_facebookshare'][0].'"><img src="'.$templatedir.'/images/'.$postcustom['_launchpage_socialmeduabutton'][0].'fbsmall.png" border="0" /></a>' : ''; ?></div>
      <div id="sharebarnew-twitter"><?php echo ($postcustom['_launchpage_twitterurl']) ? '<a target="_blank" href="http://twitter.com/share?text='.$postcustom['_launchpage_twitterurl'][0].' &url='.$thesharelink.'"><img src="'.$templatedir.'/images/'.$postcustom['_launchpage_socialmeduabutton'][0].'twittersmall.png" border="0" /></a>' : ''; ?></div>
      <div id="sharebarnew-right"></div>
      <div class="aclear"></div>
    </div>
    <!--close sharebar outer-->
    
    <?php } ?>
    
    <!--End Share Bar-->
    
    <div class="aclear"></div>
    <?php if($postcustom['_launchpage_activatecalltoaction']) {	// if Call to Action enabled *Under Video*

if($postcustom['_launchpage_activatedelaybutton']) {

	$timedelay = ($postcustom['_launchpage_calltoactionbuttontimedelay']) ? $postcustom['_launchpage_calltoactionbuttontimedelay'][0]*1000 : 1000; // 1000 = 1 sec

	echo '<script type="text/javascript">

	jQuery(document).ready(function() {

		setTimeout(function(){jQuery(".launchcta").show()}, '.$timedelay.');

	});

    </script>';

}

?>
    <?php if($postcustom['_launchpage_showctabuttonundervideo']) { /*CTA Button Under Video Start*/ ?>
    <div id="launchcta" class="launchcta" <?php echo ($postcustom['_launchpage_activatedelaybutton']) ? 'style="display: none;"' : ''; ?>>
      <div id="ctastyle" style="height:162px;width:393px;margin:0px auto;background:transparent url(<?php echo $templatedir; ?>/images/ctabuttons/style/<?php echo stripcslashes($postcustom['_launchpage_calltoactionbuttonstyle'][0]); ?>.png) no-repeat scroll 0 0;"> <a <?php echo ($postcustom['_launchpage_ctalinkstarget'][0]) ? 'target="_blank"' : ''; ?> href="<?php echo $postcustom['_launchpage_calltoactionurl'][0]; ?>"> <img src="<?php echo $templatedir; ?>/images/ctabuttons/<?php echo stripcslashes($postcustom['_launchpage_calltoactionbutton'][0]); ?>.png" border="0" style="padding-top:8px;" /> </a> </div>
      <!--close ctastyle--> 
      
    </div>
    <!--close launchcta-->
    
    <?php } /*CTA Button Under Video End*/ ?>
    <?php } ?>
    
    <!--OPEN Optin Box #2-->

<?php if($postcustom['_launchpage_activedoubleoptin']) { ?>

<form action="<?php echo !empty($postcustom['_launchpage_optinformurl']) ? stripcslashes($postcustom['_launchpage_optinformurl'][0]) : ""?>" method="post">
<div id="launchoptin" style="margin-top:20px;">
<?php echo ($postcustom['_launchpage_optintitle']) ? '<div class="launchoptin-headline">'.$postcustom['_launchpage_optintitle'][0].'</div>' : ''; ?>

<?php echo ($postcustom['_launchpage_optintextblock']) ? '<div class="launchoptin-text">'.$postcustom['_launchpage_optintextblock'][0].'</div>' : ''; ?>


<div class="launchoptin-boxes">
<?php $namefield_name = !empty($postcustom['_launchpage_optinboxname']) ? stripcslashes($postcustom['_launchpage_optinboxname'][0]) : "" ?>
<?php $emailfield_name = !empty($postcustom['_launchpage_optinboxemail']) ? stripcslashes($postcustom['_launchpage_optinboxemail'][0]) : "" ?>

<?php $name_init = !empty($postcustom['_launchpage_optinboxnametext']) ? 'value="'.stripcslashes($postcustom['_launchpage_optinboxnametext'][0]).'" name="'.$namefield_name.'" onblur="if (this.value == \'\') {this.value = \''.stripcslashes($postcustom['_launchpage_optinboxnametext'][0]).'\';}" onfocus="if (this.value == \''.stripcslashes($postcustom['_launchpage_optinboxnametext'][0]).'\') {this.value = \'\';}"' : ' value="Enter your name..." name="'.$namefield_name.'" onblur="if (this.value == \'\') {this.value = \'Enter your name...\';}" onfocus="if (this.value == \'Enter your name...\') {this.value = \'\';}"';
$email_init = !empty($postcustom['_launchpage_optinboxemailtext']) ? 'value="'.stripcslashes($postcustom['_launchpage_optinboxemailtext'][0]).'" name="'.$emailfield_name.'" onblur="if (this.value == \'\') {this.value = \''.stripcslashes($postcustom['_launchpage_optinboxemailtext'][0]).'\';}" onfocus="if (this.value == \''.stripcslashes($postcustom['_launchpage_optinboxemailtext'][0]).'\') {this.value = \'\';}"' : ' value="Enter your email..." name="'.$emailfield_name.'" onblur="if (this.value == \'\') {this.value = \'Enter your email...\';}" onfocus="if (this.value == \'Enter your email...\') {this.value = \'\';}"';
?>

<?php echo !empty($postcustom['_launchpage_optinboxnameshow']) ? '<input id="'.$namefield_name.'" class="text" type="text" size="20" '.$name_init.' />' : ""; ?>

<?php echo !empty($postcustom['_launchpage_optinboxemailshow']) ? '<input id="'.$emailfield_name.'" class="text" type="text" size="20" '.$email_init.' />' : ""; ?>

<?php $extra = 1; 
while($extra<=5) {
	$value_init = !empty($postcustom['_launchpage_extra'.$extra.'value']) ? 'value="'.stripcslashes($postcustom['_launchpage_extra'.$extra.'value'][0]).'" onblur="if (this.value == \'\') {this.value = \''.stripcslashes($postcustom['_launchpage_extra'.$extra.'value'][0]).'\';}" onfocus="if (this.value == \''.stripcslashes($postcustom['_launchpage_extra'.$extra.'value'][0]).'\') {this.value = \'\';}"' : '';
	echo !empty($postcustom['_launchpage_extra'.$extra.'ID']) ? '<input name="'.stripcslashes($postcustom['_launchpage_extra'.$extra.'ID'][0]).'" id="'.stripcslashes($postcustom['_launchpage_extra'.$extra.'ID'][0]).'" class="text" type="text" size="20" '.$value_init.' />' : "";
$extra++;	
}
?>

</div>

<?php echo !empty($postcustom['_launchpage_webformhiddenhtml']) ? stripcslashes(eval('?>'.htmlspecialchars_decode($postcustom['_launchpage_webformhiddenhtml'][0]))) : ""; ?>

<center><input class="button1" id="submit_image_5f17aab77d6c" type="image" width="268" src="<?php echo stripcslashes($postcustom['_launchpage_optinbutton'][0]); ?>" name="submit" value=""/></center>

<?php echo !empty($postcustom['_launchpage_spamnoticetext']) ? '<div class="sidebar-padlock">'.stripcslashes($postcustom['_launchpage_spamnoticetext'][0]).'</div>' :  ""; ?>

</div><!--close launchoptin-->
</form>

<?php } // End Active Double Optin ?>
<!--CLOSE Optin Box #2-->

    <!-- OPEN Headline Under Video --> 
    <?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '<script>utmx_section("Headline Below Video")</script>' : ''; ?><?php echo ($postcustom['_launchpage_headlinebelowvideotext']) ? '<h1 class="launchbottomheadline">'.$postcustom['_launchpage_headlinebelowvideotext'][0].'</h1>' : ''; ?><?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '</noscript>' : ''; ?> 
    <!-- CLOSE Headline Under Video -->
    
    <?php  ?>
    <?php if($postcustom['_launchpage_activatedelaycontentbox']) {	// if Delayed Content Box Enabled ?>
    <?php if($postcustom['_launchpage_showcontentboxtextundervideo']) { // Delayed Content Box Under Video

$contentboxtimedelay = ($postcustom['_launchpage_delaycontentboxtimedelay']) ? $postcustom['_launchpage_delaycontentboxtimedelay'][0]*1000 : 1000; //1000 = 1sec

	echo '<script type="text/javascript">

	jQuery(document).ready(function() {

		setTimeout(function(){jQuery(".delaycontentbox").show()}, '.$contentboxtimedelay.');

	});

    </script>';

?>
    <div id="delayedcontent" class="delaycontentbox" <?php echo ($postcustom['_launchpage_activatedelaycontentbox']) ? 'style="display: none;"' : ''; ?>> <?php echo ($postcustom['_launchpage_delaycontentboxtext']) ? stripslashes($postcustom['_launchpage_delaycontentboxtext'][0]) : ''; ?> </div>
    <?php } // end Delayed Content Box Under Video

} // end if Delayed Content Box Enabled ?>
    <div id="launchinnermain"> <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<?php the_content(); ?>
    </div>
    <!--close launchinnermain-->
    
    <?php if($postcustom['_launchpage_activateoptin']) { ?>
    <form action="<?php echo !empty($postcustom['_launchpage_optinformurl']) ? stripcslashes($postcustom['_launchpage_optinformurl'][0]) : ""?>" method="post">
      <div id="launchoptin"> <?php echo ($postcustom['_launchpage_optintitle']) ? '<div class="launchoptin-headline">'.$postcustom['_launchpage_optintitle'][0].'</div>' : ''; ?> <?php echo ($postcustom['_launchpage_optintextblock']) ? '<div class="launchoptin-text">'.$postcustom['_launchpage_optintextblock'][0].'</div>' : ''; ?>
        <div class="launchoptin-boxes">
          <?php $namefield_name = !empty($postcustom['_launchpage_optinboxname']) ? stripcslashes($postcustom['_launchpage_optinboxname'][0]) : "" ?>
          <?php $emailfield_name = !empty($postcustom['_launchpage_optinboxemail']) ? stripcslashes($postcustom['_launchpage_optinboxemail'][0]) : "" ?>
          <?php // nick 10/29/2010

$name_init = !empty($postcustom['_launchpage_optinboxnametext']) ? 'value="'.stripcslashes($postcustom['_launchpage_optinboxnametext'][0]).'" name="'.$namefield_name.'" onblur="if (this.value == \'\') {this.value = \''.stripcslashes($postcustom['_launchpage_optinboxnametext'][0]).'\';}" onfocus="if (this.value == \''.stripcslashes($postcustom['_launchpage_optinboxnametext'][0]).'\') {this.value = \'\';}"' : ' value="Enter your name..." name="'.$namefield_name.'" onblur="if (this.value == \'\') {this.value = \'Enter your name...\';}" onfocus="if (this.value == \'Enter your name...\') {this.value = \'\';}"';

$email_init = !empty($postcustom['_launchpage_optinboxemailtext']) ? 'value="'.stripcslashes($postcustom['_launchpage_optinboxemailtext'][0]).'" name="'.$emailfield_name.'" onblur="if (this.value == \'\') {this.value = \''.stripcslashes($postcustom['_launchpage_optinboxemailtext'][0]).'\';}" onfocus="if (this.value == \''.stripcslashes($postcustom['_launchpage_optinboxemailtext'][0]).'\') {this.value = \'\';}"' : ' value="Enter your email..." name="'.$emailfield_name.'" onblur="if (this.value == \'\') {this.value = \'Enter your email...\';}" onfocus="if (this.value == \'Enter your email...\') {this.value = \'\';}"';

?>
          <?php echo !empty($postcustom['_launchpage_optinboxnameshow']) ? '<input id="'.$namefield_name.'" class="text" type="text" size="20" '.$name_init.' />' : ""; ?> <?php echo !empty($postcustom['_launchpage_optinboxemailshow']) ? '<input id="'.$emailfield_name.'" class="text" type="text" size="20" '.$email_init.' />' : ""; ?>
          
          
          <?php $extra = 1; 

while($extra<=5) {

	$value_init = !empty($postcustom['_launchpage_extra'.$extra.'value']) ? 'value="'.stripcslashes($postcustom['_launchpage_extra'.$extra.'value'][0]).'" onblur="if (this.value == \'\') {this.value = \''.stripcslashes($postcustom['_launchpage_extra'.$extra.'value'][0]).'\';}" onfocus="if (this.value == \''.stripcslashes($postcustom['_launchpage_extra'.$extra.'value'][0]).'\') {this.value = \'\';}"' : '';

	echo !empty($postcustom['_launchpage_extra'.$extra.'ID']) ? '<input name="'.stripcslashes($postcustom['_launchpage_extra'.$extra.'ID'][0]).'" id="'.stripcslashes($postcustom['_launchpage_extra'.$extra.'ID'][0]).'" class="text" type="text" size="20" '.$value_init.' />' : "";

$extra++;	

}

?>
          
        </div>
        <?php echo !empty($postcustom['_launchpage_webformhiddenhtml']) ? stripcslashes(eval('?>'.htmlspecialchars_decode($postcustom['_launchpage_webformhiddenhtml'][0]))) : ""; ?>
        <center>
          <input class="button1" id="submit_image_5f17aab77d6c" type="image" width="268" src="<?php echo stripcslashes($postcustom['_launchpage_optinbutton'][0]); ?>" name="submit" value=""/>
        </center>
      </div>
      <!--close launchoptin-->
      
    </form>
    <?php } ?>
    <?php if($postcustom['_launchpage_activatecalltoaction']) { // if Call to Action enabled *After Content* ?>
    <?php if($postcustom['_launchpage_showctabuttonaftercontent']) { /*CTA Button After Content Start*/ ?>
    <div id="launchcta" class="launchcta" <?php echo ($postcustom['_launchpage_activatedelaybutton']) ? 'style="display: none;"' : ''; ?>>
      <div id="ctastyle" style="height:162px;width:393px;margin:0px auto;background:transparent url(<?php echo $templatedir; ?>/images/ctabuttons/style/<?php echo stripcslashes($postcustom['_launchpage_calltoactionbuttonstyle'][0]); ?>.png) no-repeat scroll 0 0;"> <a <?php echo ($postcustom['_launchpage_ctalinkstarget'][0]) ? 'target="_blank"' : ''; ?> href="<?php echo $postcustom['_launchpage_calltoactionurl'][0]; ?>"> <img src="<?php echo $templatedir; ?>/images/ctabuttons/<?php echo stripcslashes($postcustom['_launchpage_calltoactionbutton'][0]); ?>.png" border="0" style="padding-top:8px;" /> </a> </div>
      <!--close ctastyle--> 
      
    </div>
    <!--close launchcta-->
    
    <?php } /*CTA Button After Content End*/ ?>
    <?php } ?>
    <?php  ?>
    <?php if($postcustom['_launchpage_activatedelaycontentbox']) {	// if Delayed Content Box Enabled ?>
    <?php if($postcustom['_launchpage_showcontentboxtextaftercontent']) { // Delayed Content Box After Content 

$contentboxtimedelay = ($postcustom['_launchpage_delaycontentboxtimedelay']) ? $postcustom['_launchpage_delaycontentboxtimedelay'][0]*1000 : 1000; //1000 = 1sec

	echo '<script type="text/javascript">

	jQuery(document).ready(function() {

		setTimeout(function(){jQuery(".delaycontentbox").show()}, '.$contentboxtimedelay.');

	});

    </script>';

?>
    <div id="delayedcontent" class="delaycontentbox" <?php echo ($postcustom['_launchpage_activatedelaycontentbox']) ? 'style="display: none;"' : ''; ?>> <?php echo ($postcustom['_launchpage_delaycontentboxtext']) ? stripslashes($postcustom['_launchpage_delaycontentboxtext'][0]) : ''; ?> </div>
    <?php } // end Delayed Content Box After Content

} // end if Delayed Content Box Enabled ?>
    
	
	
	<!--OPEN COMMENTS-->
<?php if($postcustom['_launchpage_activatecomments']) { ?>
<div id="launchcommentslink">
<div id="launchcommentsarrow"></div>
<?php echo ($postcustom['_launchpage_commentscalltoactiontext']) ? '<div id="launchcommentstext">'.$postcustom['_launchpage_commentscalltoactiontext'][0].'</div>' : ''; ?>
</div>
<?php } ?>

<div id="launchcommentsblock">

<?php if($postcustom['_launchpage_activatecomments']) {
	switch($postcustom['_launchpage_commentssystem'][0]) {
		case "Wordpress" : { ?>
<div id="wpcomments">

<div class="commenticon"></div><div class="commenttitle"><h2><?php echo ($postcustom['_launchpage_wpcommentstitle']) ? $postcustom['_launchpage_wpcommentstitle'][0] : 'Leave A Reply'; ?> (<?php comments_number('No comments', 'One comment', '% comments'); ?>    so far)</h2></div><div class="aclear"></div><div class="aclear"></div>

<?php comments_template(); // Get wp-comments.php template ?>

</div>
		<?php break; }
        case "Facebook" : { ?>
<div id="fbcomments">
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php echo $thesharelink; ?>" show_faces="true" send="true" width="850" font=""></fb:like>

<div id="fb-root" style="padding-top:8px;"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=<?php echo $facebookappid; ?>";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-comments" data-href="<?php echo $thesharelink; ?>" data-num-posts="<?php echo ($postcustom['_launchpage_fbcommentnum']) ? $postcustom['_launchpage_fbcommentnum'][0] : '20'; ?>" data-width="850" publish_feed="true"></div>


</div>

		<?php break; }

 		case "Both" : { ?>
        
        <?php if($postcustom['_launchpage_commentsorder'][0]=="fbwp") : ?>
<div id="fbcomments">
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php echo $thesharelink; ?>" show_faces="true" send="true" width="850" font=""></fb:like>

<div id="fb-root" style="padding-top:8px;"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=<?php echo $facebookappid; ?>";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-comments" data-href="<?php echo $thesharelink; ?>" data-num-posts="<?php echo ($postcustom['_launchpage_fbcommentnum']) ? $postcustom['_launchpage_fbcommentnum'][0] : '20'; ?>" data-width="850" publish_feed="true"></div>


</div>
<div id="wpcomments">

<div class="commenticon"></div><div class="commenttitle"><h2><?php echo ($postcustom['_launchpage_wpcommentstitle']) ? $postcustom['_launchpage_wpcommentstitle'][0] : 'Leave A Reply'; ?> (<?php comments_number('No comments', 'One comment', '% comments'); ?>    so far)</h2></div><div class="aclear"></div><div class="aclear"></div>

<?php comments_template(); // Get wp-comments.php template ?>

</div>
		<?php elseif($postcustom['_launchpage_commentsorder'][0]=="wpfb") : ?>
<div id="wpcomments">

<div class="commenticon"></div><div class="commenttitle"><h2><?php echo ($postcustom['_launchpage_wpcommentstitle']) ? $postcustom['_launchpage_wpcommentstitle'][0] : 'Leave A Reply'; ?> (<?php comments_number('No comments', 'One comment', '% comments'); ?>    so far)</h2></div><div class="aclear"></div><div class="aclear"></div>

<?php comments_template(); // Get wp-comments.php template ?>

</div>
<div id="fbcomments">

<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php echo $thesharelink; ?>" show_faces="true" send="true" width="850" font=""></fb:like>
<div id="fb-root" style="padding-top:8px;"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=<?php echo $facebookappid; ?>";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-comments" data-href="<?php echo $thesharelink; ?>" data-num-posts="<?php echo ($postcustom['_launchpage_fbcommentnum']) ? $postcustom['_launchpage_fbcommentnum'][0] : '20'; ?>" data-width="850" publish_feed="true"></div>


</div>
		<?php endif; ?>
		<?php break; }
   } //end switch 
} //end if comment enabled ?>
</div><!--close launchcommentsblock-->
<?php endwhile; ?>   
 
<!--CLOSE COMMENTS-->

    <div class="aclear"></div>
  </div>
  <!--Close launchbk-->
  
  <div id="launchfooter"></div>
</div>
<!--Close launchwrapper-->

<div id="wrapper"> </div>
<!--Close wrapper-->

<div id="footer">
  <div id="footer-inside">
    <?php if(!$postcustom['_launchpage_disabledisclaimermsg']) { // On-Page disabled ?>
    <?php if($activatefooterdisclaimermsg) { // if Footer Disclaimer Message Activated ?>
    <div id="footer-disclaimer"> <?php echo ($footerdisclaimermsg) ? stripslashes($footerdisclaimermsg) : ""; ?> </div>
    <?php } ?>
    <?php } // end On-Page disabled ?>
<div class="footer-right">
<?php if($postcustom['_launchpage_showfooterlinks'][0]) { ?>
	<?php if($footer_include) { ?>
    <ul>
		<?php 
        function new_nav_menu_items($items) {
            return str_replace('<a', '<a target="_blank"', $items);
        }
        ($footerlinkstarget) ? add_filter( 'wp_list_pages', 'new_nav_menu_items' ) : '';
        ?>
        <?php wp_list_pages("depth=0&sort_column=menu_order&include=".$footer_include."&title_li="); ?>
    </ul>
    <?php } ?>
<?php } ?>
</div>
<div class="footer-left">Copyright &copy; <?php echo ($footer_text) ? stripslashes($footer_text) : ""; ?>
	<?php echo ($footer_poweredby) ? ( ($footer_afflink) ? '<a href="'.$footer_afflink.'">Powered by OptimizePress</a>' : 'Powered by OptimizePress' ) : ''; ?>
</div>
</div>
</div><!--close footer-->

<?php include ("exit-redirect.php"); ?>

<?php // custom tracking code

echo ($customtrackingcodefooter) ? eval('?>'.stripcslashes(stripslashes($customtrackingcodefooter))) : ""; ?>
<?php echo ($postcustom['_seo_footertrackingjscode']) ? eval('?>'.stripcslashes($postcustom['_seo_footertrackingjscode'][0])) : ""; ?>
<?php wp_footer(); ?>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
</body>

<?php // only loads the cufon style that are going to use
$loadfontsarray = array('Arial'=>'Arial_400-Arial_700-Arial_italic_400-Arial_italic_700.font','Impact'=>'Impact_400.font','Georgia'=>'Georgia_400-Georgia_700.font','Tahoma'=>'Tahoma_400-Tahoma_700.font','Vegur'=>'Vegur_300-Vegur_700.font','Arial Narrow'=>'Arial_Narrow_400-Arial_Narrow_700.font');
$hlactiv8d = array(); // get activated headline/header options
($postcustom['_launchpage_activatepreheadline']) ? $hlactiv8d[] = "postcustom['_launchpage_preheadlinefont'][0]" : "";
($postcustom['_launchpage_activatesubheadline']) ? $hlactiv8d[] = "postcustom['_launchpage_subheadlinefont'][0]" : "";
($postcustom['_launchpage_activateh1abovevideotext']) ? $hlactiv8d[] = "postcustom['_launchpage_headlineabovevideofont'][0]" : "";
($postcustom['_launchpage_activateh1belowvideotext']) ? $hlactiv8d[] = "postcustom['_launchpage_headlinebelowvideofont'][0]" : "";
($postcustom['_launchpage_activateheadertext']) ? $hlactiv8d[] = "postcustom['_launchpage_headertextfont'][0]" : "";
$hlactiv8d[] = "postcustom['_launchpage_subheadcufonfont'][0]";
$activatednum = count($hlactiv8d);
$cond = implode('==&#36;key || ', $hlactiv8d);
$cond = $cond.'==&#36;key';
function getcond($cond, $key, $counts, $test) {
	global $post;
	$actv8d = explode("'", $cond);
	$i = 1; $miketest = array(); $condactv8 = array(); $counts = $counts*2;
	while ( $i <= $counts ) {
		$condactv8[$i] = get_post_meta($post->ID, $actv8d[$i], true);
		if($condactv8[$i]==$key) { $thisistrue = 'true'; }
		$i = $i+2;
	}
	return ($thisistrue=='true') ? true : false;
}
foreach ($loadfontsarray as $key => $value) {
	echo (getcond($cond, $key, $activatednum, $test)) ? '<script type="text/javascript" src="'.$templatedir.'/js/fonts/'.$value.'.js"></script>' : '';
}
// since there are fields that uses Hand of Sean fonts let's load it automatically
echo '<script type="text/javascript" src="'.$templatedir.'/js/fonts/Hand_Of_Sean_400.font.js"></script>'
?>

<script type="text/javascript">
Cufon.replace('.sales-preheadline', { fontFamily: '<?php echo stripcslashes($postcustom['_launchpage_preheadlinefont'][0]); ?>' });
Cufon.replace('.sales-postheadline', { fontFamily: '<?php echo stripcslashes($postcustom['_launchpage_subheadlinefont'][0]); ?>' });	
Cufon.replace('.launchtop-preheadline', { fontFamily: 'Arial' });
Cufon.replace('.launchtopheadline', {fontFamily: '<?php echo stripcslashes($postcustom['_launchpage_headlineabovevideofont'][0]); ?>' });
Cufon.replace('.launchbottomheadline', { fontFamily: '<?php echo stripcslashes($postcustom['_launchpage_headlinebelowvideofont'][0]); ?>' });
Cufon.replace('.sharetext', { fontFamily: 'Hand Of Sean' });
Cufon.replace('#launchcommentstext', { fontFamily: 'Hand Of Sean' });
Cufon.replace('.launchoptin-headline', { fontFamily: 'Hand Of Sean' });
Cufon.replace('#headertext', { 
			  fontFamily: '<?php echo stripcslashes($postcustom['_launchpage_headertextfont'][0]); ?>' ,
			  textShadow: '1px 1px #<?php echo stripcslashes($postcustom['_launchpage_headertextshadowcolor'][0]); ?>'
			  });
Cufon.replace('.subheadcufonfont', { fontFamily: '<?php echo stripcslashes($postcustom['_launchpage_subheadcufonfont'][0]); ?>' });
</script>
</html>
