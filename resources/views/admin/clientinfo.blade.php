<link rel="stylesheet" href="{{ 'css/modal.css' }}" />
<script type="text/javascript" src="{{ URL('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') }}"></script>

                                <form method="post" enctype="multipart/form-data" action="{{route('updateinfo')}}">
                                    @foreach($client_view as $value)
                                    <input type="hidden" name="userid" value="{{$value->user_id}}"/>
                                    {{csrf_field()}}
                                    <table class="table table-striped table-bordered table-hover" border="0">
                                        <tr>
                                            <th width="13%" scope="row"><div align="right">Client Type</div></th>
                                            <td width="37%">
                                                <select class="form-control" name="usertype" id="select" required onChange="map(this.value)">

                                                    @if ($value->user_type == "User")

                                                        <option selected value='User'>User</option>

                                                    @elseif ($value->user_type == "Admin")
                                                        <option value='User'>User</option>
                                        		        <option selected value='Admin'>Admin</option>

                                                    @endif
                                                </select>
                                            </td>
                                            <th width="13%"><div align="right">Login Name <i style="color:red">*</i></div></th>
                                            <td width="37%">
                                                <input class="form-control" type="text" name="loginname" disabled value="{{$value->username}}" required />

                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><div align="right">Company Name <i style="color:red">*</i></div></th>
                                            <td>
                                                <input class="form-control" type="text" name="clientname" id="textfield5" value="{{$value->company_name}}" required />
                                            </td>
                                            <th><div align="right">Contact Person <i style="color:red">*</i></div></th>
                                            <td>
                                                <input class="form-control" type="text" name="contact" id="textfield6" value="{{$value->contact_person}}" required/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><div align="right">Contact Number <i style="color:red">*</i></div></th>
                                            <td>
                                                <input class="form-control" type="text" name="number" id="textfield7" value="{{$value->contact_no}}" required/>
                                            </td>
                                            <th><div align="right">Email <i style="color:red">*</i></div></th>
                                            <td>
                                                <input class="form-control" type="email" name="email" id="textfield8" value="{{$value->email}}" required/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><div align="right">Address </div></th>
                                            <td colspan="3">
                                                <input class="form-control" type="text" name="address" id="textfield9" value="{{$value->address}}" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><div align="right">Web Address</div></th>
                                            <td colspan="3">
                                                <input class="form-control" type="text" name="web" value="{{$value->webaddress}}" id="textfield10" />
                                            </td>
                                        </tr>

                                        <tr>
                                            <th colspan="4" scope="row">
                                                <div align="center">
                                                    <input type="submit" name="update" value="UPDATE">
                                                </div>
                                            </th>
                                        </tr>
                                    </table>
                                    @endforeach
                                </form>

