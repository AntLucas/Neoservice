<?php
session_start();
session_destroy();
header("Location: loginEmpresa.php");
include_once("../assets/lib/dbconnect.php"); 
?>