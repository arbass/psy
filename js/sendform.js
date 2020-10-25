$(function(){
	$('#email-form').submit(function(e){
		$.ajax({
			url:'https://kopytok.art/ajax/telegram.php',
			method:'POST',
			cacshe: false,
			data: $(this).serialize(),
			dataType: 'json',
			success: function(data) {
				if(data.status && data.status == 'success') {
					$('.success-message').show();
					$('#email-form').hide();
				} else {
					$('.w-form-fail').show();
					$('#email-form').hide();
					// alert("Something went wrong =( \n Please try again later.");
				}
			},
			error: function() {
				$('.w-form-fail').show();
				$('#email-form').hide()
				// alert("Something went wrong =( \n Please try again later.");
			}
		})
		return false;
	});
});