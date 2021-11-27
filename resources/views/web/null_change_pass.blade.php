@extends('web.layout_mail')
@section('content')
<footer class="footer" id="footer" style="height:100%">
        <div class="container">
            <div class="row">              
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="widget clearfix">
                        <div class="widget-title">
                            <h3>El link ha expirado</h3>
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
@endsection