@extends('SocialQuest.layout')
@section('page_content')
    <!-- Main Content -->
    <div class="container normal-page">
        <div class="row">
		@if(!isset($public) || !$public)
		@include('SocialQuest.user.partials.configure_profile')
		@endif

            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1" style="border: 2px solid whitesmoke">
				<!---Inicio zona dinamica --> 
				<div>
					<h2 class="title">Mi perfil</h2>
					<hr>
					<div class="Perfil col-md-6"  align="center">
							<a href="#" class="pull-left">
								<img src="{{ $user->AvatarContent }}" class="fotoperfil" />
							</a>
						<div class="pull-left text-center">
							<h3 class="title">
								<a href="#">{{ $user->name }}</a>
							</h3>
							<h4 class="title">
								<a href="#">{{ $user->surnames }}</a>
							</h4>
						</div>
						<div class="clearfix"></div>
						@if(!empty($user->biography))
						  <span class="bloqueusuario">
							<span class="glyphicon glyphicon-sunglasses"></span> {{ $user->biography }}
						  </span>
						@endif
						@if(!empty($user->location))
							<span class="bloqueusuario">
							<span class="glyphicon glyphicon-map-marker"></span> {{ $user->location }}
						  </span>
						@endif
						  <span class="bloqueusuario">
							<span class="glyphicon glyphicon-calendar"></span> {{ $user->DateCreatedFormated }}
						  </span>
					</div>
				</div>
				<div class="col-md-6">
				<div class="col-md-12">

					<div class="stats-box">
						<h4>Puntuación</h4>
						<span>
	                                                <i class="fa fa-star"  style="color:gold"></i>
	                                                <i class="fa fa-star"  style="color:gold"></i>
	                                                <i class="fa fa-star"  style="color:gold"></i>
	                                                <i class="fa fa-star-half-empty" style="color:gold"></></i>
	                                                <i class="fa fa-star-o"  style="color:gold"></i>
							<span>3.5</span>
						</span>
					</div>

					<div class="stats-box">
						<div class="row">
							<div class="col-md-2">
								<h4>Nivel: <small>{{ $user->level }}</small></h4>
							</div>
							<div class="col-md-10">
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
				</div>
				<div class="clearfix"></div>

				<div class="col-md-12">
					<h2 class="title">Mis misiones completadas</h2>
					<hr>
					<table>
						<tr>
						  <td></td>
						  <td></td>
						  <td></td>
						  <td></td>
						  <td></td>
						</tr>
						 <tr>
						  <td></td>
						  <td></td>
						  <td></td>
						  <td></td>
						  <td></td>
						</tr>
						<tr>
						  <td></td>
						  <td></td>
						  <td></td>
						  <td></td>
						  <td></td>
						</tr>
						<tr>
						  <td></td>
						  <td></td>
						  <td></td>
						  <td></td>
						  <td></td>
						</tr>
						<tr>
						  <td></td>
						  <td></td>
						  <td></td>
						  <td></td>
						  <td></td>
						</tr>
					</table>
				</div>
				<div class="col-md-12">
					<h2 class="title">Mis misiones ofrecidas</h2>
					<hr>
					<table>
						<tr>
						  <td></td>
						  <td></td>
						  <td></td>
						  <td></td>
						  <td></td>
						</tr>
						 <tr>
						  <td></td>
						  <td></td>
						  <td></td>
						  <td></td>
						  <td></td>
						</tr>
						<tr>
						  <td></td>
						  <td></td>
						  <td></td>
						  <td></td>
						  <td></td>
						</tr>
						<tr>
						  <td></td>
						  <td></td>
						  <td></td>
						  <td></td>
						  <td></td>
						</tr>
						<tr>
						  <td></td>
						  <td></td>
						  <td></td>
						  <td></td>
						  <td></td>
						</tr>
					</table>
				</div>
			<!---Fin zona dinamica --> 
        </div>
    </div>
@endsection
