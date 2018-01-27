@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Delete Blog</div>

                    <div class="panel-body">
                        Are you sure you want to delete <strong>"{{ $blog->subject }}"</strong>?
                        <br>
                        {{ Form::open(array('url' => "blog/delete/{$blog->id}", 'method' => 'post')) }}
                        {{ Form::submit('delete', array('name' => 'delete', 'class' => 'btn btn-danger')) }}
                        {{ Form::submit('cancel', array('name' => 'cancel', 'class' => 'btn btn-primary')) }}
                        {{ Form::close() }}
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection