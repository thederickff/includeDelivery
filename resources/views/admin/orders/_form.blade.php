<!-- Form Input -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', $list_status, null, ['class' => 'form-control']) !!}
</div>
<!-- Form Input -->
<div class="form-group">
    {!! Form::label('deliveryman', 'Entregador:') !!}
    {!! Form::select('user_deliveryman_id', $deliveryman, null, ['class' => 'form-control']) !!}
</div>