@extends('layout')

@section('content')
<div class="container-fluid wrap">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">AOS Test</div>
                <div class="panel-body">
                    <p>Esto es una prueba de como crear MVC en laravel</p>

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('aostest') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nueva temática</label>
                            <div class="col-md-6">
                                <input name="thematic" type="text" value="{{ old('thematic') }}" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                                    Crear nueva temática
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
	    @foreach($aostest as $item)
			<article>
				<p>Name: {{ $item->name}}</p> 
				<p>Slug: {{ $item->slug}} </p> 
			</article>
        @endforeach
    </div>
</div>
@endsection