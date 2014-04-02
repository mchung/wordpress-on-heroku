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


<h1>OptimizePress Getting Started Guide</h1>

<p>Thank you for choosing OptimizePress.  OptimizePress is based around using pages and templates for your site rather than a typical blog layout.  Follow the steps below to get started:</p>
<p>1) Login to Wordpress
  <br />
  2) Click The <strong>Pages</strong> tab
  <br />
  3) Click <strong>"Add New"</strong> to create a new page<br />
  4) Select a Template style from the templates drop down on the right side of your screen
  <br />
  5) Use the build in admin fields to customize your page (please refer to the User guide for more information)
  <br />
  6) Click <strong>Publish</strong> to save and publish your page<br />
7) Go To <strong>Settings</strong> > <strong>General</strong> > <strong>Reading</strong> > Select a static page from the dropdown for your home page (this will normally be your sales letter or squeeze page)<br />
8) You're done! Continue creating amazing looking pages using the simple OptimizePress interface<br /><br />

If you require additional support with this please refer to the User Guide and FAQ (accessed from within your Wordpress theme admin) </p>

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

<div class="footer-left">Copyright &copy; <?php echo ($footer_text) ? stripslashes($footer_text) : ""; ?>
	<?php echo ($footer_poweredby) ? ( ($footer_afflink) ? '<a href="'.$footer_afflink.'">Powered by OptimizePress</a>' : 'Powered by OptimizePress' ) : ''; ?>
</div>
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


</div>
</div><!--close footer-->

<?php // custom tracking code
echo ($customtrackingcodefooter) ? eval('?>'.stripcslashes(stripslashes($customtrackingcodefooter))) : ""; ?>
<?php echo ($postcustom['_seo_footertrackingjscode']) ? eval('?>'.stripcslashes($postcustom['_seo_footertrackingjscode'][0])) : ""; ?>

<?php wp_footer(); ?>
</body>

</html>
