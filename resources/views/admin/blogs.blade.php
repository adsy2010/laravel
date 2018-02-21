@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ Route('home') }}">Home</a></li>

        @if(Route::current()->getName() == 'adminBlogs')
            <li class="breadcrumb-item"><a href="{{ Route('adminHome') }}">Admin Dashboard</a></li>
            <li class="breadcrumb-item active">
                Blog Management
            </li>
        @else
            <li class="breadcrumb-item active">Blog Management</li>
        @endif
    </ol>
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading"><h2>Blog Management</h2></div>
            <div class="panel-body">
                <div class="row">
                    @include('admin.sidebar')
                    <div class="col-sm-9 col-md-9 main">
                        <h2 class="sub-header">
                            Posted Blogs
                            <a class="btn btn-success pull-right" href="{{ Route('postblog') }}">Create Blog</a>
                        </h2>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Subject</th>
                                    <th>Posted by</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{ $blog->id }}</td>
                                        <td><a href="{{ Route('viewblog', $blog->id) }}">{{ $blog->subject }}</a></td>
                                        <td>{{ $blog->user->name }}</td>
                                        <td>{{ date("jS F, Y", strtotime($blog->created_at)) }}</td>
                                        <td align="right">
                                            <a class="btn btn-info" href="{{ Route('editblog', $blog->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                                            <a class="btn btn-danger" href="{{ Route('deleteblog', $blog->id) }}"><span class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $blogs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection