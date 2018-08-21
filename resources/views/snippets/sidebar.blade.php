<aside class="col-md-4 blog-sidebar">
    <div class="p-3">
        <h4 class="font-italic">Tags</h4>
        <ol class="list-unstyled mb-0">
            @foreach ($tags as $tag)
                <li><a href="/posts/tags/{{ $tag }}">{{ $tag }}</a></li>    
            @endforeach
        </ol>
    </div>

    <div class="p-3">
        <h4 class="font-italic">Archives</h4>
        <ol class="list-unstyled mb-0">
            @foreach ($archives as $archive)
                <li><a href="/?month={{ $archive['month'] . '&year=' . $archive['year']}}">{{ $archive['month'] . ' ' . $archive['year'] . ' (' . $archive['published'] . ')'}} </a></li>    
            @endforeach
        </ol>
    </div>

    <div class="p-3">
        <h4 class="font-italic">Elsewhere</h4>
        <ol class="list-unstyled">
        <li><a href="https://github.com/sloughrey">GitHub</a></li>
        <li><a href="https://twitter.com/loughreyS">Twitter</a></li>
        </ol>
    </div>
</aside>