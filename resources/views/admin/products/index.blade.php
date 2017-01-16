@extends('layouts.default')

@section('content')

    @include('layouts.panelUp')
    <div class="panel-heading">
        <h2>Products</h2>

        <a href="{{route('admin.products.create')}}" class="btn btn-default">New product</a>
    </div>
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Id</th>
                <th>Product</th>
                <th>Category</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($products as $product)
                <tr>

                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>{{$product->price}}</td>
                    <td class="text-center"><a href="{{route('admin.products.edit', ['id'=> $product->id])}}"
                           class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{route('admin.products.destroy', ['id'=> $product->id])}}"
                           class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <div class="text-center">
        {!! $products->render() !!}
    </div>
    @include('layouts.panelDown')

@endsection