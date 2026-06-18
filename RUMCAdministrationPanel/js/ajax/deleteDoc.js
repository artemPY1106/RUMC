$('.closeDel').click(function(){
    fileDir = $(this).attr('value');
    fileName = fileDir.split('/')[6];
    fileDir = fileDir.slice(3);
    $('.alert-wrapper').css({'display':'flex'});
	$('.error-send').text('Вы действительно хотите удалить файл - '+fileName+'?');
    $('.window-alert').append('<p class="sendInfo" id="closeAlert">Отмена</p> <input type="submit" class="sendInfo" id="deleteFile" value="Удалить"/>');
});

$('.window-alert').on('click', '#closeAlert',function(){
    $('.alert-wrapper').css({'display':'none'});
	$('#deleteFile').remove();
	$('#closeAlert').remove();
});

$('.window-alert').on('click', '#deleteFile',function(){
    $.ajax({
		url: '../../php/deleteDoc.php',
		type: 'POST',
		dataType: 'json',
		data: {
            fileDir
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