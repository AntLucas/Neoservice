<?php
session_start();
include_once("../assets/lib/dbconnect.php");
if ($_SESSION['Contador'] == 2) {

    header('Location: perfilDeEmpresa.php');

    $_SESSION['Contador'] = 0;
}
$_SESSION['Contador'] += 1;
$idcandidato =  utf8_encode($_SESSION['IdCandidato']);
$email = utf8_encode($_SESSION['Email']);
$senha = utf8_encode($_SESSION['Senha']);
$NmC = utf8_encode($_SESSION['NmCandidato']);
$nomeu = utf8_encode($_SESSION['NmUsuario']);
$senha    = utf8_encode($_SESSION['Senha']);
$cep    = utf8_encode($_SESSION['cep']);
$estado    = utf8_encode($_SESSION['estado']);
$cidade    = utf8_encode($_SESSION['cidade']);
$bairro    = utf8_encode($_SESSION['bairro']);
$rua    = utf8_encode($_SESSION['rua']);
$bio    = utf8_encode($_SESSION['biografia']);
$xp    = utf8_encode($_SESSION['xp']);
$ingles    = utf8_encode($_SESSION['ingles']);
$formacao    = utf8_encode($_SESSION['formacao']);
$profissao    = utf8_encode($_SESSION['profissao']);

$idempresa = $_SESSION['idbusca'];

$sql1 = "select * from TbEmpresas where IdEmpresa = '$idempresa'";
$sql2 = mysqli_query($conn, $sql1);
while ($rowss = mysqli_fetch_array($sql2)) {
    $nome = utf8_encode($rowss['NmEmpresa']);
    $cnpj = utf8_encode($rowss['CNPJ']);
    $razao = utf8_encode($rowss['Razao']);
    $email2 = utf8_encode($rowss['Email']);
    $cep = utf8_encode($rowss['CEP']);
    $estado = utf8_encode($rowss['Estado']);
    $cidade = utf8_encode($rowss['Cidade']);
    $bairro = utf8_encode($rowss['Bairro']);
    $endereco = utf8_encode($rowss['Endereco']);
    $numero = utf8_encode($rowss['Numero']);
    $biografia = utf8_encode($rowss['biografia']);
    $img2 = utf8_encode($rowss['foto']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<?php
$imagem = mysqli_query($conn, "select foto from TbCandidatos where IdCandidato = $idcandidato");
while ($assoc = mysqli_fetch_assoc($imagem)) {
    $img = utf8_encode($assoc['foto']);
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
    <title>NeoService - Perfil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
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
                        <img class="img-responsive img-rounded" src="../assets/images/fotos/<?php echo "$img" ?>" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name"><?php echo utf8_decode("$NmC") ?>
                        </span>
                        <span class="user-role">Candidato</span>
                    </div>
                </div>
                <!-- sidebar-header  -->
                <div class="sidebar-search">
                    <div>
                        <form method="post" action="pesquisa.php">
                            <div class="input-group">

                                <input type="text" name="pesquisa" class="form-control search-menu" list="historico" placeholder="Pesquise..." />

                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <button type="hidden" class="fa fa-search" aria-hidden="true" style="background:transparent;border:none;color:gray;"></button>
                                    </span>
                                </div>
                                <input type="hidden" name="env" value="pesquisar" />

                                <datalist id="historico">
                                    <?php
                                    $sqli = "select * from TbEmpresas;";
                                    $sqli2 = mysqli_query($conn, $sqli);
                                    while ($row = mysqli_fetch_array($sqli2)) {
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
                            <div class="col-md-4">
                                <div class="profile-img">
                                    <img class="img-responsive img-rounded" src="../assets/images/fotos/<?php echo "$img2" ?>" alt="User picture">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="profile-head">
                                    <h5>

                                        <?php echo utf8_decode("$nome") ?>
                                    </h5>

                                    <p class="proile-rating">ESTRELAS : <span>0/5</span></p>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Sobre</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Endereço</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <?php
                                $query = mysqli_query($conn, "select * from TbSolicitacao where fk_IdEmpresa = '$idempresa' and fk_IdCandidato='$idcandidato'");
                                $rown = mysqli_num_rows($query);
                                if ($rown > 0) {
                                ?>
                                    <h6>Você já solicitou contato com essa empresa</h6>
                                <?php
                                } else {
                                ?>
                                    <form method="post">
                                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Solicitar" />
                                        <input type="hidden" name="env2" value="clicou" />
                                    </form>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-work">
                                    <p>VAGAS</p>
                                    <div class="col-md-6">
                                        <?php
                                        $if = "select * from TbVagas where fk_IdEmpresa = '$idempresa';";
                                        $if2 = mysqli_query($conn, $if);

                                        while ($ifrow = mysqli_fetch_array($if2)) {
                                            $vag = utf8_encode($ifrow['vaga']);
                                            $sal = utf8_encode($ifrow['salario']);
                                            echo utf8_decode("$vag, R$ $sal<br/>");
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content profile-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nome da Empresa</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo utf8_decode("$nome "); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label> E-mail </label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo utf8_decode("$email2"); ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>CNPJ</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo utf8_decode("$cnpj"); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Razão Social</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo utf8_decode("$razao"); ?></p>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>CEP</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo utf8_decode("$cep"); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Cidade</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo utf8_decode("$cidade"); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Estado</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo utf8_decode("$estado"); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Bairro</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo utf8_decode("$bairro"); ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Rua</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo utf8_decode("$endereco"); ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Biografia</label><br />
                                                <p><?php echo utf8_decode("$biografia"); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- page-content" -->
    </div>
    <!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../assets/js/custom.js"></script>
</body>

</html>


<?php


if (isset($_POST['env2']) && $_POST['env2'] == "clicou") {



    $sqlil = "select * from TbSolicitacao where fk_IdCandidato = '$idcandidato' and fk_IdEmpresa='$idempresa'";
    $sqlil2 = mysqli_query($conn, $sqlil);
    $echo = mysqli_num_rows($sqlil2);

    if ($echo >= 1) {
    } else {
        if (mysqli_query($conn, "insert into TbSolicitacao(fk_IdEmpresa,fk_IdCandidato) values('$idempresa','$idcandidato')")) {
        } else {
        }
    }
} else {
}

?>