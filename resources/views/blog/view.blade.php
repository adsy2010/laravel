@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ Route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ Route('blog') }}">Blog List</a></li>
        <li class="breadcrumb-item active">{{ $blog->subject }}</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2><strong>{{ $blog->subject }}</strong>
                    @if($blog->user_id == Auth::id())
                            <div class="dropdown pull-right">
                                <a data-toggle="dropdown" class="btn btn-sm btn-default">
                                    <span class="glyphicon glyphicon-cog"></span>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ Route('editblog', $blog->id) }}"><span class="glyphicon glyphicon-pencil"></span> Edit Blog</a></li>
                                    <li><a href="{{ Route('deleteblog', $blog->id) }}"><span class="glyphicon glyphicon-trash"></span> Delete Blog</a></li>
                                </ul>
                            </div>
                        @endif
                        </h2>
                        <h5>{{ date("F jS, Y", strtotime($blog->created_at))}} by
                            <a href="{{  url("/blog/user/{$blog->user_id}") }}">{{ $blog['user']['name'] }}</a>
                        </h5>
                    </div>

                    <div class="panel-body">
                        {!! $blog->content !!}
                    </div>
                    <div class="panel-footer">
                        @if($blog->created_at != $blog->updated_at)
                            Last updated on {{ date("jS F Y", strtotime($blog->updated_at)) }}
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection