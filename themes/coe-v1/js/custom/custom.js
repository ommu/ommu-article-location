/*custom.js
Adding custom javascript or jquery function
* Copyright (c) 2016, hariyazt16@gmail.com. All rights reserved.
* version: 0.0.9
*/
//End Sort random owl function
$(window).scroll(function () {
	if ($(this).scrollTop() < 200) {
		$('header nav.main-nav').removeClass('scroll');
	} else {
		$('header nav.main-nav').addClass('scroll');
	}
});
$(document).ready(function() {
	$('a.responsive-menu').on('click', function(){
		if (!$('header .menu').hasClass('active')){
			$(this).addClass('active');
			$('header .menu').addClass('active');

		} else {
			$(this).removeClass('active');
			$('header .menu').removeClass('active');
		}
	});
});
