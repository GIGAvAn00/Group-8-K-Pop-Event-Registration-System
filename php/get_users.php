<?php
header("Content-Type: application/json");
require_once "db.php";

$stmt = $pdo->query("
    SELECT 
        u.user_id,
        u.username,
        u.full_name,
        u.email,
        COUNT(r.id) AS registered_events
    FROM users u
    LEFT JOIN registrations r ON u.user_id = r.user_id
    WHERE u.role = 'fan'
    GROUP BY u.id
    ORDER BY u.created_at DESC
");

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    "success" => true,
    "users" => $users
]);
?>