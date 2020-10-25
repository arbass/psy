$(function(){
	$('#wf-form-Landing-Page-Subscribe-Form').submit(function(e){
		$.ajax({
			url:'https://posazhennikova.ru/ajax/telegram.php',
			method:'POST',
			cacshe: false,
			data: $(this).serialize(),
			dataType: 'json',
			success: function(data) {
				if(data.status && data.status == 'success') {
					$('.form-success').show();
					$('#wf-form-Landing-Page-Subscribe-Form').hide();
				} else {
					$('.w-form-fail').show();
					$('#wf-form-Landing-Page-Subscribe-Form').hide();
					// alert("Something went wrong =( \n Please try again later.");
				}
			},
			error: function() {
				$('.w-form-fail').show();
				$('#wf-form-Landing-Page-Subscribe-Form').hide()
				// alert("Something went wrong =( \n Please try again later.");
			}
		})
		return false;
	});
});
