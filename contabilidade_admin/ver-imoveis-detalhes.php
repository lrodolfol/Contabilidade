<?php
    require_once 'ImovelAdmin.php';
    $imovel = new ImovelAdmin();
?>
<?PHP
if( !isset($_REQUEST['validacao']) || !isset($_REQUEST['codigo']) ) {
    echo 'Página não encontrada';
    die();
}else{
    $codigo = isset($_REQUEST['codigo']) ? addslashes(trim($_REQUEST['codigo'])) : "";
    $imovel->bucaImoveis($codigo);
    $tipo = $imovel->tipo;
    $totalQuartos = $imovel->totalQuartos;
    $totalSalas = $imovel->totalSalas;
    $totalBanheiros = $imovel->totalBanheiros;
    $totalCarrosGaragem = $imovel->totalCarrosGaragem;
    $totalSuites = $imovel->totalSuites;
    $terraco = $imovel->terraco;
    $laje = $imovel->laje;
    $telha = $imovel->telha;
    $areaLimpeza = $imovel->areaLimpeza;
    $totalAndares = $imovel->totalAndares;
    $salaEstar = $imovel->salaEstar;
    $numero = $imovel->numero;
    $descricao = $imovel->descricao;
    $rua = $imovel->rua;
    $bairro = $imovel->bairro;
    $cidade = $imovel->cidade;
    $estado = $imovel->estado;
    $cep = $imovel->cep;
    $disponivel = $imovel->disponivel;
    $fiador = $imovel->fiador;
    $valor = $imovel->valor;
    $mesesCaucao = $imovel->mesesCaucao;
    $taxasImposto = $imovel->taxasImposto;
    $condicao = $imovel->condicao;
    $areaTerreno = $imovel->areaTerreno;
    $areaConstruida = $imovel->areaConstruida;
    $varanda = $imovel->varanda; 
    $destaques = $imovel->destaques;
    $url = $imovel->url;
    //echo $laje; die();
}
?>

<?php
if (isset($_REQUEST['salveImovelRightNow'])) {
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
    $estado = isset($_POST['estado']) ? addslashes(trim($_POST['estado'])) : "";
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
    $destaques = isset($_POST['destaques']) ? addslashes(trim($_POST['destaques'])) : "";

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
    if ($imovel->cadastraImovel("S", $codigo)) {
        $msgSucesso = "Cadastro realizado com sucesso";
        if (isset($_FILES["img_principal"])) {
            $arquivoNome = $_FILES["img_principal"]["name"];
            $arquivoTipo = $_FILES["img_principal"]["type"];
            $arquivoTamanho = $_FILES["img_principal"]["size"];
            $arquivoNomeTemp = $_FILES["img_principal"]["tmp_name"];
            $erro = $_FILES["img_principal"]["error"];

            if ($erro == 0) {
                if (is_uploaded_file($arquivoNomeTemp)) {
                    try {
                        //echo "../imoveis\imoveis_imagens/casa_" .$imovel->codigo . "/principal.jpg"; die();
                        unlink("../imoveis\imoveis_imagens/casa_".$imovel->codigo . "/principal.jpg");
                        rmdir("../imoveis\imoveis_imagens/casa_". $imovel->codigo);
                    } catch (Exception $ex) {
                        
                    }
                    $pasta = mkdir("../imoveis\imoveis_imagens/casa_". $imovel->codigo, 0700);
                    if (move_uploaded_file($arquivoNomeTemp, '../imoveis\imoveis_imagens/casa_'.$imovel->codigo . '/principal.jpg')) {
                    } else {
                        $erro = "Falha ao mover a imagem (permissão de acesso, caminho inválido)";
                    }
                } else {
                    $erro = "Erro no envio da imagem: arquivo não recebido com sucesso.";
                }
            } else {
                $erro = "Erro no envio da imagem " ;//. $erro;
            }
        } else {
            $erro = "Imagem enviada não encontrado.";
        }

    } else {
        $msgErro = "Erro ao concluir cadastro";
    }
}
?>

<?php
include_once 'header.php';
//echo 'o' . $imovel->cep;
?>

<div class="album py-5 bg-light">
    <div class="container">
    </div>
</div>

<div class="container-fluid">
    <form id="formlogin" action="ver-imoveis-detalhes.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-2 form-group">
                <label><em><strong>Código</strong></em></label>
                <input required type="text" placeholder="codigo" name="codigo" value="<?php echo $codigo; ?>" id="codigo" class="form-control" readonly="true">
            </div>
            <div class="col-sm-3 form-group">
                <label><em><strong>Tipo</strong></em></label>
                <select required name="tipo" id="tipo" class="form-control" required>
                    <option> </option>
                    <option <?php if(strtoupper($tipo) == "CASA") { ?> selected <?php } ?> > Casa </option>
                    <option <?php if(strtoupper($tipo) == "APARTAMENTO") { ?> selected <?php } ?> > Apartamento </option>
                    <option <?php if(strtoupper($tipo) == "TERRENO") { ?> selected <?php } ?> > Terreno </option>
                    <option <?php if(strtoupper($tipo) == "KITNET") { ?> selected <?php } ?> > Kitnet </option>
                </select>
            </div>
        </div> 

        <label><em><strong>Endereço</strong></em></label>
        <div class="row">
            <div class="col-sm-5 form-group">
                <label>Rua</label>
                <input required type="text" placeholder="nome rua" name="rua" value="<?php echo $rua; ?>" id="rua" class="form-control">
            </div>
            <div class="col-sm-1 form-group">
                <label>Numero</label>
                <input type="number" placeholder="numero" name="numero" value="<?php echo $numero; ?>" id="numero" class="form-control" min="0">
            </div>
            <div class="col-sm-4 form-group">
                <label>Bairro</label>
                <input required type="text" placeholder="bairro" name="bairro" value="<?php echo $bairro; ?>" id="bairro" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 form-group">
                <label>Cidade</label>
                <input required type="text" placeholder="cidade" name="cidade" value="<?php echo $cidade; ?>" id="cidade" class="form-control">
            </div>
            <div class="col-sm-2 form-group">
                <label>Estado: </label>
                <select required name="uf" id="uf" class="form-control">
                    <option> </option>
                    <option selected> <?php echo $estado; ?> </option>
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
                <input required type="text" placeholder="cep" name="cep" value="<?php echo $cep; ?>" id="cep" class="form-control">
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
                <input  type="number" placeholder="0" name="totalQuartos" value="<?php echo $totalQuartos; ?>" id="totalQuartos" class="form-control" min="0">
            </div>
            <div class="col-sm-1 form-group">
                <label>Suites</label>
                <input  type="number" placeholder="0" name="totalSuites" value="<?php echo $totalSuites; ?>" id="totalSuites" class="form-control" min="0">
            </div>
            <div class="col-sm-1 form-group">
                <label>Salas</label>
                <input  type="number" placeholder="0" name="totalSalas" value="<?php echo $totalSalas; ?>" id="totalSalas" class="form-control" min="0">
            </div>
            <div class="col-sm-1 form-group">
                <label>Sala Estar</label>
                <input  type="number" placeholder="0" name="totalSalaEstar" value="<?php echo $salaEstar; ?>" id="totalSalaEstar" class="form-control" min="0">
            </div>
            <div class="col-sm-1 form-group">
                <label>Banheiros</label>
                <input  type="number" placeholder="0" name="totalBanheiros" value="<?php echo $totalBanheiros; ?>" id="totalBanheiros" class="form-control" min="0">
            </div>

            <div class="col-sm-2 form-group">
                <label>Area Terreno m²</label>
                <input required type="number" placeholder="areaTerreno m²" name="areaTerreno" value="<?php echo $areaTerreno; ?>" id="areaTerreno" class="form-control" min="0">
            </div>
            <div class="col-sm-2 form-group">
                <label>Area Construida m²</label>
                <input  type="number" placeholder="areaConstruida m²" name="areaConstruida" value="<?php echo $areaConstruida; ?>" id="areaConstruida" class="form-control" min="0">
            </div>
            <div class="col-sm-1 form-group">
                <label>Andares</label>
                <input  type="number" placeholder="totalAndares" name="totalAndares" value="<?php echo $totalAndares; ?>" id="totalAndares" class="form-control" min="0">
            </div>
            <div class="col-sm-1 form-group">
                <label>Garagem</label>
                <input  type="number" placeholder="totalCarrosGaragem" name="totalCarrosGaragem" value="<?php echo $totalCarrosGaragem; ?>" id="totalCarrosGaragem" class="form-control">
            </div>
        </div>

        <label><em><strong>Variaveis</strong></em></label>
        <div class="row">
            <div class="col-sm-2 form-group">
                <label>Fiador</label>
                <select  name="fiador" id="fiador" class="form-control">
                    <option> </option>
                    <option <?php if($fiador == 1) { ?> selected <?php } ?> > SIM </option>
                    <option <?php if($fiador == 0) { ?> selected <?php } ?> > NÃO </option>
                </select>
            </div>
            <div class="col-sm-2 form-group">
                <label>Meses de caução</label>
                <input  type="number" value="0" placeholder="mesesCaucao" name="mesesCaucao" value="<?php echo $mesesCaucao; ?>" id="mesesCaucao" class="form-control" min="0">
            </div>
            <div class="col-sm-2 form-group">
                <label>Taxas impostos</label>
                <select  name="impostos" id="impostos" class="form-control">
                    <option> </option>
                    <option <?php if($taxasImposto == 1) { ?> selected <?php } ?>> SIM </option>
                    <option <?php if($taxasImposto == 0) { ?> selected <?php } ?>> NÃO </option>
                </select>
            </div>
            <div class="col-sm-2 form-group">
                <label>Condição</label>
                <select required name="impostos" id="impostos" class="form-control">
                    <option> </option>
                    <option <?php if(strtoupper($condicao) == "VENDA") { ?> selected <?php } ?>> Venda </option>
                    <option <?php if(strtoupper(utf8_encode($condicao)) == "LOCAÇÃO") { ?> selected <?php } ?>> Locação </option>
                    <option <?php if(strtoupper($condicao) == "TEMPORADA") { ?> selected <?php } ?>> Temporada </option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1 form-group">
                <label>Varanda</label>
                <select  name="varanda" id="varanda" class="form-control">
                    <option> </option>
                    <option <?php if($varanda == 'S') { ?> selected <?php } ?> > SIM </option>
                    <option <?php if($varanda == 'N') { ?> selected <?php } ?> > NÃO </option>
                </select>
            </div>
            <div class="col-sm-1 form-group">
                <label>Terraço</label>
                <select  name="terraco" id="terraco" class="form-control">
                    <option> </option>
                    <option <?php if($terraco == 'S') { ?> selected <?php } ?> > SIM </option>
                    <option <?php if($terraco == 'N') { ?> selected <?php } ?> > NÃO </option>
                </select>
            </div>
            <div class="col-sm-1 form-group">
                <label>Laje</label>
                <select  name="laje" id="laje" class="form-control">
                    <option> </option>
                    <option <?php if($laje == 'S') { ?> selected <?php } ?> > SIM </option>
                    <option <?php if($laje == 'N') { ?> selected <?php } ?> > NÃO </option>
                </select>
            </div>
            <div class="col-sm-1 form-group">
                <label>Telha</label>
                <select  name="telha" id="telha" class="form-control">
                    <option> </option>
                    <option <?php if($telha == 'S') { ?> selected <?php } ?> > SIM </option>
                    <option <?php if($telha == 'N') { ?> selected <?php } ?> > NÃO </option>
                </select>
            </div>
            <div class="col-sm-1 form-group">
                <label>Area Limp.</label>
                <select  name="areaLimpeza" id="areaLimpeza" class="form-control">
                    <option> </option>
                    <option <?php if($areaLimpeza == 'S') { ?> selected <?php } ?> > SIM </option>
                    <option <?php if($areaLimpeza == 'N') { ?> selected <?php } ?> > NÃO </option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 form-group">
                <label><em><strong>Descrição</strong></em></label>
                <div class="form-group">
                    <input required type="text" placeholder="descricao" name="descricao" value="<?php echo $descricao; ?>" id="descricao" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 form-group">
                <label><em><strong>URL</strong></em></label>
                <input required type="text" value="<?php echo $url; ?>" name="url" id="url" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 form-group">
                <label><em><strong>Valor R$</strong></em></label>
                <div class="form-group">
                    <input required type="number" placeholder="valor" name="valor" value="<?php echo $valor; ?>" id="valor" class="form-control" min="0">
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
                        <input type="checkbox" <?php if($disponivel == 1) { ?> checked="true" <?php } ?> name="disponivel"/> disponivel
                    </label>
                </div> 
            </div>
        </div>

        <label>
<?php
if (isset($msgErro)) {
    echo $msgErro;
} elseif (isset($msgSucesso)) {
    echo '<p>' . $msgSucesso . '</p>';
}

?>
<?php
if (isset($imgErro)) {
   '<p>' . $imgErro . '</p>';
} elseif (isset($imgErroEnvio)) {
    '<p>' . $imgErroEnvio . '</p>';
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
        <input type="hidden" name="validacao" value="true" id="validacao" class="form-control">
    </form>
</div> 

<div class="album py-5 bg-light">
    <div class="container">
    </div>
</div>

<?php
include_once 'footer.php';
?>

