<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class loginController extends Controller
{

    
    public function login(Request $request) 
    {
        $fields = $request->validate([
             'email' => 'required|string',
             'password' => 'required|string',
         ]);
         //check mail
         $user = User::where('email', $fields['email'])->first();
         //check password
         if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message' => 'Bad creds'
            ],404);
         }
         $token = $user->createToken('authToken')->plainTextToken;      

         return response()->json([
             'message' => 'Successfully logged in',
             'user' => $user,
             'token' => $token
         ], 200);
        
    }
         

    public function logout(){
        Auth::logout();
        return response(null , 200);
    }












}



