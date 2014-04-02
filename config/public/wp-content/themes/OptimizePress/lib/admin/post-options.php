<?php
/**
 * Post and Page Meta Box Theme Options
 */
function optpress_meta_boxes($meta_name = false) {
	global $themename;

	$meta_boxes = array(
'generalpost' => array(
	'id' => 'optpress_generalpost_meta',
	'title' => $themename . ' General Post Options',
	'function' => 'optpress_generalpost_meta_box',
	'noncename' => 'optpress_generalpost',
			
			
	'fields' => array(
		'frontpage_meta_image' => array(
			'name' => 'frontpage_image',
			'type' => 'text',
			'width' => 'full',
			'default' => '',
			'title' => 'Frontpage Slider Image',
			'description' => 'Paste the full url of the image you would like to use for the frontpage slider image e.g. \'http://www.yoursite.com/slider_img.png\'. If you would like the image to take up the full width of the slider the image dimensions should be 960 x 400 pixels.',
			'label' => '',
			'margin' => true,
			),
		'frontpage_meta_stage' => array(
			'name' => 'frontpage_stage',
			'type' => 'select_stage',
			'width' => '',
			'default' => '',
			'title' => 'Stage Effect',
			'description' => 'Select the the staging effect that you would like for this homepage slide. The "stage" effect is ideal for unprocessed images as they will automatically be framed for you.',
			'label' => '',
			'margin' => true,
			),
		'frontpage_meta_text' => array(
			'name' => 'frontpage_disable_text',
			'type' => 'checkbox',
			'width' => 'full',
			'default' => '',
			'value' => '1',
			'title' => 'Disable Slider Text',
			'desc' => 'Check to Disable Slider Text',
			'description' => 'Check this box if you would like to disable the post excerpt content from appearing on the homepage slider.',
			'label' => '',
			'margin' => true,
			),
		'post_meta_image' => array(
			'name' => 'post_image',
			'type' => 'text',
			'width' => 'full',
			'default' => '',
			'title' => 'Post Image',
			'description' => 'Paste the full url of the image you would like to use for the default post image e.g. \'http://www.yoursite.com/post_img.png\'. This image is used for your themes Related Posts, Popular Posts & Recent Posts Widgets as well as your blogs index page.',
			'label' => '',
			'margin' => true,
			),	
		'selected_sidebar_meta' => array(
			'name' => 'selected_sidebar',
			'type' => 'select_sidebar',
			'width' => '',
			'default' => '',
			'title' => 'Custom Sidebar',
			'description' => 'Select the custom sidebar that you would like to be displayed on this post. <br />Note: you will need to first create a custom sidebar in your themes option panel before it will show up here.',
			'label' => '',
			'margin' => true,
			),
		'teaser_text_meta' => array(
			'name' => 'teaser_text',
			'type' => 'radio_toggle',
			'width' => 'full',
			'default' => '',
			'value' => 'default',
			'value2' => 'custom',
			'value3' => 'twitter',
			'value4' => 'disable',
			'desc' => 'Default',
			'desc2' => 'Custom',
			'desc3' => 'Twitter',
			'desc4' => 'Disable',
			'title' => 'Header Teaser Text',
			'description' => 'Here you can override the general header teaser text options on a post by post basis.',
			'label' => '',
			'margin' => true,
			),
		'teaser_text_custom_meta' => array(
			'name' => 'teaser_text_custom',
			'type' => 'textarea',
			'width' => 'full',
			'default' => '',
			'title' => 'Header Teaser Custom Text',
			'description' => 'If the "Custom" "Header Teaser Text" option is selected above any text you enter here will override your general custom header teaser text option.',
			'label' => '',
			'margin' => false,
	)
  )
),

'generalpage' => array(
	'id' => 'optpress_generalpage_meta',
	'title' => $themename . ' General Page Options',
	'function' => 'optpress_generalpage_meta_box',
	'noncename' => 'optpress_generalpage',
			
			
	'fields' => array(
		'selected_sidebar_meta' => array(
			'name' => 'selected_sidebar',
			'type' => 'select_sidebar',
			'width' => '',
			'default' => '',
			'title' => 'Custom Sidebar',
			'description' => 'Select the custom sidebar that you would like to be displayed on this page. <br />Note: you will need to first create a custom sidebar in your themes option panel before it will show up here.',
			'label' => '',
			'margin' => true,
			),
		'teaser_text_meta' => array(
			'name' => 'teaser_text',
			'type' => 'radio_toggle',
			'width' => 'full',
			'default' => '',
			'value' => 'default',
			'value2' => 'custom',
			'value3' => 'twitter',
			'value4' => 'disable',
			'desc' => 'Default',
			'desc2' => 'Custom',
			'desc3' => 'Twitter',
			'desc4' => 'Disable',
			'title' => 'Header Teaser Text',
			'description' => 'Here you can override the general header teaser text options on a page by page basis.',
			'label' => '',
			'margin' => true,
			),
		'teaser_text_custom_meta' => array(
			'name' => 'teaser_text_custom',
			'type' => 'textarea',
			'width' => 'full',
			'default' => '',
			'title' => 'Header Teaser Custom Text',
			'description' => 'If the "Custom" "Header Teaser Text" option is selected above any text you enter here will override your general custom header teaser text option.',
			'label' => '',
			'margin' => false,
	)
  )
),

'portfolio' => array(
	'id' => 'optpress_portfolio_page_meta',
	'title' => $themename . ' Portfolio Page Options',
	'function' => 'optpress_portfolio_page_meta_box',
	'noncename' => 'optpress_portfolio',
	
	
	'fields' => array(
		'portfolio_date_meta' => array(
			'name' => 'portfolio_date',
			'type' => 'text',
			'width' => '',
			'default' => '',
			'title' => 'Portfolio Date <small>(optional)</small>',
			'description' => 'Enter the date that the project was completed.',
			'label' => '',
			'margin' => true,
		),
		'portfolio_link_meta' => array(
			'name' => 'portfolio_link',
			'type' => 'text',
			'width' => 'full',
			'default' => '',
			'title' => 'Portfolio Link <small>(optional)</small>',
			'description' => 'Enter the url of the project for the "Visit Site" button.',
			'label' => '',
			'margin' => true,
		),
		'portfolio_gallery_img_meta' => array(
			'name' => 'portfolio_gallery_img',
			'type' => 'text',
			'width' => 'full',
			'default' => '',
			'title' => 'Portfolio Gallery Image <small>(optional)</small>',
			'description' => 'Paste the full url of the image you would like to use for the portfolio gallery image e.g. \'http://www.yoursite.com/portfolio_small_img.png\'. The image dimensions should be 447 x 246 pixels or 276 x 151 pixels depending on which "Portfolio View" you choose.',
			'label' => '',
			'margin' => true,
		),
		'portfolio_full_img_meta' => array(
			'name' => 'portfolio_full_img',
			'type' => 'text',
			'width' => 'full',
			'default' => '',
			'title' => 'Portfolio Fullsize Image <small>(required)</small>',
			'description' => 'Paste the full url of the image you would like to use for the portfolio fullsize image e.g. \'http://www.yoursite.com/portfolio_full_img.png\'. The portfolio fullsize image dimensions should be 945 x 516 pixels or 612 x 234 pixels depending on which "Portfolio Post Layout" you choose.',
			'label' => '',
			'margin' => true,
		),
		'portfolio_video_link_meta' => array(
			'name' => 'portfolio_video_link',
			'type' => 'text',
			'width' => 'full',
			'default' => '',
			'title' => 'Portfolio Video Link <small>(optional)</small>',
			'description' => $themename. ' uses the jQuery lightbox pop-up effect called prettyPhoto. prettyPhoto supports Flash, YouTube, Vimeo & iFrames. Examples on how to format the links can be found here: <br /><a href="http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/" target="_blank">http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/</a> under Demos on there homepage.',
			'label' => '',
			'margin' => true,
		),
		'portfolio_teaser_text_meta' => array(
			'name' => 'portfolio_teaser_text',
			'type' => 'textarea',
			'width' => 'full',
			'default' => '',
			'title' => 'Portfolio Teaser Text <small>(optional)</small>',
			'description' => 'The text you enter here will show up next to or below the gallery image depending on which "Portfolio View" you have selected.',
			'label' => '',
			'margin' => true,
		),
		'portfolio_post_layout_meta' => array(
			'name' => 'portfolio_post_layout',
			'type' => 'checkbox',
			'width' => 'full',
			'default' => '',
			'desc' => 'Check for standard Blog Post Layout',
			'value' => '1',
			'title' => 'Portfolio Post Layout <small>(optional)</small>',
			'description' => 'When you click on the "Read More" button from your Portfolio Gallery the default blog post layout is a full page display with no sidebar and your fullsize portfolio image sized at 945 x 516 pixels. Check the box below if you would prefer the standard blog post layout with sidebar and your fullsize portfolio image sized at 612 x 234 pixels',
			'label' => '',
			'margin' => true,
		),
		'portfolio_link_target_meta' => array(
			'name' => 'portfolio_read_disable',
			'type' => 'checkbox',
			'width' => 'full',
			'default' => '',
			'desc' => 'Check to Disable Read More Link',
			'value' => '1',
			'title' => 'Disable Read More Link <small>(optional)</small>',
			'description' => 'Check this box if you would like to disable the portfolio "Read More" button which links to the blog post.',
			'label' => '',
			'margin' => false,
	)
  )
),

);

	if ($meta_name)
		return $meta_boxes[$meta_name];
	else
		return $meta_boxes;
}


function optpress_add_meta_box($box_name) {
global $post;

$meta_box = optpress_meta_boxes($box_name);

foreach ($meta_box['fields'] as $meta_id => $meta_field){
	
$existing_value = get_post_meta($post->ID, $meta_field['name'], true);
$value = ($existing_value != '') ? $existing_value : $meta_field['default'];
$margin = ($meta_field['margin']) ? ' class="add_margin"' : '';

if ($meta_field['description']) {
	$switch = ' <a class="switch" href="">[+] more info</a>';
	$description = '<p class="description">' . $meta_field['description'] . '</p>' . "\n";
}else{
	$switch = '';
	$description = '';
}
	
?>
<div id="<?php echo $meta_id; ?>" class="optpress-post-control">
<p><strong><?php echo $meta_field['title']; ?></strong><?php echo $switch; ?></p><?php if ($description){echo $description;}?>

<?php switch ( $meta_field['type'] ) { 

case 'textarea':
?>
<p<?php echo $margin; ?>>
<textarea id="<?php echo $meta_field['name']; ?>" name="<?php echo $meta_field['name']; ?>" type="textarea" cols="40" rows="2"><?php echo $value; ?></textarea>
<br /><label for="<?php echo $meta_field['name']; ?>"><?php echo $meta_field['label']; ?></label>
<?php 

break;
case "text":
?>
<?php $width = ($meta_field['width']) ? ' ' . $meta_field['width'] : ''; ?>
<p<?php echo $margin; ?>>
<input type="text" value="<?php echo $value; ?>" name="<?php echo $meta_field['name']; ?>" id="<?php echo $meta_field['name']; ?>" class="text_input<?php echo $width; ?>"/>
<br /><label for="<?php echo $meta_field['name']; ?>"><?php echo $meta_field['label']; ?></label>
</p>
<?php

break;
case "radio":
?>
<p<?php echo $margin; ?>>
<label><input name="<?php echo $meta_field['name']; ?>" id="<?php echo $meta_field['name']; ?>" type="radio" value="<?php echo $meta_field['value']; ?>" <?php if ($existing_value == $meta_field['value'] || $existing_value == ""){echo 'checked="checked"';}?> /> <?php echo $meta_field['desc']; ?></label><br />
<label><input name="<?php echo $meta_field['name']; ?>" id="<?php echo $meta_field['name']; ?>_2" type="radio" value="<?php echo $meta_field['value2']; ?>" <?php if ($existing_value == $meta_field['value2']){echo 'checked="checked"';}?> /> <?php echo $meta_field['desc2']; ?></label>
</p>
<?php

break;
case "radio_toggle":
?>
<p<?php echo $margin; ?>><label><input name="<?php echo $meta_field['name']; ?>" id="<?php echo $meta_field['name']; ?>" class="selector" type="radio" value="<?php echo $meta_field['value']; ?>" <?php if ($existing_value == $meta_field['value'] || $existing_value == ""){echo 'checked="checked"';}?> /> <?php echo $meta_field['desc']; ?></label><br />

<label><input name="<?php echo $meta_field['name']; ?>" id="<?php echo $meta_field['name']; ?>_2" class="selector" type="radio" value="<?php echo $meta_field['value2']; ?>" <?php if ($existing_value == $meta_field['value2']){echo 'checked="checked"';}?> /> <?php echo $meta_field['desc2']; ?></label><br />

<label><input name="<?php echo $meta_field['name']; ?>" id="<?php echo $meta_field['name']; ?>_3" class="selector" type="radio" value="<?php echo $meta_field['value3']; ?>" <?php if ($existing_value == $meta_field['value3']){echo 'checked="checked"';}?> /> <?php echo $meta_field['desc3']; ?></label><br />

<label><input name="<?php echo $meta_field['name']; ?>" id="<?php echo $meta_field['name']; ?>_4" class="selector" type="radio" value="<?php echo $meta_field['value4']; ?>" <?php if ($existing_value == $meta_field['value4']){echo 'checked="checked"';}?> /> <?php echo $meta_field['desc4']; ?></label>
</p>
<?php

break;
case "checkbox":
?>
<p<?php echo $margin; ?>>
<input name="<?php echo $meta_field['name']; ?>" id="<?php echo $meta_field['name']; ?>" type="checkbox" value="<?php echo $meta_field['value']; ?>" <?php if ($existing_value == $meta_field['value']){echo 'checked="checked"';}?> /> <?php echo $meta_field['desc']; ?>
</p>
<?php

break;
case "select_stage":
?>
<p<?php echo $margin; ?>>
<select name="<?php echo $meta_field['name']; ?>">
<?php
$stage_effect = array("stage","full","full-cropped");

foreach ($stage_effect as $stage_effect) {	
	if($existing_value == $stage_effect){
		echo "<option value='$stage_effect' selected>$stage_effect</option>\n";
	}else{
		echo "<option value='$stage_effect'>$stage_effect</option>\n";
	}
}
?>
</select>
</p>
<?php

break;
case "select_sidebar":
?>
<p<?php echo $margin; ?>>
<select name="<?php echo $meta_field['name']; ?>">
	<option value=""<?php if($existing_value == ''){ echo " selected";} ?>>Select A Sidebar</option>
<?php
$sidebars = sidebar_generator_optpress::get_sidebars();
if(is_array($sidebars) && !empty($sidebars)){
	foreach($sidebars as $sidebar){
		if($existing_value == $sidebar){
			echo "<option value='$sidebar' selected>$sidebar</option>\n";
		}else{
			echo "<option value='$sidebar'>$sidebar</option>\n";
		}
	}
}
?>
</select>
</p>
<?php

break;
}
?>

</div>
<?php } ?>
<input type="hidden" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" id="<?php echo $meta_box['noncename']; ?>_noncename" name="<?php echo $meta_box['noncename']; ?>_noncename"/>
<?php 
}

function optpress_save_meta($post_id) {
	$meta_boxes = optpress_meta_boxes();
	
	$svr_uri = $_SERVER['REQUEST_URI'];
	foreach($meta_boxes as $meta_box) {
		if ( strstr($svr_uri, 'post.php') || strstr($svr_uri, 'post-new.php') ) {	
			if (!wp_verify_nonce($_POST['optpress_generalpost_noncename'], plugin_basename(__FILE__)))
				return $post_id;
			if (!wp_verify_nonce($_POST['optpress_portfolio_noncename'], plugin_basename(__FILE__)))
				return $post_id;
		}

		if ( strstr($svr_uri, 'page.php') || strstr($svr_uri, 'page-new.php') ) {	
			if (!wp_verify_nonce($_POST['optpress_generalpage_noncename'], plugin_basename(__FILE__)))
				return $post_id;
		}
	}

	if ($_POST['post_type'] == 'page') {
		if (!current_user_can('edit_page', $post_id))
			return $post_id;
	}
	else {
		if (!current_user_can('edit_post', $post_id))
			return $post_id;
	}
		if ( isset($_GET['post']) && isset($_GET['bulk_edit']) )
			return $post_id;

	foreach ($meta_boxes as $meta_box) {
		foreach ($meta_box['fields'] as $meta_field) {
			$current_data = get_post_meta($post_id, $meta_field['name'], true);	
			$new_data = $_POST[$meta_field['name']];

			if ($current_data) {
				if ($new_data == '')
					delete_post_meta($post_id, $meta_field['name']);
				elseif ($new_data == $meta_field['default'])
					delete_post_meta($post_id, $meta_field['name']);
				elseif ($new_data != $current_data)
					update_post_meta($post_id, $meta_field['name'], $new_data);
			}
			elseif ($new_data != '')
				add_post_meta($post_id, $meta_field['name'], $new_data, true);
		}
	}
}

function optpress_generalpost_meta_box() {
	optpress_add_meta_box('generalpost');
}

function optpress_generalpage_meta_box() {
	optpress_add_meta_box('generalpage');
}

function optpress_portfolio_page_meta_box() {
	optpress_add_meta_box('portfolio');
}

function optpress_add_meta_boxes() {
	$meta_boxes = optpress_meta_boxes();
	
	$i=1;
	foreach ($meta_boxes as $meta_box) {	
		if($i != 2){
		add_meta_box($meta_box['id'], $meta_box['title'], $meta_box['function'], 'post', 'normal', 'high');
		}
		if ($i == 2){
		add_meta_box($meta_box['id'], $meta_box['title'], $meta_box['function'], 'page', 'normal', 'high');	
		}
		$i++;	
	}
	
	add_action('save_post', 'optpress_save_meta');
}
	add_action('admin_menu', 'optpress_add_meta_boxes')
?>