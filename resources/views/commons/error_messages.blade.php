@if(count($errors) > 0)
    @foreach($errors->all() as $error)
    <ul class="alert alert-danger">
        <li>{{$error}}</li>
    </ul>
    @endforeach
@endif


