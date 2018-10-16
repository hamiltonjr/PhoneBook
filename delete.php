<script>
	// Update document title (because we can't modify document title using header.php)
	// Easy modify title using JavaScript
	document.title = "Delete contact";
</script>
<?php
// =========================================================
//  This code allows us delete a contact in the 
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

	if (isset($_POST['btn-delete'])) {
		$id = mysqli_escape_string($connect, $_POST['id']);

		$sql = "DELETE FROM contacts WHERE id = '$id'"; 


		if (mysqli_query($connect, $sql)) {
			$_SESSION['message'] = 'Contact successfully deleted';
			header('Location: read.php');
		} else {
			$_SESSION['message'] = 'ERROR: contact not deleted';
			header('Location: read.php');
		}
	}
?>
