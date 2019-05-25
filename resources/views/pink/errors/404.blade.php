@extends(env('THEME').'.layouts.site')

@section('navigation')	
	
	{!! $navigation !!}

@endsection 

@section('content')	
	
<div id="content-index" class="content group">
				            <img class="error-404-image group" src="{{asset('assets')}}/images/features/404.png" title="Error 404" alt="404" />
				            <div class="error-404-text group">
				                <p>{!! Lang::get('ru.404') !!}</p>
				                
				            </div>
				        </div>
@endsection

@section('footer')	
	
	{!! $footer !!}

@endsection