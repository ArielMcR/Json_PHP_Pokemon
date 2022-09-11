<?php
require("conn.php");
session_start();
$nome = $_SESSION['nome'];
$senha = $_SESSION['senha'];
$sql = "SELECT * FROM usuarios WHERE nome='$nome' AND senha='$senha'";
$result = $conn->query($sql);
if($result->num_rows != 1){
    header("Location: erro.php");
    exit(0);
}
?>