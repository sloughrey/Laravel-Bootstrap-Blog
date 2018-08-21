@extends ('master')

@section ('content')
    <div class="col-md-8 blog-main">
        
        @include('snippets.errors')
        
        <div id="signin-container">
            <h1>Sign In</h1>
            <form method="POST" action="/login">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
    
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
    
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </div>
            </form>
        </div>
        
        <div id="forgot-password-container">
            <h1>Forgot Password</h1>
            <form method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="forgot-pw-email">Email Address:</label>
                    <input type="email" class="form-control" id="forgot-pw-email" name="email">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
@endsection