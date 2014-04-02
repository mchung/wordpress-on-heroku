<?php include_once( 'class-custom-theme-updater.php' );
$dummy_updater = new Custom_Theme_Updater( 'http://optimizepressdemo.com/api/', 'OptimizePress' );
add_filter( 'theme_api', 'theme_api_filter', 10, 3);

	function theme_api_filter( $_data, $_action = '', $_args = null )
	{
		if ( $_action != 'theme_information' ) return $_data;

		var_dump( $_data );

		return $_data;
	}

// Instantiate the class
require_once(TEMPLATEPATH . '/admin/clshelpfields.php');
require_once(TEMPLATEPATH . '/admin/clscustomfields.php');
require_once(TEMPLATEPATH . '/admin/clsblogfields.php');
require_once(TEMPLATEPATH . '/admin/clsmemcustomfields.php');
require_once(TEMPLATEPATH . '/admin/clslpcustomfields.php');
require_once(TEMPLATEPATH . '/admin/clsseocustomfields.php');
require_once(TEMPLATEPATH . '/admin/clspluspack.php');
if ( class_exists('myHelpFields') ) {
	$myHelpFields_var = new myHelpFields();
}

if ( class_exists('myCustomFields') ) {
	$myCustomFields_var = new myCustomFields();
}

if ( class_exists('myBlogFields') ) {
	$myBlogFields_var = new myBlogFields();
}

if ( class_exists('myLpCustomFields') ) {
	$myLpCustomFields_var = new myLpCustomFields();
}

if ( class_exists('myMemCustomFields') ) {
	$myMemCustomFields_var = new myMemCustomFields();
}


// Instantiate the class
if ( class_exists('mySeoCustomFields') ) {
	$mySeoCustomFields_var = new mySeoCustomFields();
}

if ( class_exists('myPlusPackFields') ) {
	$myPlusPackFields_var = new myPlusPackFields();
}


/* Admin Sidebar Panel */
// integrates duplicate post plugin w/o installing it
require_once(TEMPLATEPATH . '/admin/duplicate-post.php');
/**
 * Defines the necessary constants and includes the necessary files.
 */

// Define Directory Constants
define('OPTPRESS_LIB', TEMPLATEPATH . '/lib');
define('OPTPRESS_ADMIN', OPTPRESS_LIB . '/admin');
define('OPTPRESS_CLASSES', OPTPRESS_LIB . '/classes');
define('OPTPRESS_FUNCTIONS', OPTPRESS_LIB . '/functions');
define('OPTPRESS_INCLUDES', OPTPRESS_LIB . '/includes');
define('OPTPRESS_ADMIN_CSS', get_template_directory_uri() . '/lib/admin/css' );
define('OPTPRESS_ADMIN_JS', get_template_directory_uri() . '/lib/admin/js' );
define('OPTPRESS_JS', get_template_directory_uri() . '/lib/scripts' );
require_once(OPTPRESS_LIB . '/classes/Seo.php');

// Define Folder Constants
define('OPTPRESS_SCRIPTS_FOLDER', get_bloginfo('template_url') . '/lib/scripts');

// Load Theme Options
require_once(OPTPRESS_ADMIN . '/admin-options.php');

// Load Admin Interface
require_once(OPTPRESS_ADMIN . '/admin-interface.php');

// Load Admin Scripts and Css
require_once(OPTPRESS_ADMIN . '/admin-scripts.php');

// Load TinyMCE Plugin
require_once(OPTPRESS_ADMIN . '/tinymce/tinymce.php');

// Load wp-pagenavi
require_once(OPTPRESS_INCLUDES . '/wp-pagenavi.php');

// Load Options from the Database
require_once(OPTPRESS_INCLUDES . "/var.php");

// Load Theme Functions
require_once(OPTPRESS_FUNCTIONS . '/theme-functions.php');

// Load Custom Shortcodes
require_once(OPTPRESS_FUNCTIONS . '/shortcode.php');

// Redirect To Theme Options Page on Activation
if ($_GET['activated']){
wp_redirect(admin_url("admin.php?page=$page_handle&upgraded=true"));
}

function time_ago( $type = 'comment' ) {
	$d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
	return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago');
}

// force a line break in wordpress
$init = array();
function nice_mce_options($init) {
		$init['remove_linebreaks'] = false;
		$init['apply_source_formatting'] = true;
	return $init;
}
apply_filters( 'tiny_mce_before_init', 'nice_mce_options' );
apply_filters( 'teeny_mce_before_init', 'nice_mce_options' );


function getImages($dir)
  {
    global $imagetypes;

    # array to hold return value
    $retval = array();

    # add trailing slash if missing
    if(substr($dir, -1) != "/") $dir .= "/";

    # full server path to directory
    $fulldir = "{$_SERVER['DOCUMENT_ROOT']}/$dir";

    $d = @dir($fulldir) or die("getImages: Failed opening directory $dir for reading");
    while(false !== ($entry = $d->read())) {
      # skip hidden files
      if($entry[0] == ".") continue;

      # check for image files
      if(in_array(mime_content_type("$fulldir$entry"), $imagetypes)) {
        $retval[] = array(
         "file" => "/$dir$entry",
         "size" => getimagesize("$fulldir$entry")
        );
      }
    }
    $d->close();

    return $retval;
  }

// membership page options
function my_custom_login_page() {
	require(OPTPRESS_INCLUDES . "/var.php");
    echo '<style type="text/css">
html, body {background:#'.$membershippagebgcolor.';}
html{background:#'.$membershippagebgcolor.';}
body{background:#'.$membershippagebgcolor.';}
h1 a { background-image:url('.$membershippagelogourl.') !important;height:123px; }
.login h1 a {height:123px;background-size:auto;}
body.login {background:#'.$membershippagebgcolor.';}
    </style>';
}

add_action('login_head', 'my_custom_login_page');

// Setup Navigation Bar For Members area

//dd_action('init', 'register_custom_menus');
 
//function register_custom_menu() {
//register_nav_menu('custom_menu', __('Membership Menu'));
//}

add_action( 'init', 'register_my_menus' );

function register_my_menus() {
	if ( function_exists( 'register_nav_menus' ) ) {
		register_nav_menus(
			array(
				'custom_menu' => __( 'Membership Menu' ),
				'blog_menu' => __( 'Blog Menu' ),
				'sales_menu' => __( 'Sales Menu' ),
				'squeeze_menu' => __( 'Squeeze Page Menu' )
			)
		);
	}
}



// Function that output's the contents of the dashboard widget
function optimizepress_widget_function() {
	echo '<div class="rss-widget">';
	wp_widget_rss_output( 'http://www.facebook.com/feeds/page.php?format=atom10&id=158684170823047', array('items' => 4, 'show_author' => 1, 'show_date' => 1, 'show_summary' => 1) );
	echo "</div>";
}

// Function that beeng used in the action hook
function add_optimizepress_widgets() {
	wp_add_dashboard_widget('optimizepress_widget', 'OptimizePress Updates', 'optimizepress_widget_function');
}

// Register the new optimizepress widget into the 'wp_dashboard_setup' action
add_action('wp_dashboard_setup', 'add_optimizepress_widgets' );

// Pagination 
function i_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}

function optimizepress_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
  		<li id="comment-<?php comment_ID(); ?>">


  <div class="launchcommentspic"><?php 
   echo get_avatar( $comment, 75 ); 
   ?><br>
<span style="color:#636363;"><?php comment_author_link(); ?></span><br>
<?php 
$postcustom = get_post_custom($post->ID); ?>
<?php echo ($postcustom['_launchpage_disabledatewpcomments']) ? '' : time_ago(); ?>
</div>

<div style="float:left;" class="commentswidth">
	<?php if ($comment->comment_approved == '0') : ?>
  				<p>Your comment is awaiting approval</p>
  			<?php endif; ?>
  			<?php comment_text(); ?>
  			

</div>
<div style="clear:both;"></div>
  		
<?php         }

function optimizepressautop($pee, $br = 1) {

	if ( trim($pee) === '' )
		return '';
	$pee = $pee . "\n"; // just to make things a little easier, pad the end
	$pee = preg_replace('|<br />\s*<br />|', "\n\n", $pee);
	// Space things out a little
	$allblocks = '(?:table|thead|tfoot|caption|col|colgroup|tbody|tr|td|th|div|dl|dd|dt|ul|ol|li|pre|select|option|form|map|area|blockquote|address|math|style|input|p|h[1-6]|hr|fieldset|legend|section|article|aside|hgroup|header|footer|nav|figure|figcaption|details|menu|summary)';
	$pee = preg_replace('!(<' . $allblocks . '[^>]*>)!', "\n$1", $pee);
	$pee = preg_replace('!(</' . $allblocks . '>)!', "$1\n\n", $pee);
	$pee = str_replace(array("\r\n", "\r"), "\n", $pee); // cross-platform newlines
	if ( strpos($pee, '<object') !== false ) {
		$pee = preg_replace('|\s*<param([^>]*)>\s*|', "<param$1>", $pee); // no pee inside object/embed
		$pee = preg_replace('|\s*</embed>\s*|', '</embed>', $pee);
	}
	$pee = preg_replace("/\n\n+/", "\n\n", $pee); // take care of duplicates
	// make paragraphs, including one at the end
	$pees = preg_split('/\n\s*\n/', $pee, -1, PREG_SPLIT_NO_EMPTY);
	$pee = '';
	foreach ( $pees as $tinkle )
		$pee .= '<p>' . trim($tinkle, "\n") . "</p>\n";
	$pee = preg_replace('|<p>\s*</p>|', '', $pee); // under certain strange conditions it could create a P of entirely whitespace
	$pee = preg_replace('!<p>([^<]+)</(div|address|form)>!', "<p>$1</p></$2>", $pee);
	$pee = preg_replace('!<p>\s*(</?' . $allblocks . '[^>]*>)\s*</p>!', "$1", $pee); // don't pee all over a tag
	$pee = preg_replace("|<p>(<li.+?)</p>|", "$1", $pee); // problem with nested lists
	$pee = preg_replace('|<p><blockquote([^>]*)>|i', "<blockquote$1><p>", $pee);
	$pee = str_replace('</blockquote></p>', '</p></blockquote>', $pee);
	$pee = preg_replace('!<p>\s*(</?' . $allblocks . '[^>]*>)!', "$1", $pee);
	$pee = preg_replace('!(</?' . $allblocks . '[^>]*>)\s*</p>!', "$1", $pee);
	if ($br) {
		$pee = preg_replace_callback('/<(script|style).*?<\/\\1>/s', create_function('$matches', 'return str_replace("\n", "<WPPreserveNewline />", $matches[0]);'), $pee);
		$pee = preg_replace('|(?<!<br />)\s*\n|', "<br />\n", $pee); // optionally make line breaks
		$pee = str_replace('<WPPreserveNewline />', "\n", $pee);
	}
	$pee = preg_replace('!(</?' . $allblocks . '[^>]*>)\s*<br />!', "$1", $pee);
	$pee = preg_replace('!<br />(\s*</?(?:p|li|div|dl|dd|dt|th|pre|td|ul|ol)[^>]*>)!', '$1', $pee);
	if (strpos($pee, '<pre') !== false)
		$pee = preg_replace_callback('!(<pre[^>]*>)(.*?)</pre>!is', 'clean_pre', $pee );
	$pee = preg_replace( "|\n</p>$|", '</p>', $pee );

	return $pee;
}

function field_func($atts) {
global $post;
$name = $atts['name'];
if (empty($name)) return;

return get_post_meta($post->ID, $name, true);
}

add_shortcode('optfield', 'field_func');


// Load Old Custom Shortcodes
require_once(OPTPRESS_FUNCTIONS . '/shortcode_old.php');


add_filter('widget_text', 'do_shortcode');

function excerpt($num)
{
	$limit = $num+1;
	$excerpt = explode(' ', get_the_excerpt().' ', $limit);
	array_pop($excerpt);
	$excerpt = implode(" ",$excerpt)."…";
	echo $excerpt;
}

function my_init() {
 if (!is_admin()) {
 wp_enqueue_script('jquery');
 }
}
add_action('init', 'my_init');

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action('wp_head','parent_post_rel_link_wp_head',10,0);// Removes the prev link remove_action('wp_head','adjacent_posts_rel_link_wp_head',10,0);// Removes the relational links for the posts adjacent to the current post.


?>