
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="img/TCL_logo.png">

    <title>Order Management System</title>

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
                <div class="col-lg-3">
                </div>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div  class="panel-heading">
                            User Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">

                                @foreach($profile_info as $profile)
                                <table width="100%" class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <th colspan="3"><div align="center"><strong><h4>Customer Profile</h4></strong></div></th>
                                    </tr>
                                    <tr>
                                        <td width="32%" rowspan="6"><img src="img/profile_avt.png"></td>
                                        <td width="19%">Company Name :</td>
                                        <td width="49%">{{$profile->company_name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Contact Person :</td>

                                        <td>{{$profile->contact_person}}</td>
                                    </tr>
                                    <tr>
                                        <td>Number :</td>

                                        <td>{{$profile->contact_no}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email :</td>

                                        <td>{{$profile->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Website :</td>

                                        <td>{{$profile->webaddress}}</td>
                                    </tr>
                                    <tr>
                                        <td>User Type :</td>

                                        <td>{{$profile->user_type}}</td>
                                    </tr>
                                    <tr>
                                        <td width="32%">Address :</td>

                                        <td colspan="2">{{$profile->address}}</td>
                                    </tr>
                                </table>
                                @endforeach

                                <table width="100%" class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <th colspan="5"><div align="center"><strong><h4>Available Brand Name</h4></strong></div></th>
                                    </tr>
                                    <tr>

                                    </tr>
                                </table>
                                <table width="100%" class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <th colspan="2"><div align="center"><strong><h4>Telco Rate</h4></strong></div></th>
                                    </tr>
                                    <!--<tr>
                                      <td>GP</td>
                                      <td>Banglalink</td>
                                      <td>Robi</td>
                                      <td>Airtel</td>
                                      <td>Teletalk</td>
                                      <td>Citycell</td>
                                    </tr>-->
                                    <tr>

                                    </tr>
                                </table>
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