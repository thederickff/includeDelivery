@extends('layouts.default')

@section('content')

    @include('layouts.panelUp')

    <div class="panel-heading">
        Admin
    </div>
    <div class="panel-body">
        <a href="{{route('admin.categories')}}" class="btn btn-default">Categories</a>
        <a href="{{route('admin.products')}}" class="btn btn-default">Products</a>
    </div>

    @include('layouts.panelDown')

@endsection