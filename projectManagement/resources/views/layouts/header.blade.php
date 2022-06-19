<body class="hold-transition sidebar-mini layout-fixed">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Home</a>
            </li>
          
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">{{ __('Register') }}</a>
            </li>
            @endif

        </ul>
        <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#"
                       onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="#" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->

