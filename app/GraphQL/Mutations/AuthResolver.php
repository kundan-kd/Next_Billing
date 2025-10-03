<?php

namespace App\GraphQL\Mutations;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthResolver
{
    public function register($_, array $args)
    {
        $validator = Validator::make($args, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            throw new \Exception(json_encode($validator->errors()->all()));
        }

        $user = User::create([
            'name' => $args['name'],
            'email' => $args['email'],
            'password' => bcrypt($args['password']),
        ]);

        // 🔐 USE THE JWT GUARD EXPLICITLY
        $token = auth('api')->login($user);
        
        $user->update([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);

        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => $user,
        ];
    }
    public function login($_, array $args)
    {
        $credentials = ['email' => $args['email'], 'password' => $args['password']];

        if (! $token = auth('api')->attempt($credentials)) {
            throw new \Exception('Invalid credentials.');
        }

        $user = auth('api')->user(); // Get the authenticated user

        $user->update([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
        ]);

        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => $user,
        ];
    }
    public function logout($_, array $args)
    {
        try {
            // Invalidate the token
            JWTAuth::invalidate(JWTAuth::getToken());

            return [
                'status' => true,
                'message' => 'Successfully logged out',
            ];
        } catch (\Exception $e) {
            return [
                'status' => false,
                'message' => 'Failed to log out, token may already be invalid.',
            ];
        }
    }
}
