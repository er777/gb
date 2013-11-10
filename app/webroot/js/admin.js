$(document).ready(function() {

	$("a.status").unbind("change");
	$("a.status").click(function(){
		var p = this.firstChild;
		if (p.src.match('icon_1.png')) {
			$(p).attr({ src: "/img/icon_0.png", alt: "Activate" });
		} else {
			$(p).attr("src","/img/icon_1.png");
			$(p).attr("alt","Deactivate");
		};
		$.get(this.href + "?" + new Date().getTime() );
		return false;
	});
	
	// Temp removal of "nut" in nutrition labels on admin edit	
	
	$(".nutrition label[for='comedyclubs']");
	   

// Conditional CSS for Note Priority


	$("td.priority:contains('H')").css('backgroundColor','red').css('color','white');
	$("td.priority:contains('H')").css('backgroundColor','red');


});
