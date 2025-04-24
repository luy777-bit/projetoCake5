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
<form method='POST' action="../clientes/add">
  <div class="card-body">
    <div class="row">
      <div class="form-group col-md-4" >
        <label for="exampleInputEmail1">Nome</label>
        <input type="text" class="form-control" id="nm_cliente" name="nm_cliente"
        placeholder="Nome" required='true' maxlength="100" 
        oninvalid="this.setCustomValidity('Obrigatorio')">
      </div>
      <div class="form-group col-md-2">
        <label for="exampleInputPassword1">CNPJ</label>
        <input type="text" class="form-control cnpj" id="cnpj" name="cnpj"
        placeholder="__.___.___/____-__"
        required='true' maxlength="18" 
        oninvalid="this.setCustomValidity('Obrigatorio')">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-2" >
        <label for="exampleInputEmail1">CEP</label>
        <input type="text" class="form-control cep" id="cep" name="cep"
        placeholder="CEP"
        required='true' maxlength="9" 
        oninvalid="this.setCustomValidity('Obrigatorio')">
      </div>
      <div class="form-group col-md-4">
        <label for="exampleInputPassword1">Endereço</label>
        <input type="text" class="form-control" id="endereco" name="endereco"
        placeholder="Endereço"
        required='true' maxlength="100" 
        oninvalid="this.setCustomValidity('Obrigatorio')">
      </div>
    </div>   
    <div class="row">
      <div class="form-group col-md-1" >
        <label for="exampleInputEmail1">Vencimento</label>
        <input type="text" class="form-control data" id="data_vencimento" name="data_vencimento"
        placeholder="__/__/____"
        required='true' maxlength="12" 
        oninvalid="this.setCustomValidity('Obrigatorio')">
      </div>      
    </div>
    <div class="row">
        <div class="col-sm-6">
          <!-- textarea -->
          <div class="form-group">
            <label>Observação</label>
            <textarea class="form-control" rows="3" id="observacao" name="observacao"
            placeholder="Enter ..." maxlength="1000" "></textarea>
          </div>
        </div>      
    </div> 
    <div class="row">
      <div class="form-check col-md-2">
        <input type="checkbox" class="form-check-input" id="ativo" name="ativo" value="1">
        <label class="form-check-label" for="exampleCheck1" style="margin-left:10px;"> Ativo</label>
      </div>
    </div>
    <div class="row campo_dinamico bloco_informacaoes_0">
      <div class="form-group col-md-4">
        <label for="exampleInputPassword1">Informações:</label>
        <input type="text" class="form-control informacao" id="informacao_0" name="informacao[0]"
        placeholder="Informação">
      </div>     
      <div class="form-group col-md-1">
        <label for="exampleInputPassword1">Adicionar:</label>
        <input type="button" class="form-control btn_add" id="0" name="add"
        value="+">
      </div>
      <div class="form-group col-md-1">
        <label for="exampleInputPassword1">Remover:</label>
        <input type="button" class="form-control btn_sub" id="0" name="sub"
        value="-">
      </div>      
    </div>    
  </div>
  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Salvar</button>
  </div>
</form>

<script src='<?=$_SESSION['caminho_1']?>/js/clientes.js'></script>
