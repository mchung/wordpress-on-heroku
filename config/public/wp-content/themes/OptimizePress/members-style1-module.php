<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<?php /*
Template Name: Members 1 Module (WP Secured)
*/
?>
<?php     $postcustom = get_post_custom($post->ID);
    $templatedir = get_bloginfo('template_directory');
?>
<?php $seoheadergooglewebcode = !empty($postcustom['_seo_headergooglewebcode']) ? stripslashes($postcustom['_seo_headergooglewebcode'][0]) : ''; ?>
<?php echo $seoheadergooglewebcode; ?>
<?php get_header();?>
<?php include ("exit-pop.php"); ?>



<?php require(OPTPRESS_INCLUDES . "/var.php"); ?>

<?php if($postcustom['_launchpage_showheader']) { ?>
	
    <style>
	    #launchheader{<?php echo ($membershipheaderheight) ? "height:".$membershipheaderheight."px" : ""; ?>;background-image:url(<?php echo $membershipheader; ?>);margin:0px auto;}
	.launchheaderlogo{background-position:<?php echo $logo_align; ?> center;background-image:url(<?php echo $membershiplogo; ?>);<?php echo ($membershipheaderheight) ? "height:".$membershipheaderheight."px" : ""; ?>;width:977px;background-repeat:no-repeat;}
#headertext{<?php echo ($membershipheaderheight) ? "line-height:".$membershipheaderheight."px" : ""; ?>;text-align:center;width:977px;<?php echo ($membershipheaderheight) ? "height:".$membershipheaderheight."px" : ""; ?>;font-size:<?php echo ($postcustom['_launchpage_headertextsize']) ? $postcustom['_launchpage_headertextsize'][0].'px' : '48px'; ?>;letter-spacing:-2px;font-weight:normal;}
#headerfullwidth{<?php echo ($membershipheaderbg) ? "background-image:url(".$membershipheaderbg.");" : ""; ?>margin:0px auto;}

    </style>
       
    <div id="headerfullwidth">
    <div id="launchheader"<?php echo ($postcustom['_launchpage_showheaderhyperlink']) ? ' onclick="location.href=\''.$postcustom['_launchpage_headerhyperlink'][0].'\';" style="cursor: pointer;"' : ''; ?>>
	<?php echo ($postcustom['_launchpage_showlogo']) ? '<div class="launchheaderlogo"></div>' : ''; ?>
	<?php if($postcustom['_launchpage_activateheadertext']) { echo ($postcustom['_launchpage_headertext']) ? '<div id="headertext">'.stripslashes($postcustom['_launchpage_headertext'][0]).'</div>' : ''; } ?>
    
    </div>
    </div><!--close headerfullwidth-->
    

<?php } ?>
    <style type="text/css">

a {color:#<?php echo ($postcustom['_launchpage_pagehyperlinkcolor']) ? stripcslashes($postcustom['_launchpage_pagehyperlinkcolor'][0]) : '0088cc'; ?>;text-decoration:none;}
.page_item a:hover{color:#<?php echo ($postcustom['_launchpage_pagehyperlinkcolor']) ? stripcslashes($postcustom['_launchpage_pagehyperlinkcolor'][0]) : '0088cc'; ?>;}
#membersnavbar{<?php echo ($membershipnavbaralignment) ? 'text-align:'.stripslashes($membershipnavbaralignment).';' : ""; ?>}
#membersnavbarbk{
background: #<?php echo ($membershipnavbarmainbggradienttopcolor) ? $membershipnavbarmainbggradienttopcolor : ""; ?>;
	background-image: -moz-linear-gradient(100% 100% 90deg, #<?php echo ($membershipnavbarmainbggradientbotcolor) ? $membershipnavbarmainbggradientbotcolor : ""; ?>, #<?php echo ($membershipnavbarmainbggradienttopcolor) ? $membershipnavbarmainbggradienttopcolor : ""; ?>);
	background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#<?php echo ($membershipnavbarmainbggradienttopcolor) ? $membershipnavbarmainbggradienttopcolor : ""; ?>), to(#<?php echo ($membershipnavbarmainbggradientbotcolor) ? $membershipnavbarmainbggradientbotcolor : ""; ?>));
	border-bottom:<?php echo ($membershipnavbarbottomlinethickness) ? $membershipnavbarbottomlinethickness : ""; ?>px solid #<?php echo ($membershipnavbarbottomlinecolor) ? $membershipnavbarbottomlinecolor : ""; ?>;
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo ($membershipnavbarmainbggradienttopcolor) ? $membershipnavbarmainbggradienttopcolor : ""; ?>, endColorstr=#<?php echo ($membershipnavbarmainbggradientbotcolor) ? $membershipnavbarmainbggradientbotcolor : ""; ?>);
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo ($membershipnavbarmainbggradienttopcolor) ? $membershipnavbarmainbggradienttopcolor : ""; ?>, endColorstr=#<?php echo (membershipnavbarmainbggradientbotcolor) ? $membershipnavbarmainbggradientbotcolor : ""; ?>)";
}


#access a {color:#<?php echo ($membershipnavbartextcolor) ? $membershipnavbartextcolor : ""; ?>;text-shadow:0 1px 0 #<?php echo ($membershipnavbartextshadow) ? $membershipnavbartextshadow : ""; ?>;}

#access li:hover > a,
#access ul ul :hover > a {
	background: #<?php echo ($membershipnavbarmainbggradientbotcolor) ? $membershipnavbarmainbggradientbotcolor : ""; ?>;
	color: #<?php echo ($membershipnavbartexthovercolor) ? $membershipnavbartexthovercolor : ""; ?>;
	background-image: -moz-linear-gradient(100% 100% 90deg, #<?php echo ($membershipnavbarmainbggradienthoverbotcolor) ? $membershipnavbarmainbggradienthoverbotcolor : ""; ?>, #<?php echo ($membershipnavbarmainbggradienthovertopcolor) ? $membershipnavbarmainbggradienthovertopcolor : ""; ?>);
	background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#<?php echo ($membershipnavbarmainbggradienthovertopcolor) ? $membershipnavbarmainbggradienthovertopcolor : ""; ?>), to(#<?php echo ($membershipnavbarmainbggradienthoverbotcolor) ? $membershipnavbarmainbggradienthoverbotcolor : ""; ?>));
	text-shadow:0 1px 0 #<?php echo ($membershipnavbartexthovercolorshadow) ? $membershipnavbartexthovercolorshadow : ""; ?>;
	font-size:<?php echo ($membershipnavbarfontsize) ? $membershipnavbarfontsize : ""; ?>px;
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo ($membershipnavbarmainbggradienthovertopcolor) ? $membershipnavbarmainbggradienthovertopcolor : ""; ?>, endColorstr=#<?php echo ($membershipnavbarmainbggradienthoverbotcolor) ? $membershipnavbarmainbggradienthoverbotcolor : ""; ?>);
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo ($membershipnavbarmainbggradienthovertopcolor) ? $membershipnavbarmainbggradienthovertopcolor : ""; ?>, endColorstr=#<?php echo ($membershipnavbarmainbggradienthoverbotcolor) ? $membershipnavbarmainbggradienthoverbotcolor : ""; ?>)";
}

#access ul ul a {
	background:#<?php echo ($membershipnavbarsubbggradientbotcolor) ? $membershipnavbarsubbggradientbotcolor : ""; ?>;
    color: #<?php echo ($membershipnavbarsubtextcolor) ? $membershipnavbarsubtextcolor : ""; ?>;
	background-image: -moz-linear-gradient(100% 100% 90deg, #<?php echo ($membershipnavbarsubbggradientbotcolor) ? $membershipnavbarsubbggradientbotcolor : ""; ?>, #<?php echo ($membershipnavbarsubbggradienttopcolor) ? $membershipnavbarsubbggradienttopcolor : ""; ?>);
	background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#<?php echo ($membershipnavbarsubbggradienttopcolor) ? $membershipnavbarsubbggradienttopcolor : ""; ?>), to(#<?php echo ($membershipnavbarsubbggradientbotcolor) ? $membershipnavbarsubbggradientbotcolor : ""; ?>));
	text-shadow:0 1px 0 #<?php echo ($membershipnavbarsubtextshadow) ? $membershipnavbarsubtextshadow : ""; ?>;	
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo ($membershipnavbarsubbggradienttopcolor) ? $membershipnavbarsubbggradienttopcolor : ""; ?>, endColorstr=#<?php echo ($membershipnavbarsubbggradientbotcolor) ? $membershipnavbarsubbggradientbotcolor : ""; ?>);
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo ($membershipnavbarsubbggradienttopcolor) ? $membershipnavbarsubbggradienttopcolor : ""; ?>, endColorstr=#<?php echo ($membershipnavbarsubbggradientbotcolor) ? $membershipnavbarsubbggradientbotcolor : ""; ?>)";
}

#access .menu-header, div.menu{font-size:<?php echo ($membershipnavbarfontsize) ? $membershipnavbarfontsize : ""; ?>px}

#access ul li.current-menu-item > a{
font-size:<?php echo ($membershipnavbarfontsize) ? $membershipnavbarfontsize : ""; ?>px;
padding:0 15px;
}
#access .menu-header li, div.menu li{font-size:<?php echo ($membershipnavbarfontsize) ? $membershipnavbarfontsize : ""; ?>px;}

    </style> 

<div id="membersnavbarbk">
<div id="membersnavbar">
<div id="access">
<?php if ( is_user_logged_in() ) : ?>
<?php wp_nav_menu(array('theme_location' => 'custom_menu', 'container_class' => 'menu-header')); ?>

<?php else : ?>
<div class="menu-header"><ul id="menu-navigation-bar-menu" class="menu">
<li id="menu-item-2187" class="menu-item menu-item-type-post_type current-menu-item page_item page-item-2052 current_page_item menu-item-2187"><a href="<?php echo ($membershipnavbarlink1) ? $membershipnavbarlink1 : ""; ?>"><?php echo ($membershipnavbartext1) ? $membershipnavbartext1 : ""; ?></a></li>
</ul>
</div>

<?php endif; ?>

</div>
</div>
</div>
</div>


<div id="wrapperouter">

<div id="wrapper">

<div id="launchbk">

<div class="memberscontentspacer"></div>

<div id="membersblockside">

<?php if ( is_user_logged_in() ) : ?>

<?php if ((!empty($postcustom['_launchpage_memberssidebartitle'][0])) && (!empty($postcustom['_launchpage_memberssidebartext'][0]))) { ?>
<div class="sidebartitle"><?php echo ($postcustom['_launchpage_memberssidebartitle']) ? $postcustom['_launchpage_memberssidebartitle'][0] : ''; ?></div>
<div class="sidebartext1">
<img src="<?php echo ($postcustom['_launchpage_memberssidebariconurl']) ? $postcustom['_launchpage_memberssidebariconurl'][0] : ( ($postcustom['_launchpage_memberssidebaricon']) ? get_bloginfo('template_directory').'/images/members/'.$postcustom['_launchpage_memberssidebaricon'][0].'.jpg' : '' ); ?>" align="left" border="0" style="padding-bottom:15px;padding-right:15px;padding-top:5px;"><?php echo ($postcustom['_launchpage_memberssidebartext']) ? $postcustom['_launchpage_memberssidebartext'][0] : ''; ?></div>
<?php } ?>
<div id="sidebarlinks1">
<li class="nav_bar_title"><?php echo ($postcustom['_launchpage_memberssidebarnavtitle']) ? $postcustom['_launchpage_memberssidebarnavtitle'][0] : (($membershipsidebartitle) ? $membershipsidebartitle : ""); ?></li>
<?php 
        function backto_nav_menu_items($items) {
            return str_replace('current_page_parent">', 'current_page_parent">Back To ', $items);
        }
?>
<?php   if($post->post_parent) {
  add_filter( 'wp_list_pages', 'backto_nav_menu_items' ); 
  $children = wp_list_pages('title_li=&include='.$post->post_parent.'&echo=0');
  $children .= wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0&depth=0');
  } else {
  $children .= wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0');
  }
  if ($children) { ?>

  <?php echo $children; ?>

  <?php } ?>
  
  </div>


<?php else : ?>
<?php endif; ?>

<div style="clear:both;"></div>
<div style="padding-top:5px;">
<?php if ( is_user_logged_in() ) : ?>

<div style="padding-top:15px;">
You Are Logged In. <?php wp_loginout(); ?>
</div>

<div style="padding-top:10px;">
<?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?><?php ($postcustom['_launchpage_showmembersidebarwidget']) ? dynamic_sidebar( 'sidebar-6' ) : ''; ?><?php endif; ?>
</div>

<?php else : ?>
<div class="sidebartitle">Members Only Access</div>
<div class="sidebartext1">
<img src="<?php echo get_bloginfo('template_directory'); ?>/images/membersonly.png" align="right" border="0" style="padding-bottom:15px;padding-left:10px;">This area is for members only.  If you are already a member please login using the form on the right.</div>

<?php endif; ?>

</div>


</div><!--close sidebar-->


<div id="launch1left">


<?php if ( is_user_logged_in() ) : ?>
<div class="contenttitle1" style="margin-bottom:10px;"><?php wp_title(' '); ?></div>

<?php else : ?>
<?php endif; ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<?php if ( is_user_logged_in() ) : ?>



<?php if($postcustom['_launchpage_memberspagevidposition'][0]=="beforecontent"){ ?>
            
<!--START VIDEO CODE-->

<?php if(!empty($postcustom['_launchpage_activatevideo'])){ ?>

<div style="padding-top:10px;"></div>

<div id="launchvideobox">

<?php if($postcustom['_launchpage_externalvideo']) { // start external video ?>
	<?php echo $postcustom['_launchpage_externalvideo'][0]; ?>
<?php } else { ?>


            <?php if(!empty($postcustom['_launchpage_videourl'])){
                   $videoheight = !empty($postcustom['_launchpage_videoheight']) ? stripcslashes($postcustom['_launchpage_videoheight'][0])."px" :  "400px";
                   $videowidth = !empty($postcustom['_launchpage_videowidth']) ? stripcslashes($postcustom['_launchpage_videowidth'][0])."px" :  "710px";
                   $myvideo = $postcustom['_launchpage_videourl'][0];
                   $myvideochangewidth = str_replace('width=','width="'.$videowidth.'"',$myvideo);
                   $myvideochangeheight = str_replace('height=','height="'.$videoheight.'"',$myvideochangewidth);
                   echo '<div id="videobox">';
                   echo stripcslashes($myvideochangeheight);
                   echo '</div>';
            }else if(!empty($postcustom['_launchpage_hostedvideourl'])){
                   $videourl = !empty($postcustom['_launchpage_hostedvideourl']) ? stripcslashes($postcustom['_launchpage_hostedvideourl'][0]) :  "";
                   $videoheight = !empty($postcustom['_launchpage_videoheight']) ? stripcslashes($postcustom['_launchpage_videoheight'][0])."px" :  "400px";
                   $videowidth = !empty($postcustom['_launchpage_videowidth']) ? stripcslashes($postcustom['_launchpage_videowidth'][0])."px" :  "710px";
                   if(!empty($videourl)){
            ?>
                       <?php $url = get_bloginfo('template_directory'); ?>
                       <?php $showcontrol = !empty($postcustom['_launchpage_showvideocontrolbar']) ? "over" :  "none"; ?>
                       <?php $autoplay = !empty($postcustom['_launchpage_autoplay']) ? "true" :  "false"; ?>
                       
                       
                       <!-- This is the Player Codes -->

 <style>#launchvideobox{height:<?php echo $videoheight?>;width:<?php echo $videowidth?>;}</style>
 
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
 

<div id='mediaspace'><center>Your browser does not support Flash or does not have it installed. <a href="http://www.adobe.com/products/flashplayer/" target="_blank">Click here download Flash Now</a></center></div>
 
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

<?php endif; ?>

<!-- This is the end of the Player Codes --> <?php                    }
            }else{
				   echo '<div style="width:100%;margin:0 auto;text-align:center;">';
                   echo '<img style="max-width:590px;max-height:375px;" src="'.$postcustom['_launchpage_uploadvideothumbnail_images'][0].'">';
				   echo '</div>';
            }

            ?>
            
                        <?php } // end non-externalvideo ?>
      
	</div>
    
    <div style="padding-bottom:20px;"></div>
<?php } ?>

<div class="aclear"></div>

<?php if(!empty($postcustom['_launchpage_showvideodownloadlink'])){ ?>

<div id="videodownloadlink"><a href="<?php echo $postcustom['_launchpage_downloadvideourl'][0]; ?>" target="_blank"><?php echo $postcustom['_launchpage_videodownloadlinktext'][0]; ?></a></div>

<?php } ?>

      <div class="aclear"></div>
      
      <!--CLOSE VIDEO CODE-->
      
<?php } // if aftercontent ?>                                

<?php the_content(); ?>
                                
<?php if($postcustom['_launchpage_memberspagevidposition'][0]=="aftercontent"){ ?>
            
<!--START VIDEO CODE-->

<?php if(!empty($postcustom['_launchpage_activatevideo'])){ ?>

<div style="padding-top:10px;"></div>

<div id="launchvideobox">

<?php if($postcustom['_launchpage_externalvideo']) { // start external video ?>
	<?php echo $postcustom['_launchpage_externalvideo'][0]; ?>
<?php } else { ?>


            <?php if(!empty($postcustom['_launchpage_videourl'])){
                   $videoheight = !empty($postcustom['_launchpage_videoheight']) ? stripcslashes($postcustom['_launchpage_videoheight'][0])."px" :  "400px";
                   $videowidth = !empty($postcustom['_launchpage_videowidth']) ? stripcslashes($postcustom['_launchpage_videowidth'][0])."px" :  "710px";
                   $myvideo = $postcustom['_launchpage_videourl'][0];
                   $myvideochangewidth = str_replace('width=','width="'.$videowidth.'"',$myvideo);
                   $myvideochangeheight = str_replace('height=','height="'.$videoheight.'"',$myvideochangewidth);
                   echo '<div id="videobox">';
                   echo stripcslashes($myvideochangeheight);
                   echo '</div>';
            }else if(!empty($postcustom['_launchpage_hostedvideourl'])){
                   $videourl = !empty($postcustom['_launchpage_hostedvideourl']) ? stripcslashes($postcustom['_launchpage_hostedvideourl'][0]) :  "";
                   $videoheight = !empty($postcustom['_launchpage_videoheight']) ? stripcslashes($postcustom['_launchpage_videoheight'][0])."px" :  "400px";
                   $videowidth = !empty($postcustom['_launchpage_videowidth']) ? stripcslashes($postcustom['_launchpage_videowidth'][0])."px" :  "710px";
                   if(!empty($videourl)){
            ?>
                       <?php $url = get_bloginfo('template_directory'); ?>
                       <?php $showcontrol = !empty($postcustom['_launchpage_showvideocontrolbar']) ? "over" :  "none"; ?>
                       <?php $autoplay = !empty($postcustom['_launchpage_autoplay']) ? "true" :  "false"; ?>
                       
                       
                       <!-- This is the Player Codes -->

 <style>#launchvideobox{height:<?php echo $videoheight?>;width:<?php echo $videowidth?>;}</style>
 
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
 

<div id='mediaspace'><center>Your browser does not support Flash or does not have it installed. <a href="http://www.adobe.com/products/flashplayer/" target="_blank">Click here download Flash Now</a></center></div>
 
<script type='text/javascript'>
  var so = new SWFObject('<?php echo $url?>/js/player.swf','mpl','<?php echo $videowidth?>','<?php echo $videoheight?>','9');
  so.addParam('allowfullscreen','true');
  so.addParam('allowscriptaccess','always');
  so.addParam('wmode','opaque');
  so.addVariable('file','<?php echo $videourl?>');
  so.addVariable('image','<?php echo ($postcustom['_launchpage_videoimage1']) ? $postcustom['_launchpage_videoimage1'][0] : ''; ?>');
  so.addVariable('controlbar','<?php echo $showcontrol?>');
  so.addVariable('autostart','<?php echo $autoplay?>');
  so.addVariable('stretching','fill');
  so.write('mediaspace');
</script>

<?php endif; ?>

<!-- This is the end of the Player Codes --> <?php                    }
            }else{
				   echo '<div style="width:100%;margin:0 auto;text-align:center;">';
                   echo '<img style="max-width:590px;max-height:375px;" src="'.$postcustom['_launchpage_uploadvideothumbnail_images'][0].'">';
				   echo '</div>';
            }

            ?>
            
                        <?php } // end non-externalvideo ?>
      
	</div>
    
    <div style="padding-bottom:20px;"></div>
<?php } ?>

<div class="aclear"></div>

<?php if(!empty($postcustom['_launchpage_showvideodownloadlink'])){ ?>

<div id="videodownloadlink"><a href="<?php echo $postcustom['_launchpage_downloadvideourl'][0]; ?>" target="_blank"><?php echo $postcustom['_launchpage_videodownloadlinktext'][0]; ?></a></div>

<?php } ?>

      <div class="aclear"></div>
      
      <!--CLOSE VIDEO CODE-->
      
<?php } // if aftercontent ?>   

<div class="modulelistings1">

<?php 	$args = array(
		'title_li' => '',
		'child_of' => $post->ID,
		'echo' => 0,
		'post_type' => 'page',
		'post_status' => 'publish',
		'parent' => $post->ID
	);
	$defaults = array(
		'depth' => 0, 'show_date' => '',
		'date_format' => get_option('date_format'),
		'child_of' => 0, 'exclude' => '',
		'title_li' => __('Pages'), 'echo' => 1,
		'authors' => '', 'sort_column' => 'menu_order, post_title',
		'link_before' => '', 'link_after' => '', 'walker' => '',
	);
	$r = wp_parse_args( $args, $defaults );
	extract( $r, EXTR_SKIP );

	$output = '';
	$current_page = 0;

	// sanitize, mostly to keep spaces out
	$r['exclude'] = preg_replace('/[^0-9,]/', '', $r['exclude']);

	// Allow plugins to filter an array of excluded pages (but don't put a nullstring into the array)
	$exclude_array = ( $r['exclude'] ) ? explode(',', $r['exclude']) : array();
	$r['exclude'] = implode( ',', apply_filters('wp_list_pages_excludes', $exclude_array) );
	
	// Query pages.
	$r['hierarchical'] = 0;
	$pages = get_pages($r);
    if (!empty($pages)) { 
        foreach($pages as $page) {
            // Get the 2 meta values from the child page
            $details6 = get_post_meta($page->ID, '_launchpage_memberscontentdesc', true); 
            $details7 = ( get_post_meta($page->ID, '_launchpage_memberspagethumburl', true) != "" ) ? get_post_meta($page->ID, '_launchpage_memberspagethumburl', true) : $templatedir.'/images/members/' . get_post_meta($page->ID, '_launchpage_memberspagethumb', true).'.jpg'; 
			$templatedir = get_bloginfo('template_directory');
			$details1 = get_permalink($page->ID);
			$details2 = get_the_title($page->ID);
			$details3 = get_comments_number($page->ID);
			

            // Display the meta values
            echo '<div style="float:left;width:160px;">';
        	echo '<a href="' . $details1 . '"><img class="modulelisting1tn" src="'. $details7 .'" style="padding:0 10px 5px 0; width:145px; height:88px;" border="0"></a>
        </div>
        <div style="float:left;width:550px;min-height:100px;overflow:hidden;">
        	<div class="modulepagetitle"><a href="' . $details1 . '">' . $details2 .'</a></div>';
			echo ($showcommentstatsonmodulepages) ? '<p style="margin-bottom:5px;padding:5px 0px;"><a style="font-size:12px; text-decoration:underline;" href="' . $details1 . '">' . $details3 . ' comments</a></p>' : '';
            echo '<p style="font-size:12px;padding-top:0px;color:#444444;">' . $details6 . '</p>
        </div>
        <div style="clear:both; padding-top:20px;"></div>';
        }
	}
?>
</div>

<?php else : ?>
    <div class="memberstitle1">Please Login To Continue</div>
   <p><?php echo ($membershiploginpagetext) ? stripslashes($membershiploginpagetext) : ""; // Nick 11/05/2010 ?></p>
   <form action="<?php echo get_option('home'); ?>/wp-login.php" method="post">
   <div style="width:75px;float:left;font-size:14px;padding-top:5px;padding-bottom:10px;">
   Username</div>
   <div style="width:100px;float:left;padding-bottom:10px;">
<input type="text" name="log" id="log" style="border:2px solid #c0c0c0;font-size:14px;padding:8px;" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>" size="20" /></div><div style="clear:both"></div>

<div style="width:75px;float:left;font-size:14px;padding-top:5px;padding-bottom:10px;">
Password</div>
 <div style="width:100px;float:left;padding-bottom:10px;">
<input type="password" name="pwd" id="pwd" size="20" style="border:2px solid #c0c0c0;font-size:14px;padding:8px;"  />
</div><div style="clear:both;"></div>
<div style="width:300px;"><input type="submit" class="button gray" name="submit" value="Login Now" class="button" /></div>
   <div style="width:300px;padding-top:5px;"> <p>
       <label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" value="forever" /> Remember me</label>
       <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
    </p></div>
</form>
<div style="width:300px;padding-top:0px;">
<a href="<?php echo get_option('home'); ?>/wp-login.php?action=lostpassword">Recover password</a></div>
</div><!--close launchinnermain-->

<?php endif; ?>

<?php if ( is_user_logged_in() ) : ?>

<?php if($postcustom['_launchpage_activatecomments']) { ?>
<div id="launchcommentslink">
<div id="launchcommentsarrow"></div>
<?php echo ($postcustom['_launchpage_commentscalltoactiontext']) ? '<div id="launchcommentstext">'.$postcustom['_launchpage_commentscalltoactiontext'][0].'</div>' : ''; ?>
</div>
<?php } ?>

<div id="launchcommentsblock">
<?php $thesharelink = ($postcustom['_launchpage_customshareurl'][0]!="") ? $postcustom['_launchpage_customshareurl'][0] : get_permalink($postcustom['_launchpage_page2share'][0]); ?>
<?php 
if($postcustom['_launchpage_activatecomments']) {
	switch($postcustom['_launchpage_commentssystem'][0]) {
		case "Wordpress" : { ?>
<div id="wpcomments">

<div class="commenttitle"><h2><?php echo ($postcustom['_launchpage_wpcommentstitle']) ? $postcustom['_launchpage_wpcommentstitle'][0] : 'Leave A Reply'; ?> (<?php comments_number('No comments', 'One comment', '% comments'); ?>    so far)</h2></div><div class="commenticon"></div><div class="aclear"></div>

<?php comments_template(); // Get wp-comments.php template ?>
             

</div>	<?php break; }
        case "Facebook" : { ?>
<div id="fbcomments">

<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php echo $thesharelink; ?>" send="true" show_faces="true" width="600" font=""></fb:like>

<div id="fb-root" style="padding-top:8px;"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=<?php echo $facebookappid; ?>";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-comments" data-href="<?php the_permalink() ?>" data-num-posts="<?php echo ($postcustom['_launchpage_fbcommentnum']) ? $postcustom['_launchpage_fbcommentnum'][0] : '20'; ?>" data-width="600" publish_feed="true"></div>


</div>

<?php break; } 
 		case "Both" : { ?>
        
        <?php if($postcustom['_launchpage_commentsorder'][0]=="fbwp") : ?>
<div id="fbcomments">
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php echo $thesharelink; ?>" send="true" show_faces="true" width="600" font=""></fb:like>

<div id="fb-root" style="padding-top:8px;"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=<?php echo $facebookappid; ?>";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-comments" data-href="<?php the_permalink() ?>" data-num-posts="<?php echo ($postcustom['_launchpage_fbcommentnum']) ? $postcustom['_launchpage_fbcommentnum'][0] : '20'; ?>" data-width="600" publish_feed="true"></div>


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
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php echo $thesharelink; ?>" send="true" show_faces="true" width="600" font=""></fb:like>

<div id="fb-root" style="padding-top:8px;"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=<?php echo $facebookappid; ?>";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-comments" data-href="<?php the_permalink() ?>" data-num-posts="<?php echo ($postcustom['_launchpage_fbcommentnum']) ? $postcustom['_launchpage_fbcommentnum'][0] : '20'; ?>" data-width="600" publish_feed="true"></div>


</div>
		<?php endif; ?>
		<?php break; }
    } //end switch 
} //end if comment enabled ?>

</div><!--close launchcommentsblock-->

<?php else : ?>

<?php endif; ?>

<?php endwhile; ?>

</div><!--close launch1left-->
</div><!--close launchinnermain-->

<div class="aclear"></div>

<div class="aclear"></div>

</div><!--Close launchbk-->

</div><!--Close launchwrapper-->
<div id="wrapper">
 
</div><!--Close wrapper-->

</div><!--close wrapper outer-->

<div id="footer-members">

<div id="footer-inside">

<div class="footer-right">
<?php if($postcustom['_launchpage_showfooterlinks'][0]) { ?>
	<?php if($footer_include) { ?>
    <ul>		<?php 
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

<div class="footer-left">&copy; <?php echo ($footer_text) ? stripslashes($footer_text) : ""; ?>
	<?php echo ($footer_poweredby) ? ( ($footer_afflink) ? '<a href="'.$footer_afflink.'">Powered by OptimizePress</a>' : 'Powered by OptimizePress' ) : ''; ?>
</div>
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
Cufon.replace('.launchtop-preheadline', { fontFamily: 'Arial' });
Cufon.replace('.launchtopheadline', { fontFamily: '<?php echo stripcslashes($postcustom['_launchpage_headlineabovevideofont'][0]); ?>' });
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