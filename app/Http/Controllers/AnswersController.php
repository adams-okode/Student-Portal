<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;

class AnswersController extends Controller
{
   
     //
    public function create(Request $request)
    {
        $rand = substr(md5(microtime()),rand(0,26),5);
        $answers=new Answer;
        $answers->option_= $request->input('option');
        $answers->content= $request->input('content');
        $answers->question_id= $request->input('id');
        $answers->code = $rand;
        if ($answers->save()) {
            # code...
            return redirect()->back()->withErrors([
                'success'=>'Answer Created',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Answer Could Not be created',
            ]);
        }
        
        
    }

    public function delete(Request $request)
    {
        # code...
        $answers = Answer::where('id','=',$request->input('id'))->delete();
        if ($answers) {
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
