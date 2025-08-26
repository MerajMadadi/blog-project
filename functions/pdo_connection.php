<?php

global $pdo;
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "blog_project";

try {
    $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ);
    $pdo = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password, $option);
    return $pdo;
}
catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
