jQuery(document).ready(function () {
	jQuery('.controls#phcreativeblog-img-container li img').click(function () {
		jQuery('.controls#phcreativeblog-img-container li').each(function () {
			jQuery(this).find('img').removeClass('phcreativeblog-radio-img-selected');
		});
		jQuery(this).addClass('phcreativeblog-radio-img-selected');
	});
});