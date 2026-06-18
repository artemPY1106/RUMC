$('.delete-course').click(function(){
    idkurs=$(this).val();
    $('.alert-wrapper').css({'display':'flex'});
	$('.error-send').text('Вы действительно хотите удалить этот курс?');
    $('.window-alert').append('<p class="sendInfo" id="closeAlert">Отмена</p> <input type="submit" id="deleteFile" class="sendInfo" value="Удалить"/>');
});


$('.window-alert').on('click', '#closeAlert',function(){
    $('.alert-wrapper').css({'display':'none'});
	$('#deleteFile').remove();
	$('#closeAlert').remove();
});

$('.window-alert').on('click', '#deleteFile',function(){
    $.ajax({
        url: '../../php/deleteCourse.php',
        type: 'POST',
        dataType: 'json',
        data: {
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
});