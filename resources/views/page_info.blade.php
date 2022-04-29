@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif

@if( session('status') )
	<div class="alert alert-info">
		{!! session('status') !!}
	</div>
@endif

@if( session('error_info') )
	<div class="alert alert-danger">
		{!! session('error_info') !!}
	</div>
@endif
