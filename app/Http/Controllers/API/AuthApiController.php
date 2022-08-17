<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthApiController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if(!$user){
            return response()->json([
                'success' => false,
                'message' => 'Email or password wrong!'
            ], 403);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password]))
        {
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'success' => true,
                'message' => 'Login successfully!',
                'token' => $token,
                'user' => $user
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'email or password wrong!'
            ], 403);
        }

    }
}
