@extends('SocialQuest.layout')
@section('page_content')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('/socialquest/img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1" >
                    <div class="site-heading" >
                        <h1>Social Quest</h1>
                        <hr class="small">
                        <span class="subheading">Por un mundo mejor</span>
                    </div>
                </div>
	</div>
</div>
</header>
		<div class="container">
		<div class="row">

			@if(Auth::check())
				<div class="col-md-8">
					<div id="map" style="height: 300px;background: #6699cc;"></div>
				</div>
				<div class="col-md-4 text-center">
					<a href="{{ route('quests.list') }}" class="btn btn-primary"><i class="fa fa-map-marker"></i> Buscar Quest</a>
					<hr>
					<a href="{{ route('quests.create') }}" class="btn btn-primary"><i class="fa fa-plus-square"></i> Crear Quest</a>
				</div>
			@endif

				<div class="col-md-12">
				<hr>
				<div class="col-md-6" align="center">
					<h3 style="color:green">¿Qué busca conseguir Social Quest?</h3>
					<p>Social Quest busca que las personas que necesiten cualquier ayuda, los quest givers, tengan una plataforma en la que hacer sus propuestas de una forma rápida y sencilla y en el caso de los adventurers, que serían las personas que resolverían las misiones, tengan acceso a las peticiones que más se ajusten a su perfil y que estén más cerca de su ubicación.</p>
				</div>
				<div class="col-md-6" align="center">
					<h3 style="color:green">¿Qué són las "quests" o misiones?</h3>
					<p>Las quests son tareas que los <i>quest givers</i> proponen, pueden ir desde simples tareas cotidianas como ayudar a bajar muebles, sacar a pasear a una mascota, acompañar o llevar a alguien a algún sitio… hasta tareas más complejas y que pueden ayudar a comunidades más grandes como ayudar a montar algún evento, recoger los residuos que éste genere, etc.</p>
				</div>
				</div>
		</div>
		</div>

@section('scripts')
<script type="text/javascript">
var map;
$( document ).ready(function() {
      var map = new GMaps({
        el: '#map',
        lat: 41.4045963,
        lng: 2.1790418
      });


  GMaps.geolocate({
    success: function(position){
      map.setCenter(position.coords.latitude, position.coords.longitude);
    },
    error: function(error){
      alert('Geolocation failed: '+error.message);
    },
    not_supported: function(){
      alert("Your browser does not support geolocation");
    },
    always: function(){

    }
  });
});
</script>
@endsection
@endsection
