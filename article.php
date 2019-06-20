<div class="caduceu">
    <div class="container">
        <div class="row">
                <div class="col-md-7">
                    <h3>Caduceu</h3><br>
                    <div class="texto_caduceus">
                        <p class="text-left text-muted">
                        <?php //PEGA OS ARQUIVOS PARA TEXTO
                        define("diretorio", "textos/caduceu1.txt"); //RECUPERA O DIRETORIO DO ARQUIVO
                        if(is_file(diretorio)){            
                        $arquivo = fopen(diretorio, "r");    //FAZ A ABERTURA DO ARQUIVO
                        $tamanho = filesize(diretorio);    //RECUPERA O TAMANHO DO ARQUIVO EM QUESTÃO
                        $caduceu1 = fread($arquivo, $tamanho);  //ATRIBUI O ARQUIVO A UMA VARIAVEL
                        echo utf8_encode($caduceu1);            //MOSTRA O ARQUIVO
                        fclose($arquivo);                      //FECHA O ARQUIVO EM QUESTÃO
                        } else {
                        }
                        ?>
                        </p>
                        <p class="text-left text-muted">
                        <?php //PEGA OS ARQUIVOS PARA TEXTO
                        define("diretorio2", "textos/caduceu_bastao.txt"); //RECUPERA O DIRETORIO DO ARQUIVO
                        if(is_file(diretorio2)){            
                        $arquivo = fopen(diretorio2, "r");    //FAZ A ABERTURA DO ARQUIVO
                        $tamanho = filesize(diretorio2);    //RECUPERA O TAMANHO DO ARQUIVO EM QUESTÃO
                        $caduceu1 = fread($arquivo, $tamanho);  //ATRIBUI O ARQUIVO A UMA VARIAVEL
                        echo utf8_encode($caduceu1);            //MOSTRA O ARQUIVO
                        fclose($arquivo);                      //FECHA O ARQUIVO EM QUESTÃO
                        } else {
                        } 
                        ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="img_caduceus">
                    <img src="img/caduceu_imagem.png">
                    </div>
                </div>
        </div>
                
            
        <div class="row">
            <div class="col-md-12">
                <p class="text-left text-muted">
                <?php //PEGA OS ARQUIVOS PARA TEXTO
                    define("diretorio3", "textos/caduceu_serpente_asas_elmo.txt"); //RECUPERA O DIRETORIO DO ARQUIVO
                    if(is_file(diretorio3)){            
                    $arquivo = fopen(diretorio3, "r");    //FAZ A ABERTURA DO ARQUIVO
                    $tamanho = filesize(diretorio3);    //RECUPERA O TAMANHO DO ARQUIVO EM QUESTÃO
                    $caduceu1 = fread($arquivo, $tamanho);  //ATRIBUI O ARQUIVO A UMA VARIAVEL
                    echo utf8_encode($caduceu1);            //MOSTRA O ARQUIVO
                    fclose($arquivo);                      //FECHA O ARQUIVO EM QUESTÃO
                    } else {
                    } 
                    ?>
                </p>
            </div>
        </div>
                
                
        
        <div class="clear">
           <br><br><br><br><br><br><br>
        </div>
        
        
        <div class="row">
            <div class="col-md-5">
                <div class="img_caduceus">
                    <img src="img/imagem_colibri.png">
                </div>
            </div>
            
            <div class="col-md-7">
                    <h3>Colibri</h3><br>
                <div class="texto_caduceus">
                    <p class="text-left text-muted">
                    <?php //PEGA OS ARQUIVOS PARA TEXTO
                    define("diretorio4", "textos/colibri1.txt"); //RECUPERA O DIRETORIO DO ARQUIVO
                    if(is_file(diretorio4)){            
                    $arquivo = fopen(diretorio4, "r");    //FAZ A ABERTURA DO ARQUIVO
                    $tamanho = filesize(diretorio4);    //RECUPERA O TAMANHO DO ARQUIVO EM QUESTÃO
                    $caduceu1 = fread($arquivo, $tamanho);  //ATRIBUI O ARQUIVO A UMA VARIAVEL
                    echo utf8_encode($caduceu1);            //MOSTRA O ARQUIVO
                    fclose($arquivo);                      //FECHA O ARQUIVO EM QUESTÃO
                    } else {
                    } 
                    ?>    
                    </p>
                    <p class="text-left text-muted">
                    <?php //PEGA OS ARQUIVOS PARA TEXTO
                    define("diretorio5", "textos/colibri2.txt"); //RECUPERA O DIRETORIO DO ARQUIVO
                    if(is_file(diretorio5)){            
                    $arquivo = fopen(diretorio5, "r");    //FAZ A ABERTURA DO ARQUIVO
                    $tamanho = filesize(diretorio5);    //RECUPERA O TAMANHO DO ARQUIVO EM QUESTÃO
                    $caduceu1 = fread($arquivo, $tamanho);  //ATRIBUI O ARQUIVO A UMA VARIAVEL
                    echo utf8_encode($caduceu1);            //MOSTRA O ARQUIVO
                    fclose($arquivo);                      //FECHA O ARQUIVO EM QUESTÃO
                    } else {
                    } 
                    ?>     
                    </p>
                </div>
            </div>
        </div> 
        
        <div class="clear">
           <br><br><br><br><br><br><br>
        </div>
        
       
  </div>
</div>