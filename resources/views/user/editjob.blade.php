
<?php foreach($job_instruction as $job){?>
<form method="post" enctype="multipart/form-data" action="{{url('/updatejob')}}">
    {{csrf_field()}}

    <table class="table table-striped table-bordered table-hover" border="0">
        <tr>
            <th colspan="4" scope="row"><div align="center"><h4>Edit Job Information</h4></div></th>
        </tr>
        <tr>
            <th width="13%" ><div align="right">Service Type <i style="color:red">*</i></div></th>
            <td width="100%">
                <select class="form-control" name="servicetype" required >

                    <option value="{{$job->service}}" selected>{{$job->service}}</option>
                    <?php foreach($activeservice as $value){?>

                        <option value="{{$value->service_name}}">{{$value->service_name}}</option>
                    <?php } ?>
                </select>
            </td>
        </tr>



        <tr>
            <th ><div align="right">Brief Instruction<i style="color:red">*</i></div></th>
            <td>

                <textarea class= "form-control summernote" type="text"  name="details_instruction" required>{{$job->instruction}}</textarea>

            </td>

        </tr>
        <input type="hidden" name="id" value="{{$job->job_id}}">
        <tr>
            <th colspan="4" >
                <div align="center">
                    <input type="reset" value="CLEAR">
                    <input type="submit" name="save" value="SAVE">
                </div>
            </th>
        </tr>
    </table>


</form>
<?php } ?>

<script>
    $(document).ready(function() {
        $('.summernote').summernote();

    });

</script>