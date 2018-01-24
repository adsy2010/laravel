@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Blog list</div>
                @if(count($blogs) == 0)
                    There are no blogs passed in right now.
                @endif
                @foreach($blogs as $blog)
                    <a href="/blog/{{ $blog->id }}">{{ $blog->subject }}</a> - {{ date("d M Y - H:i", strtotime($blog->created_at)) }} <br>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
