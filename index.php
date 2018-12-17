<?php
include_once("header.html");
include_once("model/Noticia.php");
$noticia  = new Noticia();
$not      = $noticia->buscaNoticiasRecentes();
?>

    <!-- Page Header -->
    <header class="masthead" alt="Leitura de texto em braile" style="background-image: url('img/home.jpeg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Projeto Deslice</h1>
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
          <?php foreach($not as $noticiaAtual){?>
          <div class="post-preview">
            <a href="post.php?n=<?=$noticiaAtual->__get('id')?>" >
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
        <!--
          <div class="post-preview">
            <a href="post.php">
              <h2 class="post-title">
                I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.
              </h2>
            </a>
            <p class="post-meta">Posted by
              <a href="index.php">Deslice</a>
              on September 18, 2018</p>
          </div>
          <hr>
          <div class="post-preview">
            <a href="post.php">
              <h2 class="post-title">
                Science has not yet mastered prophecy
              </h2>
              <h3 class="post-subtitle">
                We predict too much for the next year and yet far too little for the next ten.
              </h3>
            </a>
            <p class="post-meta">Posted by
              <a href="index.php">Deslice</a>
              on August 24, 2018</p>
          </div>
          <hr>
          <div class="post-preview">
            <a href="post.php">
              <h2 class="post-title">
                Failure is not an option
              </h2>
              <h3 class="post-subtitle">
                Many say exploration is part of our destiny, but it’s actually our duty to future generations.
              </h3>
            </a>
            <p class="post-meta">Posted by
              <a href="index.php">Deslice</a>
              on July 8, 2018</p>
          </div>
          <hr> -->
          <!-- Pager -->
          <!--
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Publicações antigas &rarr;</a>
          </div> -->
        </div>
      </div>
    </div>

    <hr>

<?php
include_once("footer.html");
?>
