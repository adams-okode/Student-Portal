<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ParentsController extends Controller
{
    //
    public function create(Request $request)
    {
        # code...
        $reg_no=rand(10,10000);
        $user= new User;
        $user->fname=$request->input('fname');
        $user->lname=$request->input('lname');
        $user->role='parent';
        $user->dob=$request->input('dob');
        $user->admission_no = $reg_no;
        $user->class=$request->input('class');
        $user->email=$request->input('email');
        $user->password=\Hash::make($request->input('email'));
        
        if ($user->save()) {
            # code...
            return redirect()->back()->withErrors([
                'success'=>'Parent Created',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Parent Could Not be created',
            ]);
        }

    }

    public function delete(Request $request)
    {
        # code...
        $exams = User::where('id','=',$request->input('id'))->delete();
        if ($exams) {
            # code...
            return redirect()->back()->withErrors([
                'success'=>'User deleted',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'User Could Not be deleted',
            ]);
        }
    }
}
