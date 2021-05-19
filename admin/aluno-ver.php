<?php
//BUSCANDO A CLASSE
require_once "../classes/Funcionario.class.php";
require_once "../classes/Aluno.class.php";
require_once "../classes/Funcoes.class.php";
//ESTANCIANDO A CLASSE
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
//ALTERANDO A FOTO DO ALUNO
if(isset($_POST['btAlterarFt'])){
	if($objAluno->queryUpdadeImg($_POST) == 'ok'){
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
				header('location: alunos.php');
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
          <a href="alunos.php">Todos os Alunos</a>
        </li>
        <li class="breadcrumb-item active">Detalhes de <?=$objFc->tratarCaracter((isset($func['nome']))?($func['nome']):(''), 2)?></li>
      </ol>
        
           <!-- Início do conteúdo -->       
        <div class="card-body">
            <form>                      
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="col-md-4 mb-5" style="margin-top:-10px;">
                                <a class="btn btn-danger btn-block" style="color:#FFF;" data-toggle="modal" data-target="#excluiAluno" title="Excluir esse dado">Excluir</a>
                            </div>
                            
                            <label for="exampleInputName">Nome Completo</label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" value="<?=$objFc->tratarCaracter((isset($func['nome']))?($func['nome']):(''), 2)?>" disabled>
                    
                            <label for="exampleInputName" class="mt-4">E-mail</label>
                            <input class="form-control" id="exampleInputName" type="mail" aria-describedby="nameHelp" value="<?=$objFc->tratarCaracter((isset($func['mail']))?($func['mail']):(''), 2)?>" disabled>
                            
                            <label for="exampleInputName" class="mt-4">Telefone</label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" value="<?=$objFc->tratarCaracter((isset($func['fone']))?($func['fone']):(''), 2)?>" disabled>    
                        </div>
                  
                        <div id="foto" class="col-md-5 ml-5 mt-5">
                            <label class="foto" for="exampleInputLastName"><a data-toggle="modal" data-target="#alteraFoto" title="Alterar Foto"><img src="<?php 
                                                                            if((!isset($func['thumb'])) || ($func['thumb'] == "") ){
                                                                                echo "images/s-foto.png";
                                                                            }else{
                                                                                echo "../uploads/" . $func['thumb'];
                                                                            }
                                                                        ?>" class="img-thumbnail"></a></label>
                        </div>
                    </div>
                </div>
                        
                <div class="form-group">
                    <label for="exampleInputEmail1">Endereço</label>
                    <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" value="<?=$objFc->tratarCaracter((isset($func['end']))?($func['end']):(''), 2)?>" disabled>    
                </div>
              
                                        
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="exampleInputPassword1">RG</label>
                            <input class="form-control" id="exampleInputPassword1" type="text" value="<?=$objFc->tratarCaracter((isset($func['rg']))?($func['rg']):(''), 2)?>" disabled>
                        </div>
                                            
                        <div class="col-md-6">
                                                      
                            <label for="exampleConfirmPassword">Data de Nascimento</label>
                            
                            <input class="form-control" id="exampleConfirmPassword" type="date" value="<?=$objFc->tratarCaracter((isset($func['data_nasc']))?($func['data_nasc']):(''), 2)?>" disabled>
                            
                        </div>
                        
                    </div>
                    
                </div>
                                  
                <div class="form-group">  
                    <div class="form-row">
                        <div class="col-md-8">
                            <label for="exampleInputPassword1"><strong>Modalidade</strong></label><br/>
                            <label class="radio-inline col-md-4"><input class="form-control" id="exampleConfirmPassword" type="text" value="<?php 
                                                                                                    $bjj = $func['bjj'];
                                                                                                    $muayThai = $func['muay_thai'];
                                           
                                                                                                    if($bjj == "sim"){
                                                                                                        echo " Jiu-Jitsu ";
                                                                                                    }
                                                                                                    if(($bjj == "sim") && ($muayThai =="sim")){
                                                                                                        echo " - ";
                                                                                                    }
                                                                                                    if($muayThai == "sim"){
                                                                                                        echo " Muay Thai ";
                                                                                                    }
                                                                                                ?>" disabled></label> 
                                                  
                        </div>
                  
                        
                        <div class="col-md-4">
                            <label for="exampleConfirmPassword"><strong>Data de Pagamento</strong></label><br/>
                            <input class="form-control" id="exampleConfirmPassword" type="text" value="<?=$objFc->tratarCaracter((isset($func['data_venc']))?($func['data_venc']):(''), 2)?>" disabled>
                        </div>
                    </div>
                              
                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="exampleInputPassword1"><strong>Horário</strong></label><br>
                            <label><input class="form-control" id="exampleConfirmPassword" type="text" value="<?=$objFc->tratarCaracter((isset($func['horario']))?($func['horario']):(''), 2)?>" disabled></label>
                        </div>
                        
                        <div class="col-md-2">
                            <label for="valorMensal"><strong>Valor do Muay Thai</strong>
                                <div class="input-group pt-2">
                                    <span class="input-group-addon">R$</span>
                                    <input type="text" class="form-control" name="valorMT" aria-label="Valor da mensalidade" value="<?=$objFc->tratarCaracter((isset($func['valor_MT']))?($func['valor_MT']):(''), 2)?>" disabled>
                                    <span class="input-group-addon">,00</span>
                                </div>
                            </label>    
                        </div>
                        
                        <div class="col-md-2 offset-md-1">
                            <label for="valorMensal"><strong>Valor do Jiu-Jitsu</strong>
                                <div class="input-group pt-2">
                                    <span class="input-group-addon">R$</span>
                                    <input type="text" class="form-control" name="valorBjj" aria-label="Valor da mensalidade" value="<?=$objFc->tratarCaracter((isset($func['valor_Bjj']))?($func['valor_Bjj']):(''), 2)?>" disabled>
                                    <span class="input-group-addon">,00</span>
                                </div>
                            </label>    
                        </div>
                        
                        <div class="col-md-2 offset-md-1">
                            <label for="escolheStatus"><strong>Status</strong></label><br>
                            <label><input class="form-control form-danger" type="text" value="<?=$objFc->tratarCaracter((isset($func['status']))?($func['status']):(''), 2)?>" disabled></label>
                        </div>
                    </div>
                </div>
    
                <a style="color:#FFF;" class="btn btn-primary btn-block" data-toggle="modal" data-target="#editaAluno">Editar</a>
                
            </form>
                      
        </div> 
      
                              <!-- Fim do conteúdo principal--> 
                              
        
        
        <!-- Modal de edição-->
        <?php include "modals/modal-edicao-aluno.php"; ?>
              
        <!-- FIM do MODAL de edição --> 
      
        
        
        <!-- Modal de Exclusão-->
    
        <?php include "modals/modal-exclusao-aluno.php"; ?>      
        <!-- FIM do MODAL de exclusão-->
        
        
        <!-- Modal para alterar Imagem-->
    
        <?php include "modals/modal-editImg-aluno.php"; ?>          
        <!-- FIM do MODAL Alterar Imagem-->
        
     
     </div> 
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
      
      
    <?php include "footer.php"; ?>
      
<?php } ?>