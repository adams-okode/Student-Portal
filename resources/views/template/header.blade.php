
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


    <!--Navigation & Intro-->
    <header>
        <!--Navbar-->
        <nav class=" navbar navbar-expand-lg navbar-dark">
            <div class="container">

                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-3" aria-controls="navbarSupportedContent-3"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-3">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link waves-effect waves-light" href="#">Home<span class="sr-only">(current)</span></a>
                        </li>
                        
                    </ul>
                    <ul class="navbar-nav ml-auto nav-flex-icons">
                       
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false"><i class="fa fa-user"></i> {{Auth::user()->fname}} {{Auth::user()->lname}}
                        </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-unique" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item waves-effect waves-light" href="#">Profile</a>
                                <a class="dropdown-item waves-effect waves-light" href="{{url('logout')}}">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--/.Navbar-->

    </header>
    <!--/Navigation & Intro-->

