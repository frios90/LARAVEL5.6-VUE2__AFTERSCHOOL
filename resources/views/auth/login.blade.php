<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sofag</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="template/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="template/vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="template/vendors/base/vendor.bundle.base.css">
  <link rel="stylesheet" href="{{ asset('css/owner.css') }}">

  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="template/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="template/images/favicon.png" />
</head>

<body class="body-log-in">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper body-log-in d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <h3>SOFAG</h3> <small>Software de análisis y gestión de gastos</small>
              </div>
              <h4>¡Hola! empecemos</h4>
              <h6 class="font-weight-light">Inicia sesión para continuar.</h6>
              <form class="pt-3" method="POST" action="{{ route('/sing-in') }}">
                  @csrf
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="email" name="email" value=" {{old('email')}} " placeholder="Ingrese su correo de usuario" >
                  {!! $errors->first('email', '<span class="help-block">:message</span>') !!}                </div>
                <div class="form-group {{$errors->has('password') ? 'danger' : ''}} ">
                  <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Ingrese su contraseña">
                  {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="mt-3">
                  <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="Ingresar"/>
                </div>
               
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <script src="template/js/jquery-3.4.1.js"></script>
  <script src="template/vendors/base/vendor.bundle.base.js"></script>
  <script src="template/js/off-canvas.js"></script>
  <script src="template/js/hoverable-collapse.js"></script>
  <script src="template/js/template.js"></script>
  
</body>

</html>
