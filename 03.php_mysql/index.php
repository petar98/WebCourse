<?php

require_once "DatabaseConnection.php";

$db = new DatabaseConnection();

$connection = $db->getConnection();

$db->insertStatement("INSERT INTO `Users` (username, name) VALUES ('testification_second', 'Pesho The Second')");

$sql = "SELECT * FROM `Users`";

$query = $connection->query($sql) or die("failed!");

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
	echo nl2br($row['username'] . " " . $row['name'] . " registered on " . $row['registered'] . "\n");
}

?>