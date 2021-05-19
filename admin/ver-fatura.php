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
//ALTERANDO OS DADOS DA FATURA
if(isset($_POST['btPagar'])){
	if($objFatura->queryUpdadeFt($_POST) == 'ok'){
		header('location: ?acao=edit&func='.$_GET['func']);
	}else{
		echo '<script type="text/javascript">alert("Erro em atualizar");</script>';
	}
}   
//SELECIONADO A FATURA
if(isset($_GET['acao'])){
	switch($_GET['acao']){
		case 'edit': $func = $objFatura->querySelecionaFT($_GET['func']); break;
		case 'delet': 
			if($objFatura->queryDeleteFt($_GET['func']) == 'ok'){
				header('location: faturas.php');
			}else{
				echo '<script type="text/javascript">alert("Erro em deletar");</script>';
			}
				break;
	}
}
?>



<?php include "header.php"; ?>

<?php if(!isset($_GET['acao']) <> 'edit'){ ?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="faturas.php">Faturas</a>
        </li>
        <li class="breadcrumb-item active">Detalhes da Fatura nº 00<?=$objFc->tratarCaracter((isset($func['id']))?($func['id']):(''), 2)?> de <?=$objFc->tratarCaracter((isset($func['nome_ft']))?($func['nome_ft']):(''), 2)?></li>
      </ol>
        
           <!-- Início do conteúdo -->       
        <div class="card-body">
            <form>                      
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-5">
                            <div class="form-row">
                                <div class="col-md-8 mb-5" style="margin-top:-10px;">
                                    <?php
                                        if($func['status_ft'] == "aberto"){
                                            echo "<a class=\"btn btn-warning btn-block\" style=\"color: #343a40; font-weight: bolder;\" data-toggle=\"modal\" data-target=\"#pagaFatura\" title=\"Pagar Fatura\">Pagar</a>";
                                        }
                                    ?>
                                    <a class="btn btn-danger btn-block" style="color:#FFF;" data-toggle="modal" data-target="#excluiFatura" title="Excluir esse dado">Excluir</a>
                                </div>
                                
                            </div>
                            
                            <label for="exampleInputName"><strong>Nome Completo</strong></label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" value="<?=$objFc->tratarCaracter((isset($func['nome_ft']))?($func['nome_ft']):(''), 2)?>" disabled>
                            
                            <label for="exampleInputName" class="mt-4"><strong>Modalidade</strong></label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" value="<?=$objFc->tratarCaracter((isset($func['referente']))?($func['referente']):(''), 2)?>" disabled>
                            
                    
                            <label for="exampleInputName" class="mt-4"><strong>Status</strong></label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" value="<?=$objFc->tratarCaracter((isset($func['status_ft']))?($func['status_ft']):(''), 2)?>" disabled> <br> 
                            
                              
                            <label for="valorMensal"><strong>Valor da Mensalidade</strong></label>
                                <div class="input-group col-md-6 ">
                                    <span class="input-group-addon">R$</span>
                                    <input type="text" class="form-control" name="valor" aria-label="Valor da mensalidade" value="<?=$objFc->tratarCaracter((isset($func['valor_ft']))?($func['valor_ft']):(''), 2)?>" disabled>
                                    <span class="input-group-addon">,00</span>
                                </div>
                        </div>
                  
                        <div id="foto" class="col-md-5 offset-md-2">
                            <label for="idFatura">
                                <div class="input-group pt-2">
                                    <span class="input-group-addon">nº</span>
                                    <input type="text" class="form-control" name="valor" aria-label="Valor da mensalidade" value="00<?=$objFc->tratarCaracter((isset($func['id']))?($func['id']):(''), 2)?>" disabled>
                                </div>
                            </label>
                            <br><br>
                            <label for="exampleInputName"><strong>Mês Referente</strong></label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" value="<?php 
                                                                                                $mes = $func['mes'];
                                                                                                
                                                                                                echo date('F', strtotime($mes)); ?>" disabled>
                            <label for="exampleInputName" class="mt-4"><strong>Vencimento</strong></label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" value="Dia <?=$objFc->tratarCaracter((isset($func['venc_ft']))?($func['venc_ft']):(''), 2)?>" disabled>
                        </div>
                    </div>
                </div>
            </form>
                      
        </div> 
      
                              <!-- Fim do conteúdo principal--> 
                              
        
        
        <!-- Modal de Pagamento-->
        <?php include "modals/modal-paga-fatura.php"; ?>
        <!-- FIM do MODAL de Pagamento -->
        
        <!-- Modal de Exculsão de Fatura-->
        <?php include "modals/modal-exclusao-fatura.php"; ?>
        <!-- FIM do MODAL de Exclusão de Fatura --> 
      
        
     
     </div> 
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
      
      
    <?php include "footer.php"; ?>
      
<?php } ?>