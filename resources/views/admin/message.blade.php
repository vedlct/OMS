<h1>Admin message</h1>

{{--@foreach($client_view as $c)--}}

    {{--<a href="/messagebody/{{$c->sender}}"> {{$c->sender}}</a><br>--}}

{{--@endforeach--}}

@foreach($client_view as $s)
    {{$s->sender}}:{{$s->sms}}<br>
@endforeach
<html>

{{--<form method="post" action="">--}}
    {{--{{csrf_field()}}--}}
    {{--<textarea name="sms"></textarea><br>--}}
    {{--<input type="submit">--}}
{{--</form>--}}
</html>
