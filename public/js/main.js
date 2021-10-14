(function($) {

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	var carousel = function() {
		$('.featured-carousel').owlCarousel({
	    loop:true,
	    autoplay: false,
	    autoHeight: false,
	    margin:30,
	    animateOut: 'slideOutDown',
    animateIn: 'flipInX',
	    nav:true,
	    dots: true,
	    autoplayHoverPause: false,
	    items: 1,
	    navText : ["<p><small>Prev</small><span class='ion-ios-arrow-round-back'></span></p>","<p><small>Next</small><span class='ion-ios-arrow-round-forward'></span></p>"],
	    responsive:{
	      0:{
	        items:1
	      },
	      600:{
	        items:1
	      },
	      1000:{
	        items:1
	      }
	    }
		});

	};
	carousel()

})(jQuery);


// $(".ion-ios-arrow-round-back").mouseup(function(){
	
// 	alert("ok")

// 	console.log($('.owl-dot.active').index())


// 	// for (let index = 0; index < $('.owl-dot').length; index++) {
// 	// 	console.log($('.owl-dot').eq(index))
// 	// 	if($('.owl-dot').eq(index).hasClass('active')){
		
// 	// 		if(index-1<0){
// 	// 			console.log($('.owl-dot')[index])
// 	// 			console.log(index)

// 	// 		}else{
// 	// 			console.log(index)
// 	// 		}
// 	// 	}
// 	// }

   
// });

// $(".ion-ios-arrow-round-forward").mouseup(function(){
// 	alert("ok")
// 	console.log($('.owl-dot.active').index())
   
   
// });