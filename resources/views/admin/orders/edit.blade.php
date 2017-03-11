@extends('layouts.default')

@section('content')

    @include('layouts.panelUp')
    <div class="panel-heading">
        <h3>Edit #{{$order->id}} Order</h3>
        <h2>Client: {{$order->client->user->name}}</h2>
        <h4>Data: {{$order->created_at}}</h4>

    </div>

    @include('layouts.errorCheck')

    <div class="panel-body">
        <b>Entregar em: </b>
        {{$order->client->address}} - {{$order->client->city}} - {{$order->client->state}}<br>
        <b>zipcode:</b> {{$order->client->zipcode}}

    <!-- Form Input -->
        <div class="form-group">
        {!! Form::model($order, ['route' => ['admin.orders.update', $order->id],'method' => 'post']) !!}

        @include('admin.orders._form')
        <!-- Form Input -->
            <div class="form-group">

                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>


    </div>


    <div class="text-center">
        <!-- !! $orders->render()!!}-->
    </div>
    @include('layouts.panelDown')

@endsection