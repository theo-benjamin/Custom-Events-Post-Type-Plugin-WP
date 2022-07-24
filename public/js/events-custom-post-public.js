(function ($) {
	'use strict';

	//Resize the table
	$(function () {
		$(window).on("load resize ", function () {
			var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
			$('.tbl-header').css({ 'padding-right': scrollWidth });
		}).resize();
	});
})(jQuery);
