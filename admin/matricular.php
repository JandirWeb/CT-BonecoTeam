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
//CADASTRANDO O ALUNO
if(isset($_POST['btCadastrar'])){
	if($objAluno->queryInsertAlu($_POST) == 'ok'){
		header('location: matricular.php');
	}else{
		echo '<script type="text/javascript">alert("Erro em cadastrar");</script>';
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
        <li class="breadcrumb-item active">Matricular Aluno</li>
      </ol>
      <!-- Conteúdo aqui -->
      <div>
      <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">Nome Completo</label>
                <input class="form-control" name="nome" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Digite o nome..."  required="required">
                  
                <label for="exampleInputName" class="mt-4">E-mail</label>
                <input class="form-control" name="email" id="exampleInputName" type="mail" aria-describedby="nameHelp" placeholder="email@emaildoaluno.com.br">
                  
                <label for="exampleInputName" class="mt-4">Telefone</label>
                <input class="form-control" name="fone" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Digite o telefone..." required="required">  
              </div>
              <div class="col-md-5 ml-5">
                <label for="exampleInputLastName"><img src="images/s-foto.png" class="img-thumbnail"></label>
                <input type="file" id="files" name="thumb" />
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Endereço</label>
            <input class="form-control" name="end" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Digite o endereço" required="required">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">RG</label>
                <input class="form-control" name="rg" id="exampleInputPassword1" type="text" placeholder="Digite o RG" required="required">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Data de Nascimento</label>
                <input class="form-control" name="data_nasc" id="exampleConfirmPassword" type="date" required="required">
              </div>
            </div>
          </div>
            <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1"><strong>Modalidade</strong></label><br/>
                <label class="radio-inline col-md-4"><input type="checkbox" name="muay_thai" value="sim" onchange="if(document.getElementById('horario1').disabled==true) {document.getElementById('horario1').disabled=false} else{document.getElementById('horario1').disabled=true}
                    if(document.getElementById('horario5').disabled==true) {document.getElementById('horario5').disabled=false} else{document.getElementById('horario5').disabled=true}
                    if(document.getElementById('horario2').disabled==true) {document.getElementById('horario2').disabled=false} else{document.getElementById('horario2').disabled=true}
                    if(document.getElementById('horario4').disabled==true) {document.getElementById('horario4').disabled=false} else{document.getElementById('horario4').disabled=true}
                    if(document.getElementById('horario6').disabled==true) {document.getElementById('horario6').disabled=false} else{document.getElementById('horario6').disabled=true}
                    if(document.getElementById('horario8').disabled==true) {document.getElementById('horario8').disabled=false} else{document.getElementById('horario8').disabled=true}
                    " >Muay Thai</label>
                <label class="radio-inline col-md-4"><input type="checkbox" name="bjj" value="sim" onclick="if(document.getElementById('horario3').disabled==true){document.getElementById('horario3').disabled=false} else{document.getElementById('horario3').disabled=true}
                    if(document.getElementById('horario7').disabled==true){document.getElementById('horario7').disabled=false} else{document.getElementById('horario7').disabled=true}">Jiu-Jitsu</label>
              </div>
              <div class="col-md-6">
                <label for="data_venc"><strong>Data de Pagamento</strong></label><br/>
                <label class="radio-inline col-md-4"><input type="radio" name="data_venc" value="10" checked>Dia 10</label>
                <label class="radio-inline col-md-4"><input type="radio" name="data_venc" value="20">Dia 20</label>
              </div>
            </div>
            <div class="form-row">
                <div class="col-md-10">
                    <label for="exampleInputPassword1"><strong>Horário</strong></label><br>
                    <label class="radio-inline col-md-1"><input id="horario1" type="checkbox" name="horario[]" value="08:00hr," disabled="disabled">08:00hr</label>
                    <label class="radio-inline col-md-1"><input id="horario2" type="checkbox" name="horario[]" value="10:00hr," disabled="disabled">10:00hr</label>
                    <label class="radio-inline col-md-1"><input id="horario3" type="checkbox" name="horario[]" value="15:00hr," disabled="disabled">15:00hr</label>
                    <label class="radio-inline col-md-1"><input id="horario4" type="checkbox" name="horario[]" value="16:00hr," disabled="disabled">16:00hr</label>
                    <label class="radio-inline col-md-1"><input id="horario5" type="checkbox" name="horario[]" value="17:00hr," disabled="disabled">17:00hr</label>
                    <label class="radio-inline col-md-1"><input id="horario6" type="checkbox" name="horario[]" value="18:30hr," disabled="disabled">18:30hr</label>
                    <label class="radio-inline col-md-1"><input id="horario7" type="checkbox" name="horario[]" value="19:30hr," disabled="disabled">19:30hr</label>  
                    <label class="radio-inline col-md-1"><input id="horario8" type="checkbox" name="horario[]" value="20:30hr" disabled="disabled">20:30hr</label>  
                </div>
                
                <div class="col-md-2">
                    <label for="escolheStatus"><strong>Status</strong></label><br>
                    <select class="form-control" name="status">
                        <option value="ativo">Ativo</option>
                        <option value="bolsista">Bolsista</option>
                        <option value="inativo">Inativo</option>
                    </select>
                </div>                
            </div>  
            <br>
            <div class="form-row">
                <div class="col-md-2">
                    <label for="valorMensalMT"><strong>Valor do Muay Thai</strong>
                        <div class="input-group pt-2">
                              <span class="input-group-addon">R$</span>
                              <input id="valorMT" type="text" class="form-control" name="valorMT" aria-label="Valor do Muay Thai">
                              <span class="input-group-addon">,00</span>

                        </div>
                    </label>
                </div>
                
                <div class="col-md-2 offset-md-2">
                    <label for="valorMensalBjj"><strong>Valor do Jiu-Jitsu</strong>
                        <div class="input-group pt-2">
                              <span class="input-group-addon">R$</span>
                              <input id="valorBjj" type="text" class="form-control" name="valorBjj" aria-label="Valor do Jiu-Jitsu">
                              <span class="input-group-addon">,00</span>

                        </div>
                    </label>
                </div>
              </div>  
          
            </div>
            <!--<input class="form-control" name="data_cad" type="text" value="<?php# $matricula = date ("d-m-Y"); echo $matricula ?>">-->
            <input class="form-control" name="data_cad" id="exampleConfirmPassword" type="hidden"  value="<?php $matricula = date ("Y-m-d"); echo $matricula ?>">
          
            <button type="submit" name="btCadastrar" class="btn btn-primary btn-block">Matricular</button>
            
        </form>
        
      </div>
    </div>
        
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <script>
        
    </script>
    <?php include "footer.php"; ?>