<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AjaxController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSetting(Request $request): \Illuminate\Http\JsonResponse
    {
        if (!Str::startsWith($request->header('referer'), env('APP_URL'))) {
            return response()->json([], 401);
        }

        $result = [
            'grant_type' => 'password',
            'client_id' => env('PASSWORD_API_CLIENT'),
            'client_secret' => env('PASSWORD_API_SECRET'),
            'username' => env('API_USER'),
            'password' => env('API_PASSWORD'),
            'scope' => '*',
        ];

        return response()->json($result);
    }
}
