'use strict';

$(window).on('load', function() {
		// Masonry grid
		$('.pt-portfolio-items').isotope();

		// Portfolio Category Menu
		$('.cat-nav li').on('click', function() {
			$('.cat-nav li').removeClass("active");
			$(this).addClass("active");
			var selector = $(this).attr('data-filter');
			$('.pt-portfolio-items').isotope({
				filter: selector,
				animationOptions: {
					duration: 750,
					easing: 'linear',
					queue: false
				}
			});
		});



		jQuery(window).on('scroll', function(){
		 	if(jQuery(window).scrollTop()){
		 		jQuery('header').addClass('fixed-it')
		 	}
		 	else{
		 		jQuery('header').removeClass('fixed-it')
		 	}
		})

		$(".navbar-toggler").on('click', function() {
		    $(".content-pt").toggleClass("blur-it");
		    $("header").toggleClass("opacity-it");
		});



		$('.slide-it').slick({
		  	dots: false,
		    arrows:true,
		    infinite: true,
		    autoplay:true,
		    centerMode:false,
		    slidesToShow: 1,
		    slidesToScroll: 1,
		    variableWidth: false,
		    fade: true
		});

	}); 
