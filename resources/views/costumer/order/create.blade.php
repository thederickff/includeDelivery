@extends('layouts.default')


@section('content')

    @include('layouts.panelUp')
    <div class="panel-heading">
        <h3>New Order</h3>
    </div>
    @include('layouts.errorCheck')
    <div class="panel-body">

        {!! Form::open(['class' => 'form']) !!}
        <div class="form-group">
            <label for="total">Total: </label>
            <p id="total"></p>
            <a href="#" id="newitembutton" class="btn btn-default">New Item</a>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>qtd</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <select class="form-control" name="items[0][product_id]">
                            @foreach($products as $p)
                                <option value="{{$p->id}}" data-price="{{$p->price}}">
                                    {{$p->name}} --- {{$p->price}}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        {!! Form::text('items[0][qtd]', 1, ['class' => 'form-control']) !!}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        {!! Form::close() !!}
    </div>
    @include('layouts.panelDown')

@endsection

@section('script')

    <script>
        $('#newitembutton').click(function () {

            var row = $('table tbody > tr:last');
            var newRow = row.clone();
            var length = $('table tbody tr').length;

            newRow.find('td').each(function () {
                var td = $(this);
                var input = td.find('input, select');
                var name = input.attr('name');

                input.attr('name', name.replace((length-1) + "", length + ""));
            });

            newRow.find('input').val(1);
            newRow.insertAfter(row);

            });

    </script>

@endsection