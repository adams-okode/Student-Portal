<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Classes;
use App\Subject;
use App\Exam;
use App\Question;
use App\Answer;
use App\Test;
use App\User;
use App\Mark;

class ViewsController extends Controller
{
    //
    public function home($value='')
    {
        session(['key' => '1111']);
    	return view('dashboard');
    }


    public function classes($value='')
    {
        $classes = Classes::get();
        session(['key' => '2222']);
    	return view('classes')->with([
            'classes'=>$classes,
        ]);
    }


    public function classdetails(Request $request)
    {
        $class = Classes::where('id','=',$request->input('id'))->first();
        $subjects = Subject::where('class_id','=',$request->input('id'))->get();
        session(['key' => '2222']);
    	return view('particulars')->with([
            'class' =>$class,
            'subjects'=> $subjects
        ]);
    }

    public function exams(Request $request)
    {
    	# code...
        $subject = Subject::where('id','=',$request->input('id'))->first();
        $exams = Exam::where('subject_id','=',$request->input('id'))->get();
        session(['key' => '2222']);
    	return view('exams')->with([
            'subject'=>$subject,
            'exams'=>$exams,
        ]);
    }

    public function questions(Request $request)
    {
    	# code...
        $questions= Question::where('exam_id','=',$request->input('id'))->get();
        $exams = Exam::where('id','=',$request->input('id'))->first();
        session(['key' => '2222']);
    	return view('questions')->with([
            'questions'=>$questions,
            'exam'=>$exams,
        ]);
    }

    public function answers(Request $request)
    {
    	# code...
        $question= Question::where('id','=',$request->input('id'))->first();
        $answers = Answer::where('question_id','=',$request->input('id'))->get();
        session(['key' => '2222']);
    	return view('answers')->with([
            'question'=>$question,
            'answers'=>$answers,
        ]);
    }

    public function account($value='')
    {
    	# code...
        session(['key' => '3333']);
    	return view('account');
    }

    public function teachers($value='')
    {
    	# code...
        $students=User::where('role','=','teacher')->get();
        $classes = Classes::get();
        session(['key' => '4444']);
    	return view('teachers')->with([
            'students'=>$students,
            'classes'=>$classes
        ]);
    }

    public function parents($value='')
    {
    	# code...
        $students=User::where('role','=','parent')->get();
        $studentis=User::where('role','=','student')->get();
        $classes = Classes::get();
        session(['key' => '8888']);
    	return view('parents')->with([
            'students'=>$students,
            'studentis'=>$studentis,
            'classes'=>$classes
        ]);
    }


    public function students($value='')
    {
    	# code..
        $students=User::where('role','=','student')->get();
        $classes = Classes::get();
        session(['key' => '5555']);
    	return view('students')->with([
            'students'=>$students,
            'classes'=>$classes
        ]);
    }

    public function progress(Request $request)
    {
    	# code...

        if(Auth::user()->role=='parent'){
            if (Auth::user()->class != $request->input('id')) {
                # code...
                return redirect()->back()->withErrors([
                    'error'=>'cannot view this student In case this is your child please contact admin for further instructions',
                ]);
            }
        }

        $student = User::where('id','=',$request->input('id'))->first();
        $marks = Mark::where('student_id','=',$request->input('id'))->get();
        $exams=Exam::get();
        $subjects=Subject::get();
        session(['key' => '5555']);
    	return view('progress')->with([
            'student'=>$student,
            'marks'=>$marks,
            'exams'=>$exams,
            'subjects'=>$subjects
        ]);
    }

    public function test($value='')
    {
    	# code...
        $tests=Test::get();
        $exams=Exam::get();
        $subjects=Subject::get();
        session(['key' => '6666']);
    	return view('test')->with([
            'tests'=>$tests,
            'subjects'=>$subjects,
            'exams'=>$exams
        ]);
    }

    public function take_test(Request $request)
    {
    	# code...
        $test = Test::where('id','=',$request->input('id'))->first();
        $exam = Exam::where('id','=',$test->exam_id)->first();
        $test_check= \App\Mark::where('student_id',Auth::user()->id)->where('exam_id',$test->exam_id)->first();
        if (!empty($test_check)) {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'You have already taken This Exam',
            ]);

        }
        $questions = Question::where('exam_id','=',$test->exam_id)->inRandomOrder()->get();
        $data=[];
        foreach ($questions as $question) {
            # code...
            $data[]=$question->id;
        } 
        $answers=Answer::whereIn('question_id', $data)->get();
        session(['key' => '6666']);
    	return view('take-test')->with([
            'test'=>$test,
            'exam'=>$exam,
            'questions'=>$questions,
            'answers'=>$answers
        ]);
    }


    public function chat(Request $request)
    {
        
        # code...
        session(['key' => '7777']);
    	return view('chat');
    }

    public function logout($value='')
    {
        # code...
        Auth::logout();
        return redirect('/');
    }
}
