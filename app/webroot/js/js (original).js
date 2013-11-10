$(document).ready(function(){

	//$("input:text:visible:first").focus();

	$("#ProductSearch").autocomplete({
		minLength: 2,
		select: function(event, ui) {
			$("#s").val(ui.item.label);
			$("#searchform").submit();
		},
		source: function (request, response) {
			$.ajax({
				url: Shop.basePath + "products/searchjson",
				data: {
					search: request.term,
				},
				dataType: "json",
				success: function(data) {
					response($.map(data, function(el, index) {
						return {
							value: el.Product.name,
							name: el.Product.name,
							image: el.Product.image
						};
					}));
				}
			});
		}
	}).data("autocomplete")._renderItem = function (ul, item) {
		return $("<li />")
			.data("item.autocomplete", item)
			.append("<a><img width='25' src='" + Shop.basePath + "img/products/image/" + item.image + "' /> " + item.name + "</a>")
			.appendTo(ul);
	};
	
	
	
	
	// GALLERIFIC OPTIONS
	
//	jQuery(document).ready(function($) {
//		// We only want these styles applied when javascript is enabled
//		$('div.navigation').css({'height' : '50px'});  //, 'float' : 'left'
//		$('div.content').css('display', 'block');
//
//		// Initially set opacity on thumbs and add
//		// additional styling for hover effect on thumbs
//		var onMouseOutOpacity = 0.67;
//		$('#thumbs ul.thumbs li').opacityrollover({
//			mouseOutOpacity:   onMouseOutOpacity,
//			mouseOverOpacity:  1.0,
//			fadeSpeed:         'fast',
//			exemptionSelector: '.selected'
//		});
//		
//		// Initialize Advanced Galleriffic Gallery
//		var gallery = $('#thumbs').galleriffic({
//			delay:                     2500,
//			numThumbs:                 15,
//			preloadAhead:              10,
//			enableTopPager:            false,
//			enableBottomPager:         false,
//			maxPagesToShow:            7,
//			imageContainerSel:         '#slideshow',
//			controlsContainerSel:      '#controls',
//			captionContainerSel:       '#caption',
//			loadingContainerSel:       '#loading',
//			renderSSControls:          true,
//			renderNavControls:         false,
//			playLinkText:              'Play Slideshow',
//			pauseLinkText:             'Pause Slideshow',
//			prevLinkText:              '&lsaquo; Previous Photo',
//			nextLinkText:              'Next Photo &rsaquo;',
//			nextPageLinkText:          'Next &rsaquo;',
//			prevPageLinkText:          '&lsaquo; Prev',
//			enableHistory:             false,
//			autoStart:                 false,
//			syncTransitions:           true,
//			defaultTransitionDuration: 900,
//			onSlideChange:             function(prevIndex, nextIndex) {
//				// 'this' refers to the gallery, which is an extension of $('#thumbs')
//				this.find('ul.thumbs').children()
//					.eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
//					.eq(nextIndex).fadeTo('fast', 1.0);
//			},
//			onPageTransitionOut:       function(callback) {
//				this.fadeTo('fast', 0.0, callback);
//			},
//			onPageTransitionIn:        function() {
//				this.fadeTo('fast', 1.0);
//			}
//		});
//	});


	
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
