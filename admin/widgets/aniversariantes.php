<div class="card-header">
              <i class="fa fa-bell-o"></i> Aniversariantes do mês</div>
            <div class="list-group list-group-flush small">
                
                <?php foreach($objAluno->querySelectAlu() as $rst){
                    $dtNasc = $rst['data_nasc'];
                    $mesNasc = date('m', strtotime($dtNasc));
                    $mesCorrente = date('m');
    
                    if($mesCorrente == $mesNasc){
    
                ?>
                <a class="list-group-item list-group-item-action">
                    <div class="media">
                        <img class="d-flex mr-3 rounded-circle col-md-1" src="<?php 
                                                                            if(!isset($rst['thumb'])){
                                                                                echo "images/s-foto.png";
                                                                            }else{
                                                                                echo "../uploads/" . $rst['thumb'];
                                                                            }
                                                                        ?>" alt="">
                        <div class="media-body">
                            <strong><?=$objFc->tratarCaracter($rst['nome'], 2)?></strong> faz aniversário esse mês.
                            <strong> Deseje Parabéns! =)</strong>
                            <div class="text-muted smaller"><?php echo date('d/F', strtotime($dtNasc)); ?></div>
                        </div>
                    </div>
                </a>
                
                <?php }} ?>
        
            </div>
            