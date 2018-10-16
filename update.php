<script>
	// Update document title (because we can't modify document title using header.php)
	// Easy modify title using JavaScript
	document.title = "Update contact";
</script>
<?php
// =========================================================
//  This code allows us update a contact in the 
//  phonebook database
//  
//  This code is part of a simple phone notebook project to
//  be a example of code project of my portfolio
//  Name: Hamilton G, Jr - System Engineer
// =========================================================
	// connection
	require_once 'db_connect.php';

	// session initialization
	session_start();

	if (isset($_POST['btn-update'])) {
		$name = mysqli_escape_string($connect, $_POST['name']);
		$surname = mysqli_escape_string($connect, $_POST['surname']);
		$email = mysqli_escape_string($connect, $_POST['email']);
		$phone = mysqli_escape_string($connect, $_POST['phone']);
		$id = mysqli_escape_string($connect, $_POST['id']);

		$sql = "UPDATE contacts SET name = '$name', surname = '$surname', email = '$email', phone = '$phone' WHERE id = '$id'"; 


		if (mysqli_query($connect, $sql)) {
			$_SESSION['message'] = 'Contact successfully updated';
			header('Location: read.php');
		} else {
			$_SESSION['message'] = 'ERROR: contact not updated';
			header('Location: read.php');
		}
	}
?>
