@include('template.header')
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
     <form method="POST" action="{{url('create_class')}}">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create Class</h4>
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
            <div class="row">
                <div class="col-md-2">
                 <br>
                <!-- Contextual button for informational alert messages -->
                <button type="button" class="btn btn-info mdb-color lighten-2" data-toggle="modal" data-target="#myModal">New Class</button>
                </div>
                <div class="col-md-10">
                    <br>
                    <!--Card Default-->
                    <div class="card mdb-color lighten-2 text-center z-depth-2">
                        <div class="card-body">
                            <p class="white-text mb-0">Class Admin Section</p>
                        </div>
                    </div>
                    <!--/.Card Default-->

                </div>
            </div>
            <div class="row">
            @foreach($classes as $class)
                <div class="col-md-2">  

                    <!-- Card -->
                        <a href="{{url('classdetails')}}?id={{$class->id}}">
                            <div class="card card-image mdb-color" style="height: 150px; color: black; margin-top:5%; margin-bottom:5%;">

                            <!-- Content -->
                            <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                                <center> <div>
                                    <h3 class="card-title pt-2"  style="color: black;"><strong>{{$class->name}}</strong></h3>
                                  
                                </div></center>
                            </div>
                            <!-- Content -->
                            </div>
                        </a>
                    <!-- Card --> 
                     <a href="{{url('delete_class')}}?id={{$class->id}}" onclick="return confirm('Are you sure you want to delete this class {{$class->name}}?');" style="color:red;"><i class="fa fa-times"></i></a>

                </div>
            @endforeach

            @if(empty($classes))
                <div class="col-md-12">
                    <br>
                    <!--Card Default-->
                    <div class="card mdb-color lighten-2 text-center z-depth-2">
                        <div class="card-body">
                            <p class="white-text mb-0">No classes found</p>
                        </div>
                    </div>
                    <!--/.Card Default-->

                </div>
            @endif

            
        </div>


            </div>
                                                            
      
        </div>
    </div>
     <!--/.content-->

@include('template.footer')

 