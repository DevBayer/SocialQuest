@if(empty(Auth::user()->name) || empty(Auth::user()->surname1) || empty(Auth::user()->location))
	<div class="col-lg-12 col-md-12">
		<div class="alert alert-info alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Hola!</strong> Debes completar tu perfil para utilizar la plataforma, haz <a href="/usuario/editar">clic aquí</a>.
		</div>
	</div>
@endif
