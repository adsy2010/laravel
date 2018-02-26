@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ Route('home') }}">Home</a></li>

        @if(Route::current()->getName() == 'adminGroupsEdit')
            <li class="breadcrumb-item"><a href="{{ Route('adminHome') }}">Admin Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ Route('adminGroupsList') }}">Groups Management</a></li>
            <li class="breadcrumb-item"><a href="{{ Route('adminGroupsView', $group->id) }}">{{ $group->group_name }}</a></li>
            <li class="breadcrumb-item active">
                Edit
            </li>
        @else
            <li class="breadcrumb-item active">Groups Management</li>
        @endif
    </ol>
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading"><h2>Groups Management</h2></div>
            <div class="panel-body">
                <div class="row">
                    @include('admin.sidebar')
                    <div class="col-sm-9 col-md-9 main">
                        <h2 class="sub-header">
                            Edit {{ $group->group_name }}
                        </h2>

                        {{ Form::open(array('url' => url()->current(), 'method' => 'post')) }}
                        {{ Form::model($group, ['route' => ['adminGroupsEdit', $group->id]]) }}
                        {{ Form::text('group_name', null, ['placeholder' => 'Group Name', 'class' => 'form-control']) }}
                        <br>
                        {{ Form::text('group_description', null, ['placeholder' => 'Group Description', 'class' => 'form-control']) }}
                        <br>
                        {{ Form::submit('Update Group', ['class' => 'btn btn-success']) }}
                        <a class="btn btn-danger" href="{{ Route('adminGroupsDelete', $group->id) }}"><span class="glyphicon glyphicon-trash"></span></a>
                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection