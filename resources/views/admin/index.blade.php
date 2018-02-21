@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ Route('home') }}">Home</a></li>

        @if(Route::current()->getName() == 'usersBlogs')
            <li class="breadcrumb-item"><a href="{{ Route('blog') }}">Admin Dashboard</a></li>
            <li class="breadcrumb-item active">
                for <strong>{{ $user->name }}</strong>
            </li>
        @else
            <li class="breadcrumb-item active">Admin Dashboard</li>
        @endif
    </ol>
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading"><h2>Dashboard</h2></div>
            <div class="panel-body">
                <div class="row">
                    @include('admin.sidebar')
                    <div class="col-sm-9 col-md-9 main">
                        <div class="row placeholders">
                            <div class="col-xs-6 col-sm-3 placeholder">
                                <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                                <h4>Registered last 30 days</h4>
                                <span class="text-muted">Something else</span>
                            </div>
                            <div class="col-xs-6 col-sm-3 placeholder">
                                <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                                <h4>Label</h4>
                                <span class="text-muted">Something else</span>
                            </div>
                            <div class="col-xs-6 col-sm-3 placeholder">
                                <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                                <h4>Label</h4>
                                <span class="text-muted">Something else</span>
                            </div>
                            <div class="col-xs-6 col-sm-3 placeholder">
                                <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                                <h4>Label</h4>
                                <span class="text-muted">Something else</span>
                            </div>
                        </div>

                        <h2 class="sub-header">
                            Registered Users
                            <a class="btn btn-success pull-right" href="">Create User</a>
                        </h2>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email Address</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td align="right">
                                        <a class="btn btn-info" href=""><span class="glyphicon glyphicon-pencil"></span></a>
                                        <a class="btn btn-danger" href=""><span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection