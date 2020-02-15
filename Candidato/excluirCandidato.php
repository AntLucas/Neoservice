<?php
session_start();
include_once("../assets/lib/dbconnect.php"); 
$idcandidato =  utf8_encode($_SESSION['IdCandidato']);

$sql = mysqli_query($conn,"delete from TbCandidatos where IdCandidato= $idcandidato");
session_destroy();
header("Location: loginCandidato.php")
?>




