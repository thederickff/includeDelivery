@extends('layouts.default')

@section('content')

    @include('layouts.panelUp')
    <div class="panel-heading">
        <h2>Categories</h2>

        <a href="{{route('admin.categories.create')}}" class="btn btn-default">New Category</a>
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

            @foreach($categories as $category)
                <tr>

                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td><a href="{{route('admin.categories.edit', ['id'=> $category->id])}}"
                           class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{route('admin.categories.destroy', ['id'=> $category->id])}}"
                           class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <div class="text-center">
        {!! $categories->render() !!}
    </div>
    @include('layouts.panelDown')

@endsection