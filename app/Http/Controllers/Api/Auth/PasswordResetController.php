<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LinkEmailRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Mail\ResetPasswordLink;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class PasswordResetController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendResetLinkEmail(LinkEmailRequest $request){
        $url = URL::temporarySignedRoute('password.reset', now()->addMinute(30),['email'=>$request->email]);
        $url = str_replace(env('APP_URL'), env('FRONTEND_URL'), $url);

        Mail::to($request->email)->send(new ResetPasswordLink($url));
        return response()->json([
        'message'=>'Reset password mail send successfully.'
        ], 200);
    }

    public function reset(ResetPasswordRequest $request)
    {
        $user  = User::whereEmail($request->email)->first();

        if (!$user){
            return response()->json([
                'message'=>'User not found'
            ],404);
        }

        $user->password = bcrypt($request->password);
        $user->save();
        return response()->json([
            'message'=>'Password reset successfully'
        ],200);

    }



}
