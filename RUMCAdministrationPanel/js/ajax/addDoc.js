$('.loadDoc').change(function(){
	allFiles = $('.loadDoc')[0].files;
	countFiles = allFiles.length;

	$('.inp-text').css({'display':'none'});
	$('.labelDoc').append('<ul class="list-loaded-files"></ul>');

	for (i=0; i<countFiles; i++) {
		$('.list-loaded-files').append('<li>'+allFiles[i].name+'</li>');
	}

	$('.labelDoc').css({'z-index':'2'});
	$('.wrapper-btn').css({'display':'flex'});
});

function reloadInp() {
    $('.newFile').animate({
        backgroundColor: 'rgba(0, 243, 0, 0.5)',
    }, 250, function() {
        $('.newFile').animate({
            backgroundColor: 'rgba(255, 255, 255, 0.8)',
        }, 250, function() {
            setTimeout(location.reload(), 5000);
        });
    });
}


$('#backDoc').click(function () {
	location.reload();
});


$('#addDoc').click(function (e) {
	e.preventDefault();

    var sendData = new FormData();

    $.each($('input[name="documents[]"]')[0].files, function(key, input){
		sendData.append('documents[]', input);
	});

    sendData.append('nameCat', $('.selectCat').val());
    sendData.append('defaultDIR', $('#defaultDIR').val());


	$.ajax({
		url: '../../php/addDoc.php',
		type: 'POST',
        cache: false,
		contentType: false,
		processData: false,
		dataType: 'json',
		data: sendData,

		success (data) {
			if (data.status == true) {
				reloadInp();
			} else {
				$('.alert-wrapper').css({'display':'flex'});
				$('.error-send').text(data.message);
			}
		}
	});
});