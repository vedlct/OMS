

<form method="post" enctype="multipart/form-data" action="{{'/updatejob'}}">
    {{csrf_field()}}

    <table class="table table-striped table-bordered table-hover" border="0">
        <tr>
            <th colspan="4" scope="row"><div align="center"><h4>Edit Job Information</h4></div></th>
        </tr>
        <tr>
            <th width="13%" scope="row"><div align="right">Service Type <i style="color:red">*</i></div></th>
            <td width="100%">
                <select class="form-control" name="servicetype" required >
                    <option selected value="" disabled>Select Service Type</option>
                    @foreach($activeservice as $value)
                        <option value="{{$value->service_name}}">{{$value->service_name}}</option>
                    @endforeach
                </select>
            </td>
        </tr>



        <tr>
            <th scope="row"><div align="right">Brief Instruction<i style="color:red">*</i></div></th>
            <td>
                @foreach($job_instruction as $value)
                <textarea class= "form-control summernote" type="text"  name="details_instruction">{{$value->instruction}}</textarea>
                @endforeach
            </td>

        </tr>
        <input type="hidden" name="id" value="{{$value->job_id}}">
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

<script>
    $(document).ready(function() {
        $('.summernote').summernote();

    });

</script>