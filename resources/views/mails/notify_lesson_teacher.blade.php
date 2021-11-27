@extends('mails.mail_master')
@section('content')
    <div class="title">Nuevo taller para Profesional  </div>
    <div class="welcome">       
        Estimado profesional {{ $data['teacher']['name'] }}, junto con saludar y esperando que se encuentre muy bien, le enviamos el detalle del taller planificado:            
    </div>
    <div >
        <div class="p-left"><span class="span-label"> Taller</span> : {{ $data['subject']['name'] }}</div>
        <div class="p-left"><span class="span-label"> Fecha </span> : {{ $data['date'] }}</div>
        <div class="p-left"><span class="span-label"> Hora </span> : {{ $data['since'] }} - {{ $data['until'] }}</div>
       
        <div class="p-left"><span class="span-label"> Aprendices</span>: 
            @foreach($data['lesson_alumns'] as $alumn)
                -{{ $alumn['name'] }}
            @endforeach
        </div>
        @if (count($data['list_days_to_repeat']) > 0)
            <div class="p-left"><span class="span-label"> Asiste al taller también los siguientes días:</span></div>
            @foreach($data['list_days_to_repeat'] as $day)
                {{ $day }} <br>
            @endforeach

        @endif
        <div class="footer p-right"> Correo enviado desde VirtualAfterSchool / Desarrollado por <a href="https://www.proyectofejhu.cl/"><i>Proyecto Fejhu</i></a></div>
    </div>
@endsection

    