<?php
session_start();
if(isset($_SESSION['logado']) && $_SESSION['logado'] == true){
  unset ($_SESSION['logado']);
  header('location:login.php');
}
?>
