<?php
include 'db.php';

header("Content-Type: application/json");

$user_id = $_GET['user_id'];

$sql = "SELECT r.id, e.name as event_name, r.status, r.registered_at
        FROM registrations r
        JOIN events e ON r.event_id = e.id
        WHERE r.user_id = ?
        ORDER BY r.registered_at DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
?>