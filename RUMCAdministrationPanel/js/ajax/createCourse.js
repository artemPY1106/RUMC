$(document).ready(function(){
    $('.level-course:contains("Базовый уровень")').css({'background-color':'rgba(47, 171, 212, 1)'});
    $('.level-course:contains("Продвинутый уровень")').css({'background-color':'rgba(255, 53, 115, 1)'});

    countCourses = $(".wrapper-courses").children().length;
    for (i=0; i<countCourses; i++) {
        if ($('.status-course')[i].textContent == 'закрыт') {
            $('.status-course').eq(i).css({'background-color':'rgba(255, 53, 115, 1)'});
            $('.close-open').eq(i).text('Открыть курс')
        } else {
            $('.status-course').eq(i).css({'background-color':'rgba(47, 171, 212, 1)'});
            $('.close-open').eq(i).text('Закрыть курс')
        }

        if ($('.level-course').eq(i).text() == '') {
            $('.level-course').eq(i).remove();
        }
    }

});

$('.send-inf').click(function (e) {
	e.preventDefault();

	var sendData = new FormData();

	sendData.append('cardPhoto', $('input[name="cardPhoto"')[0].files[0]);

    sendData.append('tittle', $('input[name="tittle"]').val());
    sendData.append('about', $('input[name="about"]').val());
    sendData.append('dateStart', $('input[name="dateStart"]').val());
    sendData.append('dateEnd', $('input[name="dateEnd"]').val());
    sendData.append('levelCourse', $('select[name="levelCourse"]').val());
    sendData.append('linkCourse', $('input[name="linkCourse"]').val());


	$.ajax({
		url: '../../php/createCourse.php',
		type: 'POST',
		cache: false,
		contentType: false,
		processData: false,
		dataType: 'json',
		data: sendData,

		success (data) {
			if (data.status == true) {
				location.reload();
			} else {
				$('.alert-wrapper').css({'display':'flex'});
				$('.error-send').text(data.message);
			}
		}
	});
});