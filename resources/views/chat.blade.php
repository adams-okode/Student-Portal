@include('template.header')
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
  <div class="modal-content">
     <form method="POST" action="{{url('create_test')}}">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create Test</h4>
      </div>
      <div class="modal-body">
       
       
        </div>
     
      </div>
      <div class="modal-footer">
         <button type="submit" class="btn btn-default">Submit</button>
      </div>
      </form>
    </div>

  </div>
</div>


<style>
    .chat
    {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .chat li
    {
        margin-bottom: 10px;
        padding-bottom: 5px;
        border-bottom: 1px dotted #B3A9A9;
    }

    .chat li.left .chat-body
    {
        margin-left: 60px;
    }

    .chat li.right .chat-body
    {
        margin-right: 60px;
    }


    .chat li .chat-body p
    {
        margin: 0;
        color: #777777;
    }

    .panel .slidedown .glyphicon, .chat .glyphicon
    {
        margin-right: 5px;
    }

    .panel-body
    {
        overflow-y: scroll;
        height: 70vh;
    }

    ::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
    }

    ::-webkit-scrollbar
    {
        width: 12px;
        background-color: #F5F5F5;
    }

    ::-webkit-scrollbar-thumb
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
        background-color: #555;
    }

</style>


    <!--content-->
    <div class="container-fluid vega-body" >
        
        <div class="row">

            <div class="col-md-2">
                 @include('template.side-bar')
            </div>

            <div class="col-md-10">


                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <span class="glyphicon glyphicon-comment"></span> Chat
                                
                            </div>

                            <div class="panel-body">
                                <ul class="chat">
                                   <div id="logged_messages_1010" class="container">
                                       
                                   </div>
                                </ul>
                            </div>
                            <div class="panel-footer">
                                <div class="input-group">
                                    <input id="chat_text_box_content" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


          

           
                                                            
      
        </div>
    </div>
     <!--/.content-->

@include('template.footer')

 