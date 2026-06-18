$(document).ready(function() {
    if (localStorage.getItem('preload')==null) {
        $('.start-alert-wrapper').css({'display':'flex'});
        $('.start-alert-wrapper').animate({
            opacity: '0'
        }, 4000, function() {
            $('.start-alert-wrapper').css({'display':'none'});
        });
        localStorage.setItem('preload', true);
    }	
});