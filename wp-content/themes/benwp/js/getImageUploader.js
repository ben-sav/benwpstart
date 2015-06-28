(function($){
	jQuery(document).ready(function() {
 
		$('#upload_image_button').click(function(event) {
			event.preventDefault();
			var uploader = wp.media({
				title : 'Choisir une image',
				button : {
					text : 'Envoyer',
				},
				multiple : false,
			})
			.on('select', function() {
				var selection = uploader.state().get('selection');
				var attachment = selection.first();
				var url = attachment.attributes.sizes.full.url;

				$('#upload_image').val(url);
				$('#upload_image_url').attr('src', url);
			})
			.open();
		});

		$('#upload_cat_image_button').click(function(event) {
			event.preventDefault();
			var uploader = wp.media({
				title : 'Choisir une image',
				button : {
					text : 'Envoyer',
				},
				multiple : false,
			})
			.on('select', function() {
				var selection = uploader.state().get('selection');
				var attachment = selection.first();
				var url = attachment.attributes.sizes.full.url;

				$('#upload_cat_image').val(url);
				$('#upload_cat_image_url').attr('src', url);
			})
			.open();
		});
			 
		$(".widefat tbody").on('click', '.add-option-logo', function(event) {
			event.preventDefault();
			var uploader = wp.media({
				title : 'Choisir une image',
				button : {
					text : 'Envoyer',
				},
				multiple : false,
			})
			.on('select', function() {
				var selection = uploader.state().get('selection');
				var attachment = selection.first();
				var fullurl = attachment.attributes.sizes.full.url;
				var url = fullurl.substr(fullurl.search('wp-content'));

				$(event.currentTarget).parent().next().find('input').val(url);
				$(event.currentTarget).parent().next().find('img').attr('src', fullurl);
			})
			.open();
		});

	});
})(jQuery);
