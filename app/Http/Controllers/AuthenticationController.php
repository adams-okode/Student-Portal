<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AuthenticationController extends Controller
{
    //
    public function login(Request $request)
    {
    	# code...
        $email=$request->input('email');
        $password=$request->input('password');

        if (Auth::attempt(['email'=>$email,'password'=>$password])) {
            return redirect('home');
        } else {
            return redirect()->back()->withErrors([
                'error'=>'username or password invalid',
            ]);
        }
        
    }


    public function register(Request $request)
    {
        # code...
        
    }

    public function change_pass(Request $request)
    {
        # code...

        if ($request->input('password') !== $request->input('passcheck')) {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Passwords do not match',
            ]);
        }
        $user = User::where('id','=',Auth::user()->id)->update([
            'password'=>\Hash::make($request->input('password')),
        ]);

        if($user){

            return redirect()->back()->withErrors([
                'success'=>'Password Updated',
            ]);

        }else{

            return redirect()->back()->withErrors([
                'error'=>'Password not updated',
            ]);

        }
    }
}
