<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Enviaemail
 *
 * @author Rodolfo
 */
//require_once 'Interface_email.php';
class Enviaemail /*Implements Interface_email*/{
    protected $nome;
    protected $email;
    protected $assunto;
    protected $telefone;
    protected $mensagem;
    protected $ip;
    public $erro = null;
    public $success = null;
    public $data;
    public $resposta;
    
    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getMensagem() {
        return $this->mensagem;
    }

    function getIp() {
        return $this->ip;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }

    function setIp($ip) {
        $this->ip = $ip;
    }
    
    function getAssunto() {
        return $this->assunto;
    }

    function setAssunto($assunto) {
        $this->assunto = $assunto;
    }
    
    public function valida_email(){
        //VALIDA DE AS INFORMAÇÕES NAO ESTÃO VAZIAS
        if($this->getNome() == null){
            $this->erro = "Nome inválido";
        }else if($this->getEmail() == null){
            $this->erro = "Email inválido";
        }else if($this->getMensagem() == null){
            $this->erro = "Mensagem inválida";
        }else if($this->getTelefone() == null){
            $this->erro = "Telefone inválido";
        }else{
            $this->email_autenticado();
           //$this->mandaEmail();
        } 
    }
        //TENTA FAZER O CADASTRO NO BANCO DE DADOS
    public function mandaEmail(){
    require_once 'banco/banco.php';
            $sql = "INSERT INTO `emails` (`nome`, `email`, `telefone`, `mensagem`, `ip`, `data_envio`, `lido`) VALUES ("
                    . " '{$this->getNome()}', '{$this->getEmail()}', '{$this->getTelefone()}', '{$this->getMensagem()}',"
                    . "'{$this->getIp()}', '$this->data', 0)";
            $query = $con->query($sql);
            //echo $sql;
            if(!$query){
                $this->erro = ("Falha na conexão bd" . $con->error);
            }else{
                ?><p class="text-left text-muted"><?php
                $this->success = ("Mensagem enviada com Sucesso! Breve, entraremos em contato");
                ?></p><?php
            }
        }
        
        private function email_autenticado(){
        require_once 'banco/banco.php';    
        //define("to", "janateccontabil@hotmail.com");
        define("to", "rodolfo0ti@gmail.com");
        $assunto = $this->getAssunto();
        $mensagem = "Nome: " .$this->getNome() . "\r\n" . 
                    "Telefone: " .$this->getTelefone() . "\r\n" . 
                    "Mensagem: " . "\r\n" . $this->getMensagem();
        $headers = 'From:' . $this->getEmail() . "\r\n" .
                    'Reply-To:' . $this->getEmail() . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();
        $envio = mail(to, $assunto, $mensagem, $headers);
        if(!$envio){
        //echo "erro";
//        $this->erro = ("Falha na conexão mail" . $con->error);
        //$this->email();
        }else{
            $this->success = ("Mensagem enviada com Sucesso! Breve, entraremos em contato");
            }
        }
        
    
}
