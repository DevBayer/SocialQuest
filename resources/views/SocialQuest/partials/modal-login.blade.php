<div id="modal-login" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Entrar</h4>
      </div>
      <div class="modal-body">
				{!! Form::open(['url' => '/auth/login', 'method' => 'POST']) !!}
					<div class="form-group"> 
					<label for="email">Correo electrónico:</label>
					<input type="email" class="form-control" id="email" name="email">
					</div>
					<div class="form-group">
					<label for="pwd">Contraseña:</label>
					<input type="password" class="form-control" id="pwd" name="password">
					</div>
					<div class="checkbox">
						<label><input type="checkbox"> Recuérdame</label>
					</div>
					<button type="submit" class="btn pull-right" style="margin-bottom:10px">Entrar</button>
				{!! Form::close() !!}

				<div class="row">
				<div class="col-md-12">
					<div class="col-md-6 especial" align="center">
					<br>
						<a class="btn btn-social btn-google" id="btn-especial-1" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-google']);" >
							<span class="fa fa-google" id="icono-especial-2"></span> Entrar con Google
						</a>
					</div>
					<div class="col-md-6 especial" align="center">
					<br>
						<a class="btn-especial btn btn-social btn-facebook " id="btn-especial-2" onclick="_gaq.push(['_trackEvent', 'btn-social', 'click', 'btn-facebook']);" >
							<span class="icono-especial fa fa-facebook " id="icono-especial-2"  ></span> Entrar con Facebook
						</a>
					</div>
				</div>
				</div>


      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
