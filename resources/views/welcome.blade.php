<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>online portal</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('main/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="{{asset('main/css/mdb.min.css')}}" rel="stylesheet">

    <link href="{{asset('main/css/style.css')}}" rel="stylesheet">

   
</head>

<body>




               


    <!--Mask-->
    <div class="view hm-black-light">
        <div class="full-bg-img flex-center">
                      @if($errors->has('error'))
                        <div class="alert alert-danger alert-dismissable">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Error!</strong> {{$errors->first('error')}}.
                        </div>
                        @endif
            <div class="row">
                <div class="col-md-2">
                </div>
                        
                    <div class="card white text-center z-depth-2 col-md-8">
                             <br>
                        <div class="card-body">
                          <p class="white-text mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere
                          erat a ante.</p>

                           <form action="{{url('login')}}" method="POST">
                                <div class="lg-form">
                                <input name="email" type="email" id="form2" class="form-control validate" style="color:black;">
                                <label for="form2" style="color:black;">Email</label>
                            </div>
                             <div class="lg-form">
                                <input name="password" type="password" id="form2" class="form-control validate" style="color:black;">
                                <label for="form2" style="color:black;">Password</label>
                            </div>
                            <div class="lg-form">
                                <button type="submit" class="btn btn-lg vega-color-apps">Login</button>
                            </div>
                           </form>
                        </div>
                    </div>

                
                <div class="col-md-2">
                </div>
                
            </div>
            
        </div>
    </div>
    <!--/.Mask-->




    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="{{asset('main/js/jquery-3.1.1.min.js')}}"></script>

    <!-- Bootstrap dropdown -->
    <script type="text/javascript" src="{{asset('main/js/popper.min.js')}}"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{asset('main/js/bootstrap.min.js')}}"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{asset('main/js/mdb.min.js')}}"></script>

    <script>
        new WOW().init();
    </script>

</body>

</html>