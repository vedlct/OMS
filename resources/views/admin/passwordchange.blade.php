@foreach($getpass as $pass)
<form method="post" action="{{url('/passchange')}}/{{$pass->user_id}}">
    {{csrf_field()}}
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <tr>
            <td>Agent Name :</td>
            <td><input type="text" class="form-control" name="aname" id="field"  value="{{$pass->company_name}}" disabled /></td>
        </tr>
        <tr>
            <td>Password :</td>
            <td><input type="password" class="form-control" name="NP" id="field" value="" required/></td>
        </tr>
        <tr>
            <td>Confirm Password :</td>
            <td><input type="password" class="form-control" name="CNP" id="field" value="" required/></td>
        </tr>
        <tr>

        </tr>
        <tr>
            <td colspan="2">
                <div align="center">
                    <input type="submit" name="submit" id="NewPass" value="SAVE" />
                </div>
            </td>
        </tr>
    </table>
</form>
    @endforeach