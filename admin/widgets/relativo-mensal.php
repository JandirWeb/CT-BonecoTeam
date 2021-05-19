<?php
$valorBjj = 0;
$valorBoica = 0;
$valorPitito = 0;
$valorCT = 0;

$valorLiquid001 = 0;
$valorLiquid1 = 0;
$valorLiquid2 = 0;
$valorLiquid3 = 0;
$valorLiquid4 = 0;
$valorLiquid5 = 0;
$valorLiquid6 = 0;

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

    //Verifica e zera os valores do mês
    $mesAtual = date("M-Y");
    $mesFt = date ("M-Y", strtotime($ultimaFt));
    if($mesFt != $mesAtual ){
        $valorBjj = 0;
        $valorBoica = 0;
        $valorPitito = 0;
        $valorCT = 0;
        $totalLiquid = 0;
    }

foreach($objFatura->querySelectFt() as $rst){                            
        $status = $rst['status_ft'];
        $diaAtual = date("Y-m-d");
        $vencimentoMesCompleto = $rst['mes'];
        $mesAnoAtual = date("Y-m");
        $horario = $rst['horario_ft'];
    
    //liquido dividido mês corrente
    if($status == "pago"){
        $dtPagamento = $rst['data_pagamento'];
        $mesAnoPagamento = date("Y-m", strtotime($dtPagamento));
        $anoMesPagamento = date("M-Y", strtotime($dtPagamento));
        if($mesAnoAtual == $mesAnoPagamento){
            if($horario == "08:00hr"){
                $vlMetadePitito = $rst["valor_ft"] / 2;
                $valorPitito += $vlMetadePitito;
            }
            if(($horario == "15:00hr") || ($horario == "19:30hr")){
                $vlMetadeBjj = $rst["valor_ft"] / 2;
                $valorBjj += $vlMetadeBjj;
            }
            if($horario == "10:00hr"){
                $vlMetadeBoica = $rst["valor_ft"] / 2;
                $valorBoica += $vlMetadeBoica;
            }
            if(($horario == "16:00hr")||($horario == "17:00hr")||($horario == "18:30hr")||($horario == "20:30hr")){
                $valorCT += $rst["valor_ft"];
            }
        }
    }
    
//Para o gráfico **Valor Liquido recebi nos meses anteriores**    
$anterior1 = date("M-Y",strtotime('-1 months', strtotime(date($ultimaFt))));
$anterior2 = date("M-Y",strtotime('-2 months', strtotime(date($ultimaFt))));
$anterior3 = date("M-Y",strtotime('-3 months', strtotime(date($ultimaFt))));
$anterior4 = date("M-Y",strtotime('-4 months', strtotime(date($ultimaFt))));
$anterior5 = date("M-Y",strtotime('-5 months', strtotime(date($ultimaFt))));
$anterior6 = date("M-Y",strtotime('-6 months', strtotime(date($ultimaFt))));
$mes01 = $anterior1;
$mes02 = $anterior2;
$mes03 = $anterior3;
$mes04 = $anterior4;
$mes05 = $anterior5;
$mes06 = $anterior6;
/*$valorLiquid1 = 0;
$valorLiquid2 = 0;
$valorLiquid3 = 0;
$valorLiquid4 = 0;
$valorLiquid5 = 0;
$valorLiquid6 = 0;*/

    if($status == "pago"){
        if($anoMesPagamento == $anterior1){
            $mes01 = $anterior1;
            $valorLiquid1 = $valorCT + ($valorBoica * 2) + ($valorPitito * 2) + ($valorBjj * 2);
        }
        if($mesAnoPagamento == $anterior2){
            $mes02 = $anterior2;
            $valorLiquid2 += $valorCT + ($valorBoica * 2) + ($valorPitito * 2) + ($valorBjj * 2);
        }
        if($mesAnoPagamento == $anterior3){
            $mes03 = $anterior3;
            $valorLiquid3 += $valorCT + ($valorBoica * 2) + ($valorPitito * 2) + ($valorBjj * 2);
        }
        if($mesAnoPagamento == $anterior4){
            $mes04 = $anterior4;
            $valorLiquid4 += $valorCT + ($valorBoica * 2) + ($valorPitito * 2) + ($valorBjj * 2);
        }
        if($mesAnoPagamento == $anterior5){
            $mes05 = $anterior5;
            $valorLiquid5 += $valorCT + ($valorBoica * 2) + ($valorPitito * 2) + ($valorBjj * 2);
        }
        if($mesAnoPagamento == $anterior6){
            $mes06 = $anterior6;
            $valorLiquid6 += $valorCT + ($valorBoica * 2) + ($valorPitito * 2) + ($valorBjj * 2);
        }
    }
}

echo $valorLiquid1;
    
//Liquido do CT mês corrente
$valorCT = $valorCT + $valorBoica + $valorPitito + $valorBjj;
$totalLiquid = $valorCT + $valorBoica + $valorPitito + $valorBjj;
?>

<div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Valor Líquido Mensal</div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-8 my-auto">
                  <canvas id="myBarChart" width="100" height="50"></canvas>
                </div>
                <div class="col-sm-4 text-center my-auto">
                  <div class="h4 mb-0 text-primary">R$<?php echo $valorCT; ?>,00</div>
                  <div class="small text-muted">CT Boneco TEAM</div>
                  <hr>
                  <div class="h4 mb-0 text-warning">R$<?php echo $valorBjj; ?>,00</div>
                  <div class="small text-muted">Joelson Coelho</div>
                  <hr>
                  <div class="h4 mb-0 text-success">R$<?php echo $valorBoica; ?>,00</div>
                  <div class="small text-muted">Boyca - Muay Thai</div>
                  <hr>
                  <div class="h4 mb-0 text-info">R$<?php echo $valorPitito; ?>,00</div>
                  <div class="small text-muted">Pititó - Muay Thai</div>
                  <hr>
                  <div class="h4 mb-0">R$<?php echo $totalLiquid; ?>,00</div>
                  <div class="small text-muted">Total</div>                    
                </div>
              </div>
            </div>
            <!--<div class="card-footer small text-muted">Atualizado hoje 11:59 PM</div>-->
          </div>

<script>
var mes01 = "<?php echo $mes01; ?>";
var mes02 = "<?php echo $mes02; ?>";
var mes03 = "<?php echo $mes03; ?>";
var mes04 = "<?php echo $mes04; ?>";
var mes05 = "<?php echo $mes05; ?>";
var mes06 = "<?php echo $mes06; ?>";
    
var valorLiquid1 = <?php echo $valorLiquid1; ?>;
var valorLiquid2 = <?php echo $valorLiquid2; ?>;
var valorLiquid3 = <?php echo $valorLiquid3; ?>;
var valorLiquid4 = <?php echo $valorLiquid4; ?>;
var valorLiquid5 = <?php echo $valorLiquid5; ?>;
var valorLiquid6 = <?php echo $valorLiquid6; ?>;
</script>