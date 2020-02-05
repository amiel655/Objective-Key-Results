<!DOCTYPE html>

    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
            
                <!-- CSRF Token -->
                <meta name="csrf-token" content="{{ csrf_token() }}">
            
                <title>{{ config('app.name', 'Laravel') }}</title>

                <!-- jQuery -->
    <script src="/js/vendors/jquery/dist/jquery.min.js"></script>
                <!-- Fonts -->
                <link rel="dns-prefetch" href="https://fonts.gstatic.com">
                <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
            
    <title>Gentelella Alela! | </title>

      <!-- Bootstrap -->
      <link href="/css/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Font Awesome -->
      <link href="/css/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <!-- NProgress -->
      <link href="/css/vendors/nprogress/nprogress.css" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <!-- Custom Theme Style -->
      <link href="/css/build/css/custom.css" rel="stylesheet">
  </head>

  <body class="nav-md">

@yield('content')


    <!-- Bootstrap -->
    <script src="/js/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/js/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/js/vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="/js/build/js/custom.min.js"></script>
  </body>
</html>
