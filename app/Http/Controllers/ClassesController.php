<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;

class ClassesController extends Controller
{
    //

    public function create(Request $request)
    {
        $rand = substr(md5(microtime()),rand(0,26),5);
        $class=new Classes;
        $class->name= $request->input('name');
        $class->description= $request->input('description');
        $class->status=1;
        $class->code= $rand;
        if ($class->save()) {
            # code...
            return redirect()->back()->withErrors([
                'success'=>'Class Created',
            ]);
        } else {
            # code...
            return redirect()->back()->withErrors([
                'error'=>'Class Coul Not be created',
            ]);
        }
        
        
    }

    public function delete(Request $request)
    {
        # code...
        $class = Classes::where('id','=',$request->input('id'))->delete();
        if ($class) {
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
