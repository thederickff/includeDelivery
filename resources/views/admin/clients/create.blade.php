@extends('layouts.default')

@section('content')

    @include('layouts.panelUp')
    <div class="panel-heading">

        <h2>Create Client</h2>

    </div>

    @include('layouts.errorCheck')
    <div class="panel-body">
    {!! Form::open(['route' => 'admin.clients.store','method' => 'post']) !!}


    @include('admin.clients._form')
    <!-- Form Input -->
        <div class="form-group">

            {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>


    <div class="text-center">
        <!-- !! $clients->render()!!}-->
    </div>
    @include('layouts.panelDown')

@endsection