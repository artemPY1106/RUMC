$(document).ready(function() {
	if ($('.start-page').css('display') != 'none') {
		$('.start-page').animate({
            right: '0px'
        }, 1500, function() {
            
        });
	}
});

function bgPropCourse() {
    $('.level-course:contains("Базовый уровень")').css({'background-color':'rgba(47, 171, 212, 1)'});
    $('.level-course:contains("Продвинутый уровень")').css({'background-color':'rgba(255, 53, 115, 1)'});

    $('.status-course:contains("открыт")').css({'background-color':'rgba(47, 171, 212, 1)'});
    $('.status-course:contains("закрыт")').css({'background-color':'rgba(255, 53, 115, 1)'});
}