<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
class QuestionsController extends Controller
{
    //
     //
    public function create(Request $request)
    {
        $rand = substr(md5(microtime()),rand(0,26),5);
        $question=new Question;
        $question->content=$request->input('content');
        $question->exam_id=$request->input('id');
        $question->answer_id=$request->input('id');
        $question->code = $rand;
        if ($question->save()) {
            # code...
            return redirect()->back()->withErrors([
                'success'=>'Question Created',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Question Could Not be created',
            ]);
        }
        
        
    }


    public function delete(Request $request)
    {
        # code...
        $question = Question::where('id','=',$request->input('id'))->delete();
        if ($question) {
            # code...
            return redirect()->back()->withErrors([
                'success'=>'Question deleted',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Question Could Not be deleted',
            ]);
        }
    }
}
