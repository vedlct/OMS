
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    @include('css.css');

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
                                        <div class="pull-left"><button>Message System</button></div><div class="pull-right"><div class="dropdown">
                                                <button class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-cogs" aria-hidden="true"></i>  Setting
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                                    <li><a href="#">Action</a></li>
                                                    <li><a href="#">Action</a></li>
                                                    <li><a href="#">Action</a></li>
                                                </ul>
                                            </div></div>
                                    </div><!--new_message_head-->

                                    <div class="chat_area">
                                        <ul class="list-unstyled">
                                            <?php $username=session('order');?>

                                            @foreach($client_view as $s)
                                                @if($s->sender == "Admin")
                                                    <li class="left clearfix">
                     <span class="chat-img1 pull-left">
                     <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
                     </span>
                                                        <div class="chat-body1 clearfix">
                                                            <div class="chat_time pull-right">{{$s->inserted_time}}</div><br>
                                                            <p>{{$s->sms}}</p>

                                                        </div>
                                                    </li>
                                                @elseif($s->sender =="$username")

                                                        <li class="left clearfix admin_chat">
                     <span class="chat-img1 pull-right">
                     <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
                     </span>
                                                            <div class="chat-body1 clearfix">
                                                                <div class="chat_time pull-left">{{$s->inserted_time}}</div><br>
                                                                <p>{{$s->sms}}</p>

                                                            </div>
                                                        </li>

                                                    @endif

                                            @endforeach

                                        </ul>
                                    </div><!--chat_area-->

                                    <form method="post" action="{{route('insersms')}}">
                                        {{csrf_field()}}
                                    <div class="message_write">
                                        <textarea class="form-control" name="sms" placeholder="type a message"></textarea>
                                        <div class="clearfix"></div>
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

@include('js.js');




</body>
</html>

