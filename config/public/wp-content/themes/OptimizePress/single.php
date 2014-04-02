<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<?php     $templatedir = get_bloginfo('template_directory');
?>
<?php get_header('blogheader');?>

<?php // Blog Page Options implement ?>
    <style type="text/css">
<?php 
		$blogbgtiling = ($blogbgimgtiling) ? $blogbgimgtiling : 'repeat';
		$blogbgimageurl = ($blogbgimageurl) ? 'url('.$blogbgimageurl.');background-repeat:'.$blogbgtiling : 'none'; 
?>
		body { <?php echo ($blogbgcolor) ? "background-color:#".$blogbgcolor : ""; ?>;background-image:<?php echo $blogbgimageurl?>; }
	    #header{<?php echo ($blogheaderheight) ? "height:".$blogheaderheight."px" : ""; ?>;background-image:url(<?php echo $blogheader; ?>);margin:0px auto;}
		.headerlogo{background-position:<?php echo $logo_align; ?> center;background-image:url(<?php echo $bloglogo; ?>);<?php echo ($blogheaderheight) ? "height:".$blogheaderheight."px" : ""; ?>;width:977px;background-repeat:no-repeat;}
	#headertext{<?php echo ($blogheaderheight) ? "line-height:".$blogheaderheight."px" : ""; ?>;text-align:center;width:977px;<?php echo ($blogheaderheight) ? "height:".$blogheaderheight."px" : ""; ?>;letter-spacing:-2px;font-weight:normal;<?php echo ($blogheadertextsize) ? "font-size:".$blogheadertextsize."px;" : ""; echo ($blogheadertextcolor) ? "color:#".$blogheadertextcolor." !important;" : ""; ?> } 
		#headerfullwidth{<?php echo ($blogheaderbg) ? "background-image:url(".$blogheaderbg.");" : ""; ?>margin:0px auto;}

		a {color:#<?php echo ($bloghyperlinkcolor) ? stripcslashes($bloghyperlinkcolor) : '0088cc'; ?>;text-decoration:none;}
		.page_item a:hover{color:#<?php echo ($bloghyperlinkcolor) ? stripcslashes($bloghyperlinkcolor) : '0088cc'; ?>;}
		#blognavbarbk{
		background: #<?php echo ($blognavbarmainbggradienttopcolor) ? $blognavbarmainbggradienttopcolor : ""; ?>;
			background-image: -moz-linear-gradient(100% 100% 90deg, #<?php echo ($blognavbarmainbggradientbotcolor) ? $blognavbarmainbggradientbotcolor : ""; ?>, #<?php echo ($blognavbarmainbggradienttopcolor) ? $blognavbarmainbggradienttopcolor : ""; ?>);
			background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#<?php echo ($blognavbarmainbggradienttopcolor) ? $blognavbarmainbggradienttopcolor : ""; ?>), to(#<?php echo ($blognavbarmainbggradientbotcolor) ? $blognavbarmainbggradientbotcolor : ""; ?>));
			border-bottom:<?php echo ($blognavbarbottomlinethickness) ? $blognavbarbottomlinethickness : ""; ?>px solid #<?php echo ($blognavbarbottomlinecolor) ? $blognavbarbottomlinecolor : ""; ?>;
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo ($blognavbarmainbggradienttopcolor) ? $blognavbarmainbggradienttopcolor : ""; ?>, endColorstr=#<?php echo ($blognavbarmainbggradientbotcolor) ? $blognavbarmainbggradientbotcolor : ""; ?>);
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo ($blognavbarmainbggradienttopcolor) ? $blognavbarmainbggradienttopcolor : ""; ?>, endColorstr=#<?php echo (blognavbarmainbggradientbotcolor) ? $blognavbarmainbggradientbotcolor : ""; ?>)";
		}
		
		#access a {color:#<?php echo ($blognavbartextcolor) ? $blognavbartextcolor : ""; ?>;text-shadow:0 1px 0 #<?php echo ($blognavbartextshadow) ? $blognavbartextshadow : ""; ?>;}
		
		#access li:hover > a,
		#access ul ul :hover > a {
			background: #<?php echo ($blognavbarmainbggradientbotcolor) ? $blognavbarmainbggradientbotcolor : ""; ?>;
			color: #<?php echo ($blognavbartexthovercolor) ? $blognavbartexthovercolor : ""; ?>;
			background-image: -moz-linear-gradient(100% 100% 90deg, #<?php echo ($blognavbarmainbggradienthoverbotcolor) ? $blognavbarmainbggradienthoverbotcolor : ""; ?>, #<?php echo ($blognavbarmainbggradienthovertopcolor) ? $blognavbarmainbggradienthovertopcolor : ""; ?>);
			background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#<?php echo ($blognavbarmainbggradienthovertopcolor) ? $blognavbarmainbggradienthovertopcolor : ""; ?>), to(#<?php echo ($blognavbarmainbggradienthoverbotcolor) ? $blognavbarmainbggradienthoverbotcolor : ""; ?>));
			text-shadow:0 1px 0 #<?php echo ($blognavbartexthovercolorshadow) ? $blognavbartexthovercolorshadow : ""; ?>;
			font-size:<?php echo ($blognavbarfontsize) ? $blognavbarfontsize : ""; ?>px;
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo ($blognavbarmainbggradienthovertopcolor) ? $blognavbarmainbggradienthovertopcolor : ""; ?>, endColorstr=#<?php echo ($blognavbarmainbggradienthoverbotcolor) ? $blognavbarmainbggradienthoverbotcolor : ""; ?>);
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo ($blognavbarmainbggradienthovertopcolor) ? $blognavbarmainbggradienthovertopcolor : ""; ?>, endColorstr=#<?php echo ($blognavbarmainbggradienthoverbotcolor) ? $blognavbarmainbggradienthoverbotcolor : ""; ?>)";
		}
		
		
		#access ul ul a {
			background:#<?php echo ($blognavbarsubbggradientbotcolor) ? $blognavbarsubbggradientbotcolor : ""; ?>;
			color: #<?php echo ($blognavbarsubtextcolor) ? $blognavbarsubtextcolor : ""; ?>;
			background-image: -moz-linear-gradient(100% 100% 90deg, #<?php echo ($blognavbarsubbggradientbotcolor) ? $blognavbarsubbggradientbotcolor : ""; ?>, #<?php echo ($blognavbarsubbggradienttopcolor) ? $blognavbarsubbggradienttopcolor : ""; ?>);
			background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#<?php echo ($blognavbarsubbggradienttopcolor) ? $blognavbarsubbggradienttopcolor : ""; ?>), to(#<?php echo ($blognavbarsubbggradientbotcolor) ? $blognavbarsubbggradientbotcolor : ""; ?>));
			text-shadow:0 1px 0 #<?php echo ($blognavbarsubtextshadow) ? $blognavbarsubtextshadow : ""; ?>;
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo ($blognavbarsubbggradienttopcolor) ? $blognavbarsubbggradienttopcolor : ""; ?>, endColorstr=#<?php echo ($blognavbarsubbggradientbotcolor) ? $blognavbarsubbggradientbotcolor : ""; ?>);
	-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#<?php echo ($blognavbarsubbggradienttopcolor) ? $blognavbarsubbggradienttopcolor : ""; ?>, endColorstr=#<?php echo ($blognavbarsubbggradientbotcolor) ? $blognavbarsubbggradientbotcolor : ""; ?>)";	
		}
		
		#access .menu-header, div.menu{font-size:<?php echo ($blognavbarfontsize) ? $blognavbarfontsize : ""; ?>px}
		
		#access ul li.current-menu-item > a{
		font-size:<?php echo ($blognavbarfontsize) ? $blognavbarfontsize : ""; ?>px;
		padding:0 15px;
		}
		#access .menu-header li, div.menu li{font-size:<?php echo ($blognavbarfontsize) ? $blognavbarfontsize : ""; ?>px;}
		
			.pagination .current {background:none repeat scroll 0 0 #<?php echo ($bloghyperlinkcolor) ? stripcslashes($bloghyperlinkcolor) : '4581B5'; ?>;}
			
				.pagination a:hover{background: #<?php echo ($bloghyperlinkcolor) ? stripcslashes($bloghyperlinkcolor) : '4581B5'; ?>;}

		.post-picture { <?php echo ($bloghidepostthumb) ? "display:none" : ""; ?>; }
    </style>
    
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

<div id="wrapper">

<div id="wrapper2">

<div id="innerwrapper">

<div id="header"<?php echo ($blogheaderhyperlink) ? ' onclick="location.href=\''.$blogheaderhyperlink.'\';" style="cursor: pointer;"' : ''; ?>>
<div class="headerlogo"><?php if($blogactivateheadertext) { echo ($blogheadertext) ? '<div id="headertext">'.stripslashes($blogheadertext).'</div>' : ''; } ?></div>
</div><!--close header-->

<div id="navbar">
<div id="blognavbarbk">
<div id="blognavbar">
<div id="access">

<?php wp_nav_menu(array('theme_location' => 'blog_menu', 'container_class' => 'menu-header')); ?>

</div>
</div>
</div>
</div>

<div id="blogmain">

<div id="blog_post">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>



				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>
                    
                    <div class="post-meta">
                    
                    <p class="post-people">Posted In <?php the_category(', '); ?> 
                    <?php if(!$blogdeactivatecomments) { // if Wordpress Comments is deactivated ?>
                    <span class="divide">|</span> <?php comments_number('No comments','1 comment','% comments'); ?>  </p>
                    <?php } ?>

<?php if(!$bloghidesocialmediaicons) { // if Social Media Icons is hidden ?>
                    <div class="share-buttons">
<div class="twittershare">
<a href="http://twitter.com/share" class="twitter-share-button" data-count="none">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
</div>
<div class="facebookshare">                    
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like layout="button_count" show_faces="false" width="30"></fb:like>
</div>
</div>
<?php } ?>



</div>

					<div class="entry-content">
						<div class="post-picture"><?php $post_tumb = get_post_meta( $post->ID, '_blogpost_images', true ); ?>
<img alt="<?php echo get_post_meta( $post->ID, '_blogpost_postimage_alttag', true ); ?>" src="<?php echo $templatedir.'/timthumb.php?src='.$post_tumb; ?>&h=200&w=200&zc=1" style="border:1px solid #c0c0c0;float:right;"></div><?php the_content(); ?>
                        
<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>


					</div><!-- .entry-content -->

				</div><!-- #post-## -->
                
                <div class="aclear"></div>
                
                

<?php if($blogfbcomments) : ?>
<?php /* Facebook Comments */ ?>

<div id="fbcomments">

<div class="commenttitle2"><h2>Facebook Comments:</h2></div>

<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php echo $thesharelink; ?>" show_faces="true" send="true" width="620"></fb:like>

<div id="fb-root" style="padding-top:8px;"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=<?php echo $facebookappid; ?>";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-comments" data-href="<?php the_permalink() ?>" data-num-posts="20" data-width="620" publish_feed="true"></div>

</div>

<?php /* end Facebook Comments */ ?>
<?php endif; ?>

<div id="commentsbox">

<?php if(!$blogdeactivatecomments) { // if Wordpress Comments is deactivated ?>
<div class="commenticon"></div><div class="commenttitle"><h2>Leave A Reply (<?php comments_number('No comments','1 comment','% comments'); ?> so far)</h2></div><div class="aclear"></div>
				<?php comments_template( '', true ); ?>
<?php } ?>
                
                </div>

<?php endwhile; // end of the loop. ?>



</div><!--close blogmain-->

</div>

<div id="blogsidebar">
<?php if ( is_active_sidebar( 'sidebar-7' ) ) : dynamic_sidebar( 'sidebar-7' ); endif; ?>
</div><!--close blog sidebar-->

<div class="aclear"></div>

</div><!--close inner wrapper-->


<div class="aclear"></div>

</div><!--close wrapper-->


</div>


<div id="blogfooter"></div><!--close footer-->

<div id="footer">

<div id="footer-inside">


<div class="footer-right">
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
</div>
<div class="footer-left">Copyright &copy; <?php echo ($footer_text) ? stripslashes($footer_text) : ""; ?>
	<?php echo ($footer_poweredby) ? ( ($footer_afflink) ? '<a href="'.$footer_afflink.'">Powered by OptimizePress</a>' : 'Powered by OptimizePress' ) : ''; ?>
</div>
</div>
</div><!--close footer-->

<?php // custom tracking code
echo ($customtrackingcodefooter) ? eval('?>'.stripcslashes(stripslashes($customtrackingcodefooter))) : ""; ?>

<?php echo ($postcustom['_seo_footertrackingjscode']) ? eval('?>'.stripcslashes($postcustom['_seo_footertrackingjscode'][0])) : ""; ?>

<?php wp_footer(); ?>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
</body>

<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/combinebottom.js"></script>
<script type="text/javascript">
Cufon.replace('#headertext', { 
			  fontFamily: '<?php echo $blogheadertextfont; ?>' ,
			  textShadow: '1px 1px #<?php echo stripcslashes($blogheadertextshadowcolor); ?>'
			  });
</script>

</html>