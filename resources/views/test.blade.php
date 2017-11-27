@include('template.header')
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
  <div class="modal-content">
     <form method="POST" action="{{url('create_test')}}">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create Test</h4>
      </div>
      <div class="modal-body">
       
         <div class="form-group">
          <label for="sel1">Exam</label>
          <select class="form-control" id="sel1" name="exam">
          @foreach($exams as $exam)
            <option value="{{$exam->id}}">{{ $exam->name }}
            @foreach($subjects as $subject)
              @if($exam->subject_id == $subject->id)
                :: {{ $subject->name }}
                </option>
              @endif  
            @endforeach
          @endforeach
          </select>
        </div>
     
      </div>
      <div class="modal-footer">
         <button type="submit" class="btn btn-default">Submit</button>
      </div>
      </form>
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
            @if($errors->has('error'))
                        <div class="alert alert-danger alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Error!</strong> {{$errors->first('error')}}.
                        </div>
            @endif

            @if($errors->has('success'))
                        <div class="alert alert-success alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Success!</strong> {{$errors->first('success')}}.
                        </div>
            @endif
            <br>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('home')}}">Dashboard</a></li>
              
            </ol>
            <div class="row">
                <div class="col-md-6">
                    <!--Card Default-->
                    <div class="card mdb-color lighten-2 text-center z-depth-2">
                        <div class="card-body">
                            <p class="white-text mb-0">This section Allows you to Take Exam</p>
                            

                        </div>
                    </div>
                <!--/.Card Default-->
                </div>

                <div class="col-md-2">
                    
                </div>
                <div class="col-md-1">
                    
                </div>
                <div class="col-md-3">
                 @if(Auth::user()->role=='admin')
                  <button type="button" class="btn mdb-color" data-toggle="modal" data-target="#myModal">New Test</button>

                 @endif  

                </div>

                
            </div>

            <div class="row" style="padding: 20px;">                                                    
            <!--Table-->
            <table class="table table-responsive">

                <!--Table head-->
                <thead class="blue-grey lighten-4">
                    <tr>
                        <th>Ref No</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <!--Table head-->

                <!--Table body-->
                <tbody>
                    @foreach($tests as $test)
                      <tr>
                        <th scope="row">{{$test->code}}</th>
                        @foreach($exams as $exam)
                          @if($test->exam_id == $exam->id)
                             <td>{{$exam->name}}
                              @foreach($subjects as $subject)
                                @if($exam->subject_id == $subject->id)
                                  :: {{ $subject->name }}
                                  
                                @endif  
                              @endforeach
                             </td>
                          @endif                
                        @endforeach
                        <td>Pending</td>
                        <td><a href="{{url('take-test')}}?id={{$test->id}}" class="btn btn-default btn-sm">Start</a></td>
                      </tr>
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

 