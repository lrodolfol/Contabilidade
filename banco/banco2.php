<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function conectar2(){
    /*$host = "localhost";
    $nome = "root";
    $pass = "";
    $banco = "contabilidade";*/
    
    $host = "localhost";
    $nome = "root";
    $pass = "";
    $banco = "contabilidade";
    
    /*$host = "localhost";
    $nome = "u574659671_root";
    $pass = "##Ssrodolf123!kelly";
    $banco = "u574659671_jej";*/
    
    $mysqli = new mysqli($host, $nome, $pass, $banco);
    return $mysqli;
    
    if($mysqli->connect_errno){
        die('Falha na conexão com o BD');
    }
}

    $con2 = conectar2();
