<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyToken')-> accessToken; 
            $success['name'] =  $user->name;
   
            return response()->json(['token'=>$success, 'msg'=>'User login successfully.']);
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised']);
        } 
    }
}
