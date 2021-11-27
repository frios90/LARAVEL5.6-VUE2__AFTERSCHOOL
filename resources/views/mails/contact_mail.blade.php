
@extends('mails.mail_master')
@section('content')
        <div class="title">Consulta Talleres</div>
            <div class="welcome">       
                Hola, Junto con saludar y esperando que se encuentre muy bien,
                le notificamos de una nueva solicitud de contacto:            
            </div>
            <div class="center"><span class="span-label"> Nombre   </span> : {{ $msg['name'] }}</div>
            <div class="center"><span class="span-label"> País  </span> : {{ $msg['country'] }}</div>
            <div class="center"><span class="span-label"> Localidad  </span> : {{ $msg['location'] }}</div>
            <div class="center"><span class="span-label"> Teléfono </span> : {{ $msg['phone'] }}</div>
            <div class="center"><span class="span-label"> Correo   </span> : {{ $msg['mail'] }}</div>
            <div class="center"><span class="span-label"> Mensaje  </span> : {{ $msg['message'] }}</div>
            <div class="footer p-right"> Correo enviado desde VirtualAfterSchool <br> <a href="https://www.proyectofejhu.cl/"><i>Proyecto Fejhu</i></a></div>
        </div>
@endsection
