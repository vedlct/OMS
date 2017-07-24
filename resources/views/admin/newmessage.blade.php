
<form method="post" action="{{route('newmessage')}}">
    {{csrf_field()}}
    <div class="form-group">
        <label >Select Reciever :</label>

        <select name="reciever" class="form-control" id="reciever" onChange="changename(this.id)">
            <option selected disabled>Select One</option>
            @foreach($client_name as $message)
            <option>{{$message->short_name}}</option>
            @endforeach
        </select>

    </div>
    <div class="form-group">
        <div class="message_write">
            <textarea class="form-control" name="sms" placeholder="type message"></textarea>

            <div class="chat_bottom"><a href="#" class="pull-left upload_btn"><i class="fa fa-cloud-upload" aria-hidden="true"></i>
                    Add Files</a>

            </div>

        </div>
    </div>
    <div class="form-group" align="right">
        <button type="submit" class="btn btn-success ">Submit</button>
    </div>
</form>

