<?php
include_once "dao/UsuarioDAO.php";
session_start();

if(isset($_POST['realizar-login']) ){
  
  $login   = filter_input ( INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS );
  $senha   = filter_input ( INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS );  

  $usuario = new UsuarioDAO();

  if ($usuario->autentica($login, $senha)) {
    $_SESSION['logado'] = true;
    header('location:admin.php');
  }
}

?><!DOCTYPE html>
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

    <!-- Main Content -->
    <div class="container">
      <br><br>
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <h3>Realizar login</h3>
          <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
          <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
          <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
          <form name="sentMessage" id="contactForm" method="POST">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Login</label>
                <input type="text" class="form-control" placeholder="Login" name="login" required data-validation-required-message="Login">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Senha</label>
                <input type="password" class="form-control" placeholder="Senha" name="senha" required data-validation-required-message="Senha">
                <p class="help-block text-danger"></p>
              </div>
            </div>

            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton" name="realizar-login">Realizar login</button>
            </div>
          </form>
        </div>
      </div><br><hr>


    </div>

    <hr>
<?php
include_once("footer.html");
?>    