<body class="hold-transition sidebar-mini layout-fixed">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo e(route('home')); ?>" class="nav-link">Home</a>
                </li>
                <?php if(auth()->guard()->guest()): ?>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo e(route('login')); ?>" class="nav-link"><?php echo e(__('Login')); ?></a>
                </li>
                    <?php if(Route::has('register')): ?>
                    <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo e(route('register')); ?>" class="nav-link"><?php echo e(__('Register')); ?></a>
                    <?php endif; ?>

            </ul>
                <?php else: ?>
            <ul class="navbar-nav ml-auto">
                
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <?php echo e(Auth::user()->first_name); ?>

                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                           onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                            <?php echo e(__('Logout')); ?>

                        </a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </li>
                
            </ul>
                <?php endif; ?>
        </nav>
        <!-- /.navbar --><?php /**PATH D:\xampp 7.4.1\htdocs\Swapnoloke_Mashiur\Laravel-Practise\Mashiur_laravel\resources\views/layouts/header.blade.php ENDPATH**/ ?>