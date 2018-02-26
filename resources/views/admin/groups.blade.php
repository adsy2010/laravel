@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ Route('home') }}">Home</a></li>

        @if(Route::current()->getName() == 'adminGroupsList')
            <li class="breadcrumb-item"><a href="{{ Route('adminHome') }}">Admin Dashboard</a></li>
            <li class="breadcrumb-item active">
                Groups Management
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
                            Groups List
                            <a class="btn btn-success pull-right" href="{{ Route('adminGroupsCreate') }}">Create Group</a>
                        </h2>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Group Name</th>
                                    <th>Members</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($groups as $group)
                                    <tr>
                                        <td>{{ $group->id }}</td>
                                        <td><a href="{{ Route('adminGroupsView', $group->id) }}">{{ $group->group_name }}</a></td>
                                        <td>{{ count($group->members) }}</td>
                                        <td>{{ $group->created_at }}</td>
                                        <td align="right">
                                            <a class="btn btn-success" href="{{ Route('adminGroupsAddmember', $group->id) }}"><span class="glyphicon glyphicon-plus"></span></a>
                                            <a class="btn btn-info" href="{{ Route('adminGroupsEdit', $group->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                                            <a class="btn btn-danger" href="{{ Route('adminGroupsDelete', $group->id) }}"><span class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $groups->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection