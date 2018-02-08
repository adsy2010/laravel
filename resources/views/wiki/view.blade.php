@extends('layouts.app')

@section('content')

    <div class="container">
        @include('common.errors')
        <div class="panel panel-primary">

            <div class="panel-heading">
                <em>{{ $page->name }}</em>
                <a class="btn btn-sm btn-default pull-right">
                    <span class="glyphicon glyphicon-cog"></span>
                    <span class="caret"></span>
                </a>
            </div>
            <div class="panel-body" style="min-height: 400px;">
                {!! $page->content !!}
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-6">
                        Version: {{ $page->version }}<br>
                        Created at: {{ $page->created_at }}<br>
                        Created by: {{ $creator->name }}
                    </div>
                    <div class="col-md-6">
                        @if($page->created_at != $pageDetails->updated_at)
                            Updated at: {{ $pageDetails->updated_at }}<br>
                            Updated last by: {{ $updater->name }}
                        @endif
                    </div>
                </div>



            </div>

        </div>
    </div>

@endsection