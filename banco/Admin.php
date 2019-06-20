<?php
require_once 'Pessoas.php';
class Admin extends Pessoas {
    private $codigo = null;
    public $msg_erro;
    
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getNome(){
        return $this->nome;
    }
    
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function getSenha(){
        return $this->senha;
    }
    
    public function validar(){
        require 'banco.php';
        $sql = "SELECT * FROM admin WHERE `nome` = '{$this->getNome()}' AND `senha` = '{$this->getSenha()}' ";
        $query = $con->query($sql);
        if(!$query){
            printf("Erro na conexão" . $con->error);
        }
        $row = $con->affected_rows;
        if($row > 0){
            //echo "Usuario existente";
            $this->codigo = md5("janayna");
            header("location:contabilidade_admin/index.php?user=$this->codigo");
        }else{
            $this->msg_erro = "Usuário ou senha invalidos";
        }
        
    }
}
