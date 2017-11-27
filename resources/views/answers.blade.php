@include('template.header')

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
     <form method="POST" action="{{url('create_answer')}}">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create Answer</h4>
      </div>
      <div class="modal-body">
       
         <div class="form-group">
          <label for="sel1">Select Option</label>
          <select class="form-control" id="sel1" name="option">
            <option>A</option>
            <option>B</option>
            <option>C</option>
            <option>D</option>
          </select>
        </div>
        <div class="form-group">
            <label for="pwd">Content</label>
            <input type="text" class="form-control" id="pwd" name="content">
          </div>
         <input type="hidden" name="id" value="{{$question->id}}">
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
                            <p class="white-text mb-0">This section Allows you to create and manage Answers for {{$question->content}}</p>
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
                    <button type="button" class="btn mdb-color" data-toggle="modal" data-target="#myModal">New Answer</button>

                </div>

                
            </div>

            <div class="row" style="padding: 20px;">                                                    
            <!--Table-->
            <table class="table table-responsive">

                <!--Table head-->
                <thead class="blue-grey lighten-4">
                    <tr>
                        <th>Choice</th>
                        <th>Question</th>
                        <th>Value</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <!--Table head-->

                <!--Table body-->
                <tbody>


                  @foreach($answers as $answer)
                    <tr>
                        <th scope="row">{{$answer->option_}}</th>
                        <td>{{$question->content}}</td>
                        <td>{{$answer->content}}</td>
                        <td></td>
                        <td><a href="{{url('delete_answer')}}?id={{$answer->id}}" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a></td>
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

 