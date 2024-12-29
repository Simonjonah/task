<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin/home') }}" class="brand-link">
    
        <img src="{{ asset('assets/dist/img/logo.jpg') }}" alt="webLTE Logo" class="brand-image "
        style="opacity: .8">
        
   <span class="brand-text font-weight-light">TASK</span>
 </a>
 

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/logo.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Task</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/home') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard </p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Project Section
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/addprojects') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Projects</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/viewprojects') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Projects</p>
                </a>
              </li>
             
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Task Section
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/addtask') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Task</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/viewtask') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Task</p>
                </a>
              </li>
             
            </ul>
          </li>
          

          <li class="nav-item">
            <a href="{{ url('admin/viewusers') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Used Users</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ url('admin/logout') }}" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p>logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>