<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Message;

class ChatController extends Controller
{
    //
    public function send(Request $request)
    {
        # code...
        $messages=new Message;
        $messages->sender_id= $request->input('from');
        $messages->content= $request->input('content');
        if ($messages->save()) {
            # code...
            return Response([
                'status_code'=>200,
            ]);
        } else {
            return Response([
                'status_code'=>500,
            ]);
        }
    }

    public function show(Request $request)
    {
        # code...
        set_time_limit(0);
        while (true) {
                
            $message_1=Message::orderBy('created_at', 'DESC')->first();
            $messages=Message::orderBy('created_at', 'ASC')->get();
            
            if (!empty($request->input('timestamp'))) {
                   $last_ajax_call = $request->input('timestamp');
            }else{
                  $last_ajax_call=null;
            }


              
            $last_change_in_data_file = $message_1->updated_at->format('YmdHis');
            $data=$messages;
            clearstatcache();
                
               
            if ($last_ajax_call == null || $last_change_in_data_file > $last_ajax_call || $last_ajax_call == 'undefined') {  
                return Response([
                        'data' => $data,
                        'timestamp' => $last_change_in_data_file,
                        'status_code'=>200
                        ]);
                break;        
                

            } else {
                    // wait for 1 sec (not very sexy as this blocks the PHP/Apache process, but that's how it goes)
                    sleep( 1 );
                    continue;
                   
            }

        }

    }
}
