@extends('SocialQuest.layout')

@section('page_content')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('/socialquest/img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1" >
                    <div class="site-heading" >
                        <h1>Buscador</h1>
                        <hr class="small">
			{!! Form::open(['url' => '/buscar', 'method' => 'GET']) !!}
                        <input type="text" class="form-control" name="query" />
			<button type="submit" class="btn btn-primary">Buscar</button>
			{!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </header>

	<div class="container">
		<div clas="row">
			<div class="col-md-8 col-md-offset-2">
			@if($results)
				@foreach($results as $user)
				<div class="profile-search-wrap col-md-12">
					<div class="col-md-3 text-center">
						<a href="#">
							<img src="{{ $user->AvatarContent }}"  class="voffset6 img-rounded" width="150" height="150" />
						</a>
						<a href="{{ route('user.open_profile', [$user->id, str_slug($user->name.' '.$user->surnames)]) }}" class="btn btn-info" style="padding: 10px 10px;">
							Visitar perfil
						</a>
					</div>
					<div class="col-md-9">
						<h2 class="title">{{ $user->name }}, <small>{{ $user->surnames }}</small></h2>
						<hr>
						<div class="col-md-6">
						<div class="stats-box">
						<h4>Puntuación</h4>
						<span>
	                                                <i class="fa fa-star" style="color:gold"></i>
	                                                <i class="fa fa-star" style="color:gold"></i>
	                                                <i class="fa fa-star" style="color:gold"></i>
	                                                <i class="fa fa-star-half-empty" style="color:gold"></i>
	                                                <i class="fa fa-star-o" style="color:gold"></i>
							<span>3.5</span>
						</span>
						</div>
						</div>

						<div class="col-md-6">
						<div class="stats-box">
						<div class="row">
							<div class="col-md-12">
								<h4>Nivel: <small>0</small></h4>
							</div>
							<div class="col-md-12">
							<h4>PX: </h4>
								<div class="progress">
			                                                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
										<span class="sr-only">70% Complete</span> 0/800
									</div>
							</div>
						</div>
						</div>
						</div>
						</div>

						<div class="col-md-12">
							<h4>Medallas</h4>
							<hr>

							<div class="medallas" style="border:2px solid whitesmoke;">
								<i class="flaticon flaticon-big-shield"></i>
								<i class="flaticon flaticon-big-shield-with-cross"></i>
								<i class="flaticon flaticon-brick-shield"></i>
								<i class="flaticon flaticon-half-shield-with-stripes"></i>
								<div class="masmedallas">
									<span id="masmedallas">+120</span>
								</div>
							</div>


						</div>

					</div>
				</div>
                                @endforeach
                        @endif

			</div>
		</div>
	</div>
@endsection
