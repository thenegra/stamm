
$(document).ready(function(){
	$(window).scroll(function(){
		checkScroll();
	});
	checkScroll();
	if($(window).width()<=1024){
		$('.nav .menu ul').hide();
	}
	$('.nav .hamb').click(function(){
		$('.nav .menu ul').slideToggle();
	});
	$('#header .menu-main-menu-container a').click(function(){
		$('.nav .menu ul').slideUp();
	});
});
function checkScroll(){
	if($(window).scrollTop()>100){
		$('#header').addClass('sticky');
	} else{
	$('#header').removeClass('sticky');
}
}