
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
});
function checkScroll(){
	if($(window).scrollTop()>100){
		$('#header').addClass('sticky');
	} else{
	$('#header').removeClass('sticky');
}
}