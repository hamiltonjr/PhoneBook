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

  // mensagem
  include_once 'message.php';

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
  						<td><strong>Name</strong></td>
  						<td><strong>Surname</strong></td>
  						<td><strong>Email</strong></td>
  						<td><strong>Phone</strong></td>
  					</tr>
  				</thead>
  				<tbody>
            <?php
              $sql = "SELECT * FROM contacts ORDER BY name";
              $result = mysqli_query($connect, $sql);
              while ($data = mysqli_fetch_array($result)) {
            ?>
  					<tr>
  						<td><?php echo $data['name'] ?></td>
              <td><?php echo $data['surname'] ?></td>
              <td><?php echo $data['email'] ?></td>
              <td><?php echo $data['phone'] ?></td>
  						<td><a href="edit.php?id=<?php echo $data['id']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>
  						<td><a href="" class="btn-floating red"><i class="material-icons">delete</i></a></td>
  					</tr>
            <?php }
            ?>			
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