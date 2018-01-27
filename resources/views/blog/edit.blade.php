@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2>Edit blog</h2></div>
                    <div class="panel-body">

                        {{ Form::open(array('url' => url()->current(), 'method' => 'post')) }}
                        {{ Form::model($blog, array('route' => array('editblog', $blog->id))) }}
                        {{ Form::label('subject', 'Subject') }}
                        {{ Form::text('subject', null,array('class' => 'form-control')) }}<br>
                        {{ Form::label('content', 'Content') }}
                        {{ Form::textarea('content', null, array('class' => 'form-control')) }}<br>
                        {{ Form::submit('Update content', array('class' => 'btn btn-primary')) }}
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection