@extends('mails.mail_master')
@section('content')
    <div class="title">Nuevo Usuario</div>
    <div class="welcome">
        <b>{{ $user['name'] }}</b>, 
        Bienvenido/a a Virtual After School, nuestra comunidad te da la más cordial bienvenida.
        <br> Para porder ingresar a la plataforma debes seguir los siguientes pasos      
    </div>
    <br><br><br>
    <div>

        <div class="steps">        
            <div class="step-access">
                <span class="fondo-paso0">  
                    <span class="span-step-title">Paso 1</span>              
                </span>
                <span class="paso-descripcion">
                    <span>
                        Haz click <a href="https://www.virtualafterschool.cl" class="">AQUI</a> para ingresar a la aplicación.
                    </span>
                </span>               
            </div>         

            <div class="step-access"> 
                <div class="fondo-paso1">
                  <span class="span-step-title">Paso 2</span>
                </div>              
                <div class="paso-descripcion">
                    <span>
                        Una vez en la Web de VirtAf, haz click a la opción <br>
                        <span class="span-virtaf">"Accesso a Talleres"</span> <br>
                        ubicada en el menu superio derecho de la pantalla. <br>
                    </span>
                </div>
               
            </div>
            <div class="step-access">      
                <div class="fondo-paso2">  
                    <span class="span-step-title">Paso 3</span>              
                </div>         
                <div class="paso-descripcion">
                    <span>
                        En seguida se abrirá una ventana para ingresar a la <br>
                        intranet de VirtAf. En esa deberás ingresar con <br>
                        las credenciales detalladas en este correo. <br>
                    </span>
                    <br>
                    <span class="span-title-column">Usuario</span> :    <span class="span-title-field"> {{ $user['email'] }} </span>
                    <br>
                    <span class="span-title-column">Contraseña</span> : <span class="span-title-field"> {{ $user['text_pass'] }} </span>
                    <br>
                    
                </div>
                
            </div>
        </div>
       

        <div class="footer p-right"> Correo enviado desde VirtualAfterSchool <br> Desarrollado por <a href="https://www.proyectofejhu.cl/"><i>Proyecto Fejhu</i></a></div>
    </div>
@endsection

    