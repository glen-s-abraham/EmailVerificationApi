<?php

namespace App\Http\Controllers\Verification;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class VerificationController extends Controller
{
    public function verify(Request $request,$id)
    {
        if(!$request->hasValidSignature())
        {
            return response()
            ->json(['message'=>'Bad request','code'=>400],400);
        }

        $user=User::findOrFail($id);

        if(!$user->hasVerifiedEmail())
        {
            $user->markEmailAsVerified();
        }

        return response()
        ->json(['message'=>'Account Verified','code'=>200],200);
    }

    public function resend()
    {
        if(auth()->user->hasVerifiedEmail())
        {
            return response()
            ->json(['message'=>'Account already verified','code'=>409],409);
        }

        auth()->user->sendEmailVerificationNotification();

        return response()
        ->json(['message'=>'Email Verification Link resend','code'=>200],200);

    }
}
