@include('template.header')

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
     <form method="POST" action="{{url('change_pass')}}">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Password</h4>
      </div>
      <div class="modal-body">
           
                <div class="col-md-12">
                    <div class="md-form">
                        <input type="password" id="form41" class="form-control" name="password">
                        <label for="form41" class="">New Pawword</label>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="md-form">
                        <input type="password" id="form41" class="form-control" name="passcheck">
                        <label for="form41" class="">Confirm Password</label>
                    </div>
                </div>
          
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default">Change</button>
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
                        <div class="col-md-6">
                    <br>
                    <form>

                    <div class="row">
                        <center>
                          <figure class="figure">
                          <img src="http://placehold.it/250x250" class="figure-img img-fluid" alt="..." height="160" width="160" style="border-radius: 50%;">
                          <figcaption class="figure-caption">A caption for the above image.</figcaption>
                          </figure>
                        </center>
                    </div>

                         <!--Third row-->
                    <div class="row">

                        <!--First column-->
                        <div class="col-md-4">
                            <div class="md-form">
                                <input type="text" id="form41" class="form-control">
                                <label for="form41" class="">{{Auth::user()->fname}}</label>
                            </div>
                        </div>

                        <!--Second column-->
                        <div class="col-md-4">
                            <div class="md-form">
                                <input type="text" id="form51" class="form-control">
                                <label for="form51" class="">{{Auth::user()->lname}}</label>
                            </div>
                        </div>

                        <!--Third column-->
                        <div class="col-md-4">
                            <div class="md-form">
                                <input type="text" id="form61" class="form-control">
                                <label for="form61" class="">{{Auth::user()->role}}</label>
                            </div>
                        </div>

                    </div>
                    <!--/.Third row-->


                     <div class="row">

                        <!--First column-->
                        <div class="col-md-4">
                            <div class="md-form">
                                <input type="text" id="form41" class="form-control">
                                <label for="form41" class="">{{Auth::user()->admission_no}}</label>
                            </div>
                        </div>

                        <!--Second column-->
                        <div class="col-md-4">
                            <div class="md-form">
                                <input type="text" id="form51" class="form-control">
                                <label for="form51" class="">Adm Date :{{Auth::user()->created_at}}</label>
                            </div>
                        </div>

                        <!--Third column-->
                        <div class="col-md-4">
                            <div class="md-form">
                                <input type="text" id="form61" class="form-control">
                                <label for="form61" class="">DOB :{{Auth::user()->dob}}</label>
                            </div>
                        </div>

                    </div>

                   

               
                    </form>



                    <div class="row">
                        <button type="button" class="btn mdb-color" data-toggle="modal" data-target="#myModal">Change Password</button>

                    </div>

                   </div>



                   <div class="col-md-6">
                          <br>
                        <!--Card Default-->
                        <div class="card mdb-color lighten-2 text-center z-depth-2">
                            <div class="card-body">
                                
                            </div>
                        </div>
                        <!--/.Card Default-->
                       
                   </div>
                    
                </div>
            </div>
                                                            
      
        </div>
    </div>
     <!--/.content-->

@include('template.footer')

 