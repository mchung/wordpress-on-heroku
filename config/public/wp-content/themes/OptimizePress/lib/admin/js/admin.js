jQuery.noConflict();

jQuery(function() {
		jQuery("#slider").tabs();
		
		jQuery('#sortable').sortable( {
			accept: 'sortable',
			opacity:  0.35,
			forcePlaceholderSize: true
		});
		
});

function sidebar_rm_ajax() {
	jQuery("input[name^='sidebar_rm']").bind("click",function(){
		
		var $sidebarId = jQuery(this).attr("id");
		var $sidebarName = jQuery("#sidebar_generator_"+$sidebarId).val();
		jQuery("#sidebar_generator_"+$sidebarId).remove();
		
		var $arraySidebarInputs = new Array;
		jQuery("input[name^='sidebar_generator_']").each(function(id) {
                     $updateSidebars = jQuery("input[name^='sidebar_generator_']").get(id);
                     $arraySidebarInputs.push($updateSidebars.value);
                    });
		
		var $sidebarInputsStr = $arraySidebarInputs.join(",");
			
		jQuery.ajax({
			type: "post",url: $rmSidebarAjaxUrl,data: { action: "sidebar_rm", sidebar: $sidebarInputsStr, sidebar_id: $sidebarId, sidebar_name: $sidebarName, _ajax_nonce: $ajaxNonce },
			beforeSend: function() {jQuery(".sidebar_rm_"+$sidebarId).css({display:""});}, //fadeIn loading just when link is clicked
			success: function(html){ //so, if data is retrieved, store it in html
				jQuery("#sidebar_table_"+$sidebarId).fadeOut("fast"); //animation
			}
		}); //close jQuery.ajax
		return false;
	});
}

function show_hide_slider_settings() {
	var $group = jQuery('#homepage');
	$group.each(function() {	
		var	$currentgroup = jQuery(this);
		var $selector = jQuery(this).find('.selector');
		$selector.each(function(i) {
			jQuery(this).bind('click',function() {
				var $currentgroupHide = $currentgroup.find('#toggle_click');
				$currentgroupHide.css({display:"none"}).removeClass("multitables");
				$currentgroupHide.children().children().children(".multitable_hide_rm").removeClass("multitable").removeClass("clone_row");
				$currentgroupHide.children(".count_hide_rm").removeClass("slider_counter");
				if(jQuery(this).val())
				{
				$show = ".selected_"+jQuery(this).val();
				var $currentgroupShow = $currentgroup.find($show);
				$currentgroupShow.css({display:""}).addClass("multitables").children().children().children(".multitable_hide_rm").addClass("multitable");
				$currentgroupShow.children().children().children(".hidden").addClass("clone_row");
				$currentgroupShow.children(".count_hide_rm").addClass("slider_counter");
				copy_slider_row();
				}
			});
		});
	});
}

function show_hide_teaser_text() {
	var $group = jQuery('#generalsettings');
	$group.each(function() {	
		var	$currentgroup = jQuery(this);
		var $selector = jQuery(this).find('.selector');
		$selector.each(function(i) {
			jQuery(this).bind('click',function() {
				var $currentgroupHide = $currentgroup.find('#toggle_click');
				$currentgroupHide.css({display:"none"});

				if(jQuery(this).val()) {
					$show = ".selected_"+jQuery(this).val();
					var $currentgroupShow = $currentgroup.find($show);
					$currentgroupShow.css({display:""});
				}
			});
		});
	});
}
	
// Get Current Option Tab Anchor
function get_anchor_id() {
	var $group = jQuery('#slider');
	$group.each(function() {
	jQuery(this).bind('click',function(){
		    $anchorid = jQuery('.ui-state-active').children('a').attr('href');
			jQuery("#hidden_anchor").val($anchorid);
		});
		
	});
}

// Show/hide behaviors for post editing screen
function show_hide_meta_boxes() {
	jQuery('.optpress-post-control .description').hide();
	
	jQuery('.optpress-post-control .switch').click(function() {
		jQuery(this).parents('div p').siblings('.description').toggle();
		return false;
	});
}

// Show/hide behaviors for custom slider settings
function custom_slider_settings() {
	//Hide (Collapse) the toggle containers on load
		jQuery(".toggle_container").hide(); 

		//Switch the "Open" and "Close" state per click
		jQuery("h3.trigger").toggle(function(){
			jQuery(this).addClass("active");
			}, function () {
			jQuery(this).removeClass("active");
		});

		//Slide up and down on click
		jQuery("h3.trigger").click(function(){
			jQuery(this).next(".toggle_container").toggle();
		});
}

// Exclude/Include Selector
function exclude_include_checkbox() {
	var $box_select = jQuery('.optpress_box_select');
	
		$box_select.each(function(){
			
			var $box_select_id = jQuery(this).attr("id");
			var $toshow = ".select_"+$box_select_id;
			var $class_toshow = jQuery(this).find($toshow);
			
			$class_toshow.each(function(i){
				var $catid = jQuery(this).attr('name');
				jQuery(this).bind('change',function(){
						
					var $original_pgstoshow = jQuery('input[name='+$box_select_id+']').val();
					if (jQuery(this).attr('checked')){

						if(jQuery(this).val()){	
							if ($original_pgstoshow == '') {
								jQuery('input[name='+$box_select_id+']').val($catid);
							}else{
								jQuery('input[name='+$box_select_id+']').val($original_pgstoshow+','+$catid);
							}					
						}	
					} else {
						$original_pgstoshow = ','+$original_pgstoshow+',';
						$original_pgstoshow = $original_pgstoshow.replace(','+$catid+',',',');
						if ($original_pgstoshow.charAt(0) == ',') {
							if ($original_pgstoshow == ',') {
								$original_pgstoshow = '';
							}else{
								$original_pgstoshow = $original_pgstoshow.substr(1);
							}			
						}
						if ($original_pgstoshow.charAt(($original_pgstoshow.length-1)) == ',') {
							$original_pgstoshow = $original_pgstoshow.substr(0,($original_pgstoshow.length-1));
						}
					  	jQuery('input[name='+$box_select_id+']').val($original_pgstoshow);				
					}
				
				});			
		
			});

		});
}

// Exclude/Include Selector Sync
function exclude_include_sync() {
	var $box_select = jQuery('.optpress_box_select');
		$box_select.each(function(){
			var $box_select_id = jQuery(this).attr("id");
			
			var $catstoshow = jQuery('input[name='+$box_select_id+']').val();
			var $catstoshow_array = new Array();
				if ($catstoshow) {
					$catstoshow_array = $catstoshow.split(",");
				}

			var $l = $catstoshow_array.length;  
				for (var i=0;i<$l;i++) {
					jQuery('#'+$box_select_id+'_'+$catstoshow_array[i]).attr('checked','checked')
				}
			
		});

}


// Exclude/Include Links to Videos
function exclude_include_checkbox_linkstovideos() {
	var $box_select = jQuery('.linkstovideos_box_select');
	
		$box_select.each(function(){
			
			var $box_select_id = jQuery(this).attr("id");
			var $toshow = ".select_"+$box_select_id;
			var $class_toshow = jQuery(this).find($toshow);
			
			$class_toshow.each(function(i){
				var $catid = jQuery(this).attr('alt');
				jQuery(this).bind('change',function(){
						
					var $original_pgstoshow = jQuery('input[name='+$box_select_id+']').val();
					if (jQuery(this).attr('checked')){

						if(jQuery(this).val()){	
							if ($original_pgstoshow == '') {
								jQuery('input[name='+$box_select_id+']').val($catid);
							}else{
								jQuery('input[name='+$box_select_id+']').val($original_pgstoshow+','+$catid);
							}					
						}	
					} else {
						$original_pgstoshow = ','+$original_pgstoshow+',';
						$original_pgstoshow = $original_pgstoshow.replace(','+$catid+',',',');
						if ($original_pgstoshow.charAt(0) == ',') {
							if ($original_pgstoshow == ',') {
								$original_pgstoshow = '';
							}else{
								$original_pgstoshow = $original_pgstoshow.substr(1);
							}			
						}
						if ($original_pgstoshow.charAt(($original_pgstoshow.length-1)) == ',') {
							$original_pgstoshow = $original_pgstoshow.substr(0,($original_pgstoshow.length-1));
						}
					  	jQuery('input[name='+$box_select_id+']').val($original_pgstoshow);				
					}
				
				});			
		
			});

		});
}

// Exclude/Include Links to Videos Sync
function exclude_include_sync_linkstovideos() {
	var $box_select = jQuery('.linkstovideos_box_select');
		$box_select.each(function(){
			var $box_select_id = jQuery(this).attr("id");
			
			var $catstoshow = jQuery('input[name='+$box_select_id+']').val();
			var $catstoshow_array = new Array();
				if ($catstoshow) {
					$catstoshow_array = $catstoshow.split(",");
				}

			var $l = $catstoshow_array.length;  
				for (var i=0;i<$l;i++) {
					jQuery('#'+$box_select_id+'_'+$catstoshow_array[i]).attr('checked','checked')
				}
			
		});

}

function copy_slider_row() {
	var $multitable_wrap = jQuery('.multitables');
	
	$multitable_wrap.each(function() {
		var $add_next = jQuery(this).find('.add_row');
		var $del_this = jQuery(this).find('.del_row');
		var $count = jQuery(this).find('.slider_counter');
		var $current_table = jQuery(this);
		
		
		$add_next.unbind('click').bind('click',function() {
			$count.val(parseInt($count.val())+1);
			$current_number = $count.val();
			$newclone = jQuery('.clone_row').clone().insertBefore(jQuery('.clone_row'));
			$newclone.removeClass('hidden').removeClass('clone_row');
			
			correct_numbers($current_table)
			copy_slider_row();
			table_sort_test();
			
			return false;
			});
			
		$del_this.bind('click',function() {
			$count.val(parseInt($count.val())-1);
			jQuery(this).parents('.multitable').remove();
			correct_numbers($current_table);
			return false;
			});
	});
	
}

function correct_numbers($current_table) {
	$current_table.find('.multitable').each(function(i){
		var $current_sub_table = jQuery(this);
		$current_sub_table.find('.changenumber').html(i+1);
		$current_sub_table.find('.correct_num').each(function(){
				var $multiply_me = '';
				var $newname = jQuery(this).attr('name').replace(/\d+/,i);
				if (jQuery(this).hasClass('multiply_me')) $multiply_me = 'multiply_me';
				jQuery(this).attr({'name': $newname,'id': $newname, 'class': $newname + " correct_num"});
			});
	});
}

//function table_sort_test() {
//		jQuery(".table_sort").tableDnD({
//		    onDragClass: "myDragClass",
//		    onDrop: function(table, row) {
//			
//				var $multitable_wrap = jQuery('.multitable');
//				$multitable_wrap.each(function(i) {
//					var $current_sub_table = jQuery(this);
//					$current_sub_table.find('.correct_num').each(function(){
//							var $newname = jQuery(this).attr('name').replace(/\d+/,i);
//							jQuery(this).attr({'name': $newname,'id': $newname, 'class': $newname + " correct_num"});
//						});
//					});
//		    },
//			onDragStart: function(table, row) {	
//			}
//		});
//}

jQuery(document).ready(function(){

//table_sort_test();
copy_slider_row();
sidebar_rm_ajax();
show_hide_slider_settings();
show_hide_teaser_text();
get_anchor_id();
show_hide_meta_boxes();
custom_slider_settings();
exclude_include_checkbox();
exclude_include_sync();
exclude_include_checkbox_linkstovideos();
exclude_include_sync_linkstovideos();
});