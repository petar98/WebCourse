<?php

$data = json_decode(file_get_contents('php://input'), true);

$isValid = true;
foreach($data as $key => $value) {
    if (!validateInputField($data, $key)) {
        $isValid = false;
        break;
    }
}

if ($isValid) {
    require_once "DatabaseConnection.php";

    $dbHandle = new DatabaseConnection();
    $connection = $dbHandle->getConnection();
    
    $sqlInsertStatement = "INSERT INTO `UserInfo` (firstName, lastName, year, major, facultyNumber, groupNumber, birthdate, zodiacSign, link, imagePath, motivation) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    $prepareStatement = $connection->prepare($sqlInsertStatement);
    
    $result = $prepareStatement->execute([$data["firstName"], $data["lastName"], (int)$data["year"], $data["major"], $data["fn"], (int)$data["group"], substr($data["birthdate"], 0, 10), $data["zodiacSign"], $data["link"], $data["image"], $data["motivation"]]);
    
    if ($result) {
        $response = array(
            "status" => true
        );
        echo json_encode($response);
    } else {
        $errorMessage = $prepareStatement->errorInfo();
        $response = array(
            "status" => false,
            "message" => "There was an error saving your data to the database: " . $errorMessage[2]
        );
        echo json_encode($response);
    }
} else {
    $response = array(
        "status" => false
    );
    echo json_encode($response);
}

function validateInputField($input, $key) {
    if (isset($input[$key]) && trim($input[$key]) !== "") {
        return true;
    }
}