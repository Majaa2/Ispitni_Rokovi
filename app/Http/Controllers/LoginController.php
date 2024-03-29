<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request){

        if(Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ]))
        {
            $user = User::where('email',$request->email)->first();
            if($user->is_admin()){
                return redirect()->route('admin');
            }
            return redirect()->route('exams.create');
        }
        return redirect()->back();
    }
}
