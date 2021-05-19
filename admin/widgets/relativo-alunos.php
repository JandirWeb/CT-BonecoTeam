<?php
$qtdBjj = 0;
$qtdBoica = 0;
$qtdPitito = 0;
$qtdBoneco = 0;
foreach($objAluno->querySelectAlu() as $rst){                            
        $status = $rst['status'];
        $horario = $rst['horario'];
        $bjj = $rst['bjj'];
        $muayThai = $rst['muay_thai'];
    
    
        if(($status == "ativo") || ($status == "bolsista")){
            if($bjj == "sim"){
                $qtdBjj += 1;
            }
            if(($muayThai == "sim") && ($horario == "08:00hr,")){
                $qtdPitito += 1;
            }
            if(($muayThai == "sim") && ($horario == "10:00hr,")){
                $qtdBoica += 1;
            }
            if(($muayThai == "sim") && (($horario == "16:00hr,")||($horario == "17:00hr,")||($horario == "18:30hr,")||($horario == "20:30hr,")||($horario == "16:00hr,19:30hr,")||($horario == "17:00hr,19:30hr,")||($horario == "18:30hr,19:30hr,")||($horario == "20:30hr,"))){
                $qtdBoneco += 1;
            }
        }
}
?>

<div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-pie-chart"></i> Seus Alunos Estão:</div>
            <div class="card-body">
              <canvas id="myPieChart" width="100%" height="100"></canvas>
            </div>
          </div>


<script>
var qtdPitito = <?php echo $qtdPitito; ?>;
var qtdBjj = <?php echo $qtdBjj; ?>;
var qtdBoica = <?php echo $qtdBoica; ?>;
var qtdBoneco = <?php echo $qtdBoneco; ?>;
</script>
