jQuery(document).ready(function() {
	var formfield;
// I changed the trigger to a class.
jQuery('.image_uploader_button').click(function() {
	// I switched the id for the this-prev selector that sends the name of the input field that proceeds it.
	formfield = jQuery(this).prev().attr('name');
	tb_show('', 'media-upload.php?type=image&TB_iframe=true');
	return false;
	});

window.original_send_to_editor = window.send_to_editor;
	window.send_to_editor = function(html){

		if (formfield) {
			alert(formfield);
			fileurl = jQuery(html).attr('href');
			// I then called the name and joined with # for the id.
			jQuery('#'+formfield).val(fileurl);

			tb_remove();
			formfield = '';

		} else {
			window.original_send_to_editor(html);
		}
	};
});

jQuery(document).ready(function($) {
			
			// save the send_to_editor handler function
			window.send_to_editor_default = window.send_to_editor;
	
			$('.custom_upload_image_button').click(function(){
				
				// replace the default send_to_editor handler function with our own
				window.send_to_editor = window.attach_image;
				tb_show('', 'media-upload.php?post_id=<?php echo $post->ID ?>&amp;type=image&amp;TB_iframe=true');
				
				return false;
			});
			
			$('#remove-product-image').click(function() {
				
				$('#upload_image_id').val('');
				$('#banner_image').val('');
				$('img').attr('src', '');
				$(this).hide();
				
				return false;
			});
			
			// handler function which is invoked after the user selects an image from the gallery popup.
			// this function displays the image and sets the id so it can be persisted to the post meta
			window.attach_image = function(html) {
				
				// turn the returned image html into a hidden image element so we can easily pull the relevant attributes we need
				$('body').append('<div id="temp_image">' + html + '</div>');
					
				var img = $('#temp_image').find('img');
				
				imgurl   = img.attr('src');
				imgclass = img.attr('class');
				imgid    = parseInt(imgclass.replace(/\D/g, ''), 10);
	
				$('#upload_image_id').val(imgid);
				$('#banner_image').val(imgurl);
				$('#remove-product-image').show();
	
				$('img.custom_preview_image').attr('src', imgurl);
				try{tb_remove();}catch(e){};
				$('#temp_image').remove();
				
				// restore the send_to_editor handler function
				window.send_to_editor = window.send_to_editor_default;
				
			}
	
});