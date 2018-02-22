@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ Route('home') }}">Home</a></li>

        @if(Route::current()->getName() == 'adminUserEdit')
            <li class="breadcrumb-item"><a href="{{ Route('adminHome') }}">Admin Dashboard</a></li>
            <li class="breadcrumb-item active">
                Edit User
            </li>
        @else
            <li class="breadcrumb-item active">Admin Dashboard</li>
        @endif
    </ol>
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading"><h2>Edit user</h2></div>
            <div class="panel-body">
                <div class="row">
                    @include('admin.sidebar')
                    <div class="col-sm-9 col-md-9 main">

                            <table class="table table-bordered">
                                <tr><th>#</th><td>{{ $user->id }}</td></tr>
                                <tr><th>Registered on</th><td>{{ date("jS F, Y \a\\t H:i", strtotime($user->created_at)) }}</td></tr>
                                <tr><th>Updated on</th><td>{{ date("jS F, Y \a\\t H:i", strtotime($user->updated_at)) }}</td></tr>
                            </table>

                        {{ Form::open(array('url' => url()->current(), 'method' => 'post')) }}
                        {{ Form::model($user, array(Route('adminUserEdit', $user->id)))}}
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) }}
                        <br>
                        {{ Form::label('email', 'Email Address') }}
                        {{ Form::email('email', null, ['placeholder' => 'Email Address', 'class' => 'form-control']) }}
                        <br>
                        {{ Form::label('password', 'Password') }}
                        {{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) }}
                        {{ Form::label('password_confirmation', 'Confirm Password') }}
                        {{ Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) }}
                        <br>{{ Form::submit('Apply changes', ['class' => 'btn btn-success']) }}
                        <a class='btn btn-danger' href="{{ url()->previous() }}">Cancel changes</a>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection