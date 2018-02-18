@extends('layouts.app')

@section('content')

    <div class="container">
        @include('common.errors')
        <div class="panel panel-default">

            <div class="panel-heading">
                <h1>
                    <strong>
                        {{ ucfirst($page->convertSpaces($page->name)) }}
                    </strong>

                <div class="dropdown pull-right">
                <a data-toggle="dropdown" class="btn btn-sm btn-default">
                    <span class="glyphicon glyphicon-cog"></span>
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ Route('editWikiPage', $page->name) }}">Edit Page</a></li>
                    <li><a href="{{ Route('historyWikiPage', $page->name) }}">History</a></li>
                    <li><a href="{{ Route('deleteWikiPage', $page->name) }}">Delete Page</a></li>
                </ul>
                </div></h1>
            </div>
            <div class="panel-body" style="min-height: 400px;">
                {!! $page->ParseContent() !!}
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-md-6">

                        <h5>{{ 'Created: '.date("F jS, Y @ H:i", strtotime($pageDetails->created_at)) }} by <a href="#">{{ $creator->name }}</a></h5>
                        @if($pageDetails->created_at != $page->updated_at)
                            <h5>{{ 'Updated: '.date("F jS, Y @ H:i", strtotime($page->updated_at)) }} by <a href="#">{{ $creator->name }}</a></h5>
                        @endif
                    </div>
                    <div style="text-align: right" class="col-md-6">
                        Version: {{ $page->version }}<br>
                    </div>
                </div>



            </div>

        </div>
    </div>

@endsection