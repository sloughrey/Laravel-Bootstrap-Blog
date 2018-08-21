@if (count($post->tags))
    <label class="list-label">Tags: </label>
    <ul class="tag-list list-unstyled">
        @foreach ($post->tags as $tag)
            <li class="tag-list-item"> <a href="/posts/tags/{{ $tag->name }}">{{ $tag->name }}</a></li>
        @endforeach
    </ul>
@endif