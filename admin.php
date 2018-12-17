<?php
include_once("model/Noticia.php");
$noticia  = new Noticia();
$not      = $noticia->buscaNoticiasRecentes();
session_start();

if($_SESSION['logado'] == false){
  header('location:login.php');
}

if(isset($_POST['cadastrar-noticia']) ){
  
  $titulo       = filter_input ( INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS );
  $descricao    = filter_input ( INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS ); 
  $conteudo     = filter_input ( INPUT_POST, 'conteudo', FILTER_SANITIZE_SPECIAL_CHARS ); 
  $descricaoimg = filter_input ( INPUT_POST, 'descricaoimg', FILTER_SANITIZE_SPECIAL_CHARS );   
  $data         = date("Y-m-d");

  $noticia = new Noticia();

  move_uploaded_file($_FILES['imagem']['tmp_name'], 'img-noticias/'.$_FILES['imagem']['name']);
  $imagem = 'img-noticias/'.$_FILES['imagem']['name'];

  $noticia->__set('titulo',       $titulo);
  $noticia->__set('descricao',    $titulo);
  $noticia->__set('conteudo',     $conteudo);
  $noticia->__set('descricaoimg', $descricaoimg);
  $noticia->__set('imagem',       $imagem);
  $noticia->__set('data',         $data);

  $dao = new NoticiaDAO();
  $dao->insere($noticia);

  $mensagemDeSucesso = "Noticia cadastrada com sucesso";
}

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DESLICE</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="admin.php">Projeto DESLICE</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="sair.php">Sair</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
        <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Área de administrador</h1>
              <span class="subheading">Desenvolvimento de aplicativos para ensino de línguas para deficientes visuais</span>
            </div>
          </div>
        </div>
      </div>
    </header>


    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <h3>Cadastrar uma nova notícia</h3>
          <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
          <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
          <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
          <form name="sentMessage" id="contactForm" method="POST" enctype="multipart/form-data">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Título da notícia</label>
                <input type="text" class="form-control" placeholder="Título da notícia" name="titulo" required data-validation-required-message="Titulo">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Breve descrição da notícia</label>
                <input type="text" class="form-control" placeholder="Breve descrição da notícia" name="descricao" required data-validation-required-message="Breve descrição da notícia">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <!--
            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Phone Number</label>
                <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                <p class="help-block text-danger"></p>
              </div>
            </div> -->
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Conteudo</label>
                <textarea rows="5" class="form-control" placeholder="Conteudo" name="conteudo" required data-validation-required-message="Conteúdo"></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Descrição da imagem que vai ser lida pelos leitores de tela</label>
                <input type="text" class="form-control" placeholder="Descrição da imagem" name="descricaoimg" required data-validation-required-message="Descrição da imagem">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Selecionar um arquivo</label>
                <input type="file" class="form-control" placeholder="Imagem" name="imagem" required data-validation-required-message="Imagem">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton" name="cadastrar-noticia">Cadastrar notícia</button>
            </div>
          </form>
        </div>
      </div><br><hr>

      <!-- linha das notícias -->
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <?php foreach($not as $noticiaAtual){?>
          <div class="post-preview">
            <a href="postadmin.php?n=<?=$noticiaAtual->__get('id')?>" >
              <h2 class="post-title">
                <?=$noticiaAtual->__get('titulo')?>
              </h2>
              <h3 class="post-subtitle">
                <?=$noticiaAtual->__get('descricao')?>
              </h3>
            </a>
            <p class="post-meta">Postado por
              <a href="index.php">Deslice</a>
              em <?=$noticiaAtual->__get('data')?></p>
          </div>
          <hr>
        <?php } ?>
        </div>
      </div>
    </div>

    <hr>
<?php
include_once("footer.html");
?>    