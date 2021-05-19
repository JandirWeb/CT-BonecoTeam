<?php
//BUSCANDO AS CLASSES
require_once 'classes/Funcionario.class.php';
//ESTANCIANDO A CLASSES
$objFunc = new Funcionario();
//FAZENDO O LOGIN
if(isset($_POST['btLogar'])){
	$objFunc->logaFuncionario($_POST);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login Administração CT Boneco TEAM</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
      <div style="text-align:center;" class="mt-5">
          <img src="images/LOGO_CT_BONECO-01.png"/>
      </div>
    <div class="card card-login mx-auto">
      <div class="card-header" style="text-align:center;">PAINEL ADMINISTRATIVO CT BONECO TEAM</div>
      <div class="card-body">
        
			<form action="" method="post">
        	<div class="form-group">
            	<div class="input-group">
                	<span class="input-group-addon"><span class="fa fa-user"></span></span>
                	<input type="text" name="usuario" class="form-control" placeholder="Usuário" required="required">
              	</div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-lock"></span></span>
                    <input type="password" name="senha" class="form-control" placeholder="Senha">
                </div> 
            </div>
            <div class="form-group">
            	<button type="submit" name="btLogar" class="btn btn-primary btn-block">Logar</button> 
            </div>
        </form>
        <?php if(isset($_GET["login"]) == "error"){ ?>
        <div class="alert alert-danger alert-block alert-aling" role="alert">Ops! E-mail ou Senha estão errado</div>
        <?php } ?>

          
        <!--<div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>-->
          
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
