@extends('mails.mail_master')
@section('content')
     <div class="title">Taller cancelado</div>
    <div class="welcome">
    Hola, Junto con saludar y esperando que se encuentre muy bien, le informamos que uno
    de los talleres en los que {{ $data['alumn']['name'] }} participaría, ha sido cancelado.
    El detalle a continuación:            
    </div>
    <div >
        <div class="p-left"><span class="span-label"> Taller      </span>      : {{ $data['subject']['name'] }}</div>
        <div class="p-left"><span class="span-label"> Profesional </span> : {{ $data['teacher']['name'] }}</div>
        <div class="p-left"><span class="span-label"> Fecha       </span>      : {{ $data['date'] }}</div>
        <div class="p-left"><spa n class="span-label"> Hora </span>       : {{ $data['since'] }} - {{ $data['until'] }}</div>
        <div class="footer p-right"> Correo enviado desde VirtualAfterSchool / Desarrollado por <a href="https://www.proyectofejhu.cl/"><i>Proyecto Fejhu</i></a></div>
    </div>
@endsection

    