  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=$_SESSION['caminho_1']?>/dist/img/AdminLTELogo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['login']; ?></a>
        </div>
      </div>    

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Faturamento
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="margin:0px;">
              <li class="nav-item" style="margin:0px;">
                <a href="<?=$_SESSION['caminho_2']?>Clientes/index" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Clientes</p>
                </a>
              </li>
              <li class="nav-item" style="margin:0px;">
                <a href="<?=$_SESSION['caminho_2']?>importaarquivos/index" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>UPLOAD</p>
                </a>
              </li>
              <li class="nav-item" style="margin:0px;">
                <a href="./index3.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li>
          <!------------->
          <li class="nav-item menu">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Manutenção
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="margin:0px;">
              <li class="nav-item" style="margin:0px;">
                  <a href="<?=$_SESSION['caminho_2']?>Menu/index" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menu</p>
                </a>
              </li>
              <li class="nav-item" style="margin:0px;">
                <a href="./index3.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SubMenu</p>
                </a>
              </li>
              <li class="nav-item" style="margin:0px;">
                <a href="./index2.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perfil</p>
                </a>
              </li>
              <li class="nav-item" style="margin:0px;">
                <a href="./index3.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuario</p>
                </a>
              </li>                            
              <li class="nav-item" style="margin:0px;">
                <a href="<?=$_SESSION['caminho_2']?>Acessos/index" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Gerenciar Acessos</p>
                </a>
              </li>
            </ul>
          </li>          
        </ul>  
      </nav>  

      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>