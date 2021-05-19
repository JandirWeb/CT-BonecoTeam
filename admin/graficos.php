<?php
//BUSCANDO A CLASSE
require_once "../classes/Funcionario.class.php";
require_once "../classes/Fatura.class.php";
require_once "../classes/Aluno.class.php";
require_once "../classes/Funcoes.class.php";
//ESTANCIANDO A CLASSE
$objFatura = new Fatura();
$objAluno = new Aluno();
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
//ALTERANDO OS DADOS DO ALUNO
if(isset($_POST['btAlterar'])){
	if($objAluno->queryUpdadeAlu($_POST) == 'ok'){
		header('location: ?acao=edit&func='.$_GET['func']);
	}else{
		echo '<script type="text/javascript">alert("Erro em atualizar");</script>';
	}
}
//SELECIONADO O ALUNO
if(isset($_GET['acao'])){
	switch($_GET['acao']){
		case 'edit': $func = $objAluno->querySelecionaAlu($_GET['func']); break;
		case 'delet': 
			if($objAluno->queryDeleteAlu($_GET['func']) == 'ok'){
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
        <li class="breadcrumb-item active">Gráficos</li>
      </ol>
        
      <!-- Grafico Matrículas Diárias-->
      <?php include "widgets/matriculas-diarias.php"; ?>
        
        
      <div class="row">
        <div class="col-lg-8">
          <!-- Aniversariantes do mês-->
            <?php include "widgets/relativo-mensal.php"; ?>
            
        </div>
        <div class="col-lg-4">
            <?php include "widgets/relativo-alunos.php" ?>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include "footer.php"; ?>