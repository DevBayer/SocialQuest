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

		</div>
	</div>
@endsection
