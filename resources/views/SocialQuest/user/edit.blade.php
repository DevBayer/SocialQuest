@extends('SocialQuest.layout')
@section('page_content')
    <!-- Main Content -->
    <div class="container normal-page">
        <div class="row">
            <div class="col-md-12" style="border: 2px solid whitesmoke">
			<!---Inicio zona dinamica --> 
			<h3>Editar información</h3>
			{!! Form::model($user,['url' => '/usuario/editar', 'method' => 'PUT', 'files' => true]) !!}
				<div class="row">
				<div class="col-md-6">
					{!! Form::label('email', 'Correo electrónico') !!}
					{!! Form::text('email', null, ['class' => 'form-control', 'disabled']) !!}

					{!! Form::label('name', 'Nombre real') !!}
					{!! Form::text('name', null, ['placeholder' => 'Nombre real', 'class' => 'form-control']) !!}

          {!! Form::label('surname1', 'Primer apellido') !!}
          {!! Form::text('surname1', null, ['placeholder' => 'Primer apellido', 'class' => 'form-control']) !!}

          {!! Form::label('surname2', 'Segundo apellido') !!}
          {!! Form::text('surname2', null, ['placeholder' => 'Segundo apellido', 'class' => 'form-control']) !!}
        </div>

				<div class="col-md-6">
					{!! Form::label('biography', 'Biografía') !!}
					{!! Form::textarea('biography', null, ['placeholder' => 'Pequeña biografía de 150 carácteres aprox.', 'class' => 'form-control', 'style' => 'height: 105px']) !!}
					<div id="map" style="height: 300px;background: #6699cc;"></div>
						{!! Form::label('location', 'Localización') !!}
						{!! Form::text('location', null, ['placeholder' => 'Localización', 'class' => 'form-control']) !!}
						<a href="#" id="search_address">Buscar</a>
            {!! Form::label('avatar', 'Imagen de perfil') !!}
            {!! Form::file('avatar') !!}
						{!! Form::hidden('latlng') !!}
				</div>

				</div>

				<hr>
			<div class="row">
				<div class="col-md-4">
					<button class="btn btn-block btn-danger btn-delete">Borrar cuenta</button>
				</div>
				<div class="col-md-8">
					{!! Form::submit('Enviar', ['class' => 'btn btn-block btn-primary']) !!}
				</div>
			</div>
			{!! Form::close() !!}

				<hr>

			<!---Fin zona dinamica --> 
        </div>
    </div>

@section('scripts')
<script type="text/javascript">
var map;
var _latlng;
$( document ).ready(function() {
 $('button.btn-delete').click(function(e) {
	e.preventDefault();
    deleteAlert();
  });

  function deleteAlert() {
    swal({
      title: "¿Estás seguro?", 
      text: "Estás a punto de borrar tu cuenta de SocialQuest, ¿quieres continuar?", 
      type: "warning",
      showCancelButton: true,
      closeOnConfirm: false,
      confirmButtonText: "Sí, adelante",
      confirmButtonColor: "#ec6c62"
    }, function() {
      $.ajax({
        url: "/usuario/borrar-cuenta",
        type: "DELETE"
      })
      .done(function(data) {
        swal("Deleted!", "¡Tu cuenta ha sido correctamente eliminada!", "success");
      })
      .error(function(data) {
        swal("Oops", "Ha habido un error interno del servidor. Por favor, vuelve a intentarlo.", "error");
      });
    });
  }


      var map = new GMaps({
        el: '#map',
        lat: {{ $user->latitude }},
        lng: {{ $user->longitude }}
      });

	var _latlng = "";

  GMaps.geolocate({
    success: function(position){
      map.setCenter(position.coords.latitude, position.coords.longitude);
      _latlng = position.coords.latitude+','+position.coords.longitude;
      $('input[name=latlng]').val(_latlng);
      $.ajax({
        url: "http://maps.googleapis.com/maps/api/geocode/json?latlng=" + _latlng,
        success: function(result) {
          $('input[name=location]').val(result.results[0].formatted_address);
        }
      });
    },
    error: function(error){
      alert('Geolocation failed: '+error.message);
    },
    not_supported: function(){
      alert("Your browser does not support geolocation");
    },
    always: function(){
    //          alert("Done!");
    }
  });

  $('#search_address').click(function(e){
        e.preventDefault();
		GMaps.geocode({
			  address: $('#location').val(),
			  callback: function(results, status) {
			    if (status == 'OK') {
			      var latlng = results[0].geometry.location;
			      map.setCenter(latlng.lat(), latlng.lng());
//				alert(latlng.lat()+','+latlng.lng());
				_latlng = latlng.lat()+','+latlng.lng();
				console.log(_latlng);
		                $('input[name=latlng]').val(_latlng);
			      map.addMarker({
			        lat: latlng.lat(),
			        lng: latlng.lng()
			      });
			    }
			  }
		});
	});
});
</script>
@endsection
@endsection
