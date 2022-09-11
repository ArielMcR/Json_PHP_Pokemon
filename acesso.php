<?php
require_once("conn.php");
@$nome = trim($_POST['nome']);
@$senha = trim($_POST['senha']);

$sql = "SELECT * FROM usuarios WHERE nome='$nome' AND senha='$senha'";
$result = $conn->query($sql);
if($result->num_rows == 1){
    session_start();
    $_SESSION['nome']=$nome;
    $_SESSION['senha']=$senha;
    header("Location: index.php");
    exit(0);
} else{
    header("Location: erro.php");
    exit(0);
}

?>