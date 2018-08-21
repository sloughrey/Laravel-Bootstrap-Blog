<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }

    public function create()
    {
        return view('sessions.create');
    }
    
    public function destroy()
    {
        auth()->logout();

        return redirect()->home();
    }

    public function store(Request $request)
    {
        // sign in or fail
        $credentials = $request->only('email', 'password');
        if(!\Auth::attempt($credentials))
        {
            return back()->withErrors([
                'message' => 'The username or password was incorrect'
            ]);
        }

        return redirect()->home();
    }
}
