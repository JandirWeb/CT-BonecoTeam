<!-- Modal Alunos Muay Thai-->
    
              <div class="modal fade" id="verMT" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
                  <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Detalhes Do Aluno</h5>
        
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
      
                          <div class="modal-body">
                                  
                              <!-- Conteúdo aqui -->
          
                              <div class="card mb-3">
                                  <div class="card-header">
                                      <i class="fa fa-table"></i> Tabela de Registros de Alunos do Muay Thai</div>
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
                                                                
                                                  <?php foreach($objAluno->querySelectAlu() as $rst){
    
                                                        $bjj = $rst['bjj'];
                                                        $muayThai = $rst['muay_thai'];
                                                        
                                                        if($muayThai == "sim"){
                                                  ?>
                                                  
                                                  
               
                                                  <tr>
                                                      <td><?=$objFc->tratarCaracter($rst['status'], 2)?></td>
                                                      <td><?=$objFc->tratarCaracter($rst['nome'], 2)?></td>
                                                      <td>
                                                          <?php 
                                                            if($bjj == "sim"){
                                                                echo " Jiu-Jiitsu ";
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
              <!-- FIM do MODAL Alunos Muay Thai --> 
