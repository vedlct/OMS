<?php
namespace App;


use Illuminate\Support\Facades\DB;
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
        <li><a  href="{{route('pendingjob_user')}}">Pending</a></li>
        <li><a  href="{{route('ongoingjob_user')}}">On Going</a></li>
        <li><a  href="{{route('finshedjob_user')}}">Done</a></li>

    </ul>
</li>
<li class="sub-menu">
    {{--<a href="{{route('usersms')}}" >--}}
        {{--<i class="fa fa-comment"></i>--}}
        {{--<span>Message</span>--}}
    {{--</a>--}}

    <a href="{{route('usersms',['client'=>session('order')])}}"  >
        <i class="fa fa-comment"></i>
        <span>Message</span>
    </a>

</li>

<?php
}




/*----------------------------------------------------------------------------------------------------------------*/
//else if($_SESSION['order']!= null && $_SESSION['status']=="Admin")
//{
elseif(session('order')!=null && session('status')=="Admin"){

$sms = DB::select( DB::raw("SELECT COUNT(*) AS total  FROM `message` WHERE `sender` !='Admin' ") );
?>

@foreach($sms as $count)
    <?php $totalforadmin = $count->total ?>
    @endforeach
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

        <li><a  href="{{'/Service'}}">Service Information</a></li>
        <li><a  href="{{route('passchange')}}">Password Change</a></li>
    </ul>
</li>

<li class="sub-menu">
    <a href="{{route('adminsms')}}" >
        <i class="fa fa-comment"></i>
        <span>Message</span><span id="output2" style="color:#FFF;;margin: 1px;font-size: 13px;"></span>
    </a>

</li>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    var old_counts = "<?php echo $totalforadmin?>";
    var old_count = parseInt(old_counts);

    var count =0;



    setInterval(function(){
        $.ajax({
            type : 'get',
            url:'{{'/getNotifAdmin'}}',
            cache: false,
            success : function(datan){

                if (parseFloat(datan) > old_count) {
                count=count+1;
                    $('#output2').html(" ("+count+")"),
                    old_count = datan;
                }else {
                    $('#output2').html(" ("+count+")")
                }


            }
        });
    },2000);
</script>

<?php
}
?>