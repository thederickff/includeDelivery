@if($errors->any())
    <ul class="alert-warning">

        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif