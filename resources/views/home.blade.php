@extends('layouts.app')

@section('jumbotron')
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1>Welcome to 00freebuild.info</h1>
        <p>
            We have been online for around 8 years now originally as a community site for Minecraft and now as a test platform for code projects.
            Have a look around and see whats going on.
        </p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
    </div>
</div>
@endsection

@section('content')


    <div class="container">
        <!-- Example row of columns -->
        <h1>Latest News</h1>
        <div class="row">
            @foreach($news as $article)
            <div class="col-md-4">
                <h2>{{ $article['subject'] }}</h2>
                <p>{!! $article['short_content'] !!}</p>
                <p><a class="btn btn-default" href="{{ Route('newsArticle', array($article['id'])) }}" role="button">View details &raquo;</a></p>
            </div>
            @endforeach

        </div>

        <hr>

        <footer>
            <p>&copy; 2018 00freebuild.info</p>
        </footer>
    </div>
@endsection
