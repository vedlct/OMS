
<!--For Admin-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="{{'img/TCL_logo.png'}}">

    <title>OMS - Order Management System.</title>

    <!-- Bootstrap core CSS -->
    <link href="{{'css/bootstrap.min.css'}}" rel="stylesheet">
    <link href="{{'css/bootstrap-reset.css'}}" rel="stylesheet">
    <!--external css-->
    <link href="{{'assets/font-awesome/css/font-awesome.css'}}" rel="stylesheet" />
    <link href="{{'assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css'}}" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{'css/owl.carousel.css'}}" type="text/css">
    <!-- Custom styles for this template -->
    <link href="{{'css/style.css'}}" rel="stylesheet">
    <link href="{{'css/style-responsive.css'}}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ 'css/modal.css' }}" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="{{'js/html5shiv.js'}}"></script>
    <script src="{{'js/respond.min.js'}}"></script>
    <![endif]-->


    {{--<style>--}}
        {{--.p, .f{--}}
            {{--text-align: left;--}}
        {{--}--}}

        {{--.p{--}}
            {{--display: none;--}}
        {{--}--}}
    {{--</style>--}}
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
                            Service Information
                            <div align="right" style="margin: -23px 0 0 0;"><button class="f" onClick="run()" style="color:#69F;">Add New</button></div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">

                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th width="10%">SL.</th>
                                        <th width="40%">Name</th>
                                        <th width="20%">Type</th>
                                        <th width="20%">Status</th>
                                        <th width="10%"> Delete Service</th>
                                    </tr>
                                    </thead>

                                    <?php // iterate through the results
                                    $sl = 1;

                                    ?>
                                    @foreach($allservice as $value)
                                    <tbody>
                                    <tr class="gradeA even">
                                        <td>{{$sl}}</td>
                                        <td>{{$value->service_name}}</td>
                                        <td>{{$value->service_type}}</td>
                                        <td>
                                            <select name="status" id="{{$value->service_id}}" onChange="changestatus(this.id)">

                                                @if($value->service_status == "Active")


                                                <option selected>Active</option>
                                                <option>Inactive</option>


                                                @else


                                                <option>Active</option>
                                                <option selected>Inactive</option>

                                                @endif
                                            </select>
                                        </td>
                                        <td><div align="center"><a href="#" data-panel-id="{{$value->service_id}}"onclick="deleteservice(this)"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div></td>
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

                    <h2>Edit Content</h2>



                    {{--<div id="txtHint"></div>--}}


                        <form action="{{route('insertservice')}}" method="post">
                            {{csrf_field()}}
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Service Name</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <th><input type="text" class="form-control" name="name" /></th>
                                <th><input type="text" class="form-control" name="type" /></th>
                                <th>
                                    <select name="status" class="form-control">
                                        <option selected disabled>Select One</option>
                                        <option>Active</option>
                                        <option>Inactive</option>
                                    </select>
                                </th>

                                <th>
                                    <button type="submit" style="width:100%; color:#69F;">Save</button></th>
                                </tbody>
                            </table>
                        </form>



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
<!-- js placed at the end of the document so the pages load faster -->
<script src="{{'js/jquery.js'}}"></script>
<script src="{{'js/jquery-1.8.3.min.js'}}"></script>
<script src="{{'js/bootstrap.min.js'}}"></script>
<script class="include" type="text/javascript" src="{{'js/jquery.dcjqaccordion.2.7.js'}}"></script>
<script src="{{'js/jquery.scrollTo.min.js'}}"></script>


<!--common script for all pages-->
<script src="{{'js/common-scripts.js'}}"></script>



<!--script for this page-->
<script>
    function changestatus(x)
    {
        var option = document.getElementById(x).value;

        $.ajax({
            type:'get',
            url:'{{'/changeservicestatus/'}}'+option,
            data:{'id':x,'value':option},
            cache: false,
            success:function(data)
            {
                //$('#txtHint').html(data);
                alert(data);

            }

        });


    }

    function deleteservice(x)
    {
        btn = $(x).data('panel-id');

        if (confirm('Are you sure you want to delete this service ?')) {
            // Save it!

            $.ajax({
                type:'get',
                url:'{{'/deleteservice/'}}'+btn,
                data:{'id':btn},
                cache: false,
                success:function(data)
                {
                    //$('#txtHint').html(data);
                    alert(data);
                    window.location="/Service";
                }

            });

        } else {
            window.location="/Service";
        }




    }


</script>

<script type="text/javascript">

    var modal1 = document.getElementById('myModal1');
    var span = document.getElementsByClassName("close")[0];

    function run()
    {
        modal1.style.display = "block";


    }

    span.onclick = function() {
        modal1.style.display = "none";
    }

</script>