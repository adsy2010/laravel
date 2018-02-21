@extends('layouts.app')

@section('content')
    <div class="container">
        @include('common.errors')
        <div class="panel panel-default">

            <div class="panel-heading"><h2>Create page: <em>{{ $request['id'] }}</em></h2></div>
            <div class="panel-body">
                {{ Form::open(['url' => url()->current(), 'method' => 'post']) }}
                {{ Form::textarea('content') }}<br>
                {{ Form::submit('Create Page', ['class' => 'btn btn-success']) }}
                {{ Form::close() }}
            </div>

        </div>
    </div>

@endsection