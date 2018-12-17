<?php
include_once "dao/NoticiaDAO.php";

class Noticia{

	private $id;
	private $titulo;
	private $descricao;
	private $conteudo;
	private $descricaoimg;
	private $imagem;
	private $data;

	function __get($propriedade){
		return $this->$propriedade;
	}

	function __set($propriedade, $valor){
		$this->$propriedade = $valor;
	}

	function buscaNoticiasRecentes(){
		$noticias = new ArrayObject();
		$noticia  = new NoticiaDAO();
		$id       = $noticia->buscaUltimoId();
        for ($i=0; $i < 5; $i++) { 
            if ($id >= 0) {
               $noticiaAtual = $noticia->buscaNoticia($id);
               if ($noticiaAtual->__get('titulo') != null) {
               		$noticias->append($noticiaAtual);
               }  
               $id = $id - 1;
            } 
        }
        return $noticias;
	}

}


?>