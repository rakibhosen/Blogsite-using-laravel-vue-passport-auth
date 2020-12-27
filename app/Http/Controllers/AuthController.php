<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use AuthenticatesUsers;
    public function Register(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8',],
        ]);

         $user = new User();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->password = Hash::make($request->password);
        $user->save();
    }


    public function Login(Request $request){

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = User::where('email',$request->email)->first();
            return response()->json([
            'success'=>true,
            'message'=>'Logged in successfully',
            'data'=>$user,
           
        ]);
        }else{
            return response()->json([
                'success'=>false,
                'message'=>'Sorry invalid Email or Password',
            ]);
        }
    }


}


