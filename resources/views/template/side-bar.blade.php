<br>
               <ul class="list-group vega-side-bar">
                    
                  @if(session('key')=='1111')
                  <a href="{{url('home')}}">
                      <li class="list-group-item active">Home</li>
                  </a>
                  @else
                  <a href="{{url('home')}}">
                      <li class="list-group-item">Home</li>
                  </a>
                  @endif

                  
                      
                  @if(Auth::user()->role=='admin')
                   @if(session('key')=='2222')
                   <a href="{{url('classes')}}"><li class="list-group-item active">Classes</li> </a>
                   @else
                   <a href="{{url('classes')}}"><li class="list-group-item">Classes</li> </a>

                   @endif
                  @endif
    
				    @if(session('key')=='6666')
                   <a href="{{url('test')}}"><li class="list-group-item active" >Test</li> </a>
                   @else
                   <a href="{{url('test')}}"><li class="list-group-item" >Test</li> </a>

                   @endif
                   
                    @if(Auth::user()->role=='admin' || Auth::user()->role=='teacher' || Auth::user()->role=='parent')
                   @if(session('key')=='5555')
                   <a href="{{url('students')}}"><li class="list-group-item active">Students</li> </a>
                   @else
                   <a href="{{url('students')}}"><li class="list-group-item">Students</li> </a>
                    @endif
                   @endif

                   @if(Auth::user()->role=='admin')
                   @if(session('key')=='4444')
                   <a href="{{url('teachers')}}"><li class="list-group-item active">Teachers</li> </a>
                   @else
                   <a href="{{url('teachers')}}"><li class="list-group-item">Teachers</li> </a>
                    @endif
                   @endif

                   @if(Auth::user()->role=='admin')
                   @if(session('key')=='8888')
                   <a href="{{url('parents')}}"><li class="list-group-item active">Parents</li> </a>
                   @else
                   <a href="{{url('parents')}}"><li class="list-group-item">Parents</li> </a>
                    @endif
                   @endif


                   @if(session('key')=='7777')
                   <a href="{{url('chat')}}"><li class="list-group-item active">Forum</li> </a>
                   @else
                   <a href="{{url('chat')}}"><li class="list-group-item ">Forum</li> </a>

                   @endif

                
                   @if(session('key')=='3333')
                   <a href="{{url('account')}}"><li class="list-group-item active">My Account</li> </a>
                   @else
                   <a href="{{url('account')}}"><li class="list-group-item ">My Account</li> </a>

                   @endif


                </ul>