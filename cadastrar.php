<?php
include "db.php";

$usuario = $_POST["usuario"] ?? "";
$senha   = $_POST["senha"] ?? "";

if ($usuario == "" || $senha == "") {
    echo "Preencha todos os campos!";
    exit;
}

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (usuario, senha) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $usuario, $senhaHash);

if ($stmt->execute()) {
    header("Location: index.php"); 
} else {
    echo "Erro ao cadastrar!";
}
?>
