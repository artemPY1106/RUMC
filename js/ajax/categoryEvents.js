function initButtonsCategory () {
	$('#vebinars').click(function (e) {
		e.preventDefault();

		$.ajax({
			url: 'php/takevebinars.php',
			type: 'POST',
			success: function(result) {
				$('.all-news-wrapper').empty();
				let response = JSON.parse(result);
				for (let i=0; i<response.length; i++) {
					$('.all-news-wrapper').append(
						'<div class="news-block"> <a class="link-event" href="./event.php?id='+response[i].idEvent+'"> <div class="img-event"> <img src="./'+response[i].tittleImage+'" /> </div> <div class="tittle-event"> <p> '+response[i].tittle+' </p> </div> </a> </div>'
					);
				}
			}
		});
	});

	$('#allEvents').click(function (e) {
		e.preventDefault();

		$.ajax({
			url: 'php/takeallEvents.php',
			type: 'POST',
			success: function(result) {
				$('.all-news-wrapper').empty();
				let response = JSON.parse(result);
				for (let i=0; i<response.length; i++) {
					$('.all-news-wrapper').append(
						'<div class="news-block"> <a class="link-event" href="./event.php?id='+response[i].idEvent+'"> <div class="img-event"> <img src="./'+response[i].tittleImage+'" /> </div> <div class="tittle-event"> <p> '+response[i].tittle+' </p> </div> </a> </div>'
					);
				}
			}
		});
	});

	$('#other').click(function (e) {
		e.preventDefault();

		$.ajax({
			url: 'php/takeotherEvents.php',
			type: 'POST',
			success: function(result) {
				$('.all-news-wrapper').empty();
				let response = JSON.parse(result);
				for (let i=0; i<response.length; i++) {
					$('.all-news-wrapper').append(
						'<div class="news-block"> <a class="link-event" href="./event.php?id='+response[i].idEvent+'"> <div class="img-event"> <img src="./'+response[i].tittleImage+'" /> </div> <div class="tittle-event"> <p> '+response[i].tittle+' </p> </div> </a> </div>'
					);
				}
			}
		});
	});
}