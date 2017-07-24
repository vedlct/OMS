
<form id="newpass" method="post" action="{{route('newmessage')}}" onsubmit="return validateForm()">
    {{csrf_field()}}
    <div class="form-group">
        <label >Select Reciever :</label>

        <select name="reciever" class="form-control" id="reciever" required >
            <option selected disabled>Select One</option>
            @foreach($client_name as $message)
            <option>{{$message->short_name}}</option>
            @endforeach
        </select>

    </div>
    <div class="form-group">
        <div class="message_write">
            <textarea class="form-control" name="sms" placeholder="type message" required></textarea>



        </div>
    </div>
    <div class="form-group" align="right">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
</form>
<script>
    function validateForm() {
        var x = document.forms["newpass"]["reciever"].value;
        if (x == "Select One") {
            alert("Please select a reciever");
            return false;
        }
        else {
            return true;
        }
    }
</script>