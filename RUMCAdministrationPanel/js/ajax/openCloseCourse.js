$('.close-open').click(function(){
    valBtn = $(this).text();
    idkurs = $(this).val();
    
    if (valBtn == 'Открыть курс' || valBtn == 'Закрыть курс') {
        $.ajax({
            url: '../../php/openCloseCourse.php',
            type: 'POST',
            dataType: 'json',
            data: {
                valBtn,
                idkurs
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
    } else {
        $('.alert-wrapper').css({'display':'flex'});
		$('.error-send').text('Не надо тут лазить');
    }
});