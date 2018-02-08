@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="panel panel-primary">

            <div class="panel-heading">Delete <em>{{ $wiki->name }} - Version {{ $wiki->version }}</em></div>
            <div class="panel-body">
                {{ Form::open(array('url' => "wiki/{$wiki->id}/delete", 'method' => 'post')) }}
                {{ Form::submit('delete', array('name' => 'delete', 'class' => 'btn btn-danger')) }}
                {{ Form::submit('delete entire history', array('name' => 'deleteentirehistory', 'class' => 'btn btn-danger')) }}
                {{ Form::submit('cancel', array('name' => 'cancel', 'class' => 'btn btn-primary')) }}
                {{ Form::close() }}
            </div>

        </div>
    </div>

@endsection