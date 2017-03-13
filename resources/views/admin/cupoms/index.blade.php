@extends('layouts.default')

@section('content')

    @include('layouts.panelUp')
    <div class="panel-heading">
        @include('layouts.back')
        <h2>Cupoms</h2>

        <a href="{{route('admin.cupoms.create')}}" class="btn btn-default">New Cupom</a>
    </div>
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Code</th>
                <th>Value</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($cupoms as $cupom)
                <tr>
                    <td>{{$cupom->id}}</td>
                    <td>{{$cupom->code}}</td>
                    <td>R$ {{$cupom->value}}</td>
                    <td></td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <div class="text-center">
        {!! $cupoms->render() !!}
    </div>
    @include('layouts.panelDown')

@endsection