<?php
/* TER FILTROS PARA BUSCAR OS IMOVEIS */

if (isset($_POST['confirm'])) {
    $where = "";
    foreach ($_POST as $opcaoRelatorio => $valor) {
        if ($opcaoRelatorio == "confirm") {
            continue;
        }
        $opcoes[] = $opcaoRelatorio;
        $valores[] = $valor;
        if (!empty($valor) > 0) {
            if ($valor == "SIM") {
                $valor = 1;
            } elseif ($valor == "NAO") {
                $valor = 0;
            } else {
                $valor = "'" . $valor . "'";
            }
            if (strlen($where) > 0) {
                $where = $where . ' and ';
            }
            $where = $where . $opcaoRelatorio . ' = ' . $valor;
            echo '<p>';
        }
    }
    /* echo $where;
      var_dump($opcoes);
      var_dump($valores);
      var_dump($_POST); */
    if (strlen($where) <= 0) {
        $sql = "SELECT * FROM imoveis WHERE disponivel = 1 ORDER BY codigo";
    } else {
        $sql = "SELECT * FROM imoveis WHERE " . $where . " and disponivel = 1 ORDER BY codigo ";
    }
} else {
    $sql = "SELECT * FROM imoveis WHERE disponivel = 1 ORDER BY codigo";
}
//echo $sql; die();
require_once '../banco/banco.php';

$query = $con->query($sql);
$rows = $query->num_rows;
?>

<main role="main">

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="filtroImovel" style="margin-top: -80px;">
                <form action="#" method="POST">
                    <div class="row">
                        <div class="col-sm-2 form-group">
                            <label><em><strong>Tipo</strong></em></label>
                            <select name="tipo" id="tipo" class="form-control" >
                                <option> </option>
                                <option> Casa </option>
                                <option> Apartamento </option>
                                <option> Terreno </option>
                                <option> Kitnet </option>
                            </select>
                        </div>
                        <div class="col-sm-2 form-group">
                            <label>Estado: </label>
                            <select name="estado" id="uf" class="form-control">
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
                            <label>Cidade</label>
                            <input type="text" placeholder="cidade" name="cidade" id="cidade" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-1 form-group">
                            <label>Suites</label>
                            <input  type="number" placeholder="0" name="totalSuites" id="totalSuites" class="form-control">
                        </div>
                        <div class="col-sm-1 form-group">
                            <label>Salas</label>
                            <input  type="number" placeholder="0" name="totalSalas" id="totalSalas" class="form-control">
                        </div>
                        <div class="col-sm-1 form-group">
                            <label>Banheiros</label>
                            <input  type="number" placeholder="0" name="totalBanheiros" id="totalBanheiros" class="form-control">
                        </div>
                        <div class="col-sm-2 form-group">
                            <label>Area Construida m²</label>
                            <input  type="number" placeholder="areaConstruida m²" name="areaConstruida" id="areaConstruida" class="form-control">
                        </div>
                        <div class="col-sm-1 form-group">
                            <label>Andares</label>
                            <input  type="number" placeholder="totalAndares" name="totalAndares" id="totalAndares" class="form-control">
                        </div>
                        <div class="col-sm-1 form-group">
                            <label>Varanda</label>
                            <select  name="varanda" id="varanda" class="form-control">
                                <option> </option>
                                <option> SIM </option>
                                <option> NÃO </option>
                            </select>
                        </div>
                        <div class="col-sm-1 form-group">
                            <label>Garagem</label>
                            <input  type="number" placeholder="total_carros_garagem" name="total_carros_garagem" id="total_carros_garagem" class="form-control">
                        </div>
                    </div>
                    <input  type="hidden" name="confirm" id="confirm" value="rodolfoyes">
                    <button class="btn btn-success btn-sm">Pesquisar</button>
                </form>
            </div> 
            <div class="row">
                <?php
                while ($row = $query->fetch_assoc()) {
                    $pastaCasa = "imoveis_imagens/casa_" . $row['codigo'] . "/principal.jpg";
                    ?>  
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="<?php echo $pastaCasa; ?>" class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"><strong><?php echo strtolower($row['tipo']) . ' - ' . strtolower($row['condicao']) . ' R$ ' . number_format($row['valor'], 2); ?></strong></text></img>
                            <div class="card-body">
                                <p class="card-text">Cidade: <?php echo $row['cidade'] . "/" . $row['estado']; ?>.</p>
                                <p class="card-text">Bairro: <?php echo strtolower( substr($row['rua'], 0, 17) . " - " . substr($row['bairro'], 0, 13) ); ?>.</p>
                                <p class="card-text"><em><?php echo '""' . substr($row['descricao'], 0, 60) . '... ""'; ?></em></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="imoveis-ver-mais.php?alt=true&codigo_imovel=<?php echo $row['codigo']; ?>" > <button type="button" class="btn btn-sm btn-outline-secondary">Ver mais</button> </a>
                                    </div>
                                    <small class="text-muted">9 mins</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <?php
                if ($rows <= 0) {
                    ?>
                        <p style="color: red; margin: 20px 0px 0px 0px"> <?php echo "Nenhum de nossos imoveis está disponivel para negociação. Volte outro dia"; ?> </p> 
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

</main>