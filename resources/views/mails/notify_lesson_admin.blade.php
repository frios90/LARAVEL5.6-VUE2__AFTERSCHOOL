@extends('mails.mail_master')
@section('content')
     <div class="title">Resumen Nuevo Taller</div>
    <div class="welcome">       
    Hola, Junto con saludar y esperando que se encuentre muy bien, dejamos el detalle del curso planificado:            
    </div>
    <div >
        <div class="p-left"><span class="span-label"> Fecha </span> : {{ $data['date'] }}</div>
        <div class="p-left"><span class="span-label"> Hora </span> : {{ $data['since'] }} - {{ $data['until'] }}</div>
        <div class="p-left"><span class="span-label" style="color: blue!important;"> Zoom link </span> : {{ $data['zoom_link'] }}</div>
        <div class="p-left"><span class="span-label"> Taller</span> : {{ $data['subject']['name'] }}</div>
        @if (count($data['list_days_to_repeat']) > 0)
            <div class="p-left"><span class="span-label"> El taller tambien se realizará los siguientes días:</span></div>
            @foreach($data['list_days_to_repeat'] as $day)
                {{ $day }} <br>
            @endforeach

        @endif
        <div class="p-left"><span class="span-label"> Profesional</span> : {{ $data['teacher']['name'] }}</div>
        <div class="p-left"><span class="span-label"> Aprendices</span>: 
            @foreach($data['lesson_alumns'] as $alumn)
                -{{ $alumn['name'] }}
            @endforeach
        </div>
        <div class="footer p-right"> Correo enviado desde VirtualAfterSchool / Desarrollado por <a href="https://www.proyectofejhu.cl/"><i>Proyecto Fejhu</i></a></div>
    </div>
@endsection

    