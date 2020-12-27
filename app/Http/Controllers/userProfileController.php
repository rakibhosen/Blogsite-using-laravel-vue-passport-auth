<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;


class userProfileController extends Controller
{
    public function userProfile(){
   
        return view('auth.userProfile');
     }

     public function AuthUser(){
         if(Auth::user()){
            $user= Auth()->user();
            return response()->json([
               'data'=>$user,
               'success'=>true,
            ]);
         }

     }
     
}
