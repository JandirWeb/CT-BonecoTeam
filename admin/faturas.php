<?php
//BUSCANDO A CLASSE
require_once "../classes/Funcionario.class.php";
require_once "../classes/Fatura.class.php";
require_once "../classes/Funcoes.class.php";
//ESTANCIANDO A CLASSE
$objFatura = new Fatura();
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
//Gera Faturas do mês
if(isset($_GET['acao'])){
	switch($_GET['acao']){
		case 'gerar':  
			if($objFatura->queryGerarFt() != 'Error'){
				#header('location: faturas.php');
                echo '<script type="text/javascript">alert("Faturas geradas com sucesso!");</script>';
                header('location: faturas.php');
			}else{
				echo '<script type="text/javascript">alert("Erro ao Gerar as Faturas!");</script>';
			}
				break;
            
	}
}
//ALTERANDO OS DADOS Da Fatura
if(isset($_POST['btAlterar'])){
	if($objFatura->queryUpdadeAlu($_POST) == 'ok'){
		header('location: ?acao=edit&func='.$_GET['func']);
	}else{
		echo '<script type="text/javascript">alert("Erro em atualizar");</script>';
	}
}
//SELECIONADO A FATURA
if(isset($_GET['acao'])){
	switch($_GET['acao']){
		case 'edit': $func = $objFatura->querySelecionaAlu($_GET['func']); break;
		case 'delet': 
			if($objFatura->queryDeleteAlu($_GET['func']) == 'ok'){
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
        <li class="breadcrumb-item active">Faturas</li>
      </ol>
        <div class="col-md-4 offset-md-8">
            <?php 
                $ultimaFt = 0;
                foreach($objFatura->querySelectFt() as $rst){ 
                    $mes = $rst['mes']; 
                    $aux = 0;
                    if($mes > $aux){ 
                        $aux2 = $mes;
                        if($mes >= $aux2){
                            $ultimaFt = $mes;
                        }
                    }
                } 
            ?>            
            <a style="color: #343a40; font-weight: bolder; <?php $mesAtual = date("Y/m"); $mesFt = date("Y/m", strtotime($ultimaFt)); if($mesAtual > $mesFt){ echo "display:block;";}else{echo "display:none;";} ?>" class="btn btn-warning btn-block" href="?acao=gerar">Gerar Faturas do Mês</a>
        </div>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabela de Registros de Faturas</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Status</th>
                  <th>Nome</th>
                  <th>Mês</th>
                  <th>Vencimento</th>
                  <th>Valor</th>
                  <th> </th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Status</th>
                  <th>Nome</th>
                  <th>Mês</th>
                  <th>Vencimento</th>
                  <th>Valor</th>
                  <th> </th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach($objFatura->querySelectFt() as $rst){ 
                  $mes = $rst['mes'];
                  $status = $rst['status_ft'];
                  ?>
                  
                <tr>
                  <td><?php if($status == "aberto"){ echo "<button class=\"btn btn-danger btn-block\"> Aberto </button>"; }else{ echo "<button class=\"btn btn-success btn-block\"> Pago </button>"; }?></td>
                  <td><?=$objFc->tratarCaracter($rst['nome_ft'], 2)?></td>
                  <td><?php echo date('F', strtotime($mes)); ?></td>
                  <td>Dia <?=$objFc->tratarCaracter($rst['venc_ft'], 2)?></td>
                  <td>R$<?=$objFc->tratarCaracter($rst['valor_ft'], 2)?>,00</td>
                  <td><a href="ver-fatura.php?acao=edit&func=<?=$objFc->base64($rst['id'], 1)?>" class="btn btn-primary btn-block"> Ver </a>
                  </td>
                </tr>
                <?php } ?>
                  
              </tbody>
            </table>          
              
          </div>
        </div>
        <!--<div class="card-footer small text-muted">Atualizado hoje 11:59 PM</div>-->
      </div>
    </div>
            
      
      
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->      
    <?php include "footer.php"; ?>