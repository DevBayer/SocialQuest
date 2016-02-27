@extends('SocialQuest.layout')
@section('page_content')

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
		<div class="container normal-page">
			<div class="row">
					<div class="col-md-12" style="border: 2px solid whitesmoke">
						<h3 class="pull-left">Listado de Quests disponibles</h3>
						<form class="form-inline pull-right" style="margin-top: 20px;" method="get" action="/quests">
							<label>Rango (km)</label>
							<select id="change-range" name="rango" class="form-control">
							  <option value="1">1km.</option>
							  <option value="2">2km.</option>
							  <option value="3">3km.</option>
							  <option value="4">4km.</option>
							  <option value="5">5km.</option>
							</select>
						</form>
						<div class="clearfix"></div>

						<ul class="list-unstyled">
							@foreach ($quests as $quest)
							<li style="padding:15px;">
								<div class="row" style="border: 1px solid whitesmoke;     background: ghostwhite; padding: 15px;">
									<div class="col-md-6">
										<p><strong>Categoría:</strong> {{ $quest->category->name }}</p>
										<p><strong>Quest-Giver:</strong> {{ $quest->user->name }} {{ $quest->user->surnames }}</p>
										<p><strong>Descripción:</strong> {{ str_limit($quest->description,50) }}</p>
										<p><strong>Localización:</strong> {{ $quest->location }}</p>
										<p><strong>Empieza:</strong> {{ $quest->start_time }}</p>
										<p><strong>Acaba:</strong> {{ $quest->end_time }}</p>
									</div>
									
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
@section('scripts')
<script type="text/javascript">
$(function(){
        $('#change-range').change(
            function(){
                 $(this).closest('form').trigger('submit');
            });
});
</script>
@endsection
@endsection
