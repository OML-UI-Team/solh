$(document).ready(function(){
    $('#contact-form').submit(function(event){
    	event.preventDefault();
	    var form = $(this);
	    $.ajax({
		type: "POST",
		url: "php/contact-save.php",
		// dataType: "json",
		// async: false,
		data: form.serialize(),
		beforeSend: function() {
            $('button').attr('disabled', true);
			$('.submit-loader').fadeIn();
        },
		success: function (data) {
			data = JSON.parse(data);
		    if(data.status == "success") {
		        $('.scss-msg').text(data.message);
		        $('.scss-div').fadeIn();
		        $('.err-div').fadeOut();
                form.find('input,textarea').val("");
		        //window.location.href = "thank-you.php";
		    }

		    if(data.status == "error") {
		        $('.err-msg').text(data.message);
		        $('.err-div').fadeIn();
		        $('.scss-div').fadeOut();
		    }
		},
		error: function (textStatus, errorThrown) {
		        $('.err-msg').text('Somthing went wrong!');
		        $('.err-div').fadeIn();
		        $('.scss-div').fadeOut();
		},
        complete: function() {
            $('button').attr('disabled', false);
			$('.submit-loader').fadeOut();
        }
	    })
    });
});