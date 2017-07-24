
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    @include('css.css')


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
                            New Job Request
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <form method="post" enctype="multipart/form-data" action="{{route('insertjobuser')}}">
                                    {{csrf_field()}}
                                    <table class="table table-striped table-bordered table-hover" border="0">
                                        <tr>
                                            <th colspan="4" scope="row"><div align="center"><h4>New Job Information</h4></div></th>
                                        </tr>
                                        <tr>
                                            <th width="13%" scope="row"><div align="right">Service Type <i style="color:red">*</i></div></th>
                                            <td width="100%">
                                                <select class="form-control" name="servicetype" required >
                                                    <option selected value="" disabled>Select Service Type</option>
                                                    @foreach($newjobrequest as $value)
                                                    <option value="{{$value->service_name}}">{{$value->service_name}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>



                                        <tr>
                                            <th scope="row"><div align="right">Brief Instruction<i style="color:red">*</i></div></th>
                                            <td>

                                                <textarea class= "form-control summernote" type="text"  name="details_instruction" required></textarea>
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
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
        @include('layout.footer')
    </footer>
    <!--footer end-->
</section>



@include('js.js')

<!-- jQuery -->
<script>
    $(document).ready(function() {
        $('.summernote').summernote();


    });

</script>

</body>
</html>

