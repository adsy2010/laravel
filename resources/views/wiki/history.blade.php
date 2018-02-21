@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="panel panel-default">

            <div class="panel-heading"><h1>History for {{ $request['id'] }}</h1></div>
            <div class="panel-body">
                <table class="table table-striped">
                    <tr>
                        <th>Revision</th>
                        <th>Created by</th>
                        <th>Updated by</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                    @foreach($wikiVersions as $version)
                    <tr>
                        <td><a href="{{ Route('historicVersionWikiPage', [$version->name, $version->version]) }}">Version {{ $version->version }}</a></td>
                        <td>{{ $version->page->user->name }}</td>
                        <td>{{ $version->user->name }}</td>
                        <td>{{ $version->updated_at }}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="{{ Route('historicVersionWikiPage', [$version->name, $version->version]) }}">View</a>
                            <a class="btn btn-sm btn-warning" href="#">Restore</a>
                            <a class="btn btn-sm btn-danger" href="#">Remove</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>

@endsection