{{--{{$client1}}--}}

@foreach($sms as $s)
    {{$s->sender}}:{{$s->sms}}<br>
    @endforeach
<html>

<form method="post" action="/inputsms/{{$client1}}">
    {{csrf_field()}}
<textarea name="sms"></textarea><br>
    <input type="submit">
</form>
</html>