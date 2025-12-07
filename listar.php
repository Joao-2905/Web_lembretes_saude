<?php
include "db.php";

$user = $_SESSION["user"];

$sql = "SELECT * FROM lembretes WHERE usuario = ? ORDER BY data_hora ASC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $user);
$stmt->execute();

$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "
        <div class='reminder'>
            <b>{$row['titulo']}</b><br>
            " . date("d/m/Y H:i", strtotime($row['data_hora'])) . "<br><br>

            <form method='POST' action='excluir.php'>
                <input type='hidden' name='id' value='{$row['id']}'>
                <button class='btn-danger'>Excluir</button>
            </form>
        </div>
    ";
}
?>
