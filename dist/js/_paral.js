$(window).ready(function(){

    startScrolls();

})
function startScrolls(){
    _checkParalScroll();
    $(window).on('scroll',function(){
        _checkParalScroll();
    });
   
}
function _checkParalScroll(){
    //document.documentElement.style.setProperty('--scrollbar-width', (window.innerWidth - document.documentElement.clientWidth) + "px");
    
    
    $('*[data-anim=true]').each(function(){
        
        var _el = $(this);
        var _sc = isScrolledIntoView(_el);
    
        if(_sc.bol){
            //console.log($(this).data('scroll-speed'));
            var _sp = (Math.abs($(this).data('scroll-speed'))>0) ? $(this).data('scroll-speed') : 1;

            if($(window).outerWidth()<768){
                _sp = .6;
            }
           // console.log(_sp);
            var _y = _sc.num*_sp*window.innerHeight*.1;
            TweenLite.to(_el,.9,{y:_y,ease:Power2.easeOut});
        }
    });
}
function isScrolledIntoView(el) {
    
    if (el.get(0)){
        el = el.get(0);
    }
    var rect = el.getBoundingClientRect();
    var elemTop = rect.top;
    var elemBottom = rect.bottom;

    // Only completely visible elements return true:
    //var isVisible = (elemTop >= 0) && (elemBottom <= window.innerHeight);
    var isVisible = elemTop < window.innerHeight*2 && elemBottom >= -window.innerHeight*.5;
    // Partially visible elements return true:
    var _num;
    if(isVisible){
        var _top = (elemBottom-elemTop)/2;
        if($(el).data('anchor') == 'top') _top = 0;
        _num = (elemTop+_top)/window.innerHeight-.5;
        if($(el).data('scroll-onlytop') == true){
            _num = -getYPosition()/window.innerHeight;
            
            //(elemTop+_top+window.innerHeight/2)/window.innerHeight-.5;
            /*
            if(_num>0 || getYPosition() == 0){
                _num = 0;
                console.log('este es 0 por el Y');
            }*/
        }
    }
    return {bol:isVisible,num:_num};
}