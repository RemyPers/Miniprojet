$(document).ready(function() {
	$('#soumission').click(function() {
		var retour = true;
		
		if($('#pseudo').val()=='') {
			$('#pseudo').css('border-color', 'red');
			$('.erreurPseudo').html('<i>Merci d\'entrer votre pseudo</i>').css('color','red');
			retour = false;
		} else {
			$('#pseudo').css('border-color', 'green');
			$('.erreurPseudo').html('');
		}

		if($('#password').val()=='') {
			$('#password').css('border-color', 'red');
			$('.erreurPassword').html('<i>Merci d\'entrer votre password</i>').css('color','red');
			retour = false;
		} else {
			$('#password').css('border-color', 'green');
			$('.erreurPassword').html('');
		}
		
		return retour;
	});
});