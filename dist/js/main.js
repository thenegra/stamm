var $ = jQuery;
$(document).ready(function(){
	$(window).scroll(function(){
		checkScroll();
	});
	checkScroll();
});
function checkScroll(){
	if($(window).scrollTop()>100){
		$('#header').addClass('sticky');
	} else{
	$('#header').removeClass('sticky');
}
}