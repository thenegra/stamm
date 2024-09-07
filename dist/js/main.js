
$(document).ready(function(){
	$(window).scroll(function(){
		checkScroll();
	});
	checkScroll();
	startGalleries();
	if($(window).width()<=1024){
		$('.nav .menu ul').hide();
	}
	$('.nav .hamb').click(function(){
		$('.nav .menu ul').slideToggle();
	});
	$('#header .menu-main-menu-container a').click(function(){
		if($(window).width()<=1024){
			$('.nav .menu ul').slideUp();
		}
	});


$(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();
    var _h = $($.attr(this, 'href')).offset().top;
    $('html, body').animate({
        scrollTop: _h
    },1000);
});
});
function checkScroll(){
	if($(window).scrollTop()>100){
		$('#header').addClass('sticky');
	} else{
	$('#header').removeClass('sticky');
}
}
function startGalleries(){
	$('.inner-galeria').slick({
		autoplay:true,arrows:false,fade: true,infinite:true
	})
}