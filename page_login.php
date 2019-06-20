<?php
    include 'banco/Admin.php';
    
    $admin = new Admin();
    if(isset ($_POST['logar']) && $_REQUEST['login'] == true){
        $name_admin = $_POST['nome'];
        $pass_admin = $_POST['senha']; 
        
        $admin->setNome($name_admin);
        $admin->setSenha($pass_admin);
        $admin->validar();
    }
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Contabilidade">
    <meta name="author" content="Rodolfo JSilva - rodolfo0ti@gmail.com">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">
  </head>

  <body class="text-center">
      <form class="form-signin" method="POST" action="?login=true">
      <img class="mb-4" src="img/caduceu.jpg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Contabilidade</h1>
      
      <label class="sr-only">Email</label>
      <input type="text" id="inputEmail" class="form-control" placeholder="Nome" name="nome" required autofocus><br>
      
      <label class="sr-only">Senha</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="senha" required>
      
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="logar">Sign in</button>
      
      <?php if($admin->msg_erro != null){
            echo "<br>" . $admin->msg_erro;
            } 
      ?>
      <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
    </form>
  </body>
</html>
