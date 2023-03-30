<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class loginController extends Controller
{

    
    public function login(Request $request) 
    {
        try{
            $request->validate([
                'email'=>'required',
                'password'=>'required'
            ]);

            $user = User::where('email',$request->post())->first();

            return response()->json([
                'status' => true,
                'message' => 'Admin logged In successfuly',
                'token' => $user->createToken("remember_token")->plainTextToken
            ],200);
        }
            catch(\Throwable $th){
                return response()->json([
                    'status' => false,
                    'message' => $th->getMessage()
                ],500);
            }
            
        
    }
         

    public function logout(){
        Auth::logout();
        return response(null , 200);
    }












}



