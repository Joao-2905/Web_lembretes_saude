<?php
session_start();

if (!isset($_SESSION['user'])) {
    echo "nologin";
    exit;
}

include "db.php";

$usuario = $_SESSION['user'];

$sql = "SELECT titulo FROM lembretes 
        WHERE usuario = ?
        AND data_hora <= NOW()";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

$alertas = [];

while ($row = $result->fetch_assoc()) {
    $alertas[] = $row['titulo'];
}

if (empty($alertas)) {
    echo "none";
} else {
    echo json_encode($alertas);
}
