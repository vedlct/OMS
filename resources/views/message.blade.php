<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    @include('css.css')

</head>

<body>

<section id="container" >
    <!--header start-->
@include('Navigation.topmenu')
<!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                @include('Navigation.menu')
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!--state overview start-->
            {{--<div class="row">--}}
                {{--<div class="col-lg-12">--}}
                    {{--<div class="panel panel-default">--}}
                        {{--<div  class="panel-heading">--}}
                            {{--message system--}}
                        {{--</div>--}}
                        {{--<!-- /.panel-heading -->--}}
                        {{--<div class="panel-body">--}}
            <div class="row">
                <div class="panel-body">
                            <div class="col-sm-12 message_section">
                                <div class="row">
                                    <div class="new_message_head">
                                        <div class="pull-left"><button>Message System</button></div>
                                    </div><!--new_message_head-->
                                <span >

                                    <div id="newmsg" class="chat_area">
                                        <ul class="list-unstyled">
                                            @if(session('user-type')=='Admin')
                                                @foreach($client_view as $s)
                                                    @if($s->sender == $client1)
                                                        <li class="left clearfix">
                     <span style="color: blue" class=" pull-left">{{$client1}}
                     {{--<img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">--}}
                     </span>
                                                            <div class="chat-body1 clearfix">
                                                                <div class="chat_time pull-left">{{$s->inserted_time}}</div><br>
                                                                <p class=" pull-left">{{$s->sms}}</p>

                                                            </div>
                                                        </li>
                                                    @elseif($s->sender =="Admin")

                                                        <li class="left clearfix admin_chat">
                     <span style="color: red" class=" pull-right">Admin
                     {{--<img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">--}}
                     </span>
                                                            <div class="chat-body1 clearfix">
                                                                <div class="chat_time pull-right">{{$s->inserted_time}}</div><br>
                                                                <p class="chat_time pull-right">{{$s->sms}}</p>

                                                            </div>
                                                        </li>

                                                    @endif

                                                @endforeach
                                            @elseif(session('user-type')=='User')



                                            @foreach($client_view as $s)
                                                @if($s->sender == "Admin")
                                                    <li class="left clearfix">
                     <span class="chat-img1 pull-left">
                     <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
                     </span>
                                                        <span style="color: red"class="pull-left">Admin</span>
                                                        <div class="chat-body1 clearfix ">
                                                            <div >{{$s->inserted_time}}</div><br>
                                                            <p >{{$s->sms}}</p>

                                                        </div>
                                                    </li>
                                                @elseif($s->sender ==$client1)

                                                        <li class="left clearfix admin_chat">
                     {{--<span class="chat-img1 pull-right">--}}
                     {{--<img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">--}}
                     {{--</span>--}}
                                                            <span style="color: blue" class="chat-img1 pull-right">{{$client1}}</span>
                                                            <div class="chat-body1 clearfix">
                                                                <div class="pull-right">{{$s->inserted_time}}</div><br>
                                                                <p class="pull-right">{{$s->sms}}</p>

                                                            </div>
                                                        </li>

                                                    @endif

                                            @endforeach

                                            @endif

                                        </ul>
                                    </div><!--chat_area-->
                               </span>

                                    <form method="post" action="{{route('insersms',['client1'=>$client1])}}">
                                        {{csrf_field()}}
                                    <div class="message_write">
                                        <textarea class="form-control" id="sms" name="sms" placeholder="type a message"></textarea>

                                        <div class="chat_bottom"><a href="#" class="pull-left upload_btn"><i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                                Add Files</a>
                                            <input class="pull-right btn btn-success"type="submit" value="Send">
                                        </div>

                                    </div>
                                    </form>
                                </div>
                            </div> <!--message_section-->

                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
                </div>
            </div>
            <!--state overview end-->
        </section>
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
        @include('layout.footer')

    </footer>
    <!--footer end-->
</section>

@include('js.js')
<?php
$type=session('status');
if (session('status') == 'Admin'){
    $sms = DB::select( DB::raw("SELECT COUNT(*) AS total  FROM `message` WHERE `sender` ='Admin' AND `receiver`='$client1' AND `status`='unseen' ") );
foreach ($sms as $count){
    echo $totalforadmin = $count->total;
}
}
elseif(session('status') == 'User'){
    $sms = DB::select( DB::raw("SELECT COUNT(*) AS total  FROM `message` WHERE `sender` ='$client1' AND `receiver`='Admin' AND `status`='unseen' ") );
    foreach ($sms as $count){
        echo $totalforadmin = $count->total;
    }
}
?>
<script>
    var old_counts = "<?php echo $totalforadmin?>";
    var client = "<?php echo $client1?>";
    var type = "<?php echo $type?>";
    var old_count = parseInt(old_counts);


    var count =0;


    setInterval(function(){
        if (type=="Admin") {
        $.ajax({
            type : 'get',
            url:'{{'/getlivemsg'}}',
            data: {'sender':'Admin','reciever':client},
            cache: false,
            success : function(datan){

                //alert(datan);

             //   alert(old_count);

                if (parseFloat(datan) < old_count) {
                    count=count+1;
                    $('#newmsg').load(document.URL +  ' #newmsg');

                   // alert(datan);
                    old_count =datan;
                }else {
                    //$('#newmsg').load(document.URL +  ' #newmsg');
                    //alert(datan);
                }


            }
        });
    }
    else{
            $.ajax({
                type : 'get',
                url:'{{'/getlivemsg'}}',
                data: {'sender':'Admin','reciever':client},
                cache: false,
                success : function(datan){

                   // alert(datan);
                   // alert(old_count);

                    if (parseFloat(datan) > old_count) {
                        count=count+1;
                        $('#newmsg').load(document.URL +  ' #newmsg');

                        // alert(datan);
                        old_count =datan;
                    }else {
                        //$('#newmsg').load(document.URL +  ' #newmsg');
                        //alert(datan);
                    }


                }
            });
        }

    },6000);



</script>

{{--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>--}}
<script>
    $( "#newmsg" ).scrollTop($("#newmsg")[0].scrollHeight);
    $( "#sms" ).focus();
</script>


</body>
</html>

