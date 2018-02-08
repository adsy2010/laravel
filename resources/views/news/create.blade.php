@extends('layouts.app')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ Route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ Route('listNews') }}">News List</a></li>
        <li class="breadcrumb-item active">Create News</li>
    </ol>
@endsection
@section('content')
<div class="container">
        @include('common.errors')
    <div class="panel panel-primary">
        <div class="panel-heading"><h2>Create a news article</h2></div>
        <div class="panel-body">
            {{ Form::open(array('url' => 'news/create', 'method' => 'post')) }}
            {{ Form::label('subject', 'Subject') }}
            {{ Form::text('subject', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'News Subject']) }}<br>
            {{ Form::label('short_content', 'Summary Article (1000 characters maximum)') }}
            {{ Form::textarea('short_content', null, ['size' => '30x5']) }}<br>
            {{ Form::label('content', 'Main Article') }}
            {{ Form::textarea('content') }}<br>
            {{ Form::submit('Add News', ['onclick' => '', 'class' => 'btn btn-primary']) }}
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection