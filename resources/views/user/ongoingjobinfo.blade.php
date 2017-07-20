
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
                                        <th width="15%" scope="col">Service Type</th>
                                        <th width="50%" scope="col">Brief</th>
                                        <th width="15%" scope="col">Status</th>
                                        <th width="15%" scope="col">Comment</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sl = 1;
                                    ?>

                                    @foreach($ongoingwork as $value)
                                    <tr>
                                        <td>{{$sl}}</td>
                                        <td>{{$value->service}}</td>
                                        <td>
                                          <?php  echo $value->instruction; ?>
                                        </td>
                                        <td>{{$value->job_status}}</td>
                                        <td><a href="#" data-panel-id="{{$value->job_id}}" onclick="comment(this)"><div align="center"><i class="fa fa-comments" aria-hidden="true"></i></div></a></td>
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
            <!-- endmodal-->

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

@include('js.js');

<script>
    $(document).ready(function() {
        $('.summernote').summernote();

    });

</script>

<script>

    var modal1 = document.getElementById('myModal1');
    var span = document.getElementsByClassName("close")[0];
    function comment(x) {



        btn = $(x).data('panel-id');


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



</body>
</html>

