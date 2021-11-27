<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <title>VirtAf</title>  
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="author" content="Francisco Javier Rios Castillo">
        <link rel="shortcut icon" type="image/x-icon" href="images/fondos/LOGO1.png">
        <link rel="stylesheet" href="css/web-bootstrap.min.css">  
        <link rel="stylesheet" href="web-style.css">
        <link rel="stylesheet" href="css/web-versions.css">
        <link rel="stylesheet" href="css/web-responsive.css">
        <link rel="stylesheet" href="css/web-custom.css">
        <link rel="stylesheet" href="css/web-special-font.css">
        <script src="js/web-modernizer.js"></script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-176758766-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-176758766-1');
        </script>
    </head>
    <body class="host_version section-bg-1">        
        @include('web.access')
        @include('web.header')
        @yield('content')  
        @include('web.footer') 
    </body>
</html>