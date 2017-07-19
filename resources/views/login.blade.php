
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <link rel="shortcut icon" href="{{'img/TCL_logo.png'}}">

    <title>User Login | Order Management System</title>

    <!-- Bootstrap core CSS -->
    <link href="{{'css/bootstrap.min.css'}}" rel="stylesheet">
    <link href="{{'css/bootstrap-reset.css'}}" rel="stylesheet">
    <!--external css-->
    <link href="{{'pages/css/font-awesome.css'}}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{'css/style.css'}}" rel="stylesheet">
    <link href="{{'css/style-res'}}" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="{{'js/html5shiv.js'}}"></script>
    <script src="{{'js/respond.min.js'}}"></script>
    <![endif]-->
</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" action="{{'/logincheck'}}" method="post">
        <h2 class="form-signin-heading">sign in now</h2>
        <br>
        <center><img class="img-responsive img-thumbnail" src="{{'img/TCL_logo.png'}}" width="150"></center>
        <div class="login-wrap">
            {{csrf_field()}}
            <input type="text" class="form-control" name="name" placeholder="User Name" autofocus>
            <input type="password" class="form-control" name="pass" placeholder="Password">

            <button class="btn btn-lg btn-login btn-block" type="submit" name="login">Sign in</button>

        </div>
    </form>
    <div class="col-lg-4">
    </div>
    <div class="col-lg-4">
        <br><center>OR</center><br>
        <a href="{{'/Registration'}}" target="_blank"><button class="btn btn-lg btn-login btn-block" style="background: #4bb158;;box-shadow: 0 4px #4bb158;color: white;">Create New Account</button></a>
    </div>
    <div class="col-lg-4">
    </div>
</div>



<!-- js placed at the end of the document so the pages load faster -->
<script src="{{'js/jquery.js'}}"></script>
<script src="{{'js/bootstrap.min.js'}}"></script>


</body>
</html>
