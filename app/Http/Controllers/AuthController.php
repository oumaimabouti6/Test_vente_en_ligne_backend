<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;

class AuthController extends Controller
{
    public function signUp(Request $request){
        $request ->validate ([
            'user_name' => 'required|string',
            'user_password' => 'required|string'

        ]);


        $user = User::create([
            'name' => $request->user_name,
            'password' => bcrypt($request->user_password)
        ]);
        $token = $user->createToken('apiToken')->plainTextToken;

        $res = [
            'user' => $user,
            'token' => $token
        ];
        return response(['status'=>201]);
        
    }
    public function signIn(Request $request)
    {
       
        $password = $request->password;
        $user = User::where('name', $request['name'])->first();
        if (isset($user)) {
            if ($password == $user->password) {
                $token = $user->createToken('access_token')->plainTextToken;
                return response()->json(['user' => new UserResource($user), 'token' => $token]);
            } else {
                return response('errors.invalid_password', 401);
            }
        } else {
            return response('errors.invalid_name', 404);
        }
    }
    
    public function logOut(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response('', 200);
    }

    
}
