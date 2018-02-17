@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="panel panel-primary">

            <div class="panel-heading">History</div>
            <div class="panel-body">
                <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Version</th>
                        <th>Created by</th>
                        <th>Updated by</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                    @foreach($wikiVersions as $version)
                    <tr>
                        <td><a href="{{ Route('historicVersionWikiPage', [$version->name, $version->version]) }}">{{ $version->name }}</a></td>
                        <td>{{ $version->version }}</td>
                        <td>{{ $version->page->user->name }}</td>
                        <td>{{ $version->user->name }}</td>
                        <td>{{ $version->updated_at }}</td>
                        <td></td>
                    </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>

@endsection