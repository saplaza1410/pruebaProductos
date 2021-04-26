<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title','Prueba Tienda')</title>

        <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
        <link href="{{ asset('DataTables/datatables.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="home">STORE</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="home">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="products">Productos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="brands">Marcas</a>
                  </li>
                </ul>
              </div>
            </nav>
        </div>
        <div class="container">
          @yield('content')
        </div>

        <!-- JavaScript -->
        <script src="{{ asset(mix('js/app.js')) }}"></script>
        <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
        @yield('script')
    </body>
</html>
