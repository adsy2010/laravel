@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="panel panel-primary">

            <div class="panel-heading">Create <em>{{ $request['id'] }}</em></div>
            <div class="panel-body">
                {{ Form::open(['url' => url()->current(), 'method' => 'post']) }}
                {{ Form::text('search') }}<br>
                {{ Form::submit('Search', ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
            </div>

        </div>
    </div>

@endsection