<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="navbar-brand brand-link" href="<?php echo e(url('/')); ?>">
        <?php echo e(config('app.name', 'Laravel')); ?>

    </a>
    <!--    <a href="index3.html" class="brand-link">
          <img src="public/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
        </a>-->

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <p class="d-block text-white">Mashiur Rahaman</p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">                   
                <li class="nav-item">
                    <a href="<?php echo e(route('home')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-header">Pages</li>

                <li class="nav-item">
                    <a href="<?php echo e(route('gallery')); ?>" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Gallery</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('about')); ?>" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>About</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('user.arrayShow')); ?>" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>ShowArray</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('user.list')); ?>" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>UserList</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Charts
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ChartJS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Flot</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inline</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>uPlot</p>
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

<?php /**PATH D:\xampp 7.4.1\htdocs\Swapnoloke_Mashiur\Laravel-Practise\Mashiur_laravel\resources\views/layouts/sideBar.blade.php ENDPATH**/ ?>