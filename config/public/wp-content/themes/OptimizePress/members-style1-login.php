<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<?php /*
Template Name: Members 1 Login Page (WP)
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

<?php // Nick 10/26/2010 ?>
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

<?php // Close Nick 10/26/2010 ?>

<div id="membersnavbarbk">
<div id="membersnavbar">
<div id="access">


<div class="menu-header"><ul id="menu-navigation-bar-menu" class="menu">
<li id="menu-item-2187" class="menu-item menu-item-type-post_type current-menu-item page_item page-item-2052 current_page_item menu-item-2187"><a href="<?php echo ($membershipnavbarlink1) ? $membershipnavbarlink1 : ""; ?>"><?php echo ($membershipnavbartext1) ? $membershipnavbartext1 : ""; ?></a></li>
</ul>
</div>


</div>
</div>
</div>


</div>


<div id="wrapperouter">

<div id="wrapper">

<div id="launchbk">

<div id="members_home_title"><?php echo ($membershipdashwelcomebar) ? $membershipdashwelcomebar : ""; ?></div>

<div id="membersblockside">

<div style="clear:both;"></div>
<div style="padding-top:5px;">



<div class="sidebartitle">Members Only Access</div>
<div class="sidebartext1">
<img src="<?php echo get_bloginfo('template_directory'); ?>/images/membersonly.png" align="right" border="0" style="padding-bottom:15px;padding-left:10px;">This area is for members only.  If you are already a member please login using the form on the right.</div>

<div style="padding-top:10px;">
<?php if ( is_active_sidebar( 'sidebar-6' ) ) : ?><?php ($postcustom['_launchpage_showmembersidebarwidget']) ? dynamic_sidebar( 'sidebar-6' ) : ''; ?><?php endif; ?>
</div>

</div>



</div><!--close sidebar-->


<div id="launch1left">




<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>




<?php the_content(); ?>
                                
                                

      
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                










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
    <ul>		<?php // Nick 11/12/2010
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
