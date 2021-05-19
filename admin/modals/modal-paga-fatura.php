<!--Modal de Pagamento de Fatura-->

<div class="modal fade" id="pagaFatura" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
                  <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Deseja Pagar a Fatura nº00<?=$objFc->tratarCaracter((isset($func['id']))?($func['id']):(''), 2)?> ?</h5>
        
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
      
                          <div class="modal-body">
                              
                              <!-- Início do conteúdo -->
                              <div class="col-md-8">
                                  <form action="" method="post" enctype="multipart/form-data">
                                      <div class="form-check">
                                          <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="status" value="pago" checked>
                                            Sim, desejo pagar esta fatura.
                                          </label>
                                        </div>
                                        <div class="form-check">
                                          <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="status" value="aberto">
                                            Não, esta fatura deve permanecer em aberto.
                                          </label>
                                        </div>
                                      <button type="submit" name="btPagar" class="btn btn-primary btn-block">Enviar</button>
                                  
                                      <input type="hidden" name="func" value="<?=(isset($func['id']))?($objFc->base64($func['id'], 1)):('')?>">
                                  </form>
            
                                  
                              </div>
                              <!-- Fim do conteúdo-->
                              
                          </div>
      
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                      </div>
                  </div>
              </div>
