<!-- Modal de edição-->
    
              <div class="modal fade" id="editaAluno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
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
          
                              <div>
                                  <form action="" method="post" enctype="multipart/form-data">
                                      <div class="form-group">
                                          <div class="form-row">
                                              <div class="col-md-12">
                                                  <label for="exampleInputName">Nome Completo</label>
                                                  <input class="form-control" name="nome" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Digite o nome..." value="<?=$objFc->tratarCaracter((isset($func['nome']))?($func['nome']):(''), 2)?>" required="required">
                                              </div>                      
                                          </div>
                                          
                                          <div class="form-group">
                                              <div class="form-row">
                                                  <div class="col-md-6">
                                                      <label for="exampleInputName" class="mt-4">E-mail</label>
                                                      <input class="form-control" name="email" id="exampleInputName" type="mail" aria-describedby="nameHelp" placeholder="email@emaildoaluno.com.br" value="<?=$objFc->tratarCaracter((isset($func['mail']))?($func['mail']):(''), 2)?>" >
                                                  </div>
                                                  <div class="col-md-6">
                                                      <label for="exampleInputName" class="mt-4">Telefone</label>
                                                      <input class="form-control" name="fone" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Digite o telefone..." value="<?=$objFc->tratarCaracter((isset($func['fone']))?($func['fone']):(''), 2)?>" required="required">
                                                  </div>    
                                              </div>    
                                          </div>
                                      </div>
          
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Endereço</label>
            
                                          <input class="form-control" name="end" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Digite o endereço" value="<?=$objFc->tratarCaracter((isset($func['end']))?($func['end']):(''), 2)?>" required="required">
                                      </div>
         
                                      <div class="form-group">
                                          <div class="form-row">
                                              <div class="col-md-6">
                                                  <label for="exampleInputPassword1">RG</label>
             
                                                  <input class="form-control" name="rg" id="exampleInputPassword1" type="text" placeholder="Digite o RG" value="<?=$objFc->tratarCaracter((isset($func['rg']))?($func['rg']):(''), 2)?>" required="required">
                                              </div>
             
                                              <div class="col-md-6">
                                                  <label for="exampleConfirmPassword">Data de Nascimento</label>
               
                                                  <input class="form-control" name="data_nasc" id="exampleConfirmPassword" type="date" value="<?=$objFc->tratarCaracter((isset($func['data_nasc']))?($func['data_nasc']):(''), 2)?>" required="required">
                                              </div>
                                          </div>
                                      </div>
          
                                      <div class="form-group">
                                          <div class="form-row">
                                              <div class="col-md-6">
                                                  <label for="exampleInputPassword1"><strong>Modalidade</strong></label><br/>
                
                                                  <?php      
                                                  if($muayThai == "sim"){ echo "
                                                      <label class=\"radio-inline col-md-4\"><input type=\"checkbox\" name=\"muay_thai\" value=\"sim\" onchange=\"if(document.getElementById('horario1').disabled==false) {document.getElementById('horario1').disabled=true} else{document.getElementById('horario1').disabled=false}
                    
                                                      if(document.getElementById('horario2').disabled==false) {document.getElementById('horario2').disabled=true} else{document.getElementById('horario2').disabled=false}
                    
                                                      if(document.getElementById('horario3').disabled==false) {document.getElementById('horario3').disabled=true} else{document.getElementById('horario3').disabled=false}
                    
                                                      if(document.getElementById('horario4').disabled==false) {document.getElementById('horario4').disabled=true} else{document.getElementById('horario4').disabled=false}
                    
                                                      if(document.getElementById('horario6').disabled==false) {document.getElementById('horario6').disabled=true} else{document.getElementById('horario6').disabled=false}
                                                      \" checked>Muay Thai</label>";
                                                  }else{echo"
                                                      <label class=\"radio-inline col-md-4\"><input type=\"checkbox\" name=\"muay_thai\" value=\"sim\" onchange=\"if(document.getElementById('horario1').disabled==true) {document.getElementById('horario1').disabled=false} else{document.getElementById('horario1').disabled=true}
                    
                                                      if(document.getElementById('horario2').disabled==true) {document.getElementById('horario2').disabled=false} else{document.getElementById('horario2').disabled=true}
                    
                                                      if(document.getElementById('horario3').disabled==true) {document.getElementById('horario3').disabled=false} else{document.getElementById('horario3').disabled=true}
                    
                                                      if(document.getElementById('horario4').disabled==true) {document.getElementById('horario4').disabled=false} else{document.getElementById('horario4').disabled=true}
                    
                                                      if(document.getElementById('horario6').disabled==true) {document.getElementById('horario6').disabled=false} else{document.getElementById('horario6').disabled=true}
                                                      \" >Muay Thai</label>";
                                                  }
                                                  
                                                  if($bjj == "sim"){ echo "
                                                      <label class=\"radio-inline col-md-4\"><input type=\"checkbox\" name=\"bjj\" value=\"sim\" onclick=\"if(document.getElementById('horario5').disabled==true){document.getElementById('horario5').disabled=false} else{document.getElementById('horario5').disabled=true}\" checked>Jiu-Jitsu</label>";
                                                  }else{echo"
                                                        <label class=\"radio-inline col-md-4\"><input type=\"checkbox\" name=\"bjj\" value=\"sim\" onclick=\"if(document.getElementById('horario5').disabled==true){document.getElementById('horario5').disabled=false} else{document.getElementById('horario5').disabled=true}\">Jiu-Jitsu</label>";
                                                  }
                                                  ?>
                                              </div>
              
                                              <div class="col-md-6">
                                                  <label for="exampleConfirmPassword"><strong>Data de Pagamento</strong></label><br/>
               
                                                  <label class="radio-inline col-md-4"><input type="radio" name="data_venc" value="10" <?php if($func['data_venc'] == "10"){echo "checked";}?> >Dia 10</label>
                
                                                  <label class="radio-inline col-md-4"><input type="radio" name="data_venc" value="20" <?php if($func['data_venc'] == "20"){echo "checked";}?> >Dia 20</label>
                                              </div>
                                          </div>
           
                                          <div class="form-row">
                                              <div class="col-md-12">
               
                                                  <label for="exampleInputPassword1"><strong>Horário</strong></label><br>
                
                                                  <?php $todoHorario = $func['horario'];
                                                        $tagArray = explode(' - ', $todoHorario);
                                                        $hora01   = '08:00hr';
                                                        $hora02   = '10:00hr';
                                                        $hora03   = '15:00hr';
                                                        $hora04   = '16:00hr';
                                                        $hora05   = '17:00hr';
                                                        $hora06   = '18:30hr';
                                                        $hora07   = '19:30hr';
                                                        $hora08   = '12:30hr';

                                                        $horaArray = explode(',', $todoHorario);

                                                  ?>
                                                  <label class="radio-inline col-md-1"><input id="horario1" type="checkbox" name="horario[]" value="08:00hr,"  <?php if (in_array($hora01, $horaArray)) {echo 'checked';}?> >08:00hr</label>
                                                  
                                                  <label class="radio-inline col-md-1"><input id="horario1" type="checkbox" name="horario[]" value="10:00hr,"  <?php if (in_array($hora02, $horaArray)) {echo 'checked';}?> >10:00hr</label>
               
                                                  <label class="radio-inline col-md-1"><input id="horario2" type="checkbox" name="horario[]" value="16:00hr,"  <?php if (in_array($hora03, $horaArray)) {echo 'checked';}?> >15:00hr</label>
                                                  
                                                  <label class="radio-inline col-md-1"><input id="horario2" type="checkbox" name="horario[]" value="16:00hr,"  <?php if (in_array($hora04, $horaArray)) {echo 'checked';}?> >16:00hr</label>
               
                                                  <label class="radio-inline col-md-1"><input id="horario3" type="checkbox" name="horario[]" value="17:00hr,"  <?php if (in_array($hora05, $horaArray)) {echo 'checked';}?> >17:00hr</label>
               
                                                  <label class="radio-inline col-md-1"><input id="horario4" type="checkbox" name="horario[]" value="18:30hr,"  <?php if (in_array($hora06, $horaArray)) {echo 'checked';}?> >18:30hr</label>
               
                                                  <label class="radio-inline col-md-1"><input id="horario5" type="checkbox" name="horario[]" value="19:30hr,"  <?php if (in_array($hora07, $horaArray)) {echo 'checked';}?> >19:30hr</label> 
               
                                                  <label class="radio-inline col-md-1"><input id="horario6" type="checkbox" name="horario[]" value="20:30hr"  <?php if (in_array($hora08, $horaArray)) {echo 'checked';}?> >20:30hr</label>  
              
                                              </div>
                                              
                                              <div class="col-md-3">
                                                    <label for="valorMensal"><strong>Valor do Muay Thai</strong>
                                                        <div class="input-group pt-2">
                                                            <span class="input-group-addon">R$</span>
                                                            <input type="text" class="form-control" name="valorMT" aria-label="Valor da mensalidade" value="<?=$objFc->tratarCaracter((isset($func['valor_MT']))?($func['valor_MT']):(''), 2)?>">
                                                            <span class="input-group-addon">,00</span>
                                                        </div>
                                                  </label>  
                                              </div>
                                              
                                              <div class="col-md-3 offset-md-1">
                                                    <label for="valorMensal"><strong>Valor do Jiu-Jitsu</strong>
                                                        <div class="input-group pt-2">
                                                            <span class="input-group-addon">R$</span>
                                                            <input type="text" class="form-control" name="valorBjj" aria-label="Valor da mensalidade" value="<?=$objFc->tratarCaracter((isset($func['valor_Bjj']))?($func['valor_Bjj']):(''), 2)?>">
                                                            <span class="input-group-addon">,00</span>
                                                        </div>
                                                  </label>  
                                              </div>
                                              
                                              <div class="col-md-2 offset-md-1">
                                                  <label for="escolheStatus"><strong>Status</strong></label><br>
                                                  <select class="form-control" name="status">
                                                    <option value="ativo" <?php if($func['status'] == "ativo") {echo 'selected';}?>>Ativo</option>
                                                    <option value="bolsista" <?php if($func['status'] == "bolsista") {echo 'selected';}?>>Bolsista</option>
                                                    <option value="inativo" <?php if($func['status'] == "inativo") {echo 'selected';}?>>Inativo</option>
                                                  </select>
                                            </div>
                                          </div>
                                      </div>
            
                                      <button type="submit" name="btAlterar" class="btn btn-primary btn-block">Salvar Alterações</button>
            
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
              <!-- FIM do MODAL de edição --> 
