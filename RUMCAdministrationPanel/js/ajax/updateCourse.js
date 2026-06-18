$('.send-inf').click(function (e) {
	e.preventDefault();

    idkurs = $('input[name="idK"]').val();
    tittle = $('input[name="tittle"]').val();
    about = $('input[name="about"]').val();
    dateStart = $('input[name="dateStart"]').val();
    dateEnd = $('input[name="dateEnd"]').val();
    linkCourse = $('input[name="linkCourse"]').val();


	$.ajax({
		url: '../../php/updateCourse.php',
		type: 'POST',
		dataType: 'json',
		data: {
            idkurs,
            tittle,
            about,
            dateStart,
            dateEnd,
            linkCourse
        },

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