$('.closeMessage').click(function () {
	$('.alert-wrapper').css({'display':'none'});
	$('#deleteFile').remove();
	$('#closeAlert').remove();
});

$('.alert-wrapper').click(function () {
	$('.alert-wrapper').css({'display':'none'});
});