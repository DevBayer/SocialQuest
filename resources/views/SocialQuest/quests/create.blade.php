@extends('SocialQuest.layout')
@section('styles')
<link rel="stylesheet" type="text/css" href="/socialquest/thirds/datetimepicker/jquery.datetimepicker.css"/ >
@endsection
@section('page_content')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
		<div class="container">
			<div class="row">
					<hr>
					<div class="col-md-12" style="border: 2px solid whitesmoke">
						<div class="row">
							<div class="col-md-12">
								<h3 style="color:green">Crear Quest</h3>
								{!! Form::open(['url' => '/quests/create', 'method' => 'POST']) !!}

								{!! Form::label('category_id', 'Categoría') !!}
								{!! Form::select('category_id', $categories, null, ['placeholder' => 'Selecciona categoría', 'class' => 'form-control']) !!}

								{!! Form::label('description', 'Descripción') !!}
								{!! Form::textarea('description', null, ['placeholder' => 'Descripción', 'class' => 'form-control']) !!}

								{!! Form::label('location', 'Localización') !!}
								{!! Form::text('location', null, ['placeholder' => 'Localización', 'class' => 'form-control']) !!}
								<a href="#" id="search_address">Buscar</a>
								<div id="map" style="height: 200px; width: 50%; background: #6699cc;"></div>
								{!! Form::hidden('latlng') !!}

								{!! Form::label('start_time', 'Fecha de inicio') !!}
								{!! Form::text('start_time', null, ['placeholder' => 'Fecha de inicio', 'class' => 'form-control', 'id' => 'datetimepicker_start']) !!}

								{!! Form::label('end_time', 'Fecha de finalización') !!}
								{!! Form::text('end_time', null, ['placeholder' => 'Fecha de finalización', 'class' => 'form-control', 'id' => 'datetimepicker_end']) !!}
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-4 col-md-offset-8">
								{!! Form::submit('Enviar', ['class' => 'btn btn-block btn-primary']) !!}
							</div>
						</div>
						{!! Form::close() !!}

					</div>
			</div>
		</div>
@section('scripts')
{!! Html::script('socialquest/thirds/datetimepicker/build/jquery.datetimepicker.full.min.js'); !!}
<script type="text/javascript">
var map;
var _latlng;
$( document ).ready(function() {
		$('#datetimepicker_start').datetimepicker({ format: 'y-m-d H:i:00'});
		$('#datetimepicker_end').datetimepicker({ format: 'y-m-d H:i:00'});
      var map = new GMaps({
        el: '#map',
        lat: {{ Auth::user()->latitude }},
        lng: {{ Auth::user()->longitude }}
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