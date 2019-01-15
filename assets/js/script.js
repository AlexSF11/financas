$(function(){
	var nav = $('#top_menu');
	$(window).scroll(function() {
		if($(this).scrollTop() > 150) {
			nav.addClass("menu-fixo");
		} else {
			nav.removeClass("menu-fixo");
		}
	});
});














