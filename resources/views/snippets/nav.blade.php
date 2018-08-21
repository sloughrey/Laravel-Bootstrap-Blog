<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">{{-- 
        <a class="p-2 text-muted" href="#">World</a>
        <a class="p-2 text-muted" href="#">Technology</a>
        <a class="p-2 text-muted" href="#">Design</a>
        <a class="p-2 text-muted" href="#">Culture</a>
        <a class="p-2 text-muted" href="#">Business</a> --}}
        @foreach ($categories as $cat)
            <a class="p-2 text-muted" href="/posts/categories/{{ $cat->name }}">{{ $cat->name  }}</a>
        @endforeach
    </nav>
</div>