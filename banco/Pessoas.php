<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pessoas
 *
 * @author Rodolfo
 */
abstract class Pessoas {
    
    public $nome;
    private $cpf;
    protected $telefone;
    private $senha;
    
    public abstract function validar();
}
