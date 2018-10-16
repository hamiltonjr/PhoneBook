<script>
	// Update document title (because we can't modify document title using header.php)
	// Easy modify title using JavaScript
	document.title = "Edit contacts";
</script>
<?php
// =========================================================
//  This code allows us edit a contact in the phonebook 
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

  		<?php
  			// catch data from database
			if (isset($_GET['id'])) {
				$id = mysqli_escape_string($connect, $_GET['id']);
				$sql = "SELECT * FROM contacts WHERE id = '$id'";
				$result = mysqli_query($connect, $sql);
				$data = mysqli_fetch_array($result);
			}
		?>
	
        <form action="update.php" method="POST">
          <div class="input-field col s12">
          	<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
            <input type="text" name="name" id="name" value="<?php echo $data['name']; ?>">
            <label for="name">Name</label>
          </div>
          <div class="input-field col s12">
            <input type="text" name="surname" id="surname" value="<?php echo $data['surname']; ?>">
            <label for="surname">Surname</label>
          </div>
          <div class="input-field col s12">
            <input type="text" name="email" id="email" value="<?php echo $data['email']; ?>">
            <label for="email">Email</label>
          </div>
          <div class="input-field col s12">
            <input type="text" name="phone" id="phone" value="<?php echo $data['phone']; ?>">
            <label for="phone">Phone</label>
          </div>
   		  <button type="submit" class="btn" name="btn-update">Update</button>
		  <a href="read.php" class="btn">Cancel</a>
        </form>
		</div>
	</div>

<?php
	// footer
	require_once 'footer.php';
?>