jQuery(document).ready(function() {
	var fileInput = '',
		et_upload_field_name = '',
		et_tb_interval;

	jQuery('.upload_image_button').click(function() {
		fileInput = jQuery(this).parent().prev('input.uploadfield');

		et_upload_field_name = jQuery(this).parents('.epanel-box').find('.box-title > h3').text();
		et_tb_interval = setInterval( function() {
			jQuery('#TB_iframeContent').contents().find('.savesend .button').val('Use for ' + et_upload_field_name);
		}, 2000 );

		post_id = jQuery('#post_ID').val();
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;
	});

	jQuery('.upload_image_reset').click(function() {
		jQuery(this).parent().prev('input.uploadfield').val('');
	});

	// user inserts file into post. only run custom if user started process using the above process
	// window.send_to_editor(html) is how wp would normally handle the received data

	window.original_send_to_editor = window.send_to_editor;
	window.send_to_editor = function(html){
		if (fileInput) {
			clearInterval(et_tb_interval);
			fileurl = jQuery('img',html).attr('src');

			fileInput.val(fileurl);

			tb_remove();
		} else {
			window.original_send_to_editor(html);
		}
	};

});