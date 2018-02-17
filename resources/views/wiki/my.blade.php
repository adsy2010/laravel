@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="panel panel-primary">

            <div class="panel-heading">My Pages</div>
            <div class="panel-body">
                <table class="table table-striped">
                    <tr>
                        <th>Created at</th>
                        <th>Page name</th>
                        <th>Current version</th>
                        <th>Last updated by</th>
                    </tr>
                    @foreach($page as $p)
                        @php
                        //reduce processing overhead
                        $latest = $p->latest();
                        @endphp

                        <tr>
                            <td>{{ $p->created_at }}</td>
                            <td><a href="{{ Route('showWikiPage', [$latest->name]) }}">{{ $latest->name }}</a></td>
                            <td>{{ $latest->version }}</td>
                            <td>{{ $latest->user->name }}</td>
                        </tr>


                    @endforeach
                </table>

            </div>

        </div>
    </div>

@endsection