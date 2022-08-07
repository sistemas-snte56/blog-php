<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog del viajero CMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Plugins de CSS --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    {{-- Bootstrap 4 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    {{-- CSS AdminLTE --}}
    <link rel="stylesheet" href="{{url('/')}}/css/plugins/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="{{url('/')}}/css/plugins/adminlte.min.css">
    
    {{-- Google Font: Source Sans Pro --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    {{-- Plugins de JS --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{url('/')}}/js/plugins/jquery.overlayScrollbars.min.js"></script>
    <script src="{{url('/')}}/js/plugins/adminlte.js"></script>
    


</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('modulos.header')
        @include('modulos.sidebar')
        @yield('content')
        @include('modulos.footer')
    </div>
</body>
</html>