@extends('mails.mail_master')
@section('content')
     <div class="title">Nuevo Taller</div>
    <div class="welcome">
        <i>{{ $user['name'] }}</i> 
        Estos son los datos del taller planificado:            
    </div>
    <div >
        <div class="p-left"><span class="span-label"> Fecha </span> : {{ $data['date'] }}</div>
        <div class="p-left"><span class="span-label"> Hora </span> : {{ $data['since'] }} - {{ $data['until'] }}</div>

        <div class="footer p-right"> Correo enviado desde VirtualAfterSchool / Desarrollado por <a href="https://www.proyectofejhu.cl/"><i>Proyecto Fejhu</i></a></div>
    </div>
@endsection

    