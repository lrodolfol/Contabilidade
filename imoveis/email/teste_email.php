<?php
/*include('Mail.php');
	include('Mail/mime.php');

	$text = 'Versao texto do emaail';
	$html = 'Versao HTML do email';
	$crlf = "\n";
	$mime = new Mail_mime($crlf);
	$mime->setTXTBody($text);
	$mime->setHTMLBody($html);
	$body = $mime->get();
	$recipients = array('rodolfoj.silva@hotmail.com');
	$headers['To'] = 'rodolfoj.silva@hotmail.com';
	//$headers['Cc'] = '<cópia>';
	//$headers['Bcc'] = '<cópia oculta>';
	$headers['From'] = 'rodolfo0ti@gmail.com';
	$headers['Subject'] = 'Teste de e-mail formulário com autenticação';
	
  $headers = $mime->headers($headers);
	$params['host'] = 'ssl://smtp.gmail.com';
	$params['port'] = '587';
	$params['auth'] = TRUE;
	$params['username'] = 'rodolfo0ti@gmail.com';
	$params['password'] = '#Sojesussalva';

	$mail_object = Mail::factory('smtp', $params);
	$rs = $mail_object->send($recipients, $headers, $body);
	if (PEAR::isError($rs)) {
		echo $rs->getMEssage()."\n";
	}
	else {
    		echo "Sucesso!";
  	}
*/

					$nome = "NOME";
					$email = "EMAIL";
					$telefone = "TELEFONE";
                                        /*
					$mensagem = "MENSAGEM";
                                        $assunto = "ASSUNTO";
					$dest = 'rodolfo0ti@gmail.com';
	
					$headers = "MIME-Version: 1.1\r\n";
					$headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
					$headers .= "$nome\r\n"; // remetente
					$headers .= "$email\r\n"; // return-path
					$headers .= "$telefone\r\n";
					$envio = mail("rodolfo0ti@gmail.com", "$assunto", "$mensagem", $headers);
                                        if(!$envio){
                                            echo "erro";
                                        }else{
                                            echo "sucesso";
                                        */
                                        
                                        $to = 'rodolfo0ti@gmail.com';
                                        $assunto = 'ASSUNTO';
                                        $mensagem = $nome . "\r\n" . $telefone . "UM TESTE SERÁ ENVIADO AQUI";
                                        $headers = 'From: rodolfoj.silva@hotmail.com' . "\r\n" .
                                                   'Reply-To: rodolfoj.silva@hotmail.com' . "\r\n" .
                                                   'X-Mailer: PHP/' . phpversion();
                                        $envio = mail($to, $assunto, $mensagem, $headers);
                                        if(!$envio){
                                            echo "erro";
                                        }else{
                                            echo "sucesso";
                                        }