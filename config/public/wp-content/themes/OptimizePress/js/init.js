jQuery(document).ready(function() {

jQuery(document).bind('mousemove',function(e){ 
	var scrollTop = jQuery(window).scrollTop();
	topexit = scrollTop + 5;
});

jQuery(document).mousemove(function(e) {

if(e.pageY <= topexit)
{

// Launch MODAL BOX
jQuery('#exit_content').modal({onOpen: modalOpen, onClose: simplemodal_close, position:[73,]});
}

});

});

/**
 * When the open event is called, this function will be used to 'open'
 * the overlay, container and data portions of the modal dialog.
 *
 * onOpen callbacks need to handle 'opening' the overlay, container
 * and data.
 */
function modalOpen (dialog) {
	dialog.overlay.fadeIn('fast', function () {
		dialog.container.fadeIn('fast', function () {
			dialog.data.hide().slideDown('fast');
		});
	});
}

   /**
 * When the close event is called, this function will be used to 'close'
 * the overlay, container and data portions of the modal dialog.
 *
 * The SimpleModal close function will still perform some actions that
 * don't need to be handled here.
 *
 * onClose callbacks need to handle 'closing' the overlay, container
 * and data.
 */
function simplemodal_close (dialog) {
	dialog.data.fadeOut('fast', function () {
		dialog.container.hide('fast', function () {
			dialog.overlay.slideUp('fast', function () {
				jQuery.modal.close();
			});
		});
	});
}