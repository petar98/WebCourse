<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<?php 
		if (isset($_SESSION['user_id'])) {
			echo "Hello user with id " . $_SESSION['user_id'];
			echo '<a href="logout.php">Logout</a>';
		} else {
			echo '<a href="login.php">Login</a>';
		}
	 ?>
</body>
</html>