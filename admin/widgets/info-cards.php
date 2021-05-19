<?php
$somaBjj = 0;
$somaMT = 0;
$VlTotal = 0;
$atrasos = 0;
    foreach($objAluno->querySelectAlu() as $rst){
        $bjj = $rst['bjj'];
        $muayThai = $rst['muay_thai'];
        $status = $rst['status'];
        $valorMt = $rst['valor_MT'];
        $valorBJJ = $rst['valor_Bjj'];
        
        //Calculo de alunos por modalidade
        if(($bjj == "sim")&&(($status == "ativo")||($status == "bolsista"))){
            $somaBjj++;
        }
        if(($muayThai == "sim")&&(($status == "ativo")||($status == "bolsista"))){
            $somaMT++;
        }
        
        //Calculo do valor total Bruto da Academia
        if($status == "ativo"){
            $VlTotal = $valorMt + $valorBJJ + $VlTotal;
        }
 
    }


    foreach($objFatura->querySelectFt() as $rst){                            
        $status = $rst['status_ft'];
        $vencimentoCompleto = $rst['mes'];
        $diaAtual = date("Y-m-d");
        if(($diaAtual > $vencimentoCompleto) && ($status == "aberto")){
            $atrasos++;
        }
    }

?>

<div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-hand-rock-o"></i>
              </div>
                <div class="mr-5"><?php echo $somaMT; ?> Alunos de<br/> <strong>Muay Thai</strong></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" data-toggle="modal" data-target="#verMT" href="verMT">
              <span class="float-left">Ver Detalhes</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-hand-o-down"></i>
              </div>
              <div class="mr-5"><?php echo $somaBjj; ?> Alunos de<br/> <strong>Jiu-Jitsu</strong></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" data-toggle="modal" data-target="#verBjj" href="verBjj">
              <span class="float-left">Ver Detalhes</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-money"></i>
              </div>
              <div class="mr-5">R$<?php echo $VlTotal; ?>,00 <br/><strong>Valor Total</strong></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="graficos.php">
              <span class="float-left">Ver Detalhes</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-exclamation"></i>
              </div>
              <div class="mr-5"><?php echo $atrasos; ?> Mensalidades <br/> <strong>Atrasadas</strong></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" data-toggle="modal" data-target="#verFaturasAtrasadas" href="verFaturasAtrasadas">
              <span class="float-left">Ver Detalhes</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>