@extends('web.layout')
@section('content')
    <div class="all-title-box">
        <div class="container text-center">
            <h1>
                <span>t</span>
                <span>r</span>
                <span>a</span>
                <span>b</span>
                <span>a</span>
                <span>j</span>
                <span>a</span>
                <span> </span>
                <span>c</span>
                <span>o</span>
                <span>n</span>
                <span> </span>
                <span>n</span>
                <span>o</span>
                <span>s</span>
                <span>o</span>
                <span>t</span>
                <span>r</span>
                <span>@</span>
                <span>s</span>

            </h1>
        </div>
    </div>
    <div class="container"> 
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="post-media wow fadeIn contenedor">
                    <img src="images/fondos/equipo.jpg" alt="" class="img-fluid img-rounded imagen">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="message-box formulario-wwu">
                    <form id="wwu">						
                        @csrf    
                        <div class="">
                            <div class="col-md-9 col-sm-12">
                                <input class="form-control" id="wwu-name" name="wwu-name" type="text" placeholder="ingrese su nombre">
                                <span id="error-nombre" style="display:none; color: red; font-size:9!importan;">Debes ingresar tu <b>Nombre</b> </span>
                            </div>
                        </div>  
                        <br>
                        <div class="">
                            <div class="col-md-9 col-sm-12">
                                <input class="form-control" id="wwu-rut" name="wwu-rut" type="text" placeholder="ingrese su rut">
                                <span id="error-rut" style="display:none; color: red; font-size:9!importa;">Debes ingresar un <b>Rut</b> válido</span>

                            </div>
                        </div>  
                        <br>
                        <div class="">
                            <div class="col-md-9 col-sm-12">
                                <input class="form-control" id="wwu-prof" name="wwu-prof" type="text" placeholder="ingrese su profesión">
                                <span id="error-profesion" style="display:none; color: red; font-size:9!important;">Debes ingresar tu <b>Profesión</b> </span>

                            </div>
                        </div>
                        <br>
                        <div class="">
                            <div class="col-md-9 col-sm-12">
                                <input class="form-control" id="wwu-esp" name="wwu-esp" type="text" placeholder="ingrese su especialidad">
                                <span id="error-especialidad" style="display:none; color: red; font-size:9!important ;">Debes ingresar tu <b>Especialidad</b> </span>

                            </div>
                        </div> 
                        <br> 
                        <div class="">
                            <div class="col-md-9 col-sm-12">
                                <input class="form-control" id="wwu-time" name="www-time" type="text" placeholder="ingrese su disponibilidad horaria">
                                <span id="error-tiempo" style="display:none; color: red; font-size:9!importan;">Debes ingresar tu <b>Disponibilidad</b> de tiempo</span>

                            </div>
                        </div> 
                        <br> 
                        <div class="">
                            <div class="col-md-9 col-sm-12">
                                <input class="form-control" id="wwu-mail" name="wwu-mail" type="text" placeholder="ingrese su correo">
                                <span id="error-correo" style="display:none; color: red; font-size:9!importan;">Debes ingresar tu <b>Correo</b> </span>
                            </div>
                        </div>  
                        <br>
                        <div class="">
                            <div class="col-md-9 col-sm-12">
                                <input class="form-control" id="wwu-tel" name="wwu-tel" type="text" placeholder="ingrese su número de teléfono o celular">
                                <span id="error-telefono" style="display:none; color: red; font-size:9!important ;">Debes ingresar tu número de <b>Télefono</b> </span>
                            </div>
                        </div>  
                        <br>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <input type="submit" class="btn-wwu" value="Enviar"/>
                            </div>
                            <div class="col-md-8 col-sm-12">
                                <div id="msj-success-wwu" style="display:none" class="alert alert-success alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    Tu mensaje ha ido enviado con <b>éxito</b>. Si gustas tambien puedes enviarnos tu <b>currículum</b> a <b>virtaf@virtualafterschool.cl</b>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>            
        </div>
    </div>
  
    

@endsection
