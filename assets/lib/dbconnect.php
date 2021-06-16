<?php

$servername = "localhost";
$database = "database";
$username = "username";
$password = "senha";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

date_default_timezone_set('America/Sao_Paulo');
$globalData = date("d/m/Y");
$globalHora = date("H:i");
$showNome = false;

if(isset($_SESSION['Email']) && $_SESSION['Email'] !=null){
	$nomeAtual = $_SESSION['nome'];
	$usuarioAtual = $_SESSION['Email'];
	$showNome = true;
}
?>
