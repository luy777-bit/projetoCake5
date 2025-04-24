  <div class="card-header">
      <div class="card-body">
        <form class="form-horizontal" enctype="multipart/form-data" method="POST">
              <h3>Pesquisa Cliente</h3>
              <!--<label for="inputEmail3" class="col-sm-1 col-form-label">CNPJ/Cliente</label>-->
              <div class="col-sm-4">
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="arquivo" >
                    </div>
                    <!--<div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>-->
                  </div>
              </div>
              <div class="card-footer">
            <button type="submit" class="btn btn-info">Carregar</button>
          </div>          
        </form>
      </div>
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


