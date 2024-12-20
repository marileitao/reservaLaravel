<form action="{{$action}}" method="post">
    @csrf

    @if($update)
    @method('PUT')
    @endif

</form>