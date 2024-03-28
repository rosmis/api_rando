<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()
                ->json('connected', JsonResponse::HTTP_NO_CONTENT);
        }

        return response()->json([
            'message' => 'Invalid login details'
        ], JsonResponse::HTTP_UNAUTHORIZED);
    }

    public function logout(Request $request): JsonResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()
            ->json('disconnected', JsonResponse::HTTP_NO_CONTENT);
    }
}
