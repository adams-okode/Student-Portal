<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
class ExamController extends Controller
{
   
    //
    public function create(Request $request)
    {
        $rand = substr(md5(microtime()),rand(0,26),5);
        $exam=new Exam;
        $exam->name= $request->input('name');
        $exam->status=1;
        $exam->subject_id=$request->input('id');
        $exam->code= $rand;
        if ($exam->save()) {
            # code...
            return redirect()->back()->withErrors([
                'success'=>'Exam Created',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Exam Could Not be created',
            ]);
        }
        
        
    }


    public function delete(Request $request)
    {
        # code...
        $exam = Exam::where('id','=',$request->input('id'))->delete();
        if ($exam) {
            # code...
            return redirect()->back()->withErrors([
                'success'=>'Exam deleted',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Exam Could Not be deleted',
            ]);
        }
    }
}
