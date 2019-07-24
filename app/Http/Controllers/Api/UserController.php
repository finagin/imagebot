<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Get current user by API
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return $request->user();
    }
}
