<?php
session_start();

include_once("../assets/lib/dbconnect.php");
error_reporting(0);
//ini_set(“display_errors”, 0);


$id = $_SESSION['IdEmpresa'];


if ($_SESSION['Contador'] == 2) {

  header('Location: chatEmpresa.php');

  $_SESSION['Contador'] = 0;
}
$_SESSION['Contador'] += 1;
$idempresa =  utf8_decode($_SESSION['IdEmpresa']);


?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
<link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
<title>NeoService</title>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


<html class=''>
<?php
$imagem = mysqli_query($conn, "select foto from TbEmpresas where IdEmpresa = $idempresa");
while ($assoc = mysqli_fetch_assoc($imagem)) {
  $img = utf8_decode($assoc['foto']);
}
?>

<head>
  <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700,300' rel='stylesheet' type='text/css'>

  <script src="https://use.typekit.net/hoy3lrg.js"></script>

  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.2/css/font-awesome.min.css'>
  <style class="cp-pen-styles">
    body {
      display: flex;



      font-family: "proxima-nova", "Source Sans Pro", sans-serif;
      font-size: 1em;

      color: #032731;
      text-rendering: optimizeLegibility;
      text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.004);
      -webkit-font-smoothing: antialiased;
    }

    #frame {
      width: 100%;
      min-width: 360px;
      max-width: 4000px;
      height: 100vh;
      min-height: 300px;
      max-height: 3500px;
      background: #E6EAEA;
    }

    @media screen and (max-width: 360px) {
      #frame {
        width: 100%;
        height: 100vh;
      }
    }

    #frame #sidepanel {
      float: left;
      min-width: 280px;
      max-width: 340px;
      width: 40%;
      height: 100%;
      background: #032731;
      color: #f5f5f5;
      overflow: hidden;
      position: relative;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel {
        width: 58px;
        min-width: 58px;
      }
    }

    #frame #sidepanel #profile {
      width: 80%;
      margin: 25px auto;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile {
        width: 100%;
        margin: 0 auto;
        padding: 5px 0 0 0;
        background: #084759;
      }
    }

    #frame #sidepanel #profile.expanded .wrap {
      height: 210px;
      line-height: initial;
    }

    #frame #sidepanel #profile.expanded .wrap p {
      margin-top: 20px;
    }

    #frame #sidepanel #profile.expanded .wrap i.expand-button {
      -moz-transform: scaleY(-1);
      -o-transform: scaleY(-1);
      -webkit-transform: scaleY(-1);
      transform: scaleY(-1);
      filter: FlipH;
      -ms-filter: "FlipH";
    }

    #frame #sidepanel #profile .wrap {
      height: 60px;
      line-height: 60px;
      overflow: hidden;
      -moz-transition: 0.3s height ease;
      -o-transition: 0.3s height ease;
      -webkit-transition: 0.3s height ease;
      transition: 0.3s height ease;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap {
        height: 55px;
      }
    }

    #frame #sidepanel #profile .wrap img {
      width: 50px;
      border-radius: 50%;
      padding: 3px;
      border: 2px solid #084759;
      height: auto;
      float: left;
      cursor: pointer;
      -moz-transition: 0.3s border ease;
      -o-transition: 0.3s border ease;
      -webkit-transition: 0.3s border ease;
      transition: 0.3s border ease;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap img {
        width: 40px;
        margin-left: 4px;
      }
    }

    #frame #sidepanel #profile .wrap img.online {
      border: 2px solid #2ecc71;
    }

    #frame #sidepanel #profile .wrap img.away {
      border: 2px solid #f1c40f;
    }

    #frame #sidepanel #profile .wrap img.busy {
      border: 2px solid #e74c3c;
    }

    #frame #sidepanel #profile .wrap img.offline {
      border: 2px solid #000;
    }

    #frame #sidepanel #profile .wrap p {
      float: left;
      margin-left: 15px;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap p {
        display: none;
      }
    }

    #frame #sidepanel #profile .wrap i.expand-button {
      float: right;
      margin-top: 23px;
      font-size: 0.8em;
      cursor: pointer;
      color: #435f7a;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap i.expand-button {
        display: none;
      }
    }

    #frame #sidepanel #profile .wrap #status-options {
      position: absolute;
      opacity: 0;
      visibility: hidden;
      width: 150px;
      margin: 70px 0 0 0;
      border-radius: 6px;
      z-index: 99;
      line-height: initial;
      background: #435f7a;
      -moz-transition: 0.3s all ease;
      -o-transition: 0.3s all ease;
      -webkit-transition: 0.3s all ease;
      transition: 0.3s all ease;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap #status-options {
        width: 58px;
        margin-top: 57px;
      }
    }

    #frame #sidepanel #profile .wrap #status-options.active {
      opacity: 1;
      visibility: visible;
      margin: 75px 0 0 0;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap #status-options.active {
        margin-top: 62px;
      }
    }

    #frame #sidepanel #profile .wrap #status-options:before {
      content: '';
      position: absolute;
      width: 0;
      height: 0;
      border-left: 6px solid transparent;
      border-right: 6px solid transparent;
      border-bottom: 8px solid #435f7a;
      margin: -8px 0 0 24px;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap #status-options:before {
        margin-left: 23px;
      }
    }

    #frame #sidepanel #profile .wrap #status-options ul {
      overflow: hidden;
      border-radius: 6px;
    }

    #frame #sidepanel #profile .wrap #status-options ul li {
      padding: 15px 0 30px 18px;
      display: block;
      cursor: pointer;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap #status-options ul li {
        padding: 15px 0 35px 22px;
      }
    }

    #frame #sidepanel #profile .wrap #status-options ul li:hover {
      background: #496886;
    }

    #frame #sidepanel #profile .wrap #status-options ul li span.status-circle {
      position: absolute;
      width: 10px;
      height: 10px;
      border-radius: 50%;
      margin: 5px 0 0 0;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap #status-options ul li span.status-circle {
        width: 14px;
        height: 14px;
      }
    }

    #frame #sidepanel #profile .wrap #status-options ul li span.status-circle:before {
      content: '';
      position: absolute;
      width: 14px;
      height: 14px;
      margin: -3px 0 0 -3px;
      background: transparent;
      border-radius: 50%;
      z-index: 0;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap #status-options ul li span.status-circle:before {
        height: 18px;
        width: 18px;
      }
    }

    #frame #sidepanel #profile .wrap #status-options ul li p {
      padding-left: 12px;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #profile .wrap #status-options ul li p {
        display: none;
      }
    }

    #frame #sidepanel #profile .wrap #status-options ul li#status-online span.status-circle {
      background: #2ecc71;
    }

    #frame #sidepanel #profile .wrap #status-options ul li#status-online.active span.status-circle:before {
      border: 1px solid #2ecc71;
    }

    #frame #sidepanel #profile .wrap #status-options ul li#status-away span.status-circle {
      background: #f1c40f;
    }

    #frame #sidepanel #profile .wrap #status-options ul li#status-away.active span.status-circle:before {
      border: 1px solid #f1c40f;
    }

    #frame #sidepanel #profile .wrap #status-options ul li#status-busy span.status-circle {
      background: #e74c3c;
    }

    #frame #sidepanel #profile .wrap #status-options ul li#status-busy.active span.status-circle:before {
      border: 1px solid #e74c3c;
    }

    #frame #sidepanel #profile .wrap #status-options ul li#status-offline span.status-circle {
      background: #95a5a6;
    }

    #frame #sidepanel #profile .wrap #status-options ul li#status-offline.active span.status-circle:before {
      border: 1px solid #95a5a6;
    }

    #frame #sidepanel #profile .wrap #expanded {
      padding: 100px 0 0 0;
      display: block;
      line-height: initial !important;
    }

    #frame #sidepanel #profile .wrap #expanded label {
      float: left;
      clear: both;
      margin: 0 8px 5px 0;
      padding: 5px 0;
    }

    #frame #sidepanel #profile .wrap #expanded input {
      border: none;
      margin-bottom: 6px;
      background: #032731;
      border-radius: 3px;
      color: #f5f5f5;
      padding: 7px;
      width: calc(100% - 43px);
    }

    #frame #sidepanel #profile .wrap #expanded input:focus {
      outline: none;
      background: #435f7a;
    }

    #frame #sidepanel #search {
      border-top: 1px solid #032731;
      border-bottom: 1px solid #032731;
      font-weight: 300;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #search {
        display: none;
      }
    }

    #frame #sidepanel #search label {
      position: absolute;
      margin: 10px 0 0 20px;
    }

    #frame #sidepanel #search input {
      font-family: "proxima-nova", "Source Sans Pro", sans-serif;
      padding: 10px 0 10px 46px;
      width: calc(100% - 25px);
      border: none;
      background: #032731;
      color: #f5f5f5;
    }

    #frame #sidepanel #search input:focus {
      outline: none;
      background: #084759;
    }

    #frame #sidepanel #search input::-webkit-input-placeholder {
      color: #f5f5f5;
    }

    #frame #sidepanel #search input::-moz-placeholder {
      color: #f5f5f5;
    }

    #frame #sidepanel #search input:-ms-input-placeholder {
      color: #f5f5f5;
    }

    #frame #sidepanel #search input:-moz-placeholder {
      color: #f5f5f5;
    }

    #frame #sidepanel #contacts {
      height: calc(100% - 177px);
      overflow-y: scroll;
      overflow-x: hidden;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #contacts {
        height: calc(100% - 149px);
        overflow-y: scroll;
        overflow-x: hidden;
      }

      #frame #sidepanel #contacts::-webkit-scrollbar {
        display: none;
      }
    }

    #frame #sidepanel #contacts.expanded {
      height: calc(100% - 334px);
    }

    #frame #sidepanel #contacts::-webkit-scrollbar {
      width: 8px;
      background: #084759;
    }

    #frame #sidepanel #contacts::-webkit-scrollbar-thumb {
      background-color: #084759;
    }

    #frame #sidepanel #contacts ul li.contact {
      position: relative;
      padding: 10px 0 15px 0;
      font-size: 0.9em;
      cursor: pointer;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #contacts ul li.contact {
        padding: 6px 0 46px 8px;
      }
    }

    #frame #sidepanel #contacts ul li.contact:hover {
      background: #084759;
    }

    #frame #sidepanel #contacts ul li.contact.active {
      background: #084759;
      border-right: 5px solid #435f7a;
    }

    #frame #sidepanel #contacts ul li.contact.active span.contact-status {
      border: 2px solid #084759 !important;
    }

    #frame #sidepanel #contacts ul li.contact .wrap {
      width: 88%;
      margin: 0 auto;
      position: relative;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #contacts ul li.contact .wrap {
        width: 100%;
      }
    }

    #frame #sidepanel #contacts ul li.contact .wrap span {
      position: absolute;
      left: 0;
      margin: -2px 0 0 -2px;
      width: 10px;
      height: 10px;
      border-radius: 50%;
      border: 2px solid #084759;
      background: #084759;
    }

    #frame #sidepanel #contacts ul li.contact .wrap span.online {
      background: #2ecc71;
    }

    #frame #sidepanel #contacts ul li.contact .wrap span.away {
      background: #f1c40f;
    }

    #frame #sidepanel #contacts ul li.contact .wrap span.busy {
      background: #e74c3c;
    }

    #frame #sidepanel #contacts ul li.contact .wrap img {
      width: 40px;
      border-radius: 50%;
      float: left;
      margin-right: 10px;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #contacts ul li.contact .wrap img {
        margin-right: 0px;
      }
    }

    #frame #sidepanel #contacts ul li.contact .wrap .meta {
      padding: 5px 0 0 0;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #contacts ul li.contact .wrap .meta {
        display: none;
      }
    }

    #frame #sidepanel #contacts ul li.contact .wrap .meta .name {
      font-weight: 600;
    }

    #frame #sidepanel #contacts ul li.contact .wrap .meta .preview {
      margin: 5px 0 0 0;
      padding: 0 0 1px;
      font-weight: 400;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      -moz-transition: 1s all ease;
      -o-transition: 1s all ease;
      -webkit-transition: 1s all ease;
      transition: 1s all ease;
    }

    #frame #sidepanel #contacts ul li.contact .wrap .meta .preview span {
      position: initial;
      border-radius: initial;
      background: none;
      border: none;
      padding: 0 2px 0 0;
      margin: 0 0 0 1px;
      opacity: .5;
    }

    #frame #sidepanel #bottom-bar {
      position: absolute;
      width: 100%;
      bottom: 0;
    }

    #frame #sidepanel #bottom-bar button {
      float: left;
      border: none;
      width: 50%;
      padding: 10px 0;
      background: #032731;
      color: #f5f5f5;
      cursor: pointer;
      font-size: 0.85em;
      font-family: "proxima-nova", "Source Sans Pro", sans-serif;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #bottom-bar button {
        float: none;
        width: 100%;
        padding: 15px 0;
      }
    }

    #frame #sidepanel #bottom-bar button:focus {
      outline: none;
    }

    #frame #sidepanel #bottom-bar button:nth-child(1) {
      border-right: 1px solid #084759;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #bottom-bar button:nth-child(1) {
        border-right: none;
        border-bottom: 1px solid #084759;
      }
    }

    #frame #sidepanel #bottom-bar button:hover {
      background: #084759;
    }

    #frame #sidepanel #bottom-bar button i {
      margin-right: 3px;
      font-size: 1em;
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #bottom-bar button i {
        font-size: 1.3em;
      }
    }

    @media screen and (max-width: 735px) {
      #frame #sidepanel #bottom-bar button span {
        display: none;
      }
    }

    #frame .content {
      float: right;
      width: 60%;
      height: 100%;
      overflow: hidden;
      position: relative;
    }

    @media screen and (max-width: 735px) {
      #frame .content {
        width: calc(100% - 58px);
        min-width: 300px !important;
      }
    }

    @media screen and (min-width: 900px) {
      #frame .content {
        width: calc(100% - 340px);
      }
    }

    #frame .content .contact-profile {
      width: 100%;
      height: 60px;
      line-height: 60px;
      background: #f5f5f5;
    }

    #frame .content .contact-profile img {
      width: 40px;
      border-radius: 50%;
      float: left;
      margin: 9px 12px 0 9px;
    }

    #frame .content .contact-profile p {
      float: left;
    }

    #frame .content .contact-profile .social-media {
      float: right;
    }

    #frame .content .contact-profile .social-media i {
      margin-left: 14px;
      cursor: pointer;
    }

    #frame .content .contact-profile .social-media i:nth-last-child(1) {
      margin-right: 20px;
    }

    #frame .content .contact-profile .social-media i:hover {
      color: #435f7a;
    }

    #frame .content .messages {
      height: auto;
      min-height: calc(100% - 93px);
      max-height: calc(100% - 93px);
      overflow-y: scroll;
      overflow-x: hidden;
    }

    @media screen and (max-width: 735px) {
      #frame .content .messages {
        max-height: calc(100% - 105px);
      }
    }

    #frame .content .messages::-webkit-scrollbar {
      width: 8px;
      background: transparent;
    }

    #frame .content .messages::-webkit-scrollbar-thumb {
      background-color: rgba(0, 0, 0, 0.3);
    }

    #frame .content .messages ul li {
      display: inline-block;
      clear: both;
      float: left;
      margin: 15px 15px 5px 15px;
      width: calc(100% - 25px);
      font-size: 0.9em;
    }

    #frame .content .messages ul li:nth-last-child(1) {
      margin-bottom: 20px;
    }

    #frame .content .messages ul li.sent img {
      margin: 6px 8px 0 0;
    }

    #frame .content .messages ul li.sent p {
      background: #032731;
      color: #f5f5f5;
    }

    #frame .content .messages ul li.replies img {
      float: right;
      margin: 6px 0 0 8px;
    }

    #frame .content .messages ul li.replies p {
      background: #f5f5f5;
      float: right;
    }

    #frame .content .messages ul li img {
      width: 22px;
      border-radius: 50%;
      float: left;
    }

    #frame .content .messages ul li p {
      display: inline-block;
      padding: 10px 15px;
      border-radius: 20px;
      max-width: 205px;
      line-height: 130%;
    }

    @media screen and (min-width: 735px) {
      #frame .content .messages ul li p {
        max-width: 300px;
      }
    }

    #frame .content .message-input {
      position: absolute;
      bottom: 0;
      width: 100%;
      z-index: 99;
    }

    #frame .content .message-input .wrap {
      position: relative;
    }

    #frame .content .message-input .wrap input {
      font-family: "proxima-nova", "Source Sans Pro", sans-serif;
      float: left;
      border: none;
      width: calc(100% - 90px);
      padding: 11px 32px 10px 8px;
      font-size: 0.8em;
      color: #032731;
    }

    @media screen and (max-width: 735px) {
      #frame .content .message-input .wrap input {
        padding: 15px 32px 16px 8px;
      }
    }

    #frame .content .message-input .wrap input:focus {
      outline: none;
    }

    #frame .content .message-input .wrap .attachment {
      position: absolute;
      right: 60px;
      z-index: 4;
      margin-top: 10px;
      font-size: 1.1em;
      color: #435f7a;
      opacity: .5;
      cursor: pointer;
    }

    @media screen and (max-width: 735px) {
      #frame .content .message-input .wrap .attachment {
        margin-top: 17px;
        right: 65px;
      }
    }

    #frame .content .message-input .wrap .attachment:hover {
      opacity: 1;
    }

    #frame .content .message-input .wrap button {
      float: right;
      border: none;
      width: 50px;
      padding: 12px 0;
      cursor: pointer;
      background: #032731;
      color: #f5f5f5;
    }

    @media screen and (max-width: 735px) {
      #frame .content .message-input .wrap button {
        padding: 16px 0;
      }
    }

    #frame .content .message-input .wrap button:hover {
      background: #084759;
    }

    #frame .content .message-input .wrap button:focus {
      outline: none;
    }

    .btn-success {
      align: right;
      background-color: #01161c;

      border: none;
      color: #ffffff;



    }

    .btn-success:hover {
      background-color: #032731;

      border: none;
      color: #fff !important;
    }

    .btn-success:active {
      background-color: #000 !important;
      color: #fff !important;
      border: none !important;
    }

    #mensagem {
      visible: false;
    }



    .mudar {
      background-color: #084759 !important;
    }

    .mudar:hover {
      background-color: #032731 !important;
      border: 0.1px solid #084759 !important;
    }
  </style>
</head>

<body>


  <div id="frame">
    <div id="sidepanel">
      <div id="profile">
        <div class="wrap">
          <img class="img-responsive img-rounded" src="../assets/images/fotos/<?php echo "$img" ?>" alt="User picture">
          <p><?php
              echo "" . $_SESSION['NmEmpresa'];
              ?></p>
          <i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
          <div id="status-options">
            <ul>
              <li id="status-online" class="active"><span class="status-circle"></span>
                <p>Online</p>
              </li>
              <li id="status-away"><span class="status-circle"></span>
                <p>Away</p>
              </li>
              <li id="status-busy"><span class="status-circle"></span>
                <p>Busy</p>
              </li>
              <li id="status-offline"><span class="status-circle"></span>
                <p>Offline</p>
              </li>
            </ul>
          </div>
          <div id="expanded">
            <label for="twitter"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></label>
            <input name="twitter" type="text" value="mikeross" />
            <label for="twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></label>
            <input name="twitter" type="text" value="ross81" />
            <label for="twitter"><i class="fa fa-instagram fa-fw" aria-hidden="true"></i></label>
            <input name="twitter" type="text" value="mike.ross" />
          </div>
        </div>
      </div>
      <div id="search">
        <label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
        <input type="text" placeholder="Procure seus contatos..." />
      </div>
      <div id="contacts">
        <ul>
          <?php
          $seleciona = mysqli_query($conn, "select a.IdEmpresa,
				a.NmEmpresa,
				b.IdCandidato,
				b.NmCandidato,
				c.IdContato,
				b.foto


				from TbEmpresas a
				inner join TbContatos c
				on a.IdEmpresa = c.fk_IdEmpresa
				inner join TbCandidatos b
				on b.IdCandidato = c.fk_IdCandidato where a.IdEmpresa = $id;");



          $conta = mysqli_num_rows($seleciona);

          if ($conta <= 0) {
            echo "Nenhuma conversa encontrada!";
          } else {
            while ($row = mysqli_fetch_array($seleciona)) {


              $nome = utf8_decode($row['NmCandidato']);
              $idc = $row['IdCandidato'];
              $idcont = $row['IdContato'];
              $img2 = utf8_decode($row['foto']);


          ?>
              <form method="post" action="chatEmpresa.php">
                <?php
                if (isset($_SESSION['IdContato']) && $_SESSION['idcontato'] == $idcont) {
                ?><li class="contact active"> <?php
                                            } else {
                                              ?>
                  <li class="contact">
                  <?php
                                            }
                  ?>
                  <div class="wrap">
                    <span class="contact-status away"></span>
                    <img class="img-responsive img-rounded" src="../assets/images/fotos/<?php echo "$img2" ?>" alt="User picture">
                    <?php
                    echo "<input type='hidden' name='idcan' value='$idc'/> <input type='hidden' name='idcont' value='$idcont'/>";

                    ?>

                    <div class="meta">
                      <p class="name"><?php echo "<input type='hidden' name='clicarcontato' value='clicou'><input type='hidden' name='nomecan' value='$nome'/>$nome";  ?></p>
                      <p class="preview"><?php

                                          $ultimo = mysqli_query($conn, "select max(IdMensagem) from TbMensagens where fk_IdContato = $idcont;");
                                          while ($rowss = mysqli_fetch_array($ultimo)) {

                                            $mensagemultimo = utf8_decode($rowss['max(IdMensagem)']);

                                            $ultimo = mysqli_query($conn, "select * from TbMensagens where IdMensagem = $mensagemultimo");
                                            while ($rowsss = mysqli_fetch_array($ultimo)) {

                                              $mensagemultima = utf8_encode($rowsss['Mensagem']);
                                              $falando = utf8_decode($rowsss['fk_IdCandidato']);


                                              if ($falando <= 0) {
                                                echo "Você:";
                                                echo utf8_decode("$mensagemultima ");
                                              } else {
                                                echo utf8_decode("$nome: $mensagemultima");
                                              }
                                            }
                                          }

                                          ?><br><?php echo "<input type='submit' value='&rang;&rang;' class='btn btn-success  btn-sm'/>"; ?></p>
                    </div>
                  </div>
                  </li>
              </form>
          <?php
            }
          }
          ?>
          <?php
          if (isset($_POST['clicarcontato']) && $_POST['clicarcontato'] == "clicou") {
            $_SESSION['idcan'] = $_POST['idcan'];

            $_SESSION['nomecan'] = utf8_decode($_POST['nomecan']);
            $_SESSION['idcontato'] = $_POST['idcont'];
          } else {
          }
          $i = $_SESSION['idcan'];
          $sqli = mysqli_query($conn, "select foto from TbCandidatos where IdCandidato = $i");
          while ($ja = mysqli_fetch_assoc($sqli)) {
            $imgs = utf8_decode($ja['foto']);
          }
          $_SESSION['foto'] = $imgs;

          $img3 = $_SESSION['foto'];

          ?>



        </ul>
      </div>
      <div id="bottom-bar">
        <a href="perfilEmpresa.php"> <button class="mudar"><i class="fa fa-user" aria-hidden="true"></i> Perfil </button></a>
        <a href="logoutEmpresa.php"><button class="mudar " id="settings"><i class="fa fa-power-off" aria-hidden="true"></i> <span>Sair</span></button></a>
      </div>
    </div>


    <form method="post" enctype="multipart/form-data">
      <div class="content">
        <div class="contact-profile">
          <?php
          if ($_SESSION['nomecan']) {
          ?>
            <img class="img-responsive img-rounded" src="../assets/images/fotos/<?php echo "$img3" ?>" alt="User picture">
            <p><?php echo "" . $_SESSION['nomecan']; ?></p>
            <div class="social-media">
              <i class="fa fa-facebook" aria-hidden="true"></i>
              <i class="fa fa-twitter" aria-hidden="true"></i>
              <i class="fa fa-instagram" aria-hidden="true"></i>
            </div>
          <?php
          }
          ?>
        </div>
        <?php
        if (isset($_POST['env']) && $_POST['env'] == "envMsg") {
          $mensagem = utf8_decode($_POST['mensagens']);
          $idpara = $_SESSION['idcan'];
          $idde = $id;
          $fkcontato = $_SESSION['idcontato'];

          if (empty($mensagem)) {
            echo "<code>Não é possível enviar uma mensagem vazia!</code>";
          } else {
            if (mysqli_query($conn, "insert into TbMensagens(fk_IdContato,fk_IdEmpresa,fk_IdCandidato,Mensagem)
			values('$fkcontato',$idde,null,'$mensagem');")) {
            } else {
              echo "<code>Erro ao enviar a mensagem! Escolha uma conversa.</code>";
            }
          }
        } else {
        }
        ?>
        <div id="lista" class="messages">
          <ul>


            <?php
            $contatoconversa = $_SESSION['idcontato'];

            $nc = @mysqli_query($conn, "select a.NmEmpresa,
		b.NmCandidato,
		c.fk_IdEmpresa,
		c.fk_IdCandidato,
		c.Mensagem,
		d.IdContato

		from TbEmpresas a inner join
		TbContatos d
		on a.IdEmpresa = d.fk_IdEmpresa
		inner join TbCandidatos b
		on b.IdCandidato = d.fk_IdCandidato
		inner join TbMensagens c
		on c.fk_IdContato = d.IdContato
		where d.IdContato = $contatoconversa;");



            while ($lc = @mysqli_fetch_array($nc)) {
              $ide = $lc['fk_IdEmpresa'];
              $idc = $lc['fk_IdCandidato'];
              $a = utf8_decode($lc['NmEmpresa']);
              $b = utf8_decode($lc['NmCandidato']);
              $mensagens = utf8_encode($lc['Mensagem']);



              if ($ide == null) {
                echo utf8_decode("
					<li class='sent'>
					<img class='img-responsive img-rounded' src='../assets/images/fotos/$img3' alt='User picture'>
					<p>$mensagens</p>

				</li>
				");
              }

              if ($ide != 0) {
                echo utf8_decode("

				<li class='replies'>
					<img class='img-responsive img-rounded' src='../assets/images/fotos/$img' alt='User picture'>
					<p>$mensagens</p>
				</li>
				");
              }
            }
            ?>

          </ul>
        </div>
        <div class="message-input">
          <div class="wrap">
            <input type="hidden" readonly="true" id="mensagem" name="mensagem" placeholder="Escreva sua mensagem..." />
            <input type="text" name="mensagens" placeholder="Escreva sua mensagem..." />
            <i class="fa fa-paperclip attachment" aria-hidden="true"></i>
            <button class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            <input type="hidden" name="env" value="envMsg" />
          </div>
        </div>
      </div>
    </form>
  </div>


</body>

</html>