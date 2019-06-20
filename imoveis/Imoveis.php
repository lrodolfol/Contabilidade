<?php

class Imoveis {
    public $codigo, $tipo, $totalComodos, $totalQuartos, $totalSalas, $totalBanheiros, $totalCarrosGaragem, $totalSuites;
    public $terraco, $laje, $telha, $areaLimpeza, $totalAndares, $salaEstar,  $numero, $descricao;
    public $rua, $bairro, $cidade, $estado, $cep, $disponivel, $fiador, $valor, $mesesCaucao, $taxasImposto, $condicao;
    public $areaTerreno, $areaConstruida, $varanda, $url;
    public $destaques = array();
    private $banco;
    
    function getBanco() {
        return $this->banco;
    }

    function setBanco($banco) {
        $this->banco = $banco;
    }

        
    public function __construct() {
        $host = "localhost";
        $nome = "root";
        $pass = "";
        $banco = "contabilidade";

        /* $host = "localhost";
          $nome = "u574659671_root";
          $pass = "##Ssrodolf123!kelly";
          $banco = "u574659671_jej"; */

        $mysqli = new mysqli($host, $nome, $pass, $banco);
        $this->setBanco($mysqli);

        if ($mysqli->connect_errno) {
            die('Falha na conexão com o BD');
        }
    }
    
    public function bucaImoveis($codigo){
        //include_once '../banco/banco.php';
        $this->codigo = $codigo;
        $sql = "SELECT * FROM imoveis WHERE codigo = " .  $codigo .  " ";
        if($query = $this->getBanco()->query($sql)){
            while ($row = $query->fetch_assoc()) {
                $this->tipo = $row['tipo'];
                $this->totalComodos = $row['total_comodos'];
                $this->totalQuartos = $row['total_quartos'];
                $this->totalSalas = $row['total_salas'];
                $this->totalBanheiros = $row['total_banheiros'];
                $this->totalCarrosGaragem = $row['total_carros_garagem'];
                $this->totalSuites = $row['total_quartos_suites'];
                if($row['terraco'] == 1){
                    $this->terraco = 'S';
                }else{
                    $this->terraco = 'N';
                }
                if($row['laje'] == 1){
                    $this->laje = 'S';
                }else{
                    $this->laje = 'N';
                }
                if($row['telha'] == 1){
                    $this->telha = 'S';
                }else{
                    $this->telha = 'N';
                }
                if($row['area_limpeza'] == 1){
                    $this->areaLimpeza = 'S';
                }else{
                    $this->areaLimpeza = 'N';
                }
                $this->salaEstar = $row['sala_estar']; 
                $this->numero = $row['numero'];
                $this->descricao = $row['descricao'];
                $this->rua = $row['rua'];
                $this->bairro = $row['bairro'];
                $this->cidade = $row['cidade'];
                $this->estado = $row['estado'];
                $this->cep = $row['cep'];
                $this->disponivel = $row['disponivel'];
                $this->fiador = $row['fiador'];
                $this->valor = $row['valor'];
                $this->mesesCaucao = $row['meses_caucao'];
                $this->taxasImposto = $row['taxas_imposto'];
                $this->condicao = $row['condicao'];
                $this->areaConstruida = $row['area_construida'];
                $this->areaTerreno = $row['area_terreno'];
                if($row['varanda'] = 1){
                    $this->varanda = 'S';
                }else{
                    $this->varanda = 'N';
                }
                $this->destaques = explode(';', $row['destaques']);
                $this->url = $row['url1'] . $row['url2'] . $row['url3'];
            }
            return true;
        }else{
            return false;
        }
    }
}
