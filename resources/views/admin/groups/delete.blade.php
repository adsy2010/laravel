@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ Route('home') }}">Home</a></li>

        @if(Route::current()->getName() == ('adminGroupsDelete' || 'adminGroupsPostDelete'))
            <li class="breadcrumb-item"><a href="{{ Route('adminHome') }}">Admin Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ Route('adminGroupsList') }}">Groups Management</a></li>
            <li class="breadcrumb-item"><a href="{{ Route('adminGroupsView', $group->id) }}">{{ $group->group_name }}</a></li>
            <li class="breadcrumb-item active">
                Delete
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
                            Delete {{ $group->group_name }}?
                        </h2>
                        Are you sure you wish to delete {{ $group->group_name }}?
                        <hr>
                        {{ Form::open(array('url' => url()->current(), 'method' => 'post')) }}
                        {{ Form::submit('delete', array('name' => 'delete', 'class' => 'btn btn-danger')) }}
                        {{ Form::submit('cancel', array('name' => 'cancel', 'class' => 'btn btn-primary')) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection