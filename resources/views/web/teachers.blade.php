<div id="teachers" class="section wb section-bg-1">

	<div class="neo-profes">
		<div class="row">
			<div class="new-profe-cont fade-in-2">
				<div class="neo-profe-img">
					<img src="images/team/Paula_García-removebg-preview-removebg-preview2.png">
				</div>
				<div class="neo-profe-desc">
					<span class="neo-profe-nombre p1">Paula García Lorca</span><br>
					<span class="neo-profe-espec">
						Psicopedagoga, Magíster en pedagogía, <br> especialista en metodología Glifing.
					</span><br>
					<span class="neo-profe-link">
						<a target="_blank" href="https://www.linkedin.com/in/paulagarcialorca061980" class="fa fa-linkedin"></a>
					</span>
				</div>
			</div>
	<div class="new-profe-cont fade-in-3">
				<div class="neo-profe-img">
					<img src="images/team/DANIELA_GALLARDO_2-removebg-preview.png">
				</div>
				<div class="neo-profe-desc">
					<span class="neo-profe-nombre p4">Daniela Gallardo</span><br>
					<span class="neo-profe-espec">
						Filosofía, Terapias naturales y técnico en rehabilitación de adicciones
					</span><br>
					<span class="neo-profe-link">
						<a target="_blank" href="https://www.linkedin.com/in/daniela-gallardo-valderrama-2573551a9" class="fa fa-linkedin"></a>
					</span>
				</div>
			</div>
			
		</div>

		<div class="row">

		
			<div class="new-profe-cont fade-in-3">
				<div class="neo-profe-img">
					<img src="images/team/FRANCISCO_RÍOS-removebg-preview.png">
				</div>
				<div class="neo-profe-desc">
					<span class="neo-profe-nombre p7">Francisco Rios Castillo</span><br>
					<span class="neo-profe-espec">
						Ingeniería y soporte informático
					</span><br>
					<span class="neo-profe-link">

					</span>
				</div>
			</div>
		</div>
		
	</div>


</div>

<script>
	function typeEffect(element, speed) {
	var text = element.innerHTML;
	element.innerHTML = "";
	
	var i = 0;
	var timer = setInterval(function() {
    if (i < text.length) {
      element.append(text.charAt(i));
      i++;
    } else {
      clearInterval(timer);
    }
  }, speed);
}


// application
var speed = 170;
var p1 = document.querySelector('.p1');
var delay = p1.innerHTML.length * speed + speed;
typeEffect(p1, speed);

var p2 = document.querySelector('.p2');
var delay = p2.innerHTML.length * speed + speed;
typeEffect(p2, speed);

var p3 = document.querySelector('.p3');
var delay = p3.innerHTML.length * speed + speed;
typeEffect(p3, speed);

var p4 = document.querySelector('.p4');
var delay = p4.innerHTML.length * speed + speed;
typeEffect(p4, speed);

var p5 = document.querySelector('.p5');
var delay = p5.innerHTML.length * speed + speed;
typeEffect(p5, speed);

var p6 = document.querySelector('.p6');
var delay = p6.innerHTML.length * speed + speed;
typeEffect(p6, speed);

var p7 = document.querySelector('.p7');
var delay = p7.innerHTML.length * speed + speed;
typeEffect(p7, speed);
</script>