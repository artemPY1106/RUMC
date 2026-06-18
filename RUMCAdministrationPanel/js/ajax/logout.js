$('#logout').click(function (e) {
	e.preventDefault();

	$.ajax({
		url: './php/logout.php',
		type: 'POST',

		success () {
			localStorage.removeItem('preload');
            location.reload();
		}
	});
});