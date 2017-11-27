@include('template.header')

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
     <form method="POST" action="{{url('create_subject')}}">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create Subject</h4>
      </div>
      <div class="modal-body">
       
          <div class="form-group">
            <label for="email">Name</label>
            <input type="text" class="form-control" id="email" name="name">
          </div>
          <div class="form-group">
            <label for="pwd">Description</label>
            <input type="text" class="form-control" id="pwd" name="description">
          </div>
         <input type="hidden" name="id" value="{{$class->id}}">
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
                            <h5>{{$class->name}}</h5>
                            <p class="white-text mb-0">This section Allow you to create subjects for class code {{$class->code}}</p>
                        </div>
                    </div>
                <!--/.Card Default-->
                </div>

                <div class="col-md-2">
                    
                </div>
                <div class="col-md-1">
                    
                </div>
                <div class="col-md-3">
                    <button type="button" class="btn mdb-color" data-toggle="modal" data-target="#myModal">New Subject</button>

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
                   @foreach($subjects as $subject)
                    <tr>
                        <th scope="row">{{$subject->code}}</th>
                        <td>{{$subject->name}}</td>
                        @if($subject->status==1)
                            <td>active</td>
                        @else
                            <td>closed</td>
                        @endif
                        <td><a href="{{url('exams')}}?id={{$subject->id}}" class="btn btn-default btn-sm">view</a></td>
                        <td><a href="{{url('delete_subject')}}?id={{$subject->id}}" onclick="return confirm('Are you sure you want to delete  {{$subject->name}}?');" class="btn btn-danger btn-sm">Remove</a></td>
                    </tr>
                   @endforeach
                </tbody>
                <!--Table body-->
            </table>
            <!--Table-->

             <center>
                <nav>
              <ul class="pagination pg-blue">
                <li class="page-item disabled">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item active">
                  <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
              </nav>
           </center>


        </div>

            </div>
                                                            
      
        </div>
    </div>
     <!--/.content-->

@include('template.footer')

 