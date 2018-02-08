@extends('layouts.app')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ Route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">News List</li>
    </ol>
@endsection
@section('content')
<div class="container">
    <table class="table">
        <tr>
            <th>Subject</th>
            <th>Posted at</th>
        </tr>
        @if(count($articles) == 0)
            <tr>
                <td colspan="2">No articles posted!</td>
            </tr>
        @endif
        @foreach($articles as $article)
            <tr>
                <td><a href="{{ Route('newsArticle', array($article['id'])) }}">{{ $article->subject }}</a></td>
                <td>{{ date("F jS, Y", strtotime($article['created_at']))}} by
                    <a href="#">{{ $article['user']['name'] }}</a></td>
            </tr>
        @endforeach
    </table>
</div>
@endsection