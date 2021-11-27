<footer class="footer" id="footer">
        <div class="container">
            <div class="">
                <div class="center">
                    <a class="center" href="/"><img src="images/virtafcanva4_correcto-removebg-preview.png" alt="" width="150" height="50" /></a>
                </div>
                <div class="center">
                    <ul class="footer-links">
                        <span class="span-link"><a href="/about">Nuestra Historia</a></span> 
                        <span class="span-link"><a href="/glifing">Glifing, Nuestro Pilar</a></span> 
                        <span class="span-link"><a href="/equip">Equipo Profesionales</a></span> 
                        <span class="span-link"><a href="/talleres">Talleres</a></span> 
                        <span class="span-link"><a href="#footer">Contáctanos</a></span> 
                    </ul>        
                </div>
                <div class="center">
                    <ul class="footer-links-soi">
                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                        <li><a href=""><i class="fa fa-github"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                        <li><a href=""><i class="fa fa-dribbble"></i></a></li>
                        <li><a href=""><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
                <div class="center div-form-contact">                                    
                    <h3 class="foter-contactanos">Contactanos</h3>
                    <form id="contactanos" class="center form-horizontal">
                        <input type="hidden"id="token" value="{{ csrf_token() }}">  
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input class="center form-control" id="name" type="text" placeholder="Ingrese su Nombre" require>
                                {!! $errors->first('name', '<span class="help-block">:message</span>') !!} 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input class="center form-control" id="country" type="text" placeholder="Ingrese su País de residencia" require>
                                {!! $errors->first('country', '<span class="help-block">:message</span>') !!} 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input class="center form-control" id="location" type="text" placeholder="Ingrese su Localidad" require>
                                {!! $errors->first('location', '<span class="help-block">:message</span>') !!} 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input class="center form-control" id="correo" type="text" require=""  placeholder="Ingrese su Correo">
                                {!! $errors->first('correo', '<span class="help-block">:message</span>') !!} 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input class="center form-control" id="phone" type="text" require="" placeholder="Ingrese su Teléfono/Celular">
                                {!! $errors->first('phone', '<span class="help-block">:message</span>') !!} 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input class="center form-control" id="message" type="text" require=""  placeholder="Ingrese su Mensaje">
                                {!! $errors->first('message', '<span class="help-block">:message</span>') !!} 
                            </div>
                        </div>                                                            
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="submit" class="center btn-send-contact" value="Enviar"/>
                            </div>
                        </div>
                        <div>
                            <span class="text-success-send-contact">
                                Su mensaje ha sido enviado con éxito. Pronto nos comunicaremos con usted.
                            </span>
                            <span class="text-error-send-contact">
                                Debe completar el formulario para realizar el envío.
                            </span>
                        </div>
                    </form>                       
                </div>  
            </div>                    
        </div>
    </footer>
    <div class="copyrights">
        <div class="center">
            Desarrollado por <a target="_blank" href="https://www.proyectofejhu.cl" class="">Proyecto Fejhu</a>
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
        var errors = {};
        $('#contactanos').on('submit', function(event){
            event.preventDefault()
            var send = {
                "_token"   : $('#token').val(),
                "name"     : $('#name').val(),
                "phone"    : $('#phone').val(),
                "message"  : $('#message').val(),
                "correo"   : $('#correo').val(),
                "country"   : $('#country').val(),
                "location"   : $('#location').val()
            }
            if (
                $('#name').val() == '' ||
                $('#phone').val() == '' ||
                $('#message').val() == '' ||
                $('#country').val() == '' ||
                $('#location').val() == '' ||
                $('#correo').val() == ''
            ) {
                $('.text-error-send-contact').css('display', 'block')
                $('.text-success-send-contact').css('display', 'none')

            } else {
                var r = $.ajax({
                data: send,
                type: "POST",
                dataType: "json",
                url: "{{ route('/contact-mail') }}",
                }).done(function() {
                    
                })
                $('.text-success-send-contact').css('display', 'block')
                $('.text-error-send-contact').css('display', 'none')
                $('#name').val('')
                $('#phone').val('')
                $('#message').val('')
                $('#correo').val('')
                $('#country').val('')
                $('#location').val('')
            }
        })
        $('#access-login').on('submit', function(event){
            $('#error-login').css('display', 'none')
            event.preventDefault();
            var send = {
                "_token"   : $('#token').val(),
                "email"    : $('#access-email').val(),
                "password" : $('#access-password').val(),               
            }
            var r = $.ajax({
                data: send,
                type: "POST",
                dataType: "json",
                url: "{{ route('/sing-in') }}",                        
                success: function (data) {                    
                    window.location.replace(data)
                },                
                error: function (data) {                                        
                        $('#error-login').css('display', 'block')
                        $('#error-login').html('No pudieron validarse las credenciales. Reintente')
                }
            })
        })
        $('#send-request-pass').on('click', function(event){
            $('#error-login').css('display', 'none')
            event.preventDefault()
            var send = {
                "_token"   : $('#token').val(),
                "email"    : $('#access-email').val(),
            }
            $.ajax({
                data: send,
                type: "POST",
                dataType: "json",
                url: "{{ route('/request-pass') }}",
                success: function (data) {
                    $('#success-request-pass').css('display', 'block')
                    $('#error-login').css('display', 'none')                   
                },
                error: function (data) {
                    $('#error-login').css('display', 'block')
                    $('#error-login').html('No hay una cuenta asociada a este correo.')
                }
            })
        })   
        $('#wwu').on('submit', function(event){
            event.preventDefault();
            var send = {
                "_token" : $('#token').val(),
                "name"   : $('#wwu-name').val(),
                "rut"    : $('#wwu-rut').val(),
                "prof"   : $('#wwu-prof').val(),
                "esp"    : $('#wwu-esp').val(),
                "time"   : $('#wwu-time').val(),
                "mail"   : $('#wwu-mail').val(),
                "tel"    : $('#wwu-tel').val(),
            }
            var self = this
            var r = $.ajax({
                data: send,
                type: "POST",
                dataType: "json",
                url: "{{ route('/send-wwu') }}",
                success: function (data) {
                    $('#msj-success-wwu').css('display', 'block')
                    $('#error-rut').css('display', 'none')
                    $('#error-profesion').css('display', 'none')
                    $('#error-especialidad').css('display', 'none')
                    $('#error-tiempo').css('display', 'none')
                    $('#error-correo').css('display', 'none')
                    $('#error-nombre').css('display', 'none')
                    $('#error-telefono').css('display', 'none')
                },
                error: function (data) {
                        $('#msj-success-wwu').css('display', 'none')
                        if (data.status == 422) {
                            errors=data.responseJSON.errors                            
                            if (typeof errors.name != 'undefined') {
                                $('#error-nombre').css('display', 'block')
                            } else {
                                $('#error-nombre').css('display', 'none')
                            }
                            if (typeof errors.rut != 'undefined') {
                                $('#error-rut').css('display', 'block')
                            } else {
                                $('#error-rut').css('display', 'none')
                            }
                            if (typeof errors.prof != 'undefined') {
                                $('#error-profesion').css('display', 'block')
                            } else {
                                $('#error-profesion').css('display', 'none')
                            }
                            if (typeof errors.esp != 'undefined') {
                                $('#error-especialidad').css('display', 'block')
                            } else {
                                $('#error-especialidad').css('display', 'none')
                            }
                            if (typeof errors.time != 'undefined') {
                                $('#error-tiempo').css('display', 'block')
                            } else {
                                $('#error-tiempo').css('display', 'none')
                            }
                            if (typeof errors.mail != 'undefined') {
                                $('#error-correo').css('display', 'block')
                            } else {
                                $('#error-correo').css('display', 'none')
                            }
                            if (typeof errors.tel != 'undefined') {
                                $('#error-telefono').css('display', 'block')
                            } else {
                                $('#error-telefono').css('display', 'none')
                            }
                        }
                    }
                })
                
        })              
        
    })
</script>
