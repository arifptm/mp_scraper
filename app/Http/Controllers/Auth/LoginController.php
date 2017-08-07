<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    public function __construct(){
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request){
        
        $message = [
            $this->username() . '.exists' => 'The selected email is invalid or the account has been disabled.'
        ];

        $this->validate($request, [
            $this->username() => [
                'required',
                Rule::exists('users')->where(function ($query) {
                    $query->where('status', 1);
                }),
            ],
            'password' => 'required'
        ], $message);
    }

}
