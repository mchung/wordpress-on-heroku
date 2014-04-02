<?php include 'wp-config.php'; 
$shortname='OptimizePress' ;?>
<script type="text/javascript">	
	document.cookie = 'OptPressSqueeze=1199;expires=Wed, 3 Aug 2012 20:47:11 UTC';
	document.cookie = 'OptimizePressLastPage=0;expires=Wed, 3 Aug 2012 20:47:11 UTC';
</script>
<?php 
$LncPage1URL = get_permalink( get_option($shortname.'_launch_page_1') );
echo "<script>window.location='".$LncPage1URL."'</script>";
?>