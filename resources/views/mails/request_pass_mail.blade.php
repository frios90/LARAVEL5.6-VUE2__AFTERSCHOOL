@extends('mails.mail_master')
@section('content')
     <div class="title">Restablecer contraseña</div>
    <div class="welcome">       
        Estimado  {{ $data['name'] }}, junto con saludar y esperando que se encuentre muy bien, 
        le enviamos el siguiente link para reestablecer su contraseña:            
    </div>
    <div >
        <div class="p-left"><span class="span-label"> Reestablecer</span> : <a href="https://www.virtualafterschool.cl/changepass?user={{ $data['email'] }}&token={{ $data['token'] }}">Link</a></div>
        <div class="footer p-right"> Correo enviado desde VirtualAfterSchool / Desarrollado por <a href="https://www.proyectofejhu.cl/"><i>Proyecto Fejhu</i></a></div>
    </div>
@endsection

    