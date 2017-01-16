@extends('layouts.default')

@section('content')

    @include('layouts.panelUp')
    <div class="panel-heading">
        <h2>Edit product</h2>

    </div>

    @include('layouts.errorCheck')

    <div class="panel-body">
    {!! Form::model($product, ['route' => ['admin.products.update', $product->id],'method' => 'post']) !!}

    @include('admin.products._form')
    <!-- Form Input -->
        <div class="form-group">

            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>


    <div class="text-center">
        <!-- !! $products->render()!!}-->
    </div>
    @include('layouts.panelDown')

@endsection