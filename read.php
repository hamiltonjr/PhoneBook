<script>
	// Update document title (because we can't modify document title using header.php)
	// Easy modify title using JavaScript
	document.title = "Show contacts";
</script>
<?php
	require_once 'db_connect.php';
	require_once 'header.php';
	session_start();

	if (isset($_SESSION['id-user'])) {
		$id = $_SESSION['id-user'];
		$sql = "SELECT * FROM users WHERE id = '$id'";
		$result = mysqli_query($connect, $sql);
		$data = mysqli_fetch_array($result);
		$login = $data['login'];
	} 
?>

	<div class="row">
  		<div class="col s12 m6 push-m3">
			<h2 class="light">Hello <?php echo $login; ?></h2>
			<a href="logout.php" class="btn">Log out</a>
		</div>
	</div>
<?php
	require_once 'footer.php';
?>