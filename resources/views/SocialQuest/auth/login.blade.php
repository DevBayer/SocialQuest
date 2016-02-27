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

        @include('SocialQuest.partials.form-login')

		</div>
	</div>
@endsection
