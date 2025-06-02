<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserShowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function __invoke(Request $request)
    {

    }
}
