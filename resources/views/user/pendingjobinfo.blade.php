
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
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
{{--<link href="{{url('css/bootstrap-reset.css')}}" rel="stylesheet">--}}
<!--external css-->
    <link href="{{url('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{url('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{url('css/owl.carousel.css')}}" type="text/css">
    <!-- Custom styles for this template -->
    <link href="{{url('css/style.css')}}" rel="stylesheet">
    <link href="{{url('css/style-responsive.css')}}" rel="stylesheet" />




    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="{{url('js/html5shiv.js')}}"></script>
    <script src="{{url('js/respond.min.js')}}"></script>
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
                            All Jobs
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th width="4%" scope="col">Sl.</th>
                                        <th width="17%" scope="col">Service Type</th>
                                        <th width="50%" scope="col">Instruction</th>
                                        <th width="10%" scope="col">Status</th>
                                        <th width="10%" scope="col">Edit Instruction</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php



                                    $sl = 1;

                                    ?>

                                    @foreach($pendingwork as $value)
                                        <tr>
                                            <td>{{$sl}}</td>
                                            <td>{{$value->service}}</td>
                                            <td>
                                                <?php  echo $value->instruction; ?>
                                            </td>
                                            <td>{{$value->job_status}}</td>
                                            <td><div align="center"><a id="editlead" href="#" data-panel-id="{{$value->job_id}}" onClick="editjobinstruction(this)"><i class="fa fa-edit fa-fw"></i></a></div></td>
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

<!-- js placed at the end of the document so the pages load faster -->
<script src="{{'js/jquery.js'}}"></script>
<script src="{{'js/jquery-1.8.3.min.js'}}"></script>

<script src="{{'js/bootstrap.min.js'}}"></script>
<script class="include" type="text/javascript" src="{{'js/jquery.dcjqaccordion.2.7.js'}}"></script>
<script src="{{'js/jquery.scrollTo.min.js'}}"></script>







<!--common script for all pages-->
<script src="{{'js/common-scripts.js'}}"></script>

<!--script for this page-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>


<script type="text/javascript">

    var modal1 = document.getElementById('myModal1');
    var span = document.getElementsByClassName("close")[0];

    function editjobinstruction(x)
    {


        btn = $(x).data('panel-id');

        $.ajax({
            type:'get',
            url:'{{'/changejob_user/'}}'+btn,
            data:{'id':btn},
            cache: false,
            success:function(data)
            {
                $('#txtHint').html(data);
                //alert(data);

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



<script>



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



