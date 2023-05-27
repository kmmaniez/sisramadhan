<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Welcome' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    @vite('resources/css/app.css')
  </head>
<body>
  <header class="py-2 w-100">
    <div class="container-fluid d-flex justify-content-between align-items-center px-5">
        <h1><strong><a href="/" class="text-decoration-none text-dark">Ramadhanku</a></strong></h1>
        @guest
          <a href="/login" class="btn btn-lg btn-none"><strong>Login</strong></a>          
          @endguest
        @auth
          <a href="/admin" class="btn btn-lg btn-none"><strong>Dashboard Admin</strong></a>          
        @endauth
    </div>
  </header>

    @yield('content')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	
<div id="g_id_onload"
     data-client_id="157261405624-vrmr3f4coa9jk8ivpn6evsk8fcg4rt8q.apps.googleusercontent.com"
     data-context="signin"
     data-login_uri="http://localhost:8000/login"
     data-itp_support="true">
</div>
</body>
    @vite('resources/js/app.js')
</html>
