@extends('SocialQuest.layout')
@section('page_content')
	<div class="container normal-page">
		<div class="row">
    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
                                {!! Form::open(['url' => '/auth/register', 'method' => 'POST']) !!}
					<div class="form-group">
						<label for="email">Correo electrónico:</label>
						<input type="email" class="form-control" id="email" name="email">
					</div>
					<div class="form-group">
						<label for="pwd">Contraseña:</label>
						<input type="password" class="form-control" id="pwd" name="password">
					</div>
					<div class="form-group">
						<label for="pwd">Confirmar contraseña:</label>
						<input type="password" class="form-control" id="pwd" name="password_confirmation">
					</div>
                                        <button type="submit" class="btn pull-right" style="margin-bottom:10px">Registrar</button>
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
	</div>
@endsection
