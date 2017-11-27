@include('template.header')

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
     <form method="POST" action="{{url('create_parent')}}">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">New Parent</h4>
      </div>
      <div class="modal-body">
       
          <div class="form-group">
            <label for="email">First Name</label>
            <input type="text" class="form-control" id="email" name="fname">
          </div>

          <div class="form-group">
            <label for="email">Last Name</label>
            <input type="text" class="form-control" id="email" name="lname">
          </div>

          <div class="form-group">
            <label for="email">email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>

          <div class="form-group">
            <label for="email">DOB</label>
            <input type="date" class="form-control" id="email" name="dob">
          </div>

             <div class="form-group">
          <label for="sel1">Child</label>
          <select class="form-control" id="sel1" name="class">
          @foreach($studentis as $student)
            <option value="{{$student->id}}">{{ $student->fname }} {{ $student->lname }}</option>
                
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
            <div class="row">
                <div class="col-md-6">
                    <!--Card Default-->
                        <div class="card mdb-color lighten-2 text-center z-depth-2">
                            <div class="card-body">
                                <p class="white-text mb-0">This section Allow you to create and manage Parents</p>
                                <p class="white-text mb-0"></p>
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
                    <button type="button" class="btn mdb-color" data-toggle="modal" data-target="#myModal">New Parents</button>

                </div>

                
            </div>

            <div class="row" style="padding: 20px;">                                                    
            <!--Table-->
            <table class="table table-responsive">

                <!--Table head-->
                <thead class="blue-grey lighten-4">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <!--Table head-->

                <!--Table body-->
                <tbody>
                     @foreach($students as $student)
                    <tr>
                        <th scope="row">{{$student->admission_no}}</th>
                        <td>{{$student->fname}} {{$student->lname}}</td>
                        <td></td>
                        <td></td>
                        <td><a href="{{url('delete_user')}}?id={{$student->id}}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a></td>
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

 