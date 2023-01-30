<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\UserAccessToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ApiAuthController extends Controller
{
    public function apiLogin(LoginRequest $request) {
        $errors = [];
        try {
            $validated = $request->validate([
                'email' => ['required', 'string', 'min:5', 'max:255'],
                'password' => ['required', 'string', 'max:255'],
            ]);            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->validator->errors()->messages()]);
        }
        $email = $validated['email'];
        $password = $validated['password'];
        $request->authenticate();
        $token = UserAccessToken::createToken(Auth::id(), ['*']);
        return response()->json(['token' => $token->token]);
    }

    public function apiLogout(Request $request) {
        UserAccessToken::$currentToken->delete();
        return json_encode(['token' => 'undefined']);
    }
}
