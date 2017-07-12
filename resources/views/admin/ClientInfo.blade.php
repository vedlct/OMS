
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="{{'img/TCL_logo.png'}}">

    <title>MSMS - Tech Cloud Ltd.</title>

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
@extends('Navigation.topmenu')
<!--header end-->
    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                <?php
                include('menu.php');
                include ('php/connection.php');
                extract($_GET);
                $sql1 = "SELECT * FROM `customer_info` WHERE `user_id` = '$user_no'";
                $result1 = mysqli_query($con, $sql1);

                ?>
                    @extends('Navigation.menu')

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
                            Update Client Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <form method="post" enctype="multipart/form-data" action="php/updateclient.php">
                                    <?php
                                    while ($data_row=mysqli_fetch_array($result1))
                                    {
                                    ?>
                                    <input type="hidden" name="userid" value="<?php echo $data_row['user_id']; ?>"/>
                                    <table class="table table-striped table-bordered table-hover" border="0">
                                        <tr>
                                            <th width="13%" scope="row"><div align="right">Client Type</div></th>
                                            <td width="37%">
                                                <select class="form-control" name="usertype" id="select" required onChange="map(this.value)">
                                                    <?php
                                                    if ($data_row['user_type'] == "User")
                                                    {
                                                        echo "<option selected value='User'>User</option>";
                                                    }
                                                    else if ($data_row['user_type'] == "Admin")
                                                    {
                                                        echo "<option value='User'>User</option>
                                        		  <option selected value='Admin'>Admin</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                            <th width="13%"><div align="right">Login Name <i style="color:red">*</i></div></th>
                                            <td width="37%">
                                                <input class="form-control" type="text" name="loginname" disabled value="<?php echo $data_row['username']; ?>" required />

                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><div align="right">Company Name <i style="color:red">*</i></div></th>
                                            <td>
                                                <input class="form-control" type="text" name="clientname" id="textfield5" value="<?php echo $data_row['company_name']; ?>" required />
                                            </td>
                                            <th><div align="right">Contact Person <i style="color:red">*</i></div></th>
                                            <td>
                                                <input class="form-control" type="text" name="contact" id="textfield6" value="<?php echo $data_row['contact_person']; ?>" required/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><div align="right">Contact Number <i style="color:red">*</i></div></th>
                                            <td>
                                                <input class="form-control" type="text" name="number" id="textfield7" value="<?php echo $data_row['contact_no']; ?>" required/>
                                            </td>
                                            <th><div align="right">Email <i style="color:red">*</i></div></th>
                                            <td>
                                                <input class="form-control" type="email" name="email" id="textfield8" value="<?php echo $data_row['email']; ?>" required/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><div align="right">Address </div></th>
                                            <td colspan="3">
                                                <input class="form-control" type="text" name="address" id="textfield9" value="<?php echo $data_row['address']; ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><div align="right">Web Address</div></th>
                                            <td colspan="3">
                                                <input class="form-control" type="text" name="web" value="<?php echo $data_row['webaddress']; ?>" id="textfield10" />
                                            </td>
                                        </tr>

                                        <tr>
                                            <th colspan="4" scope="row">
                                                <div align="center">
                                                    <input type="submit" name="update" value="UPDATE">
                                                </div>
                                            </th>
                                        </tr>
                                    </table>
                                    <?php
                                    }
                                    ?>
                                </form>
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



    </footer>
<!--footer end-->
</section>



</body>
</html>


<script>

    $(function() {

        var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
        alert (pgurl);

        $(".nav li").each(function(){

            if(pgurl==''){
                $(".nav li:eq(1)").addClass("active");
            }else
            if($('a',this).attr("href") == pgurl || $('a', this).attr("href") == '')
                $(this).addClass("active");
        })
    });
</script>
<!-- js placed at the end of the document so the pages load faster -->
<!-- js placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>


<!--common script for all pages-->
<script src="js/common-scripts.js"></script>


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