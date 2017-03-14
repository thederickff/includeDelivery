@extends('layouts.default')

@section('content')

    @include('layouts.panelUp')
                        Admin
                    </div>
                    <div class="panel-body">
                        <a href="{{route('admin.categories')}}" class="btn btn-default">Categories</a>
                        <a href="{{route('admin.products')}}" class="btn btn-default">Products</a>
                        <a href="{{route('admin.clients')}}" class="btn btn-default">Clients</a>
                        <a href="{{route('admin.orders')}}" class="btn btn-default">Orders</a>
                        <a href="{{route('admin.cupoms')}}" class="btn btn-default">Cupoms</a>
                    </div>

    @include('layouts.panelDown')

@endsection