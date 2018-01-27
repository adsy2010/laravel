@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="">
                @include('common.errors')
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Post blog</h2></div>
                    <div class="panel-body">

                        {{ Form::open(array('url' => 'blog/create', 'method' => 'post')) }}
                        {{ Form::label('subject', 'Subject') }}
                        {{ Form::text('subject', null,array('class' => 'form-control')) }}<br>
                        {{ Form::label('content', 'Content') }}
                        {{ Form::textarea('content', null, array('class' => 'form-control')) }}<br>
                        {{ Form::submit('Post content', array('class' => 'btn btn-success')) }}
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection