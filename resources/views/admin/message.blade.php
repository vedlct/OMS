@foreach($client_view as $c)

<a href="/messagebody/{{$c->sender}}"> {{$c->sender}}</a><br>

@endforeach