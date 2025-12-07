<?php
session_start();
include "db.php";

$usuario = $_POST["usuario"] ?? "";
$senha   = $_POST["senha"] ?? "";

$sql = "SELECT * FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($senha, $user["senha"])) {
        $_SESSION["user"] = $user["usuario"];
        header("Location: index.php");
        exit;
    }
}

echo "Usuário ou senha inválidos!";
?>
