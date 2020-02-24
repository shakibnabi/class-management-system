$(window).on('load', function () {
	"use strict";
	/*=========================================================================
        Preloader
    =========================================================================*/
	$("#preloader").delay(3000).fadeOut('slow');
	// Because only Chrome supports offset-path, feGaussianBlur for now
	var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
	if (!isChrome) {
		document.getElementsByClassName('infinityChrome')[0].style.display = "none";
		document.getElementsByClassName('infinity')[0].style.display = "block";
	}
	/*=========================================================================
     Wow Initialize
     =========================================================================*/
	// Here will be the WoW Js implementation.
	setTimeout(function () {
		new WOW().init();
	}, 0);
	var dynamicDelay = [
		200,
		400,
		600,
		800,
		1000,
		1200,
		1400,
		1600,
		1800,
		2000
	];
	var fallbackValue = "200ms";
	$(".blog-item.wow").each(function (index) {
		$(this).attr("data-wow-delay", typeof dynamicDelay[index] === 'undefined' ? fallbackValue : dynamicDelay[index] + "ms");
    });
    
	/*=========================================================================
                Magnific Popup
    =========================================================================*/
	$('.course-video-start').magnificPopup({
		type: 'iframe',
		closeBtnInside: false,
		iframe: {
            markup: 
                '<div class="mfp-iframe-scaler">'+
                '<div class="mfp-close"></div>'+
                '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
                '</div>',
              
            patterns: {
                youtube: {
                    index: 'youtube.com/',
              
                    id: 'v=',              
                    src: 'www.youtube.com/embed/%id%?autoplay=1'
                },
                vimeo: {
                    index: '//vimeo.com/',
                    id: '/',
                    src: 'player.vimeo.com/video/%id%?autoplay=1'
                },
                gmaps: {
                    index: '//maps.google.',
                    src: '%id%&output=embed'
                }
              
            },
            srcAction: 'iframe_src',
        }
	});
    bolbyPopup();
    
	/*=========================================================================
                Slick Slider
    =========================================================================*/
	$('.testimonials-wrapper').slick({
		dots: true,
		arrows: false,
		autoplay: true,
		autoplaySpeed: 3000
	});
});

$(function () {
	"use strict";
	/*=========================================================================
     Parallax layers
     =========================================================================*/
	if ($('.parallax').length > 0) {
		var scene = $('.parallax').get(0);
		var parallax = new Parallax(scene, {
			relativeInput: true,
		});
	}
});