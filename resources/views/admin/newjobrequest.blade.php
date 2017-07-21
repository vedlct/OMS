
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
                                        <th width="10%" scope="col">Client Name</th>
                                        <th width="17%" scope="col">Service Type</th>
                                        <th width="50%" scope="col">Instruction</th>
                                        <th width="5%" scope="col">Status</th>
                                        <th width="15%"> Delete Job Request</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $s=1; ?>
                                    @foreach($newjobrequest as $value)

                                    <tr>
                                        <td>{{$s}}</td>
                                        <td>
                                            {{$value->company_name}}
                                        </td>

                                        <td>{{$value->service}}</td>
                                        <td>
                                            <?php echo $value->instruction ?>
                                        </td>
                                        <td>
                                            <select name="paymenttype" id="{{$value->job_id}}" onChange="changestatus(this.id)">

                                                {{--@if ({{$value->job_status}} == "Pending")--}}
                                                @if($value->job_status=="Pending")

                                                    <option selected value='Pending'>Pending</option>
                                        		    <option value='On Going'>On Going</option>

                                                @else

                                                    <option value='Pending'>Pending</option>
                                        		    <option selected value='On Going'>On Going</option>
                                                @endif

                                            </select>
                                        </td>
                                        <td><div align="center"><a href="#" data-panel-id="{{$value->job_id}}"onclick="deletejobrequest(this)"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div></td>
                                    </tr>
                                        <?php $s++ ?>
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

@include('js.js');


<script>


    function changestatus(x)
    {
        var option = document.getElementById(x).value;
        //alert(option);

        $.ajax({
            type:'get',
            url:'{{'/changejobstatus/'}}'+option,
            data:{'id':x,'value':option},
            cache: false,
            success:function(data)
            {
                //$('#txtHint').html(data);
                alert(data);
                location.reload();
            }

        });

    }
    function deletejobrequest(x)
    {
        btn = $(x).data('panel-id');

        if (confirm('Are you sure you want to delete this Job request ?')) {
            // Save it!

            $.ajax({
                type:'get',
                url:'{{'/deletejobreq/'}}'+btn,
                data:{'id':btn},
                cache: false,
                success:function(data)
                {
                    //$('#txtHint').html(data);
                    alert(data);
                    window.location="/NewJobRequest";
                }

            });

        } else {
            window.location="/NewJobRequest";
        }




    }

//    //owl carousel
//    $(document).ready(function() {
//        $("#owl-demo").owlCarousel({
//            navigation : true,
//            slideSpeed : 300,
//            paginationSpeed : 400,
//            singleItem : true,
//            autoPlay:true
//
//        });
//    });
//
//    //custom select box
//
//    $(function(){
//        $('select.styled').customSelect();
//    });

</script>

</body>
</html>

