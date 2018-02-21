@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ Route('home') }}">Home</a></li>

        @if(Route::current()->getName() == 'adminNews')
            <li class="breadcrumb-item"><a href="{{ Route('adminHome') }}">Admin Dashboard</a></li>
            <li class="breadcrumb-item active">
                News Management
            </li>
        @else
            <li class="breadcrumb-item active">News Management</li>
        @endif
    </ol>
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading"><h2>News Management</h2></div>
            <div class="panel-body">
                <div class="row">
                    @include('admin.sidebar')
                    <div class="col-sm-9 col-md-9 main">
                        <h2 class="sub-header">
                            Posted News
                            <a class="btn btn-success pull-right" href="{{ Route('createNews') }}">Create News</a>
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
                                @foreach($news as $newsItem)
                                    <tr>
                                        <td>{{ $newsItem->id }}</td>
                                        <td><a href="{{ Route('newsArticle', $newsItem->id) }}">{{ $newsItem->subject }}</a></td>
                                        <td>{{ $newsItem->user->name }}</td>
                                        <td>{{ date("jS F, Y", strtotime($newsItem->created_at)) }}</td>
                                        <td align="right">
                                            <a class="btn btn-info" href="{{ Route('editNews', $newsItem->id) }}"><span class="glyphicon glyphicon-pencil"></span></a>
                                            <a class="btn btn-danger" href="{{ Route('deleteNews', $newsItem->id) }}"><span class="glyphicon glyphicon-trash"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $news->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection