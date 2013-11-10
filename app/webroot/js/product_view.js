$(document).ready(function(){

	// Popover
	//$('.pop').popover('toggle');

	$("a[rel=pop_generic]").popover({html:'true'}).click(function(e) {
	})

	$("a[rel=pop_brand]").popover({html:'true'}).click(function(e) {
	})

	// Product Display Slider

	$('#carousel').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		itemWidth: 50,
		itemMargin: 5,

		asNavFor: '#slider'
	});

	$('#slider').flexslider({
		animation: "fade",
		animationSpeed: 400,
		easing: "swing",//{NEW} String: Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		sync: "#carousel",
		start: function(slider){
		$('body').removeClass('loading');
		}
	});

});
