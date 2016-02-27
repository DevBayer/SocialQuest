@extends('SocialQuest.layout')
@section('page_content')
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
		<div class="container">
			<div class="row">
					<hr>
					<div class="col-md-12" style="border: 2px solid whitesmoke">
						<h3 style="color:green">Ver Quests</h3>
						<ul class="list-unstyled">
							@foreach ($quests as $quest)
							<li>
								<div class="row">
									<div class="col-md-6">
										<p><strong>Categoría:</strong> {{ $quest->category->name }}</p>
										<p><strong>Quest-Giver:</strong> {{ $quest->user->name }} {{ $quest->user->surnames }}</p>
										<p><strong>Descripción:</strong> {{ str_limit($quest->description,50) }}</p>
										<p><strong>Localización:</strong> {{ $quest->location }}</p>
										<p><strong>Empieza:</strong> {{ $quest->start_time }}</p>
										<p><strong>Acaba:</strong> {{ $quest->end_time }}</p>
									</div>
									<hr>
									<div class="col-md-6">
										<div id="map-{{ $quest->id }}" style="height: 200px; background: #6699cc;"></div>
										<br>
										{!! Form::open(['url' => '/quests/request', 'method' => 'POST']) !!}
										{!! Form::hidden('id', $quest->id) !!}
										{!! Form::hidden('id', \Auth::user()->id) !!}
										{!! Form::submit('Solicitar', ['class' => 'btn btn-block btn-primary']) !!}
										{!! Form::close() !!}
									</div>
								</div>
								<script type="text/javascript">
									$(document ).ready(function() {
										var map = new GMaps({
									    	el: '#map-{{ $quest->id }}',
									    	lat: {{ $quest->latitude }},
        									lng: {{ $quest->longitude }}
									    });
										GMaps.geocode({
										  address: '{{ $quest->location }}',
										  callback: function(results, status) {
										    if (status == 'OK') {
										      var latlng = results[0].geometry.location;
										      map.setCenter(latlng.lat(), latlng.lng());
										      map.addMarker({
										        lat: latlng.lat(),
										        lng: latlng.lng()
										      });
										    }
										  }
										});
									});
									</script>
							</li>
							@endforeach
						</ul>
					</div>
			</div>
		</div>
@endsection