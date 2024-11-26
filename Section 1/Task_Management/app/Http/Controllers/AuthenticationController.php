<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

/**
 * Class AuthenticationController
 * Handles user authentication, including registration, login, and logout.
 */
class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validated->fails())
            return response()->json([
                'status' => 400,
                'message' => $validated->errors()->toJson()
            ], 400);

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'status' => '200',
            'message' => 'User registered successfully.',
            'user' => $user,
            'token' => $token
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials))
                return response()->json([
                    'status' => 401,
                    'message' => 'Invalid credentials'
                ], 401);

            return response()->json([
                'status' => 200,
                'message' => 'Logged in successfully.',
                'token' => $token
            ], 200);
        }
        catch (JWTException $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Could not create token'
            ], 500);
        }
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json([
            'status' => 200,
            'message' => 'Successfully logged out'
        ], 200);
    }
}
