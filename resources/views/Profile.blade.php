
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
@include('js.js');