<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class StudentController extends Controller
{
    //
    public function create(Request $request)
    {
        # code...
        $reg_no=rand(10,10000);
        $user= new User;
        $user->fname=$request->input('fname');
        $user->lname=$request->input('lname');
        $user->role='student';
        $user->dob=$request->input('dob');
        $user->admission_no = $reg_no;
        $user->class=$request->input('class');
        $user->email=$request->input('email');
        $user->password=\Hash::make($request->input('email'));
        
        if ($user->save()) {
            # code...
            return redirect()->back()->withErrors([
                'success'=>'Student Created',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Student Could Not be created',
            ]);
        }

    }

    public function delete(Request $request)
    {
        # code...
        $exams = Test::where('id','=',$request->input('id'))->delete();
        if ($exams) {
            # code...
            return redirect()->back()->withErrors([
                'success'=>'Class deleted',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Class Could Not be deleted',
            ]);
        }
    }
}
