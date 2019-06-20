<?php
include 'Classe.php';
require_once '../banco/banco.php';
require_once 'header.php';

include 'ImovelAdmin.php';
$imovel = new ImovelAdmin();

$sql = "SELECT * FROM imoveis ORDER BY codigo";
if (!$query = $con->query($sql)) {
    $erro = 'ERRO AO BUSCAR INFORMAÇÕES';
}
?>

<?php
//DELETA OS REGISTROS
if (isset($_REQUEST['delete']) && (isset($_REQUEST['codigo'])) && ($_REQUEST['validacao'] == 'true')) {
    $codigo = isset($_REQUEST['codigo']) ? addslashes(trim($_REQUEST['codigo'])) : "";
    $imovel->deletaImovel($codigo);
    if (is_dir("../imoveis/imoveis_imagens/casa_" . $codigo)) {
        try {
            unlink("../imoveis\imoveis_imagens/casa_" . $codigo . "/principal.jpg");
            rmdir("../imoveis\imoveis_imagens/casa_" . $codigo);
        } catch (Exception $ex) {
            
        }
    }
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="page_admin">
                <?php
                if (isset($erro)) {
                    echo $erro;
                } else {
                    $style = array('default', 'active');
                    $x = 0;
                    ?>
                    <table  class="table table-hover table-sm">
                        <tr>
                            <!-- <td>ID</td> -->
                            <td>Codigo</td>
                            <td>Tipo</td>
                            <td>Condição</td>
                            <td>Valor</td>
                            <td>Cidade</td>
                            <td>Bairro</td>
                            <td></td>
                        </tr>
                        <?php
                        while ($row = $query->fetch_assoc()) {
                            if ($x >= 2) {
                                $x = 0;
                            }
                            ?>
                            <tr class="table-<?php echo $style[$x] ?>"> 
                                <?php
                                echo "<td>" . str_pad($row['codigo'], 5, '0', STR_PAD_LEFT) . "</td>";
                                echo "<td>" . strtolower($row['tipo']) . "</td>";
                                echo "<td>" . strtolower(utf8_encode($row['condicao'])) . "</td>";
                                echo "<td>" . $row['valor'] . "</td>";
                                echo "<td>" . strtolower(utf8_encode($row['cidade'])) . "</td>";
                                echo "<td>" . strtolower(utf8_encode($row['bairro'])) . "</td>";
                                ?> 
                                <td><a href="ver-imoveis.php?delete=true&codigo=<?php echo $row['codigo']; ?>&validacao=true"><img style="width: 20px" src="../img/delete.png" title="Deletar este"></a>
                                    <a href="ver-imoveis-detalhes.php?codigo=<?php echo $row['codigo']; ?>&validacao=true"><img style="width: 20px" src="../img/go.png" title="Ver detalhes"></a></td>
                            </tr>
                            <?php
                            $x++;
                        }
                    }
                    ?></table><?php
                    ?>
            </div>
        </div>
    </div> 
</div>    
<?php
require_once 'footer.php';

