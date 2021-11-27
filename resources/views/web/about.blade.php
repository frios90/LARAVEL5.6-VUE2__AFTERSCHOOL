
<div id="overviews" class="section lb section-bg-1">
    <div class="container">  
        <div class="section-title row text-center home-title-description">
            <div class="col-md-8 offset-md-2 fadeIn">
                <p class="lead p-about-title">
                    VirtAf ofrece una significativa cobertura al aprendizaje, por medio de espacios virtuales personalizados y profesionales expertos. 
                </p>
            </div>
        </div>
        <div class="slideshow-container">
            <div class="mySlides">
                <div class="text">
                    <div class="word">
                        <span>G</span>
                        <span>L</span>
                        <span>I</span>
                        <span>F</span>
                        <span>i</span>
                        <span>N</span>
                        <span>G</span>
                    </div>
                    <div class="span-about-description">
                        Evaluación y entrenamiento psicopedagógico <br>
                        ( ¡<b>Jugando en Línea</b>!  )
                    </div>
                </div>
            </div>
            <div class="mySlides">
                <div class="text">
                    <div class="word">
                        <span>T</span>
                        <span>A</span>
                        <span>L</span>
                        <span>L</span>
                        <span>E</span>
                        <span>R</span>
                        <span>E</span>
                        <span>S</span>
                    </div>
                    <div class="span-about-description">
                        Espacios virtuales  de aprendizaje lúdico,
                        proporcionado por profesionales de la educación <br>
                        ( ¡<b>y la Diversión</b>! )
                    </div>   
                </div>
            </div>
            <div class="mySlides">
                <div class="text">
                    <div class="word">
                        <span>I</span>
                        <span>N</span>
                        <span>F</span>
                        <span>O</span>
                        <span>R</span>
                        <span>M</span>
                        <span>E</span>
                        <span>S</span>
                    </div>
                    <div class="span-about-title">de especialistas</div><br>
                    <div class="span-about-description">
                        <b>Sin costos</b> adicionales
                    </div>  
                </div>
            </div>
            <div class="mySlides">
                <div class="text">
                    <div class="word">
                        <span>A</span>
                        <span>P</span>
                        <span>O</span>
                        <span>Y</span>
                        <span>O</span>
                    </div>
                    <div class="span-about-title">psicopedagógico S.O.S</div><br>  
                    <div class="span-about-description">
                        ¡ <b>Profesionales</b>  en el momento y la <b>Hora Justa</b> !   
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>
<script>
        
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";
    } 
    setInterval(function(){ plusSlides(1); }, 6000);

</script>

<script>
    const spans = document.querySelectorAll('.word span');

    spans.forEach((span, idx) => {
        span.addEventListener('click', (e) => {
            e.target.classList.add('active');
        });
        span.addEventListener('animationend', (e) => {
            e.target.classList.remove('active');
        });	
        setTimeout(() => {
            span.classList.add('active');
        }, 750 * (idx+1))
    });

</script>