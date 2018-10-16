<script>
	// Update document title (because we can't modify document title using header.php)
	// Easy modify title using JavaScript
	document.title = "Create contact";
</script>
<?php
// =========================================================
//  This code allows us create/add a contact in the 
//  phonebook database
//  
//  This code is part of a simple phone notebook project to
//  be a example of code project of my portfolio
//  Name: Hamilton G, Jr - System Engineer
// =========================================================
	// connection
	require_once 'db_connect.php';

	if (isset($_POST['btn-create'])) {
		$name = mysqli_escape_string($connect, $_POST['name']);
		$surname = mysqli_escape_string($connect, $_POST['surname']);
		$email = mysqli_escape_string($connect, $_POST['email']);
		$phone = mysqli_escape_string($connect, $_POST['phone']);

		$sql = "INSERT INTO contacts (name, surname, email, phone) 
			VALUES ('$name', '$surname', '$email', '$phone')";

		if (mysqli_query($connect, $sql)) {
			header('Location: read.php?Sucesso');
		} else {
			header('Location: read.php?Falha');
		}
	}
?>
