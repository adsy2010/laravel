@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="panel panel-primary">

            <div class="panel-heading">Edit <em>{{ $wiki->name }}</em></div>
            <div class="panel-body">
                {{ Form::open(['url' => url()->current(), 'method' => 'post']) }}
                {{ Form::model($wiki, array('route' => array('editpage', $wiki->id))) }}
                {{ Form::textarea('content') }}<br>
                {{ Form::submit('Edit Wiki Page', ['class' => 'btn btn-success']) }}
                {{ Form::close() }}
            </div>

        </div>
    </div>

@endsection