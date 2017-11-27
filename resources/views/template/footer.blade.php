   <!--Footer-->
    <footer style="background-color: #1b1b1b; background-image: -moz-linear-gradient(top,#222,#111);
            background-image: -webkit-gradient(linear,0 0,0 100%,from(#222),to(#111));
            background-image: -webkit-linear-gradient(top,#222,#111);
            background-image: -o-linear-gradient(top,#222,#111);
            background-image: linear-gradient(to bottom,#222,#111);
            background-repeat: repeat-x;
            border-color: #252525;" class="page-footer center-on-small-only pt-0">
        <!--Copyright-->
        <div class="footer-copyright">
            <div class="container-fluid">
            
                © 2017 Copyright: <a href="#"> Online Portal</a>

            </div>
        </div>
        <!--/.Copyright-->
    </footer>
    <!--/.Footer-->




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
        var field = document.getElementById('logged_messages_1010');
        new WOW().init();
        load_messages();

        $(document).keypress(function (e) {
          if (e.which == 13) {
              var content= document.getElementById('chat_text_box_content').value;

              //$("#chat_content_loaded").append(right_123);
              //document.getElementsByClassName('direct-chat-contacts')[0].style.transform ="translate(101%, 0)";
              send_message();
              

          }
        });




        function load_messages(timestamp) {
               
             var settings = {
                "async": true,
                "crossDomain": true,
                "url": "{{url('show_messages')}}?timestamp="+timestamp,
                "method": "GET",
            
             }

            $.ajax(settings).done(function (response) {
                
                for (var index = 0; index < response.data.length; index++) {
                    if (response.data[index].sender_id !='{{Auth::user()->id}}') {
                        var element1 = '<li class="left clearfix"><span class="chat-img pull-left">'+
                                  '<img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" />'+
                                  '</span>'+
                                        '<div class="chat-body clearfix">'+
                                            '<div class="header">'+
                                                '<strong class="primary-font"></strong> <small class="pull-right text-muted">'+
                                                    '<span class="glyphicon glyphicon-time"></span>'+response.data[index].created_at+'</small>'+
                                            '</div>'+
                                            '<p>'+response.data[index].content+
                                            '</p>'+
                                        '</div>'+
                                    '</li>';
                    
                     
                        field.innerHTML += element1;

                    } else {

                        var element2 = '<li class="right clearfix"><span class="chat-img pull-right">'+
                                        '<img src="http://placehold.it/50/FA6F57/fff&text=ME" alt="User Avatar" class="img-circle" />'+
                                        '</span>'+
                                        '<div class="chat-body clearfix">'+
                                            '<div class="header">'+
                                                '<small class=" text-muted"><span class="glyphicon glyphicon-time"></span>'+response.data[index].created_at+'</small>'+
                                                '<strong class="pull-right primary-font"></strong>'+
                                            '</div>'+
                                            '<p>'+response.data[index].content+
                                            '</p>'+
                                        '</div>'+
                                    ' </li>';
                        field.innerHTML += element2;            
                    } 
                    console.log('{{Auth::user()->id}}');
                }
            scrollToBottom('logged_messages_1010');   
            
            load_messages(response.timestamp);
            });
            
        }

        function scrollToBottom(id){
            div_height = $("#"+id).height();
            div_offset = $("#"+id).offset().top;
            window_height = $(window).height();
            $('html,body').animate({
                scrollTop: div_offset-window_height+div_height
            },'slow');
        }

        function send_message(){
                var content= document.getElementById('chat_text_box_content').value;     
                $.ajax({
                    method: "POST",
                    url: "{{url('send_message')}}",
                    data: { from:"{{Auth::user()->id}}",content:content},
                    success:function(data){
                            
                        document.getElementById("chat_text_box_content").value = '';

                        field.innerHTML = '';   
                        scrollToBottom('logged_messages_1010'); 
                        //load_messages();
                        toastr.success('Message Sent', 'Success');
                        console.log(data);
                    },
                    error:function(error){
                            console.log(error);
                    },
                });

      }
       
    </script>


</body>

</html>