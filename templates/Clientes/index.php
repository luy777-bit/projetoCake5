  <div class="card-header">
      <div class="card-body">
        <form class="form-horizontal">
              <h3>Pesquisa Cliente</h3>
          </div>
        <div class="form-group row">
          <!--<label for="inputEmail3" class="col-sm-1 col-form-label">CNPJ/Cliente</label>-->
          <div class="col-sm-2">
            <input type="text" class="form-control" id="filtro_cliente" name="filtro_cliente"
            placeholder="Pesquise por CNPJ/Cliente">
          </div>
        </form>
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-info">Pesquisar</button>
        <!--<button type="submit" class="btn btn-default float-right">Cancel</button>-->
        <a href='<?=$_SESSION['caminho_2']?>Clientes/add'><button style='float:right'>Cadastrar</button></a>
      </div>
      <!-- /.card-footer -->
  </div>    
<br/>
<br/>
<div class="card-body">
  <table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>CLIENTE</th>
      <th>CNPJ</th>
      <th>CEP</th>
      <th>ENDEREÇO</th>
      <th>ATIVO</th>
      <th>OBS</th>
      <th>VENCIMENTO</th>
      <th>AÇÂO</th>
    </tr>
    </thead>
    <tbody>
    <?php
        //echo "<pre>";
        //print_r($clientes);
        $table = "";
        foreach ($clientes as $key => $value) {
              $table .= "<tr>";
                $table .= "<td>".$value['nm_cliente']."</td>";
                $table .= "<td id='".$value['cnpj']."' class='cnpj_cliente'>".$this->Formata->cnpj($value['cnpj'])."</td>";
                $table .= "<td>".$this->Formata->cep($value['cep'])."</td>";
                $table .= "<td>".$value['endereco']."</td>";
                $table .= "<td>".$this->Formata->checkSimNao($value['ativo'])."</td>";
                $table .= "<td>".$value['observacao']."</td>";
                $table .= "<td>".$this->Formata->dateBR($value['data_vencimento'])."</td>";
                $table .= "<td>

                <button class='btnViewDetalhes' data-toggle='modal' data-target='#modal-lg'>Visualizar</button> 

                <a href='edit/".$value['cnpj']."'>
                <button>Editar</button> 
                </a>

                <a href='delete/".$value['cnpj']."'>
                <button>Remover</button>
                </a>

                </td>";
              $table .= "</tr>";
        }

        echo $table;
    ?>
    </tbody>
    <!--<tfoot>
    <tr>
      <th>Rendering engine</th>
      <th>Browser</th>
      <th>Platform(s)</th>
      <th>Engine version</th>
      <th>CSS grade</th>
      <th>Ação</th>
    </tr>
    </tfoot>-->
  </table>
</div>

  <div class="modal fade" id='modal-lg'>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
<script src='<?=$_SESSION['caminho_1']?>/js/clientes.js'></script>