
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

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="{{'js/html5shiv.js'}}"></script>
    <script src="{{'js/respond.min.js'}}"></script>
    <![endif]-->
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
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div  class="panel-heading">
                            Client Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th width="4%" scope="col">Sl.</th>
                                        <th width="19%" scope="col">Client</th>
                                        <th width="6%" scope="col">Type</th>
                                        <th width="11%" scope="col">Username</th>
                                        <th width="11%" scope="col">Password</th>
                                        <th width="15%" scope="col">Key Person</th>
                                        <th width="14%" scope="col">Email</th>
                                        <th width="11%" scope="col">Number</th>
                                        <th width="9%" scope="col">Status</th>
                                        <th width="6%" scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php


                                    $totalAmount = 0;
                                    $sl = 1;

                                    ?>
                                    @foreach($client_view as $value)
                                    <tr>
                                        <td>{{$sl}}</td>
                                        <td>{{$value->company_name}}</td>
                                        <td>{{$value->user_type}}</td>
                                        <td>{{$value->username}}</td>
                                        <td>{{$value->password}}</td>
                                        <td>{{$value->contact_person}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->contact_no}}</td>
                                        <td>
                                            <select name="paymenttype" id="{{$value->user_id}}" onChange="changestatus(this.id)">

                                                @if ($value->client_status == "Active")

                                                    <option selected value='Active'>Active</option>
                                        		  <option value='Deactive'>Deactive</option>

                                                @else
                                                    <option value='Active'>Active</option>
                                        		  <option selected value='Deactive'>Deactive</option>
                                                @endif
                                            </select>

                                        </td>

                                        <td><div align="center"><a href="#" data-panel-id="{{$value->user_id}}"onclick="edit(this)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></div></td>
                                    </tr>
                                    <?php
                                    $sl++;

                                    ?>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--state overview end-->
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

        </section>
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
        @include('layout.footer')
    </footer>
    <!--footer end-->
</section>

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
    var modal1 = document.getElementById('myModal1');
    var span = document.getElementsByClassName("close")[0];

    function edit(x) {
        modal1.style.display = "block";
        btn = $(x).data('panel-id');



        $.ajax({
            type:'get',
            url:'{{'/ClientInfo/'}}'+btn,
            data:{'id':btn},
            cache: false,
            success:function(data)
            {
                $('#txtHint').html(data);
            }

        });



    }
    span.onclick = function() {
        modal1.style.display = "none";
    }
</script>

<script>


    function changestatus(x)
    {
        var option = document.getElementById(x).value;

        $.ajax({
            type:'get',
            url:'{{'/changeuserstatus/'}}'+option,
            data:{'id':x,'value':option},
            cache: false,
            success:function(data)
            {
                //$('#txtHint').html(data);
                alert(data);
                //location.reload();
            }

        });
    }

    //owl carousel
    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true,
            autoPlay:true

        });
    });

    //custom select box

    $(function(){
        $('select.styled').customSelect();
    });

</script>

</body>
</html>

