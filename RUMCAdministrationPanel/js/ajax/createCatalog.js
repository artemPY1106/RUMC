function reloadSelect(nameCat) {
    $('.newCatalog').animate({
        backgroundColor: 'rgba(0, 243, 0, 0.5)',
    }, 250, function() {
        $('.newCatalog').animate({
            backgroundColor: 'rgba(255, 255, 255, 0.8)',
        }, 250, function() {
            setTimeout(location.reload(), 5000);
        });
    });

    $('.company').append('<option value="'+nameCat+'">'+nameCat+'</option>');
    
}



$('#createCat').click(function (e) {
	e.preventDefault();

    let nameCat = $('#nameCat').val(),
        defaultDIR = $('#defaultDIR').val();

	$.ajax({
		url: '../../php/createCatalog.php',
		type: 'POST',
		dataType: 'json',
		data: { 
            nameCat, 
            defaultDIR
        },

		success (data) {
			if (data.status == true) {
				reloadSelect(data.nameCat);
			} else {
				$('.alert-wrapper').css({'display':'flex'});
				$('.error-send').text(data.message);
			}
		}
	});
});