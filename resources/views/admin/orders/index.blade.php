@extends('layouts.default')

@section('content')

    @include('layouts.panelUp')
    <div class="panel-heading">

        @include('layouts.back')
        <h2>Orders</h2>

        <a href="" class="btn btn-default">New Order</a>
    </div>
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Total</th>
                <th>Data</th>
                <th>Items</th>
                <th>Entregador</th>
                <th>Status</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>

            @foreach($orders as $order)
                <tr>

                    <td>#{{$order->id}}</td>
                    <td>R$ {{$order->total}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>
                        <ul>
                        @foreach($order->items as $item)
                            <li>{{$item->product->name}}</li>
                        @endforeach
                        </ul>
                    </td>
                    <td>@if($order->deliveryman)
                            {{$order->deliveryman->name}}
                        @else
                            --
                        @endif</td>
                    <td>{{$order->status}}</td>
                    <td>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <a href="{{route('admin.orders.edit', ['id' => $order->id])}}"
                                   class="btn btn-primary btn-sm">Edit</a>
                            </div>

                            <div class="col-xs-12 col-sm-6">
                                <a href=""
                                   class="btn btn-danger btn-sm">Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <div class="text-center">
        {!! $orders->render() !!}
    </div>
    @include('layouts.panelDown')

@endsection