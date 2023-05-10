<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);

        $token = $user->createToken('assigmenttoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
            'message'=> 'user registered successfully'
        ];
        
        return response($response, 201);
    }

    public function login(Request $request)
    {
        /* $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ]; */
        $user = User::where('email', $request['email'])->first();

        if(!$user || !Hash::check($request['password'], $user->password)) {
            
            return response([
                'message' => 'Bad credentials'
            ], 401);
        }
        $token = $user->createToken('assigmenttoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
            'message'=>'User Logged in successfully'
        ];

        return response($response, 201);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        $response = [
            'message'=>'User Logged out successfully'
        ];
        return response($response, 201);
    }

    public function get_all_profile(){
        $users = User::all();
        $response = [
            'message'=>'List of All the Users',
            'users'=>$users,
        ];

        return response($response, 201);
    }

    public function get_profile($id){
        $user = User::find($id);
        $response = [
            'message'=>'Single User',
            'users'=>$user,
        ];

        return response($response, 201);
    }
}