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

            <div class="row">
                <div class="col-lg-6">
            <div class="panel panel-default">
                <div  class="panel-heading">
                  Message
                </div>

                <div class="panel-body">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                {{--<th width="4%" scope="col">Sl.</th>--}}
                                <th width="10%" scope="col">Client Name</th>
                                </tr>
                            </thead>
                            <?php $a=array()?>
                            @foreach($client_unseen as $c)
                            <tr style="color: silver">
                                <td>
                                    <b><a href="{{route('usersms',['client1'=>$c->sender])}}"> {{$c->sender}}</a><br></b>
                                    <?php array_push($a, $c->sender)?>
                                </td>
                            </tr>
                            @endforeach
                                @foreach($client_seen as $cs)
                                <tr>

                                        <?php if (in_array($cs->sender, $a))
                                        { }else {?>
                                            <td>
                                        <a href="{{route('usersms',['client1'=>$cs->sender])}}"> {{$cs->sender}}</a><br>
                                        <?php } ?>
                                    </td>
                                </tr>
                            @endforeach
                            </table>
                        </div>

                            </div>
                        </div>
                    </div>
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

<script type="text/javascript">

    var modal1 = document.getElementById('myModal1');
    var span = document.getElementsByClassName("close")[0];

    function newmsg()
    {

        $.ajax({
            type:'get',
            url:'{{route('getclientname')}}',
            data:{},
            cache: false,
            success:function(data)
            {
                $('#txtHint').html(data);


            }

        });
        modal1.style.display = "block";


    }

    span.onclick = function() {
        modal1.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal1) {
            modal1.style.display = "none";
        }
    }

</script>