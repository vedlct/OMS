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

            <div id="fullrow" class="row">
                <div class="panel-body">
                    <div class="col-sm-12 message_section">
                        <div class="row">
                            <div class="new_message_head">
                                <div class="pull-left"><button>Message System</button></div>
                            </div><!--new_message_head-->
                            <div id="">

                                <div  id="newmsg" class="chat_area">
                                    <ul class="list-unstyled">
                                        @if(session('user-type')=='Admin')
                                            @foreach($client_view as $s)
                                                @if($s->sender == $client1)
                                                    <li class="left clearfix">
                     <span style="color: red" class=" pull-left">{{$client1}}
                     </span>
                                                        <div class="chat-body1 clearfix">
                                                            <div class="chat_time pull-left">{{$s->inserted_time}}</div><br>
                                                            <p class=" pull-left">{{$s->sms}}</p>

                                                        </div>
                                                    </li>
                                                @elseif($s->sender =="Admin")

                                                    <li class="left clearfix admin_chat">
                     <span style="color: blue" class=" pull-right">Admin
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
                     <span style="color: red" class="chat-img1 pull-left">Admin
                     </span>

                                                        <div class="chat-body1 clearfix ">
                                                            <div >{{$s->inserted_time}}</div><br>
                                                            <p >{{$s->sms}}</p>

                                                        </div>
                                                    </li>
                                                @elseif($s->sender ==$client1)

                                                    <li class="left clearfix admin_chat">
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

                                    <div id="txtHint" ></div>
                                </div>
                                <!--chat_area-->
                            </div>

                            <form method="post" id="smsbox" action="{{route('insersms',['client1'=>$client1])}}" onsubmit="return validateForm()">
                                {{csrf_field()}}
                                <div class="message_write">
                                    <textarea class="form-control" id="sms" name="sms" placeholder="type a message"></textarea>

                                    <div class="chat_bottom">
                                        {{--<a href="#" class="pull-left upload_btn"><i class="fa fa-cloud-upload" aria-hidden="true"></i>--}}
                                        {{--Add Files</a>--}}
                                        <input class="pull-right btn btn-success"type="submit" value="Send">
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div> <!--message_section-->


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
if ($type == 'Admin'){
    $sms1 = DB::select( DB::raw("SELECT COUNT(*) AS total  FROM `message` WHERE `sender` ='$client1' AND `receiver`='Admin' AND `status`='unseen' ") );
    foreach ($sms1 as $count){
        echo $totalsmsforadmin = $count->total;
    }
}
elseif(session('status') == 'User'){
    $sms1 = DB::select( DB::raw("SELECT COUNT(*) AS total  FROM `message` WHERE `sender` ='Admin' AND `receiver`='$client1' AND `status`='unseen' ") );
    foreach ($sms1 as $count){
        echo $totalsmsforadmin = $count->total;
    }
}
?>

<script>
    var old_msg = "<?php echo $totalsmsforadmin?>";
    var client = "<?php echo $client1?>";
    var type = "<?php echo $type?>";
    var old_amount = parseInt(old_msg);
    var count =0;
    setInterval(function(){
        if (type =="Admin") {
            $.ajax({
                type : 'get',
                url:'{{'/getlivemsg'}}',
                data: {'sender':client,'reciever':'Admin'},
                cache: false,
                success : function(datan){
                    if (parseFloat(datan) > old_amount) {
                        $.ajax({
                            type : 'get',
                            url:'{{'/getlivemsgdata'}}',
                            data: {'sender':client,'reciever':'Admin'},
                            cache: false,
                            success : function(datas) {
                                $('#txtHint').html(datas);
                                //$("#txtHint").show();
                                //alert('it works'); //ajax response successful alert box shows
                                //should hide a div element
                                $( "#newmsg" ).scrollTop($("#newmsg")[0].scrollHeight);
                                //alert(datas);
                            }
                        });
                        //scroll();
                        old_amount =datan;
                    }else {
                        //$("#newmsg").html(result).scrollTop(1000);
                        //alert(datan);
                        // document.getElementById("txtHint").style.display= "none";
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
                    if (parseFloat(datan) > old_amount) {
                        $.ajax({
                            type : 'get',
                            url:'{{'/getlivemsgdata'}}',
                            data: {'sender':'Admin','reciever':client},
                            cache: false,
                            success : function(datas) {
                                $('#txtHint').html(datas);
                                $( "#newmsg" ).scrollTop($("#newmsg")[0].scrollHeight);
                            }
                        });
                        old_amount =datan;
                    }else {
                        //$("#newmsg").html(result).scrollTop(1000);
                        //scroll();
                        //    document.getElementById("txtHint").style.display= "none";
                    }
                }
            });
        }
    },600);
</script>


<script>
    $( "#newmsg" ).scrollTop($("#newmsg")[0].scrollHeight);
    $( "#sms" ).focus();
</script>

<script>
    function validateForm() {
        var x = document.forms["smsbox"]["sms"].value;
        if (x == "") {
            alert("Please write some text first!!");
            return false;
        }
        else {
            return true;
        }
    }
</script>

</body>
</html>
