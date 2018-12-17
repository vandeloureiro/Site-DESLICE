<?php
include_once "model/Noticia.php";
include_once "Conexao.php";


class NoticiaDao{ 
    private $pdo; 
  
    /*public function login(Usuario $usuario){
        try{
            //SERÁ EXECUTADO O QUERY
            $sql = "SELECT * FROM usuarios WHERE usuario = :usuario AND senha = :senha LIMIT 0, 1";
 
            // PREPARANDO
            $query = $this->pdo->prepare($sql);
 
            //VALORES
            $email = $usuario->__get("usuario");
            $senha = $usuario->__get("senha");
 
            $query->bindParam("usuario", $email);
            $query->bindParam("senha", $senha);
 

            if($query->execute() &amp &amp $query->rowCount() == 1){
                session_start();
                $_SESSION["usuario"] = $query->fetch(PDO::FETCH_OBJ);
                $_SESSION["logged"] = true;
                return true; 
            }
 
            return false;
 
        }catch (Exception $e){
            throw new Exception("Erro encontrado: " . $e->getMessage(), 1);
        }
    }*/
    
    function insere($noticia){
        $conexao = new Conexao ();
        $pdo = $conexao->Conecta ();
        
        //Colocando a noticia no B.D
        
        $titulo       = $noticia->__get('titulo');
        $descricao    = $noticia->__get('descricao');
        $conteudo     = $noticia->__get('conteudo');
        $descricaoimg = $noticia->__get('descricaoimg');
        $imagem       = $noticia->__get('imagem');
        $data         = $noticia->__get('data');
        
        $param = array($titulo, $descricao, $conteudo, $descricaoimg, $imagem, $data);
            
        $atConta = $pdo->prepare("INSERT des_noticia SET des_titulo=?, des_descricao=?, des_conteudo=?, des_descimg=?, des_imagem=?, des_data=?");
        $atConta->execute($param);
        $ult_id = $pdo->lastInsertId();

        //Atribuindo o ID da ultima noticia adicionada;
        $noticia->__set('id',$ult_id);
        
        $pdo = null;        
    }

    function buscaUltimoId(){
        $conexao = new Conexao();
        $pdo     = $conexao->Conecta();
        $query   = $pdo->query("SELECT des_id FROM des_noticia ORDER BY des_id DESC LIMIT 1");
        $linha   = $query->fetch(PDO::FETCH_ASSOC);
        $pdo     = null;
        return $linha['des_id'];
    }

    function buscaNoticia($id){
        $conexao = new Conexao();
        $pdo     = $conexao->Conecta();
        $query = $pdo->query("SELECT * FROM des_noticia WHERE des_id = '{$id}' ");
        $linha = $query->fetch(PDO::FETCH_ASSOC);
        
        $noticia = new Noticia();
        $noticia->__set('id',           $linha['des_id']);
        $noticia->__set('titulo',       $linha['des_titulo']);
        $noticia->__set('descricao',    $linha['des_descricao']);
        $noticia->__set('conteudo',     $linha['des_conteudo']);
        $noticia->__set('descricaoimg', $linha['des_descimg']);
        $noticia->__set('imagem',       $linha['des_imagem']);
        $noticia->__set('data',         $linha['des_data']);

        $pdo = null;
        return $noticia;
    }

    function excluirNoticia($id){
        $conexao = new Conexao();
        $pdo     = $conexao->Conecta();
        $query   = $pdo->query("DELETE FROM des_noticia WHERE des_id = '{$id}' ");
        $pdo     = null;
    }

}
?>