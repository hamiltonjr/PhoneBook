<?php
// =========================================================
//  This code allows us to login our phonebook
//  
//  This code is part of a simple phone notebook project to
//  be a example of code project of my portfolio
//  Name: Hamilton G, Jr - System Engineer
// =========================================================

// connection
require_once 'db_connect.php';

// session initialization
session_start();

if (isset($_SESSION['logged'])) {
	header('Location: read.php');
}

// catch button clicked
if (isset($_GET['btn-login'])) {
	$errors = [];
	// catch entries
	$login = mysqli_escape_string($connect, $_GET['login']);
	$passw = mysqli_escape_string($connect, $_GET['password']);

	if (empty($login) or empty($passw)) {
		$errors[] = "<li>Please fill the fields</li>";
	} else {
		// verifying if login exists
		$sql = "SELECT login FROM users WHERE login = '$login'";
		$result = mysqli_query($connect, $sql);

		if (mysqli_num_rows($result) > 0) {
			$sql = "SELECT * FROM users WHERE login = '$login' AND pass = md5('$passw')";
			$result = mysqli_query($connect, $sql);

			if (mysqli_num_rows($result) == 1) {
				$data = mysqli_fetch_array($result);
				$_SESSION['logged'] = true;
				$_SESSION['id-user'] = $data['id'];
				header('Location: read.php');
			} else {
				$errors[] = "<li>Unrecognized user or password</li>";
			}
		} else {
			$errors[] = "<li>Unrecognized user</li>";
		}
	}
}

	// closing connection
	mysqli_close($connect);

	// header for HTML intreface
	include_once 'header.php';
?>
		<div class="row">
	  		<div class="col s12 m6 push-m3">
			    <h3 class="light">Log in</h3>
				<?php
					// show errors
					if (!empty($errors)) {
						foreach($errors as $error) {
							echo $error;
						}				
					}

				?>

				<!-- form for login / password input-->
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
				    <div class="input-field col s12">
						<input type="text" name="login" autocomplete="off"><br/>
					    <label for="login">Login</label>
				    </div>
				    <div class="input-field col s12">
						<input type="password" name="password" value="" autocomplete="off"><br/>
					    <label for="password">Password</label>
				    </div>
					<button type="submit" name="btn-login" class="btn green">Log in</button>
					<a href="index.html" class="btn">Home</a>
				</form>
			</div>
		</div>

<?php
	include_once 'footer.php';
?>
