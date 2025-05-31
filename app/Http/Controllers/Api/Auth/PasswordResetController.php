<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LinkEmailRequest;
use App\Mail\ResetPasswordLink;
use Illuminate\Support\Facades\Mail;

class PasswordResetController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function sendResetLinkEmail(LinkEmailRequest $request){
     Mail::to($request->email)->send(new ResetPasswordLink());

     return response()->json([
        'message'=>'Reset password mail send successfully.'
     ], 200);
    }

}
