<?php
//include("php/connection.php");

//if($_SESSION['order']== NULL)
//{
//
//    echo "<script type=\"text/javascript\">
//        alert(\"Login First\");
//        window.location=\"../index.php\";
//        </script>";
//}

if (session('order')==NULL){

    echo "<script type=\"text/javascript\">
        alert(\"Login First\");
        window.location=\"../index.php\";
        </script>";

}



/*----------------------------------------------------------------------------------------------------------------*/
//else if($_SESSION['order']!= null && $_SESSION['status']=="User")
//{
elseif (session('order')!= null && session('status')== "User"){

    ?>

<li>
    <a href="{{'/Home'}}">
        <i class="fa fa-dashboard"></i>
        <span>Dashboard</span>
    </a>
</li>
<li>
    <a  href="{{route('usernewjobrequest')}}">
        <i class="fa fa-briefcase"></i>
        <span>New Job Request</span>
    </a>
</li>
<li class="sub-menu">
    <a href="javascript:;" >
        <i class="fa fa-laptop"></i>
        <span>Work</span>
    </a>
    <ul class="sub">
        <li><a  href="{{route('ongoingjob_user')}}">On Going</a></li>
        <li><a  href="{{route('finshedjob_user')}}">Done</a></li>
    </ul>
</li>

<?php
}




/*----------------------------------------------------------------------------------------------------------------*/
//else if($_SESSION['order']!= null && $_SESSION['status']=="Admin")
//{
elseif(session('order')!=null && session('status')=="Admin"){
?>
<li>
    <a href="{{'/Home'}}">
        <i class="fa fa-dashboard"></i>
        <span>Dashboard</span>
    </a>
</li>
<li>
    <a  href="{{route('adminnewjobrequest')}}">
        <i class="fa fa-briefcase"></i>
        <span>New Job Request</span>
    </a>
</li>
<li>
    <a  href="{{route('newuserrequest')}}">
        <i class="fa fa-user"></i>
        <span>New User Request</span>
    </a>
</li>
<li class="sub-menu">
    <a href="javascript:;" >
        <i class="fa fa-laptop"></i>
        <span>Work</span>
    </a>
    <ul class="sub">
        <li><a  href="{{route('ongoingjob')}}">On Going</a></li>
        <li><a  href="{{route('finshedjob')}}">Done</a></li>
    </ul>
</li>
<!--<li>
    <a  href="JobInfo.php">
        <i class="fa fa-spinner"></i>
        <span>Work</span>
    </a>
</li>-->
<li>
    <a  href="{{route('clintinfo')}}">
        <i class="fa fa-users"></i>
        <span>Clients Info</span>
    </a>
</li>

<!--<li class="sub-menu">
    <a href="javascript:;" >
        <i class="fa fa-laptop"></i>
        <span>Report</span>
    </a>
    <ul class="sub">
        <li><a  href="AllocationHistory.php">Allocation History</a></li>
        <li><a  href="SendReport.php">SMS Delivery Status</a></li>
        <li><a  href="Allocation&Payments.php">Allocation & Payment</a></li>
    </ul>
</li> -->

<li class="sub-menu">
    <a href="javascript:;" >
        <i class="fa fa-laptop"></i>
        <span>Others</span>
    </a>
    <ul class="sub">
        <li><a  href="#">FAQ</a></li>
        <li><a  href="#">User Manual</a></li>
        <li><a  href="{{'/Service'}}">Service Information</a></li>
        <li><a  href="{{route('passchange')}}">Password Change</a></li>
    </ul>
</li>
<?php
}
?>