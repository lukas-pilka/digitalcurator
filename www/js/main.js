$(function(){

	$.nette.init();

	// tlacitko v order formu na vypisu produktu
    $("form.filtr p.submit").css({"position":"absolute","top":"-1000000px"});

	// hide select inputs on order page
	$.nette.ext('formFilterButtonHide', {
		complete:  function () {
			$("form.filtr p.submit").css({"position":"absolute","top":"-1000000px"});
		}
	});

	$("#main").on("change", "form.filtr select", function () {
		$(this).closest("form").submit();
	});


	// ajax loding animation
//	$.nette.ext('loader', {
//		start: function() {
//			ajaxAnimate();
//		},
//		complete: function() {
//			ajaxAnimate();
//		}
//	});

});
