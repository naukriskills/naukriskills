<div>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">Naukri Skills</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ auth::user()->name }}</a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">                    
                    <li class="nav-item">
                        <a href="{{ route('admin/dashboard') }}" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>                       
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>Controls
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>                    
                    <li class="nav-item">
                        <a href="{{ route('admin.category')}}" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                Category
                                <span class="badge badge-info right">2</span>
                            </p>
                        </a>
                    </li> 
                    <li class="nav-header">Controls</li>
                    <li class="nav-item">
                        <a href="{{ route('admin.roles')}}" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                Roles
                                <span class="badge badge-info right">2</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.permission')}}" class="nav-link">
                            <i class="nav-icon far fa-image"></i>
                            <p>
                                Permissions
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-columns"></i>
                            <p>
                                Users
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">MISCELLANEOUS</li>
                    <li class="nav-item">
                        <a href="iframe.html" class="nav-link">
                            <i class="nav-icon fas fa-ellipsis-h"></i>
                            <p>Listing</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="https://adminlte.io/docs/3.1/" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>Company Category</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</div>