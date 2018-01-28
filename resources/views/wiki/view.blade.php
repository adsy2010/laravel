@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="panel panel-primary">

            <div class="panel-heading"><em>{{ $request['id'] }}</em></div>
            <div class="panel-body">
                Content
            </div>

        </div>
    </div>

@endsection