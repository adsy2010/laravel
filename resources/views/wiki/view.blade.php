@extends('layouts.app')

@section('content')

    <div class="container">
        @include('common.errors')
        <div class="panel panel-primary">

            <div class="panel-heading"><em>{{ $page->name }}</em></div>
            <div class="panel-body">
                {{ $page->content }}
            </div>
            <div class="panel-footer">
                {{ $page->version }}
                {{ $page->created_at }}
                {{ $page->updated_at }}
            </div>

        </div>
    </div>

@endsection