<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;

class SubjectController extends Controller
{
    //
    public function create(Request $request)
    {
        $rand = substr(md5(microtime()),rand(0,26),5);
        $subject=new Subject;
        $subject->name= $request->input('name');
        $subject->description= $request->input('description');
        $subject->status=1;
        $subject->class_id=$request->input('id');
        $subject->code= $rand;
        if ($subject->save()) {
            # code...
            return redirect()->back()->withErrors([
                'success'=>'Subject Created',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Subject Could Not be created',
            ]);
        }
        
        
    }


    public function delete(Request $request)
    {
        # code...
        $subject = Subject::where('id','=',$request->input('id'))->delete();
        if ($subject) {
            # code...
            return redirect()->back()->withErrors([
                'success'=>'Subject deleted',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Subject  Could Not be deleted',
            ]);
        }
    }
}
