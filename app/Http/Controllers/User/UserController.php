<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    
    public function store(UserStoreRequest $request)
    {
        $user=User::create($request->only(['email','name','password']))
        ->sendEmailVerificationNotification();;
        

        return response()
        ->json(['Message'=>'Verification Link Sent to your email','code'=>201],201);
    }

    
}
