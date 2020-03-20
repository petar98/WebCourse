<?php
	session_start();

	$cookie_name = "user";
	$cookie_value = "pesho";
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Basics</title>
</head>
<body>
	<?php
		function sum($first, $second) {
			return $first + $second;
		}

		function makeCoffee($type = "Espresso") {
			return "Making a cup of $type. \n";
		}

		$first = 8;
		$second = 12;

		echo "<p>$first + $second = " . sum($first, $second) . "</p>";

		echo nl2br(makeCoffee("beer"));
		echo nl2br(makeCoffee("beer"));

		$values = array(5, 6, 7, 8);
		foreach ($values as $value) {
			echo "$value ";
		}
		echo nl2br("\n");

		$days = array(
			"Monday" => 1,
			"Tuesday" => 2,
			"Wednesday" => 3,
			"Thursday" => 4,
			"Friday" => 5,
			"Saturday" => 6,
			"Sunday" => 7
		);

		foreach ($days as $key => $value) {
			echo nl2br("$key -> $value \n");
		}

		$_SESSION["favourite_color"] = "yellow";
		$_SESSION["username"] = "pesho";

		echo nl2br("Sessions variables are set. \n");

		if (!isset($_COOKIE[$cookie_name])) {
			echo nl2br("Cookie named" . $cookie_name . " is not set. \n");
		} else {
			echo nl2br("Cookie " . $cookie_name . " is set. \n");
			echo nl2br("Value is " . $cookie_value . "\n");
		}

		class Person {
			private $name;

			public function __construct($name) {
				$this->name = $name;
			}

			public function greet() {
				return "Hi, my name is $this->name";
			}
		}

		class Child extends Person {
			public function greet() {
				return parent::greet() . ". Pleased to meet you.";
			}
		}

		$pesho = new Person("Pesho");
		$evche = new Child("Evche");
		echo nl2br($pesho->greet() . "\n");
		echo nl2br($evche->greet() . "\n");
		
		?>
</body>
</html>