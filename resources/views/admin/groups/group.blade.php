@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ Route('home') }}">Home</a></li>

        @if(Route::current()->getName() == 'adminGroupsView')
            <li class="breadcrumb-item"><a href="{{ Route('adminHome') }}">Admin Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ Route('adminGroupsList') }}">Groups Management</a></li>
            <li class="breadcrumb-item active">
                {{ $group->group_name }}
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
                            {{ $group->group_name }}
                            <div class="pull-right">
                                <a class="btn btn-success" href="{{ Route('adminGroupsAddmember', $group->id) }}"><span class="glyphicon glyphicon-plus"></span></a>
                                <a class="btn btn-info" href="{{ Route('adminGroupsEdit', $group->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                                <a class="btn btn-danger" href="{{ Route('adminGroupsDelete', $group->id) }}"><span class="glyphicon glyphicon-trash"></span></a>
                            </div>

                            </h2>
                        <h3>Members</h3>
                        <table class="table table-striped">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>
                            @if(count($group->members) == 0)
                                <tr><td colspan="4">No members in this group</td></tr>
                            @endif
                            @foreach($group->members as $member)
                                <tr>
                                    <td>{{ $member->id }}</td>
                                    <td>{{ $member->user->name }}</td>
                                    <td>{{ $member->user->email }}</td>
                                    <td>
                                        <a class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection