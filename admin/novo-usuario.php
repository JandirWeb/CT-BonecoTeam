<?php
//BUSCANDO A CLASSE
require_once "../classes/Funcionario.class.php";
require_once "../classes/Funcoes.class.php";
//ESTANCIANDO A CLASSE
$objFunc = new Funcionario();
$objFc = new Funcoes();
//VALIDANDO USUARIO
session_start();
if($_SESSION["logado"] == "sim"){
	$objFunc->funcionarioLogado($_SESSION['func']);
}else{
	header("location: ../index.php"); 
}
if(isset($_GET['sair']) == "sim"){
	$objFunc->sairFuncionario();
}
//CADASTRANDO O FUNCIONARIO
if(isset($_POST['btCadastrar'])){
	if($objFunc->queryInsert($_POST) == 'ok'){
		header('location: novo-usuario.php');
	}else{
		echo '<script type="text/javascript">alert("Erro em cadastrar");</script>';
	}
}
//ALTERANDO OS DADOS DO FUNCIONARIO
if(isset($_POST['btAlterar'])){
	if($objFunc->queryUpdade($_POST) == 'ok'){
		header('location: ?acao=edit&func='.$_GET['func']);
	}else{
		echo '<script type="text/javascript">alert("Erro em atualizar");</script>';
	}
}
//SELECIONADO O FUNCIONARIO
if(isset($_GET['acao'])){
	switch($_GET['acao']){
		case 'edit': $func = $objFunc->querySeleciona($_GET['func']); break;
		case 'delet': 
			if($objFunc->queryDelete($_GET['func']) == 'ok'){
				header('location: usuarios.php');
			}else{
				echo '<script type="text/javascript">alert("Erro em deletar");</script>';
			}
				break;
	}
}
?>


<?php include "header.php"; ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Novo Usuário</li>
      </ol>
      <!-- Conteúdo aqui -->
      <div>
        
        <form name="formCad" action="" method="post">
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-6">
                        <input class="form-control mt-4" name="usuario" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Usuário...">
                  
                        <input class="form-control mt-4" name="email" id="exampleInputName" type="mail" aria-describedby="nameHelp" placeholder="E-mail...">
                    
                    </div>
                    <div class="col-md-6">
                        <input class="form-control mt-4" name="senha" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Senha...">
                  
                        <input class="form-control mt-4" name="nome" id="exampleInputName" type="mail" aria-describedby="nameHelp" placeholder="Nome Completo...">  
                    </div>
                </div>
            </div>
            
            <button type="submit" name="btCadastrar" class="btn btn-primary btn-block">Cadastrar</button>        
            <!--<input type="hidden" name="func" value="<?#=(isset($func['id']))?($objFc->base64($func['id'], 1)):('')?>">-->
        </form>  

      </div>
        
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <script>
        
    </script>
    <?php include "footer.php"; ?>