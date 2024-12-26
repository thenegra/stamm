
$(document).ready(function(){
	$(window).scroll(function(){
		checkScroll();
	});
	checkScroll();
	startGalleries();
	startMarquees();
	onResize();
	resizeVids();
	checkTitles();
	$('#header .contact-btn').click(openMainForm);
	$(window).resize(onResize);
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

function checkTitles(){
	
	if($('.title-container').length){
		
		var ul = document.createElement('ul');
		var _ct = 0;
		if($('.main-post-contents').find('h2,h3,h4,h5,h6').length){
			$('.main-post-contents').find('h2,h3,h4,h5,h6').each(function(){
			//console.log($(this));
			$(this).attr('index',_ct);
			/*var sp = document.createElement('span');
			sp.id = 'heading-'+_ct;
			sp.className = 'padding-test';
			$(this).get(0).append(sp);*/
			$(this).attr('id','heading-'+_ct);
			var li = document.createElement('li');
      li.className = "title "+$(this).get(0).localName;
      li.id = 'tit-'+_ct;
      var sp = document.createElement('a');
      sp.innerHTML = $(this).get(0).textContent;
      sp.href = '#heading-'+_ct;
      li.appendChild(sp);
      ul.appendChild(li);
      _ct++;
		});
		$('.title-container').get(0).appendChild(ul);
		$(document).scroll(function(){
			var _cur = false;
			$('.post-contents').find('h2,h3,h4,h5,h6').each(function(){

				if($(this).position().top-$(window).scrollTop()<60){
					_cur = $(this);
				}
				
				if(_cur){
					var _id = _cur.attr('index');
					$('.title-container .title').removeClass('active');
					$('#tit-'+_id).addClass('active');
				}
			});
		});
		} else{
			$('.title-container').hide();
		}
		
	}
	
}
$(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();
    var _h = $($.attr(this, 'href')).offset().top-60;
    $('html, body').animate({
        scrollTop: _h
    },1000);
});
$('video').each(function(){
	//var file = $(this).attr('src');
	/*var file = new Blob(
    [$(this).attr('src')],
    {"type" : "video\/mp4"});
    var blobUrl = URL.createObjectURL(file);
	$(this).attr('src',blobUrl);*/
	//var urlBlob = URL.createObjectURL(file);
	blobVideo($(this));
});
});
function blobVideo(vid){
	
	fetchVideo(vid.attr('src')).then(function(blob) {
  changeVideoSource(blob, vid.get(0));
});
}
function changeVideoSource(blob, videoElement) {
  var blobUrl = URL.createObjectURL(blob);

 
  videoElement.src = blobUrl;
  videoElement.play();
}

function fetchVideo(url) {
  return fetch(url).then(function(response) {        
    return response.blob();
  });
}


function onResize(){
	resetMarquees();
	resizeGalerias();
	resizeVids();
}
function checkScroll(){
	/*if($(window).scrollTop()>100){
		$('#header').addClass('sticky');
	} else{
	$('#header').removeClass('sticky');
	
}*/
_onScroll();
}
var _marqueeList = new Array();
function startMarquees(){
	
	$('.carrousel-container').each(function(){
		
		$(this).find('img').css('height',$(this).parent().outerHeight());
		var _cont = $(this).find('.inner-carrousel').eq(0);
		var _w = _cont.outerWidth();
		var _o = new Object();
		_o.el = $(this);
		_o.tw = TweenMax.fromTo(_cont, _w/_speed, {marginLeft:0}, {marginLeft:-_w, ease:Linear.easeNone, repeat:-1});
		_o.tw.play();
		_o.el = $(this);
		_marqueeList.push(_o);
	});
}
var _speed = 60;
function resizeGalerias(){
	$('.modulo-galeria').each(function(){
		//console.log($(this).find('.img-container'));
		//$(this).find('.img-container').css('height',$(this).parent().outerHeight());
		//$(this).find('').css('height',$(this).parent.outerHeight());
	});
	$('.background-gallery-container').each(function(){
		$(this).find('img').css('height',$(this).outerHeight());
	})
}
function resizeVids(){
	$('.video-back').each(function(){
		var _ar = $(this).data('aspect');

		if(($(this).outerWidth()/$(this).outerHeight())>_ar){
			$(this).find('.video-container').css({width:$(this).outerWidth(),height:$(this).outerWidth()/_ar});
		} else{
			$(this).find('.video-container').css({width:$(this).outerHeight()/(1/_ar),height:$(this).outerHeight()});
		}
	});
}
function resetMarquees(){
	for(_i=0;_i<_marqueeList.length;_i++){
		var _o = _marqueeList[_i];
		var _el = _o.el;
		_el.find('img').css('height',_el.parent().outerHeight());
		var _cont = _o.el.find('.inner-carrousel').eq(0);
		var _w = _cont.outerWidth();
		var _t = (_o.tw.time());
		_o.tw.kill();
		_o.tw.invalidate();
		_o.tw = TweenMax.fromTo(_cont, _w/_speed, {marginLeft:0}, {marginLeft:-_w, ease:Linear.easeNone, repeat:-1});
		_o.tw.time(_t);
		
	}
}
function startGalleries(){
	/*$('.inner-galeria').slick({
		autoplay:true,autoplaySpeed: 1500,arrows:false,fade: true,infinite:true
	})*/
	var glide = new Glide('.inner-galeria', {
  type: 'slider',
  focusAt: 'center',
  perView: 3
})
}
var _sT;
function _onScroll(){
	if(typeof _sT != "undefined"){
		if($(window).scrollTop()<_sT){
			$('#header').removeClass('hidden');
			$('html').removeClass('hidden-header');
		} else{
			if($(window).scrollTop()>$(window).outerHeight()/2){
				$('#header').addClass('hidden');
				$('html').addClass('hidden-header');
				
			}
			
		}
	}
	_sT = $(window).scrollTop();
}

function openMainForm(){
	openForm(mainForm);
}

function openForm(id){
	$('#form-'+id).fadeIn().addClass('open');
}
function closeForm(id){
	$('#form-'+id).removeClass('open').fadeOut();
}