<?php
if (!isset ($_REQUEST['limitInicio'])){
        if(!isset($_REQUEST['user'])){
            echo "Pagina não encontrada";
            die();
        }
        if($_REQUEST['user'] != md5("janayna")){
            echo "Pagina não encontrada";
            die();
        }
}
include 'Classe.php';
require_once 'header.php';

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="page_admin">
                <h3>Página Inicial</h3> <button class="btn btn-default" id="refresh" >Recarregar</button>
            </div>
            
        </div>
    </div> 
</div>    
<?php
require_once 'footer.php';

   