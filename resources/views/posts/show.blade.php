@extends ('master')

@section ('content')
<div class="col-md-8 blog-main">
    <h1>{{ $post->title }}</h1>

    @include ('tags.taglist')

    <article class="post-body">
        {!! nl2br(htmlspecialchars($post->body)) !!}
    </article>

    <hr>
    
    @if (count($post->comments))
        <div class="comments">
            <ul class="listgroup">
                @foreach ($post->comments as $comment)
                    <li class="list-group-item">
                        <strong>
                            {{ $comment->user->name . ' (' . $comment->created_at->diffForHumans() . ')' }}: &nbsp
                        </strong>
                        {!! nl2br(htmlspecialchars($comment->body)) }}
                    </li>
                @endforeach
            </ul>
        </div>

        <hr>
    @endif

    <div class="card">
        <div class="card-block">
            <form method="POST" action="/posts/{{ $post->id }}/comments">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea placeholder="Your comment here." class="form-control" name="body" id="comment-body" required></textarea>
                </div>
 
                <div class="form-group">
                    <button type="submit" class="btn  btn-primary">Add Comment</button>
                </div>
            </form>

            @include('snippets.errors')
        </div>
    </div>
</div>
@endsection