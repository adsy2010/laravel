@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="panel panel-primary">

            <div class="panel-heading">Create <em>{{ $request['id'] }}</em></div>
            <div class="panel-body">
                <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Version</th>
                        <th>Action</th>
                    </tr>
                    @foreach($wikiVersions as $version)
                    <tr>
                        <td>{{ $version->name }}</td>
                        <td>{{ $version->version }}</td>
                        <td></td>
                    </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>

@endsection