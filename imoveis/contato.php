<?php
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
}
?>

<?php
require_once 'header.php';
?>


<div class="album py-5 bg-light">
    <div class="container">
    </div>
</div>

<body>
    <div class="contato" id="contato">
        <div class="container"> 
            <div class="msg_contato">
            <?php
                $loop = 0;
                //VERIFICA SE HOUVE ALGUM ERRO NA CLASSE DE E-MAIL.
                if(isset ($email->erro) && $email->erro != null){
                    ?><label style="color: red"><b><?php echo "$email->erro" . "<br>" . "Mande um email para: 'janateccontabil@hotmail.com' "; ?></b></label> <?php
                }
                if(isset ($email->success) && /*$email->erro == false && */ $email->success != null){
                    ?><label style="color: blue"><b><?php echo "$email->success"; ?></b></label> <?php
                }
            
           ?>
            </div>
        <h3>Contato</h3>
        <div class="row">
        <div class="col-md-5">
            <form role="form" method="POST" id="contato" action="">
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
                    <select class="form-control" name="assunto" id="assunto" required>
                        <option value=""> Assunto</option>
                        <option> Orçamento </option>
                        <option> Elogios </option>
                        <option> Sugestões </option>
                        <option> Duvidas </option>
                        <option> Reclamações </option>
                        <option> Outro </option>
                    </select>
		</div>
                <div class="form-group">
                    <textarea class="form-control" rows="4" cols="50" name="mensagem" id="mensagem" required="true"> </textarea>
		</div>
		<div class="form-group">
                    <button class="btn btn-primary disabled" type="submit" name="submit_contato" id="submit_contato" style="width: 100%; cursor: pointer">Enviar</button>
                </div>
                <div class="checkbox" style="text-align: left">
                    <label>
			<input type="checkbox" required/> Aceito receber e-mails e ligações
                    </label>
		</div>
            </form>
	</div>
        
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-6">
                    <address>
                        <h2>J&J Contabilidade</h2>
                        <strong>E Admin de Imoveis</strong><br>Rua dos Andradas, Nº 386, Sala 101.<br> Centro, São Lourenço/MG<br>CEP: 37470-000<br> <abbr title="Phone">CEL (35) 9 8895-9321</abbr> 
                    </address>
                </div>
                <!-- <div class="col-md-6">
                    <address>
                        <h2>J&J Emprestimo</h2>
                        <strong>Emprestimo Consignado</strong><br>Rua dos Andradas, Nº 386, Sala 101.<br> Centro, São Lourenço/MG<br>CEP: 37470-000<br> <abbr title="Phone">CEL (35) 9 8435-6381</abbr> 
                    </address>
                </div> -->
                
            </div>
            
            <div class="row">
                <div class="login-top left">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3696.1826966826634!2d-45.0548617!3d-22.1190089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cb4b92355dbf2f%3A0xe6edf6e446657db3!2sR.+dos+Andradas%2C+386+-+Sao+Lourenco%2C+S%C3%A3o+Louren%C3%A7o+-+MG%2C+37470-000!5e0!3m2!1spt-BR!2sbr!4v1525962230244" width="600" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            
            </div>
        </div>
            
            
        </div>
        </div>

</body>
    
<div class="album py-5 bg-light">
    <div class="container">
    </div>
</div>

<?php
require_once 'footer.php';
?>
    
