<?php
include_once("model/Noticia.php");
$id         = $_GET['n'];
$noticiadao = new NoticiaDAO();
$noticia    = $noticiadao->buscaNoticia($id);
$caminho    = $noticia->__get('imagem');

session_start();
if($_SESSION['logado'] == false){
  header('location:login.php');
}

if(isset($_POST['excluir-noticia']) ){
  $noticiadao = new NoticiaDAO();
  $noticiadao->excluirNoticia($id); 
  header('location:admin.php');
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
        <a class="navbar-brand" href="index.php">Projeto DESLICE</a>
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
    <header class="masthead" style="background-image: url('img/home.jpeg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1><?= $noticia->__get('titulo') ?></h1>
              <h2 class="subheading"><?= $noticia->__get('descricao') ?></h2>
              <span class="meta">Postado por
                <a href="index.php">Deslice</a>
                em <?= $noticia->__get('data') ?></span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <p><?= $noticia->__get('conteudo') ?></p>

            <a href="#">
              <img class="img-fluid" src="<?= $noticia->__get('imagem')?>" alt="<?= $noticia->__get('descricaoimg')?>">
              <br><br>
              <form method="POST">
                <div class="form-group">
                  <input type="hidden" name="n" value="". <?=$noticia->__get('id')?> ."">
                  <button type="submit" class="btn btn-primary" name="excluir-noticia" id="sendMessageButton">Excluir notícia</button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </article>

    <hr>
<?php
include_once("footer.html");
?>  