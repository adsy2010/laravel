<?php $convertedTime = strtotime($user->created_at) ?>
<?php $convertedUpdateTime = strtotime($user->updated_at) ?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="">
            @include('common.errors')
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welcome {{ $user->name }},<br>
                    You are logged in!

                    {{ Form::open(array('url' => 'profile', 'method' => 'post')) }}
                    {{ Form::model($user, array('route' => array('profile', $user->id))) }}
                    <table class="table">
                    <tr><th>Email</th><td>{{ $user->email }}</td></tr>
                    <tr><th>Name</th><td>{{ Form::text('name', null, array('class' => 'form-control')) }}</td></tr>
                    <tr><th>Password</th><td>{{ Form::password('password', array('class' => 'form-control')) }}</td></tr>
                    <tr><th>Confirm</th><td>{{ Form::password('confirm', array('class' => 'form-control')) }}</td></tr>
                    <tr><td colspan="2">{{ Form::submit('update', array('class' => 'btn btn-primary')) }}</td></tr>
                    </table>
                    {{ Form::close() }}
                </div>
                <div class="panel-footer"><em>
                    Your account was created at {{ date("H:i", $convertedTime) }} on the {{ date("jS M Y", $convertedTime) }}
                    @if($user->created_at != $user->updated_at)
                            <br>Your account was updated last at {{ date("H:i", $convertedUpdateTime) }} on the {{ date("jS M Y", $convertedUpdateTime) }}
                    @endif</em>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
