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

            <div class="col-md-10">
  
            <br>
            <div class="row">
                <div class="col-md-6">
                    <!--Card Default-->
                        <div class="card mdb-color lighten-2 text-center z-depth-2">
                            <div class="card-body">
                                <p class="white-text mb-0">{{$student->fname}} {{$student->lname}}</p>
                                <p class="white-text mb-0">Class 3</p>
                                <p class="white-text mb-0">Active</p>
                            </div>
                        </div>
                    <!--/.Card Default-->
                </div>

                <div class="col-md-6">
                    <label>Exams Done</label>
                    <div class="progress">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
              

                
            </div>

            <div class="row" style="padding: 20px;">                                                    
            <!--Table-->
            <table class="table table-responsive">

                <!--Table head-->
                <thead class="blue-grey lighten-4">
                    <tr>
                        <th>Exam</th>
                        <th>Score</th>
                        <th>Out Of</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <!--Table head-->

                <!--Table body-->
                <tbody>
                   @foreach($marks as $mark)
                    @foreach($exams as $exam)
                        @if($mark->exam_id == $exam->id)
                            <tr>
                            
                                <th scope="row">{{$exam->name}}
                                @foreach($subjects as $subject)
                                    @if($exam->subject_id == $subject->id)
                                      :: {{ $subject->name }}
                                    @endif  
                                @endforeach 
                                </th>
                                <td>{{$mark->value}}</td>
                                <td>100</td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endif
                   
                    @endforeach
                  
                   @endforeach
                    
                   

                   

                </tbody>
                <!--Table body-->
            </table>
            <!--Table-->

           

        </div>

            </div>
                                                            
      
        </div>
    </div>
     <!--/.content-->

@include('template.footer')

 