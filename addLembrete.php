<?php
session_start();
include "db.php";

if (!isset($_SESSION["user"])) {
    echo "Usuário não logado!";
    exit;
}

$titulo = $_POST["titulo"] ?? "";
$data   = $_POST["datahora"] ?? "";
$user   = $_SESSION["user"];

if ($titulo == "" || $data == "") {
    echo "Preencha todos os campos!";
    exit;
}

$sql = "INSERT INTO lembretes (usuario, titulo, data_hora) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $user, $titulo, $data);

if ($stmt->execute()) {
    header("Location: index.php");
} else {
    echo "Erro ao salvar lembrete!";
}
?>
