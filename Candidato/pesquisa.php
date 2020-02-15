<?php
session_start();
 include_once("../assets/lib/dbconnect.php"); 

							if(isset($_POST['env']) && $_POST['env'] == "pesquisar"){
							$_SESSION['pesquisa'] = $_POST['pesquisa'];
								header('Location: buscaEmpresa.php');
									}
									else{
										header('Location: perfilCandidato.php');
											}

							?>