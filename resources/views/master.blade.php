<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Intranet | VirtAf</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="../images/fondos/LOGO1.png">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">         
    </head>
    <body >  
        <div id="app">
            <app-nav></app-nav>   
            <app-menu-web></app-menu-web>
            <app></app>        
        </div>    
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/jquery-3.1.0.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>   
    </body>
</html>
