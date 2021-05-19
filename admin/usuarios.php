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
        <li class="breadcrumb-item active">Usuários</li>
      </ol>
      
        
        <!-- Conteúdo aqui -->
        <div>
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Usuários Cadastrados</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Nível de Acesso</th>
                                    <th> </th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>Nível de Acesso</th>
                                    <th> </th>
                                    <th> </th>
                                </tr>
                            </tfoot>
                            <tbody>
                                
                                <?php foreach($objFunc->querySelect() as $rst){ ?>
                
                                <tr>
                                    <td><?=$objFc->tratarCaracter($rst['nome'], 2)?></td>
                  
                                    <td><?=$objFc->tratarCaracter($rst['email'], 2)?></td>
                  
                                    <td><?=$objFc->tratarCaracter($rst['nivel'], 2)?></td>
                  
                                    <td><a href="?acao=edit&func=<?=$objFc->base64($rst['id'], 1)?>" title="Editar dados"><img src="../images/ico-editar.png" width="16" height="16" alt="Editar"></a></td>
                  
                                    <td><a data-toggle="modal" data-target="#excluiUser" title="Excluir esse dado"><img src="../images/ico-excluir.png" width="16" height="16" alt="Excluir"></a></td>
                                </tr>
                                
                                <?php } ?>
                                
                            </tbody>
                        </table>
                    </div>
            
                    <?php if(!isset($_GET['acao']) <> 'edit'){ ?>
            
                    <br/>
                    <hr>
                    <hr>
            
                    <div class="card-header">
                        <i class="fa fa-pencil"></i> Editar <?=$objFc->tratarCaracter((isset($func['nome']))?($func['nome']):(''), 2)?>
                    </div>    
                    
                    <form name="formCad" action="" method="post">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label class="mt-4">Usuário:
                                        <input class="form-control" name="usuario" value="<?=$objFc->tratarCaracter((isset($func['usuario']))?($func['usuario']):(''), 2)?>" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Usuário...">             
                                    </label>
          
                                    <label class="mt-4">E-mail:
                                        <input class="form-control" name="email" value="<?=$objFc->tratarCaracter((isset($func['email']))?($func['email']):(''), 2)?>" id="exampleInputName" type="mail" aria-describedby="nameHelp" placeholder="E-mail...">
                                    </label>
                            
                                    <label class="col-md-8 mt-4 ml-1">Nome Completo:
                                        <input class="form-control" name="nome" value="<?=$objFc->tratarCaracter((isset($func['nome']))?($func['nome']):(''), 2)?>" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Nome Completo...">
                                    </label>
                                </div>
                  
                                <div class="col-md-6">        
                                    <br/>
                            
                                    <label class="mt-4">Senha:
                                        <input class="form-control" name="senha" id="alteraSenha" type="password" aria-describedby="nameHelp" placeholder="Senha..." value="<?=$objFc->tratarCaracter((isset($func['senha']))?($func['senha']):(''), 2)?>" disabled="disabled">
                                    </label>
                                    
                                    <label class="radio-inline col-md-4"><input type="checkbox" name="modalidade" value="2" onclick="if(document.getElementById('alteraSenha').disabled==true){document.getElementById('alteraSenha').disabled=false} else{document.getElementById('alteraSenha').disabled=true}">Alterar Senha</label>
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" name="btAlterar" class="btn btn-primary btn-block">Editar</button>        
                        <input type="hidden" name="func" value="<?=(isset($func['id']))?($objFc->base64($func['id'], 1)):('')?>">
                    </form>
           
                    <?php } ?>
            
                </div>
            </div>
        </div>
        
        <!-- Modal de Exclusão-->
        <?php include "modals/modal-exclusao-usuario.php"; ?>
        <!-- FIM do MODAL de exclusão-->

      </div>
      <!-- /.container-fluid-->
      <!-- /.content-wrapper-->
      <?php include "footer.php"; ?>