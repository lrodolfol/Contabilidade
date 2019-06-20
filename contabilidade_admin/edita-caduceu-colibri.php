<?php
if (!isset($_REQUEST['edita']) && !isset($_REQUEST['texto'])) {
    echo 'Página não encontrada';
    die();
} else {
    if ($_REQUEST['edita'] <> 'true' || ($_REQUEST['texto'] <> 'caduceu' && $_REQUEST['texto'] <> 'colibri')) {
        echo 'Página não encontrada';
        die();
    }
}
if ($_REQUEST['texto'] == "caduceu") {
    $texto = "../textos/caduceu1.txt";
    $texto2 = "../textos/caduceu_bastao.txt";
} elseif ($_REQUEST['texto'] == "colibri") {
    $texto = "../textos/colibri1.txt";
}
?>

<?php
include_once 'header.php';
?>
<div class="container">
    <p class="text-left text-muted">
        <?php
        //PEGA OS ARQUIVOS PARA TEXTO
        define("diretorio", $texto); //RECUPERA O DIRETORIO DO ARQUIVO
        if (is_file(diretorio)) {
            $arquivo = fopen(diretorio, "r");    //FAZ A ABERTURA DO ARQUIVO
            $tamanho = filesize(diretorio);    //RECUPERA O TAMANHO DO ARQUIVO EM QUESTÃO
            $caduceu1 = fread($arquivo, $tamanho);  //ATRIBUI O ARQUIVO A UMA VARIAVEL
            echo utf8_encode($caduceu1);            //MOSTRA O ARQUIVO
            ?> 
            <?php
            fclose($arquivo);                      //FECHA O ARQUIVO EM QUESTÃO
            ?>

        <p class="text-left text-muted">
            <?php
            //PEGA OS ARQUIVOS PARA TEXTO
            define("diretorio2", $texto2); //RECUPERA O DIRETORIO DO ARQUIVO
            if (is_file(diretorio2)) {
                $arquivo = fopen(diretorio2, "r");    //FAZ A ABERTURA DO ARQUIVO
                $tamanho = filesize(diretorio2);    //RECUPERA O TAMANHO DO ARQUIVO EM QUESTÃO
                $caduceu1 = fread($arquivo, $tamanho);  //ATRIBUI O ARQUIVO A UMA VARIAVEL
                echo utf8_encode($caduceu1);            //MOSTRA O ARQUIVO
                fclose($arquivo);                      //FECHA O ARQUIVO EM QUESTÃO
            } else {
                
            }
            ?>
        </p>
    </p>
    <form action="#" method="POST">
        <div class="form-group shadow-textarea">
            <label for="exampleFormControlTextarea6">Novo texto</label>
            <textarea class="form-control z-depth-1" id="exampleFormControlTextarea6" rows="3" placeholder="novo texto" required="true"></textarea>
        </div>

        <button class="btn btn-primary btn-sm">Salvar</button>
    </form>
    <?php
} else {
    echo 'arquivo não existe';
}
?>
</div>




<?php
include_once 'footer.php';
?>

