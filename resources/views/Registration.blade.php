
<!DOCTYPE html>
<html lang="en">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keyword" content="">
        <link rel="shortcut icon" href="{{url('img/TCL_logo.png')}}">
    
        <title>User Login | Order Management System</title>
    



  <!-- Bootstrap core CSS -->
      <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
      <link href="{{url('css/bootstrap-reset.css')}}" rel="stylesheet">
      <!--external css-->
      <link href="{{url('pages/css/font-awesome.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{url('css/style.css')}}" rel="stylesheet">
      <link href="{{url('css/style-res')}}" rel="stylesheet" />

      <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
      <!--[if lt IE 9]>
      <script src="{{url('js/html5shiv.js')}}"></script>
      <script src="{{url('js/respond.min.js')}}"></script>
      <![endif]-->

    </head>

  <body>
			<a href="{{url('/')}}"><button class="btn-default" style="margin: 1% 0 0 1%;">Log In</button></a>
          <section class="wrapper">
          	
              <!--state overview start-->
              <div class="row">
           	 	<div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                              <form method="post" enctype="multipart/form-data" action="{{url('/insertreg')}}">
                                  {{csrf_field()}}
                              <table class="table table-striped table-bordered table-hover" border="0">
                                  <tr>
                                    <th colspan="4" scope="row"><div align="center"><h4>Ragistration Form</h4></div></th>
                                  </tr>
                                  <tr>
                                    <th width="13%" scope="row"><div align="right">Client Type <i style="color:red">*</i></div></th>
                                    <td width="37%">
                                      <select class="form-control" name="usertype" required readonly>
                                      	<option value="User" selected>User</option>
                                      </select>
                                    </td>
                                    <th width="13%"><div align="right">Login Name <i style="color:red">*</i></div></th>
                                    <td width="37%">
                                    	<input class="form-control" type="text" name="loginname" id="logname" required />
                                        <i id="uname" style="color:red;display:none">Username Exist</i>
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row"><div align="right">Password <i style="color:red">*</i></div></th>
                                    <td>
                                    <input class="form-control" type="password" name="pass" id="pass1" required/>
                                    </td>
                                    <th><div align="right">Re-type <i style="color:red">*</i></div></th>
                                    <td>
                                    <input class="form-control" type="password" name="re-pass" id="pass2" required/>
                                    <i id="pname" style="color:red;display:none">Password Should be same and not Blank </i>
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row"><div align="right">Company Name <i style="color:red">*</i></div></th>
                                    <td>
                                    <input class="form-control" type="text" name="clientname" id="textfield5" required />
                                    </td>
                                    <th><div align="right">Contact Person <i style="color:red">*</i></div></th>
                                    <td>
                                    <input class="form-control" type="text" name="contact" id="textfield6" required/>
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row"><div align="right">Contact Number <i style="color:red">*</i></div></th>
                                    <td>
                                    <input class="form-control" type="text" name="number" id="textfield7" required/>
                                    </td>
                                    <th><div align="right">Email <i style="color:red">*</i></div></th>
                                    <td>
                                    <input class="form-control" type="email" name="email" id="textfield8" required/>
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row"><div align="right">Address </div></th>
                                    <td colspan="3">
                                    <input class="form-control" type="text" name="address" id="textfield9" />
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row"><div align="right">Web Address</div></th>
                                    <td colspan="3">
                                    <input class="form-control" type="text" name="web" id="textfield10" />
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <th colspan="4" scope="row">
                                        <div align="center">
                                        	<input type="reset" value="CLEAR">
                                            <input type="submit" name="save" value="SAVE">
                                        </div>
                                    </th>
                                  </tr>
                               </table>
                               </form>
                          	</div>
                        </div>
                     </div>
                 </div>
               </div>
                          
            <!--state overview end-->
          </section>
      
      <!--main content end-->
      <!--footer start-->
      @include('layout.footer')

            <!-- js placed at the end of the document so the pages load faster -->
            <!-- js placed at the end of the document so the pages load faster -->
            <script src="{{url('js/jquery.js')}}"></script>
            <script src="{{url('js/jquery-1.8.3.min.js')}}"></script>
            {{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
            <script src="{{url('js/bootstrap.js')}}"></script>
            <script class="include" type="text/javascript" src="{{url('js/jquery.dcjqaccordion.2.7.js')}}"></script>
            <script src="{{url('js/jquery.scrollTo.min.js')}}"></script>


            <script>
  
	$('#pass2').blur(function() {
	if ($('#pass1').attr('value') == $('#pass2').attr('value') & $('#pass1').attr('value')!='' & $('#pass2').attr('value')!='')
	{
		$('#pass1').css("border","1px solid #36c706");
		$('#pass2').css("border","1px solid #36c706");
		$('#pname').css("display","none");
		$(':input[type="submit"]').prop('disabled', false);
	
	} else 
	{
		$('#pass1').css("border","1px solid #ff0000");
		$('#pass2').css("border","1px solid #ff0000");
		$('#pname').css("display","block");
		$(':input[type="submit"]').prop('disabled', true);
	}
	});
      //owl carousel
//   $(document).ready(function() {
//          $("#owl-demo").owlCarousel({
//              navigation : true,
//              slideSpeed : 300,
//              paginationSpeed : 400,
//              singleItem : true,
//			  autoPlay:true
//
//          });
//      });
//
//      //custom select box
//
//      $(function(){
//          $('select.styled').customSelect();
//      });
	  
	  
	  $('#logname').live('change', function() {
		 var us = $('#logname').val();
		//alert(us);
		 
    //ajax request
    $.ajax({
        url: "pages/php/ajax/user_check.php",
		type:"POST",
        data:{email:us},
        dataType: "text",
        success: function(data) {
            if(data >0) {
				$('#logname').css("border","1px solid #ff0000");

				$('#uname').css("display","block");
				$(':input[type="submit"]').prop('disabled', true);
            }
            else {
                $('#logname').css("border","1px solid #e2e2e4");
				$('#uname').css("display","none");
				$(':input[type="submit"]').prop('disabled', false);
            }
        },
        error: function(data){
            //error
        }
    });
});
	  
</script>

  </body>
</html>

