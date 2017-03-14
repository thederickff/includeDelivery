@extends('layouts.default')

@section('content')

    @include('layouts.panelUp')
    <div class="panel-heading">

        <h2>Create Cupom</h2>

    </div>

    @include('layouts.errorCheck')
    <div class="panel-body">
    {!! Form::open(['route' => 'admin.cupoms.store','method' => 'post']) !!}


    @include('admin.cupoms._form')
    <!-- Form Input -->
        <div class="form-group">

            {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>


    <div class="text-center">
        <!-- !! $cupoms->render()!!}-->
    </div>
    @include('layouts.panelDown')

@endsection