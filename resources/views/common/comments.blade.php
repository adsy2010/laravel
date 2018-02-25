<div class="panel panel-default">
    <div class="panel-heading">
        @if($comments->count() == 0)
            No Comments

        @elseif($comments->count() == 1)
            1 Comment
        @else
            {{ $comments->count() }} Comments
        @endif
    </div>
    <div class="panel-body">
        @include('common.errors')
        @guest
        <a href="{{ Route('login') }}">Sign in </a>to post comments
        @else
        {{ Form::open(array('url' => url()->current(), 'method' => 'post')) }}
        {{ Form::label('content', 'Post a comment') }}
        {{ Form::text('content', null, ['class' => 'form-control', 'rows' => 2]) }}<br>
        {{ Form::submit('post comment', ['class' => 'btn btn-success']) }}
        {{ Form::close() }}<br>
        @endguest

        @foreach($comments as $comment)
            <div class="row ">
                <div class="col-xs-3">
                    <img class="img-responsive" src="/images/user.png">
                </div>
                <div class="panel panel-default col-xs-8">
                    <div class="panel-heading">{{ $comment->userDetail->name }} replied at {{ date("H:i \o\\n jS F Y", strtotime($comment->created_at)) }}</div>

                    <div class="panel-body">{{ $comment->content }}</div>
                </div>
            </div>
                <hr>
        @endforeach
            {{ $comments->links() }}
    </div>
</div>