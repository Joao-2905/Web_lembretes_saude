<?php
session_start();
include "db.php";

$id = $_POST["id"] ?? "";

$sql = "DELETE FROM lembretes WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

header("Location: index.php");
?>
