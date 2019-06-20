<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Classe
 *
 * @author Rodolfo
 */
class Classe {
    public $erro = null;
    public $mensagem;
    private $style = array('default', 'active');
    public $limitInicio;
    public $limitFim;
    
    public function recebe_email(){
        $this->limitFim = $this->limitInicio + 10;
        require '../banco/banco.php';
        //$sql = "SELECT * FROM `emails` ORDER BY id DESC LIMIT " . $this->limitInicio . "," . $this->limitFim;
        $sql = "SELECT * FROM `emails` ORDER BY id DESC  ";
        $query = $con->query($sql);
        if(!$query){
            $this->erro = "Falha na conexão" . $con->error;
            echo $this->erro;
        }
        if($con->affected_rows <= 0) {
            $this->mensagem = "Você ainda não tem nenhum e-mail recebido";
            echo $this->mensagem;
        }else{
            ?>
            <table  class="table table-hover table-sm">
                <tr>
                    <!-- <td>ID</td> -->
                    <td>Nome</td>
                    <td>E-mail</td>
                    <td>Telefone</td>
                    <td>Mensagem</td>
                    <td>Data</td>
                    <td></td>
                </tr>
            <?php
            $x = 0;
            while($row = $query->fetch_assoc()){
                if($x >= 2){
                    $x = 0;
                }
                ?> <tr class="table-<?php echo $this->style[$x]?>"> <?php
                 //echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['telefone'] . "</td>";
                echo "<td style='width: 500px'>" .utf8_encode(substr($row['mensagem'],0,89)) . "</td>";
                echo "<td>" . $row['data_envio'] . "</td>";
                ?> <td><a href=""><img style="width: 20px" src="../img/delete.png"></a><?php
                //ANALISA SE O EMAIL JA FOI RESPONDIDO OU NAO
                $x = $x + 1;
            }
            ?>
               </tr>
            </table>
            <?php
        }
    }
    
    private function mostra_email(){
        
    }
}
