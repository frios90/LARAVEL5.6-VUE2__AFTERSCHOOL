<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			
			<div class="modal-body">
				<div class="modal-icon">
					<img src="images/fondos/LOGO1.png" class="img" alt="">
					<div class="modal-welcome-1">BIENVENIDO</div>
					<div class="modal-welcome-2">Favor ingrese sus credenciales:</div>
				</div>				
				<div class="tab-content">
					<div class="tab-pane active" id="Login">
						<form id="access-login" class="form-horizontal">						
						@csrf    
							<div class="">
								<div class="col-sm-12">
									<input class="form-control" id="access-email" name="access-email" placeholder="Ingrese su nombre de usuario" type="email">
									<span id="error-login" style="display: none; color: red; font-size: 11px;">No pudieron validarse las credenciales. Reintente</span>
								</div>
							</div>
							<br>
							<div class="">
								<div class="col-sm-12">
									<input class="form-control" id="access-password" name="access-password" placeholder="Ingrese su contraseña" type="password">
									
								</div>
							</div>
							<br>
							<div class="">
								<div class="">
									<input type="submit" class="btn-login" value="Ingresar"/><br><br>
									<span id="send-request-pass" class="dont-remember-pass">¿No recuerdas tu contraseña?</span>
									<span style="color: green; display: none;" id="success-request-pass">Se ha enviado un enlace a tu correo.</span>
								</div>
							</div>
						</form>
					</div>				
				</div>
			</div>
		</div>
	</div>
</div>