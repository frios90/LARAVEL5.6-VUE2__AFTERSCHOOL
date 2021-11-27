
@extends('mails.mail_master')
@section('content')
        <div class="title">Nueva solicitud de Profesional</div>
        <div class="welcome">       
            Hola, Junto con saludar y esperando que se encuentre muy bien,
            le notificamos de una nueva solicitud para trabajar en VirtAf de :            
        </div>
        <div class="center"><span class="span-label"> Nombre   </span> : {{ $msg['name'] }}</div>
        <div class="center"><span class="span-label"> Rut </span> : {{ $msg['rut'] }}</div>
        <div class="center"><span class="span-label"> Especialidad   </span> : {{ $msg['esp'] }}</div>
        <div class="center"><span class="span-label"> Disponibilidad  </span> : {{ $msg['time'] }}</div>
        <div class="center"><span class="span-label"> Correo </span> : {{ $msg['mail'] }}</div>
        <div class="center"><span class="span-label"> Télefono  </span> : {{ $msg['tel'] }}</div>
        <div class="center"><span class="span-label"> Disponibilidad  </span> : {{ $msg['time'] }}</div>


       
        <div class="footer p-right"> Correo enviado desde VirtualAfterSchool <br> por <a href="https://www.proyectofejhu.cl/"><i>Proyecto Fejhu</i></a></div>
          
        </div>
@endsection
