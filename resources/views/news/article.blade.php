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
            <div class="panel-heading">
                <h2>{{ $article['subject'] }}</h2>
                <h5>{{ date("F jS, Y", strtotime($article['created_at']))}} by
                    <a href="#">{{ $article['user']['name'] }}</a>
                </h5>
            </div>
            <div class="panel-body">{!! $article['short_content'] !!} {!! $article['content'] !!}</div>
            @if($article['created_at'] != $article['updated_at'])
                <div class="panel-footer">
                    Updated last: {{ $article['updated_at'] }}
                </div>
            @endif
        </div>
    </div>
@endsection