$(document).ready(function(){
    if (window.matchMedia('(max-width: 860px)').matches) {
        $('nav').removeClass('nav-menu');
        $('.uwy').css({'display':'none'});
    }

    window.addEventListener('resize', () => {
        if (window.matchMedia('(min-width: 861px)').matches) {
            $('nav').addClass('nav-menu');
            $('nav').css({'left':'-320px'});
        }

        if (window.matchMedia('(max-width: 860px)').matches) {
            $('nav').removeClass('nav-menu');
            $('nav').css({'left':'0'});          
        }
      });
});
