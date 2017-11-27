@include('template.header')

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


    <!--content-->
    <div class="container-fluid vega-body" >
        
        <div class="row">

            <div class="col-md-2">
                 @include('template.side-bar')
            </div>

            <div class="col-md-10 vega-inbound">
            <br>

                <div class="row container">
                 <div class="card mdb-color lighten-2 text-center z-depth-2 col-md-12">
                    <div class="card-body">
                      <div id="timer" style="color: #ffffff; font-size: 20px; font-weight: bolder;">
                        
                      </div>   
                    </div>
                  </div>               
                </div>
                 <legend></legend>
            <form method="POST" action="{{url('finish_exams')}}">
                <div class="row container"> 

                
                       @foreach($questions as $question)
                      <div class="card white lighten-2 text-center z-depth-2 col-md-12">
                        <div class="card-body">
                           <div class="row">
                             <p>{{$question->content}}</p>
                           </div>

                           <div class="row">
                             @foreach($answers as $answer)
                                @if($answer->question_id == $question->id)
                                <div class="col-md-3">
                                   <input type="checkbox" id="checkbox3" value="{{$answer->id}}:{{$question->id}}" name="{{$answer->id}}:{{$question->id}}">
                                   <label for="checkbox3" class="disabled">{{$answer->content}}</label>
                                </div>
                                @endif
                             @endforeach
                           </div>
                        </div>
                    </div>
                    <legend></legend>
                @endforeach


                <input type="hidden" name="id" value="{{$test->id}}">
                 
                <center><button type="submit" class="btn mdb-color">Submit</button></center> 
              
                

                  </div>
             </form>       
            </div>
                                                      
            

            
        </div>
    </div>
     <!--/.content-->
@include('scripts.timer')
@include('template.footer')


 