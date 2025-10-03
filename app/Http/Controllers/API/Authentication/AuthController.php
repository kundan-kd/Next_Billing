<?php

namespace App\Http\Controllers\API\Authentication;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
  public function register(Request $request){
        $validationData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $validationData['name'],
            'email' => $validationData['email'],
            'password' => bcrypt($validationData['password']),
        ]);
        $token = auth('api')->login($user);
        return $this->respondWithToken($token); 
    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            // return response()->json(['error' => 'Unauthorized'], 401);
            return $this->sendError('Unauthorised.', ['error' => 'Email or password is wrong']);
        }
        $success['token'] = $token;
        return $this->sendResponse($success, 'User login successfully.');
    }
}
