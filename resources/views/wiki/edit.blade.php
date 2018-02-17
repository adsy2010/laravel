@extends('layouts.app')

@section('content')

    {{ Form::open(['url' => url()->current(), 'method' => 'post']) }}
    {{ Form::model($wiki, array('route' => array('editWikiPage', $wiki->id))) }}
    <div class="container">
        <div class="panel panel-primary">

            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-10 col-sm-9 col-md-9">
                        <em>
                            {{ Form::text('name', null, ['placeholder' => 'Page name', 'class' => 'form-control']) }}
                        </em>
                    </div>
                    <div class="col-xs-2 col-sm-3 col-md-3">
                        <a class="btn btn-sm btn-default pull-right">
                            <span class="glyphicon glyphicon-cog"></span>
                            <span class="caret"></span>
                        </a>
                    </div>
                </div>

            </div>
            <div class="panel-body">
                {{ Form::textarea('content') }}<br>
            </div>
            <div class="panel-footer">
                {{ Form::submit('Edit Wiki Page', ['class' => 'btn btn-success']) }}
                {{ Form::button('Cancel changes', ['class' => 'btn btn-warning']) }}
            </div>

        </div>
    </div>

    {{ Form::close() }}
@endsection