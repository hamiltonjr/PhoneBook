<script>
	// Update document title (because we can't modify document title using header.php)
	// Easy modify title using JavaScript
	document.title = "Show contacts";
</script>
<?php
// =========================================================
//  This code allows us show the contacts already added in
//  the phonebook database
//  
//  This code is part of a simple phone notebook project to
//  be a example of code project of my portfolio
//  Name: Hamilton G, Jr - System Engineer
// =========================================================
	// connection
	require_once 'db_connect.php';

	// header
	require_once 'header.php';

	// session initialization
	session_start();

	// show user name
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
        <p>Logged: <?php echo $login ?></p>
  			<h3 class="light">Show contacts</h3>
  			<table class="striped">
  				<thead>
  					<tr>
  						<td>Name</td>
  						<td>Surname</td>
  						<td>Email</td>
  						<td>Phone</td>
  					</tr>
  				</thead>
  				<tbody>
  					<tr>
  						<td>Hamilton</td>
  						<td>Gonçalves Jr</td>
  						<td>hamiltonjr2010@gmail.com</td>
  						<td>19997930712</td>
  						<td><a href="" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
  						<td><a href="" class="btn-floating red"><i class="material-icons">delete</i></a></td>
  					</tr>  					
  				</tbody>
  			</table><br/>
  			<a href="add.php" class="btn">Add contact</a>
  			<a href="index.html" class="btn">Home</a>
		</div>
	</div>

<?php
	// footer
	require_once 'footer.php';
?>