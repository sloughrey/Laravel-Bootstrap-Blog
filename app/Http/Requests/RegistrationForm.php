<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Auth;

class RegistrationForm extends FormRequest
{
    protected $redirectRoute = 'login';
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // @todo  if already logged in cannot post to create new user
        if (Auth::check()) {
            return false;
        }
        
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [// validate the form
            'name' => 'required|min:2',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ];
    }

    /**
     * This function is called after the request data has passed the rules request data
     *
     * @param [type] $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (User::checkEmailExists(request('email'))) {
                $validator->errors()->add(
                    'email',
                    'A user with this email already exists.  Please login or use the password reset.'
                );
            }
        });
    }

    public function persist()
    {
        // create and save the user
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        // sign the user in
        auth()->login($user);

        // send welcome mail
        \Mail::to($user)->send(new Welcome($user));
    }

    /**
    *  Overwrite any error messages for this request object
    *
    * @return array
    */
    public function messages()
    {
        return [
            // 'title.required' => 'A title is required',
            // 'body.required'  => 'A message is required',
        ];
    }
}
