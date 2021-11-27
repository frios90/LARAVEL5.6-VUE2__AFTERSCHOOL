<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>[SUBJECT]</title>
            <style type="text/css">
                body {
                    padding: 50px 100px 150px 150px;                   
                 
                }   
                .title {
                    font-size: 25px!important;
                    font-weight: 800;
                    padding: 10px 10px 50px!important;
                    color: #eea412;        
                    text-align: center;            
                }
                .center{
                    text-align: center;     
                }
                .p-right{
                    text-align: right;     
                }
                .p-left{
                    text-align: left;     
                }
                .span-label {
                    color: rgb(129, 129, 129);
                    font-size: 15px!important;
                    font-weight: 300;
                }
                .footer {
                    margin-top: 25px!important;
                    background-color:#eea412!important; 
                    color: white!important; 
                    padding: 5px 25px 5px  !important;
                }
                .head {
                    font-size: 16px!important;
                    background-color:#eea412!important; 
                    color: white!important; 
                    padding: 6px 25px 6px 25px!important;
                }
                .fondo{
                   
                }

            </style>

          

    </head>
    <body paddingwidth="0" paddingheight="0"   style=" background-image: url('imagenes/mail.jpg'); padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;" offset="0" toppadding="0" leftpadding="0">
        <div class="head p-left"> Virtual After School</div>
        <div class="title">Bienvenido/a a Virtual After School</div>
        <div class="Center">
            <i>{{ $user['name'] }}</i> 
            Nuestra comunidad te da la más cordial bienvenida. Acontinuación te presentamos
            tus credenciales de acceso:            
        </div>
        <div >
            <div class="p-left"><span class="span-label"> Usuario </span>    : {{ $user['email'] }}</div>
            <div class="p-left"><span class="span-label"> Contraseña </span> : {{ $user['text_pass'] }}</div>
            <div class="p-left"><span class="span-label"> Acceso </span>     : <a href="https://www.virtualafterschool.cl/"><i>Virtual After School</i></a> </div>
            <div class="footer p-right"> Correo enviado desde VirtualAfterSchool / Desarrollado por <a href="http://www.fejhu.cl/"><i>Fejhu</i></a></div>
        </div>
    </body>     
</html>
    