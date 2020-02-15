<?php 
session_start();
include_once("../assets/lib/dbconnect.php"); 
$idempresa=  utf8_encode($_SESSION['IdEmpresa']);
$sql = mysqli_query($conn,"delete from TbEmpresas where IdEmpresa = $idempresa");

session_destroy();
header("Location: loginEmpresa.php")
?>