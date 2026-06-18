$('.send-event').click(function (e) {
	e.preventDefault();

	var sendData = new FormData();

	sendData.append('cardPhoto', $('input[name="cardPhoto"')[0].files[0]);

	$.each($('input[name="allPhoto[]"')[0].files,function(key, input){
		sendData.append('allPhoto[]', input);
	});

		sendData.append('typeEvent', $('select[name="typeEvent"]').val());
		sendData.append('tittle', $('input[name="tittle"]').val());
		sendData.append('textEvent', $('textarea[name="textEvent"]').val());
		sendData.append('dateEvent', $('input[name="dateEvent"]').val());
		sendData.append('video', $('input[name="video"]').val());


	$.ajax({
		url: '../../php/addevent.php',
		type: 'POST',
		cache: false,
		contentType: false,
		processData: false,
		dataType: 'json',
		data: sendData,

		success (data) {
			if (data.status == true) {
				$('.alert-wrapper').css({'display':'flex'});
				$('.error-send').text(data.message);
				$('.create-event-form')[0].reset();
			} else {
				$('.alert-wrapper').css({'display':'flex'});
				$('.error-send').text(data.message);
			}
		}
	});
});