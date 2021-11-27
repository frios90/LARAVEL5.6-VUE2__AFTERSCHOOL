@extends('web.layout_mail')
@section('content')
<footer class="footer" id="footer" style="height:100%">
        <div class="container">
            <div class="row">              
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3 style="color:black!important">Reestablecer su contraseña</h3>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="Login">
                                <form id="repass" class="form-horizontal">
                                    <input type="hidden"id="token" value="{{ csrf_token() }}">  
                                    <div class="form-group">
                                        <label for="" class="">Ingrese una contraseña</label>
                                        <div class="col-sm-12">
                                            <input class="form-control" id="pass" placeholder="" type="password">   
                                            <span id="error-pass" style="display: none; color: red; font-size: 11px;"></span>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="">Reingrese la contraseña</label>
                                        <div class="col-sm-12">
                                            <input class="form-control" id="pass2" placeholder="" type="password">
                                        </div>
                                    </div> 
                                    <div class="">
                                        <span id="success-change" style="color:#8ec63f; display: none;">La contraseña ha sido cambiada exitosamente. </span>
                                    </div>                                                              
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <input id="send-btn" type="submit" class="btn btn-contact" value="Cambiar Contraseña"/>
                                            <a href="https://www.virtualafterschool.cl" style="display: none; color:#8ec63f" id="go-to-web" class="btn btn-contact"/>Ir a VirtAf</a>

                                        </div>
                                    </div>
                                </form>
                            </div>				
                        </div>
                    </div>
                </div>           
            </div>
        </div>
    </footer>
    <div class="copyrights">
        <div class="container">
            <div class="footer-distributed">
                <div class="footer-center">
                   Desarrollado por <a target="_blank" href="http://www.fejhu.cl" class="">Fejhu</a>
                </div>
            </div>
        </div>
    </div>
     <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

<script src="js/web-all.js"></script>
<script src="js/web-bootstrap-touch-slider.js"></script>
<script src="js/web-custom.js"></script>
<script src="js/web-timeline.min.js"></script>
<script>
    timeline(document.querySelectorAll('.timeline'), {
        forceVerticalMode: 700,
        mode: 'horizontal',
        verticalStartPosition: 'left',
        visibleItems: 4
    });
</script>
<script type="text/javascript">
    $(document).ready(function() 
	{
        $('#repass').on('submit', function(event){
            $('#error-login').css('display', 'none')
            event.preventDefault()
            
            if ($('#pass').val() == '' || $('#pass2').val() == '') {
                $('#error-pass').css('display', 'block')
                $('#error-pass').html('Debe completar los campos')
            }
            else if ($('#pass').val() != $('#pass2').val()) {
                $('#error-pass').css('display', 'block')
                $('#error-pass').html('Las contraseñas no coinciden')
            } else {
                $('#error-pass').css('display', 'none')
                $('#error-pass').html('')
                var send = {
                    "_token"     : $('#token').val(),
                    "pass_token" : "{{$token}}",
                    "user"       : "{{$user}}",     
                    "pass"       : $('#pass').val(),             
                    "pass2"      : $('#pass2').val()  
                }
                var r = $.ajax({
                    data: send,
                    type: "POST",
                    dataType: "json",
                    url: "{{ route('/confirmchangepass') }}",
                    success: function (data) {
                        $('#go-to-web').css('display', 'block')
                        $('#send-btn').css('display', 'none')
                        $('#success-change').css('display', 'block')
                    },
                    error: function (data) {
                        if (data.status == 200) {
                            window.location.replace(data.responseText);
                        } else {                      
                            $('#error-login').css('display', 'block')
                            $('#error-login').html('No pudieron validarse las credenciales. Reintente')
                        }
                    
                    }
                })
            }
           
        })
     
   
    })
    </script>
@endsection