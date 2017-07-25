
<div  id="lastmsg" class="chat_area" style="overflow:auto;" >
    <ul class="list-unstyled">
        @if(session('user-type')=='Admin')
            @foreach($getlivemsgdata as $s)
                @if($s->sender == 'Admin')
                    <li class="left clearfix admin_chat">
                     <span style="color: blue" class=" pull-right">Admin
                     </span>
                        <div class="chat-body1 clearfix">
                            <div class="chat_time pull-right">{{$s->inserted_time}}</div><br>
                            <p class="chat_time pull-right">{{$s->sms}}</p>

                        </div>
                    </li>
                @else

                    <li class="left clearfix">
                     <span style="color: red" class=" pull-left">{{$s->sender}}
                     </span>
                        <div class="chat-body1 clearfix">
                            <div class="chat_time pull-left">{{$s->inserted_time}}</div><br>
                            <p class=" pull-left">{{$s->sms}}</p>

                        </div>
                    </li>

                @endif

            @endforeach
        @elseif(session('user-type')=='User')
            @foreach($getlivemsgdata as $s)
                @if($s->sender == "Admin")
                    <li class="left clearfix">
                     <span style="color: red" class="chat-img1 pull-left">Admin
                     </span>

                        <div class="chat-body1 clearfix ">
                            <div >{{$s->inserted_time}}</div><br>
                            <p >{{$s->sms}}</p>

                        </div>
                    </li>
                @else

                    <li class="left clearfix admin_chat">{{$s->sender}}
                     <span style="color: blue"class="chat-img1 pull-right">{{$client1}}
                     </span>

                        <div class="chat-body1 clearfix">
                            <div class="pull-right">{{$s->inserted_time}}</div><br>
                            <p class="pull-right">{{$s->sms}}</p>

                        </div>
                    </li>

                @endif

            @endforeach

        @endif

    </ul>


</div>

