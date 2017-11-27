<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Question;
use App\Mark;

class TestsController extends Controller
{
    
    //
    public function create(Request $request)
    {
        $exams_ = Test::where('exam_id','=',$request->input('exam'))->first();
        if (json_decode(json_encode($exams_)) == []) {
            $rand = substr(md5(microtime()),rand(0,26),5);
            $exams=new Test;
            $exams->exam_id= $request->input('exam');
            $exams->code = $rand;
            if ($exams->save()) {
                # code...
                return redirect()->back()->withErrors([
                    'success'=>' Test Created',
                ]);
            } else {
                # code...
                return redirect()->back()->withErrors([
                    'error'=>' Test Could Not be created',
                ]);
            }
        } else {
            # code...
            return redirect()->back()->withErrors([
                    'error'=>'Test Already Exists for exam',
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

    public function finish_exams(Request $request)
    {
        # code...
        try{
            $mark = new Mark;
            $results = $request->all();
            $questions = Question::get();
            $test = Test::where('id','=',$request->input('id'))->first();
            $i=0;
            $j=0;
            foreach ($results as $key => $value) {
                # code...
                if ($key == 'id')continue;
                $data_=explode(':',$value);
                foreach ($questions as $question) {
                    # code...
                    if ($data_[1] != $question->id)continue;
                        $j++;
                    if ($data_[0] != $question->answer_id) continue;
                        $i++;

                }
                
            }
            $total=count(Question::where('exam_id','=',$test->exam_id)->get());
            $mark->value=($i/$total)*100;
            $mark->student_id=\Auth::user()->id; 
            $mark->exam_id=$test->exam_id;       
            $mark->save();
            return redirect('test')->withErrors([
                'success'=>'Exam completed correct questions '.($i/$total)*100 .'%',
            ]);
        }catch(\Exception $e){
            return redirect('test')->withErrors([
                'error'=>'no questios submitted',
            ]);
        }
    }
}
