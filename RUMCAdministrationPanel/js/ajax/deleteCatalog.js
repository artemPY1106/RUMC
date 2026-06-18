$(document).ready(function(){
    countCatalogs = $(".wrapper-catalogs").children().length;
    for (i=0; i<countCatalogs; i++) {
        if ($(".filestorage")[i].children.length == 0) {
            $(".delBtn")[i].style.display = 'block';
        }
    }
});

$('.delBtn').click(function(){
    catDir = $(this).attr('value');
    catDir = catDir.slice(3);
    catDir = catDir.slice(0, -1);
    catName = catDir.split('/')[4];

    $.ajax({
		url: '../../php/deleteCat.php',
		type: 'POST',
		dataType: 'json',
		data: {
            catDir,
            catName
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