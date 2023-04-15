<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    @vite('resources/css/app.css')
  </head>
<body>
  <header class="py-2 w-100">
    <div class="container-fluid d-flex justify-content-between align-items-center px-5">
        <h1><strong><a href="/" class="text-decoration-none text-dark">Ramadhankus</a></strong></h1>
        <a href="/login" class="btn btn-lg btn-none"><strong>Login</strong></a>
    </div>
  </header>

    @yield('content')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
    @vite('resources/js/app.js')
</html>