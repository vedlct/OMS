
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
                            All Jobs
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th width="5%" scope="col">Sl.</th>
                                        <th width="10%" scope="col">Client Name</th>
                                        <th width="20%" scope="col">Service Type</th>
                                        <th width="50%" scope="col">Brief</th>
                                        <th width="15%" scope="col">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php



                                    $sl = 1;

                                    ?>
                                    @foreach($finshedwork as $value)
                                    <tr>
                                        <td>{{$sl}}</td>
                                        <td>
                                            {{$value->company_name}}
                                        </td>
                                        <td>{{$value->service}}</td>
                                        <td>
                                            <?php echo $value->instruction ?><br>
                                        </td>
                                        <td>
                                            {{--<select name="paymenttype" id="{{$value->job_id}}" onChange="changestatus(this.id)">--}}

                                                {{--@if ($value->job_status == "On Going")--}}

                                                    {{--<option selected value='On Going'>On Going</option>--}}
												  {{--<option value='Done'>Done</option>--}}

                                               {{--@else--}}

                                                    {{--<option selected value='Done'>Done</option>--}}

                                                {{--@endif--}}
                                            {{--</select>--}}
                                            Done
                                        </td>
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




</body>
</html>

