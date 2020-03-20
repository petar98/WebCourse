<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Second page</title>
</head>
<body>
	<?php
		echo nl2br("Welcome to the second page. \n");

		echo nl2br("favourite_color: " . $_SESSION["favourite_color"] . "\n");
		echo nl2br("favourite_color: ". $_SESSION["username"] . "\n");

		session_unset();
		session_destroy();
	?>
</body>
</html>