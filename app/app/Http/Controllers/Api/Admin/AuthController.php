<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
  public function login(Request $request)
  {
    if (Str::startsWith($request->headers->get('referer'), env('APP_URL'))) {
      $request['email'] = env('API_USER');
      $request['password'] = env('API_PASSWORD');
    }

    $credentials = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
      $request->user()->tokens()->delete();
      // sanctumのときはこっち
      // $token = $request->user()->createToken('front-api')->plainTextToken;
      $token = $request->user()->createToken('front-api')->accessToken;

      return response()->json([
        'token' => $token,
      ], 200);
    }
    return response()->json(['error' => '認証に失敗しました。'], 401);
  }
}
