<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LIVRARIA</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/template/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/template/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/template/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="/template/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/template/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="/template/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/template/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/template/assets/images/favicon.png" />
</head>

<body>
    <div. class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
            <style>
                .logo {
                    width: 20px;
                    height: 20px;
                }
            </style>
            <!--<a class="sidebar-brand brand-logo" href="{{ url('/dashboard') }}">
                <img src="{{ asset('images/icon2.svg') }}" alt="logo" class="logo" />
            </a>
            <a class="sidebar-brand brand-logo-mini" href="{{ url('/dashboard') }}">
                <img src="{{ asset('images/icon2.svg') }}" alt="logo" class="logo" />
            </a>-->
        </div>
            <ul class="nav">
                <li class="nav-item profile">
                    <div class="profile-desc">
                        <div class="profile-pic">
                            <div class="count-indicator">
                                <div class="count-indicator">
                                    <i class="mdi mdi-account-circle text-white mdi-36px"></i>
                                </div> <!-- TODO: Aqui é a foto de perfil -->
                                <span class="count bg-success"></span>
                            </div>
                            <div class="profile-name">
                                <h5 class="mb-0 font-weight-normal">{{ Auth::user()->name }}</h5>
                                <span>Cliente</span>
                            </div>
                        </div>
                        
                        <!--TODO: Botão de Sair-->
                        <form method="POST" action="{{ route('logout') }}" class="d-inline" style="margin-top: 15px;">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0" title="Sair">
                                <i class="mdi mdi-logout text-danger" style="font-size: 15px;"></i>
                            </button>
                        </form>

                        <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                            aria-labelledby="profile-dropdown">
                        </div>
                    </div>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ url('/clientes') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-account-multiple"></i>
                        </span>
                        <span class="menu-title">Clientes</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ url('/livros') }}">
                        <span class="menu-icon">
                            <i class="mdi mdi-account-multiple"></i>
                        </span>
                        <span class="menu-title">Livros</span>
                    </a>
                </li>
                <li class="nav-item menu-items">
                    <a class="nav-link" href="{{ url('/dashboard') }}"> 
                        <span class="menu-icon">
                            <i class="mdi mdi-speedometer"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
            </ul>
        </nav>
        
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row"> 
        </div>
        <link rel="stylesheet" href="{{ asset('/template/css/dashboard.css') }}">
            <!-- partial -->
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar p-0 fixed-top d-flex flex-row">
                <!-- Logo para telas pequenas -->
                <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href=""{{ url('/dashboard') }}">
                        <img src="assets/images/logonova-mini" alt="logo" />
                    </a>
                </div>
                <!-- Menu principal -->
                <div class="navbar-menu-wrapper flex-grow d-flex align-items-center justify-content-between px-3">
                    <!-- Botões de menu -->
                    <div class="d-flex align-items-center">
                        <button class="navbar-toggler align-self-center me-3" type="button" data-toggle="minimize">
                            <span class="mdi mdi-menu"></span>
                        </button>
                    </div>
                </div> 
            </nav>
              @yield('conteudo')
            </div>

            </div>
           
        </div>
