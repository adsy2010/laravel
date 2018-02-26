@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ Route('home') }}">Home</a></li>

        @if(Route::current()->getName() == ('adminGroupsAddmember' || 'adminGroupsPostAddmember'))
            <li class="breadcrumb-item"><a href="{{ Route('adminHome') }}">Admin Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ Route('adminGroupsList') }}">Groups Management</a></li>
            <li class="breadcrumb-item"><a href="{{ Route('adminGroupsView', $group->id) }}">{{ $group->group_name }}</a></li>
            <li class="breadcrumb-item active">
                Add Member to group
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
                            Add Member to {{ $group->group_name }}
                        </h2>
                        {{ Form::open(array('url' => url()->current(), 'method' => 'post')) }}
                        <table class="table table-striped">
                            <tr>
                                <th>[]</th>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                            @if(count($users) == 0)
                                <tr>
                                    <td colspan="4">No users can be added to this group at this time!</td>
                                </tr>
                            @endif
                            @foreach($users as $user)
                            <tr>
                                <td>{{ Form::checkbox('user[]', $user->id) }}</td>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            @endforeach
                        </table>
                        {{ Form::submit('Add Member(s)', ['class' => 'btn btn-success']) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection