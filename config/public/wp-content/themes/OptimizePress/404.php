<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<?php get_header();?>
<div id="wrapper">


        
     <div id="launchheader">
    </div>
    
    
    <div id="launchheaderbottom"></div>




<div id="launchbk">


<div id="launch1left">

    
   
    
      <div class="aclear"></div>
      
      
      
  

  
  <div id="launchinnermain">

<h1>Error 404 - Page Not Found</h1>

<p>We couldn't find the page you were looking for.  Please return to the <a href="<?php echo bloginfo('home'); ?>">home page</a></p>


</div><!--close launchinnermain-->
  











</div><!--close launch1left-->



    <div class="aclear"></div>











<div class="aclear"></div>

</div><!--Close launchbk-->
<div id="launchfooter"></div>
</div><!--Close launchwrapper-->
<div id="wrapper">
  
  

</div><!--Close wrapper-->

<div id="footer">

<div id="footer-inside">


<div class="footer-right">
<?php if($postcustom['_launchpage_showfooterlinks'][0]) { ?>
	<?php if($footer_include) { ?>
    <ul>		<?php         function new_nav_menu_items($items) {
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

<?php // custom tracking code
echo ($customtrackingcodefooter) ? eval('?>'.stripcslashes(stripslashes($customtrackingcodefooter))) : ""; ?>
<?php echo ($postcustom['_seo_footertrackingjscode']) ? eval('?>'.stripcslashes($postcustom['_seo_footertrackingjscode'][0])) : ""; ?>

<?php wp_footer(); ?>
</body>

</html>
