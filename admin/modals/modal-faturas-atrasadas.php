<!-- Modal Faturas Atrasadas-->
    
              <div class="modal fade" id="verFaturasAtrasadas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
                  <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Faturas Atrasadas</h5>
        
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
      
                          <div class="modal-body">
                                  
                              <!-- Conteúdo aqui -->
          
                              <div class="card mb-3">
                                  <div class="card-header">
                                      <i class="fa fa-table"></i> Tabela de Faturas Atrasadas</div>
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
                                                  $status = $rst['status_ft'];
                                                  $vencimentoCompleto = $rst['mes'];
                                                  $diaAtual = date("Y-m-d");
                                                  if(($diaAtual > $vencimentoCompleto) && ($status == "aberto")){
                                                        $atrasos++;
                                                  }
    
                                                  if(($diaAtual > $vencimentoCompleto) && ($status == "aberto")){
                                                  ?>

                                                <tr>
                                                  <td><?php if($status == "aberto"){ echo "<button class=\"btn btn-danger btn-block\"> Aberto </button>"; }else{ echo "<button class=\"btn btn-success btn-block\"> Pago </button>"; }?></td>
                                                  <td><?=$objFc->tratarCaracter($rst['nome_ft'], 2)?></td>
                                                  <td><?php echo date('F', strtotime($vencimentoCompleto)); ?></td>
                                                  <td>Dia <?=$objFc->tratarCaracter($rst['venc_ft'], 2)?></td>
                                                  <td>R$<?=$objFc->tratarCaracter($rst['valor_ft'], 2)?>,00</td>
                                                  <td><a href="ver-fatura.php?acao=edit&func=<?=$objFc->base64($rst['id'], 1)?>" class="btn btn-primary btn-block"> Ver </a>
                                                  </td>
                                                </tr>
                                                <?php }} ?>

                                              </tbody>
                                            </table> 
                                      </div>
                                  </div>
                                  <!--<div class="card-footer small text-muted">Atualizado hoje 11:59 PM</div>-->
                              </div>
                              <!-- Fim do conteúdo-->
                              
                          </div>
      
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- FIM do MODAL Alunos BJJ --> 
