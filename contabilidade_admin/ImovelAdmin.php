<?php

class ImovelAdmin {

    public $codigo, $tipo, $totalComodos, $totalQuartos, $totalSalas, $totalBanheiros, $totalCarrosGaragem, $totalSuites;
    public $terraco, $laje, $telha, $areaLimpeza, $totalAndares, $salaEstar, $numero, $descricao;
    public $rua, $bairro, $cidade, $estado, $cep, $disponivel, $fiador, $valor, $mesesCaucao, $taxasImposto, $condicao;
    public $areaTerreno, $areaConstruida, $varanda, $url, $url2, $url3;
    public $destaques = array();
    private $banco;

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

    function getBanco() {
        return $this->banco;
    }

    function setBanco($banco) {
        $this->banco = $banco;
    }

    /*
      function conecta() {
      include('../banco/banco.php');
      $this->setBanco($con);
      }
      function disconecta(){
      $this->setBanco(null);
      } */

    public function cadastraImovel($upt, $codigo) {
        //require_once '../banco/banco.php';
        //$con = $this->conecta();
        if (empty($codigo)) {
            $sql = "select codigo from imoveis order by codigo desc limit 1";
            if (!$query = $this->getBanco()->query($sql)) {
                return false;
            } else {
                while ($linha = $query->fetch_assoc()) {
                    $this->codigo = ($linha['codigo'] + 1);
                }
                if(empty($this->codigo)) {
                   $this->codigo = 1;
                }
            }
        } else {
            $this->codigo = $codigo;
        }
        //echo $this->bairro;
        if (empty($upt)) {
            $sql = "insert into imoveis (codigo,tipo, total_comodos, total_quartos, total_salas, total_banheiros, total_carros_garagem, total_quartos_suites, "
                    . "terraco, laje, telha, area_limpeza, total_andares, sala_estar, numero, descricao,"
                    . "rua, bairro, cidade, estado, cep, disponivel, fiador, valor, meses_caucao, taxas_imposto, condicao,"
                    . "area_terreno, area_construida, varanda, destaques, url1, url2, url3) values ("
                    . " $this->codigo, '$this->tipo', $this->totalComodos, $this->totalQuartos, $this->totalSalas, $this->totalBanheiros, "
                    . " $this->totalCarrosGaragem, $this->totalSuites, $this->terraco, $this->laje, $this->telha, $this->areaLimpeza, "
                    . " $this->totalAndares, $this->salaEstar, $this->numero, '$this->descricao', '$this->rua', '$this->bairro', '$this->cidade', "
                    . " '$this->estado', '$this->cep', $this->disponivel, $this->fiador, $this->valor, $this->mesesCaucao, $this->taxasImposto, "
                    . " '$this->condicao', $this->areaTerreno, $this->areaConstruida, $this->varanda, '$this->destaques', '$this->url', '$this->url2', '$this->url3')";
        } else if ($upt = "S") {
            $sql = "UPDATE imoveis set tipo = '" . $this->tipo . "', total_comodos = " . $this->totalComodos . ", total_quartos = " . $this->totalQuartos . ", " .
                    " total_salas = " . $this->totalSalas . ", total_banheiros = " . $this->totalBanheiros . ", total_carros_garagem = " . $this->totalCarrosGaragem . ", " .
                    " total_quartos_suites = " . $this->totalSuites . ", terraco = " . $this->terraco . ", laje = " . $this->laje . ", " .
                    " telha = " . $this->telha . ", area_limpeza = " . $this->areaLimpeza . ", cidade = '" . $this->cidade . "', " .
                    " rua = '" . $this->rua . "', bairro = '" . $this->bairro . "', descricao = '" . $this->descricao . "', " .
                    " disponivel = " . $this->disponivel . ", fiador = " . $this->fiador . ", valor = " . $this->valor . ", " .
                    " meses_caucao = " . $this->mesesCaucao . ", taxas_imposto = " . $this->taxasImposto . ", condicao = '" . $this->condicao . "', " .
                    " area_terreno = " . $this->areaTerreno . ", area_construida = " . $this->areaConstruida . ", varanda = " . $this->varanda . ", " .
                    " destaques = '" . $this->destaques . "', url1 = '" .$this->url ."', url2 = '" . $this->url2 . "', url3 = '" . $this->url3 . "' WHERE codigo = " . $this->codigo . " ";
        }
        //echo $sql; die();
        require_once '../banco/banco.php';
        $query = $con->query($sql);
        if (!$query) {
            echo $sql;
            return false;
        } else {
            return true;
        }
    }

    public function bucaImoveis($codigo) {
        //include_once '../banco/banco.php';
        //$con = $this->conecta();
        //$this->codigo = $codigo;
        $sql = "SELECT * FROM imoveis WHERE codigo = " . $codigo . " ";
        //echo $sql;
        if ($query = $this->getBanco()->query($sql)) {
            while ($row = $query->fetch_assoc()) {
                $this->tipo = $row['tipo'];
                $this->totalAndares = $row['total_andares'];
                $this->totalComodos = $row['total_comodos'];
                $this->totalQuartos = $row['total_quartos'];
                $this->totalSalas = $row['total_salas'];
                $this->totalBanheiros = $row['total_banheiros'];
                $this->totalCarrosGaragem = $row['total_carros_garagem'];
                $this->totalSuites = $row['total_quartos_suites'];
                if ($row['terraco'] == 1) {
                    $this->terraco = 'S';
                } else {
                    $this->terraco = 'N';
                }
                if ($row['laje'] == 1) {
                    $this->laje = 'S';
                } else {
                    $this->laje = 'N';
                }
                if ($row['telha'] == 1) {
                    $this->telha = 'S';
                } else {
                    $this->telha = 'N';
                }
                if ($row['area_limpeza'] == 1) {
                    $this->areaLimpeza = 'S';
                } else {
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
                if ($row['varanda'] = 1) {
                    $this->varanda = 'S';
                } else {
                    $this->varanda = 'N';
                }
                $this->destaques = explode(';', $row['destaques']);
                $this->url = $row['url1'] . $row['url2'] . $row['url3'];
            }
            return true;
        } else {
            return false;
        }
    }

    public function deletaImovel($codigo) {
        include_once '../banco/banco2.php';
        $sql = "DELETE FROM imoveis WHERE codigo = " . $codigo . " ";
        if ($query = $con2->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

}
