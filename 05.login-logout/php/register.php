<?php

require_once "DatabaseConnection.php";

$dbHandler = new DatabaseConnection();
$connection = $dbHandler->getConnection();

$data = json_decode(file_get_contents('php://input'), true);

$sqlInsertUserStatement = "INSERT INTO Users (username, name) VALUES (?,?)";
$insertStatement = $connection->prepare($sqlInsertUserStatement);
$result = $insertStatement->execute([$data['username'], $data['name']]);

$response = array();
if (!$result) {
	$response = array(
		'status' => true
	);
	echo json_encode($response);
} else {
	$response = array(
		'status' => true
	);
	echo json_encode($response);
}