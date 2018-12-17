<?php
include_once("header.html");

if(isset($_POST['enviar-email']) ){
  $email     = filter_input ( INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS ); 
  $nome      = filter_input ( INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS );
  $mensagem  = filter_input ( INPUT_POST, 'mensagem', FILTER_SANITIZE_SPECIAL_CHARS );
  $assunto   = "Contato do projeto DESLICE";

  $to      = 'vandeloureiro@gmail.com';
  $headers = "De:". $email .", ".$nome;

  $conteudo  = "Contato pelo site \r\n";
  $conteudo. "Enviado por: ". $nome."\r\n";
  $conteudo. "Email: ".$email."\r\n";
  $conteudo. "mensagem: \r\n:".$mensagem."\r\n";

  mail($to, $assunto, $conteudo);

  $aviso = "Email enviado com sucesso!";

}

?>

    <!-- Page Header -->
    <header class="masthead" alt="Imagem de telefone" style="background-image: url('img/contact-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1>Contato</h1>
              <span class="subheading">Tem alguma dúvida? Entre em contato.</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <?php
            if (isset($aviso)) {
                echo "<h4 style='color:green;'>".$aviso."</h4>";
            }
          ?>
          <p>Deseja ter mais informações sobre o nosso projeto? Entre em contato que iremos tirar dúvidas o mais rápido possível!</p>
          <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
          <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
          <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
          <form name="sentMessage" id="contactForm" method="post">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" placeholder="Nome" name="nome" required data-validation-required-message="nome">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="Endereço de email" name="email" required data-validation-required-message="seuemail@email.com">
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
                <label for="mensagem">Mensagem</label>
                <textarea rows="5" class="form-control" placeholder="Mensagem" name="mensagem" required data-validation-required-message="sua mensagem aqui"></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" name="enviar-email" class="btn btn-primary" id="sendMessageButton">Enviar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <hr>

<?php
include_once("footer.html");
?>