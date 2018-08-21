@extends ('master')

@section ('content')
    <div class="col-md-8 blog-main">
        <h1>Create a Post</h1>
        
        <hr>
        
        <form method="POST" action="/posts">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Post title" name="title" required>
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" id="body" name="body" required></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>

            {{ csrf_field() }}
        </form>

        @include('snippets.errors')
    </div>
@endsection