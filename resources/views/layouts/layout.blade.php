<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistema de inventario</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/mdb.min.css" rel="stylesheet">
    <link href="css/style.min.css" rel="stylesheet">
</head>

<body class="grey lighten-3">

    <!--Navegación principal-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
            <div class="container-fluid">

                <!-- Marca -->
                <a class="navbar-brand waves-effect" href="/home">
                    <strong class="blue-text">Sistema de inventario</strong>
                </a>

                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left 
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link waves-effect" href="#">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">About
                                MDB</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/getting-started/download/"
                                target="_blank">Free
                                download</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect" href="https://mdbootstrap.com/education/bootstrap/" target="_blank">Free
                                tutorials</a>
                        </li>
                    </ul>-->

                    <!-- Right -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown1" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Menú <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown1">
                                @can('usuarios.index')
                                    <a id = "usuariosMenu" href="/usuarios" class="nav-link">
                                        <i class="fa fa-user mr-3"></i>Usuarios</a>
                                @endcan
                                @can('roles.index')
                                <a id = "rolesMenu" href="/roles" class="nav-link">
                                    <i class="fa fa-user-shield mr-3"></i>Roles</a>
                                @endcan
                                @can('permisos.index')
                                <a id = "permisosMenu" href="/permisos" class="nav-link">
                                    <i class="fas fa-lock-open mr-3"></i>Permisos</a>
                                @endcan
                                @can('tipo-bebida.index')
                                <a id = "tbMenu" href="/tipo-bebida" class="nav-link">
                                    <i class="fas fa-wine-glass mr-3"></i>Tipo de bebida</a>
                                @endcan
                                @can('activo.index')
                                <a id = "activoMenu" href="/activo" class="nav-link">
                                    <i class="far fa-check-circle mr-3"></i>Activos</a>
                                @endcan
                                @can('empresa.index')
                                <a id = "empresaMenu" href="/empresa" class="nav-link">
                                    <i class="far fa-building mr-3"></i>Empresas</a>
                                @endcan
                                @can('producto.index')
                                <a id = "productoMenu" href="/producto" class="nav-link">
                                    <i class="fas fa-boxes mr-3"></i>Productos</a>
                                @endcan
                                @can('presentacion.index')
                                <a id = "presentacionMenu" href="/presentacion" class="nav-link">
                                    <i class="fas fa-wine-bottle mr-3"></i>Presentaciones</a>
                                @endcan
                            </div>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Salir') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    <!--
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a href="https://www.facebook.com/mdbootstrap" class="nav-link waves-effect" target="_blank">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://twitter.com/MDBootstrap" class="nav-link waves-effect" target="_blank">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="https://github.com/mdbootstrap/bootstrap-material-design" class="nav-link border border-light rounded waves-effect"
                                target="_blank">
                                <i class="fa fa-github mr-2"></i>MDB GitHub
                            </a>
                        </li>
                    </ul>-->

                </div>

            </div>
        </nav>
        <!-- Navbar -->

        <!-- Sidebar -->
        <div class="sidebar-fixed position-fixed" style="width: 240px !important;">

            <a class="logo-wrapper waves-effect">
                <img src="https://mdbootstrap.com/img/logo/mdb-email.png" class="img-fluid" alt="">
            </a>

            <div class="list-group list-group-flush">
                <a id = "home" href="/home" class="list-group-item list-group-item-action waves-effect">
                    <i class="fas fa-chart-pie mr-3"></i>Dashboard
                </a>
                @can('usuarios.index')
                    <a id = "usuarios" href="/usuarios" class="list-group-item list-group-item-action waves-effect">
                        <i class="fa fa-user mr-3"></i>Usuarios</a>
                @endcan
                @can('roles.index')
                    <a id = "roles" href="/roles" class="list-group-item list-group-item-action waves-effect">
                        <i class="fa fa-user-shield mr-3"></i>Roles</a>
                @endcan
                @can('permisos.index')
                    <a id = "permisos" href="/permisos" class="list-group-item list-group-item-action waves-effect">
                        <i class="fas fa-lock-open mr-3"></i>Permisos</a>
                @endcan
                @can('tipo-bebida.index')
                    <a id = "tb" href="/tipo-bebida" class="list-group-item list-group-item-action waves-effect">
                        <i class="fas fa-wine-glass mr-3"></i>Tipo de bebida</a>
                @endcan
                @can('activo.index')
                    <a id = "activo" href="/activo" class="list-group-item list-group-item-action waves-effect">
                        <i class="far fa-check-circle mr-3"></i>Activos</a>
                @endcan
                @can('empresa.index')
                    <a id = "empresa" href="/empresa" class="list-group-item list-group-item-action waves-effect">
                        <i class="far fa-building mr-3"></i>Empresas</a>
                @endcan
                @can('producto.index')
                    <a id = "producto" href="/producto" class="list-group-item list-group-item-action waves-effect">
                        <i class="fas fa-boxes mr-3"></i>Productos</a>
                @endcan
                @can('presentacion.index')
                    <a id = "presentacion" href="/presentacion" class="list-group-item list-group-item-action waves-effect">
                        <i class="fas fa-wine-bottle mr-3"></i>Presentaciones</a>
                @endcan
                

            </div>

        </div>
        <!-- Sidebar -->

    </header>
    <!--Navegación principal-->

    <!--Main layout-->
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">
            @yield('content')
        </div>
    </main>

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!--<script type="text/javascript" src="js/activar.js"></script>-->
    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
    </script>
    @yield('scripts')

</body>

</html>