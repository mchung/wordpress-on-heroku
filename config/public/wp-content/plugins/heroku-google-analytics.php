<?php
/*
Plugin Name: Google Analytics for Wordpress on Heroku
Plugin URI: http://github.com/mchung/heroku-buildpack-wordpress
Description: Google Analytics Wordpress plugin for Wordpress sites running on Heroku. Depends on GOOG_UA_ID
Version: 1.0
Author: Marc Chung
Author URI: http://www.marcchung.com
License: MIT
*/
add_action('wp_head', 'heroku_google_analytics');

function heroku_google_analytics() {
  $google_analytics_ua = getenv('GOOG_UA_ID');
  if (!empty($google_analytics_ua)) {
?>
    <script type="text/javascript">
    //<![CDATA[
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', '<?php echo $google_analytics_ua; ?>']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    //]]>
    </script>
<?php
  }
}
?>