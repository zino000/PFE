<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

class loginController extends Controller
{
    
    public function login(Request $request) : Response
    {
        $crendentials = $request->only('email' , 'password') ;

        if(Auth::attempt($crendentials)){
            return response(Auth::user() , 200);
        }
        abort(491) ;
    }

    public function logout(){
        Auth::logout();
        return response(null , 200);
    }












}



