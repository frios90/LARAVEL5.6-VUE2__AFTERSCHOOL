@extends('mails.mail_master')
@section('content')
    <div class="title">Cambio de Horario</div>
    <div class="welcome">       
        Hola, Junto con saludar y esperando que se encuentre muy bien, 
        queremos notificar que el taller de : <br>
        {{ $data['date'] }} {{ $data['since'] }} - {{ $data['until'] }},     <br>
        se ha cambiado para el siguiente horario: <br>
        {{ $data['old_date'] }} {{ $data['old_since'] }} - {{ $data['old_until'] }}.



    </div>
    <div >       
        <div class="footer p-right"> Correo enviado desde VirtualAfterSchool / Desarrollado por <a href="https://www.proyectofejhu.cl/"><i>Proyecto Fejhu</i></a></div>
    </div>
@endsection

    