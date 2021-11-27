<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>[SUBJECT]</title>
            <style type="text/css">
                body {
                    padding: 50px 5px 150px 5px;                 
                }   
                .title {
                    font-size: 20px!important;
                    font-weight: 600;
                    padding: 10px 10px 20px!important;
                    color: #eea412;        
                    text-align: center; 
                }
                .welcome{                    
                    font-size: 15px!important;
                    font-weight: 300; 
                }
                   
                .p-right{
                    text-align: right;     
                }
                .p-left{
                    text-align: left;  
                        
                }
                .steps {
                }
                
                .span-label {
                    color: rgb(129, 129, 129);
                    font-size: 12px!important;
                    font-weight: 100;
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

                .fondo {
                    background-image: url("{{ asset('images/pasos/fondo.jpg') }}");
                    height: 100%;
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;                   
                }
                .span-virtaf {
                    font-weight: 600;
                    color: #ffae00!important;
                }
                .step-access {
                    margin-bottom: 30px;
                    display: grid!important;
                    grid-template-columns: 0.5fr 1fr!important;
                    grid-template-rows: 1fr!important;
                    grid-column-gap: 0px!important;
                    grid-row-gap: 0px!important;
                }

                .step-div1 { grid-area: 1 / 1 / 2 / 2!important; }
                .step-div2 { grid-area: 1 / 2 / 2 / 3!important; } 

                .fondo-paso0 {
                    
                    background-image: url("{{ asset('images/fondos/LOGO1.png') }}");
                    height: 300px;
                    width: 300px;
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: 100% auto;

                    -webkit-box-shadow: 9px 10px 5px -4px rgba(204,204,204,1);
                    -moz-box-shadow: 9px 10px 5px -4px rgba(204,204,204,1);
                    box-shadow: 9px 10px 5px -4px rgba(204,204,204,1);

                    border-radius: 200px 200px 200px 200px;
                    -moz-border-radius: 200px 200px 200px 200px;
                    -webkit-border-radius: 200px 200px 200px 200px;
                    border: 4px solid #ffae00;
                }
                .fondo-paso1 {
                    
                    background-image: url("{{ asset('images/pasos/paso1.png') }}");
                    height: 300px;
                    width: 300px;
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: 100% auto;
                    -webkit-box-shadow: 9px 10px 5px -4px rgba(204,204,204,1);
                    -moz-box-shadow: 9px 10px 5px -4px rgba(204,204,204,1);
                    box-shadow: 9px 10px 5px -4px rgba(204,204,204,1);

                    border-radius: 200px 200px 200px 200px;
                    -moz-border-radius: 200px 200px 200px 200px;
                    -webkit-border-radius: 200px 200px 200px 200px;
                    border: 4px solid #ffae00;

                }
                .fondo-paso2 {
                    
                    background-image: url("{{ asset('images/pasos/paso2.png') }}");
                    height: 300px;
                    width: 300px;
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: 100% auto;
                    -webkit-box-shadow: 9px 10px 5px -4px rgba(204,204,204,1);
                    -moz-box-shadow: 9px 10px 5px -4px rgba(204,204,204,1);
                    box-shadow: 9px 10px 5px -4px rgba(204,204,204,1);

                    border-radius: 200px 200px 200px 200px;
                    -moz-border-radius: 200px 200px 200px 200px;
                    -webkit-border-radius: 200px 200px 200px 200px;
                    border: 4px solid #ffae00;
                }

                .paso-descripcion {
                    font-size: 16px;
                    color: #444;
                    display: inline-block;
                    text-align: justify!important;
                }

                .span-title-column {
                    font-weight: 600;
                    color: #333;
                }
                .span-title-field {
                    font-weight: 600;
                    color: #ffae00;
                }

                .span-step-title {
                    padding: 5px 25px!important;
                    background-color: #ffae00;
                    color: #fff;
                    font-size: 22px;
                }

            </style>

          

    </head>
    <body class="fondo" paddingwidth="0" paddingheight="0" style=" padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0;" offset="0" toppadding="0" leftpadding="0">
        @yield('content')
    </body>     
</html>
    