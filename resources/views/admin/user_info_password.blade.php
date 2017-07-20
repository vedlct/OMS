
<!--For Admin-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    @include('css.css')


    <style>

        .passform
        {
            border: none;
            /* cursor: context-menu; */
            background-color: #f9f9f9;
            width: 100%;
        }

        .passform:hover
        {
            border: none;
            /* cursor: context-menu; */
            background-color:#f9f9f9;
        }


        .p{
            display: none;
        }
    </style>



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
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div  class="panel-heading">
                            User Info & Password Change
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th width="20%">Use Name</th>
                                        <th width="10%">Password</th>
                                        <th width="20%">Status</th>
                                        <th width="20%">Details</th>
                                    </tr>
                                    </thead>

                                    @foreach($getinfo as $value)
                                    <tbody>
                                    <tr class="gradeA even">
                                        <td>{{$value->username}}</td>
                                        <td><input class="passform" aria-hidden="true" type="password" value="{{$value->password}}" readonly="readonly" /></td>
                                        <td>{{$value->user_type}}</td>
                                        <td><div align="center"><a id="editlead" href="#" data-panel-id="{{$value->user_id}}" onClick="passchange(this)"><i class="fa fa-edit fa-fw"></i></a></div></td>
                                    </tr>

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

                    <h2>Edit Content</h2>



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

</body>
</html>
@include('js.js');

<script type="text/javascript">
    $(".passform").mousedown(function(){
        $(this).prop('type', 'text');
    });

    $(".passform").mouseup(function(){
        $(this).prop('type', 'password');
    });


</script>

<script type="text/javascript">

    var modal1 = document.getElementById('myModal1');
    var span = document.getElementsByClassName("close")[0];

    function passchange(x)
    {
        modal1.style.display = "block";

        btn = $(x).data('panel-id');

        $.ajax({
            type:'get',
            url:'{{'/changepassword/'}}'+btn,
            data:{'id':btn},
            cache: false,
            success:function(data)
            {
                $('#txtHint').html(data);
                //alert(data);

            }

        });


    }

    span.onclick = function() {
        modal1.style.display = "none";
    }

</script>