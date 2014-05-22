$(document).ready(function(){
	
	
// temp JS Flyout - Sameer
    function overlay(arg){
        $('.art-list').hide();
        var position = $(".basic-info-"+arg).position(); // Grabs the position
        var topPos = parseInt(position.top);
        var leftPos = parseInt(position.left) + 175;
        $("#populate-overlay-"+arg).css( { position: "absolute", left: leftPos, top: topPos } ).show();
    }
    $(".close-x").click(function () { $(this).parent().hide(); });
	

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
	
	
		
// Prepend img in Article div
	$('#theDiv').prepend('<img id="theImg" src="theImg.png" />');


// Wrap curly quotes in User Shop Quote
	$('#awning-text p').prepend('&#8220;&nbsp;');
	$('#awning-text p').append('&#8221;');

});
