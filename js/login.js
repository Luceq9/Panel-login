$(document).ready(function () {
	$('#loginBtn').on('click', function () {
		var email = $('#email').val()
		var password = $('#password').val()

		var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
		if (!emailPattern.test(email)) {
			$('#errorMessage').text('Nieprawidłowy format email.')
			return
		}

		if (password.length < 8) {
			$('#errorMessage').text('Hasło musi mieć minimum 8 znaków.')
			return
		}

		$.ajax({
			url: 'php/login.php',
			type: 'POST',
			data: { email: email, password: password },
			success: function (response) {
				if (response.success) {
					window.location.href = 'index.php'
				} else {
					$('#errorMessage').text(response.message)
				}
			},
			error: function () {
				$('#errorMessage').text('Wystąpił błąd podczas logowania.')
			},
		})
	})
})
