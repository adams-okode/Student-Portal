@include('template.header')

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
     <form method="POST" action="{{url('create_exam')}}">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Exam</h4>
      </div>
      <div class="modal-body">
       
          <div class="form-group">
            <label for="email">Name</label>
            <input type="text" class="form-control" id="email" name="name">
          </div>
         
         <input type="hidden" name="id" value="{{$subject->id}}">
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
                <li class="breadcrumb-item"><a href="{{url('classes')}}">Classes</a></li>
            
            </ol>
            <div class="row">
                <div class="col-md-6">
                    <!--Card Default-->
                    <div class="card mdb-color lighten-2 text-center z-depth-2">
                        <div class="card-body">
                            <p class="white-text mb-0">This section Allow you to create and manage Exams for A subject</p>
                            <p class="white-text mb-0">{{$subject->name}}</p>
                            <p class="white-text mb-0">Active</p>

                        </div>
                    </div>
                <!--/.Card Default-->
                </div>

                <div class="col-md-2">
                    
                </div>
                <div class="col-md-1">
                    
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn mdb-color" data-toggle="modal" data-target="#myModal">New Exam</button>

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
                        <th></th>
                    </tr>
                </thead>
                <!--Table head-->

                <!--Table body-->
                <tbody>
                   @foreach($exams as $exam)
                    <tr>
                        <th scope="row">{{$exam->code}}</th>
                        <td>{{$exam->name}}</td>
                        @if($exam->status==1)
                            <td>active</td>
                        @else
                            <td>closed</td>
                        @endif
                        <td><a href="{{url('questions')}}?id={{$exam->id}}" class="btn btn-default btn-sm">view</a></td>
                        <td><a href="{{url('delete_exam')}}?id={{$exam->id}}" onclick="return confirm('Are you sure you want to delete  {{$exam->name}}?');" class="btn btn-danger btn-sm">Remove</a></td>
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

 