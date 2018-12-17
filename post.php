<?php
include_once("header.html");
include_once("model/Noticia.php");
include_once("dao/NoticiaDAO.php");

$id         = $_GET['n'];
$noticiadao = new NoticiaDAO();
$noticia    = $noticiadao->buscaNoticia($id);
$caminho    = $noticia->__get('imagem');

?>

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
          </div>
        </div>
      </div>
    </article>

    <hr>

<?php
include_once("footer.html");
?>
