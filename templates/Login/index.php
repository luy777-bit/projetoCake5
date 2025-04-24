<style>
  .navbar, .sidebar-dark-primary, .main-footer, .content-header{display: none;}
  .content-wrapper{background-color: #fff; margin-left: 0px !important;}
</style>
<!-- Horizontal Form -->
<div class="card card-info" style="width:40%; margin:0 auto; margin-top: 5%;">
  <div class="card-header">
    <!--<h3 class="card-title">Login</h3>-->
    <h1>Login</h1>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form class="form-horizontal" method="POST">
    <div class="card-body">
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="login" name="login" placeholder="Login">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="senha" name="senha" placeholder="Password">
        </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      <button type="submit" class="btn btn-info">Entrar</button>
    </div>
    <!-- /.card-footer -->
  </form>
</div>
<!-- /.card -->