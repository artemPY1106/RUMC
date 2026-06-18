$(document).ready(function(){

  show = true;

  $(window).on("scroll", function(){

    if (!show) return false;

    var w_bottom = $(window).scrollTop() + $(window).height();
    var fa_bottom = $(".first-about").offset().top + $(".first-about").outerHeight();
    var sa_bottom = $(".second-about").offset().top + $(".second-about").outerHeight();
    var tm_bottom = $(".tittle-map").offset().top + $(".tittle-map").outerHeight();
    var tt_bottom = $(".tasks-tittle").offset().top + $(".tasks-tittle").outerHeight();
    var t1_bottom = $(".t1").offset().top + $(".t1").outerHeight();
    var t2_bottom = $(".t2").offset().top + $(".t2").outerHeight();
    var t3_bottom = $(".t3").offset().top + $(".t3").outerHeight();
    var t4_bottom = $(".t4").offset().top + $(".t4").outerHeight();
    var tcons_bottom = $(".consaling-tittle").offset().top + $(".consaling-tittle").outerHeight();
    var metr_bottom = $(".metrics-content").offset().top + $(".metrics-content").outerHeight();
    var lmetr_bottom = $(".last-metric").offset().top + $(".last-metric").outerHeight();

    if (w_bottom > fa_bottom) {
      $(".first-about").addClass("element-show-left");
    }

    if (w_bottom > sa_bottom) {
      $(".second-about").addClass("element-show-right");
    }

     if (w_bottom > tm_bottom) {
      $(".tittle-map").addClass("element-show-opacity");
    }

    if (w_bottom > tt_bottom) {
      $(".tasks-tittle").addClass("element-show-opacity");
    }

    if (w_bottom > t1_bottom) {
      $(".t1").addClass("element-show-opacity");
    }

    if (w_bottom > t2_bottom) {
      $(".t2").addClass("element-show-opacity");
    }

    if (w_bottom > t3_bottom) {
      $(".t3").addClass("element-show-opacity");
    }

    if (w_bottom > t4_bottom) {
      $(".t4").addClass("element-show-opacity");
    }

    if (w_bottom > tcons_bottom) {
      $(".consaling-tittle").addClass("element-show-opacity");
    }

    if (w_bottom > metr_bottom) {

      $('.spincrement').css({'display':'block'});
      $('.metric-text').css({'display':'block'});

      $('.met1').animate({
          height: '100%'
        }, 400, function() {
            
        });

      $('.met2').animate({
          height: '100%'
        }, 600, function() {
            
        });

      $('.met3').animate({
          height: '100%'
        }, 800, function() {
            
        });

      $('.met4').animate({
          height: '100%'
        }, 1000, function() {
            
        });

      if ($('.metric').css('height') != '0px') {
          $('.m-bg4').animate({
            height: '100%'
          }, 2000, function() {
            
          });

          $('.m-bg3').animate({
            height: '100%'
          }, 2200, function() {
            
          });

          $('.m-bg2').animate({
            height: '100%'
          }, 2400, function() {
            
          });

          $('.m-bg1').animate({
            height: '100%'
          }, 2600, function() {
            
          });

          $('.spincrement').spincrement({
            duration: 5000
          });

          show = false;
      }
    }
  });
});