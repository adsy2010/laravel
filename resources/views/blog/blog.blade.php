@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ Route('home') }}">Home</a></li>

        @if(Route::current()->getName() == 'usersBlogs')
            <li class="breadcrumb-item"><a href="{{ Route('blog') }}">Blog List</a></li>
            <li class="breadcrumb-item active">Blog List
                for <strong>{{ $user->name }}</strong>
            </li>
        @else
            <li class="breadcrumb-item active">Blog List</li>
        @endif
    </ol>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="">
            @include('common.errors')
            <div class="panel panel-default">
                <div class="panel-heading">Blog list
                @if(Route::current()->getName() == 'usersBlogs')
                    for <strong>{{ $user->name }}</strong>
                @endif
                </div>
                <div class="panel-body">
                    @if(count($blogs) == 0)
                        There are no blogs passed in right now.
                    @endif
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Subject</th>
                            <th>Posted at</th>
                        </tr>
                    @foreach($blogs as $blog)
                        <tr>
                            <td><a style="display:block; " href="/blog/{{ $blog->id }}">{{ $blog->subject }}</a></td>
                            <td>{{ date("d M Y - H:i", strtotime($blog->created_at)) }}</td>
                        </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
