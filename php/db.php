<?php
header("Content-Type: application/json; charset=UTF-8");

$host = "localhost";
$dbname = "ksign_db";
$username = "root";
$password = "";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "message" => "Database connection failed.",
        "error" => $e->getMessage()
    ]);
    exit;
}
?>