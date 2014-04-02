/*
This script is exclusively based on the work by Dave McDermid:
http://www.davemcdermid.co.uk/2009/08/sortable-sitemap/
*/
jQuery(function($) {

	/* Status message container for all AJAX-related operations. */
	$('<div id="message" class=""><p></p></div>').insertAfter('.optpress-page-title').hide();

    $('#wpms-sitemap dl, #wpms-sitemap .dropzone').droppable({
        accept: '#wpms-sitemap li',
        tolerance: 'pointer',
        drop: function(e, ui) {
            var li = $(this).parent();
            var child = !$(this).hasClass('dropzone');
            if (child && li.children('ul').length == 0) {
                li.append('<ul/>');
            }
            if (child) {
                li.addClass('sm2_liOpen').removeClass('sm2_liClosed').children('ul').append(ui.draggable);
            }
            else {
                li.before(ui.draggable);
            }
			$('#wpms-sitemap li.sm2_liOpen').not(':has(li:not(.ui-draggable-dragging))').removeClass('sm2_liOpen');
            li.find('dl,.dropzone').css({ backgroundColor: '', borderColor: '' });


			/* Create variables to hold the data that will be sent to the
			server (SACK) for DB update. */
			var data_parentPage = {};
			var data_pageOrder = new Array();


			/* Retrieve the page and parent (if applicable) ID of the
			dragged-and-dropped element. */
			var dragPageID = $('input[rel="wpms_page_id"]', ui.draggable).val();
			var dragParentID = $('input[rel="wpms_parent_id"]', ui.draggable).val();


			/* Retrieve the page and parent (if applicable) ID of the
			element that content was dropped onto. */
			var dropPageID = $('input[rel="wpms_page_id"]', this).val();
			var dropParentID = $('input[rel="wpms_parent_id"]', this).val();


			/* Update the parent node for the dropped element. When the element
			is dropped on an actual node, */
			$('input[name="wpms_parent_id"]', ui.draggable).val(dropParentID);

			if($('input[name="wpms_is_parent"]', this).val() == "true") {
				data_parentPage = {
					pageID: dragPageID,
					parentID: dropPageID
				};
			} else {
				data_parentPage = {
					pageID: dragPageID,
					parentID: dropParentID
				};
			}


			/* Determine the page order of the newly-moved element. */
			var siblings = $(ui.draggable).parent().children().not('li.ui-draggable-dragging');

			$(siblings).each(function(i) {
				data_pageOrder.push({
					pageID: $('input[rel="wpms_page_id"]', this).val(),
					menuOrder: i
				});
			});


			/* Send data to PHP function in plugin to send data to database. */
			$.ajax({

				async: false,

				data: {
					action: 'update_page_order',
					_ajax_nonce: $('input[name="wp-nonce"]').val(),
					page_parent: $.toJSON(data_parentPage),
					page_order: $.toJSON(data_pageOrder)
				},

				complete: function() {
					$('#message').show();
				},

				dataType: 'json',

				error: function(XMLHttpRequest, textStatus, errorThrown) {
					$('#message').attr('class', 'error').children('p').text(errorThrown);
				},

				success: function(data, textStatus) {
					var statusCSSClass = 'updated wpms_pg_update';
					
					$.ajax({
						type: "POST",url: $('input[name="wp-admin-ajax"]').val(),data: { action: "flush_permalinks", _ajax_nonce: $('input[name="wp-nonce"]').val() }
					});

					if(!data.success) {
						statusCSSClass = 'error';
					}

					$('#message').attr('class', statusCSSClass).children('p').text(data.message);
				},

				type: 'POST',

				url: $('input[name="wp-admin-ajax"]').val()

			});
        },

        over: function() {
            $(this).filter('dl').css({ backgroundColor: '#e4f2fd' });
            $(this).filter('.dropzone').css({ borderColor: '#666' });
        },

        out: function() {
            $(this).filter('dl').css({ backgroundColor: '' });
            $(this).filter('.dropzone').css({ borderColor: '' });
        }
    });

    $('#wpms-sitemap li').draggable({
        handle: ' > dl',
        opacity: .8,
        addClasses: false,
        helper: 'clone',
        zIndex: 100
    });

	$('.sm2_expander').live('click', function() {
		$(this).parent().parent().toggleClass('sm2_liOpen').toggleClass('sm2_liClosed');
		return false;
	});

});