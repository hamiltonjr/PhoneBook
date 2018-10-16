<script>
	// Update document title (because we can't modify document title using header.php)
	// Easy modify title using JavaScript
	document.title = "Add contacts";
</script>
<?php
// =========================================================
//  This code allows us add a contact in the phonebook 
//  database
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
  			<h3 class="light">New contact</h3>
        <form action="create.php" method="POST">
          <div class="input-field col s12">
            <input type="text" name="name" id="name">
            <label for="name">Name</label>
          </div>
          <div class="input-field col s12">
            <input type="text" name="surname" id="surname">
            <label for="surname">Surname</label>
          </div>
          <div class="input-field col s12">
            <input type="text" name="email" id="email">
            <label for="email">Email</label>
          </div>
          <div class="input-field col s12">
            <input type="text" name="phone" id="phone">
            <label for="phone">Phone</label>
          </div>
   		  <button type="submit" class="btn" name="btn-create">Add</button>
		  <a href="read.php" class="btn">Cancel</a>
        </form>
		</div>
	</div>

<?php
	// footer
	require_once 'footer.php';
?>