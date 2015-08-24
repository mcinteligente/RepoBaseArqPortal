@extends('layout')

@section('content')
<div class="container-fluid wrap">
    <h1>Laravel 5.1</h1>
    <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido</div>
                <div class="panel-body">
                    @if (Auth::guest())
                        <p>Bienvenido a Formación Virtual</p>
                    @else
                        <p>{{ Auth::user()->name }} {{ Auth::user()->lastname }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection