<?php
require_once 'header.php';
?>
    <div class="album py-5 bg-light">
      <div class="container">
      </div>
    </div>
<?php
$erroEmail = "";
if(isset($_POST['submit_contato'])) {
include_once 'email/Enviaemail.php';
$email = new Enviaemail();

$nome = $_POST['nome'];
$mail = $_POST['email'];
$assunto = $_POST['assunto'];
$fone = $_POST['telefone'];
$ddd = $_POST['ddd'];
$telefone = $ddd . $fone;
$mesangem = $_POST['mensagem'];
$data = date("Y-m-d"); 
$ip = $_SERVER['REMOTE_ADDR'];

$email->setNome($nome);
$email->setEmail($mail);
$email->setTelefone($telefone);
$email->setAssunto($assunto);
$email->setMensagem($mesangem);
$email->setIp($ip);
$email->data = $data;

$email->mandaEmail();
$email->valida_email();
if(isset ($email->erro) && $email->erro != null){
   $erroEmail  = "sucesso";
}else{
   $erroEmail = "erro";
}
}
?>

<?php
if(!isset($_REQUEST['alt']) || ( (!isset($_REQUEST['codigo_imovel']))) )  {
    echo 'PÁGINA NÃO ENCONTRADA';
    die();
} else {
    //var_dump($_REQUEST);
    $codigo = $_REQUEST['codigo_imovel'];
}

include 'Imoveis.php';
$imoveis = new Imoveis();
if($imoveis->bucaImoveis($codigo)){
    $tipo = $imoveis->tipo;
    $totalComodos = $imoveis->totalComodos;
    $totalQuartos = $imoveis->totalQuartos; 
    $totalSalas = $imoveis->totalSalas;
    $totalBanheiros = $imoveis->totalBanheiros;
    $totalCarrosGaragem = $imoveis->totalCarrosGaragem;
    $totalSuites = $imoveis->totalSuites;
    $terraco = $imoveis->terraco;
    $laje = $imoveis->laje;
    $telha = $imoveis->telha;
    $areaLimpeza = $imoveis->areaLimpeza;
    $totalAndares = $imoveis->totalAndares;
    $salaEstar = $imoveis->salaEstar;
    $numero = $imoveis->numero;
    $descricao = $imoveis->descricao;
    $rua = $imoveis->rua;
    $bairro = $imoveis->bairro;
    $cidade = $imoveis->cidade;
    $estado = $imoveis->estado;
    $cep = $imoveis->cep;
    $disponivel = $imoveis->disponivel;
    $fiador = $imoveis->fiador;
    $valor = $imoveis->valor;
    $mesesCaucao = $imoveis->mesesCaucao;
    $taxasImposto = $imoveis->taxasImposto;
    $condicao = $imoveis->condicao;
    $areaTerreno = $imoveis->areaTerreno;
    $areaConstruida = $imoveis->areaConstruida;
    $varanda = $imoveis->varanda;
    $destaques = $imoveis->destaques;
    $url = $imoveis->url;
    //echo 'oiiii' . $url; die();
}else{
    echo 'OCORREU UM ERRO AO BUSCAR INFORMAÇÕES NECESSÁRIOS. TENTE NOVAMENTE';
    die();
}
?>
    <!-- 
        VER LOCALIZAÇÃO NO MAPA
        TER OPÇÃO TENHO INTERESSE
    -->
    <?php if($erroEmail == "sucesso"){
        ?><label style="color: blue"><b><?php echo "$email->success"; ?></b></label> <?php
            }elseif ($erroEmail == "erro"){
        ?><label style="color: red"><b><?php echo "$email->erro" . "<br>" . "Mande um email para: 'janateccontabil@hotmail.com' "; ?></b></label> <?php
    } ?>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <img src="imoveis_imagens/casa_<?php echo $codigo; ?>/principal.jpg" width="100%" height="325">
                    <p style="text-align: center"><a href="#ver_no_mapa"><button type="button" class="btn btn-light btn-sm"><em>ver no mapa</em></button></a></p>
                    <p><em><strong><?php echo utf8_encode($tipo) . ' #'.str_pad($codigo,5,'0',STR_PAD_LEFT) ?></strong></em></p>
                </div>
                
                <div class="col-md-5">
                    <table>
                        <tr class="table-active">
                            <th>Valor: </th>
                            <td style="text-align: right"><?php echo 'R$ ' . number_format($valor,2); ?></td>
                        </tr>
                        <tr>
                            <th>Tipo: </th>
                            <td style="text-align: right"><?php echo utf8_encode($condicao); ?></td>
                        </tr>
                        <tr class="table-active">
                            <th><label>Quartos:</label></th> 
                            <td style="text-align: right"><?php echo $totalQuartos; ?></td>
                        </tr>
                        <tr>
                            <th><label>Suites:</label></th> 
                            <td style="text-align: right"><?php echo $totalSuites; ?> </td>
                        </tr>
                        <tr class="table-active">
                            <th><label>Banheiros:</label></th>
                            <td style="text-align: right"><?php echo $totalBanheiros; ?> </td>
                        </tr>
                        <tr>
                            <th><label>Salas:</label></th> 
                            <td style="text-align: right"><?php echo $totalSalas; ?> </td>
                        </tr>
                        <tr class="table-active">
                            <th><label>Sala de estar:</label></th>
                            <td style="text-align: right"><?php echo $salaEstar; ?> </td>
                        </tr>
                        <tr>
                            <th><label>Vagas garagem:</label></th>  
                            <td style="text-align: right"><?php echo $totalCarrosGaragem; ?></td>
                        </tr>
                        <tr class="table-active">
                            <th><label>Area do terreno:</label></th>
                            <td style="text-align: right"><?php echo $areaTerreno . ' m²'; ?> </td>
                        </tr>
                        <tr>
                            <th><label>Area construida:</label></th>
                            <td style="text-align: right"><?php echo $areaConstruida . ' m²' ; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <?php
                $parametros = array('Terraço','Laje','Telha','Area limpeza',);
            ?>
            
            <div class="row">
                <div class="col-md-5">
                    <p><i>..<?php echo utf8_encode($descricao); ?></i></p>
                </div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-2">
                                <?php 
                                    if($terraco == 'S'){
                                        ?>
                                            <img src="../img/cheked.png">
                                        <?php
                                    }else{
                                        ?>
                                            <img src="../img/no_cheked.png">
                                        <?php
                                    }
                                ?>
                                <em>terraço</em>
                            </div>
                            <div class="col-md-2">
                            <?php 
                                if($laje == 'S'){
                                    ?>
                                        <img src="../img/cheked.png">
                                    <?php
                                }else{
                                    ?>
                                        <img src="../img/no_cheked.png">
                                    <?php
                                }
                            ?>
                            <em>Laje</em>
                            </div>
                            <div class="col-md-2">
                            <?php 
                                if($telha == 'S'){
                                    ?>
                                        <img src="../img/cheked.png">
                                    <?php
                                }else{
                                    ?>
                                        <img src="../img/no_cheked.png">
                                    <?php
                                }
                            ?>
                            <em>Telha</em>
                            </div>
                            <div class="col-md-2">
                            <?php 
                                if($areaLimpeza == 'S'){
                                    ?>
                                        <img src="../img/cheked.png">
                                    <?php
                                }else{
                                    ?>
                                        <img src="../img/no_cheked.png">
                                    <?php
                                }
                            ?>
                            <em>Area Limpeza</em>
                            </div>
                            <div class="col-md-2">
                            <?php 
                                if($varanda == 'S'){
                                    ?>
                                        <img src="../img/cheked.png">
                                    <?php
                                }else{
                                    ?>
                                        <img src="../img/no_cheked.png">
                                    <?php
                                }
                            ?>
                            <em>Varanda</em>
                            </div>
                        </div>
                    </div>
            </div>
            
            <div class="row" style="margin: 50px 0px 50px 0px">
                <div class="col-md-10">
                    <h6>Destaques</h6>
                    <div class="row">
                        <?php
                            foreach ($destaques as $value) {
                                ?>
                                    <div class="col-md-2">
                                        <img src="../img/cheked.png">
                                        <?php echo $value; ?>
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            
            <div class="row" id="ver_no_mapa">
                <div class="col-md-7">
                    <div class="login-top left">
                        <iframe src="<?php echo $url; ?>" width="600" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>  
                <div class="col-md-5">
                    <form role="form" method="POST" id="contato" action="imoveis-ver-mais.php">
                        <div class="form-group">
                            <input class="form-control" id="nome" name="nome" placeholder="nome completo" type="text" required/>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                            <div class="form-group">
                                <input class="form-control" id="telefone" name="ddd" placeholder="DDD" type="text" required/>
                            </div>
                            </div>
                            <div class="col-md-10">
                                <input class="form-control" id="telefone" name="telefone" placeholder="telefone" type="text" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="email" name="email" placeholder="email" type="email" required/>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="assunto" id="assunto" required readonly="true">
                                <option> <?php echo $tipo . ' #'.str_pad($codigo,5,'0',STR_PAD_LEFT) ?> </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="4" cols="50" name="mensagem" id="mensagem" required="true"> </textarea>
                        </div>
                        <input type="hidden" id="codigo" name="codigo_imovel" value="<?php echo $codigo ?>">
                        <input type="hidden" id="codigo" name="alt" value="true">
                        <div class="form-group">
                            <button class="btn btn-primary disabled" type="submit" name="submit_contato" id="submit_contato" style="width: 100%; cursor: pointer">Enviar</button>
                        </div>
                        <div class="checkbox" style="text-align: left">
                            <label>
                                <input type="checkbox" required/> Aceito receber e-mails e ligações
                            </label>
                        </div>
                        <?php
                            if($erroEmail <> "") {
                                echo $erroEmail;
                            }
                        ?>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
<?php
require_once 'footer.php';
?>

<?php
    
