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
                    font-size: 20px!important;
                    font-weight: 800;
                    padding: 10px 10px 20px!important;
                    color: #eea412;        
                    text-align: center;            
                }
                .welcome{
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

                .fondo {
                /* The image used */
                background-image: url("{{ asset('images/mail.jpg') }}");

                /* Full height */
                height: 100%;
                /* Center and scale the image nicely */
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                }

            </style>

          

    </head>
    <body class="fondo" paddingwidth="0" paddingheight="0" style=" padding-top: 0; padding-bottom: 0; padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;" offset="0" toppadding="0" leftpadding="0">
        @yield('content')
    </body>     
</html>
    