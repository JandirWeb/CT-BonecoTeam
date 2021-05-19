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
        <li class="breadcrumb-item active">Todos os Alunos</li>
      </ol>
        
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabela de Registros de Alunos</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Status</th>
                  <th>Nome</th>
                  <th>Modalidade</th>
                  <th>Horário</th>
                  <th>Registrado em</th>
                  <th> </th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Status</th>
                  <th>Nome</th>
                  <th>Modalidade</th>
                  <th>Horário</th>
                  <th>Registrado em</th>
                  <th> </th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach($objAluno->querySelectAlu() as $rst){ ?>
                <tr>
                  <td><?=$objFc->tratarCaracter($rst['status'], 2)?></td>
                  <td><?=$objFc->tratarCaracter($rst['nome'], 2)?></td>
                  <td>
                      <?php 
                        $bjj = $rst['bjj'];
                        $muayThai = $rst['muay_thai'];
                                           
                        if($bjj == "sim"){
                            echo " Jiu-Jitsu ";
                        }
                        if(($bjj == "sim") && ($muayThai == "sim")){
                            echo " - ";
                        }
                        if($muayThai == "sim"){
                            echo " Muay Thai ";
                        }
                      ?>
                  </td>
                  <td> <?=$objFc->tratarCaracter($rst['horario'], 2)?>
                      <?php /*
                        $dtnasc = new DateTime( $rst['data_nasc'] ); // data de nascimento
                        $dtAtual = date ("Y-m-d");
                        $interval = $dtnasc->diff( new DateTime( $dtAtual ) ); // data definida

                        echo $interval->format( '%Y Anos' ); // idade 
                      */?>
                  </td>
                  <td><?php echo date_format(new DateTime($rst['data_cad']), "d/M/Y");?></td>
                  <td><a href="aluno-ver.php?acao=edit&func=<?=$objFc->base64($rst['id'], 1)?>" class="btn btn-primary btn-block"> Ver </a>
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