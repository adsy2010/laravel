@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="panel panel-primary">

            <div class="panel-heading">Search Wiki</div>
            <div class="panel-body">
                {{ Form::open(['url' => url()->current(), 'method' => 'post']) }}
                {{ Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Search term']) }}
                {{ Form::submit('Search', ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
            </div>

        </div>
    </div>

@endsection