<?php
session_start();
?>
<?php include_once("../assets/lib/dbconnect.php"); ?>

<?php
$idcandidato =  utf8_encode($_SESSION['IdCandidato']);
$email = utf8_encode($_SESSION['Email']);
$senha = utf8_encode($_SESSION['Senha']);
$NmC = utf8_encode($_SESSION['NmCandidato']);
$nomeu = utf8_encode($_SESSION['NmUsuario']);
$senha	= utf8_encode($_SESSION['Senha']);

$sql = "select * from TbCandidatos  where Email = '$email' and Senha = '$senha';";
$sql2 = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<?php
						$imagem = mysqli_query($conn,"select foto from TbCandidatos where IdCandidato = $idcandidato");
						while($assoc = mysqli_fetch_assoc($imagem)){
							$img = utf8_encode($assoc['foto']);
						}
						?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
    <title>NeoService - Perfil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">
    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
    <link rel="stylesheet" href="../assets/css/custom-themes.css">
	<link rel="stylesheet" href="../assets/css/styleCandidato.css">
</head>

<body>
    <div class="page-wrapper chiller-theme sidebar-bg bg1 toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#">PERFIL</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="../assets/images/fotos/<?php echo"$img"?>" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name"><?php echo utf8_decode("$NmC")?>
                        </span>
                        <span class="user-role">Candidato</span>
                    </div>
                </div>
                <!-- sidebar-header  -->
                <div class="sidebar-search">
                    <div>
                    <form method="post" action="pesquisa.php">
                        <div class="input-group">

                            <input type="text" name="pesquisa" class="form-control search-menu" list="historico" placeholder="Pesquise..."/>

                            <div class="input-group-append">
                                <span class="input-group-text">
                                <button type="hidden" class="fa fa-search" aria-hidden="true" style="background:transparent;border:none;color:gray;"></button>
                                </span>
                            </div>
							<input type="hidden" name="env" value="pesquisar"/>

							<datalist id="historico">
							<?php
							$sqli = "select * from TbEmpresas;";
							$sqli2 = mysqli_query($conn, $sqli);
							while($row = mysqli_fetch_array($sqli2)){
							$Usuario = $row['NmUsuario'];
							echo utf8_decode("<option value='$Usuario'></option>");
							}
							?>
							</datalist>

							</form>


                        </div>
                    </div>
                </div>
                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>Painel Geral</span>
                        </li>
                        <li class="sidebar">
                            <a href="telaInicialCandidato.php">
                                <i class="fa fa-globe"></i>
                                <span>Início</span>
                            </a>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span>Perfil</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="perfilCandidato.php">Resumo

                                        </a>
                                    </li>
                                    <li>
                                        <a href="editarPerfilCandidato.php">Editar Perfil</a>
                                    </li>

									<li>
                                        <a href="CompetenciasCadastrarExcluir.php">Competências</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="sidebar-brand">
                    <a href="ajudaCandidato.php">AJUDA</a>

                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
                <div class="dropdown">

                    <a href="#" class="" id="dropdownMenuNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="badge badge-pill badge-warning notification"></span>
                    </a>
                    <div class="dropdown-menu notifications" aria-labelledby="dropdownMenuMessage">
                        <div class="notifications-header">
                            <i class="fa fa-bell"></i>
                            Notifications
                        </div>
                        <!-- <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <div class="notification-content">
                                <div class="icon">
                                    <i class="fas fa-check text-success border border-success"></i>
                                </div>
                                <div class="content">
                                    <div class="notification-detail">Lorem ipsum dolor sit amet consectetur adipisicing elit. In totam explicabo</div>
                                    <div class="notification-time">
                                        6 minutes ago
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a class="dropdown-item" href="#">
                            <div class="notification-content">
                                <div class="icon">
                                    <i class="fas fa-exclamation text-info border border-info"></i>
                                </div>
                                <div class="content">
                                    <div class="notification-detail">Lorem ipsum dolor sit amet consectetur adipisicing elit. In totam explicabo</div>
                                    <div class="notification-time">
                                        Today
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a class="dropdown-item" href="#">
                            <div class="notification-content">
                                <div class="icon">
                                    <i class="fas fa-exclamation-triangle text-warning border border-warning"></i>
                                </div>
                                <div class="content">
                                    <div class="notification-detail">Lorem ipsum dolor sit amet consectetur adipisicing elit. In totam explicabo</div>
                                    <div class="notification-time">
                                        Yesterday
                                    </div>
                                </div>
                            </div>
                        </a>
						-->
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-center" href="#">View all notifications</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" class="" id="dropdownMenuMessage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <a href="chatCandidato.php"><i class="fa fa-envelope"></i></a>
                </div>
                <div class="dropdown">
                    <a href="#" class="" id="dropdownMenuMessage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cog"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuMessage">
                        <a class="dropdown-item" href="excluirCandidato.php"><strong>EXCLUIR CONTA</strong></a>
                    </div>
                </div>
                <div>
                    <a href="logoutCandidato.php">
                        <i class="fa fa-power-off"></i>
                    </a>
                </div>
            </div>


        </nav>
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="container emp-profile">
            <form method="post">
                <div class="row">


                        <div class="profile-head">
                                    <h4>

                                      <?php echo "Informações"?>
                                    </h4>

                                    <h5>

                                      <?php echo "Acesse o resumo do seu perfil, e dê uma olhada em como seu perfil é visto por outros usuário. Edite suas informações em editar perfil, na hora de trocar de foto, use um formato válido de imagem"?>
                                    </h5>
                                    <h5>

                                      <?php echo "Cadastre por competências para que empresas possam pesquisar por elas"?>
                                    </h5>
                                    <h5>

                                      <?php echo "Utilize a barra de pesquisa para pesquisar empresas cadastradas pelo nome delas, em caso de teste tente pesquisar por \"Neoservice\""?>
                                    </h5>
                                    <h5>

                                      <?php echo "Ao pesquisar por uma empresa, vizualise o perfil, e caso queira mande uma solicitação de contato, caso a empresa aceite a sua solitação, você poderá mandar mensagens para ela, utilizando o nosso chat que está ao lado esquerdo da engrenagem no canto inferior esquerdo da tela, no menu."?>
                                    </h5>


                    </div>

                </div>
            </div>
        </main>
        <!-- page-content" -->
    </div>
    <!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../assets/js/custom.js"></script>
</body>

</html>
