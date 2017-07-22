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
                            <div align="right" style="margin: -23px 0 0 0;"><button class="f" onClick="newmsg()" style="color:#69F;">Add New</button></div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">

                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th width="10%">SL.</th>
                                        <th width="40%">Sender</th>
                                        <th width="20%">See Message</th>


                                    </tr>
                                    </thead>

                                    <?php // iterate through the results
                                    $sl = 1;

                                    ?>
                                    @foreach($client_view as $c)
                                        <tbody>
                                        <tr class="gradeA even">
                                            <td>{{$sl}}</td>
                                            <td>{{$c->sender}}</td>
                                            <td><a href="{{route('usersms',['client1'=>$c->sender])}}"> {{$c->sender}}</a><br></td>

                                            </tr>
                                        <?php
                                        $sl++;
                                        ?>

                                        </tbody>
                                    @endforeach
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--modal-->
            <div id="myModal1" class="modal">
                <br/><br/><br/>

                <!-- Modal content -->

                <div class="modal-content" style="padding: 35px; width: 50%; margin: 0 auto">
                    <span class="close">×</span>

                    <h2>New Message Box</h2>

                    <div id="txtHint"></div>


                </div>
            </div>
            <!-- endmodal-->

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