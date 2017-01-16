@extends('layouts.default')

@section('content')

    @include('layouts.panelUp')
    <div class="panel-heading">

        <h2>Edit Category</h2>

    </div>

    @include('layouts.errorCheck')

    <div class="panel-body">
    {!! Form::model($category, ['route' => ['admin.categories.update', $category->id],'method' => 'post']) !!}

    @include('admin.categories._form')
    <!-- Form Input -->
        <div class="form-group">

            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
    </div>


    <div class="text-center">
        <!-- !! $categories->render()!!}-->
    </div>
    @include('layouts.panelDown')

@endsection