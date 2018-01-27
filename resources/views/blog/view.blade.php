@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="">
                <div class="panel panel-primary">
                    <div class="panel-heading"><h3><strong>{{ $blog->subject }}</strong>
                    @if($blog->user_id == Auth::id())
                        <div class="pull-right">
                            <a class="btn btn-sm btn-warning" href="{{ url("/blog/edit/{$blog->id}") }}">edit</a>
                            <a class="btn btn-sm btn-danger" href="{{ url("/blog/delete/{$blog->id}") }}">delete</a>
                        </div>
                        @endif
                        </h3>
                    </div>

                    <div class="panel-body">
                        {{ $blog->content }}
                    </div>
                    <div class="panel-footer">
                        This blog was posted by: {{ $user->name }}<br>Posted at {{ $blog->created_at }}
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection