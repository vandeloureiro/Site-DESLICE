<?php
include_once "model/Usuario.php";
include_once "Conexao.php";


class UsuarioDao{ 
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
    
    function autentica($login, $senha){
        $conexao = new Conexao();
        $pdo     = $conexao->Conecta();
        $hash    = md5($senha);
        $result  = $pdo->query("SELECT * FROM des_admin WHERE des_login = '{$login}' AND des_senha = '{$hash}'");
        
        if($result->rowCount() > 0 ){
        	$pdo = null;
        	return true;
        }
        $pdo = null;
        return false;        
    }



}
?>