<!--Modal Edição de imagem do aluno -->

<div class="modal fade" id="alteraFoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
                  <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Alterar Imagem de <?=$objFc->tratarCaracter((isset($func['nome']))?($func['nome']):(''), 2)?> ?</h5>
        
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
      
                          <div class="modal-body">
                              
                              <!-- Início do conteúdo -->
                              <form action="" method="post" enctype="multipart/form-data">
                                  <div class="col-md-8">
                                      <label for="exampleInputLastName"><img src="<?php 
                                                                                if(!isset($func['thumb'])){
                                                                                    echo "images/s-foto.png";
                                                                                }else{
                                                                                    echo "../uploads/" . $func['thumb'];
                                                                                }
                                                                            ?>" class="img-thumbnail"></label>

                                      <input type="file" id="files" name="thumb" />
                                      <br>
                                      <br>
                                      <br>
                                      
                                      <button type="submit" name="btAlterarFt" class="btn btn-primary btn-block">Salvar Alterações</button>
            
                                      <input type="hidden" name="func" value="<?=(isset($func['id']))?($objFc->base64($func['id'], 1)):('')?>">

                                  </div>
                              </form>
                              <!-- Fim do conteúdo-->
                              
                          </div>
      
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                      </div>
                  </div>
              </div>
    