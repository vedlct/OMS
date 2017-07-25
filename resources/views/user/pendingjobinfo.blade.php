
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
                                        <th width="4%" scope="col">Sl.</th>
                                        <th width="17%" scope="col">Service Type</th>
                                        <th width="50%" scope="col">Instruction</th>
                                        <th width="10%" scope="col">Status</th>
                                        <th width="10%" scope="col">Edit Instruction</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php



                                    $sl = 1;

                                    ?>

                                    @foreach($pendingwork as $value)
                                        <tr>
                                            <td>{{$sl}}</td>
                                            <td>{{$value->service}}</td>
                                            <td>
                                                <?php  echo $value->instruction; ?>
                                            </td>
                                            <td>{{$value->job_status}}</td>
                                            <td><div align="center"><a id="editlead" href="#" data-panel-id="{{$value->job_id}}" onClick="editjobinstruction(this)"><i class="fa fa-edit fa-fw"></i></a></div></td>
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

<script type="text/javascript">

    var modal1 = document.getElementById('myModal1');
    var span = document.getElementsByClassName("close")[0];

    function editjobinstruction(x)
    {


        btn = $(x).data('panel-id');

        $.ajax({
            type:'get',
            url:'{{url('/changejob_user')}}/'+btn,
            data:{'id':btn},
            cache: false,
            success:function(data)
            {
                $('#txtHint').html(data);
                //alert(data);

            }

        });
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



