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
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($orders as $client)
                <tr>

                    <td>{{$client->id}}</td>
                    <td><a href=""
                           class="btn btn-primary btn-sm">Edit</a>
                        <a href=""
                           class="btn btn-danger btn-sm">Delete</a>
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