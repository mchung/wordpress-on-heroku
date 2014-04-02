jQuery(document).ready(function() {
	jQuery('.image_upload_button').each(function(){

		var clickedObject = jQuery(this);
		var clickedID = jQuery(this).attr('id');
		var actionURL = jQuery(this).parent().find('.ajax_action_url').val();

		new AjaxUpload(clickedID, {
			action: actionURL,
			name: clickedID, // File upload name
			data: { // Additional data to send
					action: 'op_ajax_post_action',
					type: 'upload',
					data: clickedID 
			      },
			autoSubmit: true, // Submit file after selection
			responseType: false,
			onChange: function(file, extension){},
			onSubmit: function(file, extension){
				clickedObject.text('Uploading'); // change button text, when user selects file	
				this.disable(); // If you want to allow uploading only 1 file at time, you can disable upload button
				interval = window.setInterval(function(){
					var text = clickedObject.text();
					if (text.length < 13) {
						clickedObject.text(text + '.'); 
					} else { clickedObject.text('Uploading'); } 
				}, 200);
			},
			
			onComplete: function(file, response) {
				   
				window.clearInterval(interval);
				clickedObject.text('Upload Image');	
				this.enable(); // enable upload button
					
				// If there was an error
				if(response.search('Upload Error') > -1){
					var buildReturn = '<span class="upload-error">' + response + '</span>';
					jQuery(".upload-error").remove();
					clickedObject.parent().after(buildReturn);
				} else {
				
					jQuery(".upload-error").remove();
					clickedObject.next('span').fadeIn();
					clickedObject.parent().find('.uploaded_url').val(response);
				}
			}
		});

	});

	var optbtntype = jQuery('#lp-optin-btntype').val();

	if ( optbtntype == 'blank' ) {
		jQuery('#lp-optin-btnpremade_select-field').hide();
		jQuery('#lp-optin-btnclr_select-field').show();
		jQuery('#lp-optin-btntxt_text-field').show();
		jQuery('#lp-optin-btn-img_upload-field').hide();
	} else if ( optbtntype == 'upload' ) {
		jQuery('#lp-optin-btnpremade_select-field').hide();
		jQuery('#lp-optin-btnclr_select-field').hide();
		jQuery('#lp-optin-btntxt_text-field').hide();
		jQuery('#lp-optin-btn-img_upload-field').show();
	} else {
		jQuery('#lp-optin-btnpremade_select-field').show();
		jQuery('#lp-optin-btnclr_select-field').hide();
		jQuery('#lp-optin-btntxt_text-field').hide();
		jQuery('#lp-optin-btn-img_upload-field').hide();
	}

	jQuery("#lp-optin-btntype").change(function() {
        	var btntype = jQuery("option:selected", this).val();
        	if ( btntype == 'premade' ) {
			jQuery('#lp-optin-btnpremade_select-field').show();
			jQuery('#lp-optin-btnclr_select-field').hide();
			jQuery('#lp-optin-btntxt_text-field').hide();
			jQuery('#lp-optin-btn-img_upload-field').hide();
		} else if ( btntype == 'blank' ) {
			jQuery('#lp-optin-btnpremade_select-field').hide();
			jQuery('#lp-optin-btnclr_select-field').show();
			jQuery('#lp-optin-btntxt_text-field').show();
			jQuery('#lp-optin-btn-img_upload-field').hide();
		} else if ( btntype == 'upload' ) {
			jQuery('#lp-optin-btnpremade_select-field').hide();
			jQuery('#lp-optin-btnclr_select-field').hide();
			jQuery('#lp-optin-btntxt_text-field').hide();
			jQuery('#lp-optin-btn-img_upload-field').show();
		}
    	});

	var optbtntype2 = jQuery('#lp-optin-2-btntype').val();
	
	if ( optbtntype2 == 'blank' ) {
		jQuery('#lp-optin-2-btnpremade_select-field').hide();
		jQuery('#lp-optin-2-btnclr_select-field').show();
		jQuery('#lp-optin-2-btntxt_text-field').show();
		jQuery('#lp-optin-2-btn-img_upload-field').hide();
	} else if ( optbtntype2 == 'upload' ) {
		jQuery('#lp-optin-2-btnpremade_select-field').hide();
		jQuery('#lp-optin-2-btnclr_select-field').hide();
		jQuery('#lp-optin-2-btntxt_text-field').hide();
		jQuery('#lp-optin-2-btn-img_upload-field').show();
	} else {
		jQuery('#lp-optin-2-btnpremade_select-field').show();
		jQuery('#lp-optin-2-btnclr_select-field').hide();
		jQuery('#lp-optin-2-btntxt_text-field').hide();
		jQuery('#lp-optin-2-btn-img_upload-field').hide();
	}

	jQuery("#lp-optin-2-btntype").change(function() {
        	var btntype2 = jQuery("option:selected", this).val();
        	if ( btntype2 == 'premade' ) {
			jQuery('#lp-optin-2-btnpremade_select-field').show();
			jQuery('#lp-optin-2-btnclr_select-field').hide();
			jQuery('#lp-optin-2-btntxt_text-field').hide();
			jQuery('#lp-optin-2-btn-img_upload-field').hide();
		} else if ( btntype2 == 'blank' ) {
			jQuery('#lp-optin-2-btnpremade_select-field').hide();
			jQuery('#lp-optin-2-btnclr_select-field').show();
			jQuery('#lp-optin-2-btntxt_text-field').show();
			jQuery('#lp-optin-2-btn-img_upload-field').hide();
		} else if ( btntype2 == 'upload' ) {
			jQuery('#lp-optin-2-btnpremade_select-field').hide();
			jQuery('#lp-optin-2-btnclr_select-field').hide();
			jQuery('#lp-optin-2-btntxt_text-field').hide();
			jQuery('#lp-optin-2-btn-img_upload-field').show();
		}
    	});

	var optbtntype3 = jQuery('#pt_popup_btntype').val();

	if ( optbtntype3 == 'text' ) {
		jQuery('#pt_popup_btnpremade_select-field').hide();
		jQuery('#pt_popup_btncolor_select-field').show();
		jQuery('#pt_popup_btntxt_text-field').show();
		jQuery('#pt_popup_btnurl_upload-field').hide();
	} else if ( optbtntype3 == 'upload' ) {
		jQuery('#pt_popup_btnpremade_select-field').hide();
		jQuery('#pt_popup_btncolor_select-field').hide();
		jQuery('#pt_popup_btntxt_text-field').hide();
		jQuery('#pt_popup_btnurl_upload-field').show();
	} else {
		jQuery('#pt_popup_btnpremade_select-field').show();
		jQuery('#pt_popup_btncolor_select-field').hide();
		jQuery('#pt_popup_btntxt_text-field').hide();
		jQuery('#pt_popup_btnurl_upload-field').hide();
	}

	jQuery("#pt_popup_btntype").change(function() {
        	var btntype3 = jQuery("option:selected", this).val();
        	if ( btntype3 == 'premade' ) {
			jQuery('#pt_popup_btnpremade_select-field').show();
			jQuery('#pt_popup_btncolor_select-field').hide();
			jQuery('#pt_popup_btntxt_text-field').hide();
			jQuery('#pt_popup_btnurl_upload-field').hide();
		} else if ( btntype3 == 'text' ) {
			jQuery('#pt_popup_btnpremade_select-field').hide();
			jQuery('#pt_popup_btncolor_select-field').show();
			jQuery('#pt_popup_btntxt_text-field').show();
			jQuery('#pt_popup_btnurl_upload-field').hide();
		} else if ( btntype3 == 'upload' ) {
			jQuery('#pt_popup_btnpremade_select-field').hide();
			jQuery('#pt_popup_btncolor_select-field').hide();
			jQuery('#pt_popup_btntxt_text-field').hide();
			jQuery('#pt_popup_btnurl_upload-field').show();
		}
    	});

	var optbtntype4 = jQuery('#lp-page-pop-btntype').val();
	
	if ( optbtntype4 == 'blank' ) {
		jQuery('#lp-page-pop-btnpremade_select-field').hide();
		jQuery('#lp-page-pop-btnclr_select-field').show();
		jQuery('#lp-page-pop-btntxt_text-field').show();
		jQuery('#lp-page-pop-btn-img_upload-field').hide();
	} else if ( optbtntype4 == 'upload' ) {
		jQuery('#lp-page-pop-btnpremade_select-field').hide();
		jQuery('#lp-page-pop-btnclr_select-field').hide();
		jQuery('#lp-page-pop-btntxt_text-field').hide();
		jQuery('#lp-page-pop-btn-img_upload-field').show();
	} else {
		jQuery('#lp-page-pop-btnpremade_select-field').show();
		jQuery('#lp-page-pop-btnclr_select-field').hide();
		jQuery('#lp-page-pop-btntxt_text-field').hide();
		jQuery('#lp-page-pop-btn-img_upload-field').hide();
	}

	jQuery("#lp-page-pop-btntype").change(function() {
        	var btntype4 = jQuery("option:selected", this).val();
        	if ( btntype4 == 'premade' ) {
			jQuery('#lp-page-pop-btnpremade_select-field').show();
			jQuery('#lp-page-pop-btnclr_select-field').hide();
			jQuery('#lp-page-pop-btntxt_text-field').hide();
			jQuery('#lp-page-pop-btn-img_upload-field').hide();
		} else if ( btntype4 == 'blank' ) {
			jQuery('#lp-page-pop-btnpremade_select-field').hide();
			jQuery('#lp-page-pop-btnclr_select-field').show();
			jQuery('#lp-page-pop-btntxt_text-field').show();
			jQuery('#lp-page-pop-btn-img_upload-field').hide();
		} else if ( btntype4 == 'upload' ) {
			jQuery('#lp-page-pop-btnpremade_select-field').hide();
			jQuery('#lp-page-pop-btnclr_select-field').hide();
			jQuery('#lp-page-pop-btntxt_text-field').hide();
			jQuery('#lp-page-pop-btn-img_upload-field').show();
		}
    	});

	if ( !jQuery('#lp-page-popup').is(":checked") ) {
		jQuery('#lp-page-pop-wrap').hide();
	}

	jQuery('#lp-page-popup').click(function(){
		if ( this.checked == true ) {
			jQuery("#lp-page-pop-wrap").show();
		} else {
			jQuery("#lp-page-pop-wrap").hide();
		}				
	});

	if ( !jQuery('#lp-header-optin').is(":checked") ) {
		jQuery('#lp-header-optin-wrap').hide();
	}

	jQuery('#lp-header-optin').click(function(){
		if ( this.checked == true ) {
			jQuery("#lp-header-optin-wrap").show();
		} else {
			jQuery("#lp-header-optin-wrap").hide();
		}				
	});

	if ( !jQuery('#show-member-video').is(":checked") ) {
		jQuery('#member-video-open').hide();
	}

	jQuery('#show-member-video').click(function(){
		if ( this.checked == true ) {
			jQuery("#member-video-open").show();
		} else {
			jQuery("#member-video-open").hide();
		}				
	});

	if ( !jQuery('#show-member-home').is(":checked") ) {
		jQuery('#member-home-open').hide();
	}

	jQuery('#show-member-home').click(function(){
		if ( this.checked == true ) {
			jQuery("#member-home-open").show();
		} else {
			jQuery("#member-home-open").hide();
		}				
	});

	var memberthumb = jQuery('#member-content-thumb').val();

	if ( memberthumb == 'upload' ) {
		jQuery('#member-content-thumb-url_upload-field').show();
	} else {
		jQuery('#member-content-thumb-url_upload-field').hide();
	}

	jQuery("#member-content-thumb").change(function() {
        	var mthumb = jQuery("option:selected", this).val();

		if ( mthumb == 'upload' ) {
			jQuery('#member-content-thumb-url_upload-field').show();
		} else {
			jQuery('#member-content-thumb-url_upload-field').hide();
		}

	});

	if ( !jQuery('#show-member-content').is(":checked") ) {
		jQuery('#member-content-open').hide();
	}

	jQuery('#show-member-content').click(function(){
		if ( this.checked == true ) {
			jQuery("#member-content-open").show();
		} else {
			jQuery("#member-content-open").hide();
		}				
	});

	var ndl = '<div>';
	ndl += 'Type: <select name="member-content-download_type[]" id="member-content-download_type" style="width:100px;">';
	
	ndl += '<option value="audio">Audio</option>';
	ndl += '<option value="mmap">Mindmap</option>';
	ndl += '<option value="pdf">PDF</option>';
	ndl += '<option value="txt">Text</option>';
	ndl += '<option value="video">Video</option>';
	ndl += '<option value="zip">Zip</option>';
	ndl += '<option value="other">Other</option>';
	ndl += '</select>';

	ndl += ' File URL: <input type="text" name="member-content-download_file[]" id="member-content-download_file" class="widefat" size="55" style="width:150px" />';
	ndl += ' Text Link: <input type="text" name="member-content-download_text[]" id="member-content-download_text" class="widefat" size="55" style="width:150px" /> <a href="#" class="button" onclick="jQuery(this).parent().remove(); return false;">Remove</a>';
	ndl += '</div>';
	
	jQuery('.add-download').click(function(){
		jQuery('.dl-files').append(ndl);

	});

	if ( !jQuery('#show-member-sidebar').is(":checked") ) {
		jQuery('#member-sidebar-open').hide();
	}

	jQuery('#show-member-sidebar').click(function(){
		if ( this.checked == true ) {
			jQuery("#member-sidebar-open").show();
		} else {
			jQuery("#member-sidebar-open").hide();
		}				
	});

	var integration = jQuery('#pt_integrate_membership').val();

	if ( integration == 'cb' ) {
		jQuery('#pt_cb_secret_key_text-field').parent().show();
		jQuery('#pt_cb_secret_key_text-field').parent().prev().show();
		jQuery('#pt_cb_payment_1_text-field').parent().show();
		jQuery('#pt_cb_payment_1_text-field').parent().prev().show();
		jQuery('#pt_cb_email_title_text-field').parent().show();
		jQuery('#pt_cb_email_title_text-field').parent().prev().show();
		jQuery('#pt_member_login_page_select-field').parent().show();
		jQuery('#pt_member_login_page_select-field').parent().prev().show();
		jQuery('#paypal-div-open').hide();

	} else if ( integration == 'pypl' ) {

		jQuery('#pt_cb_secret_key_text-field').parent().hide();
		jQuery('#pt_cb_secret_key_text-field').parent().prev().hide();
		jQuery('#pt_cb_payment_1_text-field').parent().hide();
		jQuery('#pt_cb_payment_1_text-field').parent().prev().hide();
		jQuery('#pt_cb_email_title_text-field').parent().show();
		jQuery('#pt_cb_email_title_text-field').parent().prev().show();
		jQuery('#pt_member_login_page_select-field').parent().show();
		jQuery('#pt_member_login_page_select-field').parent().prev().show();
		jQuery('#paypal-div-open').show();

	} else {

		jQuery('#pt_cb_secret_key_text-field').parent().hide();
		jQuery('#pt_cb_secret_key_text-field').parent().prev().hide();
		jQuery('#pt_cb_payment_1_text-field').parent().hide();
		jQuery('#pt_cb_payment_1_text-field').parent().prev().hide();
		jQuery('#pt_cb_email_title_text-field').parent().hide();
		jQuery('#pt_cb_email_title_text-field').parent().prev().hide();
		jQuery('#pt_member_login_page_select-field').parent().hide();
		jQuery('#pt_member_login_page_select-field').parent().prev().hide();
		jQuery('#paypal-div-open').hide();
	}
	
	jQuery("#pt_integrate_membership").change(function() {
        	var integrate = jQuery("option:selected", this).val();
        	if ( integrate == 'cb' ) {
			jQuery('#pt_cb_secret_key_text-field').parent().show();
			jQuery('#pt_cb_secret_key_text-field').parent().prev().show();
			jQuery('#pt_cb_payment_1_text-field').parent().show();
			jQuery('#pt_cb_payment_1_text-field').parent().prev().show();
			jQuery('#pt_cb_email_title_text-field').parent().show();
			jQuery('#pt_cb_email_title_text-field').parent().prev().show();
			jQuery('#pt_member_login_page_select-field').parent().show();
			jQuery('#pt_member_login_page_select-field').parent().prev().show();
			jQuery('#paypal-div-open').hide();

		} else if ( integrate == 'pypl' ) {
			jQuery('#pt_cb_secret_key_text-field').parent().hide();
			jQuery('#pt_cb_secret_key_text-field').parent().prev().hide();
			jQuery('#pt_cb_payment_1_text-field').parent().hide();
			jQuery('#pt_cb_payment_1_text-field').parent().prev().hide();
			jQuery('#pt_cb_email_title_text-field').parent().show();
			jQuery('#pt_cb_email_title_text-field').parent().prev().show();
			jQuery('#pt_member_login_page_select-field').parent().show();
			jQuery('#pt_member_login_page_select-field').parent().prev().show();
			jQuery('#paypal-div-open').show();

		} else {
			jQuery('#pt_cb_secret_key_text-field').parent().hide();
			jQuery('#pt_cb_secret_key_text-field').parent().prev().hide();
			jQuery('#pt_cb_payment_1_text-field').parent().hide();
			jQuery('#pt_cb_payment_1_text-field').parent().prev().hide();
			jQuery('#pt_cb_email_title_text-field').parent().hide();
			jQuery('#pt_cb_email_title_text-field').parent().prev().hide();
			jQuery('#pt_member_login_page_select-field').parent().hide();
			jQuery('#pt_member_login_page_select-field').parent().prev().hide();
			jQuery('#paypal-div-open').hide();
		}
    	});

	if ( !jQuery('#show-member-clickbank').is(":checked") ) {
		jQuery('#member-clickbank-open').hide();
	}

	jQuery('#show-member-clickbank').click(function(){
		if ( this.checked == true ) {
			jQuery("#member-clickbank-open").show();
		} else {
			jQuery("#member-clickbank-open").hide();
		}				
	});

	var cbprotect = jQuery('#member-clickbank-protect').val();

	if ( cbprotect == 'yes' ) {
		jQuery('#member-clickbank-protect-open').show();
	} else {
		jQuery('#member-clickbank-protect-open').hide();
	}

	jQuery("#member-clickbank-protect").change(function() {
        	var cbprotect= jQuery("option:selected", this).val();
        	if ( cbprotect == 'yes' ) {
			jQuery('#member-clickbank-protect-open').show();
		} else {
			jQuery('#member-clickbank-protect-open').hide();
		}
    	});

	var upsell = jQuery('#lp-page-upsell').val();

	if ( upsell == 'yes' ) {
		jQuery('#lp-page-upsell-redir_select-field').show();
	} else {
		jQuery('#lp-page-upsell-redir_select-field').hide();
	}

	jQuery("#lp-page-upsell").change(function() {
        	var upsell = jQuery("option:selected", this).val();
        	if ( upsell == 'yes' ) {
			jQuery('#lp-page-upsell-redir_select-field').show();
		} else {
			jQuery('#lp-page-upsell-redir_select-field').hide();
		}
    	});

	var lpcomm = jQuery('#lp-comments-type').val();

	if ( lpcomm == 'wpcomm' ) {
		jQuery('#lp-fb-wrap-open').hide();
		jQuery("#lp-comments-sort_select-field").hide();
	} else if ( lpcomm == 'fbcomm' ) {
		jQuery('#lp-fb-wrap-open').show();
		jQuery("#lp-comments-sort_select-field").hide();
	} else if ( lpcomm == 'allcomm' ) {
		jQuery('#lp-fb-wrap-open').show();
		jQuery("#lp-comments-sort_select-field").show();
	}

	jQuery("#lp-comments-type").change(function() {
        	var lpcomm = jQuery("option:selected", this).val();
        	if ( lpcomm == 'wpcomm' ) {
			jQuery('#lp-fb-wrap-open').hide();
			jQuery("#lp-comments-sort_select-field").hide();
		} else if ( lpcomm == 'fbcomm' ) {
			jQuery('#lp-fb-wrap-open').show();
			jQuery("#lp-comments-sort_select-field").hide();
		} else if ( lpcomm == 'allcomm' ) {
			jQuery('#lp-fb-wrap-open').show();
			jQuery("#lp-comments-sort_select-field").show();
		}
    	});
});