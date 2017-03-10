@extends('layouts.default')

@section('content')

    @include('layouts.panelUp')
    <div class="panel-heading">
        <h2>Edit Client: {{$client->user->name}}</h2>

    </div>

    @include('layouts.errorCheck')

    <div class="panel-body">
    {!! Form::model($client, ['route' => ['admin.clients.update', $client->id],'method' => 'post']) !!}

    @include('admin.clients._form')
    <!-- Form Input -->
        <div class="form-group">

            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>


    <div class="text-center">
        <!-- !! $clients->render()!!}-->
    </div>
    @include('layouts.panelDown')

@endsection