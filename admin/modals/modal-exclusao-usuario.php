<!--Modal exclusão de usuário-->

<div class="modal fade" id="excluiUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
                  <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Tem certeza que quer excluir <?=$objFc->tratarCaracter((isset($func['nome']))?($func['nome']):(''), 2)?> ?</h5>
        
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
      
                          <div class="modal-body">
                              
                              <!-- Início do conteúdo -->
                              <div class="col-md-8">
                                  <a type="submit" href="?acao=delet&func=<?=$objFc->base64($rst['id'], 1)?>" class="btn btn-danger btn-block">Sim</a>
                                  <button type="submit" data-dismiss="modal" class="btn btn-primary btn-block">Não</button>
                                  
                              </div>
                              <!-- Fim do conteúdo-->
                              
                          </div>
      
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                      </div>
                  </div>
              </div>