<!DOCTYPE html>
<html lang="es">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Sistema de facturación en laravel 8.">
  <meta name="keywords" content="Sistema, Facturación, Sistema de Facturación, Sistema en Laravel 8">
  <meta name="author" content="LR Code - Facturación">
  <title>@yield('title') - LRCode | Facturación</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="assets/css/stylelogin.css">
</head>
<body>
  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Sistema de Facturación</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menú</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            @guest
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('login.index') }}">Iniciar sesión</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login.register') }}">Registrar usuario</a>
              </li>
            @endguest
            @auth
              @if (Auth::user()->is_admin == true)
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ route('admin.index') }}">Inicio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ URL::to('dashboard/admin/users') }}">Gestionar usuarios</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ URL::to('dashboard/admin/products') }}">Gestionar productos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ URL::to('dashboard/admin/invoices') }}">Gestionar Facturas</a>
                </li>
              @else
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ route('dashboard.index') }}">Inicio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('dashboard.index') }}">Ver productos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('dashboard.index') }}">Ver facturas</a>
                </li>
                @endif
                <form style="display: inline; cursor: pointer" action="{{ route('dashboard.logout') }}" method="post">
                  @csrf
                  <li class="nav-item">
                    <a class="nav-link pe-auto" onclick="this.closest('form').submit()">Cerrar sesión </a>
                  </li>
                </form>
            @endauth
          </ul>
        </div>
    </div>
  </nav>
    @yield('content')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>