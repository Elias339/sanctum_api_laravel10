<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function __invoke(Request $request)
    {
        return response()->json([
            'message'=>'Dashboard'
        ],200);
    }
}
