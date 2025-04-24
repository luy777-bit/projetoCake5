<?= $this->Html->css('arvore.css') ?>

<div class="card-header">
  <h3>Gerenciamento de  Acessos</h3>
    <div class="card-body">
        <form class="form-horizontal" method="POST">
          <div class="row">
            <div class="form-group col-md-4" >
              <label for="exampleInputEmail1">Perfil</label>
                <select class="form-control" id="id_perfil" name="id_perfil" required='true'>
                  <?php
                      $option = "<option value=''>Selecione</option>";
                      foreach ($mostra_perfil as $key => $value) {

                          if(isset($id_perfil) && $value['id'] == $id_perfil){
                              $option .= "<option value='".$value['id']."' selected>".$value['perfil']."</option>";
                          }
                          else{
                              $option .= "<option value='".$value['id']."'>".$value['perfil']."</option>";
                          }
                      }
                      echo $option;
                  ?>
                </select>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
              </div>  
            </div> 
          </div>
        </form>     

        <div class="row">
          <?php

            if(isset($html)){
                echo $html;
            }
            
          ?>
        </div>

  </div>    
<script src='<?=$_SESSION['caminho_1']?>/js/acessos.js'></script>


