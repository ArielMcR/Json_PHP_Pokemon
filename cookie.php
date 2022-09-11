<?php
setcookie("usuario", "carlos");
session_start();
$_SESSION['nome']= "junior";
$nome2 = $_SESSION['nome'];
echo "nome do usuário é"." ".$_COOKIE['usuario']." ".$nome2;


?>