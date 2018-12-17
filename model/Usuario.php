<?php
include_once "dao/UsuarioDAO.php";

class Noticia{

	private $id;
	private $nomeCompleto;
	private $login;
	private $senha;

	function __get($propriedade){
		return $this->$propriedade;
	}

	function __set($propriedade, $valor){
		$this->$propriedade = $valor;
	}

}


?>