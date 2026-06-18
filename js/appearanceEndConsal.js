$(document).ready(function(){

  showB = true;

  $(window).on("scroll", function(){

    if (!showB) return false;

    var w_bottom = $(window).scrollTop() + $(window).height();
    var lmetr_bottom = $(".last-metric").offset().top + $(".last-metric").outerHeight();

    if (w_bottom > lmetr_bottom) {

      $('.metric-text-horiz').css({'display':'block'});

      $('.last-metric').animate({
          width: '100%'
        }, 800, function() {
            
        });

      if ($('.last-metric').css('width') != '0px') {
        $('.metric-background-horizont').animate({
            width: '100%'
          }, 1600, function() {
            
          });
        
        showB = false;  
      } 
    }
    
  });
});