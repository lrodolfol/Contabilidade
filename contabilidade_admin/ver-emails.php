<?php
if (!isset($_REQUEST['limitInicio'])){
    $limitInicio = 0;
}else{
    //$limitInicio = ((int) $_REQUEST['limitInicio'] + 10);
    $limitInicio += 10;
    echo "somando";
    $user = $_REQUEST['user'];
}
include 'Classe.php';
require_once 'header.php';

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="page_admin">
                <h3>E-mail recebidos</h3> <button class="btn btn-default" id="refresh" >Recarregar</button>

                <?php
                if (isset($_GET["limitInicio"])){
                }
                $classe = new Classe();
                $classe->limitInicio = $limitInicio;
                $classe->recebe_email();
                echo "<br>". "valor:" . $limitInicio;
                ?>
                
                <a href="index.php?limitInicio=<?php $limitInicio ?>"><button type="button" class="btn btn-sm btn-outline-primary">Proxima</button></a>
            </div>
            
        </div>
        
        
    </div> 
</div>    
<?php
require_once 'footer.php';

   