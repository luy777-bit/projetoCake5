<?php
  if(isset($retorno)){
      if($retorno == 'OK'){
          echo "<div class='message success btnMensagem'>Cliente Salvo com sucesso</div>";
      }
      else{
        echo "<div class='message error btnMensagem'>Falha ao Cadastrar</div>";
      }
  }
?>
<form method='POST' action="../edit/<?= $cnpj?>">
  <div class="card-body">
    <div class="row">
      <div class="form-group col-md-4" >
        <label for="exampleInputEmail1">Nome</label>
        <input type="text" class="form-control" id="nm_cliente" name="nm_cliente"
        placeholder="Nome" required='true' maxlength="100" 
        oninvalid="this.setCustomValidity('Obrigatorio')"
        value="<?= $cliente[0]['nm_cliente'] ?>">
      </div>
      <div class="form-group col-md-2">
        <label for="exampleInputPassword1">CNPJ</label>
        <input type="text" class="form-control cnpj" id="cnpj" name="cnpj"
        placeholder="CNPJ" required='true' maxlength="18" 
        oninvalid="this.setCustomValidity('Obrigatorio')"
        value="<?= $this->Formata->cnpj($cliente[0]['cnpj']) ?>">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-2" >
        <label for="exampleInputEmail1">CEP</label>
        <input type="text" class="form-control cep" id="cep" name="cep"
        placeholder="CEP" required='true' maxlength="9" 
        oninvalid="this.setCustomValidity('Obrigatorio')"
        value="<?= $this->Formata->cep($cliente[0]['cep']) ?>">
      </div>
      <div class="form-group col-md-4">
        <label for="exampleInputPassword1">Endereço</label>
        <input type="text" class="form-control" id="endereco" name="endereco"
        placeholder="Endereço" required='true' maxlength="100" 
        oninvalid="this.setCustomValidity('Obrigatorio')"
        value="<?= $cliente[0]['endereco'] ?>">
      </div>
    </div>   
    <div class="row">
      <div class="form-group col-md-1" >
        <label for="exampleInputEmail1">Vencimento</label>
        <input type="text" class="form-control data" id="data_vencimento" name="data_vencimento"
        required='true' maxlength="12" 
        oninvalid="this.setCustomValidity('Obrigatorio')"
        value="<?= $this->Formata->dateBR($cliente[0]['data_vencimento']) ?>">
      </div>      
    </div>
    <div class="row">
        <div class="col-sm-6">
          <!-- textarea -->
          <div class="form-group">
            <label>Observação</label>
            <textarea class="form-control" rows="3" id="observacao" name="observacao"
            placeholder="Enter ..."><?= $cliente[0]['observacao'] ?></textarea>
          </div>
        </div>      
    </div> 
    <div class="row">
      <div class="form-check col-md-2">
        <input type="checkbox" class="form-check-input" id="ativo" name="ativo" value="<?= $cliente[0]['ativo'] ?>"
        checked='<?= $this->Formata->checkTrueFalse($cliente[0]['ativo']) ?>'>
        <label class="form-check-label" for="exampleCheck1" style="margin-left:10px;"> Ativo</label>
      </div>
    </div>
    <div class="row informacaoes_0">
      <div class="form-group col-md-4">
        <label for="exampleInputPassword1">Endereço</label>
        <input type="text" class="form-control" id="endereco" name="endereco"
        placeholder="Endereço" value="<?= $cliente[0]['endereco'] ?>">
      </div>      
    </div>

    <?php
      $campos_informacoes = "";

      if(count($informacoes) == 0){

        $campos_informacoes .= '<div class="row bloco_informacaoes_0">
            <div class="form-group col-md-4">
              <label for="exampleInputPassword1">Informações:</label>
              <input type="text" class="form-control informacao" id="informacao_0" name="informacao[0]"
              placeholder="Informação">
            </div>     
            <div class="form-group col-md-1">
              <label for="exampleInputPassword1">Adicionar:</label>
              <input type="button" class="form-control btn_add" id="add" name="add"
              value="+">
            </div>
            <div class="form-group col-md-1">
              <label for="exampleInputPassword1">Remover:</label>
              <input type="button" class="form-control btn_sub" id="add" name="add"
              value="-">
            </div>      
          </div>';
      }
      else{

        foreach ($informacoes as $key => $value) {
        $campos_informacoes .= '<div class="row bloco_informacaoes_'.$key.'">
            <div class="form-group col-md-4">
              <label for="exampleInputPassword1">Informações:</label>
              <input type="text" class="form-control informacao" id="informacao_'.$key.'" name="informacao['.$key.']"
              value="'. $value->informacao.'"
              placeholder="Informação">
            </div>     
            <div class="form-group col-md-1">
              <label for="exampleInputPassword1">Adicionar:</label>
              <input type="button" class="form-control btn_add" id="add" name="add"
              value="+">
            </div>
            <div class="form-group col-md-1">
              <label for="exampleInputPassword1">Remover:</label>
              <a href="../../Informacoesclientes/delete/'.$value->id.'/'.$value->cnpj.'">
              <input type="button" class="form-control btn_sub" id="add" name="add"
              value="-">
              </a>
            </div>      
          </div>';
        }
      }
      echo $campos_informacoes;
    ?>

  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>

<script src='<?=$_SESSION['caminho_1']?>/js/clientes.js'></script>
