@extends('layouts.default')


@section('content')

    @include('layouts.panelUp')
    <div class="panel-heading">
        <h3>My Orders</h3>
        <a href="{{route('costumer.create')}}" class="btn btn-default">New Order</a>
    </div>

    <div class="panel-body">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->total}}</td>
                    <td>{{$order->status}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $orders->render() !!}

    </div>
    @include('layouts.panelDown')

@endsection

@section('script')

@endsection