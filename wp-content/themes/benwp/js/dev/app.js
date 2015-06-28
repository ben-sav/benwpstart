jQuery(document).ready(function($) {

	if ($(window).scrollTop() > 200) {
		$('header').addClass('header-sticky');
	} else {
		$('header').removeClass('header-sticky');
	}

	var currentScroll = $(window).scrollTop();
	var menuExpand = function() {
		if ($(window).scrollTop() > currentScroll) {
			$('.header-sticky').css('top', '-100px');
		} else {
			$('.header-sticky').css('top', '0');
		}
		currentScroll = $(window).scrollTop();
	};

	$(window).scroll(function(event) {

		if ($(window).scrollTop() > 200) {
			$('header').addClass('header-sticky');
		} else {
			$('header').removeClass('header-sticky');
		}
		if ($(window).scrollTop() > 100) {
			menuExpand();
		} else {
			$('.header-sticky').css('top', '0');
		}

	});

	var navopen = false;

	$('.navicon').click(function(event) {
		if (navopen === false) {
			navopen = true;
			$('nav').css('right', '0');
			$('.site-wrapper').css('left', '-250px');
			$('.site-title').css('margin-left', '-250px');
			$('.navicon').css('color', '#CCC').removeClass('ion-navicon-round').addClass('ion-close-round');
		} else {
			navopen = false;
			$('nav').css('right', '-250px');
			$('.site-wrapper').css('left', '0');
			$('.site-title').css('margin-left', '0');
			$('.navicon').css('color', '#555').removeClass('ion-close-round').addClass('ion-navicon-round');
		}
	});

	var accrocheReplace = function() {
		//var ah = ($('.accroche').height() - $('.accroche-titre').height()) / 2;
		//$('.accroche-titre').css('top', ah);
		var iw = ($(window).width() - $('.accroche img').width()) / 2;
		$('.accroche img').css('margin-left', iw);
	};

	var citationsReplace = function() {
		var ch;
		for (var i = $('.membre-citation').length - 1; i >= 0; i--) {
			ch = ($('.membre-citation').eq(i).height() - $('.membre-citation-content').eq(i).height()) / 2 + 5;
			$('.membre-citation-content').eq(i).css('top', ch);
		}
	};

	accrocheReplace();
	citationsReplace();

	$(window).load(function() {
		accrocheReplace();
	});

	window.onresize = accrocheReplace;

	$('.techno').mouseover(function(event) {
		$('.techno-desc').hide();
		$(event.currentTarget).find('.techno-desc').show();
	});
	$('.techno').mouseout(function(event) {
		$('.techno-desc').hide();
	});

	var $video = $('video');

	$(".movie-container").on("click", function() {
		$video[0].play();
	});

});