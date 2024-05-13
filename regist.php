<?php
require 'functions.php';

if (isset($_POST["register"])) {

	if (registrasi($_POST) > 0) {
		echo "<script>
					alert('new user succes added !');
				</script>";
	} else {
		echo mysqli_error($conn);
	}
}

?>


<!DOCTYPE html>
<html>

<head>

	<title>Registrasi</title>
</head>

<body>


	<form class="box" action="" method="post">
		<h1>Register</h1>

		<label for="username"></label>
		<input type="text" name="username" id="username" placeholder="username">


		<label for="password"></label>
		<input type="password" name="password" id="password" placeholder="password">


		<label for="password2"></label>
		<input type="password" name="password2" id="password2" placeholder="confirm password">


		<button type="submit" name="register">Register</button>


	</form>


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>