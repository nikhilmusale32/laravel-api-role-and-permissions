<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Validator;
use App\Http\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Auth;


class LoginController extends Controller
{
    //

    public function Login(Request $request)
    {
            if(!Auth::attempt($request->only('email','password')))
            {
                Helper::sendError('Email Or Password is not Valid');
            }
            return new UserResource(auth()->user());

    }
}
