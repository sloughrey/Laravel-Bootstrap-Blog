@extends ('master')

@section ('content')
    <div class="col-md-8 blog-main">
        <h1>Register</h1>

        <form method="POST" action="/register">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name:</label>
                <input id="name" name="name" type="text" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input id="email" name="email" type="email" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input id="password" name="password" type="password" class="form-control">
            </div>
            
            <div class="form-group">
                    <label for="password_confirmation">Password Confirmation:</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control">
                </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>

            @include('snippets/errors')
        </form>
    </div>
@endsection