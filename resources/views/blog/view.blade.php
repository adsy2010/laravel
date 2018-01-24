@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Blog</div>

                    <div class="container">
                        {{ $blog->subject }} - Posted at {{ $blog->created_at }}<hr>
                        {{ $blog->content }} <hr>
                        This blog was posted by: {{ $user->name }}
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection