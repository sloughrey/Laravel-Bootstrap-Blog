<div class="blog-post">
    <h2 class="blog-post-title"><a href="/posts/{{ $post->id }}"> {{ $post->title }} </a></h2>
    @include('tags.taglist')
    <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }} by <a href="#">{{ $post->user->name }}</a></p>

<?php  $postText = (\Request::route()->getName() == 'home') ? $post->getBodyExcerpt() : $post->body ?>
    <p>{!! nl2br(htmlspecialchars($postText)) !!}</p>
</div><!-- /.blog-post -->