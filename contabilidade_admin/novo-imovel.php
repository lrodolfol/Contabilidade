<?php
if (isset($_REQUEST['salveImovelRightNow'])) {
    require_once 'ImovelAdmin.php';
    $imovel = new ImovelAdmin();
    //$idade = isset($_POST['idade']) ? addslashes(trim($_POST['idade'])) : "";
    $tipo = isset($_POST['tipo']) ? addslashes(trim($_POST['tipo'])) : "";
    $totalQuartos = isset($_POST['totalQuartos']) ? addslashes(trim($_POST['totalQuartos'])) : "";
    $totalSalas = isset($_POST['totalSalas']) ? addslashes(trim($_POST['totalSalas'])) : "";
    $totalBanheiros = isset($_POST['totalBanheiros']) ? addslashes(trim($_POST['totalBanheiros'])) : "";
    $totalCarrosGaragem = isset($_POST['totalCarrosGaragem']) ? addslashes(trim($_POST['totalCarrosGaragem'])) : "";
    $totalSuites = isset($_POST['totalSuites']) ? addslashes(trim($_POST['totalSuites'])) : "";
    $terraco = isset($_POST['terraco']) ? addslashes(trim($_POST['terraco'])) : "";
    $laje = isset($_POST['laje']) ? addslashes(trim($_POST['laje'])) : "";
    $telha = isset($_POST['telha']) ? addslashes(trim($_POST['telha'])) : "";
    $areaLimpeza = isset($_POST['areaLimpeza']) ? addslashes(trim($_POST['areaLimpeza'])) : "";
    $totalAndares = isset($_POST['totalAndares']) ? addslashes(trim($_POST['totalAndares'])) : "";
    $salaEstar = isset($_POST['salaEstar']) ? addslashes(trim($_POST['salaEstar'])) : "";
    $numero = isset($_POST['numero']) ? addslashes(trim($_POST['numero'])) : "";
    $descricao = isset($_POST['descricao']) ? addslashes(trim($_POST['descricao'])) : "";
    $rua = isset($_POST['rua']) ? addslashes(trim($_POST['rua'])) : "";
    $bairro = isset($_POST['bairro']) ? addslashes(trim($_POST['bairro'])) : "";
    $cidade = isset($_POST['cidade']) ? addslashes(trim($_POST['cidade'])) : "";
    $estado = isset($_POST['uf']) ? addslashes(trim($_POST['uf'])) : "";
    $cep = isset($_POST['cep']) ? addslashes(trim($_POST['cep'])) : "";
    $disponivel = isset($_POST['disponivel']) ? addslashes(trim($_POST['disponivel'])) : "";
    $fiador = isset($_POST['fiador']) ? addslashes(trim($_POST['fiador'])) : "";
    $valor = isset($_POST['valor']) ? addslashes(trim($_POST['valor'])) : "";
    $mesesCaucao = isset($_POST['mesesCaucao']) ? addslashes(trim($_POST['mesesCaucao'])) : "";
    $taxasImposto = isset($_POST['taxasImposto']) ? addslashes(trim($_POST['taxasImposto'])) : "";
    $condicao = isset($_POST['condicao']) ? addslashes(trim($_POST['condicao'])) : "";
    $areaTerreno = isset($_POST['areaTerreno']) ? addslashes(trim($_POST['areaTerreno'])) : "";
    $areaConstruida = isset($_POST['areaConstruida']) ? addslashes(trim($_POST['areaConstruida'])) : "";
    $varanda = isset($_POST['varanda']) ? addslashes(trim($_POST['varanda'])) : "";
    $url = isset($_POST['url']) ? addslashes(trim($_POST['url'])) : "";
    $destaques = "";
    if(isset($_POST['destaques'])){
        foreach ($_POST['destaques'] as $value) {
            $destaques = $destaques . $value . "; ";
        }
    }

    $imovel->tipo = strtoupper($tipo);
    if(empty($totalQuartos)){
        $totalQuartos = 0;
    }
    if(empty($totalSalas)){
        $totalSalas = 0;
    }
    if(empty($totalBanheiros)){
        $totalBanheiros = 0;
    }
    if(empty($totalCarrosGaragem)){
        $totalCarrosGaragem = 0;
    }
    if(empty($totalSuites)){
        $totalSuites = 0;
    }
    //echo $totalQuartos; die();
    $imovel->totalQuartos = strtoupper($totalQuartos);
    $imovel->totalSalas = $totalSalas;
    $imovel->totalBanheiros = strtoupper($totalBanheiros);
    $imovel->totalCarrosGaragem = strtoupper($totalCarrosGaragem);
    $imovel->totalSuites = $totalSuites;
    $imovel->totalComodos = ($totalQuartos + $totalSalas + $totalBanheiros + $totalSuites);
    $imovel->terraco = $terraco == "SIM" ? 1 : 0;
    $imovel->laje = $laje == "SIM" ? 1 : 0;
    $imovel->telha = $telha == "SIM" ? 1 : 0;
    $imovel->areaLimpeza = $areaLimpeza == "SIM" ? 1 : 0;
    $imovel->salaEstar = $salaEstar == "SIM" ? 1 : 0;
    $imovel->fiador = $fiador == "SIM" ? 1 : 0;
    $imovel->disponivel = $disponivel == true ? 1 : 0;
    $imovel->taxasImposto = $taxasImposto == "SIM" ? 1 : 0;
    $imovel->varanda = $varanda == "SIM" ? 1 : 0;
    $imovel->totalAndares = empty($totalAndares) ? 0 : $totalAndares;
    $imovel->numero = empty($numero) ? 0 : $numero;
    $imovel->descricao = $descricao;
    $imovel->rua = $rua;
    $imovel->bairro = strtoupper($bairro);
    $imovel->cidade = strtoupper($cidade);
    $imovel->estado = $estado;
    $imovel->cep = $cep;
    $imovel->valor = $valor;
    $imovel->mesesCaucao = empty($mesesCaucao) ? 0 : $mesesCaucao;
    $imovel->condicao = strtoupper($condicao);
    $imovel->areaTerreno = empty($areaTerreno) ? 0 : $areaTerreno;
    $imovel->areaConstruida = empty($areaConstruida) ? 0 : $areaConstruida;
    $imovel->destaques = strtoupper($destaques);
    if(!empty($url)) {
        $imovel->url = substr($url, 0, 250);
        $imovel->url2 = substr($url, 251, 240);
        $imovel->url3 = substr($url, 501, 751);
    }
        if ($imovel->cadastraImovel("","")) {
        $msgSucesso = "Cadastro realizado com sucesso";
        if (isset($_FILES["img_principal"])) {
            $arquivoNome = $_FILES["img_principal"]["name"];
            $arquivoTipo = $_FILES["img_principal"]["type"];
            $arquivoTamanho = $_FILES["img_principal"]["size"];
            $arquivoNomeTemp = $_FILES["img_principal"]["tmp_name"];
            $erro = $_FILES["img_principal"]["error"];

            if ($erro == 0) {
                if (is_uploaded_file($arquivoNomeTemp)) {
                    if(is_dir("../imoveis\imoveis_imagens/casa_". $imovel->codigo)){
                        try {
                            unlink("../imoveis\imoveis_imagens/casa_".$imovel->codigo . "/principal.jpg");
                            rmdir("../imoveis\imoveis_imagens/casa_". $imovel->codigo);
                        } catch (Exception $ex) {
                        
                        }
                    }
                    $pasta = mkdir("../imoveis\imoveis_imagens/casa_". $imovel->codigo, 0700);
                    if (move_uploaded_file($arquivoNomeTemp, '../imoveis\imoveis_imagens/casa_'.$imovel->codigo . '/principal.jpg')) {
                    } else {
                        $erro = "Falha ao mover o arquivo (permissão de acesso, caminho inválido)";
                    }
                } else {
                    $erro = "Erro no envio: arquivo não recebido com sucesso.";
                }
            } else {
                $erro = "Erro no envio: " . $erro;
            }
        } else {
            $erro = "Arquivo enviado não encontrado.";
        }
        /*if ($erro !== 0) {
            echo $erro;
        }*/
    } else {
        $msgErro = "Erro ao concluir cadastro";
    }
}
?>

<?php
include_once 'header.php';
?>

<div class="album py-5 bg-light">
    <div class="container">
    </div>
</div>

<div class="container-fluid">
    <form id="formlogin" action="novo-imovel.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-2 form-group">
                <label><em><strong>Código</strong></em></label>
                <input required type="text" placeholder="codigo" name="codigo" id="codigo" class="form-control" readonly="true">
            </div>
            <div class="col-sm-3 form-group">
                <label><em><strong>Tipo</strong></em></label>
                <select required name="tipo" id="tipo" class="form-control" required>
                    <option> </option>
                    <option> Casa </option>
                    <option> Apartamento </option>
                    <option> Terreno </option>
                    <option> Kitnet </option>
                </select>
            </div>
        </div> 

        <label><em><strong>Endereço</strong></em></label>
        <div class="row">
            <div class="col-sm-5 form-group">
                <label>Rua</label>
                <input required type="text" placeholder="nome rua" name="rua" id="rua" class="form-control">
            </div>
            <div class="col-sm-1 form-group">
                <label>Numero</label>
                <input type="number" placeholder="numero" name="numero" id="numero" class="form-control" min="0">
            </div>
            <div class="col-sm-4 form-group">
                <label>Bairro</label>
                <input required type="text" placeholder="bairro" name="bairro" id="bairro" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 form-group">
                <label>Cidade</label>
                <input required type="text" placeholder="cidade" name="cidade" id="cidade" class="form-control">
            </div>
            <div class="col-sm-2 form-group">
                <label>Estado: </label>
                <select required name="uf" id="uf" class="form-control">
                    <option> </option>
                    <option> AC </option>
                    <option> AL </option>
                    <option> AP </option>
                    <option> AM </option>
                    <option> BA </option>
                    <option> CE </option>
                    <option> DF</option>
                    <option> ES </option>
                    <option> GO</option>
                    <option> MA</option>
                    <option> MT</option>
                    <option> MS</option>
                    <option> MG</option>
                    <option> PA</option>
                    <option> PB</option>
                    <option> PR</option>
                    <option> PE </option>
                    <option> PI </option>
                    <option> RJ </option>
                    <option> RN </option>
                    <option> RS </option>
                    <option> RO </option>
                    <option> RR </option>
                    <option> SC </option>
                    <option> SE </option>
                    <option> TO </option>
                </select>
            </div>
            <div class="col-sm-2 form-group">
                <label>CEP</label>
                <input required type="text" placeholder="cep" name="cep" id="cep" class="form-control" >
            </div>
        </div>

        <div class="row">
            <div class="col-sm-5 form-group">
                <label><em><strong>Total de comodos</strong></em></label>
            </div>
            <div class="col-sm-6 form-group">
                <label><em><strong>Espaço</strong></em></label>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-1 form-group">
                <label>Quartos</label>
                <input  type="number" placeholder="0" name="totalQuartos" id="totalQuartos" class="form-control" min="0"> 
            </div>
            <div class="col-sm-1 form-group">
                <label>Suites</label>
                <input  type="number" placeholder="0" name="totalSuites" id="totalSuites" class="form-control" min="0">
            </div>
            <div class="col-sm-1 form-group">
                <label>Salas</label>
                <input  type="number" placeholder="0" name="totalSalas" id="totalSalas" class="form-control" min="0">
            </div>
            <div class="col-sm-1 form-group">
                <label>Sala Estar</label>
                <input  type="number" placeholder="0" name="totalSalaEstar" id="totalSalaEstar" class="form-control" min="0">
            </div>
            <div class="col-sm-1 form-group">
                <label>Banheiros</label>
                <input  type="number" placeholder="0" name="totalBanheiros" id="totalBanheiros" class="form-control" min="0">
            </div>

            <div class="col-sm-2 form-group">
                <label>Area Terreno m²</label>
                <input required type="number" placeholder="areaTerreno m²" name="areaTerreno" id="areaTerreno" class="form-control" min="0">
            </div>
            <div class="col-sm-2 form-group">
                <label>Area Construida m²</label>
                <input  type="number" placeholder="areaConstruida m²" name="areaConstruida" id="areaConstruida" class="form-control" min="0">
            </div>
            <div class="col-sm-1 form-group">
                <label>Andares</label>
                <input  type="number" placeholder="totalAndares" name="totalAndares" id="totalAndares" class="form-control" min="0">
            </div>
            <div class="col-sm-1 form-group">
                <label>Garagem</label>
                <input  type="number" placeholder="totalCarrosGaragem" name="totalCarrosGaragem" id="totalCarrosGaragem" class="form-control" min="0">
            </div>
        </div>

        <label><em><strong>Variaveis</strong></em></label>
        <div class="row">
            <div class="col-sm-2 form-group">
                <label>Fiador</label>
                <select  name="fiador" id="fiador" class="form-control">
                    <option> </option>
                    <option> SIM </option>
                    <option> NÃO </option>
                </select>
            </div>
            <div class="col-sm-2 form-group">
                <label>Meses de caução</label>
                <input  type="number" value="0" placeholder="mesesCaucao" name="mesesCaucao" id="mesesCaucao" class="form-control" min="0">
            </div>
            <div class="col-sm-2 form-group">
                <label>Taxas impostos</label>
                <select  name="impostos" id="impostos" class="form-control">
                    <option> </option>
                    <option> SIM </option>
                    <option> NÃO </option>
                </select>
            </div>
            <div class="col-sm-2 form-group">
                <label>Condição</label>
                <select required name="condicao" id="impostos" class="form-control" name="condicao">
                    <option> </option>
                    <option> Venda </option>
                    <option> Locação </option>
                    <option> Temporada </option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1 form-group">
                <label>Varanda</label>
                <select name="varanda" id="varanda" class="form-control">
                    <option> </option>
                    <option> SIM </option>
                    <option> NÃO </option>
                </select>
            </div>
            <div class="col-sm-1 form-group">
                <label>Terraço</label>
                <select  name="terraco" id="terraco" class="form-control">
                    <option> </option>
                    <option> SIM </option>
                    <option> NÃO </option>
                </select>
            </div>
            <div class="col-sm-1 form-group">
                <label>Laje</label>
                <select  name="laje" id="laje" class="form-control">
                    <option> </option>
                    <option> SIM </option>
                    <option> NÃO </option>
                </select>
            </div>
            <div class="col-sm-1 form-group">
                <label>Telha</label>
                <select  name="telha" id="telha" class="form-control">
                    <option> </option>
                    <option> SIM </option>
                    <option> NÃO </option>
                </select>
            </div>
            <div class="col-sm-1 form-group">
                <label>Area Limp.</label>
                <select  name="areaLimpeza" id="areaLimpeza" class="form-control">
                    <option> </option>
                    <option> SIM </option>
                    <option> NÃO </option>
                </select>
            </div>
        </div>    
        <div class="row">
            <div class="col-sm-12 form-group">
                <label><em><strong>Descrição</strong></em></label>
                <div class="form-group">
                    <input required type="text" placeholder="descricao" name="descricao" id="descricao" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 form-group">
                <label><em><strong>URL</strong></em></label>
                <input required type="text" placeholder="mapa url" name="url" id="url" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 form-group">
                <label>Destaques</label>
                <select name="destaques[]" id="impostos" class="form-control" multiple="multiple" size="3">
                    <option> </option>
                    <option> Piscina </option>
                    <option> Suna </option>
                    <option> Churrasq. </option>
                    <option> Area lazer </option>
                    <option> Canil </option>
                </select>
            </div>
            <div class="col-sm-2 form-group">
                <label><em><strong>Valor R$</strong></em></label>
                <div class="form-group">
                    <input required type="number" placeholder="valor" name="valor" id="valor" class="form-control" min="0">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">
                    Imagem do imovel
                </label>
                <input type="file" class="form-control-file" id="exampleInputFile" name="img_principal"/>
                <p class="help-block">
                    Essa aparecerá como imagem principal do imovel.
                </p>
            </div>
            <div class="col-sm-2 form-group">
                <label><em><strong></strong></em></label>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" checked="true" name="disponivel"/> disponivel
                    </label>
                </div> 
            </div>
        </div>

        <label>
<?php
if (isset($msgErro)) {
    ?><p style="color: red"> <?php echo $msgErro; ?> </p> <?php
} elseif (isset($msgSucesso)) {
    ?><p style="color: blue"> <?php echo $msgSucesso; ?> </p> <?php
}
?>
<?php
if (isset($erro) && $erro != 0 ) {
    ?><p style="color: blue"> <?php echo $erro; ?> </p> <?php
} elseif (isset($erro)) {
    ?><p style="color: blue"> <?php echo $erro; ?> </p> <?php
}
?>
        </label>
        <div class="row">
            <div class="col-sm-3 form-group">
                <button class="btn btn-success" name="salveImovelRightNow" style="width: 220px">Salvar</button>
            </div>
            <div class="col-sm-3 form-group">
                <button type="reset" class="btn btn-danger" id="reset" name="reset" style="width: 220px">Limpar</button>
            </div>
        </div>
    </form>
</div> 

<div class="album py-5 bg-light">
    <div class="container">
    </div>
</div>

<?php
include_once 'footer.php';
?>
