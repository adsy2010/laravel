@extends('layouts.app')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ Route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ Route('listNews') }}">News List</a></li>
        <li class="breadcrumb-item active">{{ $article['subject'] }}</li>
    </ol>
@endsection
@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading"><h2>{{ $article['subject'] }}</h2></div>
            <div class="panel-body">{!! $article['short_content'] !!} {!! $article['content'] !!}</div>
            <div class="panel-footer">
                Posted by: {{ $user['name'] }}
                First posted on: {{ $article['created_at'] }}
                @if($article['created_at'] != $article['updated_at'])
                    Updated last: {{ $article['updated_at'] }}
                @endif
            </div>
        </div>
    </div>
@endsection