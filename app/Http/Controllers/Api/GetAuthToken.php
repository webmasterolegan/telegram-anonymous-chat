<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\GetAuthTokenRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Аутентификация (выдача токена)
 */
class GetAuthToken
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(GetAuthTokenRequest $request)
    {
        $validated = $request->validated();

        if (Auth::attempt($request->only(['email', 'password']))) {
            $user = Auth::user();
            $token = $user->createToken($validated['token_name']);

            return response()->json([
                'status' => true,
                'message' => __('auth.success'),
                'token' => $token->plainTextToken,
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => __('auth.error'),
        ], 401);
    }
}
