@extends('layouts.default')

@section('content')

    @include('layouts.panelUp')
    <div class="panel-heading">

        @include('layouts.back')
        <h2>Clients</h2>

        <a href="{{route('admin.clients.create')}}" class="btn btn-default">New Client</a>
    </div>
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($clients as $client)
                <tr>

                    <td>{{$client->id}}</td>
                    <td>{{$client->user->name}}</td>
                    <td><a href="{{route('admin.clients.edit', ['id'=> $client->id])}}"
                           class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{route('admin.clients.destroy', ['id'=> $client->id])}}"
                           class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <div class="text-center">
        {!! $clients->render() !!}
    </div>
    @include('layouts.panelDown')

@endsection