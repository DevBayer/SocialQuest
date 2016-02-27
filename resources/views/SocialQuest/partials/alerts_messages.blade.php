@if(\Session::has('message'))
	<div class="row" style="padding-top: 80px">
		<div class="container">
			<div class="alert alert-success">
				{{ \Session::get('message') }}
			</div>
		</div>
	</div>
@endif
